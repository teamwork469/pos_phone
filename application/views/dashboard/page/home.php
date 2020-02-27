<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
  .content-header h1 {
    font-size: 20PX;
    margin: 0;
}
.fa-edit:before, .fa-pencil-square-o:before {
    content: "\f044";
    font-size: 25px;
    color:#007bff;
}
.fa-trash-o:before {
    content: "\f014";
    font-size: 25px;
    color: #dc3545;
    position: relative;
    top: -3px;
}
.fa-circle:before {
    content: "\f111";
    color: #28a745;
}
  </style>
</head>
<body>
<script>
   $(document).ready(function(){
      function load_add_phone(){
          location.href='<?=site_url('Page/load_add_phone')?>';
      }
      $('#phone_new').on('click',function(e){
        e.preventDefault();
        load_add_phone();
      });
   });
</script>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"> LIST PHONE</h3>
        <div class="card-tools">
          <!-- Buttons, labels, and many other things can be placed here! -->
          <!-- Here is a label for example -->
          <button  name='phone_reset_all' id='phone_reset_all' class="btn btn-danger"><i class="fa fa-window-restore" aria-hidden="true"></i> Reset All</button>
          <button  name='phone_reset_option' id='phone_reset_option' class="btn btn-danger"><i class="fa fa-window-restore" aria-hidden="true"></i> Reset Option</button>
          <button  name='phone_new' id='phone_new'  class="btn btn-dark"><i class="fa fa-plus-circle" aria-hidden="true"></i> New</button>
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body">
              <table id="table_id" class="display">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>NO</th>
                      <th>PHONE NUMBER</th>
                      <th>STATUS</th>
                      <th>ACTION</th>
                  </tr>
              </thead>
              <tbody>
              </tbody>
          </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
      <span>Phone number for random</span>
      </div>
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->
</body>
<script> 

$(document).ready(function() { 
  $('#table_id').DataTable( 
      { "ajax": { "url": "<?=site_url('Randomphone/list_phone')?>", "dataSrc": "" },
        "columns": [ 
              { "data": "mobile_id" },
              { "data": "mobile_id" },
              { "data": "mobile_name"},
              { "data": "status",render: function (data,type,row ) {
                  if(data ==1){
                      return '<i class="fa fa-circle" aria-hidden="true"></i> Active';
                  }
               }},
              { "data": "mobile_id",render: function ( data, type, row ) {
                    return '<a href="#" onclick=edit('+data+')><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp'+
                    '<a href="#" onclick=del('+data+')><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
            }},
              
            ],
  columnDefs: [
          {
              targets:-1,
              className: 'dt-right'
          }
        ]
        }); 

     }); 
     function edit(id){
        location.href = '<?=site_url('Page/load_edit_phone')?>'+'/'+id;
  }
  function del(id){
    if (confirm("Do you want to close System?")) {
            $.ajax({
              url: "<?=site_url('Randomphone/del_phone')?>",
              type: 'POST',
              data:{id:id},
              dataType: 'json', // added data type
              success: function(res) {
                if(res=='done'){
                    location.reload();
                }
              }
          });
        }
  }
  $('#phone_reset_all').on('click',function(e){
    if(confirm('Do you want to reset all?')){
        e.preventDefault();
        $.ajax({
            type:"post",
            url: "<?=site_url('Randomphone/reset_all')?>",
            success: function(res){
                window.location.reload();
            }
      });
    }
  });
  $('#phone_reset_option').on('click',function(e){
    if(confirm('Do you want to reset option')){
        e.preventDefault();
        $.ajax({
            type:"post",
            url: "<?=site_url('Randomphone/reset_selection')?>",
            success: function(res){
                window.location.reload();
            }
      });
    }
  });
     </script>
</html>