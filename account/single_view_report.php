<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['account_id'])) {
    header("location:../log_form.php");
}
//echo $_SESSION['account_id'];
include '../connection/link.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UPASHAM HOSPITAL</title>
        <link rel="stylesheet" href="../css/responsive.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link href="../js/owl.carousel.min.js" rel="stylesheet"/>
        <script src="../js/main.js"></script>

    </head>
    <body style="background: none;">
        <div class="wapper">
            <div class="dashbord_area" style="background: gray; ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="dashboard_text text-center">
                                <img src="../images/baner.png" alt="UPASHAM HOSPITAL" title="UPASHAM HOSPITAL" height="100">
                                <br>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a style="border: 1px solid;
    display: inline-block;
    font-family: caption;
    font-size: 12px;
    padding: 5px 10px;
    text-decoration: none;" href="account_admin.php">BACK</a>
            <div class="body_area">
                <div class="container">
                    <br>
                    <?php
                    include '../connection/db.php';
                    ;
                    $id = $_GET['id'];
//                    echo $id;
                    $select_query = "select patient_entry_form.patient_name,"
                            . "patient_entry_form.id,"
                            . "patient_entry_form.guardian_name,"
                            . "patient_entry_form.mobile,"
                            . "patient_entry_form.age, "
                            . "patient_entry_form.medical_problem, "
                            . "patient_entry_form.visit_amount,"
                            . "patient_entry_form.doctor_name,"
                            . "storeallbill.visit_amount,"
                            . "storeallbill.pharmacy_bill,"
                            . "storeallbill.diagonostic_bill,"
                            . "storeallbill.admission_bill,"
                            . "storeallbill.sub_total,"
                            . "storeallbill.vat, "
                            . "storeallbill.total_bill,"
                            . "storeallbill.payment_bill "
                            . "from patient_entry_form "
                            . "inner join storeallbill "
                            . "on patient_entry_form.id=storeallbill.reg_id"
                            . " where reg_id='$id'";
//                    echo $select_query;
//                    die();
                    $execute_sql = $conn->query($select_query);
//                    echo $execute_sql;
//                    die();
                    while ($row = $execute_sql->fetch_assoc()) {
                        $patient_name = $row['patient_name'];
                        $guardianName = $row['guardian_name'];
                        $mobile = $row['mobile'];
                        $age = $row['age'];
                        $medical_problem = $row['medical_problem'];
                        $doctor_name = $row['doctor_name'];

                        $visited_amount = $row['visit_amount'];
                        $admission_bill = $row['admission_bill'];
                        $pharmacy_bill = $row['pharmacy_bill'];
                        $diagonostic_bill = $row['diagonostic_bill'];
                        $vat = $row['vat'];
                        $total_bill = $row['total_bill'];
                        $PaymentBill=$row['payment_bill'];
                    }
                    ?>
                    <p class="text-center " style="background-color: #346E99;color: #fff; height: 35px; ">Details Report</p>
                    <div class="row">
                        <div class="part1 col-md-6" style="font-family: caption; font-size: 15px;">
                            <table style="text-align: left;" width="50%">
                                <tr>
                                    <td>Patient Name</td>
                                    <td style="padding-right: 3px; ">:</td>
                                    <td ><?php echo $patient_name; ?></td>
                                </tr>
                                <tr>
                                    <td>Guardian Name</td>
                                    <td>:</td>
                                    <td><?php echo $guardianName; ?></td>
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
                                    <td>Problem</td>
                                    <td style="padding-right: 3px; ">:</td>
                                    <td ><?php echo $medical_problem; ?></td>
                                </tr>
                                <tr>
                                    <td>Doctor Name</td>
                                    <td style="padding-right: 3px; ">:</td>
                                    <td ><?php echo $doctor_name; ?></td>
                                </tr>
                            </table>
                            <hr >
                        </div>
                    </div>
                    <br>
                    <div class=" part2" >
                        <div class="container">
                            <div class="row">
                                <div class="col-md-offset-1 col-md-10 col-md-offset-1" style="border: 2px solid gray; width: 60%; min-height: 190px; padding-top: 15px;">
                                    <table style="text-align: left;" width="50%">
                                        <tr>
                                            <td>Visited Bill</td>
                                            <td style="padding-right: 3px; ">:</td>
                                            <td ><?php echo $visited_amount; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Admission Bill</td>
                                            <td>:</td>
                                            <td><?php echo $admission_bill; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pharmacy Bill</td>
                                            <td style="padding-right: 3px; ">:</td>
                                            <td ><?php echo $pharmacy_bill; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Diagonostic Bill</td>
                                            <td style="padding-right: 3px; ">:</td>
                                            <td ><?php echo $diagonostic_bill; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Vat</td>
                                            <td style="padding-right: 3px; ">:</td>
                                            <td ><?php echo $vat.'%'; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total Bill</td>
                                            <td style="padding-right: 3px; ">:</td>
                                            <td ><?php echo $total_bill; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Payment Bill</td>
                                            <td style="padding-right: 3px; ">:</td>
                                            <td ><?php echo $PaymentBill; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="advice" style="padding-top: 40px;">
                        <p style=" border-top: 1px solid;
    margin-right: 20px;" class="col-md-2">Receiption Signature</p>
                        <p class="col-md-4 " style="background: gray; text-align: center; color: #fff; font-family: caption; font-size: 20px; ">Thanks a lot ! May allah bless You .</p>
                    </div>
                </div>
            </div>




            <div class="footer_area">
                <div class="container-fluid">
                    <div class="row">

                        <?php include '../footer.php'; ?>

                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
