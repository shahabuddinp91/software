<?php 
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['account_id'])) {
    header("location:../log_form.php");
}
//$patient_message = '';
include '../connection/link.php';
include '../connection/db.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UPASHAM HOSPITAL</title>
        <link rel="stylesheet" href="../css/responsive.css">
<!--        <link rel="stylesheet" href="../css/style.css">-->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">

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
        
            <div class="dashbord_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="dashboard_text text-center">
                                <img src="../images/baner.png" alt="UPASHAM HOSPITAL" title="UPASHAM HOSPITAL" height="100">
                            <br>
                                Dashboard Of Account
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body_area" >
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="left_content_area">
                                <?php include './left_side_accounts.php'; ?>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="right_content_area" style="margin-left: -95px;">
                                <div class="patient_list_area">
                                    <div class="response">
                                        <?php
                                        date_default_timezone_set("Asia/Dhaka");
                                        $today = date("m/d/Y");
                                        $month=date('F');
                                        $year = date('Y');
                                        ?>

                                        <div class="" style="border-bottom: 1px solid;padding-bottom: 6px;">
                                            



                                            <form action="" method="POST" style="font-size: 15px; padding-top: 5px; padding-bottom: 5px;">
                                                <table border="0" >
                                                    <tr>
                                                        <td style="text-align: center;"><input style="text-align: center;font-size: 12px;width: 300px;" type="text"  name="selldate" id="selldate"  class="form-control datepicker" placeholder="Search By ID !" required></td>
                                                        <td><input type="submit" name="search" value="Search" class="form-control btn-success" style="margin-left: 2px;"></td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>

                                        <table border="1" class="table text-center" style="margin-top: 10px;">
                                            <tr class="">
                                                <td style="background-color: #346E99;color: #fff;">SL No</td>
                                                <td style="background-color: #346E99;color: #fff;">Employee ID</td>
                                                <td style="background-color: #346E99;color: #fff;">Employee Name</td>
                                                <td style="background-color: #346E99;color: #fff;">Father name</td>
                                                <td style="background-color: #346E99;color: #fff;">Mobile</td>
                                                <td style="background-color: #346E99;color: #fff;">Address</td>
                                                <td style="background-color: #346E99;color: #fff;">Gender</td>
                                                <td style="background-color: #346E99;color: #fff;">Join Date</td>
                                                
                                            </tr>

                                            <?php
                                            date_default_timezone_set("Asia/Dhaka");
                                            //$today = date("m/d/Y");
                                            if(isset($_POST['search'])){
                                                $id = $_POST['selldate'];
                                            
//echo $today;
                                            
                                            $select_sql = "SELECT * FROM `add_person` where id = '$id'";
                                            $execute_sql = $conn->query($select_sql);
                                            $count = mysqli_num_rows($execute_sql);
//echo $count;
                                            if ($count > 0) {
                                                $sl=0;
                                                while ($row = $execute_sql->fetch_assoc()) {
                                                    $sl++;
                                                    ?>

                                                    <tr>
                                                        <td><?php echo $sl; ?></td>
                                                        <td><?php echo $row['id']; ?></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['f_name']; ?></td>
                                                        <td><?php echo $row['mobile']; ?></td>
                                                        <td><?php echo $row['address']; ?></td>
                                                        <td><?php echo $row['gender']; ?></td>
                                                        <td><?php echo $row['date']; ?></td>
                                                        
                                                    </tr>

                                                <?php } 
                                                
                                            }
                                            }?>
                                                
                                        </table>
                                        <p style=" background: #0099cc none repeat scroll 0 0;border: 1px solid;color: #fff;font-family: caption; font-size: 15px;height: 26px;text-align: center;width: 100%;">
                                            <?php echo $patient_message; ?>
                                        </p>
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
    </body>

</html>
