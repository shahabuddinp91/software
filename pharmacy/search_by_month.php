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
<!--        <link rel="stylesheet" href="../css/style.css">-->
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
        
        <style>
            body{
    height: 100%;
    background: url(../images/patern.png);
    font-family: initial;

}




.dashbord_area {
    /*background: #3BB7DB none repeat scroll 0 0;*/
    padding: 15px 0;
}
.dashboard_text {
    color: #000;
    font-family: caption;
    font-size: 16px;
    font-weight: bolder;
}
.dashboard_text img{width: 100%; }


.manu {
    margin-top: 25px;
}
.manu li {
    list-style: outside none none;
    text-decoration: none;
}
.manu ul {
    padding-left: 0;
}
.manu a {
    background: #33b5e5 none repeat scroll 0 0;
    display: inline-block;
    margin-bottom: 10px;
    padding: 10px 5px;
    text-decoration: none;
    width: 210px;
    font-family: caption;
     font-size: 16px;
}
.manu a:hover {
    background: #0099cc none repeat scroll 0 0;
    color: #fff;
    text-decoration: none;
}
            #copyright {
    background: #a4bed9 none repeat scroll 0 0;
    color: #fff;
    font-family: caption;
    font-size: 15px;
    text-align: center;
      padding: 10px 0;
    
}
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
                                            
                                            <?php
                                            include '../connection/db.php';
                                            if (isset($_POST['search'])) {
                                                $drug_month = $_POST['month'];
                                                $drug_year = $_POST['year'];
                                                $select_month = "SELECT * FROM `add_drug_store` WHERE current_month = '$drug_month' and year = '$drug_year'";
                                                $execute_month = $conn->query($select_month);
                                                $count_month = mysqli_num_rows($execute_month);
                                                if ($count_month == 0) {
                                                        ?>
                                                        <h2 align="center"><?php echo'This Drug is Not Found !'; ?></h2>

                                                    <?php
                                            }  }?>
                                            <div>
                                                <div>
                                                <form action="output_search_by_drug_name.php" method="POST" style=" font-size: 15px; padding-top: 5px; padding-bottom: 5px;">
                                                    <table border="0" >
                                                        <tr>
                                                            <td><input type="text"  name="drugname" id="drugname"  class="form-control"placeholder="Search By Drug Name" ></td>
                                                            <td><button style="background: #ccc none repeat scroll 0 0;
    border: 1px solid #ccc;border-radius: 10%;height: 33px;margin-left: 0;width: 38px;" class="" type="submit" name="search"><img style="width: 25px;height: 25px;" src="../images/search-icon2.png"></button></td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </div>
                                                <div>
                                                    <form method="post" action="search_by_month.php">
                                                <tr>
                                                    <td><select name="month" style=" border: 1px solid #ccc;
    border-radius: 5%;color: #3399ff;height: 34px;width: 168px;">
                                                            <option>Select Month name</option>
                                                            <option>January</option>
                                                            <option>February</option>
                                                            <option>March</option>
                                                            <option>April</option>
                                                            <option>May</option>
                                                            <option>June</option>
                                                            <option>July</option>
                                                            <option>August</option>
                                                            <option>September</option>
                                                            <option>October</option>
                                                            <option>November</option>
                                                            <option>December</option>
                                                         </select></td>
                                                         <td><select name="year" style=" border: 1px solid #ccc;
    border-radius: 5%;color: #3399ff;height: 34px;width: 168px;">
                                                            <option>Select Year name</option>
                                                            <option>2016</option>
                                                            <option>2017</option>
                                                            <option>2018</option>
                                                            <option>2019</option>
                                                            <option>2020</option>
                                                            <option>2021</option>
                                                            <option>2022</option>
                                                            <option>2023</option>
                                                         </select></td>
                                                        <td><button style="background: #ccc none repeat scroll 0 0;
    border: 1px solid #ccc;border-radius: 10%;height: 33px;margin-left: 0;width: 38px;" class="" type="submit" name="search"><img style="width: 25px;height: 25px;" src="../images/search-icon2.png"></button></td>
                                                </tr>
                                            </form>
                                            </div>
                                            
                                            </div>
                                                        <table border="2" style="text-align: center;">
                                                <?php if ($count_month > 0) { ?>
                                                <div class="" style="border-bottom: 1px solid;
                                                 color: #000;
                                                 font-family: caption;
                                                 font-size: 20px;
                                                 margin-left: 50px;
                                                 opacity: 0.6;
                                                 padding-bottom: 6px;">
                                                 <?php
                                                 // echo 'All Drug Store ' . $today
                                                 echo 'All Drug Store for ' . $drug_month.' & year '.$drug_year;
                                                 ?>
                                            </div>
                                                    <tr>
                                                        <td style="background-color: #346E99;color: #fff; width: 80px;">Sl No</td>
                                                    <td style="background-color: #346E99;color: #fff; width: 80px;">Store Date</td>
                                                    <td style="background-color: #346E99;color: #fff; width: 80px;">Drug Name</td>
                                                    <td style="background-color: #346E99;color: #fff; width: 80px;">Quantity</td>
                                                    <td style="background-color: #346E99;color: #fff; width: 80px;">Drug Units</td>
                                                    <td style="background-color: #346E99;color: #fff; width: 80px;">Buy Price</td>
                                                    <td style="background-color: #346E99;color: #fff; width: 80px;">Sell Price</td>
                                                    <td style="background-color: #346E99;color: #fff; width: 100px;">Month</td>
                                                    <td style="background-color: #346E99;color: #fff; width: 100px;">Year</td>
                                                    <td style="background-color: #346E99;color: #fff;width: 50px;">Action</td>
                                                    </tr>
    <?php
    $sl = 0;
    while ($fetch = $execute_month->fetch_assoc()) {
        $sl++;
        ?>
                                                        <tr>
                                                            <td><?php echo $sl; ?></td>
                                                            <td><?php echo $fetch['date']; ?></td>
                                                            <td><?php echo $fetch['drug_name']; ?></td>
                                                            <td><?php echo $fetch['quantity']; ?></td>
                                                            <td><?php echo $fetch['drug_units']; ?></td>
                                                            <td><?php echo $fetch['buy_price']; ?></td>
                                                            <td><?php echo $fetch['sell_price'];?></td>
                                                            <td><?php echo $fetch['current_month']; ?></td>
                                                            <td><?php echo $fetch['year'];?></td>

                                                            <td>
                                                                <a href="edit_drug_store.php?id=<?php echo $fetch['id']; ?>"><img src="../images/edit2.png" width="30" height="30" title="Edit" alt="Edit" style="padding: 2px;"></a> 
                                                                <a href="delete_drug_store.php?id=<?php echo $fetch['id']; ?>"><img src="../images/delete2.png" width="30" height="30" title="Delete" alt="Delete" style="padding: 2px;"></a> 
                                                            </td>
                                                        </tr>
    <?php
    }
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
