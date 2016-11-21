<?php
include '../connection/db.php';
$drug_unit = $_POST['data'];
//echo $test_name;

$select_price = "SELECT * FROM `add_drug_store` WHERE drug_units = '$drug_unit'";
$execute_price = $conn->query($select_price);
while ($row_price = $execute_price->fetch_assoc()) {
    $price = $row_price['price'];
}
//echo $price;
?>
<input type="text" name="drug_price" readonly="true" value="<?php echo $price; ?>">