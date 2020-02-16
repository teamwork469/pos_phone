<!DOCTYPE html>
<html lang="en">
<head>
  <title>Random</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?=base_url('')?>dist/css/font-awesome.min.css">

  <style type="text/css">
    #txt_insert_phone{
      font-family: khmer moul;
    text-align: center;
    font-weight: bold;
    font-size: 18px;
    width: 550px;
    margin-left: 276px;
    margin-right: 500px;
    top: 20px;
    position: relative;
    width: 229px;
    }
    #show{
      font-size: 25px;
      text-align: center;
      position: relative;
      width: 550px;
      top: 30px;
      margin-left: 274px;
      margin-right: 500px;
      height: 100px;
      box-shadow: 0px 0px 10px black;
    }
    #btn_start{
      font-family: khmer moul;
      position: relative;
      top: 200px;
      left: 389px;
      
    }
    #btn_stop{
      font-family: khmer moul;
      position: relative;
      top: 200px;
      left: 400px;
    }
    #btn_reset{
      font-family: khmer moul;
      position: relative;
      top: 200px;
      left: 411px;
    }
    #phone{
      font-size: 60px;
    position: absolute;
    top: 111px;
    z-index: 1;
    left: 407px;
    font-weight: bold;
      
    }
    #title{
      text-align: center;
    font-size: 40px;
    font-family: "Khmer Mool";
    color: yellow;
    position: relative;
    top: 20px;
    text-shadow: 0px 0px 5px black;
    }
    #win1{
    position: absolute;
    top: 269px;
    width: 180px;
    text-align: center;
    font-weight: bold;
  
    }
    #win2{
    position: absolute;
    top: 269px;
    width: 180px;
    text-align: center;
    font-weight: bold;
    left:-60px;
  
    }
    #win3{
    position: absolute;
    top: 269px;
    width: 180px;
    text-align: center;
    font-weight: bold;
    left:172px;
  
    }
    #win4{
    position: absolute;
    top: 269px;
    width: 180px;
    text-align: center;
    font-weight: bold;
    left:393px;
  
    }
    #win5{
    position: absolute;
    top: 269px;
    width: 180px;
    text-align: center;
    font-weight: bold;
    left:609px;
    }
  </style>

