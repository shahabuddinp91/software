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
        <!--<link rel="stylesheet" href="../css/style.css">-->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        
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
                        <div class="col-md-2">
                            <div class="left_content_area">
                                <?php include './left_side_pharmacy.php'; ?>
                            </div>
                        </div>
                        <div class="right_content_area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10">
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
                                                 echo 'All Drug Store';
                                                 echo $delete_message;
                                                 ?>
                                                
                                                
                                            </div>

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
                                                <div style="margin-left: 320px;display: inline;">
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
                                             


                                            <table border="1" class="table text-center" style="">
                                                <tr>
                                                    <td style="background-color: #346E99;color: #fff;">SL No</td>
                                                    <td style="background-color: #346E99;color: #fff;">Store Date</td>
                                                    <td style="background-color: #346E99;color: #fff;">Drug Name</td>
                                                    <td style="background-color: #346E99;color: #fff;">Quantity</td>
                                                    <td style="background-color: #346E99;color: #fff;">Drug Units</td>
                                                    <td style="background-color: #346E99;color: #fff;">Buying Price</td>
                                                    <td style="background-color: #346E99;color: #fff;">Sell Price</td>
                                                    <td style="background-color: #346E99;color: #fff;">Month</td>
                                                    <td style="background-color: #346E99;color: #fff;">Year</td>
                                                    <td style="background-color: #346E99;color: #fff;">Action</td>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    include '../connection/db.php';
                                                    date_default_timezone_set("Asia/Dhaka");
                                                    $month = date('F');
                                                    $year = date('Y');
                                                    $sl=0;
                                                    $select = "SELECT * FROM `add_drug_store` WHERE current_month = '$month' and year = '$year' order by id Desc";
                                                    $execute_sql = $conn->query($select);
                                                    while ($row = $execute_sql->fetch_assoc()) {
                                                        $sl++;
                                                        ?>

                                                    <tr>
                                                        <td><?php echo $sl; ?></td>
                                                        <td><?php echo $row['date']; ?></td>
                                                        <td><?php echo $row['drug_name']; ?></td>
                                                        <td><?php echo $row['quantity']; ?></td>
                                                        <td><?php echo $row['drug_units']; ?></td>
                                                        <td><?php echo $row['buy_price']; ?></td>
                                                        <td><?php echo $row['sell_price']; ?></td>
                                                        <td><?php echo $row['current_month']; ?></td>
                                                        <td><?php echo $row['year'];?></td>
                                                        
                                                        <td>
                                                            <a href="edit_drug_store.php?id=<?php echo $row['id']; ?>"><img src="../images/edit2.png" width="30" height="30" title="Edit" alt="Edit" style="padding: 2px;"></a> 
                                                            <a href="delete_drug_store.php?id=<?php echo $row['id']; ?>"><img src="../images/delete2.png" width="30" height="30" title="Delete" alt="Delete" style="padding: 2px;"></a> 
                                                        </td>
                                                    </tr>

                                                <?php } ?>
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
