<?php
include("eventDBConnection.php");

error_reporting(0);
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="#">
</head>
<body>

<?php

if($_REQUEST['add'] == "Add"){
    //no null values
    if($_REQUEST[artist] != NULL && $_REQUEST[date] != NULL && $_REQUEST[eventsum] != NULL &&
    $_REQUEST[time] != NULL && $_REQUEST[location] != NULL && $_REQUEST[price] != NULL && $_REQUEST[link] != NULL){

        $sql = "INSERT INTO events (artist, date, eventsum, time, location, price, link) VALUES (
'$_REQUEST[artist]' , '$_REQUEST[date]', '$_REQUEST[eventsum]', '$_REQUEST[time]', '$_REQUEST[location]',
 '$_REQUEST[price]', '$_REQUEST[link]')";

        if($dbh->exec($sql)){
            echo "<h2>" , $_REQUEST[artist], "'s event has been added</h2>";
        }
        else{
            echo "Something went wrong.";
        }
    }
    else
    {
        echo "Please enter all fields";
    }
}

?>

</body>
</html>