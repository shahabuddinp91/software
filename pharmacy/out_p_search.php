<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['pharmacy_id'])) {
    header("location:../log_form.php");
}
include '../connection/link.php';
$delete_message = '';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UPASHAM HOSPITAL</title>
        <link rel="stylesheet" href="../css/responsive.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
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
                                Dashboard of Pharmacy
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body_area" style="min-height: 662px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="left_content_area">
                                <?php include './left_side_pharmacy.php'; ?>
                            </div>
                        </div>
                        <div class="right_content_area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="drug_list_area">
                                            <?php
//                                            $today = date('m/d/y');
//                                            echo $today;
                                            ?>
                                            <div class="" style="border-bottom: 1px solid;
                                                 color: #000;
                                                 font-family: caption;
                                                 font-size: 20px;
                                                 margin-left: 50px;
                                                 opacity: 0.6;
                                                 padding-bottom: 6px;">
                                                 <?php
                                                 // echo 'All Drug Store ' . $today
                                                 
                                                 echo $delete_message;
                                                 ?>


                                            </div>
                                            <form action="" method="post" style="padding-bottom: 10px;">
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="regid" placeholder="Registration ID and date !" class="form-control datepicker" required></td>
                                                        <td><input type="submit" name="search" id="search" value="Search" class="form-control btn-success" style="margin-left: 2px;"></td>
                                                    </tr>
                                                </table>
                                            </form>
                                           <table border="1" class="table text-center" style="">

                                                <?php
                                                include '../connection/db.php';
                                                //$found_masege = '';
                                                if (isset($_POST['search'])) {
                                                    $regid = $_POST['regid'];
                                                    
                                                    $select_show = "SELECT * FROM `out_pharmacy_bill`  WHERE patient_id = '$regid'";
                                                    $execute_sql = $conn->query($select_show);
                                                    $drug_count = mysqli_num_rows($execute_sql);
                                                    
                                                    $select_date = "SELECT * FROM `out_pharmacy_bill`  WHERE date = '$regid'";
                                                    $execute_date = $conn->query($select_date);
                                                    $drug_date = mysqli_num_rows($execute_date);
                                                    

                                                    if ($drug_count == 0 && $drug_date == 0) {
                                                        ?>
                                                        <h2 align="center"><?php echo'Drug bill Is Not Found !'; ?></h2>

                                                        <?php
                                                    }
                                                }
                                                ?>
                                                 <?php
                                                    if($drug_date > 0) { ?>
                                                        <h2> Pharmacy bill for date <?php echo $regid;?></h2>
                                                        <tr>
                                                   <td style="background-color: #346E99;color: #fff;">SL No</td>
                                                    <td style="background-color: #346E99;color: #fff;">Registration ID</td>
                                                    <td style="background-color: #346E99;color: #fff;">Bill</td>
                                                    <td style="background-color: #346E99;color: #fff;">Discount</td>
                                                    <td style="background-color: #346E99;color: #fff;">Bill(With Discount)</td>
                                                    <td style="background-color: #346E99;color: #fff;">Payment</td>
                                                    <td style="background-color: #346E99;color: #fff;">Due</td>
                                                    <td style="background-color: #346E99;color: #fff;">Date</td>
                                                    <td style="background-color: #346E99;color: #fff;">Action</td>
                                                </tr>
                                                

                                                <?php
                                                $sl = 0;
                                                while ($row = $execute_date->fetch_assoc()) {
                                                    $sl++;
                                                    ?>
                                                   <tr>
                                                        <td><?php echo $sl; ?></td>
                                                        <td><?php echo $row['patient_id']; ?></td>
                                                        <td><?php echo $row['bill']; ?></td>
                                                        <td><?php echo $row['discount']; ?></td>
                                                        <td><?php echo $row['total_bill']; ?></td>
                                                        <td><?php echo $row['payment']; ?></td>
                                                        <td><?php echo $row['due']; ?></td>
                                                        <td><?php echo $row['date']; ?></td>
                                                        <td>
                                                            <a href="outdoor_bill_report.php?regi_id=<?php echo $row['patient_id']; ?>"><i class="fa fa-eye" aria-hidden="true"></i>Report</a>
                                                        </td>
                                                    </tr>
                                                <?php }
                                                ?>
                                                    <?php } ?>  
                                                    
                                                    <?php
                                                        if( $drug_count > 0) { ?>
                                                    <h2> Pharmacy bill for Id <?php echo $regid;?></h2>
                                                    <tr>
                                                   <td style="background-color: #346E99;color: #fff;">SL No</td>
                                                    <td style="background-color: #346E99;color: #fff;">Registration ID</td>
                                                    <td style="background-color: #346E99;color: #fff;">Bill</td>
                                                    <td style="background-color: #346E99;color: #fff;">Discount</td>
                                                    <td style="background-color: #346E99;color: #fff;">Bill(With Discount)</td>
                                                    <td style="background-color: #346E99;color: #fff;">Payment</td>
                                                    <td style="background-color: #346E99;color: #fff;">Due</td>
                                                    <td style="background-color: #346E99;color: #fff;">Date</td>
                                                    <td style="background-color: #346E99;color: #fff;">Action</td>
                                                </tr>
                                                

                                                <?php
                                                $sl = 0;
                                                while ($row = $execute_sql->fetch_assoc()) {
                                                    $sl++;
                                                    ?>
                                                   <tr>
                                                        <td><?php echo $sl; ?></td>
                                                        <td><?php echo $row['patient_id']; ?></td>
                                                        <td><?php echo $row['bill']; ?></td>
                                                        <td><?php echo $row['discount']; ?></td>
                                                        <td><?php echo $row['total_bill']; ?></td>
                                                        <td><?php echo $row['payment']; ?></td>
                                                        <td><?php echo $row['due']; ?></td>
                                                        <td><?php echo $row['date']; ?></td>
                                                        <td>
                                                            <a href="outdoor_bill_report.php?regi_id=<?php echo $row['patient_id']; ?>"><i class="fa fa-eye" aria-hidden="true"></i>Report</a>
                                                        </td>
                                                    </tr>
                                                <?php }
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
