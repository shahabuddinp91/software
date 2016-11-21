<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['dianostic_id'])) {
    header("location:../log_form.php");
}
include '../connection/link.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UPASHOM HOSPITAL</title>
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
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="dashboard_text text-center">
                                <?php echo $title2 ?>
                                <?php echo "<br>" ?>
                                <?php echo $title4 ?>
                                <br>
                                Dashboard of Pharmacy
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body_area"  style="min-height: 660px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="left_content_area">
                                <?php include './letf_side_diagonostic.php'; ?>
                            </div>
                        </div>
                        <div class="right_content_area">
                            <div class="drugstore_form">
                                <div class="container">
                                    <div class="col-md-offset-1 col-md-8">
                                        <br>
                                        <div class="panel panel-primary modal-content modal-body add_test_info" style="min-height: 350px;">
                                            <div class="panel-heading" align="center">Test Edit Form</div>
                                            <br>
                                            <form class="form-horizontal edit_teststore_form" role="form" action="" method="post">
                                                <?php
                                                include '../connection/db.php';
                                                $edit_test_id = $_GET['id'];
                                                ?>
                                                <p style="color: green"><?Php echo "Your test id is" . ' ' . $edit_test_id; ?></p>
                                                <?php
                                                $select_query = "SELECT * FROM `add_test_info` WHERE id='$edit_test_id'";
                                                $execute_sql = $conn->query($select_query);
                                                while ($row = $execute_sql->fetch_assoc()) {
                                                    $test_category = $row['test_category'];
                                                    $test_name = $row['test_name'];
                                                    $test_price = $row['price'];
                                                }
                                                ?>
                                                <!--                                                //                                        edit data close
                                                                                                //                                        update start-->
                                                <?php
                                                $update_mes = '';
                                                if (isset($_POST['update'])) {
                                                    extract($_POST);
                                                    //echo $drugName1; 


                                                    $update_sql = "UPDATE `add_test_info` SET `test_category`='$testcategory1',`test_name`='$testname1',`price`='$price1' WHERE id = '$edit_test_id'";
                                                    $execute_sql = $conn->query($update_sql);

                                                    if ($execute_sql) {
                                                        $select_query = "SELECT * FROM `add_test_info` WHERE id='$edit_test_id'";
                                                        $execute_sql = $conn->query($select_query);

                                                        while ($row = $execute_sql->fetch_assoc()) {
                                                            $test_category = $row['test_category'];
                                                            $test_name = $row['test_name'];
                                                            $test_price = $row['price'];

                                                            $update_mes = "Update successful";
                                                        }
                                                    }
                                                }
                                                ?>
                                                <h3 align='center' style="color: green"><?php echo $update_mes; ?></h3>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="testcategory">Test Category:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="testcategory" name="testcategory1" value="<?php echo $test_category; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="testname">Test Name:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="testname" name="testname1" value="<?php echo $test_name; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="price">Price:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="price" name="price1" value="<?php echo $test_price; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-4 col-sm-8">
                                                        <button type="submit" class="btn btn-default submit btn-primary update" name="update" >Update</button>
                                                        <button type="reset" class="btn btn-default clear btn-success">Clear</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
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
