<?php
    $LinkToDatabase = mysqli_connect("localhost","root","","migosdatabase","3306");
    if (mysqli_connect_error()){
        die();
    }
    $userinfoquery = "Select * FROM member;";
    $UserData = mysqli_query($LinkToDatabase,$userinfoquery);

    $admininfoquery = "Select * FROM admin;";
    $AdminData = mysqli_query($LinkToDatabase,$admininfoquery);

    $userorderquery = 'Select * FROM ordertable where (PhoneNumber = "'.$ReceiveVariable.'")';
    $Userorder = mysqli_query($LinkToDatabase,$userorderquery);

    $deliveredquery = "Select * FROM delivery";
    $delivered = mysqli_query($LinkToDatabase,$deliveredquery); 

    $Allorderquery = 'Select * FROM ordertable';
    $Allorder = mysqli_query($LinkToDatabase,$Allorderquery);

    $AllOnholdOrderquery = 'Select * FROM ordertable WHERE Order_ID NOT IN(SELECT Order_ID FROM delivery)';
    $AllOnholdOrder = mysqli_query($LinkToDatabase,$AllOnholdOrderquery);

    $Allparcelquery = 'Select * FROM parcel';
    $Allparcel = mysqli_query($LinkToDatabase,$Allparcelquery);

    $Alldeliverylogquery = 'Select * FROM delivery_log';
    $Alldeliverylog = mysqli_query($LinkToDatabase,$Alldeliverylogquery);

    $deliveredNoLogquery = 'Select TraceNo FROM delivery WHERE TraceNo NOT IN(SELECT TraceNo FROM delivery_log);';
    $deliveredNoLog = mysqli_query($LinkToDatabase,$deliveredNoLogquery);
?>