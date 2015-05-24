<?php require("authenticate.php"); ?>
<!doctype html>
    <html>
<head lang="en">
    <meta charset="utf-8">
    <title>Welcome | Townsville Community Music Centre</title>
    <link rel="stylesheet" href="mainstylesheet.css">
    <link rel="stylesheet" href="headerfooterstyles.css">
</head>
<body>

<?php include("incHeader.php");

echo "<main class='welcome-content'><p>Welcome $_SESSION[username] </p></main>";

include"incFooter.php"?>

</body>
</html>
