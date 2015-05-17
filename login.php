<?php session_start(); 

error_reporting(E_ALL);

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Log In | </title>
    <link rel="stylesheet" href="mainstylesheet.css">
    <link rel="stylesheet" href="headerfooterstyle.css">
</head>
<body>

<?php include("incHeader.php");



// print message from session, if one exists
if (isset($_SESSION['msg'])) {
    echo "<p style='color:red'>".$_SESSION['msg']."</p>";
}
// Only display the login form if the user is not logged in
if (!isset($_SESSION['username'])) {
?>

<form id="login" name="login" action="welcome.php" method="post">
    <h2>Login</h2>
    <label for="username">Username:</label>
    <input type="text" placeholder="Username" id="username" name="username"><br>
    <label for="password">Password:</label>
    <input type="password" placeholder="Password" id="password" name="password"><br>
    <input type="submit" name="submit" value="Login">
</form> <?php } ?>

<?php include("incFooter.php");?>

</body>
</html>