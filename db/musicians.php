<?php
session_start();
include("dbconnection.php");
error_reporting(0);
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home | Milestone 1</title>
    <link rel="stylesheet" href="../mainstylesheet.css">
    <link rel="stylesheet" href="../headerfooterstyle.css">
</head>
<body>

<?php
$filename = substr(strrchr($_SERVER['SCRIPT_NAME'], "/"), 1);
$name = substr($filename, 0, strrpos($filename, "."));
?>

<header>
    <a href="../index.php">
        <img src="../images/TCMCLogo.gif" width="150" height="100" alt="Home" title="Home"/>
    </a>

    <?php
    if(!isset($_SESSION['username'])){?>
        <div class="headerLogin">
            <a href="../login.php" class="headerLoginElement"> Login </a>
            <a href="../signup.php" class="headerLoginElement"> Sign Up </a>
        </div>
    <?php } else {?>
        <div class="headerLogin">
            <a href="../logout.php" class="headerLoginElement"> Logout </a>
            <a href="../signup.php" class="headerLoginElement"> Payment </a>
        </div>
    <?php }?>

    <div class="headerNav">
        <a href="../index.php" class="headerNavElement" <?php if ($name == "index")echo 'id="activePage"'?>> Home </a>
        <a href="../events.php" class="headerNavElement" <?php if ($name == "events")echo 'id="activePage"'?>> Events </a>
        <a href="../db/musicians.php" class="headerNavElement" <?php if ($name == "musicians")echo 'id="activePage"'?>> Musicians </a>
        <a href="../signup.php" class="headerNavElement" <?php if ($name == "signup")echo 'id="activePage"'?>> Membership </a>
        <a href="../bulletin.html" class="headerNavElement" <?php if ($name == "bulletin")echo 'id="activePage"'?>> Bulletin Board </a>
        <a href="../aboutus.html" class="headerNavElement" <?php if ($name == "aboutus")echo 'id="activePage"'?>> About Us </a>
    </div>
</header>

<h1>Current Artist</h1>

<section class="current_display">
    <table>
        <?php
        //Produces a table using the database.
        $sql = "SELECT * FROM artists";
        foreach ($dbh->query($sql) as $row)
        {
            $path = pathinfo("musos/'$row[id]'");
            echo "<tr>\n<td><a href='artist.php?id=$row[id]' title='Click for more information.'><strong>", $row['name'], "</strong></a></td>\n<td><img src='", $row['filename'], "' class='artist-img' width='200' height='100'></td><td>", $row['summary'], "</td>\n</tr>\n";
        }
        //db connection close
        $dbh = null;
        ?>
    </table>

    <?php if($_SESSION['type'] == 'admin'){?>
    <h2>Admin Controls</h2>
    <p><a href="artistForm.php" title="Add, update and delete entries">Form</a></p>
    <?php }else{}?>
</section>

<footer>
    <div id="footerNav">
        <a href="../index.php" class="footerNavElement"> Home </a> <br>
        <a href="../events.php" class="footerNavElement"> Events </a> <br>
        <a href="../db/musicians.php" class="footerNavElement"> Musicians </a> <br>
        <a href="../signup.php" class="footerNavElement"> Members </a> <br>
        <a href="../bulletin.html" class="footerNavElement"> Bulletin Board </a> <br>
        <a href="../aboutus.html" class="footerNavElement"> About Us </a> <br>
        <a href="../feeder.php" class="footerNavElement"> More Info </a> <br>
    </div>
    <div id="footerContact">
        <h1> Contact Details </h1> <br>
        <h2> Phone: </h2>
        <p> 07 4724 2086 </p> <br>
        <h2> Mobile: </h2>
        <p> 0402 255 182 </p> <br>
        <h2> Email: </h2>
        <p> admin@townsvillemusic.org.au </p> <br>
        <h2> Address: </h2>
        <p> PO Box 1006, Townsville, QLD 4810 </p> <br>
        <h2> Postal Address: </h2>
        <p> Townsville Civic Theatre, <br>
            41 Boundary Street, Townsville, QLD 4810 </p>
    </div>
    <div id="footerSponsors">
        <h1> Sponsors </h1>
        <a href="../sponsors.html"> <img src="../images/TCC.gif" width="79" height="100" alt="Townsville City Council" title="Title Text" class="footerSponsorsElement"/> </a>
        <a href="../sponsors.html"> <img src="../images/QG.gif" width="80" height="100" alt="Queensland Government Gambling Community Benefit Fund" Title="Qld Gov Gambling Community Benefit Fund" class="footerSponsorsElement"/> </a>
    </div>
</footer>

</body>
</html>