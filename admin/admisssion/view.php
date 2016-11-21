<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['admin_id'])) {
    header("location:../../log_form.php");
}
include '../../connection/link.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UPASHAM HOSPITAL</title>
        <link rel="stylesheet" href="../../css/responsive.css">
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../css/bootstrap.min.css">

    </head>
    <body>
        <div class="wapper">
            <div class="dashbord_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="dashboard_text text-center">
                                <div class="dashboard_text text-center">
                                    <img src="../../images/report_baner.png" alt="UPASHAM HOSPITAL" title="UPASHAM HOSPITAL" height="100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body_area" style="min-height: 700px;">
                <div class="container-fluid">
                    <div class="row">
                        <!--                        <a style="border: 1px solid; margin-left: 80px;
                                                   display: inline-block;
                                                   font-family: caption;
                                                   font-size: 12px;
                                                   padding: 5px 10px;
                                                   text-decoration: none;" href="outdoor_patient_bill_list.php">BACK</a>-->
                        <div class="body_area" style="min-height: 500px;">
                            <div class="container">
                                <div class="row">
                                    <?php
                                    include '../../connection/db.php';
                                    $id = $_GET['id'];
//                        echo $id;
                                    $select_query = "SELECT * FROM `patient_entry_form` WHERE id = '$id'";
                                    $execute_query = $conn->query($select_query);

                                    $select_admit = "SELECT * FROM `patient_admission_system` WHERE reg_id = '$id'";
                                    $execute_admit = $conn->query($select_admit);

                                    $select_bill = "SELECT * FROM `storeallbill` WHERE patient_id = '$id'";
                                    $execute_bill = $conn->query($select_bill);
                                    $count = mysqli_num_rows($execute_bill);
                                    ?>
                                    <?php
                                    while ($row = $execute_query->fetch_assoc()) {
                                        $name = $row['patient_name'];
                                        $age = $row['age'];
                                        $mobile = $row['mobile'];
                                        $ger = $row['gender'];
                                        $ref = $row['reference'];
                                        $ref_m = $row['ref_mobile'];
                                    }
                                    ?>
                                    <?php
                                    while ($tow = $execute_admit->fetch_assoc()) {
                                        $gar = $tow['gardian_name'];
                                        $dr_name = $tow['doctor_name'];
                                        $unit = $tow['dr_unit_name'];
                                        $cabil_no = $tow['cabin_no'];
                                        $ad_date = $tow['admission_date'];
                                        $ads_time = $tow['admission_time'];
                                    }
                                    ?>
                                    <p class="text-center " style="background-color: #346E99;color: #fff; height: 35px; margin-top: 10px; ">Details Report</p>
                                    <div class="row">
                                        <div class="part1 col-md-6" style="font-family: caption; font-size: 18px;">
                                            <table style="text-align: left;" width="60%">
                                                <tr>
                                                    <td>Registration No</td>
                                                    <td style="padding-right: 3px; ">:</td>
                                                    <td ><?php echo $id; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Patient Name</td>
                                                    <td style="padding-right: 3px; ">:</td>
                                                    <td ><?php echo $name; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Mobile No</td>
                                                    <td style="padding-right: 3px; ">:</td>
                                                    <td ><?php echo $mobile; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Age</td>
                                                    <td style="padding-right: 3px; ">:</td>
                                                    <td ><?php echo $age; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Gender</td>
                                                    <td style="padding-right: 3px; ">:</td>
                                                    <td ><?php echo $ger; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Reference Name</td>
                                                    <td style="padding-right: 3px; ">:</td>
                                                    <td ><?php echo $ref; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Reference Mobile</td>
                                                    <td style="padding-right: 3px; ">:</td>
                                                    <td ><?php echo $ref_m; ?></td>
                                                </tr>
                                            </table>
                                            </div>
                                        <div class="col-md-6">
                                            <?php
                                            $select_pharmacy_bill = "SELECT storeallbill.patient_id, "
                                                    . "pharmacy_patient_bill.regi_id, "
                                                    . "pharmacy_patient_bill.total_bill, "
                                                    . "pharmacy_patient_bill.payment,"
                                                    . " pharmacy_patient_bill.due FROM "
                                                    . "storeallbill INNER JOIN pharmacy_patient_bill "
                                                    . "ON storeallbill.patient_id=pharmacy_patient_bill.regi_id "
                                                    . "where storeallbill.patient_id='$id'";
                                            $execute_phar_bill = $conn->query($select_pharmacy_bill);
                                            ?>
                                            <div style="text-align: center;">
                                                <!--its for pharmacy bill-->
                                                <table border = "2" style="text-align: center;" width="500px;">
                                                    <?php
                                                    $pharmacy_bill = '';
                                                    $phar_payment = '';
                                                    $phar_due = '';

                                                    while ($pharmacy_row = $execute_phar_bill->fetch_assoc()) {
                                                        $pharmacy_bill = $pharmacy_row['total_bill'];
                                                        $phar_payment = $pharmacy_row['payment'];
                                                        $phar_due = $pharmacy_row['due'];
                                                    }
                                                        ?>
                                                    <tr>
                                                        <td>Pharmacy Bill</td>
                                                        <td>:</td>
                                                        <td><?php echo $pharmacy_bill; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Payment Bill</td>
                                                        <td>:</td>
                                                        <td><?php echo $phar_payment; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Due Bill</td>
                                                        <td>:</td>
                                                        <td><?php echo $phar_due; ?></td>
                                                    </tr>
                                                </table>
                                                <br>
                                                <!--its for diagonostic bill-->
                                                <?php
                                            $select_diagonostic_bill = "SELECT storeallbill.patient_id, "
                                                    . "diagonostic_patient_bill.regi_id,"
                                                    . " diagonostic_patient_bill.total_bill, "
                                                    . "diagonostic_patient_bill.payment,"
                                                    . " diagonostic_patient_bill.due FROM "
                                                    . "storeallbill INNER JOIN diagonostic_patient_bill ON "
                                                    . "storeallbill.patient_id=diagonostic_patient_bill.regi_id "
                                                    . "where storeallbill.patient_id='$id'";
                                            $execute_diagonostic_bill = $conn->query($select_diagonostic_bill);
                                            ?>
                                            <div style="text-align: center;">
                                                <table border = "2" style="text-align: center;" width="500px;">
                                                    <?php
                                                    $diagonostic_bill = '';
                                                    $diagonostic_payment = '';
                                                    $diagonostic_due = '';

                                                    while ($diagonostic_row = $execute_diagonostic_bill->fetch_assoc()) {
                                                        $diagonostic_bill = $diagonostic_row['total_bill'];
                                                        $diagonostic_payment = $diagonostic_row['payment'];
                                                        $diagonostic_due = $diagonostic_row['due'];
                                                    }
                                                        ?>
                                                    <tr>
                                                        <td>Diagonostic Bill</td>
                                                        <td>:</td>
                                                        <td><?php echo $diagonostic_bill; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Payment Bill</td>
                                                        <td>:</td>
                                                        <td><?php echo $diagonostic_payment; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Due Bill</td>
                                                        <td>:</td>
                                                        <td><?php echo $diagonostic_due; ?></td>
                                                    </tr>
                                                </table>
                                                
                                        </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class=" part2" style="margin-bottom: 70px; margin-top: 20px;">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-offset-1 col-md-10 col-md-offset-1" style="font-family: caption; font-size: 18px; border: 2px solid gray; width: 60%; min-height: 190px; padding-top: 10px;">
                                                    <?php
                                                    $select_admit = "SELECT * FROM `patient_admission_system` WHERE reg_id = '$id'";
                                                    $execute_admit = $conn->query($select_admit);

                                                    while ($tow = $execute_admit->fetch_assoc()) {
                                                        $gar = $tow['gardian_name'];
                                                        $dr_name = $tow['doctor_name'];
                                                        $unit = $tow['dr_unit_name'];
                                                        $cabil_no = $tow['cabin_no'];
                                                        $ad_date = $tow['admission_date'];
                                                        $ads_time = $tow['admission_time'];
                                                    }
                                                    ?>

                                                    <table style="text-align: left;" width="50%">
                                                        <tr>
                                                            <td>Guardian Name</td>
                                                            <td style="padding-right: 3px; ">:</td>
                                                            <td ><?php echo $gar; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Doctor Name</td>
                                                            <td style="padding-right: 3px; ">:</td>
                                                            <td ><?php echo $dr_name; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Doctor Unit</td>
                                                            <td style="padding-right: 3px; ">:</td>
                                                            <td ><?php echo $unit; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cabin No</td>
                                                            <td style="padding-right: 3px; ">:</td>
                                                            <td ><?php echo $cabil_no; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Admission Date</td>
                                                            <td style="padding-right: 3px; ">:</td>
                                                            <td ><?php echo $ad_date; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Admission Date</td>
                                                            <td style="padding-right: 3px; ">:</td>
                                                            <td ><?php echo $ads_time; ?></td>
                                                        </tr>
                                                         <?php
                                                        if ($count == 1) {
                                                            while ($row = $execute_bill->fetch_assoc()) {
                                                                $sub_total = $row['sub_total'];
                                                                $dis = $row['discount'];
                                                                $total = $row['total'];
                                                                $payment = $row['payment'];
                                                                $due = $row['due'];
                                                                $re_date = $row['release_date'];
                                                            }
                                                            ?>
                                                        
                                                        <tr>
                                                            <td>Sub Total</td>
                                                            <td style="padding-right: 3px; ">:</td>
                                                            <td ><?php echo $sub_total; ?></td>
                                                        </tr><!--
-->                                                        <tr>
                                                            <td>Discount</td>
                                                            <td style="padding-right: 3px; ">:</td>
                                                            <td ><?php echo $dis.'%'; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total</td>
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
                                                            <td>Release Date</td>
                                                            <td style="padding-right: 3px; ">:</td>
                                                            <td ><?php echo $re_date; ?></td>
                                                        </tr>
                                                        <?php } else { ?>
                                                        <!--<p><?php // echo $name; ?> are here !</p>-->
                                                       <?php }
                                                        ?>
                                                        
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

<?php include '../../footer.php'; ?>

                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
