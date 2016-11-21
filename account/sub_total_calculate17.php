<?php
$mass = '';
$canula_price = '';
$check = $_POST['check'];
    $c = $_POST['c'];
    $b = $_POST['b'];
    $a = $_POST['a'];
    $other_price = $_POST['other_price'];
    $Enema_Simplex_price = $_POST['Enema_Simplex_price'];
    $Consultation_fees_price = $_POST['Consultation_fees_price'];
    $o2_gas_price = $_POST['o2_gas_price'];
    $Baby_management_price = $_POST['Baby_management_price'];
    $Dressing_fees_charge = $_POST['Dressing_fees_charge'] ;      
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
       $sub_total =  ($c+$b+$a+$other_price+$Enema_Simplex_price+$Consultation_fees_price+$o2_gas_price+$Dressing_fees_charge+$Baby_management_price+$Post_operative_charge+$Endotracheal_tube_price+$gas_price+$Anaesthetic_Equipment_price+$OT_Laber_room_charge+$Sucction_price+$Rylestube_price+$check+$canula_price+$Pho_price);
    }
    //echo $sub_total;
    ?>
<input style="color: red;text-align: center;" type="text" class="form-control" value="<?php echo $sub_total.$mass;?>" id="sub_ttl_bill" name="sub_ttl_bill" readonly="true">
    