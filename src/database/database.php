#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function doLogout($session_id)
{
    // IP of mysql database, db username, db password, and which db to use
    // TODO change to new database name for proj, in all places (this code is copied in a few places)
    // TODO stop having this code be copied in a few places
    $mydb = new mysqli('127.0.0.1', 'testUser', '12345', 'auth');

    if ($mydb->errno != 0) {
        echo "failed to connect to database: " . $mydb->error . PHP_EOL;
        exit(0);
    }
    echo "successfully connected to database" . PHP_EOL;

    // lookup session id in database
    $query = "select * from sessions where session_id = '" . $session_id . "';";

    $response = $mydb->query($query);
    if ($mydb->errno != 0) {
        echo "failed to execute query:" . PHP_EOL;
        echo __FILE__ . ':' . __LINE__ . ":error: " . $mydb->error . PHP_EOL;
        exit(0);
    }
    var_dump($response);

    if ($response->num_rows < 1) { // no session found
        return false;
    }

    $row = mysqli_fetch_assoc($response);
    $email = $row['email'];

    // remove all entries from sessions table with that email
    $query = "delete from sessions where email = '" . $email . "';";

    $response = $mydb->query($query);
    if ($mydb->errno != 0) {
        echo "failed to execute query:" . PHP_EOL;
        echo __FILE__ . ':' . __LINE__ . ":error: " . $mydb->error . PHP_EOL;
        exit(0);
    }

    if ($response == true) {
        echo "logout successful" . PHP_EOL;
    } else {
        echo "logout failed" . PHP_EOL;
        return false;
    }

    return array("good logout", true);
}

function doSessionCheck($session_id)
{
    $mydb = new mysqli('127.0.0.1', 'testUser', '12345', 'auth');

    if ($mydb->errno != 0) {
        echo "failed to connect to database: " . $mydb->error . PHP_EOL;
        exit(0);
    }
    echo "successfully connected to database" . PHP_EOL;

    // lookup session id in database
    $query = "select * from sessions where session_id = '" . $session_id . "';";

    $response = $mydb->query($query);
    if ($mydb->errno != 0) {
        echo "failed to execute query:" . PHP_EOL;
        echo __FILE__ . ':' . __LINE__ . ":error: " . $mydb->error . PHP_EOL;
        exit(0);
    }
    var_dump($response);

    if ($response->num_rows > 1) { // error, should only be one session entry at a time
        while ($row = mysqli_fetch_array($response)) {
            print_r($row);
        }
        echo "too many entries for this session id" . PHP_EOL;
        // FIX remove other entries
        return false;
    } else if ($response->num_rows < 1) { // no session found
        return false;
    }

    $row = mysqli_fetch_assoc($response);

    // check expiration
    $current_time = time();
    if ($current_time > $row['expires']) {
        echo "session expired" . PHP_EOL;

        // remove entry from database
        $query = "delete from sessions where session_id = '" . $session_id . "';";

        $response = $mydb->query($query);
        if ($mydb->errno != 0) {
            echo "failed to execute query:" . PHP_EOL;
            echo __FILE__ . ':' . __LINE__ . ":error: " . $mydb->error . PHP_EOL;
            exit(0);
        }

        return false;
    }

    $email = $row['email'];
    $f_name = $row['f_name'];
    $l_name = $row['l_name'];

    return array("good session", true, $email, $f_name, $l_name);
}

