<?php
session_start();
include("dbconnection.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">  

<head>    
	<title> Townsville Community Music Centre - Events </title>    
    <link href="mainstylesheet.css" rel="stylesheet" >
    <link href="headerfooterstyles.css" rel="stylesheet">
	</head>
    
<body>


<?php
include("incHeader.php");
?>
<div class="event-content">
<?php if($_SESSION['type'] == 'admin') {

?>
    <h2>Admin Controls</h2>
    <form action="addEvent.php" method="post">
        <input type="submit" name="edit" id="add" value="Edit">
    </form>
    <?php }?>

<h2>Current Events</h2>
<?php
$sql = "SELECT * FROM events";
foreach($dbh->query($sql) as $row){ ?>

<div class='event-item'>
        <table class='event-table'>
            <tr>
                <td>
                    <?php echo "<h4>$row[artist]</h4><br>$row[eventsum]" ?>
                </td>
                <td>
                    <?php echo "<img src='",$row['filename'], "' class='eventpage-image' width='200' height='100'> " ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo "$row[time]<br>$row[location]<br>$row[price]"?>
                </td>
                <td>
                    <?php
                    if($row['link'] != NULL) {
                        echo "<a href='$row[link]'><img src='images/TShop300web.jpg'></a>";
                    }
                    ?>
                </td>
            </tr>
    </table>
</div>





<?php
}
echo "</div>";

include("incFooter.php");
?>

</body>
</html>