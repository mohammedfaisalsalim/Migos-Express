<?php include 'Loginbackend(Jackpart).php' ?>
<?php include 'LogininfoDatabase.php' ?>


<?php 

$S_name= $_SESSION['Sender_name'];
$S_contact = $_SESSION['Sender_contact'];
$S_address = $_SESSION['Sender_address'];
$R_name = $_SESSION['Receiver_name'];
$R_contact = $_SESSION['Receiver_contact'];
$R_address = $_SESSION['Receiver_address'];
$G_name = $_SESSION['Goods_name'];
$G_type = $_SESSION['Goods_type'];
$G_weight = $_SESSION['Goods_weight'];
$G_quantity = $_SESSION['Goods_quantity'];
$G_payment = $_SESSION['payment'];


$_EstimatedPrice =  (2*$G_weight)*1.06 + 10;

if (isset($_GET['submitted'])){
    include 'writebackdata.php';
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
                <li><a href="Shipping.php"><b>Shipping</b></a>
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

        <div class="title">Shipping Details</div>

        
        <div class="Container"> 
            <div class="reversebutton ">
                <a onclick="history.back()"><img src="return.png" alt="return to previous page"></a>
            </div>
            <div class="inputbox">
                <div class="inputbox-title"><img src="sendout.png">Sender Details</div>
                <div class="clear"></div>
                <div class="splitbox">
                    <div class="detailsleft-info">
                        Sender Name:
                    </div>
                    <div class="detailsright-info">
                        <?php echo $S_name?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="splitbox">
                    <div class="detailsleft-info">
                        Sender Contact:
                    </div>
                    <div class="detailsright-info">
                        <?php echo $S_contact?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="splitbox">
                    <div class="detailsleft-info">
                        Address:
                    </div>
                    <div class="detailsright-info">
                        <?php echo $S_address?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>



            <div class="inputbox">
                <div class="inputbox-title"><img src="receive.png">Receiver Details</div>
                <div class="clear"></div>
                <div class="splitbox">
                    <div class="detailsleft-info">
                        Receiver Name:
                    </div>
                    <div class="detailsright-info">
                        <?php echo $R_name?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="splitbox">
                    <div class="detailsleft-info">
                        Receiver Contact:
                    </div>
                    <div class="detailsright-info">
                        <?php echo $R_contact?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="splitbox">
                    <div class="detailsleft-info">
                        Address:
                    </div>
                    <div class="detailsright-info">
                        <?php echo $R_address?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>

            <div class="inputbox">
                <div class="inputbox-title"><img src="parcel.png">Parcel Details</div>
                <div class="clear"></div>
                <div class="splitbox">
                    <div class="detailsleft-info">
                        Goods Name:
                    </div>
                    <div class="detailsright-info">
                        <?php echo $G_name?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="splitbox">
                    <div class="detailsleft-info">
                        Goods Type:
                    </div>
                    <div class="detailsright-info">
                        <?php echo $G_type?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="splitbox">
                    <div class="detailsleft-info">
                        Goods Actual Weight:
                    </div>
                    <div class="detailsright-info">
                        <?php echo $G_weight?>kg   
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="splitbox">
                    <div class="detailsleft-info">
                        Goods Quantity:
                    </div>
                    <div class="detailsright-info">
                        <?php echo $G_quantity?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="splitbox">
                    <div class="detailsleft-info">
                        Payment By:
                    </div>
                    <div class="detailsright-info">
                        <?php echo $G_payment?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>


            <div class="pricingbox">
                Estimate Shipment Rate (Include tax): RM <?php echo $_EstimatedPrice ?>
            </div>

        <form method="get">
            <div class="submitbutton">
                <button type="submit" name="submitted" value="submit">Submit</button>
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