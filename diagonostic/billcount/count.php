<?php
    $dr_amount = $_POST['dr_amount'];
    $Obsarvation = $_POST['Obsarvation'];
    $Dressing = $_POST['Dressing'];
    $otcharge = $_POST['otcharge'];
    $Nabulizer = $_POST['Nabulizer'];
    $blood = $_POST['blood'];
    $ooo = $_POST['ooo'];
    //echo $dr_amount.' '.$Obsarvation.' '.$Dressing.' '.$otcharge.' '.$Nabulizer.' '.$blood.' '.$ooo;
?>
<input style="color: red;" value="<?php echo $ooo+$blood+$Nabulizer+$otcharge+$Dressing+$dr_amount+$Obsarvation;?>" type="text" class="form-control"  id="Total"  name="Total"  readonly>