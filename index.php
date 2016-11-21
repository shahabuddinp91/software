<?php
include 'connection/link.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <title>UPASHOM HOSPITAL</title>
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.css">
    </head>
    <body>
        <div class="wapper">
            <div class="dashbord_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_text text-center">
                            <img src="images/baner.png" alt="UPASHAM HOSPITAL" title="UPASHAM HOSPITAL" height="100">
                            <br>
                            Dashboard
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="body_area">
            <div class="container-fluid">
                    <div class="row">
                        <div class="left_content_area">
                            <div class="col-md-3">
                                <?php include './left_content.php'; ?>
                            </div>
                        </div>
                        <div class="right_content_area">
                            <div class="col-md-9" style="margin-bottom: 25px;margin-left: -59px;margin-top: 23px;">
                                <img src="images/1.jpg" title="UPASHAM HOSPITAL" alt="UPASHAM HOSPITAL">
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="footer_area">
            <div class="container-fluid">
                <div class="row">
                    
                        <?php   include 'footer.php';?>
                   
                </div>
            </div>
        </div>
        </div>
    </body>
        
</html>
