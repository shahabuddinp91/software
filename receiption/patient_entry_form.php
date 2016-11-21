<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['receiption_id'])) {
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
                                Dashboard Of Reception Desk (Diagnostic)
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
                                <?php include './left_side_reception.php'; ?>

                            </div>
                        </div>
                        <div class="right_content_area">
                            <div class="patient_entry_form">
                                <div class="container-fluid">
                                    <div class="col-md-9">
                                        <br>
                                        <div class="panel panel-primary modal-content modal-body" style="margin-left: -94px;" >
                                            <div class="panel-heading entry_form_area" align="center">Patient Entry Form</div>
                                            <br>
                                            <div id="new"></div>
                                            <form class="form-horizontal center-block entry_form" role="form">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                            <!--                                                            <div class="form-group">
                                                                                                                            <label class="control-label col-sm-4 entry1" for="RegDate">Registration Date:</label>
                                                                                                                            <div class="col-sm-8">
                                                                                                                                <input type="text" class="form-control datepicker entry2" id="RegDate" name="regdate" placeholder="Date" >
                                                                                                                            </div>
                                                                                                                        </div>-->
                                                            <div class="form-group col-md-6">
                                                                <label class="control-label col-sm-4" for="PatientName">Patient Name:</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="PatientName" name="patientname" placeholder="Patient Name">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group col-md-6">
                                                                <label class="control-label col-sm-4" for="Age">Age:</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="Age" name="age" placeholder="Age">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group col-md-6">
                                                                <label class="control-label col-sm-4" for="MobileNo">Mobile No:</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="MobileNo" name="mobile" placeholder="Mobile No">
                                                                </div>
                                                            </div>
                                                            
                                                            <script>
                                                                $(document).ready(function () {
                                                                    $('#MobileNo').on('keyup', function (e) {
                                                                        e.preventDefault();
                                                                        var data = $(this).val();
                                                                        $.ajax({
                                                                            method: 'POST',
                                                                            url: 'patient_identity.php',
                                                                            data: {data:data}
                                                                        })
                                                                                .done(function (r) {
                                                                                    //alert(r)
                                                                                    $('#new').html(r);
                                                                                })
                                                                    })
                                                                })
                                                            </script>
                                                            
                                                            <div class="form-group col-md-6">
                                                                <label class="control-label col-sm-4" for="gender">Gender:</label>
                                                                <div class="col-sm-8">
                                                                    <select name="gender" id="gender" class="form-control">
                                                                        <option value="">Select One</option>
                                                                        <option value="Male">Male</option>
                                                                        <option value="Female">Female</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group col-md-6">
                                                                <label class="control-label col-sm-4" for="Address">Address:</label>
                                                                <div class="col-sm-8">
                                                                    <textarea class="form-control" id="Address" name="address" placeholder="Address" cols="30" rows="2"></textarea>
                                                                    
                                                                </div>
                                                            </div>
                                                            
                                            
                                                            
                                                            <div class="doctor_visit" style="color: red;">
                                                                <div class="form-group col-md-6">
                                                                <label class="control-label col-sm-4" for="dr_name">Doctor Name:</label>
                                                                <div class="col-sm-8" >
                                                                    <input type="text" style="color: red;" class="form-control" id="dr_name" name="doctorname" placeholder="* Only for appointment !">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group col-md-6">
                                                                <label class="control-label col-sm-4" for="dr_room_no">Dr. Room No:</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" style="color: red;" class="form-control" id="dr_room_no" name="dr_room_no" placeholder="* Only for appointment !">
                                                                </div>
                                                            </div>  
                                                            
                                                            <div class="form-group col-md-6">
                                                                <label class="control-label col-sm-4" for="visit_amount">Visited Amount:</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" style="color: red;" class="form-control" id="visit_amount" name="visitedamount" placeholder="* Only for appointment !">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group col-md-6">
                                                                <label class="control-label col-sm-4" for="payment_amount">Payment Amount:</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" style="color: red;" class="form-control"  id="payment_amount" name="payment" placeholder="* Only for appointment !">
                                                                </div>
                                                            </div>
                                                            
                                                            <script>
                                                                $(document).ready(function () {
                                                                    $('#payment_amount').on('keyup', function (e) {
                                                                        e.preventDefault();
                                                                        var data = $(this).val();
                                                                        var amount = $('#visit_amount').val();
                                                                        $.ajax({
                                                                            method: 'POST',
                                                                            url: 'visit_due_calclution.php',
                                                                            data: {data:data,amount:amount}
                                                                        })
                                                                                .done(function (m) {
                                                                                    $('#due').html(m);
                                                                                })
                                                                    })
                                                                })
                                                            </script>
                                                            
                                                            
<!--                                                            <div class="form-group col-md-6">
                                                                <label class="control-label col-sm-4" for="due_amount">Due Amount:</label>
                                                                <div class="col-sm-8"  id="due">
                                                                    <input style="color: red;" type="text" class="form-control" readonly="true" id="due_amount" name="due" placeholder="* Only for appointment !">
                                                                </div>
                                                            </div>-->
                                                            </div>
                                                            
                                                            <div class="form-group col-md-6">
                                                                <label class="control-label col-sm-4" for="reference">Reference name :</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="reference" name="reference" placeholder="Reference Name (If any) ">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group col-md-6">
                                                                <label class="control-label col-sm-4" for="ref_number">Ref. Mobile:</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="ref_number" name="ref_number" placeholder="Ref. Mobile">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group col-md-11 text-right">
                                                                <div class="col-sm-offset-4 col-sm-8">
                                                                    <button type="submit" class="btn btn-primary insert" name="insert">Submit</button>
                                                                    <button type="reset" class="btn btn-success clear">Clear</button>
                                                                </div>
                                                            </div>
                                                            

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
            $(document).ready(function () {
                $('.insert').on('click', function (e) {
                    e.preventDefault();
                    var data = $('.entry_form').serialize();
                    $.ajax({
                        method: 'POST',
                        url: 'entry_insert.php',
                        data: data
                    })
                            .done(function (m) {
                                alert(m)
                                //$('.clear').trigger('click');
                            })
                })
            })
        </script>
    </body>

</html>
