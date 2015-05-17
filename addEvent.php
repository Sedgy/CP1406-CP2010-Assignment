<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add Event</title>
    <link rel="stylesheet" href="#">
</head>
<body>

<form method="post" action="eventHandler.php">
    <h1>Admin Controls</h1>
    <p>Add Events to the event database.<br>The upcoming events will be displayed on the public event page and homepage.
    </p>
    <table>

        <tr>
            <td>
            <label for="artist">Artist:</label>
            </td>
            <td>
            <input type="text" id="artist" name="artist">
            </td>
        </tr>
        <tr>
            <td>
            <label for="date">Expire Date:</label>
            </td>
            <td>
            <input type="text" id="date" name="date">
            </td>
        </tr>
        <tr>
            <td>
                <label for="eventsum">Event Summary:</label>
            </td>
            <td>
                <input type="text" id="eventsum" name="eventsum">
            </td>
        </tr>
        <tr>
            <td>
                <label for="time">Time:</label>
            </td>
            <td>
                <input type="text" id="time" name="time">
            </td>
        </tr>
        <tr>
            <td>
                <label for="location">Location:</label>
            </td>
            <td>
                <input type="text" id="location" name="location">
            </td>
        </tr>
        <tr>
            <td>
                <label for="price">Price:</label>
            </td>
            <td>
                <input type="text" id="price" name="price">
            </td>
        </tr>
        <tr>
            <td>
                <label for="link">TicketURL:</label>
            </td>
            <td>
                <input type="text" id="link" name="link">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="add" id="add" value="Add">
            </td>
        </tr>

    </table>


</form>

<!--list of events in the database?-->

</body>
</html>