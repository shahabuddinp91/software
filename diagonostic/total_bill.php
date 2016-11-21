<?php
    $room_bill = $_POST['room_bill'];
    $other_bill = $_POST['other_bill'];
    $nursing_bill = $_POST['bill'];
    $vat = $_POST['vat'];
    //echo $room_bill.' '.$nursing_bill.' '.$other_bill.' '.$vat;
    
    $total_sum = $room_bill+$nursing_bill+$other_bill;
    //echo $total_sum;
    $total_with_vat = ($total_sum*$vat)/100;
    
    $intotal = $total_sum+$total_with_vat;
    
    $dis = array();
    $dis['ok'] = $intotal;
    
    echo json_encode($dis);