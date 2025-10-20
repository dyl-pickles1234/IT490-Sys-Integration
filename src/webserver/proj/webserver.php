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
        // message, success
        $res = array("register request", registerUser($request["email"], $request["pword"], $request["f_name"], $request["l_name"], $client));
        break;
    case "login":
        // message, success, session_id
        $res = array("login request", loginUser($request["email"], $request["pword"], $client));
        break;
    case "session_check":
        // message, success, email, f_name, l_name
        $res = array("session_check request", sessionCheck($request["session_id"], $client));
        break;
    case "logout":
        // message, success
        $res = array("logout request", logoutUser($request["session_id"], $client));
        break;
}

// return databse results to the webserver js
echo json_encode($res);
exit(0);

// $request['message'] = $msg;

//$response = $client->publish($request);

// echo "client received response: " . PHP_EOL;
// print_r($response);
// echo "\n\n";

// echo $argv[0] . " END" . PHP_EOL;