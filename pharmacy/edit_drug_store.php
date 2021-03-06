<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['pharmacy_id'])) {
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
                                Dashboard of Pharmacy
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
                                <?php include './left_side_pharmacy.php'; ?>
                            </div>
                        </div>
                        <div class="right_content_area">
                            <div class="drugstore_form">
                                <div class="container">
                                    <div class="col-md-offset-1 col-md-8">
                                        <br>
                                        <div class="panel panel-primary modal-content modal-body edit_drug_store">
                                            <div class="panel-heading" align="center">Drug Store Form</div>
                                            <br>
                                            <form class="form-horizontal drugstore_form" role="form" method="POST" action="">
                                                <?php
                                                include '../connection/db.php';
                                                $edit_id = $_GET['id'];
//                                         echo $edit_id;
                                                $select_query = "SELECT * FROM `add_drug_store` WHERE id='$edit_id'";
                                                $execute_sql = $conn->query($select_query);

                                                while ($row = $execute_sql->fetch_assoc()) {
                                                    $date = $row['date'];
                                                    $drugName = $row['drug_name'];
                                                    $quantity = $row['quantity'];
                                                    $drug_units = $row['drug_units'];
                                                    $buy_price = $row['buy_price'];
                                                    $sell_price = $row['sell_price'];
                                                }
//                                         echo $drugName;
                                                ?>

                                                <?php
                                                $update_mes = '';
                                                if (isset($_POST['submit'])) {
                                                    date_default_timezone_set("Asia/Dhaka");
                                                    $month = date('F');
                                                    extract($_POST);
//                                                        echo $drugName1; 
//                                                        die();

                                                    $update_sql = "UPDATE `add_drug_store` SET `date`='$storedate',`drug_name`='$drug_name',`quantity`='$quantity1',`drug_units`='$drugUnit1',`buy_price`='$buy_price',`sell_price`='$sell_price',`current_month`='$month' WHERE id = '$edit_id'";
                                                    $execute_sql = $conn->query($update_sql);

                                                    if ($execute_sql) {
                                                        $select_query = "SELECT * FROM `add_drug_store` WHERE id='$edit_id'";
                                                        $execute_sql = $conn->query($select_query);

                                                        while ($row = $execute_sql->fetch_assoc()) {
                                                            $date = $row['date'];
                                                            $drugName = $row['drug_name'];
                                                            $quantity = $row['quantity'];
                                                            $drug_units = $row['drug_units'];
                                                            $buy_price = $row['buy_price'];
                                                            $sell_price = $row['sell_price'];

                                                            $update_mes = "Update successful";
                                                        }
                                                    }
                                                }
                                                ?>
                                                <h3 align='center' style="color: green;margin-top: -5px;"><?php echo $update_mes; ?></h3>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="storedate">Date:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control datepicker" id="storedate1" name="storedate" value="<?php echo $date; ?>" >
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="drug_name">Drug Name:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="drug_name" name="drug_name" value="<?php echo $drugName; ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="quantity">Quantity:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="quantity" name="quantity1" value="<?php echo $quantity; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="drugUnit">Drug Units:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="drugUnit" name="drugUnit1" value="<?php echo $drug_units; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="buy_price">Buy Price:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="buy_price" name="buy_price" value="<?php echo $buy_price; ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="sell_price">Sell Price:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="sell_price" name="sell_price" value="<?php echo $sell_price; ?>">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="col-sm-offset-4 col-sm-8">
                                                        <button type="submit" class="btn btn-default submit btn-primary" name="submit">Update</button>

                                                        <button type="reset" class="btn btn-default btn-success clear">Clear</button>
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
//            $(document).ready(function(){
//                $('.submit').on('click',function(e){
//                    e.preventDefault();
//                    var data = $('.drugstore_form').serialize();
//                    $.ajax({
//                        method : 'POST',
//                        url : 'update/update_drug_store.php',
//                        data : data
//                    })
//                            .done(function(m){
//                                alert(m)
//                        $('.clear').trigger('click')
//                    })
//                })
//            })
        </script>
    </body>

</html>