function doRegister($email, $password, $f_name, $l_name)
{
    $mydb = new mysqli('127.0.0.1', 'testUser', '12345', 'auth');

    if ($mydb->errno != 0) {
        echo "failed to connect to database: " . $mydb->error . PHP_EOL;
        exit(0);
    }
    echo "successfully connected to database" . PHP_EOL;

    // lookup email in database
    $query = "select email from users where email = '" . $email . "';";

    $response = $mydb->query($query);
    if ($mydb->errno != 0) {
        echo "failed to execute query:" . PHP_EOL;
        echo __FILE__ . ':' . __LINE__ . ":error: " . $mydb->error . PHP_EOL;
        exit(0);
    }
    // var_dump($response);

    if ($response->num_rows >= 1) {
        while ($row = mysqli_fetch_array($response)) {
            print_r($row);
        }
        echo "email already exists" . PHP_EOL;
        return false;
    }

    // add new entry
    $query = "insert into users (email, password, f_name, l_name) values ('$email', '$password', '$f_name', '$l_name');";

    $response = $mydb->query($query);
    if ($mydb->errno != 0) {
        echo "failed to execute query:" . PHP_EOL;
        echo __FILE__ . ':' . __LINE__ . ":error: " . $mydb->error . PHP_EOL;
        exit(0);
    }
    //var_dump($response);

    if ($response == true) {
        echo "yeah all good" . PHP_EOL;
    } else {
        echo "bad" . PHP_EOL;
        return false;
    }

    return array("reg good", true);
}

function doLogin($email, $password)
{
    $mydb = new mysqli('127.0.0.1', 'testUser', '12345', 'auth');

    if ($mydb->errno != 0) {
        echo "failed to connect to database: " . $mydb->error . PHP_EOL;
        exit(0);
    }
    echo "successfully connected to database" . PHP_EOL;


    // lookup email in database
    $query = "select email from users where email = '" . $email . "';";

    $response = $mydb->query($query);
    if ($mydb->errno != 0) {
        echo "failed to execute query:" . PHP_EOL;
        echo __FILE__ . ':' . __LINE__ . ":error: " . $mydb->error . PHP_EOL;
        exit(0);
    }
    // var_dump($response);

    if ($response->num_rows >= 1) {
        while ($row = mysqli_fetch_array($response)) {
            print_r($row);
        }
    } else {
        echo "email not found" . PHP_EOL;
        return false;
    }

    // check password
    $query = "select * from users where email = '" . $email . "' and password = '" . $password . "';";

    $response = $mydb->query($query);
    if ($mydb->errno != 0) {
        echo "failed to execute query:" . PHP_EOL;
        echo __FILE__ . ':' . __LINE__ . ":error: " . $mydb->error . PHP_EOL;
        exit(0);
    }
    // var_dump($response);

    if ($response->num_rows >= 1) {
        // while ($row = mysqli_fetch_array($response)) {
        //     print_r($row);
        // }
    } else {
        echo "password incorrect" . PHP_EOL;
        return false;
    }

    // get first and last name from response
    $row = mysqli_fetch_assoc($response);
    $f_name = $row['f_name'];
    $l_name = $row['l_name'];

    // create session id
    $generated_session_id = bin2hex(random_bytes(32));

    // create expiration timestamp
    $expiration = time() + (10); // 10 seconds for testing

    // add session id to database
    $query = "insert into sessions (session_id, email, f_name, l_name, expires) values ('$generated_session_id', '$email', '$f_name', '$l_name', $expiration);";

    $response = $mydb->query($query);
    if ($mydb->errno != 0) {
        echo "failed to execute query:" . PHP_EOL;
        echo __FILE__ . ':' . __LINE__ . ":error: " . $mydb->error . PHP_EOL;
        exit(0);
    }
    var_dump($response);
    if ($response == true) {
        echo "session id: " . $generated_session_id . PHP_EOL;
        return array("login good", true, $generated_session_id);
    } else {
        echo "failed to insert session" . PHP_EOL;
        return false;
    }
}

function requestProcessor($request)
{
    echo "received request" . PHP_EOL;
    var_dump($request);
    if (!isset($request['type'])) {
        return "ERROR: unsupported message type";
    }

    // add more cases here for each type of request the db can receive;
    // this should match up with all requests the webserver is sending
    switch ($request['type']) {
        case "register":
            return doRegister($request['email'], $request['password'], $request['f_name'], $request['l_name']);
        case "login":
            return doLogin($request['email'], $request['password']);
        case "session_check":
            return doSessionCheck($request['session_id']);
        case "logout":
            return doLogout($request['session_id']);
    }

    return array("returnCode" => '0', 'message' => "Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini", "testServer");

$server->process_requests('requestProcessor');
exit();
?>