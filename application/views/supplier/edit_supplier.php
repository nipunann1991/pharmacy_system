<div class="head">
	<div class="top">
		<h2>Edit Supplier</h2>
  		<span class="breadcrumb">Home > Supplier > Edit Supplier</span>
  		<div class="clearfix"></div>
	</div> 
  	<button class=" mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent page_btn" data-href="supplier" id="view_add_supplier"><i class="icon-list-with-dots" aria-hidden="true"></i> View Supplier</button>
</div>
<div class="body"> 

	<form class="form-horizontal" id="commentForm" > 

	    <div class="row">
			<div class="col-md-6">
	 			<div class="form-group">
				    <label class="control-label col-sm-12" for="edit_sup_id">Supplier ID : <small class="help-block hide ">Must be a numeric value</small></label>
				    <div class="col-sm-12">
				      <select type="text" class="form-control" id="edit_sup_id" name="edit_sup_id"  > 
				      </select>

				    </div>
			  	</div>
	 		</div>
		  	<div class="col-md-6">
			  	<div class="form-group">
				    <label class="control-label col-sm-12" for="edit_sup_name">Supplier Name : <small class="help-block hide">Can't be empty</small></label>
				    <div class="col-sm-12"> 
				      	<input type="text" class="form-control" id="edit_sup_name" name="edit_sup_name" required> 
				    </div>
			  	</div>
		  	</div>
		</div>
			<div class="row">
			<div class="col-md-6">
			  	<div class="form-group">
				    <label class="control-label col-sm-12" for="edit_dealer">Dealer : <small class="help-block hide">Can't be empty</small></label>
				    <div class="col-sm-12"> 
				      	<input type="text" class="form-control" id="edit_dealer" name="edit_dealer" required> 
				    </div>
			  	</div>
			</div>
			<div class="col-md-6">
			  	<div class="form-group">
				    <label class="control-label col-sm-12" for="edit_nic">NIC : <small class="help-block hide">Can't be empty</small></label>
				    <div class="col-sm-12"> 
				      	<input type="text" class="form-control" id="edit_nic" name="edit_nic" required> 
				    </div>
			  	</div>
			</div>
		</div>
	  	<div class="form-group">
		    <label class="control-label col-sm-12" for="edit_sup_address">Address : <small class="help-block hide">Can't be empty</small> </label>
		    <div class="col-sm-12"> 
		    	<textarea name="" cols="30" rows="4" id="edit_sup_address" class="form-control" ></textarea> 
		    </div>
	  	</div> 
	  	<div class="row">
			<div class="col-md-6">
			  	<div class="form-group">
				    <label class="control-label col-sm-12" for="edit_tel">Tel : <small class="help-block hide">Can't be empty</small></label>
				    <div class="col-sm-12"> 
				      	<input type="text" class="form-control" id="edit_tel" name="edit_tel" required> 
				    </div>
			  	</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				    <label class="control-label col-sm-12" for="edit_fax">Fax : <small class="help-block hide">Can't be empty</small></label>
				    <div class="col-sm-12"> 
				      	<input type="text" class="form-control" id="edit_fax" name="edit_fax" > 
				    </div>
			  	</div>
			</div>
		</div>
		<div class="form-group">
		    <label class="control-label col-sm-12" for="edit_email">Email : <small class="help-block hide">Can't be empty</small></label>
		    <div class="col-sm-12"> 
		      	<input type="email" class="form-control" id="edit_email" name="edit_email"> 
		    </div>
	  	</div>

	    <div class="form-group">
			<div class="col-md-12">
				<button class="btn btn_add submit" type="submit" id="edit_supplier">Edit Supplier</button>
				<button class="btn btn-default" type="button">Cancel</button>
			</div> 
		</div>
	    <p>
	      <!-- <input class="submit" type="submit" value="Submit" > -->
	      
	    </p>
	   
	</form>
 

</div>

<script src="<?php echo base_url(); ?>assets/js/supplier.js"></script>