<?php
$other_bill = $_POST['other_bill'];
$room_bill = $_POST['room_bill'];
$nursing_bill = $_POST['bill'];
//echo $other_bill.' '.$room_bill.' '.$nursing_bill;

$sub_total = $other_bill+$room_bill+$nursing_bill;

$display = array();
$display['ok'] = $sub_total;

echo json_encode($display);