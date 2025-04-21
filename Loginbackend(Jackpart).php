<?php 
    session_start();
    if (isset($_SESSION['passvariable'])){
        $ReceiveVariable = $_SESSION['passvariable'];
    }
    
    if (isset($_SESSION['login_name'])){
        $Username = $_SESSION['login_name'];
    }
    $LoginStatus = '';

    if (!isset($_SESSION['login_name'])){
        $LoginStatus = '<a href="Login1.php" target="_self"><li class="float-right"><b>Login</b></li></a>';
        $ShippingLink = 'Login1.php';
    }else{
        $LoginStatus ="<li class='float-right'><b> $Username </b>
                            <ul>
                                <li><a id='profile' href='userprofile.php'>Profile</a><img src='profile.png'</li>
                                <li><a id='LogOut' href='#'>Log out<img src='logout.png'></a></li>
                            </ul>
                        </li>";
        $ShippingLink = 'Shipping.php';
    }

?>
<?php 
    if(isset($_GET['yes'])){
        unset($_SESSION["login_name"]);
        header("location: MainMenu.php");
        die();
    }
?>