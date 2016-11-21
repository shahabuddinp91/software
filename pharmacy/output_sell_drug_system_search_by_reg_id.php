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
                                Dashboard of Pharmacy
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body_area" style="min-height: 662px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="left_content_area">
                                <?php include './left_side_pharmacy.php'; ?>
                            </div>
                        </div>
                        <div class="right_content_area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-9">
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
                                                 date_default_timezone_set("Asia/Dhaka");
                                                 $today = date('m/d/Y');
                                                
                                                 $patient_id = '';
                                                 ?>
                                            </div>
                                            <form action="output_sell_drug_system_search_by_reg_id.php" method="POST" style="font-size: 15px; padding-top: 5px; padding-bottom: 5px;">
                                                <table border="0" >
                                                    <tr>
                                                        <td style="text-align: center;"><input style="text-align: center;font-size: 12px;width: 300px;" type="text" value="<?php echo $patient_id; ?>"  name="search_name_mobile" id="search_name_mobile"  class="form-control" placeholder="Search By ID!" required></td>
                                                        <td><input type="submit" name="search" value="Search" class="form-control btn-success" style="margin-left: 2px;"></td>
                                                    </tr>
                                                </table>
                                            </form>
                                            <?php
                                            include_once '../connection/db.php';
                                            $searching_item = '';
                                            $patient_id = '';
                                            $count_name = '';
                                            $count_mobile = '';
                                            $sum = '';
                                            date_default_timezone_set("Asia/Dhaka");
                                            $month = date('F');

                                            if (isset($_POST['search'])) {
                                                $searching_item = $_POST['search_name_mobile'];
//                                            echo $searching_item;
                                                $select_query_id = "SELECT * FROM `drug_sell_system` WHERE reg_id='$searching_item'";
//                                            echo $select_query_id;
//                                            die();
                                                $execule_sql_id = $conn->query($select_query_id);
                                                $count_id = mysqli_num_rows($execule_sql_id);
                                                
                                                
//                                            echo $count_id;
//                                            die();
//                                              
                                                if ($count_id == 0 ) {
                                                    ?>
                                                    <h2 align="center" style="color: red; font-style: italic;"><?php echo'Data Not Found !'; ?></h2>
                                                    <?php
                                                }
                                            }
                                            ?>

                                            <table border="1" class="table text-center" style="margin-top: 10px;">
                                                <!--its for search by id-->
                                                <?php if ($count_id > 0 ) { ?>
                                                    <h2 style="color: #000;font-family: caption;font-size: 24px;margin-left: 50px;opacity: 0.6;display: inline-block;">
                                                        <?php echo 'Search Complete for ID ' . $searching_item ?>
                                                    </h2>
                                                    <tr class="">
                                                        <td style="background-color: #346E99;color: #fff;">SL No</td>
                                                        <td style="background-color: #346E99;color: #fff;">Registration ID</td>
                                                        <td style="background-color: #346E99;color: #fff;">Sell Date</td>
                                                        <td style="background-color: #346E99;color: #fff;">Drug Name</td>
                                                        <td style="background-color: #346E99;color: #fff;">Quantity</td>
                                                        <td style="background-color: #346E99;color: #fff;">Price</td>
                                                    </tr>
                                                    <?php
                                                    $sl = 0;
                                                    $sum = 0;
                                                    while ($row = $execule_sql_id->fetch_assoc()) {
                                                        $patient_id = $row['reg_id'];
//                                                    echo $patient_id;
//                                                    die();
                                                        $sl++;
                                                        $sum = $row['price'] + $sum;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $sl; ?></td>
                                                            <td><?php echo $row['reg_id']; ?></td>
                                                            <td><?php echo $row['sell_date']; ?></td>
                                                            <td><?php echo $row['drug_name']; ?></td>
                                                            <td><?php echo $row['quantity']; ?></td>
                                                            <td><?php echo $row['price']; ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                <?php } ?>

                                                
                                            </table>

                                            <div class="panel panel-primary modal-content modal-body col-md-5" style="">
                                                <div class="panel-heading" align="center">Total Test Bill</div>
                                                <br>
                                                <form class="form-horizontal form-group-sm patient_pharmacy_total_bill" role="form" action="" method="post">
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-5" for="regi_id">Patient Name / Mobile:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control text-center" id="regi_id" name="regi_id" value="<?php echo $searching_item; ?>" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-5" for="bill">Bill:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control text-center" id="bill" name="bill" value="<?php echo $sum; ?>" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="">
                                                        <label class="control-label col-sm-5" for="discount" >Discount:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="aa form-control text-center" id="discount" name="discount" >
                                                        </div>
                                                    </div>

                                                    <script>
                                                        $(document).ready(function () {
                                                            $('#discount').on('keyup', function (e) {
                                                                e.preventDefault();
                                                                var discount = $(this).val();
                                                                var bill = $('#bill').attr("value");
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'test_descount.php',
                                                                    data: {discount: discount, bill: bill}
                                                                })
                                                                        .done(function (m) {
                                                                            //alert(m)
                                                                            $('#discount_bill').html(m);
                                                                        })
                                                            })
                                                        })
                                                    </script>
                                                    <div class="form-group" style="">
                                                        <label class="control-label col-sm-5" for="total_bill" >Total Bill:</label>
                                                        <div class="col-sm-7" id="discount_bill">
                                                            <input type="text" class="form-control text-center" id="total_bill" value="<?php echo $sum; ?>" name="total_bill" readonly="" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="">
                                                        <label class="control-label col-sm-5" for="payment" >Payment:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control text-center" id="payment" name="payment" >
                                                        </div>
                                                    </div>

                                                    <script>
                                                        $(document).ready(function () {
                                                            $('#payment').on('keyup', function (e) {
                                                                e.preventDefault();
                                                                var payment = $(this).val();
                                                                var id = $('#regi_id').attr("value");
                                                                var total_bill = $('#total_bill').attr("value");
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'test_bill_due.php',
                                                                    data: {payment: payment, total_bill: total_bill, id: id}
                                                                })
                                                                        .done(function (m) {
                                                                            //alert(m)
                                                                            $('#due_bill').html(m);
                                                                        })
                                                            })
                                                        })
                                                    </script>

                                                    <div class="form-group" style="">
                                                        <label class="control-label col-sm-5" for="due" >Due:</label>
                                                        <div class="col-sm-7" id="due_bill">
                                                            <input type="text" class="form-control text-center" id="due" value="<?php echo $sum; ?>" readonly="true" name="due" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-4 col-sm-8" style="padding-top: 10px; text-align: center;">
                                                            <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">
                                                            <button type="submit" class="btn btn-default submit btn-primary submit_bill" name="submit_bill"  >Submit</button>
                                                            <button type="reset" class="btn btn-success clear">Clear</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                                <div class="col-md-3">
                                                        <?php
                                                    $info_select = "SELECT * FROM `pharmacy_patient_bill` WHERE regi_id = '$patient_id'";
                                                    $info_execute = $conn->query($info_select);
                                                    $info_count = mysqli_num_rows($info_execute);
                                                ?>
                                                
                                                <?php
                                                    if($info_count == 1){ 
                                                ?>
                                                <div class="old_info">
                                                    <table border = "3" style="text-align: center;">
                                                        <tr>
                                                            <td style="background-color: #337AB7; width: 75px;color: #fff;">Test Bill</td>
                                                            <td style="background-color: #337AB7; width: 75px;color: #fff;">Discount</td>
                                                            <td style="background-color: #337AB7; width: 125px;color: #fff;">Bill(With discount)</td>
                                                            <td style="background-color: #337AB7; width: 85px;color: #fff;">Bill Payment</td>
                                                            <td style="background-color: #337AB7; width: 75px;color: #fff;">Bill Due</td>
                                                        </tr>
                                                        
                                                        <?php
                                                            while ($info = $info_execute->fetch_assoc()) {
                                                        ?>
                                                        
                                                        <tr>
                                                            <td><?php echo $info['bill'];?></td>
                                                            <td><?php echo $info['discount'];?></td>
                                                            <td><?php echo $info['total_bill'];?></td>
                                                            <td><?php echo $info['payment'];?></td>
                                                            <td><?php echo $info['due'];?></td>
                                                        </tr>
                                                        
                                                            <?php } ?>
                                                    </table>
                                                </div>
                                                    <?php } ?>
                                                    </div>
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

        <script>
            $(document).ready(function () {
                $('.submit_bill').on('click', function (e) {
                    e.preventDefault();
                    var data = $('.patient_pharmacy_total_bill').serialize();
                    $.ajax({
                        method: 'POST',
                        url: 'insert/patient_pharmacy_total_bill.php',
                        data: data
                    })
                            .done(function (m) {
                                alert(m)
                                
                            })
                })
            })
        </script>
    </body>
</html>