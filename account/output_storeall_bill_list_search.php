<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['account_id'])) {
    header("location:../log_form.php");
}
//echo $_SESSION['account_id'];
include '../connection/link.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UPASHAM HOSPITAL</title>
        <link rel="stylesheet" href="../css/responsive.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link href="../js/owl.carousel.min.js" rel="stylesheet"/>
        <script src="../js/main.js"></script>

        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/datepicker.css">
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
                            <div class="dashboard_text text-center">
                                <img src="../images/baner.png" alt="UPASHAM HOSPITAL" title="UPASHAM HOSPITAL" height="100">
                                <br>
                                Dashboard Of Accounts
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="left_content_area">
                                <?php include './left_side_accounts.php'; ?>
                            </div>
                        </div>
                        <div class="right_content_area">
                            <div class="col-md-9">
                                <?php
                                date_default_timezone_set("Asia/Dhaka");
                                $today = date("m/d/Y");
                                ?>

                                <div class="" style="border-bottom: 1px solid;padding-bottom: 6px;">


                                    <?php
                                    include '../connection/db.php';
                                    $searching_date = '';
                                    if (isset($_POST['search_id'])) {
                                        $searching_item = $_POST['search_id'];

                                        $select_query = "SELECT * FROM `storeallbill` WHERE release_date='$searching_item'";
//                                                    echo $select_query;
//                                                    die();
                                        $execute_sql = $conn->query($select_query);
                                        $sell_date_count = mysqli_num_rows($execute_sql);
//                                        echo $sell_date_count;
//                                        die();

                                        $select_query = "SELECT * FROM `storeallbill` WHERE patient_id='$searching_item'";
                                        $execute_sql_id = $conn->query($select_query);
                                        $count = mysqli_num_rows($execute_sql_id);

                                        $select_query_month = "SELECT * FROM `storeallbill` WHERE month ='$searching_item'";
                                        $execule_sql_month = $conn->query($select_query_month);
                                        $count_month = mysqli_num_rows($execule_sql_month);
                                        
                                         $select_query_year = "SELECT * FROM `storeallbill` WHERE year ='$searching_item'";
                                        $execule_sql_year = $conn->query($select_query_year);
                                        $count_year = mysqli_num_rows($execule_sql_year);

                                        if ($sell_date_count == 0 && $count == 0 && $count_month == 0 && $count_year == 0) {
                                            ?>
                                            <h2 align="center" style="color: red; font-style: italic;"><?php echo'Data Not Found !'; ?></h2>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <form action="" method="POST" style="font-size: 15px; padding-top: 5px; padding-bottom: 5px;">
                                        <table border="0" >
                                            <tr>
                                                <td style="text-align: center;"><input style="text-align: center;font-size: 12px;width: 300px;" type="text"  name="search_id" id="search_id"  class="form-control search datepicker" placeholder="Search By ID, Date, Month & Year !" required></td>
                                                <td><input type="submit" name="search" value="Search" class="form-control btn-success" style="margin-left: 2px;"></td>
                                            </tr>
                                        </table>
                                    </form>

                                    <table border="1" class="table text-center" style="margin-top: 10px;">
                                        <!--its for search by id-->
                                        <?php if ($sell_date_count > 0) { ?>
                                            <h2 style="color: #000;font-family: caption;font-size: 24px;margin-left: 50px;opacity: 0.6;display: inline-block;">
                                                <?php echo 'Search Complete for Date ' . $searching_item ?>
                                            </h2>
                                            <tr class="">
                                                <td style="background-color: #346E99;color: #fff;">SL No</td>
                                                <td style="background-color: #346E99;color: #fff;">Patient ID</td>
                                                <td style="background-color: #346E99;color: #fff;">Sub Total Bill</td>
                                                <td style="background-color: #346E99;color: #fff;">Discount</td>
                                                <td style="background-color: #346E99;color: #fff;">Total Payment</td>
                                                <td style="background-color: #346E99;color: #fff;">Due</td>

                                                <td style="background-color: #346E99;color: #fff;">Action</td>
                                            </tr>
                                            <?php
                                            $sl = 0;
                                            $sum = 0;
                                            while ($row = $execute_sql->fetch_assoc()) {
                                                $patient_id = $row['patient_id'];
//                                                    echo $patient_id;
//                                                    die();
                                                $sl++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $sl; ?></td>
                                                    <td><?php echo $row['patient_id']; ?>
                                                    <td><?php echo $row['sub_total']; ?></td>
                                                    <td><?php echo $row['discount']; ?></td>
                                                    <td><?php echo $row['payment']; ?></td>
                                                    <td><?php echo $row['due']; ?></td>
                                                    <td>
                                                        <a href="report_store_all_bill.php?patient_id=<?php echo $row['patient_id']; ?>" style="">Report</a> |
                                                        <a href="details_store_allbill_report.php?patient_id=<?php echo $row['patient_id']; ?>">Details</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        <?php } ?>
                                        <!--its for search by date-->
                                        <?php if ($count > 0) { ?>
                                            <h2 style="color: #000;font-family: caption;font-size: 24px;margin-left: 50px;opacity: 0.6;display: inline-block;">
                                                <?php echo 'Search Complete for ID ' . $searching_item ?>
                                            </h2>
                                            <tr class="">
                                                <td style="background-color: #346E99;color: #fff;">SL No</td>
                                                <td style="background-color: #346E99;color: #fff;">Patient ID</td>
                                                <td style="background-color: #346E99;color: #fff;">Sub Total Bill</td>
                                                <td style="background-color: #346E99;color: #fff;">Discount</td>
                                                <td style="background-color: #346E99;color: #fff;">Total Payment</td>
                                                <td style="background-color: #346E99;color: #fff;">Due</td>

                                                <td style="background-color: #346E99;color: #fff;">Action</td>
                                            </tr>
                                            <?php
                                            $sl = 0;
                                            $sum = 0;
                                            while ($row = $execute_sql_id->fetch_assoc()) {
                                                $patient_id = $row['patient_id'];
//                                                    echo $patient_id;
//                                                    die();
                                                $sl++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $sl; ?></td>
                                                    <td><?php echo $row['patient_id']; ?>
                                                    <td><?php echo $row['sub_total']; ?></td>
                                                    <td><?php echo $row['discount']; ?></td>
                                                    <td><?php echo $row['payment']; ?></td>
                                                    <td><?php echo $row['due']; ?></td>
                                                    <td>
                                                        <a href="report_store_all_bill.php?patient_id=<?php echo $row['patient_id']; ?>" style="">Report</a> |
                                                        <a href="details_store_allbill_report.php?patient_id=<?php echo $row['patient_id']; ?>">Details</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        <?php } ?>

                                        <!--its for search by date-->
                                        <?php if ($count_month > 0) { ?>
                                            <h2 style="color: #000;font-family: caption;font-size: 24px;margin-left: 50px;opacity: 0.6;display: inline-block;">
                                                <?php echo 'Search Complete for Month ' . $searching_item ?>
                                            </h2>
                                            <tr class="">
                                                <td style="background-color: #346E99;color: #fff;">SL No</td>
                                                <td style="background-color: #346E99;color: #fff;">Patient ID</td>
                                                <td style="background-color: #346E99;color: #fff;">Sub Total Bill</td>
                                                <td style="background-color: #346E99;color: #fff;">Discount</td>
                                                <td style="background-color: #346E99;color: #fff;">Total Payment</td>
                                                <td style="background-color: #346E99;color: #fff;">Due</td>

                                                <td style="background-color: #346E99;color: #fff;">Action</td>
                                            </tr>
                                            <?php
                                            $sl = 0;
                                            $sum = 0;
                                            while ($row = $execule_sql_month->fetch_assoc()) {
                                                $patient_id = $row['patient_id'];
//                                                    echo $patient_id;
//                                                    die();
                                                $sl++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $sl; ?></td>
                                                    <td><?php echo $row['patient_id']; ?>
                                                    <td><?php echo $row['sub_total']; ?></td>
                                                    <td><?php echo $row['discount']; ?></td>
                                                    <td><?php echo $row['payment']; ?></td>
                                                    <td><?php echo $row['due']; ?></td>
                                                    <td>
                                                        <a href="report_store_all_bill.php?patient_id=<?php echo $row['patient_id']; ?>" style="">Report</a> |
                                                        <a href="details_store_allbill_report.php?patient_id=<?php echo $row['patient_id']; ?>">Details</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        <?php } ?> 
                                                <!--its for search by id-->
                                        <?php if ($count_year > 0) { ?>
                                            <h2 style="color: #000;font-family: caption;font-size: 24px;margin-left: 50px;opacity: 0.6;display: inline-block;">
                                                <?php echo 'Search Complete for Year ' . $searching_item ?>
                                            </h2>
                                            <tr class="">
                                                <td style="background-color: #346E99;color: #fff;">SL No</td>
                                                <td style="background-color: #346E99;color: #fff;">Patient ID</td>
                                                <td style="background-color: #346E99;color: #fff;">Sub Total Bill</td>
                                                <td style="background-color: #346E99;color: #fff;">Discount</td>
                                                <td style="background-color: #346E99;color: #fff;">Total Payment</td>
                                                <td style="background-color: #346E99;color: #fff;">Due</td>

                                                <td style="background-color: #346E99;color: #fff;">Action</td>
                                            </tr>
                                            <?php
                                            $sl = 0;
                                            $sum = 0;
                                            while ($row = $execule_sql_year->fetch_assoc()) {
                                                $patient_id = $row['patient_id'];
//                                                    echo $patient_id;
//                                                    die();
                                                $sl++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $sl; ?></td>
                                                    <td><?php echo $row['patient_id']; ?>
                                                    <td><?php echo $row['sub_total']; ?></td>
                                                    <td><?php echo $row['discount']; ?></td>
                                                    <td><?php echo $row['payment']; ?></td>
                                                    <td><?php echo $row['due']; ?></td>
                                                    <td>
                                                        <a href="report_store_all_bill.php?patient_id=<?php echo $row['patient_id']; ?>" style="">Report</a> |
                                                        <a href="details_store_allbill_report.php?patient_id=<?php echo $row['patient_id']; ?>">Details</a>
                                                    </td>
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
