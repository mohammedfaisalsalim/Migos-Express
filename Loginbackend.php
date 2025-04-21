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
        $LoginStatus = '<a class="nav-link" href="login1.php">Login</a>';
        $ShippingLink = 'Login1.php';
    }else{
        $LoginStatus ="<a class=nav-link dropdown-toggle' href=''data-bs-toggle='dropdown'>$Username</a>
                            <ul class='dropdown-menu' >
                                <li><a class='dropdown-item' id='LogOut' href='#'><img src='logout.png'>Log out</a></li>
                            </ul>
                        ";
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