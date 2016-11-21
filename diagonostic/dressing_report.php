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
        
        <style>
            body{
                font-family: caption;
            }
        </style>
    </head>
    <body>
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-md-12 text-center" style="font-size: 20px; ">
                        <img src="../images/report_baner.png" alt="UPASHAM HOSPITAL" title="UPASHAM HOSPITAL" height="100">
                    </div>
                </div>
            </div>
            
            <div class="body_area" style="background-image: none;">
                <div class="container-fluid">
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
                            
                            $age = $row['age'];
                            $mobile = $row['mobile'];
                            $gender = $row['gender'];
                            $address = $row['address'];
                            
                        }
                        
                        $dressing_select = "SELECT * FROM `dreasing_bill` WHERE patient_id = '$id'";
                        $exe_dress = $conn->query($dressing_select);
                        
                        while ( $rr = $exe_dress->fetch_assoc()){
                            $dr_name = $rr['dr_name'];
                            $gr_name = $rr['g_name'];
                            $v_amount = $rr['visit_amount'];
                            $Obsarvation = $rr['Obsarvation'];
                            $Dressing = $rr['Dressing'];
                            $otcharge = $rr['otcharge'];
                            $Nabulizer = $rr['Nabulizer'];
                            $blood = $rr['blood'];
                            $o2 = $rr['o2'];
                            $total = $rr['total'];
                            $pay = $rr['payment'];
                            $due = $rr['due'];
                            $date = $rr['date'];
                        }
                        ?>
                        <p class="text-center " style="background-color: #346E99;color: #fff; height: 35px; ">Money Receipt of Outdoor/Doctor visit/Dressing/O.t charge/Observation/Gas etc</p>
                        <div class="kk">
                            <div class="part1" style="font-family: caption; font-size: 18px;">
                                <table class="table" style="text-align: center;" width="50%">
                                    <tr>
                                        <td width="15%">Registration ID</td>
                                        <td width="2%">:</td>
                                        <td width="25%"><?php echo $reg_id; ?></td>
                                        
                                        <td width="15%">Bill Date</td>
                                        <td width="2%">:</td>
                                        <td width="25%"><?php echo $date; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td width="15%">Patient Name</td>
                                        <td width="2%">:</td>
                                        <td width="25%"><?php echo $patient_name; ?></td>
                                        
                                        <td width="15%">Age</td>
                                        <td width="2%">:</td>
                                        <td width="25%"><?php echo $age; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td width="15%">Mobile No</td>
                                        <td width="2%">:</td>
                                        <td width="25%"><?php echo $mobile; ?></td>
                                        
                                        <td width="15%">Gender</td>
                                        <td width="2%">:</td>
                                        <td width="25%"><?php echo $gender; ?></td>
                                    </tr>
                                   
                                    <tr>
                                        <td width="15%">Dr.Name</td>
                                        <td width="2%">:</td>
                                        <td width="25%"><?php echo $dr_name; ?></td>
                                        
                                        
                                        <td width="15%">Address</td>
                                        <td width="2%">:</td>
                                        <td width="25%"><?php echo $address; ?></td>
                                    </tr>
                                </table>
                                
                            </div>
                        </div>
                        
                        
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table " style="text-align: center;">
                                <tr>
                                    <td><b>SL No</b></td>
                                    <td><b>Particulars</b></td>
                                    <td><b>Taka</b></td>
                                </tr>
                                
                                <tr>
                                    <td>1</td>
                                    <td>Dr. Visit</td>
                                    <td><?php echo $v_amount;?></td>
                                </tr>
                                
                                <tr>
                                    <td>2</td>
                                    <td>Obsarvation</td>
                                    <td><?php echo $Obsarvation;?></td>
                                </tr>
                                
                                <tr>
                                    <td>3</td>
                                    <td>Dressing</td>
                                    <td><?php echo $Dressing;?></td>
                                </tr>
                                
                                <tr>
                                    <td>4</td>
                                    <td>O.T Charge</td>
                                    <td><?php echo $otcharge;?></td>
                                </tr>
                                
                                <tr>
                                    <td>5</td>
                                    <td>Nabulizer</td>
                                    <td><?php echo $Nabulizer;?></td>
                                </tr>
                                
                                <tr>
                                    <td>6</td>
                                    <td>Blood transfusion</td>
                                    <td><?php echo $blood;?></td>
                                </tr>
                                
                                <tr>
                                    <td>7</td>
                                    <td>O<sub>2</sub></td>
                                    <td><?php echo $o2;?></td>
                                </tr>
                                
                                <tr>
                                    <td></td>
                                    <td><b>Grand Total</b></td>
                                    <td ><b><?php echo $total;?></b></td>
                                    
                                    
                                    
                                    
                                </tr>
                                
                                <tr>
                                    <td></td>
                                    <td><b>Payment</b></td>
                                    <td ><b><?php echo $pay;?></b></td>
                                </tr>
                                
                                <tr>
                                    <td></td>
                                    <td><b>Due</b></td>
                                    <td ><b><?php echo $due;?></b></td>
                                </tr>
                                
                                <tr>
                                    <td>In word : ..................</td>
                                </tr>
                                <tr></tr>
                                
                                <tr>
                                    <td>Paid By : ........</td>
                                    <td></td>
                                    <td>Received By: ..........</td>
                                </tr>
                            </table>
                        </div>
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
