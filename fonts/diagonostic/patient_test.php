<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['dianostic_id'])) {
    header("location:../log_form.php");
}
include '../connection/link.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UPASHOM HOSPITAL</title>
        <link rel="stylesheet" href="../css/responsive.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
    </head>
    <body>
        <div class="wapper">
            <div class="dashbord_area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="dashboard_text text-center">
                                <?php echo $title2 ?>
                                <?php echo "<br>" ?>
                                <?php echo $title4 ?>
                                <br>
                                Dashboard Of Diagonostic
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body_area" style="min-height: 700px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="left_content_area">
                                <?php include './letf_side_diagonostic.php'; ?>
                            </div>
                        </div>
                        <div class="right_content_area">
                            <div class="patient_entry_form">
                                <div class="container">
                                    <div class="col-md-offset-1 col-md-8">
                                        <br>

                                        <?php
                                        include '../connection/db.php';
                                        $validation = TRUE;
                                        $reg_msg = '';
                                        $regno = '';
                                        $patient_name = '';
                                        $mobile = '';
                                        $madical_problem = '';
                                        $doctor_name = '';

                                        $count_message = '';
                                        if (isset($_POST['RegSubmit'])) {
                                            $regno = $_POST['RegNo'];
//                                             echo $regno;

                                            if (!$regno) {
                                                $reg_msg = "Please, Enter Registration No !";
                                                $validation = FALSE;
                                            }

                                            if ($validation) {
                                                $select_sql = "SELECT * FROM `patient_entry_form` WHERE id = '$regno'";
//                                                 echo $select_sql;
//                                                 die();
                                                $execute_sql = $conn->query($select_sql);
                                                $count_patient = mysqli_num_rows($execute_sql);
//                                                echo $count_patient;
//                                                 die();
                                                if ($count_patient == 1) {
                                                    while ($row = $execute_sql->fetch_assoc()) {
                                                        $patient_name = $row['patient_name'];
                                                        $mobile = $row['mobile'];
                                                        $madical_problem = $row['medical_problem'];
                                                        $doctor_name = $row['doctor_name'];
                                                    }
                                                } else {
                                                    $count_message = "Registration Id Is Not Valid !";
                                                }
                                            }
                                        }
                                        ?>
                                        <?php
//                                        include '../connection/db.php';
//                                        $regno2='';
//                                        if(isset($_POST['submit'])){
////                                            $regno2 = $_POST['RegNo'];
//                                            echo $regno2;
//                                        }
                                        ?>


                                        <div class="panel panel-primary modal-content modal-body patient_test_bill">
                                            <div class="panel-heading" align="center" style="font-size: 20px;">Patient Test Bill</div>
                                            <p style="color: #941596; font-size: 20px; font-family: cursive; text-align: center; font-style: italic"> <?php echo $reg_msg, $count_message; ?></p>
                                            
                                            <br>
                                            <form class="form-horizontal" role="form" action="" method="post">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="RegNo">Registration No:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="RegNo" name="RegNo" value="<?php echo $regno; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-offset-4 col-sm-8">
                                                        <button type="submit" name="RegSubmit" class="btn btn-default btn-primary">Submit</button>
                                                        <button type="reset" class="btn btn-default btn-success">Clear</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <form class="form-horizontal" role="form" action="" method="post">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="PatientName">Patient Name:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="PatientName" name="PatientName" value="<?php echo $patient_name; ?> " placeholder="Patient Name" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="MobileNo">Mobile No:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="MobileNo" name="MobileNo" value="<?php echo $mobile; ?> " placeholder="Mobile No" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="MedicalProblem">Medical Problem:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="MedicalProblem" name="MedicalProblem" value="<?php echo $madical_problem; ?> " placeholder="Medical Problem" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="DoctorName">Doctor Name:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="DoctorName" name="DoctorName" value="<?php echo $doctor_name; ?> " placeholder="Doctor Name" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="test_name">Test Name:</label>
                                                    <div class="col-sm-8">
                                                        <select name="test_name" class="form-control" id="test_name">
                                                            <option>select</option> 
                                                            <?php
                                                            include '../connection/db.php';
                                                            $query = mysqli_query($conn, "SELECT * FROM add_test_info");
                                                            while ($row = mysqli_fetch_array($query)) {
                                                                ?>
                                                                <option class="test_name" value="<?php echo $row['test_name']; ?>"><?php echo $row['test_name']; ?></option> 
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="price">Price:</label>
                                                    <div class="col-sm-8">
<!--                                                        <input type="text" class="form-control"  id="price" name="price" placeholder="Price Name">-->
                                                        <select name="test_name" class="form-control" id="test_name">
                                                            <option>select</option> 
                                                            <?php
                                                            include '../connection/db.php';
                                                            $id=$_POST['id'];
                                                            $query = mysqli_query($conn, "SELECT * FROM add_test_info");
                                                            while ($row = mysqli_fetch_array($query)) {
                                                                ?>
                                                                <option class="test_name" value="<?php echo $row['price']; ?>"><?php echo $row['price']; ?></option> 
                                                                <?php
                                                            }
                                                            ?>
                                                               
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="col-sm-offset-4 col-sm-8">
                                                        <button type="submit" class="btn btn-default btn-primary" name="submit">Submit</button>
                                                        <button type="reset" class="btn btn-default btn-success">Clear</button>
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