</head>
<body style="margin: 0;background-repeat:no-repeat;background-image: url('<?=base_url('')?>/dist/img/background.png');">
<div class="container">
  <div class="row">
    <div class="col-sm-12">
       <!-- <img style="height: 629px;width:355px;position: relative;bottom: -86px;left: -65px"  src="<?=base_url("")?>/dist/img/phone_random.png"> -->
       <label id="phone" >000000000</label> 
       <button   class="btn btn-primary" id="btn_start"><i class="fa fa-pause" aria-hidden="true"></i> ចាប់ផ្ដើម</button>
       <button   class="btn btn-danger" id="btn_stop"><i class="fa fa-play" aria-hidden="true"></i> បញ្ឈប់</button>
       <button   class="btn btn-danger" id="btn_reset"><i class="fa fa-repeat" aria-hidden="true"></i> ឡើងវិញ</button>

        <label​ id="title">ការចាប់រង្វាន់ ដីឡូត៏ិ សុខ ផល្លា!</label>
        <input hidden  type="number" name="txt_insert_phone" class="form-control" id="txt_insert_phone" placeholder="សូមបញ្ចូលលេខទូរសព្ទ" autocomplete="off">
        <!-- <label id="lbl_win"></label> -->
        <input disabled type="number" name="show" class="form-control" id="show">

        <input disabled  type="number" name="win1" class="form-control" id="win1" placeholder="000000000" autocomplete="off">
        <input disabled  type="number" name="win2" class="form-control" id="win2" placeholder="000000000" autocomplete="off">
        <input disabled  type="number" name="win3" class="form-control" id="win3" placeholder="000000000" autocomplete="off">
        <input disabled  type="number" name="win4" class="form-control" id="win4" placeholder="000000000" autocomplete="off">
        <input disabled  type="number" name="win5" class="form-control" id="win5" placeholder="000000000" autocomplete="off">
    </div>
  </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <form id="frm_select_phone">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
                  <div class="form-group">
                       <label​ style="font-family:'Khmer OS Battambang';">លេខទូរសព្ទ : <star style="color: red">*</star></label>
                       
                       <select style="font-family:'Khmer OS Battambang';" class="form-control" id="ch_select">
                        <?php foreach ($rd as $key => $v) { ?>
                        <option value="<?=$v->mobie_id?>"><?=$v->mobile_name?></option>
                        <?php } ?>
                       </select>
                  </div>

                   <div class="form-group">
                       <label style="font-family:'Khmer OS Battambang';">លេខ: <star style="color: red">*</star></label>
                       <input required style="font-family:'Khmer OS Battambang';"​ type="number" name="txt_no" id="txt_no" placeholder="សូមបញ្ចូលលេខ" class="form-control">
                  </div>
          
        </div>
        <div class="modal-footer">
          <button style="font-family:'Khmer OS Battambang';" id="btn_submit_select" type="button" class="btn btn-primary" >ជ្រើសរើស</button>
          <button style="font-family:'Khmer OS Battambang';" type="button" class="btn btn-danger" data-dismiss="modal">បិត</button>
        </div>
      </div>
      </form>
      
    </div>
  </div>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        const items=[];
        var phone="";
        $("#btn_stop").attr('disabled',true);
        function generateNumber(index) {
          var output = $('#output' + index); // Start ID with lettery
          $.ajax({
                type:"post",
                url: "<?=site_url('Randomphone/get_phone_all')?>",
                cache: false,
                success: function(res){
                    var json = JSON.parse(res);
                    $.each(json, function( index, value ) {
                        items.push(value.mobile_name);
                    });
                }
              });
               animationTimer = setInterval(function(){
            if (output.text().trim() ===""){
                  clearInterval(animationTimer); // Stop the loop
                  output.text = items[Math.floor(Math.random()*items.length)];
                   
                  // Math.floor(Math.random()*items.length);
                  $("#phone").text(output.text);
                  generateNumber(index + 1);
            }

          },50);
        }
        
        $("#btn_reset").on('click',function(e){
           e.preventDefault();
                $.ajax({
                    type:"post",
                    url: "<?=site_url('Randomphone/reset_selection')?>",
                    success: function(res){
                       window.location.reload();
                    }
              });
        });

        function list_winer(e){
                  $("#lbl_win").html("");
                  $.ajax({
                    type:"post",
                    url: "<?=site_url('Randomphone/list_winer')?>",
                    data:{'phone':phone},
                    success: function(res){
                          var json = JSON.parse(res);
                          $.each(json, function( index, value ) {
                               var count = index+1;
                               $("#lbl_win").append('អ្នកឈ្នះទី'+count+': '+value.mobile_winer+'</br>');
                          });
                        }
              });
        }

        $('#txt_insert_phone').keyup(function(e){
          var phone_number = $("#txt_insert_phone").val();
              if(e.keyCode == 13){
               e.preventDefault();
               $.ajax({
                  type:"post",
                  data:{'phone_number':phone_number},
                  url: "<?=site_url('Randomphone/insert_select_phone')?>",
                  success: function(res){
                      var json = JSON.parse(res);
                      $("#txt_insert_phone").focus();
                      window.location.reload();

                  }

                });

             }
          
        });

        $("#btn_start").on('click',function(){
          generateNumber(0);
          $("#btn_start").attr('disabled',true);
          $("#btn_stop").attr('disabled',false);
          $("#btn_reset").attr('disabled',true);
        });

        $("#btn_submit_select").on('click',function(e){
          var id_mobile = $("#ch_select").val();
          var no = $("#txt_no").val();
          if(no!=""){
               e.preventDefault();
               $.ajax({
                type:"post",
                data:{'id_mobile':id_mobile,'no':no},
                url: "<?=site_url('Randomphone/insert_select_phone_win')?>",
                success: function(res){
                    //var json = JSON.parse(res);
                    $("#txt_no").val("");
                    $("#txt_no").focus();
                  }

                });
          }else{
              alert("សូមបញ្ចូលលេខរៀង");
              $("#txt_no").focus();
              return;
            }
        });

        $("#btn_stop").on('click',function(){
        $("#btn_start").attr('disabled',false);
        $("#btn_stop").attr('disabled',true);
        $("#btn_reset").attr('disabled',false);
        $.ajax({
                type:"post",
                url: "<?=site_url('Randomphone/count_phone_select')?>",
                success: function(res){
                var count = JSON.parse(res);
                  $.each(count, function( index, value ) {
                        if(value.count_select!=0){
                            clearInterval(animationTimer); // Stop the loop
                              $.ajax({
                                  type:"post",
                                  url: "<?=site_url('Randomphone/get_phone_select')?>",
                                  success: function(res){
                                  var json = JSON.parse(res);
                                  $.each(json, function( index, value ) {
                                      $("#phone").text(value.mobile);
                                  });
                                  
                              phone = $("#phone").text();
                              $.ajax({
                                type:"post",
                                url: "<?=site_url('Randomphone/update_phone_select')?>",
                                data:{'phone':phone},
                                success: function(res){
                                      list_winer();
                                    }
                                  });
                                }
                            });
                        }else{
                            var mobile = $("#phone").text();
                            clearInterval(animationTimer); // Stop the loop
                             $.ajax({
                                type:"post",
                                data:{'mobile':mobile},
                                url: "<?=site_url('Randomphone/add_to_selection')?>",
                                success: function(res){
                                        list_winer(); 
                                    }
                          });
                        }
                  });

                }
              });
        });

    });  
</script>
<script type="text/javascript">
          $(document).keydown(function(e) {
              if (e.keyCode == 83) {
                  e.preventDefault();
                   $('#myModal').modal('show'); 
               }

          });
</script>
<script type="text/javascript">
          $(document).keyup(function(e) {
              if (e.keyCode == 76) {
                  e.preventDefault();
                   window.open("<?=site_url('Userlogin')?>","_self");
               }

          });
</script>
</html>
