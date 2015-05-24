<?php
include("dbconnection.php");

$target_dir = "db/events/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

//echo $target_file;
// Checks if file is an image file.
if(isset($_POST["add"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Checks if the file already exists.
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Checks the file size.
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// File format limits.
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if file made it through the whole process.
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// If previous was successful; go ahead and uploads said file.
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "\nThe file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded to the server.";
    } else {
        echo "Sorry, there was an error uploading your file to the server.";
    }
}

?>
