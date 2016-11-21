<?php
$name = $_POST['name'];
$unit = $_POST['unit'];
//echo $name.$unit;
include '../connection/db.php';

$select_dreg = "SELECT * FROM `add_drug_store` WHERE drug_name = '$name' and drug_units = '$unit'";
$execute_sql = $conn->query($select_dreg);
$drug_count = mysqli_num_rows($execute_sql);

if($drug_count > 0){
while ($row = $execute_sql->fetch_assoc()){
    $sell_price = $row['sell_price'];
    $quentity = $row['quantity'];
}?>
<div class="form-group replace">
    <label class="control-label col-sm-4" for="sellrice">Price(Per piece):</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" id="Price" value="<?php echo $sell_price;?>" name="Price" readonly="true">
        
    </div>
</div>

<div class="form-group replace">
    <label class="control-label col-sm-4" for="Price">Total quentity:</label>
    <div class="col-sm-8">
        
        <input type="text" class="form-control" id="total_quantity" value="<?php echo $quentity;?>" readonly="true">
    </div>
</div>
<?php }
 else {
     ?>
<h2 style="color: red;
    font-family: caption;
    font-size: 22px;
    margin-bottom: 0;
    margin-top: 0;
    text-align: center;"><?php echo 'Drug not found !'?></h2>
<?php }
?>