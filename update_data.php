<?php
include("dbconnect.php");

$id = $_POST["id"];
$s_name = $_POST["name"];
$s_phone = $_POST["phone"];
$image = $_FILES["photo"]["name"];
$dst = "./image/" .$image;
$dst_db = "image/" .$image;
if($image){
    move_uploaded_file($_FILES["photo"]["tmp_name"],$dst);
}


    if($image){
        $query = "UPDATE student SET name='$s_name',phone='$s_phone',image='$dst_db' WHERE id='$id'";
    }else{
        $query = "UPDATE student SET name='$s_name',phone='$s_phone' WHERE id='$id'";
    }
    try{
        $result = mysqli_query($conn,$query);
        if($result){
            echo "Information updated successful.";
        }
    }catch(mysqli_sql_exception $error){
        // echo "Error in file: {$error->getFile()} in line: {$error->getLine()}";
        echo "Error: " . $error->getMessage();
    }
    finally{
        $conn->close();
    }
