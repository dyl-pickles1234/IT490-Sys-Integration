#!/usr/bin/php
<?php

$headers = [
	"Authorization: Bearer v^1.1#i^1#I^3#p^3#f^0#r^0#t^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v^1.1#i^1#I^3#p^3#f^0#r^0#t^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"
];

$url = "https://api.ebay.com/buy/browse/v1/item_summary/search?q=9070xt&limit=1";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$apiResponse = curl_exec($ch);

curl_close($ch);

$data = json_decode($apiResponse, true);

$info = $data["itemSummaries"];


/*
foreach($data["itemSummaries"] as $info){
    $query = "insert gpu_info "
}
*/


function toDatabase($info){

    $mydb = new mysqli('127.0.0.1', 'testUser', '12345', 'proj_490');

    if ($mydb->errno != 0) {
        echo "failed to connect to database: " . $mydb->error . PHP_EOL;
        exit(0);
    }
    echo "successfully connected to database" . PHP_EOL;

    foreach($info as $test){

    $id     = $test["itemId"];
    $name   = $test["title"];
    $price  = $test["price"]["value"];
    $url    = $test["itemWebUrl"];

    // add new entry
    $query = "insert into gpu_stuff (item_id, name, price, url) values ('$id', '$name', '$price', '$url');";

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
    }
    }


}

toDatabase($info);

?>
