<?php
$nursing_bill = $_POST['bill'];
$room_bill = $_POST['room_bill'];
//echo $nursing_bill.' '.$room_bill;
$sub_total = $nursing_bill+$room_bill;
$bill = array();
$bill['subtotal'] = $sub_total;
echo json_encode($bill);
