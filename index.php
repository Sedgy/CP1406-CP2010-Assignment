<?php session_start();
include("dbconnection.php");
?>
<!doctype html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Home | Townsville Community Music Centre</title>
    <link rel="stylesheet" href="mainstylesheet.css"/>
    <link rel="stylesheet" href="headerfooterstyles.css">
</head>
<body>

<?php include("incHeader.php");?>

<div class="about-us">
    <h2>About Us</h2>
    <p>Based in Townsville, we present concerts and workshops in a diverse range of genres,
    featuring both touring artists and locally-based professional and emerging artists.</p>
</div>
<?php if(!isset($_SESSION['username'])){?>
<div class="become-member" align="left">
    <h2>Become a Member</h2>
    <a href="signup.php"><button type="button" class="button">Sign Up</button></a>
    or
    <a href="login.php"><button type="button" class="button">Log In</button></a>
</div>
<?php }?>
<div class="upcoming-events">
    <h2>Upcoming Events</h2>
    <div class="events-content">
        <?php
        $count = 0;
        $sql = "SELECT * FROM events ORDER BY id ASC LIMIT 3";
        foreach($dbh->query($sql) as $rows){
            echo "<div class='event-", ++$count ,"'><img src='$rows[filename]' class='eventimage'><h4 class='event-artist'>$rows[artist]</h4><p class='event-sum'>$rows[eventsum]</p></div>";
        }
        ?>
    </div>
    
    <a href="events.php"><button type="button" class="event-button" >+<br><p class="seemore">See More<p></p></button></a>
    
</div>

<?php
include("incFooter.php");
?>

</body>
</html>

