<?php
session_start();

$error = '';

if ($_GET) {
    $ReceiveVariable = '';
    include 'LogininfoDatabase.php';
    while ($UserDataRow = mysqli_fetch_array($UserData)) {
        if (($UserDataRow['PhoneNumber'] == $_GET['phonenumber']) && ($UserDataRow['Password'] == $_GET['password'])) {
            if ($UserDataRow['Name'] == '') {
                $_SESSION['login_name'] = $UserDataRow['PhoneNumber'];
                $_SESSION['passvariable'] = $UserDataRow['PhoneNumber'];
            } else {
                $_SESSION['login_name'] = $UserDataRow['Name'];
                $_SESSION['passvariable'] = $UserDataRow['PhoneNumber'];
            }

            header("location: MainMenu.php");
            die();
        }else {
            while($AdminDataRow = mysqli_fetch_array($AdminData)){
                if (($AdminDataRow['Admin_ID'] == $_GET['phonenumber']) && ($AdminDataRow['password'] == $_GET['password'])) {
                    $_SESSION['login_name'] = $AdminDataRow['Admin_name'];
                    $_SESSION['passvariable'] = $AdminDataRow['Admin_ID'];

                    header("location: Adminpage.php");
                    die();
                }else{
                    $error = "<sup>Incorrect phonenumber or password!</sup>";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@1,500&family=Shizuru&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Login1.css">
    <title>Login</title>
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
            <a href="Login1.php" target="_self">
                <li class="float-right"><b>Login</b></li>
            </a>
        </ul>
    </header>

    <!--^^^^^ Header ^^^^^-->

    <div class="login">
        <img src="MIGOS.gif" alt="MIGOS Express logo">
        <form method="$_GET">
            <table>
                <tr>
                    <th>Login</th>
                </tr>
                <tr>
                    <td><input class="input1" type="text" id="phonenumber" name="phonenumber" required="required" placeholder="Phone Number" maxlength="11" pattern="[A 0-9]+"></td>
                </tr>
                <tr>
                    <td><input class="input1" type="password" id="password" name="password" required="required" placeholder="password" minlength="8" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <?php echo $error ?>
                    </td>
                </tr>
                <tr>
                    <td><input class="input2" type="submit" value="Login"></button></td>
                </tr>
                <tr>
                    <td><a href="Register.php" target="_self">Create an Account</a></td>

                </tr>
            </table>
        </form>

    </div>
    <!--vvvvv Footer vvvvv-->
    <div class="divfoot">
        <div class="divfoot1">
            <h3>Shipping</h3>
            <a href="#" target="_self">Domestic Shipping</a>
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
</body>

</html>