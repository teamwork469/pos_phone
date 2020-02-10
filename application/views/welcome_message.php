<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}
	
	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>

<!-- <h3><?php echo "<h3>User ID".$this->session->userdata('user_id')."</h3>"; ?></h3> -->

	<div id="container">
		 <form>
		 	 <input type="text" placeholder="Enter User" name="txt_user" id="txt_user">
		 	 <input type="password" placeholder="Enter password" name="txtpass" id="txtpass">
		 	 <input type="submit"  name="btn_login" id="btn_login" value="Login">
		 </form>
	</div>

</body>
<script type="text/javascript">
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
                       window.open("<?=site_url('Dashboard')?>","_self");
			        }else{
			           alert("User is incorrect!");
                       window.open("<?=site_url('Welcome')?>","_self");
			        }
			    }
			});
		});
	});
</script>
</html>