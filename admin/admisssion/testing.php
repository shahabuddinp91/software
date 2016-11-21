<?php
    $id = $_GET['id'];
    //echo $id;
    include '../../connection/db.php';
    include '../../connection/link.php';
    $select_query = "SELECT * FROM `patient_entry_form` WHERE id = '$id'";
    $execute_query = $conn->query($select_query);
    
    $select_admit = "SELECT * FROM `patient_admission_system` WHERE reg_id = '$id'";
    $execute_admit = $conn->query($select_admit);
    
    $select_bill = "SELECT * FROM `storeallbill` WHERE patient_id = '$id'";
    $execute_bill = $conn->query($select_bill);
    $count = mysqli_num_rows($execute_bill);
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>UPASHOM HOSPITAL</title>
        <link rel="stylesheet" href="../../css/responsive.css">
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/font-awesome.min.css">

        <link rel="stylesheet" href="../../css/bootstrap.css">
        <link rel="stylesheet" href="../../css/datepicker.css">
        <script src="../../js/main.js"></script>
        <script src="../../js/bootstrap-datepicker.js"></script>
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
                                <img src="../../images/baner.png" alt="UPASHAM HOSPITAL" title="UPASHAM HOSPITAL" height="100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                while ($row = $execute_query->fetch_assoc()){
                    $name = $row['patient_name'];
                    $age = $row['age'];
                    $mobile = $row['mobile'];
                    $ger = $row['gender'];
                    $ref = $row['reference'];
                    $ref_m = $row['ref_mobile'];
                }
            ?>
            <?php
                            while ($tow = $execute_admit->fetch_assoc()){
                                $gar = $tow['gardian_name'];
                                        $dr_name = $tow['doctor_name'];
                                        $unit = $tow['dr_unit_name'];
                                        $cabil_no = $tow['cabin_no'];
                                        $ad_date = $tow['admission_date'];
                                        $ads_time = $tow['admission_time'];
                            }
                ?>
            
                <div class="container row col-md-12 patient_area">
                    <p>Registation No : <?php echo $id;?></p>
                
                    <p>Name : <?php echo $name;?></p>
                
                    <p>Age : <?php echo $age;?></p>
                
                    <p>Mobile : <?php echo $mobile;?></p>
                
                    <p>Gender : <?php echo $ger;?></p>
                
                    <p>Reference : <?php echo $ref;?></p>
                
                    <p>Reference name : <?php echo $ref_m;?></p>
                </div>
                
                <div class="container ">
                    <div class="col-md-12">
                        <div class="row">
                            <p>Father/Husband name : <?php echo $gar;?></p>
                
                    <p>Dr.name : <?php echo $dr_name;?></p>
                
                    <p>Dr Unit : <?php echo $unit;?></p>
                
                    <p>Cabin no : <?php echo $cabil_no;?></p>
                
                    <p>Admission date : <?php echo $ad_date;?></p>
                
                    <p>Admission time : <?php echo $ads_time;?></p>
                        </div>
                    </div>
                    
                </div>
                 <?php
                 if($count == 1){
                     while ($row = $execute_bill->fetch_assoc()){
                         $sub_total = $row['sub_total'];
                         $dis = $row['discount'];
                         $total = $row['total'];
                         $payment = $row['payment'];
                         $due = $row['due'];
                         $re_date = $row['release_date'];
                     } ?>
            <div class="container">
                <div class="col-md-12">
                    <div class="row">
                        <p>Sub Toral : <?php echo $sub_total;?></p>
                        <p> Discount : <?php echo $dis;?></p>
                        <p> Total : <?php echo $total;?></p>
                        <p>Payment : <?php echo $payment;?></p>
                        <p>Due : <?php echo $due;?></p>
                        <p>Release Date : <?php echo $re_date;?></p>
                    </div>
                </div>
            </div>
            <?php     }  else { ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p><?php echo $name;?> are here !</p>
                    </div>
                </div>
            </div>
                   <?php  }
                 ?>
                <div class="container">
                    
                </div>
              
            
            <div class="footer_area">
                <div class="container-fluid">
                    <div class="row">

                        <?php include '../../footer.php'; ?>

                    </div>
                </div>
            </div>
    </body>

</html>
