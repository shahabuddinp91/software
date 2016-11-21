<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['dianostic_id'])) {
    header("location:../log_form.php");
}
$patient_message = '';
include '../connection/link.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UPASHAM HOSPITAL</title>
        <link rel="stylesheet" href="../css/responsive.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">

        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/datepicker.css">
        <script src="../js/main.js"></script>
        <script src="../js/bootstrap-datepicker.js"></script>
        <script>
            $(function () {
                $('.datepicker').datepicker();
            });
        </script>
    </head>
    <body>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 text-center" style="font-size: 20px; ">
                        <img src="../images/report_baner.png" alt="UPASHAM HOSPITAL" title="UPASHAM HOSPITAL" height="100">
                    </div>
                </div>
            </div>
            <a style="border: 1px solid; margin-left: 80px;
    display: inline-block;
    font-family: caption;
    font-size: 12px;
    padding: 5px 10px;
    text-decoration: none;" href="addmision_patient_list.php">BACK</a>
            <div class="body_area" style="">
                <div class="container">
                    <div class="row">
                        <?php
                        include '../connection/db.php';
                        $id = $_GET['id'];
//                        echo $id;
                        $select_query = "select patient_entry_form.patient_name,"
                                . "patient_entry_form.id,"
                                . "patient_entry_form.mobile,"
                                . "patient_admission_system.reg_id ,"
                                . "patient_admission_system.cabin_no,"
                                . "patient_admission_system.admission_date,"
                                . "patient_admission_system.doctor_name,"
                                . "patient_admission_system.madical_problem,"
                                . "patient_admission_system.admission_fee,"
                                . "patient_admission_system.admission_payment,"
                                . "patient_admission_system.admission_due,"
                                . "patient_admission_system.admission_time"
                                . " from patient_entry_form inner join patient_admission_system "
                                . "on patient_entry_form.id=patient_admission_system.reg_id where reg_id='$id'";
//                        echo $select_query;
//                        die();
                        $execute_sql = $conn->query($select_query);
//                        echo $execute_sql;
//                        die();
                        while ($row = $execute_sql->fetch_assoc()) {
                            $reg_id = $row['id'];
                            $patient_name = $row['patient_name'];
                            $cabin_no = $row['cabin_no'];
                            $mobile = $row['mobile'];
                            $medical_problem = $row['madical_problem'];
                            $doctor_name = $row['doctor_name'];
                            $admission_fee = $row['admission_fee'];
                            $admission_payment = $row['admission_payment'];
                            $admission_due = $row['admission_due'];
                            $admission_date = $row['admission_date'];
                            $admission_time=$row['admission_time'];
                        }
                        ?>
                        <p class="text-center " style="background-color: #346E99;color: #fff; height: 35px; ">Details Report</p>
                        <div class="row">
                            <div class="part1 col-md-8" style="font-family: caption; font-size: 18px;">
                                <table style="text-align: left;" width="60%">
                                    <tr>
                                        <td>Registration ID</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $reg_id; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Patient Name</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $patient_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Cabin/Word No</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $cabin_no; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Mobile No</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $mobile; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Provisional Diagnosis</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $medical_problem; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Doctor Name</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $doctor_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Admission Fee</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $admission_fee; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Payment Fee</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $admission_payment; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Admission Due</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $admission_due; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Admission Date</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $admission_date; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Admission Time</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $admission_time; ?></td>
                                    </tr>
                                </table>
                                <hr >
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <div class="footer_area">
                <div class="container">
                    <div class="row">

                        <?php include '../footer.php'; ?>

                    </div>
                </div>
            </div>
    </body>

</html>
