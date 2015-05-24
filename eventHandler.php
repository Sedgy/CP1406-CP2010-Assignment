<?php
include("dbconnection.php");

error_reporting(0);
?>
<!doctype html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="mainstylesheet.css">
    <link rel="stylesheet" href="headerfooterstyles.css">
</head>
<body>

<?php
include("incHeader.php");

if($_REQUEST['add'] == "Add"){
    //no null values
    if($_REQUEST[artist] != NULL && $_REQUEST[date] != NULL &&  $_REQUEST[time] != NULL && $_REQUEST[location] != NULL ){

        $sql = "INSERT INTO events (artist, date, eventsum, time, location, price, link) VALUES (
'$_REQUEST[artist]' , '$_REQUEST[date]', '$_REQUEST[eventsum]', '$_REQUEST[time]', '$_REQUEST[location]',
 '$_REQUEST[price]', '$_REQUEST[link]')";

        if($dbh->exec($sql)){
            echo "<h2>" , $_REQUEST[artist], "'s event has been added</h2>";
            $target_dir = "db/events/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);



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


            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";

            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "\nThe file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded to the server.";
                    $sqlImg = "UPDATE events SET filename = \"$target_file\" WHERE artist = \"$_REQUEST[artist]\"";
                    if($dbh->exec($sqlImg)){
                        echo "Filename added to database.<br><a href='addEvent.php'>Return</a>";
                    }else{
                        echo "Filename not added to database.";
                    }
                } else {
                    echo "Sorry, there was an error uploading your file to the server.";
                }
            }
        }
        else{
            echo "Something went wrong.";
        }

    }
    else
    {
        echo "Please enter all fields";
    }
}elseif($_REQUEST['submit'] == "X"){
    $sqlfilename = "SELECT filename FROM events WHERE id = '$_REQUEST[id]'";
//    echo $sqlfilename;
    foreach($dbh->query($sqlfilename) as $entry){
//        echo "$entry[filename]";
        unlink("$entry[filename]");
    }

    $sqlDel = "DELETE FROM events WHERE id = '$_REQUEST[id]'";
    if($dbh->exec($sqlDel)){
        header("Location: addEvent.php");

    }
}elseif($_REQUEST['submit'] == "Update Entry"){
    $sqlupdate = "UPDATE events SET artist = '$_REQUEST[artist]', date = '$_REQUEST[date]' , eventsum = '$_REQUEST[eventsum]',
 time = '$_REQUEST[time]', location = '$_REQUEST[location]', price = '$_REQUEST[price]', link = '$_REQUEST[link]'  WHERE id = '$_REQUEST[id]'";
    echo "\n<p><strong>";
    if ($dbh->exec($sqlupdate))
        echo "Updated $_REQUEST[artist]<br><a href='addEvent.php'>Return</a>";
    else
        echo "Not updated";
} else {
    header('Location: index.php');
}


include("incFooter.php");

?>

</body>
</html>