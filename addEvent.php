<?php
include("dbconnection.php");
session_start();

if($_SESSION['type'] == "admin"){

?>
<!doctype html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <title>Add Event</title>
    <link rel="stylesheet" href="mainstylesheet.css">
    <link rel="stylesheet" href="headerfooterstyles.css">
</head>
<body>
<?php
include("incHeader.php");
?>

<main class="addevent-content">

<form method="post" action="eventHandler.php" enctype="multipart/form-data">
    <h1>Admin Controls</h1>
    <p>Add Events to the event database.<br>The upcoming events will be displayed on the public event page and homepage.
    </p>
    <table class="addevent-table">

        <tr>
            <td>
            <label for="artist">Artist:</label>
            </td>
            <td>
            <input type="text" id="artist" name="artist" placeholder="Group Name">
            </td>
        </tr>
        <tr>
            <td>
            <label for="date">Expire Date:</label>
            </td>
            <td>
            <input type="text" id="date" name="date" placeholder="DD/MM/YYYY">
            </td>
        </tr>
        <tr>
            <td>
                <label for="eventsum">Event Summary:</label>
            </td>
            <td>
                <input type="text" id="eventsum" name="eventsum" placeholder="A good time...">
            </td>
        </tr>
        <tr>
            <td>
                <label for="time">Time:</label>
            </td>
            <td>
                <input type="text" id="time" name="time" placeholder="3:30pm Tuesday...">
            </td>
        </tr>
        <tr>
            <td>
                <label for="location">Location:</label>
            </td>
            <td>
                <input type="text" id="location" name="location" placeholder="Townsville Civic Theatre">
            </td>
        </tr>
        <tr>
            <td>
                <label for="price">Price:</label>
            </td>
            <td>
                <input type="text" id="price" name="price" placeholder="$25 Adult Free! for Children">
            </td>
        </tr>
        <tr>
            <td>
                <label for="link">TicketURL:</label>
            </td>
            <td>
                <input type="text" id="link" name="link" placeholder="Ticket shop link..">
            </td>
        </tr>
        <tr>
            <td>
                <label for="fileToUpload">Image Upload:</label>
            </td>
            <td>
                <input type="file" name="fileToUpload" id="fileToUpload">
            </td>
        </tr>

        <tr>
            <td>
                <input type="submit" name="add" id="add" value="Add">
            </td>
        </tr>

    </table>

</form>
<div class="event-form">

<?php
$sql = "SELECT * FROM events";

foreach($dbh->query($sql) as $rows){ ?>
<form id="deleteEventForm" name="deleteEventForm" method="post" action="eventHandler.php">

    <?php echo "Artist : <input type='text' name='artist' value=\"$rows[artist]\"/>
Expire Date : <input type='text' name='date' value=\"$rows[date]\" />
Event Summary : <input type='text' name='eventsum' value=\"$rows[eventsum]\"/>
Time : <input type='text' name='time' value=\"$rows[time]\"/>
Location : <input type='text' name='location' value=\"$rows[location]\"/>
Price : <input type='text' name='price' value=\"$rows[price]\"/>
Link : <input type='text' name='link' value=\"$rows[link]\"/>
<input type='hidden' name='id' value=\"$rows[id]\"/>"
    ?>
    <br><input type="submit" name="submit" value="Update Entry">
    <input type="submit" name="submit" value="X" class="deleteButton">

</form>


<?php
}
?>
    </div>
    </main>
<?php
include("incFooter.php");
?>


</body>
</html>
<?php }
else{
    header('Location: index.php');
} ?>