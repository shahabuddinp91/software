<?php
    $Total = $_POST['total'];
    $pay = $_POST['pay'];
    $due = $_POST['due'];
    $id = $_POST['id'];
    
    include '../../connection/db.php';
    $select_sql = "SELECT * FROM `dreasing_bill` WHERE patient_id = '$id'";
    $execute_sql = $conn->query($select_sql);
    while ($row = $execute_sql->fetch_assoc()){
        $payment = $row['payment'];
    }
    //echo $Total.' '.$pay.' '.$due.' '.$id;
    $total_pay = $pay+$payment;
    $dd = $Total-$total_pay;
?>
<?php
    if($Total<$total_pay){ ?>
        <input  id="due_bill" type="text" name="due" class="form-control" value="<?php echo 'Payment is more';?> " readonly style="margin-bottom: 8px; color: red;">
<?php    }  else { ?>
        
    <input id="due_bill" type="text" name="due" class="form-control" value="<?php echo $dd;?> " readonly style="margin-bottom: 10px;">
<?php }
?>

    
    
