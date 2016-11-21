<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if(!isset($_SESSION['pharmacy_id'])){
        header("location:../log_form.php");
    }
include '../connection/link.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <title>UPASHAM HOSPITAL</title>
        <link rel="stylesheet" href="../css/responsive.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        
    </head>
    <body>
        <div class="wapper">
            <div class="dashbord_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_text text-center">
                            <img src="../images/report_baner.png" alt="UPASHAM HOSPITAL" title="UPASHAM HOSPITAL" height="100">
                            <br>
                            Dashboard of Pharmacy
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="body_area" style="min-height: 662px;">
            <div class="container-fluid">
                <div class="row">
                     <a style="border: 1px solid; margin-left: 80px;
                           display: inline-block;
                           font-family: caption;
                           font-size: 12px;
                           padding: 5px 10px;
                           text-decoration: none;" href="patient_pharmacy_bill.php">BACK</a>
                        <div class="body_area" style="">
                            <div class="container">
                                <div class="row">
                                    <?php
                                    include '../connection/db.php';
                                    $id = $_GET['regi_id'];
//                                    echo $id;
//                                    die();
                                    
                                    $select_query = "SELECT * FROM `patient_entry_form` WHERE id = '$id'";
                                    $execute_sql = $conn->query($select_query);
                                    while ($row = $execute_sql->fetch_assoc()) {
                                        $reg_id = $row['id'];
                                        $patient_name = $row['patient_name'];
                                        $patient_mobile = $row['mobile'];
                                        $age = $row['age'];
                                        $doctor_name = $row['doctor_name'];
                                    }
                                    
                                    $select_dia = "SELECT * FROM `pharmacy_patient_bill` WHERE regi_id = '$id'";
                                    $exe_dia = $conn->query($select_dia);
                                    while ($dia = $exe_dia->fetch_assoc()){
                                        $bill = $dia['bill'];
                                        $discount = $dia['discount'];
                                        $total = $dia['total_bill'];
                                        $payment = $dia['payment'];
                                        $due = $dia['due'];
                                        $date = $dia['date'];
                                    }
                                    ?>
                                    <p class="text-center " style="background-color: #346E99;color: #fff; height: 35px; ">Details Report</p>
                                    <div class="row">
                                        <div class="part1 col-md-6" style="font-family: caption; font-size: 18px;">
                                            <table style="text-align: left;" width="60%">
                                                <tr>
                                                    <td>Patient ID</td>
                                                    <td style="padding-right: 3px; ">:</td>
                                                    <td ><?php echo $reg_id; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Patient Name</td>
                                                    <td style="padding-right: 3px; ">:</td>
                                                    <td ><?php echo $patient_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Mobile No</td>
                                                    <td style="padding-right: 3px; ">:</td>
                                                    <td ><?php echo $patient_mobile; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Age</td>
                                                    <td style="padding-right: 3px; ">:</td>
                                                    <td ><?php echo $age; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Doctor Name</td>
                                                    <td style="padding-right: 3px; ">:</td>
                                                    <td ><?php echo $doctor_name; ?></td>
                                                </tr>
                                            </table>
                                            <?php
                                                $select_test = "SELECT * FROM `drug_sell_system` WHERE reg_id = '$id'";
                                                $execute_tets = $conn->query($select_test);
                                            ?>
                                            <div style="text-align: center;">
                                            <table border = "2" style="text-align: center;">
                                                <tr>
                                                    <td style="padding: 5px 10px;">Drug Name</td>
                                                    <!--<td style="padding: 5px 10px;">Units</td>-->
                                                    <td style="padding: 5px 10px;">Quantity</td>
                                                    <td style="padding: 5px 10px;">Price</td>
                                                </tr>
                                                <?php 
                                                    while ($test = $execute_tets->fetch_assoc()) {
                                                        $drug_name = $test['drug_name'];
                                                        $quantity = $test['quantity'];
                                                        $price = $test['price'];
                                                ?>
                                                <tr>
                                                    <td style="padding: 5px 10px;"><?php echo $drug_name;?></td>
                                                    <td style="padding: 5px 10px;"><?php echo $quantity;?></td>
                                                    <td style="padding: 5px 10px;"><?php echo $price;?></td>
                                                </tr>
                                                    <?php } ?>
                                            </table>
                                            </div>
                                            <hr >
                                        </div>
                                    </div>
                                    <br>
                                    <div class=" part2" >
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-offset-1 col-md-10 col-md-offset-1" style="font-family: caption; font-size: 18px; border: 2px solid gray; width: 60%; min-height: 190px; padding-top: 10px;">
                                                    <table style="text-align: left;" width="50%">
                                                        <tr>
                                                            <td>Bill Out of Discount</td>
                                                            <td style="padding-right: 3px; ">:</td>
                                                            <td ><?php echo $bill; ?></td>
                                                        </tr>
                                                         <tr>
                                                            <td>Discount</td>
                                                            <td style="padding-right: 3px; ">:</td>
                                                            <td ><?php echo $discount; ?>%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total Bill</td>
                                                            <td style="padding-right: 3px; ">:</td>
                                                            <td ><?php echo $total; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Payment</td>
                                                            <td style="padding-right: 3px; ">:</td>
                                                            <td ><?php echo $payment; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Due</td>
                                                            <td style="padding-right: 3px; ">:</td>
                                                            <td ><?php echo $due; ?></td>
                                                        </tr>
                                                          <tr>
                                                            <td>Date</td>
                                                            <td style="padding-right: 3px; ">:</td>
                                                            <td ><?php echo $date; ?></td>
                                                        </tr>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="footer_area">
            <div class="container-fluid">
                <div class="row">
                    
                        <?php   include '../footer.php';?>
                   
                </div>
            </div>
        </div>
        </div>
    </body>
        
</html>
