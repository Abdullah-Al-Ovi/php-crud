<?php
include("dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <style>
        th, td {
  padding: 15px;
}
    </style>
</head>

<body>
    <?php
    $query = "SELECT * FROM student";

    $result = mysqli_query($conn, $query);

    ?>

    <table style="border:1px solid black;border-spacing:0px">
        <tr style="border:1px solid black;">
            <td style="border:1px solid black;">Name</td>
            <td style="border:1px solid black;">Image</td>
            <td style="border:1px solid black;">Phone</td>
            <td style="border:1px solid black;">Gender</td>
            <td style="border:1px solid black;">Hobbies</td>
            <td style="border:1px solid black;">Delete</td>
            <td style="border:1px solid black;">Update</td>
        </tr>
        <?php
        while ($item = $result->fetch_assoc()) {
        ?>
            <tr>
                <?php
                echo  "<td style='border:1px solid black;'><p>{$item["name"]}</p></td>";
                echo  "<td style='border:1px solid black;'><img height='100' width='100' src='{$item["image"]}' ></td>";
                echo  "<td style='border:1px solid black;'><p>{$item["phone"]}</p></td>";
                echo  "<td style='border:1px solid black;'><p>{$item["gender"]}</p></td>";
                echo  "<td style='border:1px solid black;'><p>{$item["hobbies"]}</p></td>";
                echo  "<td style='border:1px solid black;'><a href='delete.php?id={$item["id"]}' >X</td>";
                echo  "<td style='border:1px solid black;'><a href='update.php?id={$item["id"]}' >Up</td>";
                ?>
            </tr>
        <?php
        }
        ?>

    </table>




</body>

</html>