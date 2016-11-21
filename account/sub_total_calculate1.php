<?php
$mass = '';
$canula_price = '';
    $check = $_POST['check'];
    $Pho_price = $_POST['Pho_price'];
    $sub_total = $_POST['sub_total'];
    $canula_price = $_POST['canula_price'];
    //echo $sub_total.' '.$canula_price.' '.$Pho_price;
    
    if(!$check){
        $mass = 'Search BY an ID .';
    }  else {
       $sub_total = ($check+$canula_price+$Pho_price);
    }
    //echo $sub_total;
    ?>
<input style="color: red;text-align: center;" type="text" class="form-control" value="<?php echo $sub_total.$mass;?>" id="sub_ttl_bill" name="sub_ttl_bill" readonly="true">
    