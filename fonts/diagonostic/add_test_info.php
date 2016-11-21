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
        
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/datepicker.css">
        <script src="../js/main.js"></script>
        <script src="../js/bootstrap-datepicker.js"></script>
        <script>
            $(function(){
                $('.datepicker').datepicker();
            });
        </script>
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
                            Dashboard of Pharmacy
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
                            <?php include './letf_side_diagonostic.php'; ?>
                        </div>
                    </div>
                    <div class="right_content_area">
                        <div class="drugstore_form">
                            <div class="container">
                                <div class="col-md-offset-1 col-md-8">
                                    <br>
                                    <div class="panel panel-primary modal-content modal-body add_test_info">
                                        <div class="panel-heading" align="center">Test Add Form</div>
                                                <br>
                                     <form class="form-horizontal teststore_form" role="form">
                                        
                                         <div class="form-group">
                                          <label class="control-label col-sm-4" for="testcategory">Test Category:</label>
                                          <div class="col-sm-8">
                                              <input type="text" class="form-control" id="testcategory" name="testcategory" placeholder="Test Category">
                                          </div>
                                        </div>
                                         <div class="form-group">
                                          <label class="control-label col-sm-4" for="testname">Test Name:</label>
                                          <div class="col-sm-8">
                                              <input type="text" class="form-control" id="testname" name="testname" placeholder="Test Name">
                                          </div>
                                        </div>
                                          <div class="form-group">
                                          <label class="control-label col-sm-4" for="price">Price:</label>
                                          <div class="col-sm-8">
                                              <input type="text" class="form-control" id="price" name="price" placeholder="Price">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="col-sm-offset-4 col-sm-8">
                                              <button type="submit" class="btn btn-default submit btn-primary submit" name="submit" >Submit</button>
                                            <button type="reset" class="btn btn-default clear btn-success">Clear</button>
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
        
        <script>
            $(document).ready(function(){
                $('.submit').on('click',function(e){
                    e.preventDefault();
                    var data = $('.teststore_form').serialize();
                    $.ajax({
                        method : 'POST',
                        url : 'insert/test_insert.php',
                        data : data
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
