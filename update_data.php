<?php
include("dbconnect.php");

$id = $_POST["id"];
$s_name = $_POST["name"];
$s_phone = $_POST["phone"];
$gender = $_POST["gender"];
$hobbies = isset($_POST["hobbies"]) ? implode(",", $_POST["hobbies"]) : ''; // Handle hobbies
$image = $_FILES["photo"]["name"];
$dst = "./image/" . $image;
$dst_db = "image/" . $image;

if ($image) {
    move_uploaded_file($_FILES["photo"]["tmp_name"], $dst);
}

if ($image) {
    // Update with new image
    $query = "UPDATE student SET name='$s_name', phone='$s_phone', gender='$gender', hobbies='$hobbies', image='$dst_db' WHERE id='$id'";
} else {
    // Update without changing the image
    $query = "UPDATE student SET name='$s_name', phone='$s_phone', gender='$gender', hobbies='$hobbies' WHERE id='$id'";
}

try {
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "Information updated successfully.";
    }
} catch (mysqli_sql_exception $error) {
    echo "Error: " . $error->getMessage();
} finally {
    $conn->close();
}
?>
