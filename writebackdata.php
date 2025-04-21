<?php
    $CountingOrderid = 0;

    while ($AllorderRow = mysqli_fetch_array($Allorder)){
        $intInString = (int)filter_var($AllorderRow['Order_ID'], FILTER_SANITIZE_NUMBER_INT);
        if ($CountingOrderid <= $intInString){
            $CountingOrderid = $intInString;
        }
    }

    $Countingparcelid = 0;

    while ($AllparcelRow = mysqli_fetch_array($Allparcel)){
        $intInString = (int)filter_var($AllparcelRow['Parcel_ID'], FILTER_SANITIZE_NUMBER_INT);
        if ($Countingparcelid <= $intInString){
            $Countingparcelid = $intInString;
        }
    }

    $OrderID = 'OID'.$CountingOrderid + 1;
    $ParcelID = 'P'.$Countingparcelid + 1;


    $Newparcelquery = 'INSERT INTO parcel VALUES("'.$ParcelID.'","'.$G_name.'","'.$G_type.'","'.$G_weight.'","'.$G_quantity.'")';
    $Newparcel = mysqli_query($LinkToDatabase,$Newparcelquery);

    $Neworderquery = 'INSERT INTO ordertable VALUES("'.$OrderID.'","'.$S_name.'","'.$S_contact.'","'.$S_address.'","'.$R_name.'","'.$R_contact.'","'.$R_address.'","'.$ReceiveVariable.'","'.$ParcelID.'")';
    $Neworder = mysqli_query($LinkToDatabase,$Neworderquery);

    $_SESSION['Neworderid'] = $OrderID;

    header('location: Afterplaceorder.php');
    die();
   
?>