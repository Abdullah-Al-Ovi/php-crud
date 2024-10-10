<?php
    include("dbconnect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information uploaded</title>
</head>

<body>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
        <div>
            <label for=""> Name:</label>
            <input required type="text" name="name" id="">
        </div>
        <div>
            <label for="">Phone:</label>
            <input required type="text" name="phone" id="">
        </div>
        <div>
            <label for="">Image:</label>
            <input required type="file" name="photo" id="">
        </div>
        <div>
            <input type="radio" name="gender" value="male">
            <label>Male</label>
        </div>
        <div>
            <input type="radio" name="gender" value="female">
            <label>Female</label>
        </div>
        <div>
        <input type="checkbox" name="hobbies[]" value="Reading">
        <label for="">Reading</label>
    </div>
    <div>
        <input type="checkbox" name="hobbies[]" value="Traveling">
        <label for="">Traveling</label>
    </div>
    <div>
        <input type="checkbox" name="hobbies[]" value="Cooking">
        <label for="">Cooking</label>
    </div>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>


<?php
   if($_SERVER['REQUEST_METHOD']==="POST"){
    if(empty($_POST["name"])){
        echo "Name is required";
    }
    else if(empty($_POST["phone"])){
        echo "Phone number is required";
    }
    else if(empty($_FILES["photo"]["name"])){
        echo "Photo is required";
    }

    else{
        $name = $_POST["name"];
        $phone =$_POST["phone"];
        $image = $_FILES["photo"]["name"];
        $gender = isset($_POST["gender"]) ? $_POST["gender"] : '';
        $hobbies = isset($_POST["hobbies"]) ? implode(",", $_POST["hobbies"]) : '';
        $dst = "./image/" .$image;
        $dst_db = "image/" .$image;
        
        if(move_uploaded_file($_FILES["photo"]["tmp_name"],$dst)){
           $query= "INSERT INTO student (name, phone, image, gender, hobbies) VALUES ('$name', '$phone', '$dst_db', '$gender', '$hobbies')";
            try{
                $result = mysqli_query($conn,$query);
                if($result){
                    echo "Information uploaded successful.";
                }
            }catch(mysqli_sql_exception $error){
                // echo "Error in file: {$error->getFile()} in line: {$error->getLine()}";
                echo "Error: " . $error->getMessage();
            }
            finally{
                $conn->close();
            }
        }
        else{
            echo "Something went wrong while uploading information";
        }
       
    }
   }
?>