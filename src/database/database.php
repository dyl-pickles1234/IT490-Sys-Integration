#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function doGetPostWithID($post_id) {
    $mydb = new mysqli('127.0.0.1', 'testUser', '12345', 'proj_490');

    if ($mydb->errno != 0) {
        echo "failed to connect to database: " . $mydb->error . PHP_EOL;
        exit(0);
    }
    echo "successfully connected to database" . PHP_EOL;

    // grab post with id
    $query = "select * from posts where post_id = " . $post_id . ";";

    $response = $mydb->query($query);
    if ($mydb->errno != 0) {
        echo "failed to execute query:" . PHP_EOL;
        echo __FILE__ . ':' . __LINE__ . ":error: " . $mydb->error . PHP_EOL;
        exit(0);
    }
    // var_dump($response);
    if ($response->num_rows > 1) {
        echo "more than one post with id " . $post_id . PHP_EOL;
        return false;
    } else if ($response->num_rows < 1) {
        echo "no post found with id " . $post_id . PHP_EOL;
        // return array("kinda", true, $columns);
        return false;
    }

    $post = mysqli_fetch_array($response, MYSQLI_NUM);

    return array("get post with id looks good", true, $post);
}

function doGetPosts() {
    $mydb = new mysqli('127.0.0.1', 'testUser', '12345', 'proj_490');

    if ($mydb->errno != 0) {
        echo "failed to connect to database: " . $mydb->error . PHP_EOL;
        exit(0);
    }
    echo "successfully connected to database" . PHP_EOL;

    // grab all posts
    $query = "select * from posts;";

    $response = $mydb->query($query);
    if ($mydb->errno != 0) {
        echo "failed to execute query:" . PHP_EOL;
        echo __FILE__ . ':' . __LINE__ . ":error: " . $mydb->error . PHP_EOL;
        exit(0);
    }
    // var_dump($response);

    if ($response->num_rows < 1) {
        echo "no posts found" . PHP_EOL;
        // return array("kinda", true, $columns);
        return false;
    }

    $posts = mysqli_fetch_all($response, MYSQLI_NUM);

    return array("get posts looks good", true, $posts);
}

function doGetProductWithID($component, $product_id)
{
    $mydb = new mysqli('127.0.0.1', 'testUser', '12345', 'proj_490');

    if ($mydb->errno != 0) {
        echo "failed to connect to database: " . $mydb->error . PHP_EOL;
        exit(0);
    }
    echo "successfully connected to database" . PHP_EOL;

    // grab product
    $query = "select * from " . $component . " where product_id = " . $product_id . ";";

    $response = $mydb->query($query);
    if ($mydb->errno != 0) {
        echo "failed to execute query:" . PHP_EOL;
        echo __FILE__ . ':' . __LINE__ . ":error: " . $mydb->error . PHP_EOL;
        exit(0);
    }
    // var_dump($response);

    if ($response->num_rows > 1) {
        // should only be one product
        echo "more than one product found ERR" . PHP_EOL;
        return false;
    } else if ($response->num_rows < 1) {
        echo "no product found with ID " . $product_id . " in table " . $component . PHP_EOL;
        // return array("kinda", true, $columns);
        return false;
    }

    $product = mysqli_fetch_array($response, MYSQLI_NUM);

    return array("get product with id looks good", true, $product);
}

function doGetBuild($user_id)
{
    $mydb = new mysqli('127.0.0.1', 'testUser', '12345', 'proj_490');

    if ($mydb->errno != 0) {
        echo "failed to connect to database: " . $mydb->error . PHP_EOL;
        exit(0);
    }
    echo "successfully connected to database" . PHP_EOL;

    // grab this user's build
    $query = "select * from builds where user_id = " . $user_id . ";";

    $response = $mydb->query($query);
    if ($mydb->errno != 0) {
        echo "failed to execute query:" . PHP_EOL;
        echo __FILE__ . ':' . __LINE__ . ":error: " . $mydb->error . PHP_EOL;
        exit(0);
    }
    // var_dump($response);

    if ($response->num_rows > 1) {
        // should only be one build (for now)
        echo "more than one build found ERR" . PHP_EOL;
        return false;
    } else if ($response->num_rows < 1) {
        echo "no build found for user " . $user_id . PHP_EOL;
        // return array("kinda", true, $columns);
        return false;
    }

    $build = mysqli_fetch_array($response, MYSQLI_NUM);

    return array("get build looks good", true, $build);
}

function doGetProducts($component, $search_string)
{
    $mydb = new mysqli('127.0.0.1', 'testUser', '12345', 'proj_490');

    if ($mydb->errno != 0) {
        echo "failed to connect to database: " . $mydb->error . PHP_EOL;
        exit(0);
    }
    echo "successfully connected to database" . PHP_EOL;

    // grab columns in this component table
    $query = "show columns from " . $component . ";";

    $response = $mydb->query($query);
    if ($mydb->errno != 0) {
        echo "failed to execute query:" . PHP_EOL;
        echo __FILE__ . ':' . __LINE__ . ":error: " . $mydb->error . PHP_EOL;
        exit(0);
    }
    // var_dump($response);
    $columns = [];
    if ($response->num_rows >= 1) {
        while ($row = mysqli_fetch_array($response)) {
            print_r($row[0].PHP_EOL);
            $columns[] = $row[0];
        }
    } else {
        echo "no columns in " . $component . " table" . PHP_EOL;
        return false;
    }

    // grab all products
    $query = "select * from " . $component . " where name like '%" . $search_string . "%';";

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
        echo "no products in table" . PHP_EOL;
        // return array("kinda", true, $columns);
        return false;
    }

    $entries = mysqli_fetch_all($response, MYSQLI_NUM);

    return array("get products looks good", true, $columns, $entries);
}

function doLogout($session_id)
{
    // IP of mysql database, db username, db password, and which db to use
    // TODO stop having this code be copied in a few places
    $mydb = new mysqli('127.0.0.1', 'testUser', '12345', 'proj_490');

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
    $mydb = new mysqli('127.0.0.1', 'testUser', '12345', 'proj_490');

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
    $user_id = $row['user_id'];

    return array("good session", true, $email, $f_name, $l_name, $user_id);
}

function doRegister($email, $password, $f_name, $l_name)
{
    $mydb = new mysqli('127.0.0.1', 'testUser', '12345', 'proj_490');

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
    $mydb = new mysqli('127.0.0.1', 'testUser', '12345', 'proj_490');

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
    $user_id = $row['id'];

    // create session id
    $generated_session_id = bin2hex(random_bytes(32));

    // create expiration timestamp
    $expiration = time() + (12 * 3600); // 12 hours from now

    // add session id to database
    $query = "insert into sessions (session_id, email, f_name, l_name, user_id, expires) values ('$generated_session_id', '$email', '$f_name', '$l_name', $user_id, $expiration);";

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
        case "get_products":
            return doGetProducts($request['component'], $request['search_string']);
        case "get_product_with_id":
            return doGetProductWithID($request['component'], $request['product_id']);
        case "get_build":
            return doGetBuild($request['user_id']);
        case "get_posts":
            return doGetPosts();
        case "get_post_with_id":
            return doGetPostWithID($request['post_id']);
    }

    return array("returnCode" => '0', 'message' => "Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini", "testServer");

$server->process_requests('requestProcessor');
exit();
?>