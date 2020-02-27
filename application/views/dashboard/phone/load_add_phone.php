<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<script>
   $(document).ready(function(){

      $('#phone_back').on('click',function(e){
        e.preventDefault();
        goBack();
      });
      $('#add_phone_cancel').on('click',function(e){
        e.preventDefault();
        goBack();
      });
   });
</script>
<body>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">ADD PHONE</h3>
        <div class="card-tools">
          <!-- Buttons, labels, and many other things can be placed here! -->
          <!-- Here is a label for example -->
          <a  name='phone_back' id='phone_back'><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body">
          <form id="frm_add_phone">
            <div class="row">
              <div class="col-xs-6 col-md-6">
                <div class="form-group">
                   <input require id="phone_number" name="phone_number" type="number" placeholder="Enter Phone" class="form-control">
                </div>
                <div class="form-group">
                   <button type="submit" class="btn btn-dark"><i class="fa fa-volume-control-phone" aria-hidden="true"></i> Add Phone</button>
                   <button id="add_phone_cancel" name="add_phone_cancel" class="btn btn-danger"> Cancel</button>
                </div>
              </div>
            </div>
          </form> 
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
      <span>Phone number for random.</span>
      </div>
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->
    <script>
      $(document).ready(function(){
        $('#frm_add_phone').on('submit',function(e){
            e.preventDefault();
            $.ajax({
              url: "<?=site_url('Randomphone/insert_select_phone')?>",
              type: 'POST',
              data:$(this).serialize(),
              dataType: 'json', // added data type
              success: function(res) {
                  alert("Phone number is inserted.");
                  $("#phone_number").val("");
              }
          });
        });
      });
    </script>
</body>
</html>