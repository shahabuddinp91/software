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
                                <div class="panel panel-primary" style="margin-top: 15px;">
                                    <div class="panel panel-heading text-center">Users & Password</div>
                                    <table border="1" class="table text-center" style="">
                                    <tr>
                                        <td style="background-color: #346E99;color: #fff;">SL No</td>
                                        <td style="background-color: #346E99;color: #fff;">Section</td>
                                        <td style="background-color: #346E99;color: #fff;">User Name</td>
                                        <td style="background-color: #346E99;color: #fff;">Password</td>
                                    </tr>
                                    <?php
                                    include '../connection/db.php';
                                    $select_query = "SELECT * FROM `user_information` order by id desc ";
//                                            echo $select_query;
                                    $execute_sql = $conn->query($select_query);
                                    $sl = 0;
                                    while ($row = $execute_sql->fetch_assoc()) {
                                        $sl++;
                                        ?>
                                        <tr>
                                            <td><?php echo $sl; ?></td>
                                            <td><?php echo $row['Section']; ?></td>
                                            <td><?php echo $row['user_name']; ?></td>
                                            <td><?php echo $row['password']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </table>
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
