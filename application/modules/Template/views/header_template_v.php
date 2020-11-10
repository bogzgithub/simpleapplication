<!DOCTYPE html>
<html>
<head>
<title><?php echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/color.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/universal.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">


<script src="<?php echo base_url();?>assets/js/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
	// here we will create universal variable for base_url to ce called in our js files
	var base_url = "<?php echo base_url(); ?>";
</script>
</head>
<body>
<?php
	if ($title != "Log In Form"){
?>
<!-- for nav menu -->
	<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#357ca5;">
		<div class="container-fluid">
			<div class="navbar-header">
			
			<a class="navbar-brand" href="home">
				<img src="" class=""/>
		  		<span class="hupay-color">&nbsp;Simple System</span>
			</a>
			</div>

			<div class="dropdown float-right full-name">
				<?php
					if ($this->session->userdata('profile_path') == ""){
				?>
					<img class="profile-pic" src="<?php echo base_url();?>/assets/img/profile_image/default.jpg" />
				<?php
					}
					else {

				?>
					<img class="profile-pic" src="<?php echo base_url();?>/<?php echo $this->session->userdata('profile_path'); ?>" />
				<?php
					}
				?>
				<span class="color-white">
					<?php echo $this->session->userdata('first_name') . " " . $this->session->userdata('middle_name') . " " .$this->session->userdata('last_name') . " " . $this->session->userdata('suffix'); ?>
				</span>

				<span class="color-white">|</span>
				<span class="color-white">
					<span style="cursor: pointer" title="Log Out" id="spanLogout"><span class="fas fa-sign-out-alt"></span>Log out</span>
				</span>
				
			</div>
			
		</div>	<!-- end of  div -->
	</nav> <!-- end of nav -->
<?php
	} // end of if title != Log In Form
?>
