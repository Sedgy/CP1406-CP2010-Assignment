<?php
include("dbconnection.php");

$debugOn = true;

if ($_REQUEST['submit'] == "X")
{
    //Deletes the uploaded file of the artist.
    $sql1 = "SELECT * FROM artists WHERE id = '$_REQUEST[id]'";
    foreach ($dbh->query($sql1) as $row){
        unlink("$row[filename]");
    }
    //Deletes everything associated with artist.
    $sql = "DELETE FROM artists WHERE id = '$_REQUEST[id]'";
    if ($dbh->exec($sql))
        header("Location: artistForm.php");

}
?>
<!doctype html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Confirmation Page | Milestone 1</title>
</head>

<body>
<h1>Completed</h1>
<?php
//Determines the request from the form.
if ($_REQUEST['submit'] == "Insert Entry")
{
    //Adds new artist to database.
    $sql = "INSERT INTO artists (name, summary, content) VALUES ('$_REQUEST[name]' ,'$_REQUEST[summary]' ,'$_REQUEST[content]')";

    echo "\n<p><strong>";
    if ($dbh->exec($sql)) {
        echo "Inserted $_REQUEST[name]";


        $target_dir = "db/musos/";
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

                $sqlImg = "UPDATE artists SET filename = \"$target_file\" WHERE name = \"$_REQUEST[name]\"";
                if($dbh->exec($sqlImg)){
                    echo "Filename added to database.<br><a href='addEvent.php'>Return</a>";
                }else{
                    echo "Filename not added to database.";
                }

            } else {
                echo "Sorry, there was an error uploading your file to the server.";
            }
        }



    }else{
        echo "Not inserted";
    }
}
else if ($_REQUEST['submit'] == "Update Entry")
{
    //Updates current artist in the database.
    $sql = "UPDATE artists SET name = '$_REQUEST[name]', summary = '$_REQUEST[summary]' , content = '$_REQUEST[content]' WHERE id = '$_REQUEST[id]'";
    echo "\n<p><strong>";
    if ($dbh->exec($sql))
        echo "Updated $_REQUEST[name]";
    else
        echo "Not updated";
}
else {
//    echo "This page did not come from a valid form submission.<br />\n";
    header('Location: index.php');
}
echo "</strong></p>\n";

$dbh = null;
?>

<p><a href="artistForm.php">Return to database test page</a></p>
</body>
</html>