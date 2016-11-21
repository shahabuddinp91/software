<?php
include '../connection/db.php';
$search = $_POST['search_id'];
//echo $search;
$query = "select patient_entry_form.patient_name,"
        . "patient_entry_form.id,"
        . "patient_entry_form.mobile,"
        . "patient_entry_form.age, "
        . "patient_entry_form.visit_amount,"
        . "patient_entry_form.doctor_name,"
        . "patient_entry_form.visit_amount, "
        . "storeallbill.visit_amount,"
        . "storeallbill.pharmacy_bill,"
        . "storeallbill.diagonostic_bill,"
        . "storeallbill.admission_bill,"
        . "storeallbill.sub_total,"
        . "storeallbill.vat, "
        . "storeallbill.total_bill,"
        . "storeallbill.payment_bill "
        . "from patient_entry_form "
        . "inner join storeallbill "
        . "on patient_entry_form.id=storeallbill.reg_id"
        . " where mobile like '%$search%'";
//$query = "select * from table1 where name like '%$search%'";
//echo $query;
//die();
$execute_sql = $conn->query($query);
//echo $execute_sql;
$count_sql = $execute_sql->num_rows;
//echo $count_sql;
?>
<table class="table text-center table-striped">
    <tr>
        <td style="background-color: #346E99;color: #fff;">SL No</td>
        <td style="background-color: #346E99;color: #fff;">Reg No</td>
        <td style="background-color: #346E99;color: #fff;">Patient Name</td>
        <!--<td style="background-color: #346E99;color: #fff;">Guardian Name</td>-->
        <td style="background-color: #346E99;color: #fff;">Mobile No</td>
        <!--<td style="background-color: #346E99;color: #fff;">Address</td>-->
        <td style="background-color: #346E99;color: #fff;">Age</td>
        <!--<td style="background-color: #346E99;color: #fff;">Gender</td>-->
        <!--<td style="background-color: #346E99;color: #fff;">Doctor Name</td>-->
        <td style="background-color: #346E99;color: #fff;">Visited Amount</td>
        <td style="background-color: #346E99;color: #fff;">Pharmacy Bill</td>
        <td style="background-color: #346E99;color: #fff;">Diagonostic Bill</td>
        <td style="background-color: #346E99;color: #fff;">Admission Bill</td>
        <td style="background-color: #346E99;color: #fff;">Sub Total Bill</td>
        <td style="background-color: #346E99;color: #fff;">Vat</td>
        <td style="background-color: #346E99;color: #fff;">Total Bill</td>
        <td style="background-color: #346E99;color: #fff;">Payment Bill</td>

        <td style="background-color: #346E99;color: #fff;">Action</td>
    </tr>
    <?php
    if ($count_sql > 0) {
        $sl = 0;
        while ($row = $execute_sql->fetch_assoc()) {
//             print_r ($row);
//            echo $row['name'];
            $sl++;
            ?>
            <tr>
                <td><?php echo $sl; ?></td>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['patient_name']; ?></td>
                <td><?php echo $row['mobile']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['visit_amount']; ?></td>
                <td><?php echo $row['pharmacy_bill']; ?></td>
                <td><?php echo $row['diagonostic_bill']; ?></td>
                <td><?php echo $row['admission_bill']; ?></td>
                <td><?php echo $row['sub_total']; ?></td>
                <td><?php echo $row['vat']; ?></td>
                <td><?php echo $row['total_bill']; ?></td>
                <td><?php echo $row['payment_bill']; ?></td>                                            

                <td>
                    <a href="single_view_report.php?id=<?php echo $row['id']; ?>"><img src="../images/view.png" width="30" height="30" title="View" alt="View" style="padding: 2px;"></a> 
                </td>
            </tr>
            <?php
        }
//       
    } else {
        echo "Data Not Found !";
    }
    ?>
</table>