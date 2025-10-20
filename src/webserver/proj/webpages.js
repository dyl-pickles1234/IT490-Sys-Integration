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
    request.open("POST", "webserver.php", true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.onreadystatechange = function () {
        if ((this.readyState == 4) && (this.status == 200)) {
            HandleGenericResponse(this.responseText, onSuccess, onFailure);
        }
    }

    var requestData = "type=" + type + "&";

    Object.keys(params).forEach(key => {
        requestData += key + "=" + params[key] + "&";
    });

    request.send(requestData);
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
        return "" + res[3] + " " + res[4]; // f_name + l_name
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