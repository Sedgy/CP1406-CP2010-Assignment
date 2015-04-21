<?php
include("dbconnection.php")
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home | Milestone 1</title>
</head>
<body>

<h1>Current Artist</h1>

<section class="current_display">
    <table>
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

    <p><a href="artistForm.php" title="Add, update and delete entries">Form</a></p>

</section>
</body>
</html>