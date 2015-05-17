<?php
try {
    //Enables connection to database through handler.
    $dbh = new PDO("sqlite:db/events.sqlite");
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>