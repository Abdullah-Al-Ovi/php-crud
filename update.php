<?php
include("dbconnect.php");

$id = isset($_GET["id"]) ? $_GET["id"] : null;
if (!$id) {
    echo "No ID is provided.";
    exit;
}

$query = "SELECT * FROM student WHERE id={$id}";

try {
    $result = mysqli_query($conn, $query);
    if ($result) {
        $item = $result->fetch_assoc();
    } else {
        echo "No record found.";
        exit;
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
    <title>Update</title>
</head>
<body>
    <form action="update_data.php" method="post" enctype="multipart/form-data">
        <div>
            <input type="text" hidden name="id" value="<?php echo $item['id']; ?>">
        </div>
        <div>
            <label for="">Name: </label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($item['name']); ?>">
        </div>
        <div>
            <label for="">Phone: </label>
            <input type="text" name="phone" value="<?php echo htmlspecialchars($item['phone']); ?>">
        </div>
        <div>
            <label for="">Old Image:</label>
            <img height="100" width="100" src="<?php echo htmlspecialchars($item['image']); ?>" alt="Old Image">
        </div>
        <div>
            <label for="">New Image</label>
            <input type="file" name="photo" id="">
        </div>

        <!-- Gender Radio Buttons -->
        <div>
            <label>Gender:</label><br>
            <input type="radio" name="gender" value="male" <?php echo ($item['gender'] === 'male') ? 'checked' : ''; ?>>
            <label>Male</label>
            <input type="radio" name="gender" value="female" <?php echo ($item['gender'] === 'female') ? 'checked' : ''; ?>>
            <label>Female</label>
        </div>

        <!-- Hobbies Checkboxes -->
        <div>
            <label>Hobbies:</label><br>
            <?php
            $hobbiesList = ['Reading', 'Traveling', 'Cooking'];
            $currentHobbies = explode(',', $item['hobbies']);
            foreach ($hobbiesList as $hobby) {
                $checked = in_array($hobby, $currentHobbies) ? 'checked' : '';
                echo "<input type='checkbox' name='hobbies[]' value='$hobby' $checked> <label>$hobby</label><br>";
            }
            ?>
        </div>

        <div>
            <input type="submit" value="Update">
        </div>
    </form>
</body>
</html>
