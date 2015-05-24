<?php
session_start();
include("dbconnection.php");
error_reporting(0);
?>
<!doctype html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <?php
    //Dynamic page title according to the selected artist.
    $sql = "select * from artists WHERE (id = $_GET[id])";
    foreach($dbh->query($sql) as $row){
        echo "<title>$row[name] | Milestone 1</title>";
    }
    ?>
    <title>Artist | Milestone1</title>
    <link rel="stylesheet" href="mainstylesheet.css">
    <link rel="stylesheet" href="headerfooterstyles.css">
</head>
<body>


<?php
include("incHeader.php");

    //Dynamic display of artist information and image.
    $sql = "select * from artists WHERE (id = $_GET[id])";
    $_SESSION['id'] = $_GET['id'];
    foreach ($dbh->query($sql) as $rows){
        echo "<h1>$rows[name]</h1>\n<img src='$rows[filename]'><p>$rows[content]</p>";
    }
$dbh = null;
?>

<!--Image upload for artist.-->

<?php if($_SESSION['type'] == "admin"){?>
    <h2>Admin Controls</h2>
    <p>Upload an image for the band if there is none.</p>
<form action="uploadMusoImage.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
<?php }
include("incFooter.php");
?>



</body>

</html>

