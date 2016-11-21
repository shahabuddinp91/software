<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['pathology_id'])) {
    header("location:../log_form.php");
}
include '../connection/link.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UPASHAM HOSPITAL</title>
        <link rel="stylesheet" href="../css/responsive.css">
<!--        <link rel="stylesheet" href="../css/style.css">-->
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
        <style>
            body{
    height: 100%;
    background: url(../images/patern.png);
    font-family: initial;

}




.dashbord_area {
    /*background: #3BB7DB none repeat scroll 0 0;*/
    padding: 15px 0;
}
.dashboard_text {
    color: #000;
    font-family: caption;
    font-size: 16px;
    font-weight: bolder;
}
.dashboard_text img{width: 100%; }


.manu {
    margin-top: 25px;
}
.manu li {
    list-style: outside none none;
    text-decoration: none;
}
.manu ul {
    padding-left: 0;
}
.manu a {
    background: #33b5e5 none repeat scroll 0 0;
    display: inline-block;
    margin-bottom: 10px;
    padding: 10px 5px;
    text-decoration: none;
    width: 210px;
    font-family: caption;
     font-size: 16px;
}
.manu a:hover {
    background: #0099cc none repeat scroll 0 0;
    color: #fff;
    text-decoration: none;
}
            #copyright {
    background: #a4bed9 none repeat scroll 0 0;
    color: #fff;
    font-family: caption;
    font-size: 15px;
    text-align: center;
      padding: 10px 0;
    
}
        </style>

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
                                Dashboard Of Pathology
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body_area" >
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="left_content_area">
                                <?php include './left_side_pathology.php'; ?>
                            </div>
                        </div>
                        <div class="right_content_area">
                            <div class="col-md-10">
                                <form action="output_admin_indoor_search.php" method="POST" style="font-size: 15px; padding-top: 5px; padding-bottom: 5px;">
                                    <table border="0" >
                                        <tr>
                                            <td style="text-align: center;"><input style="text-align: center;font-size: 12px;width: 300px;" type="text"  name="search_date" id="search_date"  class="form-control datepicker" placeholder="Search By Date & ID !" required></td>
                                            <td><input type="submit" name="search" value="Search" class="form-control btn-success" style="margin-left: 2px;"></td>
                                        </tr>
                                    </table>
                                </form>
                                <?php
                                    date_default_timezone_set("Asia/Dhaka");
                                    $month = date('F');
                                    $today = date('m/d/Y');
                                ?>
                                <p style="color: red;font-size: 29px;">Outdoor approve report for <?php echo $today;?></p>
                                <table id="hide" border="1" class="table text-center" style="margin-top: 10px;">
                                    <tr class="">
                                        <td style="background-color: #346E99;color: #fff;">SL No</td>
                                        <td style="background-color: #346E99;color: #fff;">Patient ID</td>
                                        <td style="background-color: #346E99;color: #fff;">Test category</td>
                                        <td style="background-color: #346E99;color: #fff;">Test name</td>
                                        <td style="background-color: #346E99;color: #fff;">Status</td>
                                        <td style="background-color: #346E99;color: #fff;">Date</td>
                                    </tr>
                                    <?php
                                    include_once '../connection/db.php';
                                    $out_p_id = '';
                                    $patient_message = '';
                                    date_default_timezone_set("Asia/Dhaka");
                                    $month = date('F');
                                    $today = date('m/d/Y');
                                    $patient_message = '';
                                    $select_query = "SELECT * FROM `indoor_path_message` WHERE status = 'REPORT OK RECEPTION ADMIN RECEIVED IT.' and date = '$today'";
//                                                    echo $select_query;
//                                                    die();
                                    $execute_sql = $conn->query($select_query);
                                    $count = mysqli_num_rows($execute_sql);

                                    if ($count > 0) {
                                        $sl = 0;
                                        while ($row = $execute_sql->fetch_assoc()) {
                                            $sl++;
                                            ?>
                                            <tr>
                                                <td><?php echo $sl ?></td>
                                                <td><?php echo $row['patient_id']; ?></td>
                                                <td><?php echo $row['test_catagory']; ?></td>
                                                <td><?php echo $row['test_name']; ?></td>
                                                <td><?php echo $row['status'] ?></td>
                                                <td><?php echo $row['date'] ?></td>
                                                
                                            </tr>
                                                    
                                               
                                            <?php
                                        }
                                    } else {
                                        $patient_message = 'Patient are not present !';
                                    }
                                    ?>
                                </table>
                                <script>
                                                        $(document).ready(function(){
                                                            $('.edit').on('click',function(e){
                                                                e.preventDefault();
                                                                var data = $(this).attr("user_id");
                                                                $.ajax({
                                                                    method : 'POST',
                                                                    url : 'pathology_ok.php',
                                                                    data : {data:data}
                                                                })
                                                                .done(function(m){
                                                                    alert(m);
                                                                    
                                                                })
                                                            })
                                                        })
                                                                                
                                                    </script>
                                <p style=" background: #0099cc none repeat scroll 0 0;border: 1px solid;color: #fff;font-family: caption; font-size: 15px;height: 26px;text-align: center;width: 100%;">
                                    <?php echo $patient_message; ?>
                                </p>
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
