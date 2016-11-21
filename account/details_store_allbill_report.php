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
        <style>
            a{ text-align: left;}
            a:hover{text-decoration: none; }
        </style>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            
            include_once '../connection/db.php';
            $get_id = $_GET['patient_id'];
//            echo $get_id;
            $select_query = "SELECT patient_entry_form.id, patient_entry_form.patient_name, patient_admission_system.cabin_no, patient_admission_system.admission_date FROM patient_entry_form INNER JOIN patient_admission_system ON patient_entry_form.id=patient_admission_system.reg_id WHERE patient_entry_form.id='$get_id'";
            $execute_sql = $conn->query($select_query);
            while ($row = $execute_sql->fetch_assoc()) {
                $patient_name = $row['patient_name'];
                $patient_id = $row['id'];
                $cabin_no = $row['cabin_no'];
                $admission_date = $row['admission_date'];
            }
            ?>
            <?php
            include '../connection/db.php';
            $select_query_second = "SELECT patient_admission_system.reg_id, "
                    . "patient_admission_system.cabin_no, "
                    . "storeallbill.cabin_bill,"
                    . " storeallbill.iv_item, "
                    . "storeallbill.iv_price, "
                    . "storeallbill.photo_hour, "
                    . "storeallbill.photo_price, "
                    . "storeallbill.ryl_quentity, "
                    . "storeallbill.ryl_price, "
                    . "storeallbill.suc_quentity,"
                    . " storeallbill.suc_price,"
                    . " storeallbill.ot_price,"
                    . " storeallbill.ana_price, "
                    . "storeallbill.anes_item, "
                    . "storeallbill.anes_price, "
                    . "storeallbill.gas_item, "
                    . "storeallbill.gas_price, "
                    . "storeallbill.end_price,"
                    . " storeallbill.post_price, "
                    . "storeallbill.baby_price, "
                    . "storeallbill.dre_price, "
                    . "storeallbill.dre_quertity, "
                    . "storeallbill.o2_quentity,"
                    . "storeallbill.o2_price, "
                    . "storeallbill.con_price,"
                    . " storeallbill.ene_price, "
                    . "storeallbill.other_price, "
                    . "storeallbill.con_a_price,"
                    . " storeallbill.con_b_price, "
                    . "storeallbill.con_c_price,"
                    . " storeallbill.sur_price, "
                    . "storeallbill.imp_price, "
                    . "storeallbill.dre_price, "
                    . "storeallbill.dre_quertity, "
                    . "storeallbill.anes_item, "
                    . "storeallbill.anes_price,"
                    ."storeallbill.dres_quentity,"
                    ."storeallbill.dres_price,"
                    . " storeallbill.an_other_price,"
                    . " storeallbill.sub_total,"
                    . " storeallbill.discount,"
                    . " storeallbill.total,"
                    . " storeallbill.payment,"
                    . " storeallbill.due,"
                    . " storeallbill.release_date,"
                    . " storeallbill.month, "
                    . "storeallbill.year"
                    . " FROM patient_admission_system INNER JOIN "
                    . "storeallbill on "
                    . "patient_admission_system.reg_id=storeallbill.patient_id "
                    . "WHERE storeallbill.patient_id='$get_id'";

//            echo $select_query_second;
//            die();
            $execute_sql_second = $conn->query($select_query_second);
//            echo $execute_sql_second;
//            die();
            while ($row = $execute_sql_second->fetch_assoc()) {
                $cabin_no_admi = $row['cabin_no'];
                $cabin_bill = $row['cabin_bill'];
                $iv_item = $row['iv_item'];
                $iv_price = $row['iv_price'];
                $photo_hour = $row['photo_hour'];
                $photo_price = $row['photo_price'];
                $ryl_quentity = $row['ryl_quentity'];
                $ryl_price = $row['ryl_price'];
                $suc_quentity = $row['suc_quentity'];
                $suc_price = $row['suc_price'];
                $ot_price = $row['ot_price'];
                $ana_price = $row['ana_price'];
                $gas_item = $row['gas_item'];
                $gas_price = $row['gas_price'];
                $o2_quentity = $row['o2_quentity'];
                $o2_price = $row['o2_price'];
                $end_price = $row['end_price'];
                $post_price = $row['post_price'];
                $baby_price = $row['baby_price'];
                $dre_quertity = $row['dre_quertity'];
                $dre_price = $row['dre_price'];
                $con_price = $row['con_price'];
                $ene_price = $row['ene_price'];
                $other_price = $row['other_price'];  
                $add_bill = 300;
                $left_ttl_bill=$add_bill+$cabin_bill+$iv_price+$photo_price+$ryl_price+$suc_price+$ot_price+$ana_price+$gas_price+ $o2_price+$end_price+$post_price+$baby_price+$dre_price+$con_price+$ene_price+$other_price;
                        
                $sur_price = $row['sur_price'];
                $con_a_price = $row['con_a_price'];
                $con_b_price = $row['con_b_price'];
                $con_c_price = $row['con_c_price'];
                $dres_quentity=$row['dres_quentity'];
                $dres_price=$row['dres_price'];
                $anes_item = $row['anes_item'];
                $anes_price = $row['anes_price'];
                $imp_price = $row['imp_price'];
                $an_other_price = $row['an_other_price'];
                //$discount = $row['discount'];
                
                $right_ttl_bill=$sur_price+$con_a_price+$con_b_price+$con_c_price+$dres_price+$anes_price+$imp_price+$an_other_price;
                
                $sub_total = $row['sub_total'];
                $discount = $row['discount'];
                $total = $row['total'];
                $payment = $row['payment'];
                $due = $row['due'];
                $release_date = $row['release_date'];
                $month = $row['month'];
                $year = $row['year'];
//                $ = $row[''];
            }
            ?>
