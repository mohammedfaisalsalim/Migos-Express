<?php include 'Loginbackend(Jackpart).php' ?>

<?php 
    if(isset($_SESSION['alert'])){
        echo "<script>alert('Register Successfully!');</script>";
    }
    unset($_SESSION['alert']);
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@1,500&family=Shizuru&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="MainMenu.css">
        <style>
            .gmap_iframe{
                z-index: -100;
            }
        </style>
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
                <li><a href="#"></a><a href="#Aboutus"><b>About Us</b></a>
                    <ul>
                        <li><a href="#ContactUs">Contact Us</a></li>
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

        <div id="Aboutus" class="firstrow">
            <p>About Us</p>
            <img class="downloadicon" src="downloadicon.gif" alt="Decoration Icon1">
            <img class="Icon1" src="AboutUsIcon1.png" alt="Decoration Icon1">
            <img class="dashline" src="dashline.png" alt="dashline Icon2">
            <img class="Icon2" src="AboutUsIcon2.png" alt="Decoration Icon2">
            <img class="dashline" src="dashline.png" alt="dashline Icon2">
            <img class="Icon3" src="AboutUsIcon3.png" alt="Decoration Icon3">
            <img class="uploadicon" src="uploadicon.gif" alt="Decoration Icon1">
        </div>

        <div class="secondrow">
            Who we are?
        </div>

        <div class="thirdrow">
            <img src="MIGOSlogo.png" alt="MIGOS Express logo">
            <div class="thirdrowinside"><b>Migos Express</b> is an express delivery company which provide “Online express services” to the customers. The top-notch modernized e-technology of our system can provide the best service to our guests.</div>
        </div>
        <div class="fourthrow">
            <div class="fourthrow1">Vision & Mission</div>
            <div class="fourthrow2">Vision</div>
            <div class="fourthrow2">Mission</div>
            <div class="fourthrow3">To be recognized as the most competitive Online Express Delivery services provider in Malaysia.</div>
            <div class="fourthrow3">To spread positive to our clients by providing high quality and efficiency services.</div>
            <div class="fourthrow4">*We are aim to covering our services to the whole of South East Asia.</div>
        </div>
        <div  class="fifthrow">
            <div id="ContactUs" class="fifthrow1">Contact Us</div>
            <div class="fifthrow2"><div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=500&amp;height=500&amp;hl=en&amp;q=Jalan Cheras Perdana Cheras, 43200 Balakong, Selangor&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://kokagames.com/">Koka Games</a></div><style>.mapouter{position:absolute; text-align:right;width:500px;height:500px;}.gmap_canvas {overflow:hidden;background:none!important;width:500px;height:500px;}.gmap_iframe {width:500px!important;height:500px!important;}</style></div></div>
            <div class="fifthrow2a">
                <div class="fifthrow3"><img src="mapmarkericon.gif"><div class="fifthrow4">MIGOS Express, C180, Cheras Selatan, 56000 Cheras, Selangor.</div></div>
                <div class="fifthrow3"><img src="phoneicon.png">1310-40-9100<br>03-6638225</div>
                <div class="fifthrow3"><img src="mailicon.gif"><div class="fifthrow4"><a href="mailto:support@migosexpress.my">support@migosexpress.my</a></div></div>
                <div class="fifthrow3"><img src="customerservice.png">Contact with us now!</div>
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
                <a href="#Aboutus" target="_self">About Us</a>
                <a href="#ContactUs" target="_self">Contact Us</a>
            </div>
        </div>
        
        <footer>
            © 2022 All right reserved. Development by MIGOS Express
        </footer>
        
        <script src="logout.js"></script>
    </body>
</html>