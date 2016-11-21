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
                            <div class="dashboard_text text-center">
                                <img src="../images/baner.png" alt="UPASHAM HOSPITAL" title="UPASHAM HOSPITAL" height="100">
                                <br>
                                Dashboard Of Pathology
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body_area" style="min-height: 700px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="left_content_area">
                                <?php include './left_side_pathology.php'; ?>
                            </div>
                        </div>
                        <div class="right_content_area">
                            <div class="col-md-10">
                                <form action="indoor_test_list_search_date.php" method="POST" style="font-size: 15px; padding-top: 5px; padding-bottom: 5px;">
                                    <table border="0" >
                                        <tr>
                                            <td style="text-align: center;"><input style="text-align: center;font-size: 12px;width: 300px;" type="text"  name="search_date" id="search_date"  class="form-control datepicker" placeholder="Search By Date !" required></td>
                                            <td><input type="submit" name="search" value="Search" class="form-control btn-success" style="margin-left: 2px;"></td>
                                        </tr>
                                    </table>
                                </form>
                                <?php
                                include '../connection/db.php';
                                date_default_timezone_set("Asia/Dhaka");
                                $today = date("m/d/Y");
                                $month = date('F');
                                $searching_date = '';
                                if (isset($_POST['search'])) {
                                    $searching_date = $_POST['search_date'];
//                                    echo $searching_date;
//                                    die();
                                    $select_query = "SELECT * FROM `patient_test_info` WHERE date = '$searching_date'";
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
                                <table border="1" class="table text-center" style="margin-top: 10px;">

                                    <?php if ($sell_date_count > 0) { ?>
                                        <h2 style="color: #000;font-family: caption;font-size: 24px;margin-left: 50px;opacity: 0.6;display: inline-block;">
                                            <?php echo 'All Daily Payment List ' . $searching_date ?>
                                        </h2>

                                        <tr class="">
                                            <td style="background-color: #346E99;color: #fff;">SL No</td>
                                        <td style="background-color: #346E99;color: #fff;">Patient ID</td>
                                        <td style="background-color: #346E99;color: #fff;">Test category</td>
                                        <td style="background-color: #346E99;color: #fff;">Test Name</td>
                                        <td style="background-color: #346E99;color: #fff;">Action</td>
                                        </tr>

                                        <?php
                                        $sl = 0;
                                        while ($row = $execute_sql->fetch_assoc()) {
                                            $sl++;
                                            ?>
                                            <tr>
                                                <td><?php echo $sl ?></td>
                                                <td><?php echo $row['reg_id']; ?></td>
                                                <td><?php echo $row['test_category'] ?></td>
                                                <td><?php echo $row['test_name'] ?></td>
                                                <td>
                                                    <a href="report_indoor_test.php?regi_id=<?php echo $row['reg_id'];?>"><img src="../images/view.png" width="30" height="30" title="View" alt="View" style="padding: 2px;"></a> |
                                                    <a style="cursor : pointer;" class="edit" valu="<?php echo $row['test_name'];?>" value="<?php echo $row['test_category'];?>"  user_id = "<?php echo $row['reg_id'];?>">Send</a>
                                                    
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    <?php } ?>
                                </table>
                                <script>
                                    $(document).ready(function () {
                                        $('.edit').on('click', function (e) {
                                            e.preventDefault();
                                            var data = $(this).attr("user_id");
                                            var cata = $(this).attr("value");
                                            var name = $(this).attr("valu");
                                            $.ajax({
                                                method: 'POST',
                                                url: 'in_pathology_ok.php',
                                                data: {cata:cata,name:name,data: data}
                                            })
                                                    .done(function (m) {
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