<!--<span><a href="details_store_allbill_report.php">Back</a></span>-->
            <div class="body_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="basic_info">
                            <div class="panel panel-primary" style="margin-top: 10px;">
                                <div class="panel panel-heading text-center">All Bill Reports</div>
                                <table class="table" width="90%" >
                                    <tr>
                                        <td width="15%">Name Of Patient</td>
                                        <td width="2%">:</td>
                                        <td width="25%"><?php echo $patient_name; ?></td>

                                        <td>Registration ID</td>
                                        <td>:</td>
                                        <td><?php echo $patient_id; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Cabin/Bed No</td>
                                        <td>:</td>
                                        <td><?php echo $cabin_no; ?></td>

                                        <td>Date Of Admission</td>
                                        <td>:</td>
                                        <td><?php echo $admission_date; ?></td>

                                        <td>Date Of Discharge</td>
                                        <td>:</td>
                                        <td><?php echo $release_date;?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="bill_info">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="first_table col-md-6">
                                        <table class="table " >
                                            <tr>
                                                <td>SL No</td>
                                                <td>Particulars</td>
                                                <td>Taka</td>
                                            </tr>
                                            <tr>
                                                <td>1</td><td>Cabin / Bed</td>
                                                <td><?php echo $cabin_bill; ?></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td><?php echo $iv_item; ?></td>
                                                <td><?php echo $iv_price; ?></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Phototheraphy</td>
                                                <td><?php echo $photo_price; ?></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Rylestube</td>
                                                <td><?php echo $ryl_price; ?></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Sucction</td>
                                                <td><?php echo $suc_price; ?></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>OT/Labour room charge</td>
                                                <td><?php echo $ot_price; ?></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Anaesthetic Equipment</td>
                                                <td><?php echo $ana_price; ?></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td><?php echo $gas_item; ?></td>
                                                <td><?php echo $gas_price; ?></td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                               <td>O<sub>2</sub></td>
                                                <td><?php echo $o2_price; ?></td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>Endotracheal Tube</td>
                                                <td><?php echo $end_price; ?></td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>Post Operative Charge</td>
                                                <td><?php echo $post_price; ?></td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>Baby Management</td>
                                                <td><?php echo $baby_price; ?></td>
                                            </tr>
                                            <tr>
                                                <td>13</td>
                                                <td>Dressing Fees</td>
                                                <td><?php echo $dre_price; ?></td>
                                            </tr>
                                            <tr>
                                                <td>14</td>
                                                <td>Consultation</td>
                                                <td><?php echo $con_price; ?></td>
                                            </tr>
                                            <tr>
                                                <td>15</td>
                                                <td>Enema Simplex</td>
                                                <td><?php echo $ene_price; ?></td>
                                            </tr>
                                            <tr>
                                                <td>16</td>
                                                <td>Admission Fee</td>
                                                <td><?php echo $add_bill;?></td>
                                            </tr>
                                            <tr>
                                                <td>17</td>
                                                <td>VAT</td>
                                                <td>---</td>
                                            </tr>
                                            <tr>
                                                <td>18</td>
                                                <td>Service Charge</td>
                                                <td><?php echo $other_price; ?></td>
                                            </tr>
                                            <tr>
                                                <td>19</td>
                                                <td align='right'><b>Total Bill :- </b></td>
                                                <td align='left'><b><?php echo $left_ttl_bill; ?></b></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="second_table col-md-6">
                                        <table class="table">
                                            <tr>
                                                <td class="">SL No</td>
                                                <td>Particulars</td>
                                                <td>Taka</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Surgon Fees</td>
                                                <td><?php echo $sur_price;?></td>
                                            </tr>
                                             <tr>
                                                <td>2</td>
                                                <td>Consultant Visits (A) </td>
                                                <td><?php echo $con_a_price ?></td>
                                            </tr>
                                             <tr>
                                                <td>3</td>
                                                <td>Consultant Visits (B)</td>
                                                <td><?php echo $con_b_price ?></td>
                                            </tr>
                                             <tr>
                                                <td>4</td>
                                                <td>Consultant Visits (C)</td>
                                                <td><?php echo $con_c_price ?></td>
                                            </tr>
                                             <tr>
                                                <td>5</td>
                                                <td>Dressing Fees</td>
                                                <td><?php echo $dres_price ; ?></td>
                                            </tr>
                                             <tr>
                                                <td>6</td>
                                                <td><?php echo $anes_item;?></td>
                                                <td><?php echo $anes_price;?></td>
                                            </tr>
                                             <tr>
                                                <td>7</td>
                                                <td>Implants</td>
                                                <td><?php echo $imp_price;?></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Other's</td>
                                                <td><?php echo $an_other_price;?></td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td align='right'><b>Total Bill :- </b></td>
                                                <td align='left'><b><?php echo $right_ttl_bill; ?></b></td>
                                            </tr>
                                            <?php
                                            $pharmacy_bill = '';
                                            $select_pharmacy_query="SELECT storeallbill.patient_id, "
                                                    . "pharmacy_patient_bill.total_bill "
                                                    . "FROM storeallbill INNER JOIN "
                                                    . "pharmacy_patient_bill ON "
                                                    . "storeallbill.patient_id=pharmacy_patient_bill.regi_id "
                                                    . "WHERE storeallbill.patient_id='$get_id'";
