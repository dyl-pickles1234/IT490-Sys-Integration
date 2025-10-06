#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function doRegister($email, $password, $f_name, $l_name)
{
    $mydb = new mysqli('127.0.0.1','testUser','12345','auth');

    if ($mydb->errno != 0)
    {
        echo "failed to connect to database: ". $mydb->error . PHP_EOL;
        exit(0);
    }
    echo "successfully connected to database".PHP_EOL;

    // lookup email in database
    $query = "select email from users where email = '" . $email . "';";

    $response = $mydb->query($query);
    if ($mydb->errno != 0)
    {
        echo "failed to execute query:".PHP_EOL;
        echo __FILE__.':'.__LINE__.":error: ".$mydb->error.PHP_EOL;
        exit(0);
    }
    // var_dump($response);

    if ($response->num_rows >= 1) {
        while ($row = mysqli_fetch_array($response)) {
            print_r($row);
        }
        echo "email already exists".PHP_EOL;
        return false;
    }

    // add new entry
    $query = "insert into users (email, password, f_name, l_name) values ('$email', '$password', '$f_name', '$l_name');";

    $response = $mydb->query($query);
    if ($mydb->errno != 0)
    {
        echo "failed to execute query:".PHP_EOL;
        echo __FILE__.':'.__LINE__.":error: ".$mydb->error.PHP_EOL;
        exit(0);
    }
    //var_dump($response);

    if ($response == true) {
        echo "yeah all good".PHP_EOL;
    } else {
        echo "bad".PHP_EOL;
        return false;
    }

    return true;
    //return false if not valid
}

function doLogin($email,$password)
{
    $mydb = new mysqli('127.0.0.1','testUser','12345','auth');

    if ($mydb->errno != 0)
    {
        echo "failed to connect to database: ". $mydb->error . PHP_EOL;
        exit(0);
    }
    echo "successfully connected to database".PHP_EOL;


    // lookup email in database
    $query = "select email from users where email = '" . $email . "';";

    $response = $mydb->query($query);
    if ($mydb->errno != 0)
    {
        echo "failed to execute query:".PHP_EOL;
        echo __FILE__.':'.__LINE__.":error: ".$mydb->error.PHP_EOL;
        exit(0);
    }
    // var_dump($response);

    if ($response->num_rows >= 1) {
        while ($row = mysqli_fetch_array($response)) {
            print_r($row);
        }
    } else {
        echo "email not found".PHP_EOL;
        return false;
    }

    // check password
    $query = "select * from users where email = '" . $email . "' and password = '" . $password . "';";

    $response = $mydb->query($query);
    if ($mydb->errno != 0)
    {
        echo "failed to execute query:".PHP_EOL;
        echo __FILE__.':'.__LINE__.":error: ".$mydb->error.PHP_EOL;
        exit(0);
    }
    // var_dump($response);

    if ($response->num_rows >= 1) {
        while ($row = mysqli_fetch_array($response)) {
            print_r($row);
        }
    } else {
        echo "password incorrect".PHP_EOL;
        return false;
    }

    return true;
    //return false if not valid
}

function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }
  switch ($request['type'])
  {
    case "register":
      return doRegister($request['email'], $request['password'], $request['f_name'], $request['l_name']);
    case "login":
      return doLogin($request['email'], $request['password']);
    case "validate_session":
      return doValidate($request['sessionId']);
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

$server->process_requests('requestProcessor');
exit();
?>