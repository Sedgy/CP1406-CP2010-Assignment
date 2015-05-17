<?php
include("userDbConnection.php");

session_start();

error_reporting(E_ALL);

if (!isset($_SESSION['username']))
{
    if (isset($_POST['username']) && $_POST['username'] != NULL && isset($_POST['password']) && $_POST['password'] != NULL)
	{
        $check = $dbh->query("SELECT * FROM users WHERE username = \"$_POST[username]\" AND password = \"$_POST[password]\"");
        $check->setFetchMode(PDO::FETCH_ASSOC);
        $result = $check->fetch();

        if($result['password'] == $_POST['password']){

            $_SESSION['username'] = $_POST['username'];
            $_SESSION['msg'] = "Logged in!";
            session_regenerate_id();

            $typeCheck = $dbh->query("SELECT type FROM users WHERE username = \"$_POST[username]\"");
            $typeCheck->setFetchMode(PDO::FETCH_ASSOC);
            $typeResult = $typeCheck->fetch();
            if($typeResult['type'] == "admin"){
                $_SESSION['type'] = "admin";
            }
            else
            {
                $_SESSION['type'] = "unpaid";
            }
        }
        else
        {
            $_SESSION['msg'] = "Invalid username and/or password!";
            header("Location: login.php");
            exit();
        }

	}
	else 
	{
        $_SESSION['debuggingUser'] = $_POST['username'];
        $_SESSION['debuggingPass'] = $_POST['password'];
		$_SESSION['msg'] = "You must enter your details first.";
		header("Location: login.php");
		exit();
	}
}
?>