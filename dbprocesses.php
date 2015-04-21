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
<head>
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
    if ($dbh->exec($sql))
        echo "Inserted $_REQUEST[name]";
    else
        echo "Not inserted";
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
    echo "This page did not come from a valid form submission.<br />\n";
}
echo "</strong></p>\n";

$dbh = null;
?>

<p><a href="artistForm.php">Return to database test page</a></p>
</body>
</html>