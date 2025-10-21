function HandleGenericResponse(response, onSuccess = (res) => { }, onFailure = (res) => { }) {
    var success;
    var responseObj = JSON.parse(response);

    console.log(responseObj);

    res = responseObj[1];

    if (res === false) {
        success = false;
    } else {
        success = res[1];
    }

    if (success) {
        onSuccess(res);
    } else {
        onFailure(res);
    }
}

function SendGenericRequest(type, params = {}, onSuccess = (res) => { }, onFailure = (res) => { }) {
    var request = new XMLHttpRequest();
    request.open("POST", "webserver.php", false);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    var requestData = "type=" + type + "&";

    Object.keys(params).forEach(key => {
        requestData += key + "=" + params[key] + "&";
    });

    request.send(requestData);

    if ((request.readyState == 4) && (request.status == 200)) {
        HandleGenericResponse(request.responseText, onSuccess, onFailure);
    }
}

function getCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length === 2) return parts.pop().split(";").shift();
    return null;
}

function HandleSessionCheckResponse(response) {
    var responseObj = JSON.parse(response);
    console.log(responseObj);
    var res = responseObj[1];
    var success;

    if (res === false) {
        success = false;
    } else {
        success = res[1];
    }

    if (success) {
        return res;
    }

    // clear cookie
    document.cookie = "session_id=; path=/; expires=Thu, 01 Jan 1970 00:00:00 GMT";

    return null;
}

function SendSessionCheckRequest(session_id) {
    var request = new XMLHttpRequest();
    request.open("POST", "webserver.php", false);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("type=session_check&session_id=" + session_id);

    if ((request.readyState == 4) && (request.status == 200)) {
        return HandleSessionCheckResponse(request.responseText);
    }
}

function getLoggedInUser() {
    // retrieve the logged-in user's name from session
    var session_id = getCookie("session_id");
    if (session_id === null) return null;

    var res = SendSessionCheckRequest(session_id);
    if (res !== null) {
        return res;
    }
    return null;
}

function GetLoginInfo() {
    email = document.getElementById("email_input").value;
    password = document.getElementById("password_input").value;
    // document.getElementById("textResponse").innerHTML = email + ' ' + password
    SendGenericRequest('login', { 'email': email, 'pword': password },
        (res) => {
            document.cookie = "session_id=" + res[2] + "; path=/";
            window.location.href = "home.php";
            document.getElementById("textResponse").innerHTML = "Login successful!";
        },
        (res) => {
            document.getElementById("textResponse").innerHTML = "Login failed!";
        });
    // SendLoginRequest(email, password);
}

function GetRegistrationInfo() {
    email = document.getElementById("email_input").value;
    password = document.getElementById("password_input").value;
    f_name = document.getElementById("fname_input").value;
    l_name = document.getElementById("lname_input").value;
    // document.getElementById("textResponse").innerHTML = email + ' ' + password
    SendGenericRequest('register', { 'email': email, 'pword': password, 'f_name': f_name, 'l_name': l_name },
        (res) => {
            document.getElementById("textResponse").innerHTML = "Registration successful!";
            window.location.href = "login.php";
        },
        (res) => {
            document.getElementById("textResponse").innerHTML = "Registration failed!";
        });
    // SendRegisterRequest(email, password, f_name, l_name);
}

function getProducts(component, searchString = "") {
    let cols = [];
    let queryResult = [];

    SendGenericRequest('get_products', { 'component': component, 'search_string': searchString },
        (res) => {
            cols = res[2];
            queryResult = res[3];
        },
        (res) => {
            // document.getElementById("products_table").innerHTML = "Failed to load products.";
            console.log("failed to grab product data");
        });
    return [cols, queryResult];
    // return [
    //     [component + ' name', 'speed', 'cores', 'platform', 'price', 'buy from'],
    //     [
    //         ['Ryzen 7 5800x', '3.8', '8', 'AM4', '0000.00', 'Amazon'],
    //         ['Ryzen 7 5800x', '3.8', '8', 'AM4', '0000.00', 'Amazon'],
    //         ['Ryzen 7 5800x', '3.8', '8', 'AM4', '0000.00', 'Amazon'],
    //         ['Ryzen 7 5800x', '3.8', '8', 'AM4', '0000.00', 'Amazon']
    //     ]
    // ];
}

function populateProductsTable(component, searchString = "") {
    var cols = []; // array
    var queryResult = []; // array of arrays

    [cols, queryResult] = getProducts(component, searchString);
    var productsTable = document.getElementById("products_table");

    var skippedCols = ["product_id", "link", "subscribed_users"];

    //clear first
    productsTable.innerHTML = "";

    // check if no results
    if (queryResult.length == 0) {
        productsTable.innerHTML = "No results found; try searching for a different product name";
    }

    // set up header row
    var headerRow = document.createElement("tr");
    headerRow.setAttribute("id", "products_table_header_row");
    productsTable.appendChild(headerRow);

    for (var i = 0; i < cols.length; i++) {
        if (skippedCols.includes(cols[i])) {
            continue;
        }

        var header = document.createElement("th");
        // header.innerHTML = '<button type="button" onclick="sortBy(this.textContent)"; style="font-weight: bold;">' + cols[i] + '</button>';
        header.innerHTML = cols[i];
        headerRow.appendChild(header);
    }

    // set up each rowof data
    for (var i = 0; i < queryResult.length; i++) {
        var dataRow = queryResult[i];
        var row = document.createElement("tr");

        // add each data to its cell
        for (var j = 0; j < cols.length; j++) {
            if (skippedCols.includes(cols[j])) {
                continue;
            }

            var dataCell = document.createElement("td");
            if (cols[j] == "site") {
                // make site prop into a link with link prop value
                dataCell.innerHTML = '<a href=' + dataRow[j + 1] + ' target="_blank">' + dataRow[j] + '</a>';
            } else {
                dataCell.innerHTML = dataRow[j];
            }
            row.appendChild(dataCell);
        }

        // add an extra cell with the add to build button
        var addButton = document.createElement("td");
        addButton.innerHTML = '<button type="button" onclick="alert(\'Added to build!\')">Add to Build</button>';
        row.appendChild(addButton);

        productsTable.appendChild(row);
    }
}

function populateBuild() {
    // grab name field
    var nameInput = document.getElementById("build_name");

    // grab each component slot
    var components = ['cpu', 'motherboard', 'ram', 'gpu', 'psu', 'cooler', 'storage', 'case'];
    //...

    // get userid
    let user_id = getLoggedInUser()[5];

    // get build info
    let build = [];
    SendGenericRequest('get_build', { 'user_id': user_id },
        (res) => {
            build = res[2];
        },
        (res) => {
            console.log("failed to grab build");
        }
    );

    // fill name field
    nameInput.value = build[2];
    nameInput.style.width = (nameInput.value.length ? (nameInput.value.length + 1) + 'ch' : '12ch');

    // for each component
    for (var i = 0; i < components.length; i++) {
        // get product
        let result = '<a href="component_finder.php?component=cpu">';
        var product_id = build[i + 3];
        if (product_id) {
            let product = [];
            SendGenericRequest('get_product_with_id', { 'component': components[i], 'product_id': product_id },
                (res) => {
                    product = res[2];
                    console.log(res);
                },
                (res) => {
                    console.log("failed to grab product");
                }
            );
            result = product[1] + ' ' + result;
            result += "(change)";
            document.getElementById(components[i] + "_price_slot").textContent += product[product.length - 4];
        } else {
            result += "Select";
        }
        result += "</a>"
        document.getElementById(components[i] + "_name_slot").innerHTML = result;
    }
}