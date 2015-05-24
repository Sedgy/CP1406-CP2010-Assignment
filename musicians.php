<?php
session_start();
include("dbconnection.php");
error_reporting(0);
?>
<!doctype html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Home | Milestone 1</title>
    <link rel="stylesheet" href="mainstylesheet.css">
    <link rel="stylesheet" href="headerfooterstyles.css">
</head>
<body>

<?php
include("incHeader.php");
?>


<section class="musician-content">
    <h1>Current Artist</h1>
    <table class="current-artists-table">
        <?php
        //Produces a table using the database.
        $sql = "SELECT * FROM artists";
        foreach ($dbh->query($sql) as $row)
        {
            $path = pathinfo("musos/'$row[id]'");
            echo "<tr>\n<td><a href='artist.php?id=$row[id]' title='Click for more information.'><strong>", $row['name'], "</strong></a></td>\n<td><img src='", $row['filename'], "' class='artist-img' width='200' height='100'></td><td>", $row['summary'], "</td>\n</tr>\n";
        }
        //db connection close
        $dbh = null;
        ?>
    </table>

    <?php if($_SESSION['type'] == 'admin'){?>
    <h2>Admin Controls</h2>
    <p><a href="artistForm.php" title="Add, update and delete entries">Form</a></p>
    <?php }else{}?>
</section>

<?php
include("incFooter.php");
?>

</body>
</html>