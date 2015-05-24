<?php include("dbconnection.php");
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">  

<head>    
	<title> Townsville Community Music Centre - About Us </title>    
	<meta charset="utf-8"/>
<link href="headerfooterstyles.css" rel="stylesheet" type="text/css">
    <link href="mainstylesheet.css" rel="stylesheet" type="text/css">
</head>
    
<body>
	<?php include("incHeader.php"); ?>
<main class="bulletin-content">
    <?php
    if (isset($_SESSION['username'])) {
    ?>


        <form method="post" class="bb-form" action="bulletinHandler.php" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        <label for="title">Post Title:</label>
                        <input type="text" name="title" id="title">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="content">Post:</label>
                        <textarea name="content" rows="4" cols="50" id="content"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="contact">Contact Email:</label>
                        <input type="text"  name="contact" id="contact">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="fileToUpload">Image Upload:</label>
                        <input type="file" name="fileToUpload" id="fileToUpload">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="post" value="Post">
                    </td>
                </tr>


            </table>
        </form>

        <?php }?>

      <h2>Extra! Extra! Read All About It!</h2>
        <p>Here you will find everything you need to know about what is happening in the community of musicians. This is a place where people can post requests and pleas for help from other musicians in the area. <br>
        Anything that is posted here will only be available to be viewed for one month upon upload. If the post needs to be up for longer, <a href="signup.php">members</a> can pay for extended expiration time.</p>
        <p>If you would like to have something of your own posted up on the Bulletin Board please contact <strong>administration</strong> at Townsville Community Music Centre</p>

        <?php

        $sql = "SELECT * FROM bulletinboard";
        foreach ($dbh->query($sql) as $rows) { ?>
        <form id="deleteBBForm" name="deleteBBForm" method="post" action="bulletinHandler.php">
            <?php
            echo "<div class='bbpost'><h3 class='bbtitle'>$rows[title] | $rows[username]</h3><p class='date'>$rows[date]</p><p class='bbcontent'>$rows[content]</p><p class='bbcontact'>Contact: $rows[contact]</p><img src='$rows[filename]' class='bbimage'></div><input type='hidden' name='id' value='$rows[id]'>";
            if($_SESSION['username'] == $rows['username'] || $_SESSION['type'] == 'admin') {
                echo "<input type = 'submit' name = 'submit' value = 'X' class='deleteButton'>";
                } ?>
            </form>
            <?php
            } ?>
</main>

    <?php include("incFooter.php")?>

</body>
</html>