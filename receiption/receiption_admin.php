<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
if(!isset($_SESSION['receiption_id'])){
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
                        <div class="col-md-9" style="margin-bottom: 25px;margin-left: -59px;margin-top: 23px;"
>       
                            <img style="width: 970px;height: 415px;" src="../images/2.jpg" title="UPASHAM HOSPITAL" alt="UPASHAM HOSPITAL">
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
