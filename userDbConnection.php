<?php
try {
    //Enables connection to database through handler.
    $dbh = new PDO("sqlite:db/users.sqlite");
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>