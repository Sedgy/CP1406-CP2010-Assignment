<?php
try {
    //Enables connection to database through handler.
    $dbh = new PDO("sqlite:db/tcmc.sqlite");
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>