<?php

function connection_open(){
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "bs23";

    $connection = new mysqli($hostname, $username, $password, $database);
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    return $connection;
}

function dd($data){
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    exit;
}


?>