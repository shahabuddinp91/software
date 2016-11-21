<form action="" method="POST" style="font-size: 15px; padding-top: 5px; padding-bottom: 5px;">
    <table border="0" >
        <tr>
            <td>Search</td>
            <td>:</td>
            <td><input type="date"  name="selldate" id="selldate"  class="form-control datepicker" placeholder="Search By Sell Date" required></td>
            <td><input type="submit" name="search" value="Search" class="form-control btn-success" style="margin-left: 2px;"></td>
        </tr>
    </table>
</form>
</div>

<table border="1" class="table text-center" style="margin-top: 10px;">
    <?php
    include '../connection/db.php';
    if (isset($_POST['search'])) {
        $searching_date = $_POST['selldate'];

        $select_query = "SELECT * FROM `patient_entry_form` WHERE reg_date='$searching_date'";
//                                                    echo $select_query;
//                                                    die();
        $execute_sql = $conn->query($select_query);
        $sell_date_count = mysqli_num_rows($execute_sql);

        $select_query = "SELECT * FROM `patient_entry_form` WHERE id='$searching_date'";
        $sele = $conn->query($select_query);
        $count = mysqli_num_rows($sele);

        if ($sell_date_count == 0 || $count == 0) {
            ?>
            <h2 align="center" style="color: red; font-style: italic;"><?php echo'Data Not Found !'; ?></h2>
            <?php
        }
    }
    ?>
    <?php if ($sell_date_count > 0) { ?>
        <tr>
            <td style="background-color: #346E99;color: #fff;">SL No</td>
            <td style="background-color: #346E99;color: #fff;">Registration ID</td>
            <td style="background-color: #346E99;color: #fff;">Patient Name</td>
            <td style="background-color: #346E99;color: #fff;">Guardian Name</td>
            <td style="background-color: #346E99;color: #fff;">Contact</td>
            <td style="background-color: #346E99;color: #fff;">Medical Problem</td>
            <td style="background-color: #346E99;color: #fff;">Doctor Name</td>
            <td style="background-color: #346E99;color: #fff;">Registration Date</td>
            <td style="background-color: #346E99;color: #fff;">Action</td>
        </tr>

        <?php
        $sl = 0;
        while ($row = $execute_sql->fetch_assoc()) {
            $sl++;
            ?>
            <tr>
                <td><?php echo $sl; ?></td>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['patient_name']; ?></td>
                <td><?php echo $row['guardian_name']; ?></td>
                <td><?php echo $row['mobile']; ?></td>
                <td><?php echo $row['medical_problem']; ?></td>
                <td><?php echo $row['doctor_name']; ?></td>
                <td><?php echo $row['reg_date']; ?></td>
                <td>
                    <a href="edit_patient_entry_list_form.php?id=<?php echo $row['id']; ?>"><img src="../images/edit2.png" title="Edit" height="32" width="32" alt="Edit"></a> | 
                    <a href="delete_patient_entry.php?id=<?php echo $row['id']; ?>"><img src="../images/delete2.png" title="Delete" height="28" width="28" alt="Delete"></a>
                </td>
            </tr>
            <?php
        }
        ?>
    <?php } ?>

    <?php
    if ($count > 0) {
        echo 'this is patient id';
    }
    ?>
</table>
<p style=" background: #0099cc none repeat scroll 0 0;border: 1px solid;color: #fff;font-family: caption; font-size: 15px;height: 26px;text-align: center;width: 100%;">
    <?php echo $patient_message; ?>
</p>
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
</body>

</html>