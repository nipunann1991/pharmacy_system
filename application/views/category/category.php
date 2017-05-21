<div class="head">
	<div class="top">
		<h2>Categories</h2>
  		<span class="breadcrumb">Home > Categories</span>
  		<div class="clearfix"></div>
	</div> 
  	<button class=" mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" id="add_category"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Category</button>
</div>
<div class="body"> 
	
	<table id="emp_list" class="table table-responsive table-bordered table-striped">
	    <thead>
		    <tr>
	         <!--  <th># Id</th> -->
		        <th>Category Id</th>
	          	<th>Category Name</th>
		      	<th>Description</th> 
		      	<th class="edit_btns"></th>   
		    </tr>
	    </thead>
	    <tbody>


	    </tbody> 
	</table> 

</div>


 <div class="add_category_form hide">
	<form class="form-horizontal" id="myForm">
	  	<div class="form-group">
		    <label class="control-label col-sm-12" for="cat_id">Category ID: <small class="help-block hide ">Must be a numeric value</small></label>
		    <div class="col-sm-12">
		      <input type="text" class="form-control" id="cat_id" name="cat_id"  required>  
		    </div>
	  	</div>
	  	<div class="form-group">
		    <label class="control-label col-sm-12" for="cat_name">Category Name: <small class="help-block hide">Can't be empty</small></label>
		    <div class="col-sm-12"> 
		    
		      	<input type="text" class="form-control" id="cat_name" name="cat_name" required> 
		    </div>
	  	</div>
	  	<div class="form-group">
		    <label class="control-label col-sm-12" for="cat_desc">Category Description: <small class="help-block hide">Can't be empty</small> </label>
		    <div class="col-sm-12"> 
		    	<textarea name="" cols="30" rows="4" id="cat_desc" class="form-control"></textarea> 
		    </div>
	  	</div>  
	  	<!-- <div class="form-group">
	  		<div class="col-md-12">
	  			<button class="btn btn-success" type="submit">Add Category</button>
	  			<button class="btn btn-default" type="button">Cancel</button>
	  		</div> 
	  	</div> -->
	</form>
</div>

<script src="assets/js/vw_category.js"></script>
 