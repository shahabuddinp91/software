<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['dianostic_id'])) {
    header("location:../log_form.php");
}
include '../connection/link.php';
include '../connection/db.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UPASHAM HOSPITAL</title>
        <link rel="stylesheet" href="../css/responsive.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <script src="../js/main.js"></script>
        <script src="../js/bootstrap-datepicker.js"></script>

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
                                Dashboard Reception Desk (Hospital)
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body_area" style="min-height: 400px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="left_content_area col-md-2">
                                <?php include './letf_side_diagonostic.php'; ?>
                            </div>
                            <div class="right_content_area  col-md-10" style="margin-top: 10px; min-height: 500px;">
                                <div class="panel panel-primary">
                                    <div class="panel panel-heading text-center" style="margin-bottom: 0px;">Patient Admission System</div>
                                    
                                    <?php
                                        $validation = TRUE;

                                        $reg_message = '';
                                        $reg_date = '';
                                        $patient_name = '';
                                        $guardianname = '';
                                        $mobile = '';
                                        $age = '';
                                        $address = '';
                                        $madical_problem = '';
                                        $doctor_name = '';
                                        $regno = '';
                                        $count_message = '';
                                        $admisssion_message = '';
                                        $status = '';

                                        if (isset($_POST['RegSubmit'])) {
                                            $regno = $_POST['RegNo'];
                                            //echo $regno;
                                            if (!$regno) {
                                                $reg_message = "Enter Registration number !";
                                                $validation = FALSE;
                                            }
                                            if ($validation) {
                                                $select_sql = "SELECT * FROM `patient_entry_form` WHERE id = '$regno'";
                                                $execute_sql = $conn->query($select_sql);
                                                $count_patient = mysqli_num_rows($execute_sql);
                                                //echo $count_patient;

                                                if ($count_patient == 1) {
                                                    while ($row = $execute_sql->fetch_assoc()) {
                                                        $reg_date = $row['reg_date'];
                                                        $patient_name = $row['patient_name'];
                                                        $mobile = $row['mobile'];
                                                        $age = $row['age'];
                                                        $doctor_name = $row['doctor_name'];
                                                        $status = $row['status'];
                                                        echo $status;

                                                        //echo $reg_date.' '.$patient_name.' '.$guardianname.' '.$mobile.' '.$age.' '.$address.' '.$madical_problem.' '.$doctor_name;
                                                    }
                                                } else {
                                                    $count_message = "Registration Id Not Valid !";
                                                }
                                            }
                                        }
                                        ?>

                                        <?php
                                        $PatientName = '';
                                        $MobileNo = '';
                                        $Age = '';
                                        $Address = '';
                                        $DoctorName = '';
                                        $validation_massege = '';
                                        $freeRroom = '';
                                        $registrarion_number = '';
                                        $village = '';



                                        if (isset($_POST['form_submit'])) {
                                            date_default_timezone_set("Asia/Dhaka");
                                            $today = date("m/d/Y");
                                            $month = date('F');
                                            $year = date("Y");
                                            $time = date('H:i:s A');
                                            //echo $today;
                                            extract($_POST);
                                            $validation = TRUE;

                                            if (!$PatientName) {
                                                $validation_massege = "Enter patient registration number then complete admission. All field are required.*";
                                                $validation = FALSE;
                                            }

                                            if (!$freeRroom) {
                                                $validation_massege = 'Select form free room !*';
                                                $validation = FALSE;
                                            }
                                            
                                            $check_id = "SELECT * FROM `patient_admission_system` WHERE reg_id = '$registrarion_number'";
                                            $execute_sql = $conn->query($check_id);
                                            $count_registration_num = mysqli_num_rows($execute_sql);
                                            //echo $count_registration_num;
                                            if ($count_registration_num == 0) {
                                                if ($validation) {
                                                    $em_check = "SELECT * FROM `patient_entry_form` WHERE id = '$registrarion_number'";
                                                    $ex_em = $conn->query($em_check);
                                                    while ($em_id = $ex_em->fetch_assoc()){
                                                        $status = $em_id['status'];
                                                    }
                                                    if($status == 1){
                                                        $raju = 1;
                                                    }  else {
                                                        $raju = 2;
                                                    }
                                                    $select_sql = "INSERT INTO `patient_admission_system`( `reg_id`, `gardian_name`, `village`, `word`, `post_of`, `thana`, `district`, `related_parson`, `doctor_name`, `dr_unit_name`, `madical_problem`, `admission_fee`, `admission_payment`, `admission_due`, `cabin_no`, `admission_date`, `admission_time`, `month`,`year`,`status`,`sel`) VALUES ('$registrarion_number','$guardianName','$village','$Word_no','$post_of','$upazila','$dist','$closepersone','$DoctorName','$doctor_unit','$madical_problem','$admission_fee','$admission_payment','$admission_due','$freeRroom','$today','$time','$month','$year','Admit','$raju')";
                                                    
                                                    $execute_inser_sql = $conn->query($select_sql);
                                                    if ($execute_inser_sql) {
                                                        $update_sql = "UPDATE `room_info` SET`status`='2' WHERE cabin_no = '$freeRroom'";
                                                        $execute_room_update = $conn->query($update_sql);

                                                        if ($execute_room_update) {
                                                            $admisssion_message = "Admission successful ! Room Number is " . $freeRroom;
                                                        }
                                                    }
                                                }
                                            } else {
                                                $admisssion_message = 'ID ' . $registrarion_number . ' is already Addmited !';
                                            }
                                        }
                                        ?>
                                    <div class="text-center text-danger">
                                        <span style="color: #c9302c;font-weight: bolder;margin: 10px 0px;
                                              font-family: caption;font-size: 15px;padding: 10px 10px;"><?php echo $validation_massege . $admisssion_message . $reg_message, $count_message; ?></span>
                                    </div>
                                    <form class="form-horizontal" role="form"  method="POST" action="">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label col-sm-4" for="RegNo">Registration No:</label>
                                                    <div class="col-sm-8">
                                                        
                                                        <input type="text" class="form-control" value="<?php echo $regno; ?>" id="RegNo" name="RegNo" placeholder="Registration No">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <button type="submit" name="RegSubmit" class="btn btn-primary">Submit</button>
                                                    <button type="reset" class="btn btn-danger">Clear</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    
                                    <form class="form-horizontal form-group-sm" role="form"  method="POST" action="">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <p class="text-center" style="background: #4CA3D8; color: white">Patient Details Information</p>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label col-sm-4" for="PatientName">Patient Name:</label>
                                                    <div class="col-sm-8">
                                                        <input type="hidden" name="statu" value="<?php echo $status;?>">
                                                        <input type="text" class="form-control" value="<?php echo $patient_name; ?>" id="PatientName" name="PatientName" placeholder="Patient Name" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label col-sm-4" for="guardianName">Guardian Name:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"  id="guardianName" name="guardianName" placeholder="Enter Father / Husband's Name" >
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label col-sm-4" for="MobileNo">Mobile No:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="MobileNo" value="<?php echo $mobile; ?>" name="MobileNo" placeholder="Mobile No" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label col-sm-4" for="Age">Age:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="Age" value="<?php echo $age; ?>" name="Age" placeholder="Age" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label col-sm-4" for="village">Village:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="village" value="<?php echo $village;?>" name="village" placeholder="Enter village">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label col-sm-4" for="Word_no">Word:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="Word_no" name="Word_no" placeholder="Enter Word No">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label col-sm-4" for="post_of">Post Office:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="post_of" name="post_of" placeholder="Enter Post Office name !">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label col-sm-4" for="upazila">Upazila:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="upazila" name="upazila" placeholder="Enter Upazila Name">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label col-sm-4" for="dist">District:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="dist" name="dist" placeholder="Enter District Name">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label col-sm-4" for="closepersone">Closely Related Person:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="closepersone" name="closepersone" placeholder="Enter Close related parson">
                                                    </div>
                                                </div>
                                                <p class="col-md-12 text-center" style="background: #4CA3D8; color: white">Doctor's Information</p>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label col-sm-4" for="DoctorName">Name Of Consultant:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="DoctorName"  name="DoctorName" placeholder="Enter Consultant Name" >
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label col-sm-4" for="doctor_unit">Name of Units:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="doctor_unit"  name="doctor_unit" placeholder="Enter Unit Name" >
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label col-sm-4" for="madical_problem">Provisional Diagnosis::</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="madical_problem"  name="madical_problem" placeholder="Provisional Diagnosis" >
                                                    </div>
                                                </div>
                                                <p class="col-md-12 text-center" style="background: #4CA3D8; color: white">Cabin/Bed Information</p>
                                               <div class="form-group col-md-8 text-center" style="color: red;">
                                                    <label class="control-label col-sm-4" for="Room">Cabin/Bed Category :</label>
                                                    <div class="col-sm-8" style="color: red;">
                                                        <label><input id="tt" class="ac" type="radio" name="room" value="ac">AC</label>
                                                        <label><input class="nonac" type="radio" name="room" value="non-ac">Non-AC</label>
                                                        <label><input class="word" type="radio" name="room" value="word">Word</label>
                                                        <!--                                                     <button class="ac" name="ac" value="ac">AC</button>-->
                                                    </div>
                                                    <div class="book"></div>
                                                    <script>
                                                        $(document).ready(function () {
                                                            $('.ac').on('click', function (e) {
                                                                e.preventDefault();
                                                                //var data = $('#DoctorName').attr("value");
                                                                var value = $('.ac').attr("value");
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'room_selection.php',
                                                                    data: {value: value}
                                                                })
                                                                        .done(function (m) {
                                                                            //alert(m)
                                                                            $('#freeRroom').html(m);
                                                                        })
                                                            })
                                                        })

                                                        $(document).ready(function () {
                                                            $('.nonac').on('click', function (e) {
                                                                e.preventDefault();
                                                                var value = $('.nonac').attr("value");
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'room_selection_nonac.php',
                                                                    data: {value: value}
                                                                })
                                                                        .done(function (m) {
                                                                            //alert(m)
                                                                            $('#freeRroom').html(m);
                                                                        })
                                                            })
                                                        })

                                                        $(document).ready(function () {
                                                            $('.word').on('click', function (e) {
                                                                e.preventDefault();
                                                                var value = $('.word').attr("value");
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'room_selection_word.php',
                                                                    data: {value: value}
                                                                })
                                                                        .done(function (m) {
                                                                            //alert(m)
                                                                            $('#freeRroom').html(m);
                                                                        })
                                                            })
                                                        })
                                                    </script>
                                                </div>
                                                
                                                <div class="form-group col-md-8 text-center">
                                                    <label class="control-label col-sm-4" for="freeRroom">Cabin/Bed No:</label>
                                                    <div class="col-sm-8">
                                                        
                                                        <select class="form-control" name="freeRroom" id="freeRroom" style="color: red;">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-8 text-center">
                                                    <label class="control-label col-sm-4" for="addmission_fee">Admission Fee:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="addmission_fee"  name="admission_fee" readonly="true" value="300" >
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-8">
                                                    <label class="control-label col-sm-4" for="addmission_payment">Admission Payment:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="addmission_payment" name="admission_payment"  placeholder="Enter Admission Payment( If Any )" >
                                                    </div>
                                                </div>

                                                <script>
                                                    $(document).ready(function () {
                                                        $('#addmission_payment').on('keyup', function (e) {
                                                            e.preventDefault();
                                                            var value = $('#addmission_fee').attr("value");
                                                            var payment = $(this).val();
                                                            $.ajax({
                                                                method: 'POST',
                                                                url: 'admission_fee_calclution.php',
                                                                data: {fee: value, payment: payment}
                                                            })
                                                                    .done(function (m) {
                                                                        //alert(m)
                                                                        $('#due').html(m);
                                                                    })
                                                        })
                                                    })
                                                </script>

                                                <div class="form-group col-md-8">
                                                    <label class="control-label col-sm-4" for="addmission_due">Admission Due:</label>
                                                    <div class="col-sm-8" id="due" style="color: red;">
                                                        <input type="text" class="form-control" value="300" id="addmission_due" name="admission_due" readonly="true" >
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-8">
                                                    <div class="col-sm-offset-4 col-sm-8">
                                                        <button type="submit" class="btn btn-primary" name="form_submit">Submit</button>
                                                        <button type="reset" class="btn btn-warning">Clear</button>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="registrarion_number" value="<?php echo $regno; ?>">
                                           
                                            </div>
                                        </div>
                                    </form>
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_area" style="margin-top: 80px;">
                <div class="container-fluid">
                    <div class="row">

                        <?php include '../footer.php'; ?>

                    </div>
                </div>
            </div>
        </div>


    </body>

</html>
