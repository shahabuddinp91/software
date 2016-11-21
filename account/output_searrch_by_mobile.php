<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['account_id'])) {
    header("location:../log_form.php");
}
//echo $_SESSION['account_id'];
include '../connection/link.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UPASHAM HOSPITAL</title>
        <link rel="stylesheet" href="../css/responsive.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link href="../js/owl.carousel.min.js" rel="stylesheet"/>
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
                                Dashboard Of Accounts
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="left_content_area">
                                <?php include './left_side_accounts.php'; ?>
                            </div>
                        </div>
                        <div class="right_content_area">
                            <div class="col-md-9">
                                <br>
                                
                                <?php
                                include '../connection/db.php';
                                $search = '';
                                if(isset($_POST['search_id'])){
                                $search = $_POST['search_id'];
//echo $search;
                                $query = "select patient_entry_form.patient_name,"
                                        . "patient_entry_form.id,"
                                        . "patient_entry_form.mobile,"
                                        . "patient_entry_form.age, "
                                        . "patient_entry_form.visit_amount,"
                                        . "patient_entry_form.doctor_name,"
                                        . "patient_entry_form.visit_amount, "
                                        . "storeallbill.visit_amount,"
                                        . "storeallbill.pharmacy_bill,"
                                        . "storeallbill.diagonostic_bill,"
                                        . "storeallbill.admission_bill,"
                                        . "storeallbill.sub_total,"
                                        . "storeallbill.vat, "
                                        . "storeallbill.total_bill,"
                                        . "storeallbill.payment_bill "
                                        . "from patient_entry_form "
                                        . "inner join storeallbill "
                                        . "on patient_entry_form.id=storeallbill.reg_id"
                                        . " where mobile = '$search'";

                                $execute_sql = $conn->query($query);
                                $count_sql = $execute_sql->num_rows;
                                
                                
                                $query_id = "select patient_entry_form.patient_name,patient_entry_form.id,patient_entry_form.mobile,patient_entry_form.age, patient_entry_form.visit_amount,patient_entry_form.doctor_name,patient_entry_form.visit_amount, storeallbill.visit_amount,storeallbill.pharmacy_bill,storeallbill.diagonostic_bill,storeallbill.admission_bill,storeallbill.sub_total, storeallbill.vat,storeallbill.total_bill,storeallbill.payment_bill from patient_entry_form inner join storeallbill on patient_entry_form.id=storeallbill.reg_id where reg_id = '$search' ";

                                $execute_id = $conn->query($query_id);
                                $count_id = $execute_id->num_rows;
                                }
                                ?>
                                
                                <form action="" method="POST" style="font-size: 15px; padding-top: 5px; padding-bottom: 5px;">
                                    <table border="0" >
                                        <tr>
                                            <td style="text-align: center;"><input value="<?php echo $search;?>" style="text-align: center;font-size: 12px;width: 300px;" type="text"  name="search_id" id="search_id"  class="form-control search" placeholder="Search By ID & Mobile !" required></td>
                                            <td><input type="submit"  name="search" value="Search" class="form-control btn-success" style="margin-left: 2px;"></td>
                                        </tr>
                                    </table>
                                </form>
                                
                                <?php
                                    if($count_sql == 0 && $count_id == 0){ ?>
                                <p style="color: red;
    font-family: caption;
    font-size: 16px;
    text-align: center;"><?php echo 'Data Not Found !';?></p>
                                    <?php }
                                ?>
                                
                                
                                
                                
                                <table class="table text-center table-striped" border="2">
                                    <tr>
                                        <td style="background-color: #346E99;color: #fff;">SL No</td>
                                        <td style="background-color: #346E99;color: #fff;">Reg No</td>
                                        <td style="background-color: #346E99;color: #fff;">Patient Name</td>
                                        <!--<td style="background-color: #346E99;color: #fff;">Guardian Name</td>-->
                                        <td style="background-color: #346E99;color: #fff;">Mobile No</td>
                                        <!--<td style="background-color: #346E99;color: #fff;">Address</td>-->
                                        <td style="background-color: #346E99;color: #fff;">Age</td>
                                        <!--<td style="background-color: #346E99;color: #fff;">Gender</td>-->
                                        <!--<td style="background-color: #346E99;color: #fff;">Doctor Name</td>-->
                                        <td style="background-color: #346E99;color: #fff;">Visited Amount</td>
                                        <td style="background-color: #346E99;color: #fff;">Pharmacy Bill</td>
                                        <td style="background-color: #346E99;color: #fff;">Diagonostic Bill</td>
                                        <td style="background-color: #346E99;color: #fff;">Admission Bill</td>
                                        <td style="background-color: #346E99;color: #fff;">Sub Total Bill</td>
                                        <td style="background-color: #346E99;color: #fff;">Vat</td>
                                        <td style="background-color: #346E99;color: #fff;">Total Bill</td>
                                        <td style="background-color: #346E99;color: #fff;">Payment Bill</td>

                                        <td style="background-color: #346E99;color: #fff;">Action</td>
                                    </tr>
                                    <?php
                                    if ($count_sql > 0) {
                                        $sl = 0;
                                        while ($row = $execute_sql->fetch_assoc()) {
//             print_r ($row);
//            echo $row['name'];
                                            $sl++;
                                            ?>
                                            <tr>
                                                <td><?php echo $sl; ?></td>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['patient_name']; ?></td>
                                                <td><?php echo $row['mobile']; ?></td>
                                                <td><?php echo $row['age']; ?></td>
                                                <td><?php echo $row['visit_amount']; ?></td>
                                                <td><?php echo $row['pharmacy_bill']; ?></td>
                                                <td><?php echo $row['diagonostic_bill']; ?></td>
                                                <td><?php echo $row['admission_bill']; ?></td>
                                                <td><?php echo $row['sub_total']; ?></td>
                                                <td><?php echo $row['vat']; ?></td>
                                                <td><?php echo $row['total_bill']; ?></td>
                                                <td><?php echo $row['payment_bill']; ?></td>                                            

                                                <td>
                                                    <a href="single_view_report.php?id=<?php echo $row['id']; ?>"><img src="../images/view.png" width="30" height="30" title="View" alt="View" style="padding: 2px;"></a> 
                                                </td>
                                            </tr>
                                            <?php
                                        }
//       
                                    }
                                    ?>
                                            
                                            <?php
                                    if ($count_id > 0) {
                                        $sl = 0;
                                        while ($rows = $execute_id->fetch_assoc()) {
//             print_r ($row);
//            echo $row['name'];
                                            $sl++;
                                            ?>
                                            <tr>
                                                <td><?php echo $sl; ?></td>
                                                <td><?php echo $rows['id']; ?></td>
                                                <td><?php echo $rows['patient_name']; ?></td>
                                                <td><?php echo $rows['mobile']; ?></td>
                                                <td><?php echo $rows['age']; ?></td>
                                                <td><?php echo $rows['visit_amount']; ?></td>
                                                <td><?php echo $rows['pharmacy_bill']; ?></td>
                                                <td><?php echo $rows['diagonostic_bill']; ?></td>
                                                <td><?php echo $rows['admission_bill']; ?></td>
                                                <td><?php echo $rows['sub_total']; ?></td>
                                                <td><?php echo $rows['vat']; ?></td>
                                                <td><?php echo $rows['total_bill']; ?></td>
                                                <td><?php echo $rows['payment_bill']; ?></td>                                            

                                                <td>
                                                    <a href="single_view_report.php?id=<?php echo $rows['id']; ?>"><img src="../images/view.png" width="30" height="30" title="View" alt="View" style="padding: 2px;"></a> 
                                                </td>
                                            </tr>
                                            <?php
                                        }
//       
                                    }
                                    ?>
                                </table>
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
