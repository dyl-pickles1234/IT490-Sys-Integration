<?php include 'header.html'; ?>
<html>

<script>
    // this whole request-specific setup is not very good;
    // TODO abstract this to a more scalable system
    // TODO also maybe just separate all of the js to files; keep html in the html
    function HandleLogoutResponse(response) {
        var responseObj = JSON.parse(response);
        console.log(responseObj);
        res = responseObj[1];
        var success;

        if (res === false) {
            success = false;
        } else {
            success = res[1];
        }

        //	document.getElementById("textResponse").innerHTML = response+"<p>";	
        // document.getElementById("textResponse").innerHTML = "response: " + responseObj[0] + "<p>";

        if (success) {
            // clear cookie
            document.cookie = "session_id=; path=/; expires=Thu, 01 Jan 1970 00:00:00 GMT";
            window.location.href = "index.html";
        }
    }

    function SendLogoutRequest(session_id) {
        var request = new XMLHttpRequest();
        request.open("POST", "webserver.php", true);
        request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        request.onreadystatechange = function () {

            if ((this.readyState == 4) && (this.status == 200)) {
                HandleLogoutResponse(this.responseText);
            }
        }
        request.send("type=logout&session_id=" + session_id);
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

    function getCookie(name) {
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length === 2) return parts.pop().split(";").shift();
        return null;
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

    loggedInUser = getLoggedInUser();

    if (loggedInUser === null) {
        window.location.href = "login.html";
    }
</script>

<body>
    <h1>Welcome to RazorEdge PC Parts!</h1>

    <div style="text-align: center; width: 50%; margin-left: auto; margin-right: auto;">
        <img src="img/pc-parts.webp" style="max-width: 100%; height: auto;">
        <br><br>
        <span style="font-size: 1.25em;">
            Your one-stop shop for all your PC building needs! Explore our extensive component comparison tools,
            select parts to organize your next build, and even show off your new PC to others on the forums. There are
            places to get inspiration from others, and tools to help you get the best deals possible.
        </span>
        <br><br>
        <span style="font-size: 1.5em;">Happy Building!</span>
    </div>
</body>