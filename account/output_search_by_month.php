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
                                <form action="output_search_by_month.php" method="POST" class="col-md-offset-8 col-md-4" style="font-size: 15px; padding-top: 5px; padding-bottom: 5px;">
                                    <table border="0" >
                                        <tr>
                                            <td style="text-align: center;">
                                                <select name="month" class="form-control">
                                                    <option value="">Select One</option>
                                                    <option value="January">January</option>
                                                    <option value="February">February</option>
                                                    <option value="March">March</option>
                                                    <option value="April">April</option>
                                                    <option value="May">May</option>
                                                    <option value="June">June</option>
                                                    <option value="July">July</option>
                                                    <option value="August">August</option>
                                                    <option value="September">September</option>
                                                    <option value="October">October</option>
                                                    <option value="November">November</option>
                                                    <option value="December">December</option>
                                                </select>
                                            </td>
                                            <td><input type="submit" name="search" value="Search" class="form-control btn-success" style="margin-left: 2px;"></td>
                                        </tr>
                                    </table>
                                </form>
                                <table border="1" class="table text-center success" style="">
                                    <tr>
                                        <td style="background-color: #346E99;color: #fff;">SL No</td>
                                        <td style="background-color: #346E99;color: #fff;">Patient Name</td>
                                        <td style="background-color: #346E99;color: #fff;">Month</td>
                                        <td style="background-color: #346E99;color: #fff;">Admission Date</td>
                                        <td style="background-color: #346E99;color: #fff;">Release Date</td>
                                        <td style="background-color: #346E99;color: #fff;">Total Amount</td>
                                    </tr>
                                    <?php
                                    include '../connection/db.php';
                                    $month_name = $_POST['month'];
//                            echo $month_name;
                                    $select_query = "SELECT patient_entry_form.patient_name,"
                                            . " storeallbill.total_bill,"
                                            . "storeallbill.current_month,"
                                            . "storeallbill.addmission_date,"
                                            . "storeallbill.release_date "
                                            . "FROM patient_entry_form "
                                            . "INNER JOIN storeallbill "
                                            . "ON patient_entry_form.id=storeallbill.reg_id "
                                            . "WHERE storeallbill.current_month='$month_name' ";
//                            echo $select_query;
                                    $execute_sql = $conn->query($select_query);
                                    $count = mysqli_num_rows($execute_sql);
                                    
                                    if($count==0){
                                        ?>
                                    <h2 align="center" style="color: red"><?php echo'Data is Not Found !'; ?></h2>
                                    <?php
                                    }
                                    $sl = 0;
                                    $sum = 0;
                                    while ($row = $execute_sql->fetch_assoc()) {
                                        $sl++;
                                        
                                        $sum = $row['total_bill'] + $sum;
                                        ?>
                                        <tr>
                                            <td><?php echo $sl; ?></td>
                                            <td><?php echo $row['patient_name']; ?></td>
                                            <td><?php echo $row['current_month']; ?></td>
                                            <td><?php echo $row['addmission_date']; ?></td>
                                            <td><?php echo $row['release_date']; ?></td>
                                            <td><?php echo $row['total_bill']; ?></td>

                                        </tr>
                                        <?Php
                                    }
                                    ?>
                                </table>
                                <p class="col-md-offset-9 col-md-3" style="font-family: caption; font-size: 22px; font-style: italic;">Total Income <?php echo $sum; ?></p>
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
