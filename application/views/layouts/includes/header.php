<!DOCTYPE HTML>
<html lang="en">
<?php

	if (isset($this->session->userdata['logged_in'])) {
		$uname = ($this->session->userdata['logged_in']['username']);
		$urole = ($this->session->userdata['logged_in']['role']);
	} else {
		$uname = null;
		$urole = null;
	}

?>

<head>
	<meta charset="UTF-8">
	<title>NTC - Grading System</title>
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

	<div id="header">
		<div class="section">
			<div class="logo">
				<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/NTC-Logo.png" alt="logo" /></a>
			</div>
			<ul>
				<li>
					<a href="#">home</a>
				</li>
				<li>
					<a href="#">about</a>
				</li>
				<li>
					<a href="#">contact</a>
				</li>
				<?php
					if($uname == null){
						echo '<li><a href="#"><font color="red">sign-up</font></a></li>';
					} else {
						echo '<li><a href="' . base_url() . 'home/logout"><font color="red">log-out</font></a></li>';
					}
				?>
	
			</ul>
		</div>
	</div>