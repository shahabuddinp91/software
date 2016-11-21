<?php
    $vat = $_POST['vat'];
    $sub_total = $_POST['sub_total'];
    //echo $vat.$sub_total;
    $total = ($vat*$sub_total)/100;
    $final = $total+$sub_total;
    ?>
<div id="final" class="form-group">
                                                    <label class="control-label col-sm-4" for="total"> Total Bill:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" readonly="true" class="form-control" value="<?php echo $final;?>" id="TotalBill" name="TotalBill" placeholder="Total Bill">
                                                    </div>
                                                </div>