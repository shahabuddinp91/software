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
                        <img src="../images/baner.png" alt="UPASHAM HOSPITAL" title="UPASHAM HOSPITAL" height="100">
                    </div>
                </div>
            </div>
        <div class="container">
            <div class="row">
                <div class="print_option" style="min-height: 500px;">
            <a style="border: 1px solid; margin-left: 80px;
    display: inline-block;
    font-family: caption;
    font-size: 12px;
    padding: 5px 10px;
    text-decoration: none;" href="outdoor_pharmacy_patient_list.php">BACK</a>
            <div class="body_area" style="">
                <div class="container">
                    <div class="row">
                        <?php
                        include '../connection/db.php';
                        $id = $_GET['id'];
//                        echo $id;
                        $select_query = "SELECT * FROM `outdoor_pharmacy_p_register` where id='$id'";
                        $execute_sql = $conn->query($select_query);
//                        echo $execute_sql;
//                        die();
                        while ($row = $execute_sql->fetch_assoc()) {
                            $reg_id = $row['id'];
                            $patient_name = $row['patient_name'];
                            $mobile = $row['mobile'];
                            $age = $row['age'];
                            $dr_name= $row['dr_name'];
                            $ref_name = $row['ref_name'];
                            $ref_mobile = $row['ref_mobile'];
                            $date = $row['date'];
                        }
                        ?>
                        <p class="text-center " style="background-color: #346E99;color: #fff; height: 35px; ">Details Report</p>
                        <div class="row">
                            <div class="part1 col-md-8" style="font-family: caption; font-size: 18px;">
                                <table style="text-align: left;" width="60%">
                                    <tr>
                                        <td>Registration ID</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $reg_id; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Patient Name</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $patient_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Mobile No</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $mobile; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Age</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $age; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Doctor Name</td>
                                        <td style="padding-right: 3px; ">:</td>
                                        <td ><?php echo $dr_name; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
        </div>
            </div>
        </div>
            <div class="footer_area">
                <div class="container">
                    <div class="row">

                        <?php include '../footer.php'; ?>

                    </div>
                </div>
            </div>
    </body>

</html>
