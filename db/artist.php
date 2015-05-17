<?php
session_start();
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
    <link rel="stylesheet" href="../mainstylesheet.css">
</head>
<body>

<div class="header">

    <?php
    if(!isset($_SESSION['username'])) {?>
        <a href="../login.php" class="login">Login</a>
    <?php }else{?>
        <a href="../logout.php" class="login">Logout</a>
    <?php }?>
    <img src="../images/TCMCtrans10067.gif" class="logo">
    <nav class="header-navigation">
        <span style="text-align: center">
        <a href="../index.php">Home</a>
        <a href="#">Events</a>
        <a href="../db/index.php">Musicians</a>
        <a href="#">Membership</a>
        <a href="#">Bulletin Board</a>
        <a href="#">Sponsors</a>
        <a href="#">About Us</a></span>
    </nav>
</div>


<?php
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
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
<?php }?>

<footer class="site-footer">

    <div class="footer-navigation">
        <ul>
            <li>
                <a href="#">
                    Home
                </a>
            </li>

            <li>
                <a href="#">
                    Events
                </a>
            </li>

            <li>
                <a href="#">
                    Musicians
                </a>
            </li>

            <li>
                <a href="#">
                    Membership
                </a>
            </li>

            <li>
                <a href="#">
                    Bulletin Board
                </a>
            </li>

            <li>
                <a href="#">
                    Sponsors
                </a>
            </li>

            <li>
                <a href="#">
                    About Us
                </a>
            </li>
        </ul>
    </div>

    <div class="footer-contact">
        <table class="">
            <tr>
                <th>Contact Details:</th>
            </tr>
            <tr>
                <td>
                    Phone
                </td>
                <td>
                    07 4724 2086
                </td>
            </tr>
            <tr>
                <td>
                    Mobile
                </td>
                <td>
                    0402 255 182
                </td>
            </tr>
            <tr>
                <td>
                    Email
                </td>
                <td>
                    admin@townsvillemusic.org.au
                </td>
            </tr>
            <tr>
                <td>
                    Postal Address
                </td>
                <td>
                    PO Box 1006, Townsville, QLD 4810
                </td>
            </tr>
            <tr>
                <td>
                    Address
                </td>
                <td>
                    Townsville Civic Theatre, 41 Boundary Street,<br>
                    Townsville, QLD 4810
                </td>
            </tr>
        </table>
    </div>
</footer>

</body>

</html>

