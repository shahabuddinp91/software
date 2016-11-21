<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if(!isset($_SESSION['pharmacy_id'])){
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
            $(function(){
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
        
        <div class="body_area"  style="min-height: 660px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                        <div class="left_content_area">
                            <?php include './left_side_pharmacy.php'; ?>
                        </div>
                    </div>
                    <div class="right_content_area">
                        <div class="drugstore_form">
                            <div class="container">
                                <div class="col-md-10">
                                    <br>
                                    <div class="panel panel-primary modal-content modal-body">
                                        <div class="panel-heading" align="center">Drug Store Form</div>
                                                <br>
                                     <form class="form-horizontal drugstore_form" role="form">
                                        <div class="form-group">
                                          <label class="control-label col-sm-4" for="storedate">Date:</label>
                                          <div class="col-sm-8">
                                              <input type="text" class="form-control datepicker" id="storedate" name="storedate" placeholder="Date" >
                                          </div>
                                        </div>
                                         <div class="form-group">
                                          <label class="control-label col-sm-4" for="drugName">Drug Name:</label>
                                          <div class="col-sm-8">
                                              <input type="text" class="form-control" id="drugName" name="drugName" placeholder="Drug Name">
                                          </div>
                                        </div>
                                         <div class="form-group">
                                          <label class="control-label col-sm-4" for="quantity">Quantity:</label>
                                          <div class="col-sm-8">
                                              <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity">
                                          </div>
                                        </div>
                                          <div class="form-group">
                                          <label class="control-label col-sm-4" for="drugUnit">Drug Units:</label>
                                          <div class="col-sm-8">
                                              <input type="text" class="form-control" id="drugUnit" name="drugUnit" placeholder="DrugUnit">
                                          </div>
                                        </div>
                                         
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="buy_price">Buy Price:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="buy_price" name="buy_price" placeholder="Enter Buy Price">
                                                </div>
                                        </div>
                                         
                                        <div class="form-group">
                                          <label class="control-label col-sm-4" for="sell_price">Sell Price:</label>
                                          <div class="col-sm-8">
                                              <input type="text" class="form-control" id="sell_price" name="sell_price" placeholder="Enter sell Price">
                                          </div>
                                        </div>
                                         
                                        
                                        <div class="form-group">
                                          <div class="col-sm-offset-4 col-sm-8">
                                              <button type="submit" class="btn btn-default submit btn-primary" name="submit" >Submit</button>
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
                    var data = $('.drugstore_form').serialize();
                    $.ajax({
                        method : 'POST',
                        url : 'insert/drug_store_insert.php',
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
