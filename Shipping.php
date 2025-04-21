<?php include 'Loginbackend(Jackpart).php' ?>
<?php include 'LogininfoDatabase.php' ?>

<?php
if (isset($_POST['SubmitOrder'])){    
    $_SESSION['Sender_name'] = $_POST['Sender_name'];
    $_SESSION['Sender_contact'] = $_POST['Sender_contact'];
    $_SESSION['Sender_address'] = $_POST['Sender_address'];
    $_SESSION['Receiver_name'] = $_POST['Receiver_name'];
    $_SESSION['Receiver_contact'] = $_POST['Receiver_contact'];
    $_SESSION['Receiver_address'] = $_POST['Receiver_address'];
    $_SESSION['Goods_name'] = $_POST['Goods_name'];
    $_SESSION['Goods_type'] = $_POST['Goods_type'];
    $_SESSION['Goods_weight'] = $_POST['Goods_weight'];
    $_SESSION['Goods_quantity'] = $_POST['Goods_quantity'];
    $_SESSION['payment'] = $_POST['payment'];

    header("location: shippingconfirmation.php");
    die();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@1,500&family=Shizuru&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="shipping.css">


        <title>#TOP 10 Delivery services in Malaysia | MIGOS Express</title>
        <link rel="icon" type="image/x-icon" href="MIGOSlogo.png">
    </head>
    <body>
        <header class="header1">
            <a href="MainMenu.php"><img src="MIGOSlogo(S).png" alt="MIGOS Express logo"></a>
            <ul>
                <li><a href="#"><b>Shipping</b></a>
                    <ul>
                        <li><a href="<?php echo $ShippingLink?>">Domestic Shipping</a></li>
                    </ul>
                </li>
                <li><a href="#"><b>Services</b></a>
                    <ul>
                        <li><a href="track.php">Tracking Order</a></li>
                        <li><a href="delivery-time.php">Estimate Delivery time</a></li>
                    </ul>
                </li>
                <li><a href="#"></a><a href="MainMenu.php#Aboutus"><b>About Us</b></a>
                    <ul>
                        <li><a href="#MainMenu.php#ContactUs">Contact Us</a></li>
                    </ul>
                </li>
                <?php echo $LoginStatus; ?>
            </ul>
        </header>
                
        <form method="$_GET">
            <div id="LogoutConfirm">
                <h1>Are You Leaving?</h1>
                <button id="yes" name="yes">Yes</button>
                <button id="no" name="no">No</button>
            </div>
        </form>
                    
        <!--^^^^^ Header ^^^^^-->
        <div class="behind-header"></div>

        <div class="title">Shipping Details</div>

        <form method="post">
        <div class="Container"> 
            <div class="inputbox">
                <div class="inputbox-title"><img src="sendout.png">Sender Details</div>
                <div class="clear"></div>
                <div class="splitbox-left">
                    <input type="text" name="Sender_name" id="Sender_name" class="inputbox1" placeholder="Name" required minlength= "5" maxlength="25">
                    <input type="text" name="Sender_contact" id="Sender_contact" class="inputbox1" placeholder="Phonenumber" required minlength= "10" maxlength="11" pattern="[0-9]+">
                </div>
                <div class="splitbox-right">
                    <textarea name="Sender_address" id="Sender_address" class="inputbox2" placeholder="Address" required minlength= "10"></textarea>
                </div>
                <div class="clear"></div>
            </div>
            <div class="inputbox">
                <div class="inputbox-title"><img src="receive.png">Receiver Details</div>
                <div class="clear"></div>
                <div class="splitbox-left">
                    <input type="text" name="Receiver_name" id="Receiver_name" class="inputbox1" placeholder="Name" required minlength= "5" maxlength="25">
                    <input type="text" name="Receiver_contact" id="Receiver_contact" class="inputbox1" placeholder="Phonenumber" required minlength= "10" maxlength="11" pattern="[0-9]+">
                </div>
                <div class="splitbox-right">
                    <textarea name="Receiver_address" id="Receiver_address" class="inputbox2" placeholder="Address" required minlength= "10"></textarea>
                </div>
                <div class="clear"></div>
            </div>
            <div class="inputbox">
                <div class="inputbox-title"><img src="parcel.png">Parcel Details</div>
                <div class="clear"></div>
                <div class="splitbox-left">
                    <input type="text" name="Goods_name" id="Goods_name" class="inputbox1" placeholder="Goods Name" required minlength= "5" maxlength="25">
                    <div class="parcel-label">Select Goods Type</div>
                    <select name="Goods_type" id="Goods_type" class="inputbox1" required>
                        <option value="Parcel">Parcel</option>
                        <option value="Document">Document</option>
                    </select>
                    <div class="parcel-label">Select Payment By</div>
                    <select name="payment" id="payment" class="inputbox1" required>
                        <option value="Sender">Sender</option>
                        <option value="Receiver">Receiver</option>
                    </select>
                </div>
                <div class="splitbox-right">
                    <div class="empty"></div>
                    <div class="parcel-label">Goods Actual Weight(kg)</div>
                    <input type="number" name="Goods_weight" id="Goods_weight" class="inputbox1" placeholder="Goods Actual Weight" required min="1" max="70">
                    <div class="parcel-label">Goods Quantity</div>
                    <input type="number" name="Goods_quantity" id="Goods_quantity" class="inputbox1" placeholder="Quantity" required min="1">
                </div>
                <div class="clear"></div>
            </div>
            <div class="submitbutton">
                <button type="submit" name="SubmitOrder">Submit</button>
            </div>
        </div>
        </form>


        <!--vvvvv Footer vvvvv-->
        <div class="divfoot">
            <div class="divfoot1">
                <h3>Shipping</h3>
                <a href="Shipping.php" target="_self">Domestic Shipping</a>
            </div>
            <div class="divfoot2">
                <h3>Services</h3>
                <a href="track.php" target="_self">Tracking Order</a>
                <a href="delivery-time.php" target="_self">Estimate Delivery time</a>
            </div>
            <div class="divfoot3">
                <h3>Info</h3>
                <a href="MainMenu.php" target="_self">About Us</a>
                <a href="MainMenu.php" target="_self">Contact Us</a>
            </div>
        </div>
        
        <footer>
            © 2022 All right reserved. Development by MIGOS Express
        </footer>
        
        <script src="logout.js"></script>
    </body>
</html>