<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function sessionCheck($session_id, $client)
{
    $request = array();
    $request['type'] = "session_check";
    $request['session_id'] = $session_id;
    $response = $client->send_request($request);

    return $response;
}

function registerUser($email, $password, $f_name, $l_name, $client)
{
    $request = array();
    $request['type'] = "register";
    $request['email'] = $email;
    $request['password'] = $password;
    $request['f_name'] = $f_name;
    $request['l_name'] = $l_name;
    $response = $client->send_request($request);

    return $response;
}

function loginUser($email, $password, $client)
{
    $request = array();
    $request['type'] = "login";
    $request['email'] = $email;
    $request['password'] = $password;
    $response = $client->send_request($request);

    return $response;
}

function logoutUser($session_id, $client)
{
    $request = array();
    $request['type'] = "logout";
    $request['session_id'] = $session_id;
    $response = $client->send_request($request);

    return $response;
}


$client = new rabbitMQClient("testRabbitMQ.ini", "testServer");

if (!isset($_POST)) {
    $msg = "NO POST MESSAGE SET";
    echo json_encode($msg);
    exit(0);
}

$request = $_POST;
$res = "unsupported request type";
switch ($request["type"]) {
    case "register":
        // send info to database for a response
        $ret = registerUser($request["email"], $request["pword"], $request["f_name"], $request["l_name"], $client);

        // formulate our response to webserver js based on info from db response
        $res = array("register request", $ret[1]); // message, success
        break;
    case "login":
        $ret = loginUser($request["email"], $request["pword"], $client);
        $res = array("login request", $ret[1], $ret[2]); // message, success, session_id
        break;
    case "session_check":
        $ret = sessionCheck($request["session_id"], $client);
        $res = array("session_check request", $ret[1], $ret[2], $ret[3], $ret[4]); // message, success, email, f_name, l_name
        break;
    case "logout":
        $ret = logoutUser($request["session_id"], $client);
        $res = array("logout request", $ret[1]); // message, success
        break;

}

// return databse results to the webserver js
echo json_encode($res);
exit(0);

// $response = registerUser("ppp@njit.edu", "password98", "Pylan", "PiPalma", $client);
// $response = loginUser("ppp@njit.edu", "password98", $client);
// $response = loginUser("ddd@njit.edu", "pa55word#", $client);

// $request['message'] = $msg;

//$response = $client->publish($request);

// echo "client received response: " . PHP_EOL;
// print_r($response);
// echo "\n\n";

// echo $argv[0] . " END" . PHP_EOL;