<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" href="../../favicon.ico">

    <title>thegamingplace</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet">

    
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
 </button>
          <a class="navbar-brand" href="<?php echo base_url(); ?>">The Gaming Place</a>
 </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
            <li><a href="<?php echo base_url(); ?>user/register">create account</a></li>
            
 </ul>
		<form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="username" class="form-control" placeholder="Enter Username">
</div>
	 <input type="password" class="form-control" placeholder="Enter password">
        
        <button type="Login" class="btn btn-warning">Login</button>
 </form>
        </div><!--/.nav-collapse -->
 </div>
 </nav>

    <div class="container">

      <div class="starter-template">
       <div class="row">
	<div class="col-md-4">

	<?php $this->load->view('layouts/includes/sidebar');?>
	
	
</div>
</div>

	<div class="col-md-8">
	<div class="panel panel-default">
	<div class="panel-heading panel-heading panel-green">
	<h3 class="panel-title">Latest Releases</h3>
	</div>
	<div class="panel-body">