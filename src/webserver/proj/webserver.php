<?php
require_once(__DIR__ . '/../../shared/path.inc');
require_once(__DIR__ . '/../../shared/get_host_info.inc');
require_once(__DIR__ . '/../../shared/rabbitMQLib.inc');

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


// Use shared INI by default (keeps original behavior)
$client = new rabbitMQClient(__DIR__ . '/../../shared/testRabbitMQ.ini', "testServer");

if (!isset($_POST)) {
    $msg = "NO POST MESSAGE SET";
    echo json_encode($msg);
    exit(0);
}

$request = $_POST;

// default error response
$out = ['status' => 'error', 'code' => 400, 'message' => 'unsupported request type', 'data' => null];

if (isset($request['type'])) {
    switch ($request['type']) {
        case 'register':
            $resp = registerUser($request['email'] ?? '', $request['pword'] ?? '', $request['f_name'] ?? '', $request['l_name'] ?? '', $client);
            $out = is_array($resp) && isset($resp['status']) ? $resp : ['status' => 'error', 'code' => 500, 'message' => 'invalid_response', 'data' => $resp];
            break;
        case 'login':
            $resp = loginUser($request['email'] ?? '', $request['pword'] ?? '', $client);
            $out = is_array($resp) && isset($resp['status']) ? $resp : ['status' => 'error', 'code' => 500, 'message' => 'invalid_response', 'data' => $resp];
            break;
        case 'session_check':
            $resp = sessionCheck($request['session_id'] ?? '', $client);
            $out = is_array($resp) && isset($resp['status']) ? $resp : ['status' => 'error', 'code' => 500, 'message' => 'invalid_response', 'data' => $resp];
            break;
        case 'logout':
            $resp = logoutUser($request['session_id'] ?? '', $client);
            $out = is_array($resp) && isset($resp['status']) ? $resp : ['status' => 'error', 'code' => 500, 'message' => 'invalid_response', 'data' => $resp];
            break;
    }
}

// return database results to the webserver JS
echo json_encode($out);
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