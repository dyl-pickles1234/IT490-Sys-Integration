<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function setBuildName($build_name, $user_id, $client)
{
    $request = array();
    $request['type'] = "set_build_name";
    $request['build_name'] = $build_name;
    $request['user_id'] = $user_id;
    $response = $client->send_request($request);

    return $response;
}

function subscribeToProduct($component, $product_id, $checked, $user_id, $client)
{
    $request = array();
    $request['type'] = "subscribe_to_product";
    $request['component'] = $component;
    $request['product_id'] = $product_id;
    $request['checked'] = $checked;
    $request['user_id'] = $user_id;
    $response = $client->send_request($request);

    return $response;
}

function commentOnPost($post_id, $comment, $author, $client)
{
    $request = array();
    $request['type'] = "comment_on_post";
    $request['post_id'] = $post_id;
    $request['comment'] = $comment;
    $request['author'] = $author;
    $response = $client->send_request($request);

    return $response;
}

function likePost($post_id, $client)
{
    $request = array();
    $request['type'] = "like_post";
    $request['post_id'] = $post_id;
    $response = $client->send_request($request);

    return $response;
}

function saveImage($request, $client)
{
    //todo fix
    print_r($_FILES);
    echo $request;
    // save image to disk
    $bool = move_uploaded_file($_FILES['image']['tmp_name'], 'post_img/' . $request['name']);
    if ($bool) {
        echo 'yeah';
        return true;
    } else {
        echo 'nah';
        return false;
    }
}
function newPost($title, $author, $content, $images, $client)
{
    $request = array();
    $request['type'] = "new_post";
    $request['title'] = $title;
    $request['author'] = $author;
    $request['content'] = $content;
    $request['images'] = $images;
    $response = $client->send_request($request);

    return $response;
}

function addToBuild($component, $product_id, $user_id, $client)
{
    $request = array();
    $request['type'] = "add_to_build";
    $request['component'] = $component;
    $request['product_id'] = $product_id;
    $request['user_id'] = $user_id;
    $response = $client->send_request($request);

    return $response;
}

function getPostWithID($post_id, $client)
{
    $request = array();
    $request['type'] = "get_post_with_id";
    $request['post_id'] = $post_id;
    $response = $client->send_request($request);

    return $response;
}

function getPosts($client)
{
    $request = array();
    $request['type'] = "get_posts";
    $response = $client->send_request($request);

    return $response;
}

function getBuild($user_id, $client)
{
    $request = array();
    $request['type'] = "get_build";
    $request['user_id'] = $user_id;
    $response = $client->send_request($request);

    return $response;
}

function getProductWithID($component, $product_id, $client)
{
    $request = array();
    $request['type'] = "get_product_with_id";
    $request['component'] = $component;
    $request['product_id'] = $product_id;
    $response = $client->send_request($request);

    return $response;
}

function getProducts($component, $search_string, $client)
{
    $request = array();
    $request['type'] = "get_products";
    $request['component'] = $component;
    $request['search_string'] = $search_string;
    $response = $client->send_request($request);

    return $response;
}

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
        // message, success, email, f_name, l_name, user_id
        $res = array("session_check request", sessionCheck($request["session_id"], $client));
        break;
    case "logout":
        // message, success
        $res = array("logout request", logoutUser($request["session_id"], $client));
        break;
    case "get_products":
        // message, success, columns, entries
        $res = array("get products request", getProducts($request["component"], $request["search_string"], $client));
        break;
    case "get_product_with_id":
        // message, success, product
        $res = array("get product with id request", getProductWithID($request["component"], $request["product_id"], $client));
        break;
    case "get_build":
        // message, success, build
        $res = array("get build request", getBuild($request["user_id"], $client));
        break;
    case "get_posts":
        // message, success, posts
        $res = array("get posts request", getPosts($client));
        break;
    case "get_post_with_id":
        // message, success, post
        $res = array("get post with id request", getPostWithID($request["post_id"], $client));
        break;
    case "add_to_build":
        // message, success
        $res = array("add to build request", addToBuild($request["component"], $request["product_id"], $request["user_id"], $client));
        break;
    case "new_post":
        // message, success
        $res = array("new post request", newPost($request["title"], $request["author"], $request["content"], $request["images"], $client));
        break;
    case "save_image":
        // message, success
        $res = array("save image request", saveImage($request["image"], $client));
        break;
    case "like_post":
        // message, success
        $res = array("like post request", likePost($request["post_id"], $client));
        break;
    case "comment_on_post":
        // message, success
        $res = array("comment on post request", commentOnPost($request["post_id"], $request["comment"], $request["author"], $client));
        break;
    case "subscribe_to_product":
        // message, success
        $res = array("subscribe to product request", subscribeToProduct($request["component"], $request["product_id"], $request["checked"], $request["user_id"], $client));
        break;
    case "set_build_name":
        // message, success
        $res = array("set build name request", setBuildName($request["build_name"], $request["user_id"], $client));
        break;

    // default:
    //     $res = array($request["type"] . " request", forwardRequestToDB($request, $client));

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