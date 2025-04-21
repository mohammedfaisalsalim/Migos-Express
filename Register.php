 <?php
    session_start();
    include 'LogininfoDatabase.php';
    $Notice = '';
    $YesJava = '';
    $register = '<input class="RegisterID" type="text" id="Rphonenumber" name="Rphonenumber" required="required" placeholder="*Phone Number" minlength="10" maxlength="11" pattern="[0-9]+">
                <button class="RegisterSubmit" type="submit" id="register" name="RegisterSubmit">Register</button>';
    if (isset($_GET['Rphonenumber'])){
        $_SESSION['Rphonenumber'] = $_GET['Rphonenumber'];
        $RecordPhonenum = $_GET['Rphonenumber'];
        while ($UserDataRow = mysqli_fetch_array($UserData)){
            if ($RecordPhonenum == $UserDataRow['PhoneNumber']){
                $Notice = '<sub> ***This phonenumber has been registered***</sub>';
            }
        }    
        if ($Notice == ''){
            $YesJava = true;
            $register = '<input class="RegisterID" type="text" id="Rphonenumber" name="Rphonenumber" required="required" value ="'.$_SESSION['Rphonenumber'].'">
                <div class="Registerpassword"> <b>Password:</b> <input type="text" id="Rpassword" name="Rpassword" required="required" placeholder="E.g.1123456" minlength="8" maxlength="20"></div>
                <button class="RegisterSubmit" type="submit" id="register" name="RegisterSubmit">Register</button>';
        }        
    }
    if (isset($_GET['Rpassword'])){
        $_SESSION['Rpassword'] = $_GET['Rpassword'];
        header('location: RegisterSuccess.php');
        die();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@1,500&family=Shizuru&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="Register.css">
        
        <title>Register</title>
        <link rel="icon" type="image/x-icon" href="MIGOSlogo.png">
    </head>
    <body>
        <header class="header1">
            <a href="MainMenu.php"><img src="MIGOSlogo(S).png" alt="MIGOS Express logo"></a>
            <ul>
                <li><b>Shipping</b>
                    <ul>
                        <li><a href="Login1.php">Domestic Shipping</a></li>
                    </ul>
                </li>
                <li><b>Services</b>
                    <ul>
                        <li><a href="track.php">Tracking Order</a></li>
                        <li><a href="delivery-time.php">Estimate Delivery time</a></li>
                    </ul>
                </li>
                <li><a href="MainMenu.php#Aboutus"><b>About Us</b></a>
                    <ul>
                        <li><a href="MainMenu.php#ContactUs">Contact Us</a></li>
                    </ul>
                </li>
                <a href="Login1.php" target="_self"><li class="float-right"><b>Login</b></li></a>
            </ul>
        </header>

                <!--^^^^^ Header ^^^^^-->

                <div class="Registerrow1" id="Registerrow1">
                    <div class="Registerrow2" id = "Registerrow2">
                        <div class="Registerrow3">Register MIGOS Account</div>
                        <form method="get">
                            <?php echo $register; ?>
                        </form>
                        <div class="Registerrow4">By clicking "Register", I agree to MIGOS Express <a href="#">Privacy Policy</a><br>
                            Have an account? <a href="Login1.php">Login</a>
                        </div>
                    </div>
                </div>
        <div class="notice"><?php echo $Notice ?></div>
                <!--vvvvv Footer vvvvv-->
        <div class="divfoot">
            <div class="divfoot1">
                <h3>Shipping</h3>
                <a href="Login1.php" target="_self">Domestic Shipping</a>
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
            let x = true;
            if (x == <?php echo $YesJava ?>){
                document.getElementById('Registerrow2').style.height = '450px' ;
                document.getElementById('Registerrow1').style.height = '600px';
                document.getElementById('Rphonenumber').disabled = true;
                document.getElementById('Rphonenumber').style.color = 'white';
                document.getElementById('Rphonenumber').style.textAlign = 'center';
                }
        </script>
    </body>
</html>
