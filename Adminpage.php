<?php include 'Loginbackend(Jackpart).php' ?>
<?php include 'LogininfoDatabase.php' ?>

<?php
    date_default_timezone_set('UTC');
    $TodayDate = date("Y-m-d");

    if (isset($_GET)){
        if(isset($_GET['delete_x'])){
            $DeleteOrderquery = 'DELETE FROM ordertable WHERE Order_ID = "'.$_GET["Order_ID"].'";';
            $DeleteParcelquery = 'DELETE FROM parcel WHERE Parcel_ID = "'.$_GET["Parcel_ID"].'";';
            $DeleteOrder = mysqli_query($LinkToDatabase,$DeleteOrderquery);
            $DeleteParcel = mysqli_query($LinkToDatabase,$DeleteParcelquery);

            header('location:Adminpage.php');
            die();
        }
        if(isset($_GET['deliver_x'])){
            while ($AlldeliveredRow = mysqli_fetch_array($delivered)){
                $intInString = (int)filter_var($AlldeliveredRow['TraceNo'], FILTER_SANITIZE_NUMBER_INT);
                if ($Countingdeliveredid <= $intInString){
                    $Countingdeliveredid = $intInString;
                }
            }
            $Trace_no = 'TN'.$Countingdeliveredid + 1;

            $AddDeliveryquery = 'INSERT INTO delivery VALUES ("'.$Trace_no.'","'.$_GET["Order_ID"].'","'.$TodayDate.'")';
            $AddDelivery = mysqli_query($LinkToDatabase,$AddDeliveryquery);
            
            
            header('location:Adminpage.php');
            die();
        }
        
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@1,500&family=Shizuru&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="Adminpage.css">


        <title>#Admin MainMenu | MIGOS Express</title>
        <link rel="icon" type="image/x-icon" href="MIGOSlogo.png">
    </head>
    <body>
        <header class="header1">
            <a href="Adminpage.php"><img src="MIGOSlogo(S).png" alt="MIGOS Express logo"></a>
            <ul>
                <li><a href="#"><b>Manage Delivery</b></a>
                    <ul>
                        <li><a href="#">Confirmation For Delivery</a></li>
                    </ul>
                </li>
                <li><a href="DeliveryStatusUpdate.php"><b>Update Delivery Status</b></a></li>
                <li class='float-right'><b> <?php echo $Username ?> </b>
                    <ul>
                        <li><a id='LogOut' href='#'>Log out<img src='logout.png'></a></li>
                    </ul>
                </li>
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

        <div class="table-container">
            <table class="Order-Table">
                <tr>
                    <th>Order_ID</th>
                    <th>Sender_Name</th>
                    <th>Sender_Contact</th>
                    <th>Sender_Address</th>
                    <th>Receiver_Name</th>
                    <th>Receiver_Contact</th>
                    <th>Receiver_Address</th>
                    <th>Parcel_Details</th>
                    <th>Select</th>
                </tr>

        <?php 
            while ($AllOrderDetails = mysqli_fetch_array($AllOnholdOrder)){

                $ParcelDetailsquery = 'SELECT * FROM parcel WHERE (Parcel_ID = "'.$AllOrderDetails["Parcel_ID"].'")';
                $ParcelDetails= mysqli_query($LinkToDatabase,$ParcelDetailsquery);
                $ParcelRow = mysqli_fetch_array($ParcelDetails);

                $RowOfOrder = '<form method = "get">
                                    <tr>
                                        <input type="hidden" name="Order_ID" value="'.$AllOrderDetails["Order_ID"].'">
                                        <input type="hidden" name="Parcel_ID" value="'.$AllOrderDetails["Parcel_ID"].'">
                                        <td>'.$AllOrderDetails["Order_ID"].'</td>
                                        <td>'.$AllOrderDetails["SenderName"].'</td>
                                        <td>'.$AllOrderDetails["SenderPhoneNumber"].'</td>
                                        <td>'.$AllOrderDetails["SendAddress"].'</td>
                                        <td>'.$AllOrderDetails["ReceiverName"].'</td>
                                        <td>'.$AllOrderDetails["ReceiverPhoneNumber"].'</td>
                                        <td>'.$AllOrderDetails["ReceiveAddress"].'</td>
                                        <td>
                                            <p>'.$ParcelRow["Goods_name"].'</p>
                                            <p>Type: '.$ParcelRow["GoodsType"].'</p>
                                            <p>Weight: '.$ParcelRow["Weight_kg"].'kg</p>
                                            <p>Quantity: '.$ParcelRow["Quantity"].'</p>
                                        </td>
                                        <td class="choices">
                                            <input type="image" id="delivery" name="deliver" value="deliver" src="AboutUsIcon2.png" onmouseover="this.src=\'confirmdeliveryhover.png\';"
                                            onmouseout="this.src=\'AboutUsIcon2.png\';"><input type="image" id="delete" name="delete" value="delete" src="deleteorder.png"onmouseover="this.src=\'deletehover.png\';"
                                            onmouseout="this.src=\'deleteorder.png\';">
                                        </td>                
                                    </tr>
                                </form>';
                echo $RowOfOrder;
            }
        ?>
                <tr>
                    <td class="table-end" colspan="9"> -----------------------------------------------------------No More Order-----------------------------------------------------------</td>
                </tr>
            </table>
        </div>



        <!--vvvvv Footer vvvvv-->
        <div class="divfoot">
            <div class="divfoot1">
                <h3>e</h3>
            </div>
            <div class="divfoot2">
                <h3>Manage Delivery</h3>
                <a href="Adminpage.php" target="_self">Confirmation For Delivery</a>
            </div>
            <div class="divfoot3">
                <h3>Update Status</h3>
                <a href="DeliveryStatusUpdate.php" target="_self">Update Delivery Status</a>
            </div>
        </div>
        
        <footer>
            © 2022 All right reserved. Development by MIGOS Express
        </footer>
        
        <script src="logout.js"></script>
    </body>
</html>