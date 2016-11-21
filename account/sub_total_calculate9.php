<?php
$mass = '';
$canula_price = '';
    $Baby_management_price = $_POST['Baby_management_price'];
           $check = $_POST['check'];
    $Post_operative_charge = $_POST['Post_operative_charge'];
    $Endotracheal_tube_price = $_POST['Endotracheal_tube_price'];
    $gas_price = $_POST['gas_price'];
    $Anaesthetic_Equipment_price = $_POST['Anaesthetic_Equipment_price'];
    $OT_Laber_room_charge = $_POST['OT_Laber_room_charge'];
    $Sucction_price = $_POST['Sucction_price'];
    $Rylestube_price = $_POST['Rylestube_price'];
    $Pho_price = $_POST['Pho_price'];
    $sub_total = $_POST['sub_total'];
    $canula_price = $_POST['canula_price'];
    //echo $sub_total.' '.$canula_price.' '.$Pho_price;
    
    if(!$check){
        $mass = 'Search BY an ID .';
    }  else {
       $sub_total =  ($Baby_management_price+$Post_operative_charge+$Endotracheal_tube_price+$gas_price+$Anaesthetic_Equipment_price+$OT_Laber_room_charge+$Sucction_price+$Rylestube_price+$check+$canula_price+$Pho_price);
    }
    //echo $sub_total;
    ?>
<input style="color: red;text-align: center;" type="text" class="form-control" value="<?php echo $sub_total.$mass;?>" id="sub_ttl_bill" name="sub_ttl_bill" readonly="true">
    