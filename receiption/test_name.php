<?php
    $tast_category = $_POST['data'];
    //echo $tast_category;
    include '../connection/db.php';
    
    $select_sql = "SELECT * FROM `add_test_info` WHERE test_category = '$tast_category'";
    $execute_sql = $conn->query($select_sql);
    
?>

    <!--<label class="control-label col-sm-4" for="test_name">Test Name:</label>-->
        <div class="col-sm-8">
            <select name="test_name" id="test_name" class="col-md-6 form-control">
                <option value="0">Select One</option>
                <?php
                while ($row = $execute_sql->fetch_assoc()) { ?>
                
                <option class="tsetname" value="<?php echo $row['test_name'];?>"><?php echo $row['test_name'];?></option>
                <?php } ?>
            </select>
        </div>
    
    
    
    <script>
        $(document).ready(function () {
            $('#test_name').change(function(e) {
                e.preventDefault();
                var data = $(this).val();
                $.ajax({
                    method: 'POST',
                    url: 'test_price.php',
                    data: {data:data}
                })
                .done(function (m) {
                    $('#price').html(m);
                    })
                })
            })
    </script>
