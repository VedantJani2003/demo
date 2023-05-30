<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Managment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>

<div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="bg-dark text-white p-3"> Hotel Managment </h3>
      </div>
      <div class="col-md-12  p-3">
        <h3>Check Your Available room </h3>
        <hr>
        <!-- 1. Hotel Block -->
        <div class="form-group mt-3">
          <label for="" class="pb-2">Hotel Block</label>
          <select name="block" id="block" class="form-control ">
            <option value="">Select Hotel Block</option>
            <?php if(!empty($blocks)){
              foreach($blocks as $block){
                ?>
      
                <option value="<?php echo $block['id'];?>"><?php echo $block['BlockName'];?></option>

                  <?php
                }
              }?>
          </select>          
        </div>
         <!-- 2. Hotel Block Floor-->
         <div class="form-group mt-3">
          <label for="" class="pb-2">Hotel Block Floor</label>
          <div id="floorbox">
          <select name="Floor" id="Floor" class="form-control ">
            <option value="">Select Hotel Block Floor </option>
          </select>  
          </div>        
        </div>
         <!-- 1. Hotel Block Floor Room -->
         <div class="form-group mt-3">
          <label for="" class="pb-2">Hotel Block Floor Room</label>
          <div id="roombox">
          <select name="Room" id="Room" class="form-control ">
            <option value="">Select Hotel Block Floor Room</option>
          </select>   
          </div>       
        </div>
         <!-- 1. Hotel Block Floor Room Bed-->
          <!-- <div class="form-group mt-3">
            <label for="" class="pb-2">Hotel Block Floor Room Bed</label>
            <select name="Bed" id="Bed" class="form-control ">
              <option value="">Select Hotel Block Floor Room Bed</option>
            </select>          
          </div> -->

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
        <a href="#" class="btn btn-secondary mt-3">Back</a>
      </div>
    </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

              <script>
                $('document').ready(function(){
                  $('#block').change(function(){
                    var block_id = $(this).val(); //Selected Block Id
                    $.ajax({
                      url : '<?php echo base_url('Hotel_Controller/getFloor');?>',
                      type : 'POST',
                      data : { block_id:block_id },
                      dataType: 'json',
                      success : function(response){ //changed Success to success
                         if(response['floors']){
                            $('#floorbox').html(response['floors']);
                          }
                        },
                    });
                    if(block_id == ""){
                      $('#roombox').html("<select name=\"Room\" id=\"Room\" class=\"form-control\">\
            <option value=\"\">Select Hotel Block Floor Room</option>\
          </select>")
                    }
                  });

                  // $('#floor').change(function(){
                    
                  // });
                  $(document).on("change","#Floor",function(){
                    var floor_id = $(this).val();
                    $.ajax({
                      url : '<?php echo base_url('Hotel_Controller/getRoom');?>',
                      type : 'POST',
                      data : { floor_id:floor_id },
                      dataType: 'json',
                      success : function(response){ //changed Success to success
                         if(response['rooms']){
                            $('#roombox').html(response['rooms']);
                          }
                        },
                    });
                  });
                });

              </script>

  </body>
</html>