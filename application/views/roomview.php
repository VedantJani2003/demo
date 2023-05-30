<select name="Room" id="Room" class="form-control ">
            <option value="">Select Hotel Block Floor </option>
            <?php if(!empty($rooms)){
                foreach($rooms as $room){
                    ?>
                <option value="<?php echo $room['id'];?>"><?php echo $room['RoomNumber'];?></option>
            <?php
                }}?>
</select>  