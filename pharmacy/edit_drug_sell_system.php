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

            <div class="body_area" style="min-height: 660px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="left_content_area">
                                <?php include './left_side_pharmacy.php'; ?>
                            </div>
                        </div>
                        <div class="right_content_area">
                            <div class="patient_entry_form">
                                <div class="container">
                                    <div class="col-md-offset-1 col-md-8">
                                        <br>

                                        <?php
                                        $msg = '';
                                        $count_message = '';
                                        $id = '';
                                        $regno = '';
                                        include '../connection/db.php';
                                        $id = $_GET['id'];
                                        $select_query = "SELECT * FROM `drug_sell_system` WHERE id='$id'";
                                        $execute_sql = $conn->query($select_query);
                                        while ($row = $execute_sql->fetch_assoc()) {
                                            $regno = $row['reg_id'];
                                            $drug_name = $row['drug_name'];
                                            $quantity = $row['quantity'];
                                            $price = $row['price'];
                                        }
                                        ?>
                                        <?php
                                        $update_mes = '';
                                        if (isset($_POST['update'])) {
                                            extract($_POST);
                                            //echo $drugName1; 
                                            $update_sql = "UPDATE `drug_sell_system` SET `drug_name`='$drug_name1',`quantity`='$quantity1',`price`='$price' WHERE id = '$id'";
//                                            echo $update_sql;
//                                            die();
                                            $execute_sql = $conn->query($update_sql);
//                                                echo $execute_sql;
//                                                die();

                                            if ($execute_sql) {
                                                $select_query = "SELECT * FROM `drug_sell_system` WHERE id = '$id'";
//                                                echo $select_query;
//                                                die();
                                                $execute_sql = $conn->query($select_query);

                                                while ($row = $execute_sql->fetch_assoc()) {
                                                    $regno = $row['reg_id'];
                                                    $drug_name = $row['drug_name'];
                                                    $quantity = $row['quantity'];
                                                    $price = $row['price'];

                                                    $update_mes = "Update Successful";
                                                }
                                            }
                                        }
                                        ?>

                                        <div class="panel panel-primary modal-content modal-body" style="min-height: 350px; width: 500px;" >
                                            <div class="panel-heading" align="center">Drug Updating Form</div>
                                            <p style="color: #941596; font-size: 20px; font-family: cursive; text-align: center;"> <?php echo $update_mes, $count_message; ?></p>
                                            <br>
                                            <form class="form-horizontal" role="form" action="" method="post">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="RegNo">Registration No:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="RegNo" name="RegNo" value="<?php echo $regno; ?>" readonly="1">
                                                    </div> 
                                                </div>
                                            </form>
                                            <form class="form-horizontal teststore_form" role="form" action="" method="post">

                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="DrugName">Drug Name:</label>
                                                    <div class="col-sm-8">
                                                        <!--<input type="text" class="form-control" id="DrugName" name="DrugName" placeholder="Drug Name">-->
                                                        <select name="drug_name1" id="drugname" class="form-control">
                                                            <option value="<?php echo $drug_name; ?>"><?php echo $drug_name; ?></option>
                                                            <?php
                                                            include '../connection/db.php';
                                                            $select_query = mysqli_query($conn, "Select * from add_drug_store");
                                                            while ($row = mysqli_fetch_array($select_query)) {
                                                                ?>
                                                                <option class="drug_name1"  value="<?php echo $row['drug_name'] ?>"><?php echo $row['drug_name'] ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="Quantity">Quantity:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control quantity1" id="Quantity" name="quantity1" value="<?php echo $quantity; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="Price">Price:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control price" id="Price" name="price" value="<?php echo $price; ?>"
                                                    </div>
                                                </div>


                                                <div class="form-group" >
                                                    <div class="col-sm-offset-4 col-sm-8" style="margin-top: 10px;">
                                                        <button type="submit" class="btn btn-default btn-primary update" name="update">Update</button>
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
    </body>

</html>
