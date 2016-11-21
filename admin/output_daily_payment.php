<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['admin_id'])) {
    header("location:../log_form.php");
}
//$patient_message = '';
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
            $(function () {
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
                            <div class="dashboard_text text-center" style="font-family: initial;">
                                <img src="../images/baner.png" alt="UPASHAM HOSPITAL" title="UPASHAM HOSPITAL" height="100">
                                <br>
                                Dashboard Of Admin
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="left_content_area">
                                <?php include './left_side_admin.php'; ?>
                            </div>
                        </div>
                        <div class="right_content_area">
                            <div class="col-md-10">
                                <?php
                                include '../connection/db.php';
                                date_default_timezone_set("Asia/Dhaka");
                                $today = date("m/d/Y");
                                $month = date('F');
                                $searching_date = '';
                                if (isset($_POST['search'])) {
                                    $searching_date = $_POST['date_search'];
//                                    echo $searching_date;
//                                    die();
                                    $select_query = "SELECT * FROM `daily_payment` WHERE date='$searching_date'";
//                                                    echo $select_query;
//                                                    die();
                                    $execute_sql = $conn->query($select_query);
                                    $sell_date_count = mysqli_num_rows($execute_sql);

                                    if ($sell_date_count == 0) {
                                        ?>
                                        <h2 align="center" style="color: red; font-style: italic;"><?php echo'Data Not Found !'; ?></h2>
                                        <?php
                                    }
                                }
                                ?>
                                <form action="output_daily_payment.php" method="POST" style="font-size: 15px; padding-top: 5px; padding-bottom: 5px;">
                                    <table border="0" >
                                        <tr>
                                            <td style="text-align: center;"><input style="text-align: center;font-size: 12px;width: 300px;" type="text"  name="date_search" id="date_search"  class="form-control datepicker" placeholder="Search By Date !" required></td>
                                            <td><input type="submit" name="search" value="Search" class="form-control btn-success" style="margin-left: 2px;"></td>
                                        </tr>
                                    </table>
                                </form>
                                <table border="1" class="table text-center" style="margin-top: 10px;">

                                    <?php if ($sell_date_count > 0) { ?>
                                        <h2 style="color: #000;font-family: caption;font-size: 24px;margin-left: 50px;opacity: 0.6;display: inline-block;">
                                            <?php echo 'All Daily Payment List ' . $searching_date ?>
                                        </h2>

                                        <tr class="">
                                            <td style="background-color: #346E99;color: #fff;">SL No</td>
                                            <td style="background-color: #346E99;color: #fff;">Total Bill</td>
                                            <td style="background-color: #346E99;color: #fff;">Total Payment</td>
                                            <td style="background-color: #346E99;color: #fff;">Total Due</td>
                                        </tr>

                                        <?php
                                        $sl = 0;
                                        while ($row = $execute_sql->fetch_assoc()) {
                                            $sl++;
                                            ?>
                                            <tr>
                                                <td><?php echo $sl; ?></td>
                                                <td><?php echo $row['total']; ?></td>
                                                <td><?php echo $row['total_pay']; ?></td>
                                                <td><?php echo $row['total_due']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    <?php } ?>
                                </table>
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
