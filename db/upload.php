<?php
include("dbconnection.php");

$target_dir = "musos/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Checks if file is an image file.
if(isset($_POST["submit"])) {
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

session_start();
//Prepares new filename.
$newName = $target_dir . $_SESSION['id'] . "." . $imageFileType;
//Rename new uploaded file.
rename($target_file, $newName);
$id = $_SESSION['id'];
//Stores new filename in database for ease of access.
$sql = "UPDATE artists SET filename = '$newName' WHERE id = '$id'";
//Check if filename was successful in the upload to the database.
if ($dbh->exec($sql)) {
    echo "\nImage has successfully been uploaded to the database";
}
else {
    echo "Something went wrong uploading file name to database";
}
//Close database connection.
$dbh = null;
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Upload Process Finished | Milestone 1</title>
</head>
<body>
<p><a href="index.php">Return</a></p>
</body>
</html>