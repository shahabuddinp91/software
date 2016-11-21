<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['admin_id'])) {
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
           
            <div class="body_area" style="background-image: none;">
                <div class="container">
                    <div class="row">
                        <?php
                        include '../connection/db.php';
                        $id = $_GET['id'];
//                        echo $id;
                        $select_query = "SELECT * FROM `in_reference` WHERE id = '$id'";
                        $execute_sql = $conn->query($select_query);
//                        echo $execute_sql;
//                        die();
                        while ($row = $execute_sql->fetch_assoc()) {
                            $ref_name = $row['name'];
                                            $ref_mobile  = $row['mobile'];
                                            $total = $row['total'];
                                            $payment = $row['payment'];
                                            $due = $row['due'];
                                            $month = $row['month'];
                                            $year = $row['year'];
                                            $date = $row['date'];
                        }
                        ?>
                        <p class="text-center " style="background-color: #346E99;color: #fff; height: 35px; ">Payment Slip</p>
                        <div class="row">
                            <div class="part1 col-md-6" style="font-family: caption; font-size: 18px;">
                                <table style="text-align: left;" width="50%">
                                    <tr>
                                        <td>Reference Name </td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $ref_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Mobile</td>
                                        <td>:</td>
                                        <td><?php echo $ref_mobile; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $total; ?></td>
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
                                        <td ><?php echo $date; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Month</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $month; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Year</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $year; ?></td>
                                    </tr>
                                </table>
                                <hr >
                            </div>
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
