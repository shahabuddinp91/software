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
                        <div class="col-md-9">
                            
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
