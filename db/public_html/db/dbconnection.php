<?php
try {
    //Enables connection to database through handler.
    $dbh = new PDO("sqlite:artists.sqlite");
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>