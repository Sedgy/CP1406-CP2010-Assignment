<?php
include("dbconnection.php")
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <?php
    //Dynamic page title according to the selected artist.
    $sql = "select * from artists WHERE (id = $_GET[id])";
    foreach($dbh->query($sql) as $row){
        echo "<title>$row[name] | Milestone 1</title>";
    }
    ?>
    <title>Artist | Milestone1</title>
</head>
<body>
<?php
    //Dynamic display of artist information and image.
    session_start();
    $sql = "select * from artists WHERE (id = $_GET[id])";
    $_SESSION['id'] = $_GET['id'];
    foreach ($dbh->query($sql) as $rows){
        echo "<h1>$rows[name]</h1>\n<img src='$rows[filename]'><p>$rows[content]</p>";
    }
$dbh = null;
?>

<!--Image upload for artist.-->
<p>Upload an image for the band if there is none.</p>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>


<p><a href="index.php">Return</a></p>
</body>

</html>

