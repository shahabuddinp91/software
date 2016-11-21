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

            <a style="border: 1px solid; margin-left: 80px;
               display: inline-block;
               font-family: caption;
               font-size: 12px;
               padding: 5px 10px;
               text-decoration: none;" href="store_all_bill_list.php">BACK</a>
            <div class="body_area" style="">
                <div class="container">
                    <div class="row">
                        <?php
                        include '../connection/db.php';
                        $id = $_GET['patient_id'];
//                        echo $id;
//                        die();
                        $select_query = "SELECT storeallbill.patient_id,"
                                . "patient_entry_form.patient_name,"
                                . " patient_entry_form.age, "
                                . "storeallbill.cabin_bill, "
                                . "storeallbill.total, "
                                . "storeallbill.payment,"
                                . " storeallbill.due, "
                                . "storeallbill.release_date "
                                . "FROM patient_entry_form INNER "
                                . "JOIN storeallbill on "
                                . "storeallbill.patient_id=patient_entry_form.id where patient_id='$id'";
                        $execute_sql=$conn->query($select_query);
//                        echo $execute_sql;
//                        die();
                        while ($row = $execute_sql->fetch_assoc()) {
                            $patient_id = $row['patient_id'];
                            $patient_name = $row['patient_name'];
                            $age = $row['age'];
//                            $cabin_no = $row['cabin_bill'];
                            $total_bill = $row['total'];
                            $payment = $row['payment'];
                            $due = $row['due'];
                            $release_date = $row['release_date'];
                        }
                        ?>
                        <p class="text-center " style="background-color: #346E99;color: #fff; height: 35px; ">Bill Report</p>
                        <div class="row">
                            <div class="part1 col-md-6" style="font-family: caption; font-size: 18px;">
                                <table style="text-align: left;" width="50%">
                                    <tr>
                                        <td>Registration ID</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $patient_id; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Patient Name</td>
                                        <td>:</td>
                                        <td><?php echo $patient_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Age</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $age; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Total Bill</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $total_bill; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Payment</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $payment; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Due</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $due; ?></td>
                                    </tr>
                                     <tr>
                                        <td>Date</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $release_date; ?></td>
                                    </tr>
                                </table>
                                <hr >
                            </div>
                        </div>
                        <br>
                        <div class=" part2" >
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-offset-1 col-md-10 col-md-offset-1" style="font-family: caption; font-size: 18px; border: 2px solid gray; width: 60%; min-height: 190px; padding-top: 10px;">
                                        <table class="table" style="text-align: left;" width="50%">
                                            <tr>
                                                <td>Total In Word :</td>
                                                <td style="padding-right: 3px; "></td>
                                                <td ></td>
                                            </tr>
                                            <tr>
                                                <td>Payment In Word :</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Due In Word :</td>
                                                <td style="padding-right: 3px; "></td>
                                                <td ></td>
                                            </tr>
                                        </table>
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
