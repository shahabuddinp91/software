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
                                Dashboard Reception Desk (Hospital)
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
                                        <div class="" style="
                                             color: #000;
                                             font-family: caption;
                                             font-size: 20px;
                                             margin-left: 10px;
                                             opacity: 0.6;
                                             padding-bottom: 6px;">
                                             <?php
                                             // echo 'All Drug Store ' . $today
                                             echo '<u>All Patient Test List</u>';
//                                                 echo $delete_message;
                                             ?>
                                        </div>
                                        <form action="output_patient_test.php" method="post" style="padding-bottom: 10px;">
                                            <table>
                                                <tr>
                                                    <td><input type="text" name="regid" placeholder="Registration ID !" class="form-control" required></td>
                                                    <td><input type="submit" name="search" id="search" value="Search" class="form-control btn-success" style="margin-left: 2px;"></td>
                                                </tr>
                                            </table>
                                        </form>
                                        <table border="1" class="table text-center" style="">
                                            <?php
                                            include '../connection/db.php';
                                            if (isset($_POST['search'])) {
                                                $regid = $_POST['regid'];
//                                                echo $regid;
                                                $select_search = "SELECT * FROM `patient_test_info` WHERE reg_id like '%$regid%'";
//                                                echo $select_search;
                                                $execute_sql = $conn->query($select_search);
                                                $reg_count = mysqli_num_rows($execute_sql);
//                                                echo $reg_count;
                                                if ($reg_count == 0) {
                                                    ?>
                                                    <p align="center" style="color: red; font-size: 20px; font-style: italic"><?php echo'This ID is Not Found !'; ?></p>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <tr>
                                                <td style="background-color: #346E99;color: #fff;">SL No</td>
                                                <td style="background-color: #346E99;color: #fff;">Registration ID</td>
                                                <td style="background-color: #346E99;color: #fff;">Testing Date</td>
                                                <td style="background-color: #346E99;color: #fff;">Test Name</td>
                                                <td style="background-color: #346E99;color: #fff;">Price</td>
                                                <td style="background-color: #346E99;color: #fff;">Action</td>
                                            </tr>
                                            <?php
                                            $sl = 0;
                                            $sum = 0;
                                            while ($row = $execute_sql->fetch_assoc()) {
                                                $sl++;
                                                $sum = $row['price'] + $sum;
                                                ?>
                                                <tr>
                                                <tr>
                                                    <td><?php echo $sl; ?></td>
                                                    <td><?php echo $row['reg_id']; ?></td>
                                                    <td><?php echo $row['test_date']; ?></td>
                                                    <td><?php echo $row['test_name']; ?></td>
                                                    <td><?php echo $row['price']; ?></td>
                                                    <td>
                                                        <a href="edit_patient_test.php?reg_id=<?php echo $row['reg_id']; ?>"><img src="../images/edit2.png" title="Edit" height="32" width="32" alt="Edit"></a> | 
                                                        <a href="delete_patient_test.php?id=<?php echo $row['id']; ?>"><img src="../images/delete2.png" title="Delete" height="28" width="28" alt="Delete"></a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </table>
                                        <form action="" method="post" class="patient_test_total_bill">
                                            <table border="1" class="text-center" width="200px" >
                                                <div class="panel panel-primary modal-content modal-body add_test_info" style="min-height: 260px;">
                                                    <div class="panel-heading" align="center">Total Amount</div>
                                                    <br>
                                                    <form class="form-horizontal teststore_form" role="form" action="" method="post">
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-4" for="regi_id">Registration ID:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control text-center" id="regi_id" name="regi_id" value="<?php echo $regid; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group" style="padding-top: 30px;">
                                                            <label class="control-label col-sm-4" for="total_bill" >Total Bill:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control text-center" id="total_bill" name="total_bill" value="<?php echo $sum; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-offset-4 col-sm-8" style="padding-top: 10px; text-align: center;">
                                                                <button type="submit" class="btn btn-default submit btn-primary submit" name="submit"  >Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </table> 
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
        <script>
            $(document).ready(function () {
                $('.submit').on('click', function (e) {
                    e.preventDefault();
                    var data = $('.patient_test_total_bill').serialize();
                    $.ajax({
                        method: 'POST',
                        url: 'insert/patient_test_bill_insert.php',
                        data: data
                    })
                            .done(function (m) {
                                alert(m)
                                $('.clear').trigger('click')
                            })
                })
            })
        </script>

    </body>

</html>
