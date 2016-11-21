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
                                                 $today = date('m/d/Y');
                                                 echo 'All Sell Drug List ' . $today;
                                                 echo $delete_message;
                                                 ?>


                                            </div>

                                            <form action="" method="POST" style="font-size: 15px; padding-top: 5px; padding-bottom: 5px;">
                                                <table border="0" >
                                                    <tr>
                                                        <td><input style="width: 302px;" type="text"  name="selldate" id="selldate"  class="form-control datepicker"placeholder="Search By Sell Date" required></td>
                                                        <td><input type="submit" name="search" value="Search" class="form-control btn-success" style="margin-left: 2px;"></td>
                                                </table>
                                            </form>
                                            <form action="output_sell_drug_system_search_by_reg_id.php" method="POST" style="font-size: 15px; padding-top: 5px; padding-bottom: 5px;">
                                                <table border="0" >
                                                    <tr>
                                                        <td><input type="text"  name="regi_id" id="regi_id"  class="form-control"placeholder="Search By Registration ID" style="width: 300px;" required></td>
                                                        <td><input type="submit" name="search" value="Search" class="form-control btn-success" style="margin-left: 2px;"></td>
                                                    </tr>
                                                </table>
                                            </form>
                                            <table border="1" class="table text-center" style="margin-top: 10px;">
                                                <?php
                                                include '../connection/db.php';
                                                 if (isset($_POST['search'])) {
                                                    $searching_date = $_POST['selldate'];
                                                    
                                                    $select_query="SELECT * FROM `drug_sell_system` WHERE sell_date='$searching_date'";
//                                                    echo $select_query;
//                                                    die();
                                                    $execute_sql=$conn->query($select_query);
                                                    $sell_date_count=  mysqli_num_rows($execute_sql);
                                                    
                                                    if($sell_date_count==0){
                                                        ?>
                                                <h2 align="center" style="color: red; font-style: italic;"><?php echo'Data Not Found !'; ?></h2>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <tr>
                                                    <td style="background-color: #346E99;color: #fff;">SL No</td>
                                                    <td style="background-color: #346E99;color: #fff;">Registration ID</td>
                                                    <td style="background-color: #346E99;color: #fff;">Sell Date</td>
                                                    <td style="background-color: #346E99;color: #fff;">Drug Name</td>
                                                    <td style="background-color: #346E99;color: #fff;">Quantity</td>
                                                    <td style="background-color: #346E99;color: #fff;">Price</td>
<!--                                                    <td style="background-color: #346E99;color: #fff;">Action</td>-->
                                                </tr>
                                                
                                                <?php
                                                $sl=0;
                                                while ($row=$execute_sql->fetch_assoc()){
                                                    $sl++;
                                                    ?>
                                                <tr>
                                                    <td><?php echo $sl; ?></td>
                                                    <td><?php echo $row['reg_id'];?></td>
                                                    <td><?php echo $row['sell_date'];?></td>
                                                    <td><?php echo $row['drug_name'];?></td>
                                                    <td><?php echo $row['quantity'];?></td>
                                                    <td><?php echo $row['price'];?></td>
<!--                                                    <td>
                                                        <a href="edit_drug_sell_system.php?id=<?php //echo $row['id']; ?>"><img src="../images/edit2.png" title="Edit" height="32" width="32" alt="Edit"></a> | 
                                                        <a href="delete_sell_drug_system_by_id.php?id=<?php //echo $row['id']; ?>"><img src="../images/delete2.png" title="Delete" height="28" width="28" alt="Delete"></a>
                                                    </td>-->
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
