<?php
include ("dbconnection.php");

if($_POST['paid'] == 'Paid'){
    $sql = "UPDATE users SET type = 'paid' WHERE id = $_POST[id]";
    if($dbh->exec($sql))
    {
        header("Location: accountManager.php");
    }
}elseif($_POST['unpaid'] == "Not Paid"){

    $sql = "UPDATE users SET type = 'unpaid' WHERE id = $_POST[id]";
    if($dbh->exec($sql))
    {
        header("Location: accountManager.php");

    }
}else{
//    header('Location: index.php');
}
