<?php

include("userDbConnection.php");
error_reporting(0);

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="mainstylesheet.css">
    <link rel="stylesheet" href="headerfooterstyle.css">
</head>
    
<body>
    

    <?php

    include("incHeader.php");

    if ($_REQUEST['submit'] == "Join"){
        //check if username is already in the database.
        $check = $dbh->query("SELECT username FROM users WHERE username = '$_REQUEST[username]'");
        $check->setFetchMode(PDO::FETCH_ASSOC);
        $checkfetch = $check->fetch();
        if($_REQUEST[username] != NULL && $_REQUEST[surname] != NULL && $_REQUEST[address] != NULL &&
            $_REQUEST[mobile] != NULL && $_REQUEST[email] != NULL && $_REQUEST[password] != NULL){
            if($checkfetch['username']){

                echo"<h2>User already exists</h2><br><a href='signup.php'>Return to Sign-Up Page.</a>
";
            }
            else{

                $emailcheck = $dbh->query("SELECT email FROM users WHERE password = '$_REQUEST[email]'");
                $emailcheck->setFetchMode(PDO::FETCH_ASSOC);
                $emailfetch = $emailcheck->fetch();
                if(!$emailfetch['email']){

                    $sql = "INSERT INTO users (username, firstname, surname, address, phoneday, hours, mobile, email, password, type)
 VALUES ('$_REQUEST[username]', '$_REQUEST[firstname]', '$_REQUEST[surname]', '$_REQUEST[address]',
  '$_REQUEST[phoneday]', '$_REQUEST[hours]', '$_REQUEST[mobile]', '$_REQUEST[email]', '$_REQUEST[password]', 'unpaid')";
                    if ($dbh->exec($sql)){
                        echo "<h2>Welcome and thank you for joining our community!</h2><br><a href='login.php'>Login Now.</a>";
                    }
                    else{
                        echo"<h2>Failed, try again or contact administration.</h2><br><a href='signup.php'>Return to Sign-Up Page.</a>";
                    }
                }else{
                    echo "<h2>Email is already in use.</h2><br><a href='signup.php'>Return to Sign-Up Page.</a>";
                }
            }
        }else{
            echo "<h2>Please enter all the required information.</h2><br><a href='signup.php'>Return to Sign-Up Page.</a>";

        }

    }
    else{
        echo "<h2>Unauthorized Entry</h2>";
    }

    include("incFooter.php");
    ?>



</body>
</html>

