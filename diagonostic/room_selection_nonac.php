<?php
include '../connection/db.php';
    //$room_type = 'ac';
    //echo $room_type;
    $value = $_POST['value'];
    //echo $value;
    
    $select_sql = "SELECT * FROM `room_info` WHERE room_type = '$value' and status = '1'";
    $execute_sql = $conn->query($select_sql);
    $count = mysqli_num_rows($execute_sql);
    
    if($count > 0){ 
        while ($row = $execute_sql->fetch_assoc()){ ?>
<option><?php echo $row['cabin_no'];?></option>
        <?php } ?>
   <?php     }  else { ?>
<option>All room of NON-AC are book now !</option>
        <?php    }  ?>