<?php include 'Loginbackend(Jackpart).php' ?>
<?php include 'LogininfoDatabase.php' ?>


<!DOCTYPE html>
<html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@1,500&family=Shizuru&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="profile.css">


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

    <div class="big-box">
        <div class="content-box-left">
            <div class="box-left-choice">
                <a href="userprofile.php"><img src="profile.png"> My Profile</a>
            </div>
            <div class="box-left-choice chosen">
                <a href="#"><img src="magnifier.png">My Order</a>
            </div>
        </div>
        <div class="content-box-right">
            <div class="Ordertitle"> Your Order</div>

            <?php

            if ($_POST){
                $cancellation = "DELETE from parcel where (Parcel_ID = '".$_POST['parcelid']."')";
                mysqli_query($LinkToDatabase,$cancellation);
                $cancellation = "DELETE from ordertable where (Order_ID = '".$_POST['orderid']."');";
                mysqli_query($LinkToDatabase,$cancellation);

                header('location:userorder.php');
                die();
            }
        

            while ($UserOrderDetails = mysqli_fetch_array($Userorder)) {
                $noticedetails = '<p class="align-right">more details...</p>';

                $confirmorder = '<form method="post">
                                <input type="hidden" id="parcelid" name="parcelid" value="'.$UserOrderDetails["Parcel_ID"].'">
                                <input type="hidden" id="orderid" name="orderid" value="'.$UserOrderDetails["Order_ID"].'">
                                <input class="cancellation" type="submit" value="CANCEL">
                                </form>';
                
                $Eachdeliveredidquery = "Select * FROM delivery WHERE (Order_ID = '".$UserOrderDetails['Order_ID']."')";
                $Eachdeliveredid = mysqli_query($LinkToDatabase,$Eachdeliveredidquery); 
                while ($deliveredorderid = mysqli_fetch_array($Eachdeliveredid)){
                    if ($deliveredorderid['Order_ID'] == $UserOrderDetails['Order_ID']){
                        $TrackingID = $deliveredorderid['TraceNo'];
                        $confirmorder= '<p> Confirmed </p>';
                        $noticedetails ='<p class="align-right">Track_ID: '.$TrackingID.'</p>';
                    }
                }



                $RowbyRow ='<button type="button" class="dropdownuse">
                            <p class="align-left">Order_ID:' . $UserOrderDetails["Order_ID"] . '</p>
                            '.$noticedetails.'
                            <div class="Orderdetails">
                                    <div class="left-orderdetails">
                                        <div class="details">
                                            <div class="detailshead">
                                                <img src="logout.png">Sender
                                            </div>
                                            <div class="wrapper-detailscontent">
                                                <div class="detailscontent">
                                                    Name:
                                                </div>
                                                <div class="detailscontentanswer">
                                                    ' . $UserOrderDetails["SenderName"] . '
                                                </div>
                                                <div class="clearfloat"></div>
                                            </div>
                                            <div class="wrapper-detailscontent">
                                                <div class="detailscontent">
                                                    Contact Number:
                                                </div>
                                                <div class="detailscontentanswer">
                                                    ' . $UserOrderDetails["SenderPhoneNumber"] . '
                                                </div>
                                                <div class="clearfloat"></div>
                                            </div>
                                            <div class="wrapper-detailscontent">
                                                <div class="detailscontent">
                                                    Address:
                                                </div>
                                                <div class="detailscontentanswer">
                                                    ' . $UserOrderDetails["SendAddress"] . '
                                                </div>
                                                <div class="clearfloat"></div>
                                            </div>
                                        </div>
                                        <div class="details">
                                            <div class="detailshead">
                                                <img src="sender.png">Receiver
                                            </div>
                                            <div class="wrapper-detailscontent">
                                                <div class="detailscontent">
                                                    Name:
                                                </div>
                                                <div class="detailscontentanswer">
                                                    ' . $UserOrderDetails["ReceiverName"] . '
                                                </div>
                                                <div class="clearfloat"></div>
                                            </div>
                                            <div class="wrapper-detailscontent">
                                                <div class="detailscontent">
                                                    Contact Number:
                                                </div>
                                                <div class="detailscontentanswer">
                                                    ' . $UserOrderDetails["ReceiverPhoneNumber"] . '
                                                </div>
                                                <div class="clearfloat"></div>
                                            </div>
                                            <div class="wrapper-detailscontent">
                                                <div class="detailscontent">
                                                    Address:
                                                </div>
                                                <div class="detailscontentanswer">
                                                    ' . $UserOrderDetails["ReceiveAddress"] . '
                                                </div>
                                                <div class="clearfloat"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right-orderdetails">
                                        '.$confirmorder.'
                                    </div>
                                    <div class="clearfloat"></div>
                            </div>
                        </button>';
                echo $RowbyRow;
            }
            echo '<div class ="noorder">----------------------no  more order----------------------- </div>'

            ?>
        </div>
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

    <script type="text/javascript">
        document.getElementById('LogOut').onclick = function() {
            document.getElementById('LogoutConfirm').style.opacity = 0.95;
            document.getElementById('LogoutConfirm').style.pointerEvents = "auto";
        }
        document.getElementById('yes').onclick = function() {
            document.getElementById('LogoutConfirm').style.opacity = 0;
            document.getElementById('LogoutConfirm').style.pointerEvents = "none";
        }
        document.getElementById('no').onclick = function() {
            document.getElementById('LogoutConfirm').style.opacity = 0;
            document.getElementById('LogoutConfirm').style.pointerEvents = "none";
        }
    </script>
</body>

</html>