<?php session_start();?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home | Townsville Community Music Centre</title>
    <link rel="stylesheet" href="mainstylesheet.css"/>
    <link rel="stylesheet" href="headerfooterstyle.css">
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
    <a href="signup.php"><button type="button" class="sign-up-btn" onclick="">Sign Up</button></a>
    or
    <a href="login.php"><button type="button" class="log-in-btn">Log In</button></a>
</div>
<?php }?>
<div class="upcoming-events">
    <h2>Upcoming Events</h2>
    <div class="events-content">
    
</div>

<?php
include("incFooter.php");
?>

</body>
</html>

