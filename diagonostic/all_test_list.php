<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['dianostic_id'])) {
    header("location:../log_form.php");
}
include '../connection/link.php';
include '../connection/db.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UPASHAM HOSPITAL</title>
        <link rel="stylesheet" href="../css/responsive.css">
        <!--<link rel="stylesheet" href="../css/style.css">-->
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
    <body style="font-family: caption">
        <div class="wapper">
            <div class="dashbord_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="dashboard_text text-center">
                                <img src="../images/baner.png" alt="UPASHAM HOSPITAL" title="UPASHAM HOSPITAL" height="100">
                                <br>
                                Dashboard Reception Desk (Hospital)
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
                                <?php include './letf_side_diagonostic.php'; ?>
                            </div>
                        </div>
                        <div class="right_content_area">
                            <div class="drugstore_form">
                                <div class="container">
                                    <div class="col-md-offset-1 col-md-8">
                                        <br>
                                        <div class="" style="
                                                 color: #000;
                                                 font-family: caption;
                                                 font-size: 20px;
                                                 margin-left: 10px;
                                                 opacity: 0.6;
                                                 padding-bottom: 6px;">
                                                 <?php
                                                 // echo 'All Drug Store ' . $today
                                                 echo 'All Test List';
//                                                 echo $delete_message;
                                                 $select_category = "SELECT * FROM `add_test_info`";
                                                        $execute_category = $conn->query($select_category);
                                                 ?>
                                            </div>
                                        <form action="output_search_by_test_name.php" method="post" style="font-size: 15px; margin-bottom: 10px;">
                                            <table>
                                                <tr>
                                                    <td><input type="text" name="test_name" id="test_name" class="form-control" placeholder="Write Test Name !" style="border: 1px solid #ccc;
    border-radius: 5%;color: #4585f3;font-family: caption;font-size: 15px;height: 34px;width: 170px;"</td>
<!--                                                    <td><select name="test_category" style="border: 1px solid #ccc;
    border-radius: 5%;color: #4585f3;font-family: caption;font-size: 15px;height: 34px;width: 170px;">
                                                            <option>Select test category</option>
                                                    <?php
                                                        
                                                        while ($row_category = $execute_category->fetch_assoc()){
                                                            $category = $row_category['test_category'];
                                                            
                                                    ?>
                                                            <option value="<?php //echo $category;?>"><?php echo $category;?></option>
                                                        <?php } ?>
                                                </select></td>-->
                                                    <td><input type="submit" name="search" value="Search" class="form-control btn-success" style="margin-left: 2px;"></td>
                                                </tr>
                                            </table>
                                        </form>

                                        <table border="1" class="table text-center" style="display: inline-block; margin-left: 10px; width: 566px;">
                                            
                                            <tr>
                                                <td style="background-color: #346E99;color: #fff; padding: 20px 40px 20px 20px;">Sl No</td>
                                                <td style="background-color: #346E99;color: #fff; padding: 20px 40px 20px 20px;">Test Category</td>
                                                <td style="background-color: #346E99;color: #fff; padding: 20px 40px 20px 20px;">Test Name</td>
                                                <td style="background-color: #346E99;color: #fff; padding: 20px 40px 20px 20px;">Price</td>
                                                <td style="background-color: #346E99;color: #fff; padding: 20px 40px 20px 20px;">Action</td>
                                                
                                            </tr>
                                            
                                            <?php
                                            $sl=0;
                                            include '../connection/db.php';
                                            $select = 'SELECT * FROM `add_test_info` order by id desc';
                                            $execute_sql = $conn->query($select);
                                            while ($row = $execute_sql->fetch_assoc()) {
                                                $sl++;
                                                ?>

                                                <tr>
                                                    <td><?php echo $sl; ?></td>
                                                    <td><?php echo $row['test_category']; ?></td>
                                                    <td><?php echo $row['test_name']; ?></td>
                                                    <td><?php echo $row['price']; ?></td>
                                                    <td>
                                                        <a href="edit_test_store.php?id=<?php echo $row['id']; ?>"><img src="../images/edit2.png" width="30" height="30" title="Edit" alt="Edit" style="padding: 2px;"></a> 
                                                        <a href="delete_test_store.php?id=<?php echo $row['id']; ?>"><img src="../images/delete2.png" width="30" height="30" title="Delete" alt="Delete" style="padding: 2px;"></a>
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
                $('.submit').on('click', function (e) {
                    e.preventDefault();
                    var data = $('.teststore_form').serialize();
                    $.ajax({
                        method: 'POST',
                        url: 'insert/test_insert.php',
                        data: data
                    })
                            .done(function (m) {
                                alert(m)
                                $('.clear').trigger('click')
                            })
                })
            })
        </script>
    </body>

</html>
