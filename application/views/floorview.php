<select name="Floor" id="Floor" class="form-control ">
            <option value="">Select Hotel Block Floor </option>
            <?php if(!empty($floors)){
                foreach($floors as $floor){
                    ?>
                <option value="<?php echo $floor['id'];?>"><?php echo $floor['FloorNumber'];?></option>
            <?php
                }}?>
</select>  