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
                        <div class="body_area" style="">
                            <div class="container">
                                <div class="row">
                                    <?php
                                    include '../../connection/db.php';
                                    $id = $_GET['out_p_id'];
//                        echo $id;
                                    $select_query = "SELECT outdoor_test.out_p_id,"
                                            . "outdoor_test.patient_name,"
                                            . " outdoor_test.patient_mobile,"
                                            . "outdoor_test.age,"
                                            . "outdoor_test.dr_name,"
                                            . " outdoor_test.test_category, "
                                            . "outdoor_test.test_name, "
                                            . "outdoor_test.test_price, "
                                            . "outdoor_test.date, "
                                            . "outdoor_test_bill.bill_out_dis, "
                                            . "outdoor_test_bill.discount,"
                                            . "outdoor_test_bill.bill_after_diss, "
                                            . "outdoor_test_bill.payment,"
                                            . " outdoor_test_bill.due "
                                            . "FROM outdoor_test INNER JOIN "
                                            . "outdoor_test_bill "
                                            . "ON "
                                            . "outdoor_test.out_p_id=outdoor_test_bill.patient_id where out_p_id='$id'";
                                    $execute_sql = $conn->query($select_query);
                          $reg_id = '';$patient_name='';$patient_mobile='';$age='';$doctor_name='';
                          $test_category='';$test_name='';$bill_out_dis='';$discount='';$bill_after_diss='';$payment='';$due='';$date='';
                                    while ($row = $execute_sql->fetch_assoc()) {
                                        $reg_id = $row['out_p_id'];
                                        $patient_name = $row['patient_name'];
                                        $patient_mobile = $row['patient_mobile'];
                                        $age = $row['age'];
                                        $doctor_name = $row['dr_name'];
                                        $test_category = $row['test_category'];
                                        $test_name = $row['test_name'];
                                        $bill_out_dis = $row['bill_out_dis'];
                                        $discount= $row['discount'];
                                        $bill_after_diss = $row['bill_after_diss'];
                                        $payment = $row['payment'];
                                        $due = $row['due'];
                                        $date = $row['date'];
                                    }
                                    ?>
                                    <p class="text-center " style="background-color: #346E99;color: #fff; height: 35px; margin-top: 10px; ">Details Report</p>
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
<!--                                                <tr>
                                                    <td>Test Category</td>
                                                    <td style="padding-right: 3px; ">:</td>
                                                    <td ><?php //echo $test_category; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Test Name</td>
                                                    <td style="padding-right: 3px; ">:</td>
                                                    <td ><?php// echo $test_name; ?></td>
                                                </tr>-->
                                            </table>
                                            <?php
                                                $select_test = "SELECT * FROM `outdoor_test` WHERE out_p_id = '$id'";
                                                $execute_tets = $conn->query($select_test);
                                            ?>
                                            <div style="text-align: center;">
                                            <table border = "2" style="text-align: center;">
                                                <tr>
                                                    <td style="padding: 5px 10px;">Test Category</td>
                                                    <td style="padding: 5px 10px;">Test Name</td>
                                                    <td style="padding: 5px 10px;">Test Price</td>
                                                </tr>
                                                <?php 
                                                $t_cata = '';$t_name='';$t_price='';
                                                
                                                    while ($test = $execute_tets->fetch_assoc()) {
                                                        $t_cata = $test['test_category'];
                                                        $t_name = $test['test_name'];
                                                        $t_price = $test['test_price'];
                                                ?>
                                                <tr>
                                                    <td style="padding: 5px 10px;"><?php echo $t_cata;?></td>
                                                    <td style="padding: 5px 10px;"><?php echo $t_name;?></td>
                                                    <td style="padding: 5px 10px;"><?php echo $t_price;?></td>
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
                                                            <td ><?php echo $bill_out_dis; ?></td>
                                                        </tr>
                                                         <tr>
                                                            <td>Discount</td>
                                                            <td style="padding-right: 3px; ">:</td>
                                                            <td ><?php echo $discount; ?>%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total Bill</td>
                                                            <td style="padding-right: 3px; ">:</td>
                                                            <td ><?php echo $bill_after_diss; ?></td>
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

                        <?php include '../../footer.php'; ?>

                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
