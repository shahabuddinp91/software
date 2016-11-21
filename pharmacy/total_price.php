<?php
    $quentity = $_POST['unit'];
    $Units = $_POST['Units'];
    //$price = $_POST['price'];
    $name = $_POST['name'];
    //$total_q = $_POST['total_q'];
    //echo $quentity.$price.$total_q;
    include '../connection/db.php';
    $select_dreg = "SELECT * FROM `add_drug_store` WHERE drug_name = '$name' and drug_units = '$Units'";
    $execute_sql = $conn->query($select_dreg);
    $drug_count = mysqli_num_rows($execute_sql);

    if($drug_count > 0){
    while ($row = $execute_sql->fetch_assoc()){
        $price = $row['sell_price'];
        $total_quentity = $row['quantity'];
    }

    if($quentity > $total_quentity){ ?>
<h2 style=" color: red;
    font-family: caption;
    font-size: 18px;
    text-align: center;"><?php echo 'Total store is '.$total_quentity;?></h2>
    <?php } 
 else { ?>
        <div class="form-group replace">
            <label class="control-label col-sm-4" for="Price">Price:</label>
            <div class="col-sm-8">
                <input type="text" value="<?php echo $quentity*$price;?>" class="form-control" id="Price" name="Price" readonly="true" >
            </div>
            </div>
 <?php }
    }
    ?>
