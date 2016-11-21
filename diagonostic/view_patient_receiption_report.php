<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['dianostic_id'])) {
    header("location:../log_form.php");
}
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
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-md-12 text-center" style="font-size: 20px; ">
                        <img src="../images/report_baner.png" alt="UPASHAM HOSPITAL" title="UPASHAM HOSPITAL" height="100">
                    </div>
                </div>
            </div>
            <a style="border: 1px solid; margin-left: 80px;
    display: inline-block;
    font-family: caption;
    font-size: 12px;
    padding: 5px 10px;
    text-decoration: none;" href="All_patient_list.php">BACK</a>
            <div class="body_area" style="background-image: none;">
                <div class="container">
                    <div class="row">
                        <?php
                        include '../connection/db.php';
                        $id = $_GET['id'];
//                        echo $id;
                        $select_query = "SELECT * FROM `patient_entry_form` where id='$id'";
                        $execute_sql = $conn->query($select_query);
//                        echo $execute_sql;
//                        die();
                        while ($row = $execute_sql->fetch_assoc()) {
                            $patient_name = $row['patient_name'];
                            $reg_id = $row['id'];
                            $reg_date = $row['reg_date'];
                            $age = $row['age'];
                            $mobile = $row['mobile'];
                            $gender = $row['gender'];
                            $address = $row['address'];
                            $doctor_name = $row['doctor_name'];
                            $dr_room_no = $row['dr_room_no'];
                            $visited_amount = $row['visited_amount'];
                            $payment = $row['payment'];
                            $due = $row['due'];
                            $reference = $row['reference'];
                            $ref_mobile = $row['ref_mobile'];
                            $status = $row['status'];
                            //echo $status;
                        }
                        ?>
                        <p class="text-center " style="background-color: #346E99;color: #fff; height: 35px; ">Details Report</p>
                        <div class="row">
                            <div class="part1 col-md-6" style="font-family: caption; font-size: 18px;">
                                <table style="text-align: left;" width="50%">
                                    <tr>
                                        <td>Registration ID</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $reg_id; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Registration Date</td>
                                        <td>:</td>
                                        <td><?php echo $reg_date; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Patient Name</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $patient_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Age</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $age; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Mobile No</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $mobile; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $gender; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $address; ?></td>
                                    </tr>
                                </table>
                                <hr >
                            </div>
                        </div>
                        <br>
                        <?php
                            if($status == 1){ ?>
                                
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-offset-1 col-md-10 col-md-offset-1" style="font-family: caption; font-size: 18px; width: 60%; min-height: 190px; padding-top: 10px;">
                                        
                                        <p style="color: red;"><?php echo $patient_name.' is Emergency Patient';?> </p>
                                        
                                    </div>
                                </div>
                            </div>
                        
                        <?php    }
                        ?>
                        <?php 
                                            if($status == 2){ 
                                                //echo 'raju';
                                                ?>
                        
                        <div class=" part2" >
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-offset-1 col-md-10 col-md-offset-1" style="font-family: caption; font-size: 18px; border: 2px solid gray; width: 60%; min-height: 190px; padding-top: 10px;">
                                        
                                                <table style="text-align: left;" width="50%">
                                            <tr>
                                                <td>Doctor Name</td>
                                                <td style="padding-right: 3px; ">:</td>
                                                <td ><?php echo $doctor_name; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Dr. Room No</td>
                                                <td>:</td>
                                                <td><?php echo $dr_room_no; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Visited Amount</td>
                                                <td style="padding-right: 3px; ">:</td>
                                                <td ><?php echo $visited_amount; ?></td>
                                            </tr>
<!--                                            <tr>
                                                <td>Payment</td>
                                                <td style="padding-right: 3px; ">:</td>
                                                <td ><?php// echo $payment; ?></td>
                                            </tr>-->
<!--                                            <tr>
                                                <td>Due</td>
                                                <td style="padding-right: 3px; ">:</td>
                                                <td ><?php// echo $due; ?></td>
                                            </tr>-->
                                            
                                        </table>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php    }
                                        ?>
                    </div>
                </div>
            </div>
        <div class="footer_area" style="margin-top: 30px;">
                <div class="container">
                    <div class="row">

                        <?php include '../footer.php'; ?>

                    </div>
                </div>
            </div>
    </body>

</html>
