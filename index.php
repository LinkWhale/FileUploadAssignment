<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP FORM</title>
    <link rel="stylesheet" href="./CSS/style.css">
</head>
    <body>
        <h1>PHP FORM</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="flexbox">
                <div class="labels">
                    First name: <br>
                    Last name: <br>
                    Birthday: <br>
                </div>
                <div class="input">
                    <input type="text" name="fname"><br>
                    <input type="text" name="lname"><br>
                    <input type="text" name="date"><br>
                </div>
            </div>
            
            <input class="upload" type="file" name="file"><br>
            
            <input type="submit" name="submit">
        </form>
        <?php
   

    // Check if file already exists
    if(isset($_POST["submit"])) {
        //text input

        $fName = $_POST["fname"];
        $lName = $_POST["lname"];
        $birthDate = $_POST["date"];


        //Image upload
        $target_dir = "uploads/";
        $target_file = $target_dir . $_FILES["file"]["name"];
        $uploadOk = 1;
        if(file_exists($target_file)) {
            $uploadOk = 0;
        }
    
        // Check if its an image
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
            echo "error file is not an image";
            }

        // Check if file is small enough
        if($_FILES["file"]["size"] > 5000000) {
            $uploadOk = 0;
            echo "Error file too big";  
        }

        if($uploadOk == 1) {
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
            echo "<div class=\"output\"><img src=\"$target_file\" alt=\"uploaded file\"><p>$fName $lName<br>$birthDate</p></div>";
        }
    }


?>
    </body>
</html>