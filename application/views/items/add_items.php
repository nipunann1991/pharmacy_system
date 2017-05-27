<div class="head">
	<div class="top"> 
		<h2><?php echo $page_name; ?></h2>
  		<span class="breadcrumb"><?php echo $breadcrumb; ?></span>
  		<div class="clearfix"></div>
	</div>  
  	<button class=" mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent page_btn" data-href="items" id="view_add_items">
		<i class="icon-list-with-dots" aria-hidden="true"></i> View Items
	</button>
</div>
<div class="body"> 
    <form class="form-horizontal" id="commentForm" > 
    	<div class="col-md-3">
    		<div class="item_img row">
    			<input type="file">
    		</div>
    	</div>
        <div class="col-md-9">
            <div class="col-md-4">
	 			<div class="form-group">
				    <label class="control-label col-sm-12" for="item_id">Item ID : <small class="help-block hide ">Must be a numeric value</small></label>
				    <div class="col-sm-12">
				      <input type="text" class="form-control" id="item_id" name="item_id" disabled required>  
				    </div>
			  	</div>
	 		</div>
	 		 <div class="col-md-4">
	 			<div class="form-group">
				    <label class="control-label col-sm-12" for="barcode">Barcode No : <small class="help-block hide ">Can't be empty</small></label>
				    <div class="col-sm-12">
				      <input type="text" class="form-control" id="barcode" name="barcode" required>  
				    </div>
			  	</div>
	 		</div> 
		  	<div class="col-md-4">
			  	<div class="form-group">
				    <label class="control-label col-sm-12" for="manufacture_id">Manufacture ID : <small class="help-block hide">Can't be empty</small></label>
				    <div class="col-sm-12"> 
				      	<input type="text" class="form-control" id="manufacture_id" name="manufacture_id" required> 
				    </div>
			  	</div>
		  	</div>
		  	<div class="row_">
		  		<div class="col-md-6">
				  	<div class="form-group">
					    <label class="control-label col-sm-12" for="item_name">Item Name : <small class="help-block hide">Can't be empty</small></label>
					    <div class="col-sm-12"> 
					      	<input type="text" class="form-control" id="item_name" name="item_name" required> 
					    </div>
				  	</div>
			  	</div> 
			  	<div class="col-md-6">
			  		<div class="form-group">
					  	<div class="checkbox related_input">
						  	<label><input type="checkbox" id="use_item_display_name" value="">Use same as Item Display Name.</label>
						</div>
					</div>
			  	</div>
		  		<div class="clearfix"></div>
		  	</div> 
		  	<div class="row_"> 
			  	<div class="col-md-6">
		 			<div class="form-group">
					    <label class="control-label col-sm-12" for="item_display_name">Item Display Name : <small class="help-block hide ">Must be a numeric value</small></label>
					    <div class="col-sm-12">
					      <input type="text" class="form-control" id="item_display_name" name="item_display_name" required>  
					    </div>
				  	</div>
		 		</div>
			  	<div class="clearfix"></div>
	        </div>
	 		
		  	<div class="col-md-4">
			  	<div class="form-group">
				    <label class="control-label col-sm-12" for="category">Category : <small class="help-block hide">Can't be empty</small></label>
				    <div class="col-sm-12"> 
				    	<select type="text" class="form-control" id="category" name="category"></select> 
				    </div>
			  	</div>
		  	</div>
		  	<div class="col-md-4">
			  	<div class="form-group">
				    <label class="control-label col-sm-12" for="supplier">Supplier : <small class="help-block hide">Can't be empty</small></label>
				    <div class="col-sm-12">  
				      	<select type="text" class="form-control" id="supplier" name="supplier"></select> 
				    </div>
			  	</div>
		  	</div>
			 
        </div>
         
        

		<!-- price -->
        <div class="col-md-12 price_column">
        	<!-- <div class="col-md-12 divider"></div> -->

        	<div class="col-md-8">

        		<div class="row_">
		            <div class="col-md-6">
			 			<div class="form-group">
						    <label class="control-label col-sm-12" for="buy_price">Buying Price : <small class="help-block hide ">Must be a numeric value</small></label>
						    <div class="col-sm-12">
						      	<input type="text" class="form-control" id="buy_price" name="buy_price" required>  
						    </div> 
					  	</div>
			 		</div> 
				  	<div class="col-md-6">
					  	<div class="form-group">
						    <label class="control-label col-sm-12" for="sell_price">Selling Price : <small class="help-block hide">Can't be empty</small></label>
						    <div class="col-sm-12"> 
						      	<input type="text" class="form-control" id="sell_price" name="sell_price" required> 
						    </div>
					  	</div>
				  	</div> 
				</div>
				<div class="col-md-12"> 
					<div class="col-sm-12"> 
						<div class="form-group">
						  	<div class="checkbox options">
							  	<label><input type="checkbox" value="" checked>Calculate Item.</label>
							</div>
							<div class="checkbox options">
							  	<label><input type="checkbox" value="" checked>Price is changable on sale.</label>
							</div> 
						</div> 
					</div>
				</div>

			  	<div class="clearfix"></div>

			</div>
			<div class="col-md-4">

				<div class="col-md-12">
					  	<div class="form-group">
						    <label class="control-label col-sm-12" for="quantity">Quantity : <small class="help-block hide">Can't be empty</small></label>
						    <div class="col-sm-12"> 
						      	<input type="text" class="form-control" id="quantity" name="quantity" required> 
						    </div>
					  	</div>
				  	</div>
				  	<div class="col-md-6">
					  	<div class="form-group">
						    <label class="control-label col-sm-12" for="discount">Discount : <small class="help-block hide">Can't be empty</small></label>
						    <div class="col-sm-12"> 
						      	<input type="text" class="form-control" id="discount" name="discount" required> 
						    </div>
					  	</div>
				  	</div>
				  	<div class="col-md-6">
					  	<div class="form-group">
						    <label class="control-label col-sm-12" for="reorder_level">Re-Order Level : <small class="help-block hide">Can't be empty</small></label>
						    <div class="col-sm-12"> 
						      	<input type="text" class="form-control" id="reorder_level" name="reorder_level" required> 
						    </div>
					  	</div>
				  	</div>
		  		
		  	</div> 

        </div>

       
      
	  	 <div class="form-group">
			<div class="col-md-12">
				<button class="btn btn_add submit" type="submit" id="add_item">Add Item</button>
				<button class="btn btn-default" type="button">Cancel</button>
			</div> 
		</div>
    </form>
</div>

<script src="<?php echo base_url(); ?>assets/js/items/add_items.js"></script>