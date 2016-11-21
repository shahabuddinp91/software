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
                                Dashboard Of Reception Desk (Diagnostic)
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
                                <?php
                                include './left_side_reception.php';
                                ;
                                ?>
                            </div>
                        </div>
                        <div class="right_content_area">
                            <div class="col-md-10">

                                <form action="output_outdoor_report_message.php" method="POST" style="font-size: 15px; padding-top: 5px; padding-bottom: 5px;">
                                    <table border="0" >
                                        <tr>
                                            <td style="text-align: center;"><input style="text-align: center;font-size: 12px;width: 300px;" type="text"  name="searching" id="searching"  class="form-control datepicker" placeholder="Search By Date!" required></td>
                                            <td><input type="submit" name="search" value="Search" class="form-control btn-success" style="margin-left: 2px;"></td>
                                        </tr>
                                    </table>
                                </form>
                                <?php
                                date_default_timezone_set("Asia/Dhaka");
                                $month = date('F');
                                $today = date('m/d/Y');
                                ?>
                                <?php
                                include '../connection/db.php';
                                $searching_date = '';
                                if (isset($_POST['search'])) {
                                    $searching_date = $_POST['searching'];
                                    $select_query = "SELECT * FROM `outdoor_path_message` WHERE date='$searching_date' and status = 'Report ok'";
//                                    echo $select_query;
//                                    die();
                                    $execute_sql = $conn->query($select_query);
                                    $sell_date_count = mysqli_num_rows($execute_sql);

                                    if ($sell_date_count == 0) {
                                        ?>
                                        <h2 align="center" style="color: red; font-style: italic;"><?php echo'Data Not Found !'; ?></h2>
                                        <?php
                                    }
                                }
                                ?>
                                <table border="1" class="table text-center" style="margin-top: 10px;">

                                    <?php if ($sell_date_count > 0) { ?>
                                        <h2 style="color: #000;font-family: caption;font-size: 24px;margin-left: 50px;opacity: 0.6;display: inline-block;">
                                            <?php echo 'All Patient at ' . $searching_date ?>

                                        </h2>

                                        <tr>
                                            <td style="background-color: #346E99;color: #fff;">SL No</td>
                                            <td style="background-color: #346E99;color: #fff;">Patient ID</td>
                                            <td style="background-color: #346E99;color: #fff;">Status</td>
                                            <td style="background-color: #346E99;color: #fff;">Date</td>
                                            <td style="background-color: #346E99;color: #fff;">Action</td>
                                        </tr>

                                        <?php
                                        $sl = 0;
                                        while ($row = $execute_sql->fetch_assoc()) {
                                            $sl++;
                                            ?>
                                            <tr>
                                                <td><?php echo $sl ?></td>
                                                <td><?php echo $row['patient_id']; ?></td>
                                                <td><?php echo $row['status'] ?></td>
                                                <td><?php echo $row['date'] ?></td>
                                                <td>
                                                    <a href="report_outdoor_test_list.php?patient_id=<?php echo $row['patient_id']; ?>"><img src="../images/view.png" width="30" height="30" title="View" alt="View" style="padding: 2px;"></a> | 
                                                    <a style="cursor : pointer;" class="raju" user_id = "<?php echo $row['patient_id']; ?>">It's ok</a>

                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    <?php } ?>
                                </table>
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
