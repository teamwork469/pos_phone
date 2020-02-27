<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?=base_url()?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?=base_url()?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url()?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=base_url()?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=base_url()?>plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <!--icon font awsome-->
  <link rel="stylesheet" href="<?=base_url()?>dist/css/font-awesome.min.css">

  <!-- jQuery -->
  
<script src="<?=base_url()?>plugins/jquery/jquery.min.js"></script>
<script src="<?=base_url()?>dist/js/jquery.min.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="<?=base_url()?>dist/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="<?=base_url()?>dist/js/jquery.dataTables.js"></script>
  <script src="<?=base_url()?>dist/js/modernizr.js"></script>

  

  <style>
    .fa-mobile-phone:before, .fa-mobile:before {
        content: "\f10b";
        font-size: 25px;
    }
    a{cursor:pointer;}
    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
    background-color: #4b5055;
    color: #fff;
}
    .nav-sidebar .nav-link p {
    display: inline-block;
    margin: 0;
    font-size: 16px;
}

/* .btn-primary {
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
} */

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
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="se-pre-con"></div>
<script>
//paste this code under the head tag or in a separate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");
	});
  function goBack() {
         window.history.back();
      }
</script>
<div class="wrapper">
  
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-th-list" aria-hidden="true"></i> </a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search" aria-hidden="true"></i>
          </button>
        </div>
      </div>
    </form> -->
  </nav>
  <!-- /.navbar -->