<?php
//session_start();
$filename = substr(strrchr($_SERVER['SCRIPT_NAME'], "/"), 1);
$name = substr($filename, 0, strrpos($filename, "."));
?>

<header>
    <a href="index.php">
        <img src="images/TCMCLogo.gif" width="150" height="100" alt="Home" title="Home"/>
    </a>

    <?php
    if(!isset($_SESSION['username'])){?>
    <div class="headerLogin">
        <a href="login.php" class="headerLoginElement"> Login </a>
        <a href="signup.php" class="headerLoginElement"> Sign Up </a>
    </div>
    <?php } else {?>
    <div class="headerLogin">
        <a href="logout.php" class="headerLoginElement"> Logout </a>
        <a href="signup.php" class="headerLoginElement"> Payment </a>
    </div>
    <?php }?>

    <div class="headerNav">
        <a href="index.php" class="headerNavElement" <?php if ($name == "index")echo 'id="activePage"'?>> Home </a>
        <a href="events.php" class="headerNavElement" <?php if ($name == "events")echo 'id="activePage"'?>> Events </a>
        <a href="db/musicians.php" class="headerNavElement" <?php if ($name == "db/index")echo 'id="activePage"'?>> Musicians </a>
        <a href="signup.php" class="headerNavElement" <?php if ($name == "signup")echo 'id="activePage"'?>> Membership </a>
        <a href="bulletin.html" class="headerNavElement" <?php if ($name == "bulletin")echo 'id="activePage"'?>> Bulletin Board </a>
        <a href="aboutus.html" class="headerNavElement" <?php if ($name == "aboutus")echo 'id="activePage"'?>> About Us </a>
    </div>
</header>