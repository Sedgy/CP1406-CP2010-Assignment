<?php
include("dbconnection.php");
session_start();

if($_SESSION['type'] == "admin"){

?>
<!doctype html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <title>Account Manager |</title>
    <link rel="stylesheet" href="headerfooterstyles.css" type="text/css">
    <link rel="stylesheet" href="mainstylesheet.css" type="text/css">
</head>
<body>

<?php
include("incHeader.php");
?>

<main class="accountmanager-content">
    <h3>List of accounts:</h3>
    <p>Here you can determine if an account has paid privileges or not</p>
    <div class="account">
<!--        <form id="payForm" method="post" action="payChange.php">-->
<!--            <table>-->
    <?php
    $sql = "SELECT * FROM users";
    foreach ($dbh->query($sql) as $rows) {
        if($rows['type'] != "admin"){?>

                <form id="payForm" method="post" action="payChange.php">
                    <table>


                    <tr>
                        <td>
                            <?php echo "$rows[username]";
                            echo "<input type='hidden' id='id' name='id' value='$rows[id]'>";
                            ?>
                        </td>
                        <td>
                            <?php echo"$rows[type]"?>
                        </td>
                        <td>
                            <input type='submit' name='paid' id='paid' value='Paid'>
                        </td>
                        <td>
                            <input type='submit' name='unpaid' id='unpaid' value='Not Paid'>
                        </td>
                    </tr>

                    </table>
                </form>


<?php
    }
    }
    ?>
<!--    </table>-->
<!--    </form>-->
    </div>
</main>

<?php
include ("incFooter.php");
?>

</body>
</html>

<?php }
else{
    header('Location: index.php');
}

?>