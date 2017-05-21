<div class="head">
	<div class="top"> 
		<h2><?php echo $page_name; ?></h2>
  		<span class="breadcrumb"><?php echo $breadcrumb; ?></span>
  		<div class="clearfix"></div>
	</div> 
  	<button class=" mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent page_btn" data-href="add_items" id="view_add_items">
		<i class="icon-list-with-dots" aria-hidden="true"></i> Add Items
	</button>
</div>
<div class="body"> 
    <table id="supplier_list" class="table table-responsive table-bordered table-striped">
	    <thead>
		    <tr>
	         <!--  <th># Id</th> -->
		        <th>Item Id</th>
	          	<th>Item Name</th>
	          	<th>Price</th>
	          	<th>Quantity</th>
		      	<th>Discount</th>  
		      	<th class="edit_btns"></th>   
			
		    </tr>
	    </thead>
	    <tbody>
			  
	
	    </tbody> 
	</table> 
</div>

<script src="<?php echo base_url(); ?>assets/js/items.js"></script>