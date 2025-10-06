<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

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
        $res = "register, sounds good";
        $res = $res . registerUser($request["email"], $request["pword"], $request["f_name"], $request["l_name"], $client);
        break;
    case "login":
        $res = "login, yeah we can do that";
        $res = $res . loginUser($request["email"], $request["pword"], $client);
        break;
}

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