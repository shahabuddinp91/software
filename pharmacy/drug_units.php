<?php
$drugName = $_POST['data'];
//    echo $drugName;
//    die();
include '../connection/db.php';

$select_sql = "SELECT * FROM `add_drug_store` WHERE drug_name = '$drugName'";
$execute_sql = $conn->query($select_sql);
?>

<label class="control-label col-sm-4" for="drug_unit">Test Name:</label>
<div class="col-sm-8">
    <select name="drug_unit" id="drug_unit" class="col-md-6 form-control">
        <option value="0">Select One</option>
        <?php while ($row = $execute_sql->fetch_assoc()) { ?>

            <option class="tsetname" value="<?php echo $row['drug_units']; ?>"><?php echo $row['drug_units']; ?></option>
<?php } ?>
    </select>
</div>



<script>
    $(document).ready(function () {
        $('#drug_unit').change(function (e) {
            e.preventDefault();
            var data = $(this).val();
            $.ajax({
                method: 'POST',
                url: 'drug_price_sell.php',
                data: {data: data}
            })
                    .done(function (m) {
                        $('#price').html(m);
                    })
        })
    })
</script>
