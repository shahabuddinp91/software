<?php
$mass = '';
    $check = $_POST['check'];
    $sub_total = $_POST['sub_total'];
    $canula_price = $_POST['canula_price'];
    //echo $sub_total.' '.$canula_price;
    
    if(!$check){
        $mass = 'Search BY an ID .';
    }  else {
       $sub_total =  ($check+$canula_price);
    }
    //echo $sub_total;
    ?>
<!--<p id="raju" value="<?php //echo $sub_total;?>"><?php //echo $mass.$sub_total;?></p>-->
<input style="color: red;text-align: center;" type="text" class="form-control" value="<?php echo $sub_total.$mass;?>" id="sub_ttl_bill" name="sub_ttl_bill" readonly="true">