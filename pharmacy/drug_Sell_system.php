<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['pharmacy_id'])) {
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
                                Dashboard of Pharmacy
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body_area" style="min-height: 660px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="left_content_area">
                                <?php include './left_side_pharmacy.php'; ?>
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
                                        $msg = '';
                                        $count_message = '';
                                        $regno = '';
                                        $patient_name = '';
                                        $mobile = '';
                                        $medicalproblem = '';
                                        $doctor_name = '';
                                        if (isset($_POST['RegSubmit'])) {
                                            $regno = $_POST['RegNo'];
//                                        echo $regno;
                                            if (!$regno) {
                                                $msg = "Please, Enter Registration ID !";
                                                $validation = FALSE;
                                            }
                                            if ($validation) {
                                                $select_patient = "SELECT * FROM `patient_admission_system` WHERE reg_id = '$regno'";
                                                $execute_patient = $conn->query($select_patient);
                                                $count_patient_admition = mysqli_num_rows($execute_patient);
                                                
                                                if($count_patient_admition == 1){
                                                    $select_query = "SELECT * FROM `patient_entry_form` WHERE id='$regno'";
//                                            echo $select_query;
//                                            die();
                                                $execute_query = $conn->query($select_query);
                                                $count_patient = mysqli_num_rows($execute_query);
//                                           echo $count_patient;
//                                            die();
                                                if ($count_patient == 1) {
                                                    while ($row = $execute_query->fetch_assoc()) {
                                                        $patient_name = $row['patient_name'];
                                                        $mobile = $row['mobile'];
                                                        $doctor_name = $row['doctor_name'];
                                                    }
                                                } else {
                                                    $count_message = "Registration Id Is Not Valid !";
                                                }
                                                }  else {
                                                    $count_message = 'Id '.$regno.' is not admitted patient.';
                                                }
                                                
                                            }
                                        }
                                        ?>
                                        <!--end of data collect to patient_entry_form-->
                                        <!--start to current data store from here-->
                                        <?php
                                        include '../connection/db.php';
                                        
                                        ?>

                                        <div style="height: 650px;" class="panel panel-primary modal-content modal-body drug_sell_system" >
                                            <div class="panel-heading" align="center">Drug Store Form</div>
                                            <p style="color: #941596; font-size: 20px; font-family: cursive; text-align: center;"> <?php echo $msg, $count_message; ?></p>
                                            <br>
                                            <form class="form-horizontal" role="form" action="" method="post">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="RegNo">Registration No:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="RegNo" name="RegNo" value="<?php echo $regno; ?>" placeholder="Registration No">
                                                    </div> 
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-offset-4 col-sm-8">
                                                        <button type="submit" name="RegSubmit" class="btn btn-default btn-primary">Submit</button>
                                                        <button type="reset" class="btn btn-default btn-danger">Clear</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <form class="form-horizontal teststore_form" role="form" action="" method="post">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="PatientName">Patient Name:</label>
                                                    <div class="col-sm-8">
                                                        <input readonly="true" type="text" class="form-control" id="PatientName" name="PatientName" value="<?php echo $patient_name; ?>" placeholder="Patient Name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="MobileNo">Mobile No:</label>
                                                    <div class="col-sm-8">
                                                        <input readonly="true" type="text" class="form-control" id="MobileNo" name="MobileNo" value="<?php echo $mobile; ?>" placeholder="Mobile No">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="DoctorName">Doctor Name:</label>
                                                    <div class="col-sm-8">
                                                        <input readonly="true" type="text" class="form-control" id="DoctorName" name="DoctorName" value="<?php echo $doctor_name; ?>" placeholder="Doctor Name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="DrugName">Drug Name:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="DrugName" name="DrugName" placeholder="Drug Name">
                                                    </div>
                                                </div>
                                            
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="Units">Units:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="Units" name="Units" placeholder="Enter Units">
                                                    </div>
                                                </div>

                                                <script>
                                                    $(document).ready(function(){
                                                        $('#Units').on('keyup',function(e){
                                                            e.preventDefault();
                                                            var unit = $(this).val();
                                                            var name = $('#DrugName').val();
                                                            $.ajax({
                                                                method:'POST',
                                                                url:'drug_name.php',
                                                                data:{name:name,unit:unit}
                                                            })
                                                                    .done(function(rr){
                                                                        //alert(rr);
                                                                        $('.replace').html(rr);
                                                                    })
                                                                })
                                                            })
                                                        </script>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="Quantity">Quantity:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="Quantity" name="Quantity" placeholder="Quantity">
                                                    </div>
                                                </div>

                                                
                                                <div class="form-group replace">
                                                    <label class="control-label col-sm-4" for="Price">Price:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="Price"  name="Price" placeholder="Price">
                                                    </div>
                                                </div>
                                                        <script>
                                                    $(document).ready(function(){
                                                        $('#Quantity').on('keyup',function(e){
                                                            e.preventDefault();
                                                            var unit = $(this).val();
                                                            var Units = $('#Units').val();
                                                            var name = $('#DrugName').val();
                                                            var price = $('#Price').attr("value");
                                                            var total_q = $('#total_quantity').attr("value");
                                                            $.ajax({
                                                                method:'POST',
                                                                url:'total_price.php',
                                                                data:{price:price,unit:unit,total_q:total_q,Units:Units,name:name}
                                                            })
                                                                    .done(function(rr){
                                                                        //alert(rr);
                                                                        $('.replace').html(rr);
                                                                    })
                                                                })
                                                            })
                                                        </script>

                                                <div class="form-group">
                                                    <div class="col-sm-offset-4 col-sm-8">
                                                        <input type="hidden" class="p_id" name="registration_number" value="<?php echo $regno; ?>">
                                                        <button type="submit" class="btn btn-default btn-primary submit2" name="submit2">Submit</button>
                                                        <button type="reset" class="btn btn-default btn-danger clear">Clear</button>
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
        
        <script>
            $(document).ready(function(){
                $('.submit2').on('click',function(e){
                    e.preventDefault();
                    var p_id = $('.p_id').attr("value");
                    var drug_name = $('#DrugName').val();
                    var Units = $('#Units').val();
                    var Quantity = $('#Quantity').val();
                    var price = $('#Price').attr("value");
                    $.ajax({
                        method : 'POST',
                        url : 'insert/drug_sell_insert.php',
                        data : {price:price,p_id:p_id,drug_name:drug_name,Units:Units,Quantity:Quantity}
                    })
                            .done(function(m){
                                alert(m)
                        $('.clear').trigger('click')
                    })
                })
            })
        </script>
    </body>

</html>
