<!DOCTYPE html>
<html lang="en" ng-app="pos_app">
  <head>
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Zigma POS</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css//angular-material.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/angular-datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animated.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/angular-ui-notification.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/c3.min.css">
    <link rel="stylesheet" href="assets/css/stylesheet.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body  ng-controller="logCtrl" >

  
  <div class="container-fluid login" ng-if="!loginStatus">
    <div ng-include="'index.php/Pages/login'" class="login_inner" ></div>
  </div>  
 

	<div class="container-fluid dashboard " ng-if="loginStatus">

		<div ng-include="'index.php/Pages/topNav'" ></div>
		<div ng-include="'index.php/Pages/leftNav'" class="left_nav {{classNav}}"  ng-model="leftNav"></div>
    
		  <div class="right_content {{classContent}}">
	        <div class="wrapper">
	        	<div class="loader hide">
	        		 
	        	</div>
	            <div id="page" class="page" ng-view> 
	                 
	            </div>
	        </div> 
	    </div>
  </div>

      <script src="<?php echo base_url(); ?>assets/js/dist/jquery.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/dist/JsBarcode.all.min.js"></script>

      <script src="<?php echo base_url(); ?>assets/js/dist/angular.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/dist/angular-animate.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/dist/angular-aria.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/dist/angular-messages.min.js"></script>

      <script src="<?php echo base_url(); ?>assets/js/dist/angular-material.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/dist/angular-route.js"></script>
    


      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <!-- Include all compiled plugins (below), or include individual files as needed -->

      <script src="<?php echo base_url(); ?>assets/js/dist/jquery.dataTables.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/dist/d3.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/dist/c3.min.js"></script>


      <script src="<?php echo base_url(); ?>assets/js/angular-datatables.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/dist/bootbox.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/ngBootbox.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/angular-ui-notification.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/angular-validation.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/angular-validation-rule.min.js"></script>

      <script src="<?php echo base_url(); ?>assets/js/app.js"></script> 
      <script src="<?php echo base_url(); ?>assets/js/appDashboard.js"></script> 
      <script src="<?php echo base_url(); ?>assets/js/appItem.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/appSupplier.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/appCategory.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/appSettings.js"></script>
     

      <script src="<?php echo base_url(); ?>assets/js/route.js"></script>

  </body>
</html>