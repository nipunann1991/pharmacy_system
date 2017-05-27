<div class="head">
	<div class="top">
		<h2>Add Supplier</h2>
  		<span class="breadcrumb">Home > Supplier > Add Supplier</span>
  		<div class="clearfix"></div>
	</div> 
  	<button class=" mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent page_btn" data-href="supplier" id="view_add_supplier">
		<i class="icon-list-with-dots" aria-hidden="true"></i> View Supplier
	</button>
</div>
<div class="body"> 

	<form class="form-horizontal" id="commentForm" > 

	    <div class="row">
			<div class="col-md-6">
	 			<div class="form-group">
				    <label class="control-label col-sm-12" for="sup_id">Supplier ID : <small class="help-block hide ">Must be a numeric value</small></label>
				    <div class="col-sm-12">
				      <input type="text" class="form-control" id="sup_id" name="sup_id" disabled required>  
				    </div>
			  	</div>
	 		</div>
		  	<div class="col-md-6">
			  	<div class="form-group">
				    <label class="control-label col-sm-12" for="sup_name">Supplier Name : <small class="help-block hide">Can't be empty</small></label>
				    <div class="col-sm-12"> 
				      	<input type="text" class="form-control" id="sup_name" name="sup_name" required> 
				    </div>
			  	</div>
		  	</div>
		</div>
			<div class="row">
			<div class="col-md-6">
			  	<div class="form-group">
				    <label class="control-label col-sm-12" for="dealer">Dealer : <small class="help-block hide">Can't be empty</small></label>
				    <div class="col-sm-12"> 
				      	<input type="text" class="form-control" id="dealer" name="dealer" required> 
				    </div>
			  	</div>
			</div>
			<div class="col-md-6">
			  	<div class="form-group">
				    <label class="control-label col-sm-12" for="nic">NIC : <small class="help-block hide">Can't be empty</small></label>
				    <div class="col-sm-12"> 
				      	<input type="text" class="form-control" id="nic" name="nic" required> 
				    </div>
			  	</div>
			</div>
		</div>
	  	<div class="form-group">
		    <label class="control-label col-sm-12" for="sup_address">Address : <small class="help-block hide">Can't be empty</small> </label>
		    <div class="col-sm-12"> 
		    	<textarea name="" cols="30" rows="4" id="sup_address" class="form-control" ></textarea> 
		    </div>
	  	</div> 
	  	<div class="row">
			<div class="col-md-6">
			  	<div class="form-group">
				    <label class="control-label col-sm-12" for="tel">Tel : <small class="help-block hide">Can't be empty</small></label>
				    <div class="col-sm-12"> 
				      	<input type="text" class="form-control" id="tel" name="tel" required> 
				    </div>
			  	</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				    <label class="control-label col-sm-12" for="fax">Fax : <small class="help-block hide">Can't be empty</small></label>
				    <div class="col-sm-12"> 
				      	<input type="text" class="form-control" id="fax" name="fax" > 
				    </div>
			  	</div>
			</div>
		</div>
		<div class="form-group">
		    <label class="control-label col-sm-12" for="email">Email : <small class="help-block hide">Can't be empty</small></label>
		    <div class="col-sm-12"> 
		      	<input type="email" class="form-control" id="email" name="email"> 
		    </div>
	  	</div>

	    <div class="form-group">
			<div class="col-md-12">
				<button class="btn btn_add submit" type="submit" id="add_supplier">Add Supplier</button>
				<button class="btn btn-default" type="button" id="cancel">Cancel</button>
			</div> 
		</div>
	    <p>
	      <!-- <input class="submit" type="submit" value="Submit" > -->
	      
	    </p>
	   
	</form>
 

</div>

<script src="<?php echo base_url(); ?>assets/js/supplier/add_supplier.js"></script>