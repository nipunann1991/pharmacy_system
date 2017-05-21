<!DOCTYPE html>
<html class="no-js before-run" lang="en">
<head>
  <?php include	'header.php' ; ?>
</head>
<body>

<div class="container-fluid dashboard"> 
    
    <?php include 'nav.php' ; ?>

    <div class="right_content">
        <div class="wrapper">
        	<div class="loader hide">
        		 
        	</div>
            <div id="page" class="page"> 
                 <?php include 'dashboard.php' ; ?>
            </div>
        </div> 
    </div>
</div> 
 
<?php include 'footer.php' ; ?>

</body>

</html>