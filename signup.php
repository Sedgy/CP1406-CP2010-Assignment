<?php session_start();
error_reporting(E_ALL)?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Become A Member | Townsville Community Music Centre</title>
<link rel="stylesheet" href="mainstylesheet.css">
<link rel="stylesheet" href="headerfooterstyle.css">
</head>
<body>


<?php
include("incHeader.php");

if(!isset($_SESSION['type'])){
?>



<div class="sign-up-content">

    <div>
        <h2>Membership</h2>
        <p>You can support the Music Centre by becoming a Member and derive some benefits for yourself at the same time.
            <br>Your subscription helps to keep us operating and we provide substantial discounts whenever possible.</p>
        <p>For the Music Centre's own events, Members' ticket discounts can be as high as 50%!</p>
        <p><strong>The Music Centre is also registered as a Deductible Gift Recipient. Any extra donations are
                tax-deductible!</strong></p>
    </div>


    <div class="sign-up-input">
        
    <h2>Sign-Up</h2>

    <div class="disclaimer">
        <p>
        This info will be sent to our database and then approved by administration when payment is made. <br>You will be
        you will be notified when the payment has gone through. <br>The benefits of membership will not be active until administrations approval.
        </p>
        <p>Once your account has been made you will be able to see the payment types and more information.</p>
    </div>


        
    <form action="adduser.php" method="post">
        <p>* = required</p>
        <table>
            <tr>
                <td><label for="username">Username:*</label></td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td><label for="firstname">First Name:</label></td>
                <td><input type="text" name="firstname"></td>
            </tr>
            <tr>
                <td><label for="surname">Surname:*</label></td>
                <td><input type="text" name="surname"></td>
            </tr>
            <tr>
                <td><label for="address">Address:*</label></td>
                <td><input type="text" name="address"></td>
            </tr>
            <tr>
                <td><label for="phoneday">Phone Day/s:</label></td>
                <td><input type="text" name="phoneday"></td>
            </tr>
            <tr>
                <td><label for="hours">After Hours:</label></td>
                <td><input type="text" name="hours"></td>
            </tr>
            <tr>
                <td><label for="mobile">Mobile Number:*</label></td>
                <td><input type="number" name="mobile"></td>
            </tr>
            <tr>
                <td><label for="email">Email:*</label></td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td><label for="password">Password:*</label></td>
                <td><input type="password" name="password" ></td>
            </tr>

        </table>

    <input type="submit" name="submit" id="submit" value="Join">
        
    </form>
    </div>
<?php }else if($_SESSION['type'] == "unpaid"){?>
    <div class="payment">
    <h2>Payment Methods</h2>
    <div class="mail-details">
        <h3>Mail</h3>
        <p>Please make cheques payable to Townsville Community Music<br>Centre Inc, and post to:<br>
            PO Box 1006, Townsville, Qld 4810<br>
            Or  Deposit to account:
        </p>
        <table>
            <tr>
                <td>Account Name:</td>
                <td>Townsville Community Music Centre Inc.</td>
            </tr>
            <tr>
                <td>Account Number:</td>
                <td>141 475 053</td>
            </tr>
            <tr>
                <td>Bank:</td>
                <td>Bendigo Bank</td>
            </tr>
            <tr>
                <td>BSB Number:</td>
                <td>633 000</td>
            </tr>
        </table>
    </div>
    <div class="paypal-details">
        <h3>Visa, Mastercard or PayPal</h3>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_s-xclick" />
            <input type="hidden" name="hosted_button_id" value="GCRJ28AFLXURQ" />
            <input type="image" src="https://www.paypalobjects.com/en_AU/i/btn/btn_paynow_SM.gif" name="submit" alt="PayPal � The safer, easier way to pay online." />
            <img alt="" border="0" src="https://www.paypalobjects.com/en_AU/i/scr/pixel.gif" width="1" height="1" />
        </form>
    </div>
    <div class="donation">
        <h2>Donations</h2>
        <p><strong>The Music Centre is also registered as a Deductible Gift Recipient. Any extra donations are tax-deductible!</strong></p>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_s-xclick" />
            <input type="hidden" name="hosted_button_id" value="67K2M93WVJM2L" />
            <input type="image" src="https://www.paypalobjects.com/en_AU/i/btn/btn_donate_SM.gif" name="submit" alt="PayPal � The safer, easier way to pay online." />
            <img alt="" border="0" src="https://www.paypalobjects.com/en_AU/i/scr/pixel.gif" width="1" height="1" />
        </form>
    </div>

</div>
    <?php }else{?>
    <div class="donation">
        <p>Thank you for your current support though membership payments.<br> If you have some change and like what we are doing then read below.</p>
        <h2>Donations</h2>
        <p><strong>The Music Centre is also registered as a Deductible Gift Recipient. Any extra donations are tax-deductible!</strong></p>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_s-xclick" />
            <input type="hidden" name="hosted_button_id" value="67K2M93WVJM2L" />
            <input type="image" src="https://www.paypalobjects.com/en_AU/i/btn/btn_donate_SM.gif" name="submit" alt="PayPal � The safer, easier way to pay online." />
            <img alt="" border="0" src="https://www.paypalobjects.com/en_AU/i/scr/pixel.gif" width="1" height="1" />
        </form>
    </div>
    <?php }?>
</div>


<?php include("incFooter.php");?>

    

</body>
</html>