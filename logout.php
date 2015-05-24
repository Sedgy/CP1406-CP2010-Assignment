<?php session_start();

    $username = $_SESSION['username'];
    unset($_SESSION['username']);
    unset($_SESSION['msg']);
    session_destroy();
?>
<!doctype html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <title>Thank You | Townsville Community Music Centre</title>
    <link rel="stylesheet" href="mainstylesheet.css">
    <link rel="stylesheet" href="headerfooterstyles.css">
</head>
<body>

<?php include("incHeader.php");?>
<main class="logout-content">
<h2>Log Out Successful</h2>
<p>Thank You for you time <?php echo $username; ?>.</p>
</main>

<?php include("incFooter.php")?>
</body>
</html>