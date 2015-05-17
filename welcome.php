<?php require("authenticate.php"); ?>
<!doctype html>
    <html>
<head>
    <meta charset="utf-8">
    <title>Welcome | Townsville Community Music Centre</title>
    <link rel="stylesheet" href="mainstylesheet.css">
    <link rel="stylesheet" href="headerfooterstyle.css">
</head>
<body>

<?php include("incHeader.php");

echo "<p>Welcome $_SESSION[username] </p>";

include"incFooter.php"?>

</body>
</html>
