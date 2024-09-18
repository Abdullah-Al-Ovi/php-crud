<?php
$db_host = "localhost";
$db_user = "root";
$db_pass="";
$db_name="phpcrud";
$db_port= 3307;
$conn =null;

try{
    if (!isset($conn)) {
        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);
    }
    if($conn->connect_error){
        throw new Exception($conn->connect_error);
    }
    // else{
    //     echo "Connected successfully";
    // }
}catch(Exception $error){
    echo "Exception thrown in File:{$error->getFile()} on line:{$error->getLine()}";
    echo "Code: {$error->getCode()}";
    echo "Message:{$error->getMessage()}";
}