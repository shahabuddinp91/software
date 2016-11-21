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

                                        <div class="" style="border-bottom: 1px solid black; padding-bottom: 6px;"></div>
                                        <?php
                                        include '../connection/db.php';
                                        $searching_item = '';
                                        $patient_id = '';
                                        $count_name = '';
                                        $count_mobile = '';
                                        $sum = '';
                                        date_default_timezone_set("Asia/Dhaka");
                                        $month = date('F');

                                        if (isset($_POST['search'])) {
                                            $searching_item = $_POST['search_name_mobile'];
//                                            echo $searching_item;
                                            $select_query_id = "SELECT * FROM `outdoor_test` WHERE out_p_id='$searching_item'";
//                                            echo $select_query_id;
//                                            die();
                                            $execule_sql_id = $conn->query($select_query_id);
                                            $count_id = mysqli_num_rows($execule_sql_id);
//                                            echo $count_id;
//                                            die();

                                            $select_query_name = "SELECT * FROM `outdoor_test` WHERE patient_name='$searching_item'";
//                                            echo $select_query_name;
//                                            die();
                                            $execute_name = $conn->query($select_query_name);
                                            $count_name = mysqli_num_rows($execute_name);

                                            $select_query_mobile = "SELECT * FROM `outdoor_test` WHERE patient_mobile='$searching_item'";
//                                            echo $select_query_mobile;
//                                            die();
                                            $execute_mobile = $conn->query($select_query_mobile);
                                            $count_mobile = mysqli_num_rows($execute_mobile);

                                            if ($count_id == 0 & $count_name == 0 & $count_mobile == 0) {
                                                ?>
                                                <h2 align="center" style="color: red; font-style: italic;"><?php echo'Data Not Found !'; ?></h2>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <form action="" method="POST" style="font-size: 15px; padding-top: 5px; padding-bottom: 5px;">
                                            <table border="0" >
                                                <tr>
                                                    <td style="text-align: center;"><input style="text-align: center;font-size: 12px;width: 300px;" type="text" value="<?php echo $patient_id; ?>"  name="search_name_mobile" id="search_name_mobile"  class="form-control" placeholder="Search By Name OR Mobile !" required></td>
                                                    <td><input type="submit" name="search" value="Search" class="form-control btn-success" style="margin-left: 2px;"></td>
                                                </tr>
                                            </table>
                                        </form>

                                        <table border="1" class="table text-center" style="margin-top: 10px;">
                                            <!--its for search by id-->
                                            <?php if ($count_id > 0) { ?>
                                                <h2 style="color: #000;font-family: caption;font-size: 24px;margin-left: 50px;opacity: 0.6;display: inline-block;">
                                                    <?php echo 'Search Complete for ID ' . $searching_item ?>
                                                </h2>
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
                                                $sl = 0;
                                                $sum = 0;
                                                while ($row = $execule_sql_id->fetch_assoc()) {
                                                    $patient_id = $row['out_p_id'];
//                                                    echo $patient_id;
//                                                    die();
                                                    $sl++;
                                                    $sum = $row['test_price'] + $sum;
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
                                                    <?php
                                                }
                                                ?>
                                            <?php } ?>

                                            <!--its for search by name-->
                                            <?php if ($count_name > 0) { ?>
                                                <h2 style="color: #000;font-family: caption;font-size: 24px;margin-left: 50px;opacity: 0.6;display: inline-block;">
                                                    <?php echo 'Search Complete for Name ' . $searching_item ?>
                                                </h2>
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
                                                $sl = 0;
                                                $sum = 0;
                                                while ($row = $execute_name->fetch_assoc()) {
                                                    $patient_id = $row['out_p_id'];
//                                                    echo $patient_id;
//                                                    die();
                                                    $sl++;
                                                    $sum = $row['test_price'] + $sum;
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
                                                    <?php
                                                }
                                                ?>
                                            <?php } ?>

                                            <!--its for search by mobile-->
                                            <?php if ($count_mobile > 0) { ?>
                                                <h2 style="color: #000;font-family: caption;font-size: 24px;margin-left: 50px;opacity: 0.6;display: inline-block;">
                                                    <?php echo 'Search Complete for Mobile No ' . $searching_item ?>
                                                </h2>
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
                                                $sl = 0;
                                                $sum = 0;
                                                while ($row = $execute_mobile->fetch_assoc()) {
                                                    $patient_id = $row['out_p_id'];
//                                                    echo $patient_id;
//                                                    die();
                                                    $sl++;
                                                    $sum = $row['test_price'] + $sum;
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
        <script>
            $(document).ready(function () {
                $('.submit_bill').on('click', function (e) {
                    e.preventDefault();
                    var data = $('.patient_test_total_bill').serialize();
                    $.ajax({
                        method: 'POST',
                        url: 'patient_test_bill_insert.php',
                        data: data
                    })
                            .done(function (m) {
                                alert(m)
                                $('.clear').trigger('click');
                            })
                })
            })
        </script>
    </body>

</html>
