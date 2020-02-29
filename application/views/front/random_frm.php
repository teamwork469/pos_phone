<!DOCTYPE html>
<html lang="en">
<head>
  <title>Random</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?=base_url('')?>dist/css/font-awesome.min.css">

<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

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
      top: 182px;
      margin-left: 274px;
      margin-right: 500px;
      height: 100px;
      box-shadow: 0px 0px 10px black;
    }
    #btn_start{
      font-family: khmer moul;
      position: relative;
      top: 380px;
      left: 389px;
      z-index: 1;
      height: 50px;
      
      
    }
    #btn_stop{
      font-family: khmer moul;
      position: relative;
      top: 380px;
      left: 400px;
      z-index: 1;
      height: 50px;
    }
    #btn_reset{
      font-family: khmer moul;
      position: relative;
      top: 380px;
      left: 411px;
      z-index: 1;
      height: 50px;
    }
    #phone {
    font-size: 88px;
    position: absolute;
    top: 244px;
    z-index: 1;
    left: 311px;
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
    position: relative;
    top: 277px;
    width: 240px;
    text-align: center;
    font-weight: bold;
    box-shadow: 0px 0px 0px 2px #bd2130;
    font-size: 30px;
    left:-90px;
    font-family: sans-serif;
    }
    #win2{
    position: relative;
    top: 218px;
    width: 240px;
    text-align: center;
    font-weight: bold;
    left: 170px;
    box-shadow: 0px 0px 0px 2px #bd2130;
    font-size: 30px;
    font-family: sans-serif;
  
    }
    #win3{
    position: relative;
    top: 158px;
    width: 240px;
    text-align: center;
    font-weight: bold;
    left: 432px;
    box-shadow: 0px 0px 0px 2px #bd2130;
    font-size: 30px;
    font-family: sans-serif;
  
    }
    #win4{
    position: relative;
    top: 99px;
    width: 240px;
    text-align: center;
    font-weight: bold;
    left: 694px;
    box-shadow: 0px 0px 0px 2px #bd2130;
    font-size: 30px;
    font-family: sans-serif;
  
    }
    #win5{
    position: relative;
    top: 40px;
    width: 240px;
    text-align: center;
    font-weight: bold;
    left: 956px;
    box-shadow: 0px 0px 0px 2px #bd2130;
    font-size: 30px;
    font-family: sans-serif;
    }

    /* Paste this css to your style sheet file or under head tag */
/* This only works with JavaScript, 
if it's not present, don't show loader */
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('<?=base_url()?>dist/img/Preloader_11.gif') center no-repeat #fff;
}
#lbl_win1{
    position: relative;
    top: 272px;
    left: -41px;
}
#lbl_win2{
    position: relative;
    top: 272px;
    left: 68px;
}
#lbl_win3{
    position: relative;
    top: 272px;
    left: 159px;
}
#lbl_win4{
    position: relative;
    top: 272px;
    left: 261px;
}
#lbl_win5{
    position: relative;
    top: 272px;
    left: 365px;
}
  </style>

</head>
<body style="margin: 0;background-repeat:no-repeat;background-image: url('<?=base_url('')?>/dist/img/background.jpg');">
<div class="se-pre-con"></div>
<script>
//paste this code under the head tag or in a separate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
       <!-- <img style="height: 629px;width:355px;position: relative;bottom: -86px;left: -65px"  src="<?=base_url("")?>/dist/img/phone_random.png"> -->
       <label id="phone" >0000000000</label> 
       <button   class="btn btn-primary" id="btn_start"><i class="fa fa-pause" aria-hidden="true"></i> ចាប់ផ្ដើម</button>
       <button   class="btn btn-danger" id="btn_stop"><i class="fa fa-play" aria-hidden="true"></i> បញ្ឈប់</button>
       <button   class="btn btn-danger" id="btn_reset"><i class="fa fa-repeat" aria-hidden="true"></i> ឡើងវិញ</button>

        <label​ id="title"></label>
        <label​  id="title"></label>

        <input hidden  type="number" name="txt_insert_phone" class="form-control" id="txt_insert_phone" placeholder="សូមបញ្ចូលលេខទូរសព្ទ" autocomplete="off">
        <!-- <label id="lbl_win"></label> -->
        <input disabled type="number" name="show" class="form-control" id="show">

        <label id="lbl_win1" for="lbl_win1">រង្វាន់ទី៥</label>
        <label id="lbl_win2" for="lbl_win1">រង្វាន់ទី៤</label>
        <label id="lbl_win3" for="lbl_win1">រង្វាន់ទី៣</label>
        <label id="lbl_win4" for="lbl_win1">រង្វាន់ទី២</label>
        <label id="lbl_win5" for="lbl_win1">រង្វាន់ទី១</label>

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
                        <option value="<?=$v->mobile_id?>"><?=$key+1?><?=" - ".$v->mobile_name?></option>
                        <?php } ?>
                       </select>
                  </div>

                   <div class="form-group">
                       <label style="font-family:'Khmer OS Battambang';">លេខ: <star style="color: red">*</star></label>
                       <!-- <input required style="font-family:'Khmer OS Battambang';"​ type="number" name="txt_no" id="txt_no" placeholder="សូមបញ្ចូលលេខ" class="form-control"> -->
                      
                       <select class="form-control" name="txt_no" id="txt_no">
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                       </select>
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
           $('#phone').text('000000000');
           list_winer();
        });

        function list_winer(e){
                  $.ajax({
                    type:"post",
                    url: "<?=site_url('Randomphone/list_winer')?>",
                    data:{'phone':phone},
                    success: function(res){
                          var json = JSON.parse(res);
                          $.each(json, function( index, value ) {
                               var count = index+1;
                               if(count==1){
                                  $("#win1").val(value.mobile_winer);
                                  
                               }
                               if(count==2){
                                  $("#win2").val(value.mobile_winer);
                                  
                               }
                               if(count==3){
                                  $("#win3").val(value.mobile_winer);
                                  
                               }
                               if(count==4){
                                  $("#win4").val(value.mobile_winer);
                                  
                               }
                               if(count==5){
                                  $("#win5").val(value.mobile_winer);
                                  
                                 
                               }
                              //  $("#lbl_win").append('អ្នកឈ្នះទី'+count+': '+value.mobile_winer+'</br>');
                          });
                        }
              });
        }

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

               if (e.keyCode == 65) {
                  e.preventDefault();
                  window.open("<?=site_url('Page')?>","_self");
               }

          });
</script>
</html>