//                                            echo $select_pharmacy_query;
//                                            die();
                                            $execute_pharmacy_sql=$conn->query($select_pharmacy_query);
                                            while ($row=$execute_pharmacy_sql->fetch_assoc()){
                                                $pharmacy_bill=$row['total_bill'];
                                            }
                                            ?>
                                            <tr>
                                                <td align='center' colspan="3"><b>Grand Total</b></td>
                                            </tr>
                                            <tr>
                                                <td><b>1</b></td>
                                                <td><b>Cabin and Other's TK.</b></td>
                                                <td><b><?php echo $left_ttl_bill;?></b></td>
                                            </tr>
                                             <tr>
                                                 <td><b>2</b></td>
                                                <td><b>Surgeon and Other's TK.</b></td>
                                                <td><b><?php echo $right_ttl_bill;?></b></td>
                                            </tr>
                                            <tr>
                                                 <td><b>3</b></td>
                                                <td><b>Pharmacy Bill</b></td>
                                                <td><b><?php echo $pharmacy_bill;?></b></td>
                                            </tr>
                                            <?php
                                            $diagonostic_bill = '';
                                            $select_diagonostic_query="SELECT storeallbill.patient_id, "
                                                    . "diagonostic_patient_bill.total_bill "
                                                    . "FROM storeallbill INNER JOIN "
                                                    . "diagonostic_patient_bill ON "
                                                    . "storeallbill.patient_id=diagonostic_patient_bill.regi_id "
                                                    . "WHERE storeallbill.patient_id='$get_id'";
//                                            echo $select_pharmacy_query;
//                                            die();
                                            $execute_diagonostic_sql=$conn->query($select_diagonostic_query);
                                            while ($row=$execute_diagonostic_sql->fetch_assoc()){
                                                $diagonostic_bill=$row['total_bill'];
                                            }
                                            ?>
                                            <tr>
                                                 <td><b>4</b></td>
                                                <td><b>Diagonostic Bill</b></td>
                                                <td><b><?php echo $diagonostic_bill;?></b></td>
                                            </tr>
                                            <?php
                                            $totals_amount=$left_ttl_bill+$right_ttl_bill+$pharmacy_bill+$diagonostic_bill;
                                            ?>
                                             <tr>
                                                 <td><b>5</b></td>
                                                 <td><b>Sub Total's TK.</b></td>
                                                 <td><b><?php echo $totals_amount; ?></b></td>
                                            </tr>
                                            <tr>
                                                 <td><b>6</b></td>
                                                 <td><b>Discount.</b></td>
                                                 <td><b><?php echo $discount.'%'; ?></b></td>
                                            </tr>
                                            
                                            <tr style="color:red;">
                                                 <td><b>7</b></td>
                                                 <td><b>Total's TK.</b></td>
                                                 <td><b><?php echo $total; ?></b></td>
                                            </tr>
                                            <tr style="color:red;">
                                                 <td><b>8</b></td>
                                                 <td><b>Payment TK.</b></td>
                                                 <td><b><?php echo $payment; ?></b></td>
                                            </tr>
                                            
                                            <tr style="color:red;">
                                                 <td><b>9</b></td>
                                                 <td><b>Due TK.</b></td>
                                                 <td><b><?php echo $due; ?></b></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <p class="col-md-12" style="margin-bottom: 30px;"><b>In Word : </b></p>
                                <p class="col-md-3">Paid By</p>
                                <p class="col-md-3">Checked By</p>
                                <p class="col-md-3">Accountant</p>
                                <p class="col-md-3">Prepared By</p>
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
