<?php
if (!isset($_SESSION)) {
    session_start();
}
//
//if (!isset($_SESSION['receiption_id'])) {
//    header("location:../log_form.php");
//}
$patient_message = '';
include '../connection/link.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UPASHAM HOSPITAL</title>
        <link rel="stylesheet" href="../css/responsive.css">
        <link rel="stylesheet" href="../css/style.css">
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
                                Dashboard Of Receiption
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body_area" style="min-height: 500px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="left_content_area">
                                <?php include '../admin/left_side_admin.php'; ?>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="right_content_area">
                                <div class="patient_list_area">
                                    <div class="response">
                                        <?php
                                        date_default_timezone_set("Asia/Dhaka");
                                        $today = date("m/d/Y");
                                        $month = date('F');
                                        $patient_id = '';
                                        ?>

                                        <div class="" style="border-bottom: 1px solid;padding-bottom: 6px;">
                                            <!--                                            <h2 style="color: #000;font-family: caption;font-size: 24px;margin-left: 50px;opacity: 0.6;display: inline-block;">
                                                                                            <span><a href="outdoor_p_t_l_pdf.php" style="text-decoration: none; ">Save As Pdf<i class="fa fa-file-pdf-o" aria-hidden="true"></i> </a></span>   <?php echo 'All Patient at ' . $today ?>
                                            
                                                                                        </h2>
                                            -->


                                            <form action="output_outdoor_p_te_list.php" method="POST" style="font-size: 15px; padding-top: 5px; padding-bottom: 5px;">
                                                <table border="0" >
                                                    <tr>
                                                        <td style="text-align: center;"><input style="text-align: center;font-size: 12px;width: 300px;" type="text" value="<?php echo $patient_id; ?>"  name="search_name_mobile" id="search_name_mobile"  class="form-control" placeholder="Search By ID, Name OR Mobile !" required></td>
                                                        <td><input type="submit" name="search" value="Search" class="form-control btn-success" style="margin-left: 2px;"></td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>

                                        <table border="1" class="table text-center" style="margin-top: 10px;">
                                            <tr class="">
                                                <td style="background-color: #346E99;color: #fff;">SL No</td>
                                                <td style="background-color: #346E99;color: #fff;">Patient ID</td>
                                                <td style="background-color: #346E99;color: #fff;">Patient Name</td>
                                                <td style="background-color: #346E99;color: #fff;">Mobile</td>
                                                <td style="background-color: #346E99;color: #fff;">Age</td>
                                                <td style="background-color: #346E99;color: #fff;">Ref Name</td>
                                                <td style="background-color: #346E99;color: #fff;">Ref Mobile</td>
                                                <td style="background-color: #346E99;color: #fff;">Doctor Name</td>
                                                <td style="background-color: #346E99;color: #fff;">Test Category</td>
                                                <td style="background-color: #346E99;color: #fff;">Test Name</td>
                                                <td style="background-color: #346E99;color: #fff;">Price</td>
                                                <td style="background-color: #346E99;color: #fff;">Action</td>
                                            </tr>

                                            <?php
                                            date_default_timezone_set("Asia/Dhaka");
                                            $today = date("m/d/Y");
                                            $month = date('F');
//echo $today;

                                            include '../connection/db.php';
                                            $select_sql = "SELECT * FROM `outdoor_test` WHERE current_manth='$month' ORDER by out_p_id DESC";
//                                            echo $select_sql;
//                                            die();
                                            $execute_sql = $conn->query($select_sql);
                                            $count = mysqli_num_rows($execute_sql);
//echo $count;
                                            if ($count > 0) {
                                                $sl = 0;
                                                while ($row = $execute_sql->fetch_assoc()) {
                                                    $sl++;
                                                    ?>

                                                    <tr>
                                                        <td><?php echo $sl; ?></td>
                                                        <td><?php echo $row['out_p_id']; ?></td>
                                                        <td><?php echo $row['patient_name']; ?></td>
                                                        <td><?php echo $row['patient_mobile']; ?></td>
                                                        <td><?php echo $row['age']; ?></td>
                                                        <td><?php echo $row['ref_name']; ?></td>
                                                        <td><?php echo $row['ref_mobile']; ?></td>
                                                        <td><?php echo $row['dr_name']; ?></td>
                                                        <td><?php echo $row['test_category']; ?></td>
                                                        <td><?php echo $row['test_name']; ?></td>
                                                        <td><?php echo $row['test_price']; ?></td>
                                                        <td>
                                                            <a href=""><i class="fa fa-pencil-square" aria-hidden="true" title="Edit"></i></a> |
                                                            <a href=""><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>
                                                        </td>
                                                    </tr>

                                                <?php } ?>
                                                <?php
                                            } else {
                                                $patient_message = 'Patient are not present !';
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
        </div>
    </body>

</html>
