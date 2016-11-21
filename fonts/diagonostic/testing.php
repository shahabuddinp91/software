<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if(!isset($_SESSION['dianostic_id'])){
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
                                    
                                    <div class="panel panel-primary modal-content modal-body patient_test_bill">
                                        <div class="panel-heading" align="center">Patient Test Bill</div>
                                        <br>
                                                <br>
                                                <form class="form-horizontal" role="form" action="" method="post">
                                        <div class="form-group">
                                          <label class="control-label col-sm-4" for="RegNo">Registration No:</label>
                                          <div class="col-sm-8">
                                              <input type="text" class="form-control" id="RegNo" name="RegNo" placeholder="Registration No">
                                          </div>
                                        </div>
                                         
                                         <div class="form-group">
                                          <div class="col-sm-offset-4 col-sm-8">
                                              <button type="submit" name="RegSubmit" class="btn btn-default btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-default btn-success">Clear</button>
                                          </div>
                                        </div>
                                     </form>
                                    <form class="form-horizontal" role="form">
                                         <div class="form-group">
                                          <label class="control-label col-sm-4" for="PatientName">Patient Name:</label>
                                          <div class="col-sm-8">
                                              <input type="text" class="form-control" id="PatientName" name="PatientName" placeholder="Patient Name" readonly>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="control-label col-sm-4" for="MobileNo">Mobile No:</label>
                                          <div class="col-sm-8">
                                              <input type="text" class="form-control" id="MobileNo" name="MobileNo" placeholder="Mobile No" readonly>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="control-label col-sm-4" for="MedicalProblem">Medical Problem:</label>
                                          <div class="col-sm-8">
                                              <input type="text" class="form-control" id="MedicalProblem" name="MedicalProblem" placeholder="Medical Problem" readonly>
                                          </div>
                                        </div>
                                         <div class="form-group">
                                          <label class="control-label col-sm-4" for="DoctorName">Doctor Name:</label>
                                          <div class="col-sm-8">
                                              <input type="text" class="form-control" id="DoctorName" name="DoctorName" placeholder="Doctor Name" readonly>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="control-label col-sm-4" for="TestName">Test Name:</label>
                                          <div class="col-sm-8">
                                              <input type="text" class="form-control" id="TestName" name="TestName" placeholder="Test Name">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="control-label col-sm-4" for="Price">Price:</label>
                                          <div class="col-sm-8">
                                              <input type="text" class="form-control" id="Price" name="Price" placeholder="Price">
                                          </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                          <div class="col-sm-offset-4 col-sm-8">
                                            <button type="submit" class="btn btn-default btn-primary">Submit</button>
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
                    
                        <?php   include '../footer.php';?>
                   
                </div>
            </div>
        </div>
        </div>
    </body>
        
</html>
