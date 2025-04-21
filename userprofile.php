<?php include 'Loginbackend(Jackpart).php' ?>
<?php include 'LogininfoDatabase.php' ?>

<?php 
    while ($UserPersonalDetails = mysqli_fetch_array($UserData)){
        if ($ReceiveVariable == $UserPersonalDetails['PhoneNumber']){
            $UserName = $UserPersonalDetails['Name'];
            $UserAddress = $UserPersonalDetails['Address'];
        }
    }

    
    if ($_POST){
        $newname = $_POST['name'];
        $newaddress =$_POST['Address'];
        $updatememberdetail = "UPDATE member SET Name='".$newname."', Address='".$newaddress."' where PhoneNumber='".$ReceiveVariable."' ";
        mysqli_query($LinkToDatabase,$updatememberdetail);

        header('location:userprofile.php');
        die();
    }
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@1,500&family=Shizuru&display=swap"
        rel="stylesheet">
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
            <div class="box-left-choice chosen">
                <a href="#"><img src="profile.png"> My Profile</a>
            </div>
            <div class="box-left-choice">
                <a href="userorder.php"><img src="magnifier.png">My Order</a>
            </div>
        </div>
        <div class="content-box-right">
            <div class="content-wrap-input">
                <form method="post">
                    Name:
                    <textarea class="content-box-input pointer-unavailable" type="text" id="name"
                        name="name"  max-length ="20"><?php echo $UserName?></textarea>
                    Address:
                    <textarea class="content-box-input address-input pointer-unavailable" type="text" id="Address"
                        name="Address" max-length ="200"><?php echo $UserAddress ?></textarea>
                    Phonenumber:
                    <textarea class="content-box-input pointer-unavailable" type="text" id="Phonenumber"
                        name="Phonenumber"><?php echo $ReceiveVariable?></textarea>
                    <input type="button" id="edit" class="edit" value="Edit">
                </form>
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
        document.getElementById('LogOut').onclick = function () {
            document.getElementById('LogoutConfirm').style.opacity = 0.95;
            document.getElementById('LogoutConfirm').style.pointerEvents = "auto";
        }
        document.getElementById('yes').onclick = function () {
            document.getElementById('LogoutConfirm').style.opacity = 0;
            document.getElementById('LogoutConfirm').style.pointerEvents = "none";
        }
        document.getElementById('no').onclick = function () {
            document.getElementById('LogoutConfirm').style.opacity = 0;
            document.getElementById('LogoutConfirm').style.pointerEvents = "none";
        }
    </script>
    <script type="text/javascript">
        var first = true;
        document.getElementById('edit').onclick = function(){
        if (first){
            document.getElementById('name').style.cssText = " pointer-events:auto; background-color: #F6F6E9";
            document.getElementById('Address').style.cssText = " pointer-events:auto; background-color: #F6F6E9";
            document.getElementById('edit').value = 'Save';
            first = false;
        }else {
            document.getElementById('edit').type = 'Submit';
            document.getElementById('name').style.cssText = " pointer-events:none; background-color: #8f8f8b";
            document.getElementById('Address').style.cssText = " pointer-events:none; background-color: #8f8f8b";
            document.getElementById('Save').value = 'Edit';
        }
    }
    </script>
</body>

</html>