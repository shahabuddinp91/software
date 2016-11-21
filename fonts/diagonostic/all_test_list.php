<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['dianostic_id'])) {
    header("location:../log_form.php");
}
include '../connection/link.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UPASHOM HOSPITAL</title>
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
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="dashboard_text text-center">
                                <?php echo $title2 ?>
                                <?php echo "<br>" ?>
                                <?php echo $title4 ?>
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
                                                 ?>
                                            </div>
                                        <form action="output_search_by_test_name.php" method="post" style="font-size: 15px; margin-bottom: 10px;">
                                            <table>
                                                <tr>
                                                    <td><input type="text" name="test_name" id="test_name" class="form-control" placeholder="Write Test Name !" required</td>
                                                    <td><input type="submit" name="search" value="Search"></td>
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
                                                        <a href="edit_test_store.php?id=<?php echo $row['id']; ?>">Edit</a> |
                                                        <a href="delete_test_store.php?id=<?php echo $row['id']; ?>">Delete</a> 
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
