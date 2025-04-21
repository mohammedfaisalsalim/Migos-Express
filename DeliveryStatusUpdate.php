<?php include 'Loginbackend(Jackpart).php' ?>
<?php include 'LogininfoDatabase.php' ?>
<?php $Alert = '' ?>

<?php

    if(isset($_POST['update_confirm'])){
        $Countinglogid = 0;

        while ($AlldeliverylogRow = mysqli_fetch_array($Alldeliverylog)){
                if ($Countinglogid <= $AlldeliverylogRow['LogID']){
                    $Countinglogid = $AlldeliverylogRow['LogID'];
                }
            }
        $NewLogID = $Countinglogid + 1;
        

        $NewLogRowquery = 'INSERT INTO delivery_log VALUES ("'.$NewLogID.'","'.$_POST["Ustatus"].'","'.$_POST["updatedate"].'","'.$_POST["time"].'","'.$_POST["Utrace_ID"].'")';
        $NewLogRow = mysqli_query($LinkToDatabase,$NewLogRowquery);

        header('location:DeliveryStatusUpdate.php');
        die();
    }

    if(isset($_POST['edit_confirm'])){
        $EditLogRowquery = 'UPDATE delivery_log SET Log_date = "'.$_POST["updatedate"].'", Log_time = "'.$_POST["time"].'" WHERE LogID = "'.$_POST["ULog_ID"].'"; ';
        $EditLogRow = mysqli_query($LinkToDatabase,$EditLogRowquery);

        header('location:DeliveryStatusUpdate.php');
        die();
    }

    if(isset($_POST['add_confirm'])){
        $Countinglogid = 0;

        while ($AlldeliverylogRow = mysqli_fetch_array($Alldeliverylog)){
                if ($Countinglogid <= $AlldeliverylogRow['LogID']){
                    $Countinglogid = $AlldeliverylogRow['LogID'];
                }
            }
        $NewLogID = $Countinglogid + 1;
        
        while ($AlldeliverylogRow = mysqli_fetch_array($deliveredNoLog)){
            if ($_POST['Utrace_ID2'] == $AlldeliverylogRow['TraceNo']){
                $AddLogRowquery = 'INSERT INTO delivery_log VALUES ("'.$NewLogID.'","'.$_POST["Ustatus"].'","'.$_POST["updatedate"].'","'.$_POST["time"].'","'.$_POST["Utrace_ID2"].'");';
                $AddLogRow = mysqli_query($LinkToDatabase,$AddLogRowquery);

                header('location:DeliveryStatusUpdate.php');
                die();
            }
        }
        $Alert ="<script>alert('Invalid TraceNo!');</script>"; 
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
    <?php echo $Alert?>
    <?php $Alert = '' ?>
    <header class="header1">
        <a href="Adminpage.php"><img src="MIGOSlogo(S).png" alt="MIGOS Express logo"></a>
        <ul>
            <li><a href="#"><b>Manage Delivery</b></a>
                <ul>
                    <li><a href="Adminpage.php">Confirmation For Delivery</a></li>
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
        <table class="Order-Table smaller">
            <tr>
                <form method="get">
                    <th colspan="3"> Search: <input type="text" name="search" placeholder="TN12345" maxlength="7">
                        <button type="submit">Search</button>
                </form>
                </th>
                <th>
                    <form><button type="submit" name="clearsearch">Clear</button></form>
                </th>
            </tr>
            <tr>
                <th>Trace_No</th>
                <th>Status</th>
                <th>Add Status</th>
                <th>Edit Status</th>
            </tr>

            <?php
            if (isset($_GET['search'])) {
                $Alldeliverylogquery = 'Select * FROM delivery_log WHERE (TraceNo = "' . $_GET["search"] . '")';
                $Alldeliverylog = mysqli_query($LinkToDatabase, $Alldeliverylogquery);
            }

            if (isset($_GET['clearsearch'])) {
                unset($_GET['search']);
            }


            ?>
            <?php
            while ($AllLogRow = mysqli_fetch_array($Alldeliverylog)) {
                $EachLog = '<form method = "post">
                                <input type= "hidden" name="Trace_No" value="' . $AllLogRow["TraceNo"] . '">
                                <input type= "hidden" name="LogID" value="' . $AllLogRow["LogID"] . '">
                                <input type= "hidden" name="Logstatus" value="' . $AllLogRow["Log_status"] . '">
                                <input type= "hidden" name="LogDate" value="' . $AllLogRow["Log_date"] . '">
                                <input type= "hidden" name="LogTime" value="' . $AllLogRow["Log_time"] . '">
                                <tr>
                                    <td>' . $AllLogRow["TraceNo"] . '</td>
                                    <td>' . $AllLogRow["Log_status"] . '</td>
                                    <td><button type="submit" name="Updatechoices" value="update">Add Status</button></td>
                                    <td><button type="submit" name="Editchoices" value="edit" >Edit Status</button></td>
                                </tr>
                            </form>';
                echo $EachLog;
            }
            ?>

            <td class="table-end" colspan="4"> -----No More Order----</td>
            </tr>
        </table>


<!-- Middle -->
<div class="boxofnotice">
<form method="post">
<input formnovalidate class="Adding clear" type="image" id="Adding" name="Adding" src="blackplus.png" onmouseover="this.src='whiteplus.png';" onmouseout="this.src='blackplus.png'; ">
<form>
<div class="clear dropdownnotice">Add a New Trace_No</div>
</div>





    <div class="table-right">
    <?php
            $dateinput = '<input name="updatedate" type="date" min="2000-01-01" max="2030-12-31" required>';
            $Timeinput = '<input type="time" name="time" required>';
            $UpdatingButton = '<button name="update_confirm" value="update" type="submit">Submit</button>';
            $LatestStatus = '';
            $SelectionNotice = '<div class="tablenotice">Update Order Status</div>';

//  ADD TRACE IF ELSE STATEMENT ------------------------------------------
        if (isset($_POST['Adding_x'])){
            $_POST['Trace_No'] = '';
            $_POST['LogID'] = '';
            $LatestStatus = 'pickup';
            $EachTrace = '<input type="text" name="Utrace_ID2" required placeholder="TN*****" minlength="7" maxlength="7" pattern="[TN 0-9]+">';
            $UpdatingButton = '<button name="add_confirm" value="add" type="submit">Submit</button>';
            $SelectionNotice = '<div class="tablenotice">Add New TraceNo</div>';
        }
       
//  UPDATE CHOICES IF ELSE STATEMENT -------------------------------------
        if (isset($_POST['Updatechoices'])) {
                $EachTrace = $_POST['Trace_No'];
                $countstatus = 0;
                $Alllogquery = 'Select * FROM delivery_log WHERE (TraceNo = "' . $_POST["Trace_No"] . '")';
                $Alllog = mysqli_query($LinkToDatabase, $Alllogquery);
                while ($AllLoghere = mysqli_fetch_array($Alllog)) {
                    $countstatus += 1;
                }
                if ($countstatus == 0) {
                    $LatestStatus = 'pickup';
                }
                if ($countstatus == 1) {
                    $LatestStatus = 'departed';
                }
                if ($countstatus == 2) {
                    $LatestStatus = 'arrive';
                }
                if ($countstatus == 3) {
                    $LatestStatus = 'out';
                }
                if ($countstatus == 4) {
                    $LatestStatus = 'delivered';
                }
                if ($countstatus == 5) {
                    $LatestStatus = 'delivery has done!';
                    $dateinput = '<input style="pointer-events: none;" name="updatedate" type="text" placeholder="'.$_POST["LogDate"].'">';
                    $Timeinput = '<input style="pointer-events: none;" name="time" type="text" placeholder="'.$_POST["LogTime"].'">';
                    $UpdatingButton = '<button style="pointer-events: none;" name="update_confirm" value="update" type="submit">Submit</button>';
                }
        }

//  EDIT CHOICES IF ELSE STATEMENT -------------------------------------
        if (isset($_POST['Editchoices'])){
                $dateinput = '<input name="updatedate" required type="text" placeholder="'.$_POST["LogDate"].'" min="2000-01-01" max="2030-12-31" onfocus="(this.type=\'date\')"
                                onblur="(this.type=\'text\')">';
                $LatestStatus = $_POST['Logstatus'];
                $Timeinput = '<input name="time" type="text" placeholder="'.$_POST["LogTime"].'" onfocus="(this.type=\'time\')"
                             onblur="(this.type=\'text\')" required>';
                $UpdatingButton = '<button name="edit_confirm" value="edit" type="submit">Submit</button>';
                $SelectionNotice = '<div class="tablenotice">Edit Order Status</div>';
                $EachTrace = $_POST['Trace_No'];
        }



// Check Whether make choices------------------------------------------------

    if (isset($_POST['Updatechoices']) || isset($_POST['Editchoices']) || isset($_POST['Adding_x'])){
                $SelectedTrace = '<form method="post"> 
                                        '.$SelectionNotice.'
                                        <input type="hidden" name= "Utrace_ID" value=' . $_POST['Trace_No'] . '>
                                        <input type="hidden" name= "ULog_ID" value=' . $_POST['LogID'] . '>
                                        <input type="hidden" name= "Ustatus" value=' . $LatestStatus. '>      
                                        <div class="wrap-table-LF">
                                            <div class="table-right-left">
                                                TraceNo:
                                            </div>
                                            <div class="table-right-right">
                                                ' . $EachTrace . '
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="wrap-table-LF">
                                            <div class="table-right-left">
                                                Status:
                                            </div>
                                            <div class="table-right-right">
                                                ' . $LatestStatus . '
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="wrap-table-LF">
                                            <div class="table-right-left">
                                                Date:
                                            </div>
                                            <div class="table-right-right">
                                                ' . $dateinput . '
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="wrap-table-LF">
                                            <div class="table-right-left">
                                                Time:
                                            </div>
                                            <div class="table-right-right">
                                                ' . $Timeinput . '
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        ' . $UpdatingButton . '
                                        <button name="cancel" value="cancel" type="submit" formnovalidate>Cancel</button>
                                    </div>
                                    <div class="clear"></div>
                                </form>';
            }else{
                $SelectedTrace = '<div class="tablenotice">***Please select an TraceNo***</div>';
            }

            echo $SelectedTrace;
    ?>

            <div class="clear"></div>
        </div>
        <div class="clear"></div>
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