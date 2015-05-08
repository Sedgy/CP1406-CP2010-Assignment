<?php
include("dbconnection.php")
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form | Milestone 1</title>
</head>

<body>

<h1>Artist Database</h1>

<form id="insert" name="insert" method="post" action="dbprocesses.php">
    <fieldset class="subtleSet">
        <h2>Insert new Artist:</h2>
        <p>
            <label for="name">Name: </label>
            <input type="text" name="name" id="name">
        </p>
        <p>
            <label for="summary">Summary: </label>
            <input type="text" name="summary" id="summary"> *This will show on the main page.
        </p>
        <p>
            <label for="content">Content: </label>
            <input type="text" name="content" id="content"> *More details.
        </p>
        <p>
            <input type="submit" name="submit" id="submit" value="Insert Entry">
        </p>
    </fieldset>
</form>

<fieldset class="subtleSet">
    <h2>Current data:</h2>
    <?php
    //Produces a form that allows user to change the data.
    $sql = "SELECT * FROM artists";

    foreach ($dbh->query($sql) as $row)
    {
        ?>
        <form id="deleteForm" name="deleteForm" method="post" action="dbprocesses.php">
            <?php
            echo "Name : <input type='text' name='name' value='$row[name]' /> Summary: <input type='text' name='summary' value='$row[summary]'/> Content: <input type='text' name='content' value='$row[content]' /> \n";
            echo "<input type='hidden' name='id' value='$row[id]' />";
            ?>
            <input type="submit" name="submit" value="Update Entry" />
            <input type="submit" name="submit" value="X" class="deleteButton">
        </form>
    <?php
    }
    echo "</fieldset>\n";
    $dbh = null;
    ?>
    <p><a href="index.php">Return</a></p>
</body>
</html>