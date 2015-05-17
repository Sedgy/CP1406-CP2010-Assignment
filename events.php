<?php
session_start();
include("eventDBConnection.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">  

<head>    
	<title> Townsville Community Music Centre - Events </title>    
    <link rel="stylesheet" href="mainstylesheet.css">
    <link href="headerfooterstyle.css" rel="stylesheet" type="text/css">
	</head>
    
<body>


<?php
include("incHeader.php");
?>

<h1>WIP</h1>
<?php
$sql = "SELECT * FROM events";
foreach($dbh->query($sql) as $row){

    echo "<div class='event-item'><table><tr><td>",$row['artist'] ,"<br>", $row['eventsum'] ,"</td><td>Img</td></tr><tr>
<td>",$row['time'],"<br>",$row['location'],"<br>",$row['price'],"</td><td><a href='$row[link]'><img src='images/TShop300web.jpg'></a></td></tr></table></div>";

};

if($_SESSION['type'] == 'admin') {

    ?>
    <h2>Admin Controls</h2>
    <form action="addEvent.php" method="post">
        <input type="submit" name="edit" id="add" value="Edit">
    </form>


<?php
}
include("incFooter.php");
?>


</body>
</html>