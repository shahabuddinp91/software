<?php
    $test_name = $_POST['data'];
    //echo $test_name;
    include '../connection/db.php';
    $select_price = "SELECT * FROM `add_test_info` WHERE test_name = '$test_name'";
    $execute_price = $conn->query($select_price);
    while ( $row_price = $execute_price->fetch_assoc()){
        $price = $row_price['price'];
    }
    //echo $price;
    
    ?>
<input type="text" name="test_price" readonly="true" value="<?php echo $price;?>">