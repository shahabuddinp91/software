<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['receiption_id'])) {
    header("location:../log_form.php");
}
$patient_message = '';
include '../connection/link.php';
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
                        <div class="col-md-9">
                            <div class="right_content_area" style="margin-left: -95px;">
                                <div class="patient_list_area">
                                    <div class="response">
                                        <?php
                                        date_default_timezone_set("Asia/Dhaka");
                                        $today = date("m/d/Y");
                                        $month=date('F');
                                        ?>

                                        <div class="" style="border-bottom: 1px solid;padding-bottom: 6px;">
                                            <h2 style="color: #000;font-family: caption;font-size: 24px;margin-left: 50px;opacity: 0.6;display: inline-block;">
                                                <?php echo 'All Patient at ' . $today ?>

                                            </h2>



                                            <form action="output_all_patient_list_search_by_date.php" method="POST" style="font-size: 15px; padding-top: 5px; padding-bottom: 5px;">
                                                <table border="0" >
                                                    <tr>
                                                        <td style="text-align: center;"><input style="text-align: center;font-size: 12px;width: 300px;" type="text"  name="selldate" id="selldate"  class="form-control datepicker" placeholder="Search By Date,ID & Mobile !" required></td>
                                                        <td><input type="submit" name="search" value="Search" class="form-control btn-success" style="margin-left: 2px;"></td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>

                                        <table border="1" class="table text-center" style="margin-top: 10px;">
                                            <tr class="">
                                                <td style="background-color: #346E99;color: #fff;">SL No</td>
                                                <td style="background-color: #346E99;color: #fff;">Registration ID</td>
                                                <td style="background-color: #346E99;color: #fff;">Patient Name</td>
                                                <td style="background-color: #346E99;color: #fff;">Age</td>
                                                <td style="background-color: #346E99;color: #fff;">Mobile</td>
                                                <td style="background-color: #346E99;color: #fff;">Gender</td>
                                                <td style="background-color: #346E99;color: #fff;">Doctor Name</td>
                                                <td style="background-color: #346E99;color: #fff;">Registration Date</td>
                                                <td style="background-color: #346E99;color: #fff;">Action</td>
                                            </tr>

                                            <?php
                                            date_default_timezone_set("Asia/Dhaka");
                                            //$today = date("m/d/Y");
//echo $today;

                                            include '../connection/db.php';
                                            $select_sql = "SELECT * FROM `patient_entry_form` WHERE reg_date = '$today' and status = '2' order by id desc";
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
                                                        <td><?php echo $row['patient_name']; ?></td>
                                                        <td><?php echo $row['age']; ?></td>
                                                        <td><?php echo $row['mobile']; ?></td>
                                                        <td><?php echo $row['gender']; ?></td>
                                                        <td><?php echo $row['doctor_name']; ?></td>
                                                        <td><?php echo $row['reg_date']; ?></td>
                                                        <td>
                                                            <a href="view_patient_receiption_report.php?id=<?php echo $row['id']; ?>"><img src="../images/view.png" title="View" height="32" width="32" alt="View"></a>
                                                        </td>
                                                    </tr>

                                                <?php } ?>
                                                <?php
                                            } else {
                                                $patient_message = 'Patient are not present at date '.$today.' .';
                                            }
                                            ?>
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
