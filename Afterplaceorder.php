<?php include 'Loginbackend(Jackpart).php' ?>
<?php include 'LogininfoDatabase.php' ?>

<?php 
    $NeworderID = $_SESSION['Neworderid'];
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
                        <li><a href="MainMenu.php#ContactUs">Contact Us</a></li>
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

        
        <div class="Container orange-background"> 
            <div class="announcebox">
                <div class="announcebox-title">Order Successful !</div>
                <div class="announcebox-content">Thank you for using MIGOS Express Services</div>
                <div>Here is your order information</div>
                <div class="announcebox-content bigger">Order_ID: <?php echo $NeworderID?></div>
                <div>You can also view all the Order_ID in your profile. </div>
                <div class="orderagain"><a href="Shipping.php" class="nodecorate"><<< New Order</a></div>
                <div class="gohomepage"><a href="MainMenu.php" class="nodecorate">Homepage >>></a></div>
            </div>
        </div>

        <!--vvvvv Footer vvvvv-->
        <div class="divfoot">
            <div class="divfoot1">
                <h3>Shipping</h3>
                <a href="<?php echo $ShippingLink?>" target="_self">Domestic Shipping</a>
            </div>
            <div class="divfoot2">
                <h3>Services</h3>
                <a href="track.php" target="_self">Tracking Order</a>
                <a href="delivery-time.php" target="_self">Estimate Delivery time</a>
            </div>
            <div class="divfoot3">
                <h3>Info</h3>
                <a href="MainMenu.php#Aboutus" target="_self">About Us</a>
                <a href="MainMenu.php#ContactUs" target="_self">Contact Us</a>
            </div>
        </div>
        
        <footer>
            © 2022 All right reserved. Development by MIGOS Express
        </footer>
        
        <script src="logout.js"></script>
    </body>
</html>