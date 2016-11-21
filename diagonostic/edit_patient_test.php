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
        <title>UPASHAM HOSPITAL</title>
        <link rel="stylesheet" href="../css/responsive.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">

        <script src="../js/main.js"></script>
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
                                Dashboard Reception Desk (Hospital)
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
                                <?php include './letf_side_diagonostic.php'; ?>
                            </div>
                        </div>
                        <div class="right_content_area">
                            <div class="patient_entry_form">
                                <div class="container">
                                    <div class="col-md-offset-2 col-md-7" style="width: 450px; ">
                                        <br>
                                        <form class="form-horizontal edit_teststore_form" role="form" action="" method="post">
                                            <?php
                                            include '../connection/db.php';
                                            $regi_id = $_GET['reg_id'];
//                                            echo $regi_id;
//                                            die();
                                            ?>
                                            <!--<p style="color: green"><?Php echo "Your Registration id is" . ' ' . $regi_id; ?></p>-->
                                            <?php
                                            $select_query = "SELECT * FROM `patient_test_info` WHERE reg_id='$regi_id'";
                                            $execute_sql = $conn->query($select_query);
                                            while ($row = $execute_sql->fetch_assoc()) {
                                                $test_name = $row['test_name'];
                                                $test_price = $row['price'];
                                            }
                                            ?>
                                            <!--   // edit data close
                                             //    update start-->
                                            <?php
                                            $update_mes = '';
                                            $updated_date=date('Y-m-d');
                                            if (isset($_POST['update'])) {
                                                extract($_POST);
                                                //echo $drugName1; 


                                                $update_sql = "UPDATE `patient_test_info` SET `updated_date`='$updated_date',`test_name`='$testname1',`price`='$price1' WHERE reg_id = '$regi_id'";
                                                $execute_sql = $conn->query($update_sql);

                                                if ($execute_sql) {
                                                    $select_query = "SELECT * FROM `patient_test_info` WHERE reg_id = '$regi_id'";
                                                    $execute_sql = $conn->query($select_query);

                                                    while ($row = $execute_sql->fetch_assoc()) {
                                                        $test_name = $row['test_name'];
                                                        $test_price = $row['price'];

                                                        $update_mes = "Update Successful";
                                                    }
                                                }
                                            }
                                            ?>
                                            
                                            <div class="panel panel-primary">
                                                <div class="panel-heading" style="text-align: center; ">Editing Information</div>
                                                
                                                <h3 align='center' style="color: green"><?php echo $update_mes; ?></h3>
                                                <div class="form-group">
                                                <label class="control-label col-sm-4" for="testname">Registration ID:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="testname" name="testname1" value="<?php echo $regi_id; ?>" readonly="">
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                <label class="control-label col-sm-4" for="TestName">Test Name:</label>
                                                <div class="col-sm-8">
                                                    <select name="testname1" class="form-control" id="test_name" required="1">
                                                        <option value="<?php echo $test_name; ?>"><?php echo $test_name; ?></option> 
                                                        <?php
                                                        include '../connection/db.php';
                                                        $query = mysqli_query($conn, "SELECT * FROM add_test_info");
                                                        while ($row = mysqli_fetch_array($query)) {
                                                            ?>
                                                            <option class="testname1" value="<?php echo $row['test_name']; ?>"><?php echo $row['test_name']; ?></option> 
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                    <label class="control-label col-sm-4" for="price">Price:</label>
                                                    <div class="col-sm-8">
                                                        <select name="price1" class="form-control" id="price" required="1">
                                                            <option><?php echo $test_price; ?></option> 
                                                            <?php
                                                            include '../connection/db.php';
                                                            $query = mysqli_query($conn, "SELECT * FROM add_test_info");
                                                            while ($row = mysqli_fetch_array($query)) {
                                                                ?>
                                                                <option class="price1" value="<?php echo $row['price']; ?>"><?php echo $row['price']; ?></option> 
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        <!--<input type="text" class="form-control" id="price" name="price" placeholder="Price Name">-->
                                                    </div>
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
