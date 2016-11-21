<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['receiption_id'])) {
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
        <div class="wapper">
            <div class="dashbord_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="dashboard_text text-center">
                                <img src="../images/baner.png" alt="UPASHAM HOSPITAL" title="UPASHAM HOSPITAL" height="100">
                                <br>
                                Dashboard Of Reception Desk (Diagnostic)
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body_area"  style="min-height: 660px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="left_content_area">
                                <?php include './left_side_reception.php'; ?>
                            </div>
                        </div>
                        <div class="right_content_area">
                            <div class="drugstore_form">
                                <div class="container">
                                    <div class="col-md-offset-1 col-md-8">
                                        <br>
                                        <div class="panel panel-primary modal-content modal-body ">
                                            <div class="panel-heading" align="center">Updating Information</div>
                                            <br>
                                            <form class="form-horizontal drugstore_form" role="form" method="POST" action="">
                                                <?php
                                                include '../connection/db.php';
                                                $edit_id = $_GET['id'];
//                                         echo $edit_id;
                                                $select_query = "SELECT * FROM `patient_entry_form` WHERE id='$edit_id'";
                                                $execute_sql = $conn->query($select_query);

                                                while ($row = $execute_sql->fetch_assoc()) {
                                                    $date = $row['reg_date'];
                                                    $patient_name = $row['patient_name'];
                                                    $guardian_name = $row['guardian_name'];
                                                    $mobile = $row['mobile'];
                                                    $address = $row['address'];
                                                    $gender = $row['gender'];
                                                    $age = $row['age'];
                                                    $medical_problem = $row['medical_problem'];
                                                    $doctor_name = $row['doctor_name'];
                                                    $visit_amount = $row['visit_amount'];
                                                    $current_month = $row['current_month'];
                                                }
//                                         echo $drugName;
                                                ?>

                                                <?php
                                                $update_mes = '';
                                                if (isset($_POST['update'])) {
                                                    extract($_POST);
//                                                    echo $regdate;
//                                                    echo $patientname;
//                                                    die();

                                                    $update_sql = "UPDATE `patient_entry_form` SET `reg_date`='$regdate',`patient_name`='$patientname',`guardian_name`='$guardianname',`mobile`='$mobile',`address`='$address',`gender`='$gender',`age`='$age',`medical_problem`='$medicalproblem',`doctor_name`='$doctorname',`visit_amount`='$visitamount' WHERE id = '$edit_id'";
                                                    $execute_sql = $conn->query($update_sql);
//                                                    echo $execute_sql;
//                                                    die();
                                                    if ($execute_sql) {
                                                        $select_query = "SELECT * FROM `patient_entry_form` WHERE id='$edit_id'";
                                                        $execute_sql = $conn->query($select_query);

                                                        while ($row = $execute_sql->fetch_assoc()) {
                                                            $date = $row['reg_date'];
                                                            $patient_name = $row['patient_name'];
                                                            $guardian_name = $row['guardian_name'];
                                                            $mobile = $row['mobile'];
                                                            $address = $row['address'];
                                                            $gender = $row['gender'];
                                                            $age = $row['age'];
                                                            $medical_problem = $row['medical_problem'];
                                                            $doctor_name = $row['doctor_name'];
                                                            $visit_amount = $row['visit_amount'];
                                                            $current_month = $row['current_month'];
                                                            $update_mes = "Update successful";
                                                        }
                                                    }
                                                }
                                                ?>
                                                <h3 align='center' style="color: green"><?php echo $update_mes; ?></h3>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="regid">Registration ID:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="regid" name="regid" value="<?php echo $edit_id; ?>" readonly="1">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="regdate">Registration Date:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control datepicker" id="regdate" name="regdate" value="<?php echo $date; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="patientname">Patient Name:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control patientname" id="patientname" name="patientname" value="<?php echo $patient_name; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="guardianName">Guardian Name:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="guardianName" name="guardianname" value="<?php echo $guardian_name; ?>">
                                                    </div>

                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="address">Address:</label>
                                                    <div class="col-sm-8">
                                                        <textarea class="form-control" id="address" name="address" cols="30" rows="5"><?php echo $address; ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="mobile">Mobile No:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $mobile; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="gender">Gender:</label>
                                                    <div class="col-sm-8">
                                                        <select name="gender" id="gender" class="entry10" >
                                                            <option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
                                                            <option value="Male" >Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="age">Age:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="age" name="age" value="<?php echo $age; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="medicalproblem">Medical Problem:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="medicalproblem" name="medicalproblem" value="<?php echo $medical_problem; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="doctorname">Doctor Name:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="doctorname" name="doctorname" value="<?php echo $doctor_name; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="visitamount">Visit Amount:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="visitamount" name="visitamount" value="<?php echo $visit_amount; ?>">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="col-sm-offset-4 col-sm-8">
                                                        <button type="submit" class="btn btn-default update btn-primary" name="update">Update</button>

                                                        <button type="reset" class="btn btn-default btn-success clear">Clear</button>
                                                    </div>
                                                </div>
                                            </form>


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

                        <?php include '../footer.php'; ?>

                    </div>
                </div>
            </div>
        </div>

    </body>

</html>
