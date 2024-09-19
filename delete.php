<?php
include("dbconnect.php");
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if(!$id){
    echo "No id provided";
    exit;
}
$query = "DELETE FROM student WHERE id={$id}";

try {
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "Student info of {$id} has been removed successfully.";
        // header("Location: display.php");
        // exit;
    }else{
        echo "SOmething went wrong";
    }
} catch (mysqli_sql_exception $error) {
    echo "Message: " . $error->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <!-- <form action="delete.php" method="post">
        <input type="submit" name="back" value="Go back">
    </form> -->
</body>
</html>


