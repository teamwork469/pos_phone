<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('')?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url('')?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('')?>/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- jQuery -->
<script src="<?=base_url('')?>/plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<style>
.btn-primary {
    color: #fff;
    background-color: #343a40;
    border-color: #343a40;
    box-shadow: none;
}
.btn-primary:hover{
    color: #fff;
    background-color: #343a40;
    border-color: #343a40;
    box-shadow: none;
}
</style>

</head>
<body class="hold-transition login-page" style="background-image: url('<?=base_url('')?>/dist/img/backround.jpg');">
<div class="login-box">
  <div class="login-logo">
    <b>Tech</b>Solution
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Log in to start your session</p>

      <form>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="txt_user" id="txt_user" placeholder="Enter Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-user-alt"></i>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="txtpass" id="txtpass" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
             <button type="submit" name="btn_login" id="btn_login" class="btn btn-primary btn-block">Log In</button>
        </div>
        <div class="input-group mb-3">
             <button type="button" name="btn_exit" id="btn_exit" class="btn btn-danger btn-block">Exit</button>
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
      </div>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<script type="text/javascript">
  ///Check login:
  $(document).ready(function(){
      $("form").on('submit',function(e){
        e.preventDefault();
      $.ajax({
        method:"post",
        data:$(this).serialize(),
          url: '<?=site_url("Userlogin/check_user_login")?>',
          cache: false,
          success: function(res){
            var json = JSON.parse(res);
              if(json=="1"){
                alert("User is correct.");
                       window.open("<?=site_url('Randomphone')?>","_self");
              }else{
                 alert("User is incorrect!");
                       window.open("<?=site_url('Userlogin')?>","_self");
              }
          }
      });
    }); 
  ////Check exit form login:
  $('#btn_exit').on('click',function(e){
        if (confirm("Do you want to close System?")) {
            window.location.href = '/exitkiosk';
        }
    });
  });
</script>
 

<!-- Bootstrap 4 -->
<script src="<?=base_url('')?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('')?>/dist/js/adminlte.min.js"></script>

</body>
</html>