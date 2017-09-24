<div ng-controller="addItemsCtrl" class="page_inner {{animated_class}}">
	<div class="head">
		<div class="top"> 
			<h2>{{title}}</h2>
	  		<span class="breadcrumb">{{breadcrumb}}</span>
	  		<div class="clearfix"></div>
		</div>  
	   
		<md-button ng-click="navigateTo('items')"><i class="icon-list-with-dots" aria-hidden="true"></i> View Items</md-button>
	</div>
	<div class="body"> 

	 
	 
		
	    <form class="form-horizontal" name="addItemForm" id="commentForm" > 
 				 
	    	<div class="col-md-3">
	    		<div class="item_img row">
	    			<input type="file" file-model="myFile" id="imgInp" >
	    		</div>

	    	</div> 
	        <div class="col-md-9"> 
	        	<div class="row_">
		            <div class="col-md-4">
			 			<div class="form-group">
						    <label class="control-label col-sm-12" for="item_id">Item ID : <small class="help-block hide ">Must be a numeric value</small></label>
						    <div class="col-sm-12" ng-class="{ 'has-error' : !addItemForm.item_id.$pristine && addItemForm.item_id.$touched && addItemForm.item_id.$invalid }">
						      <input type="text" class="form-control" id="item_id" name="item_id" ng-model="item_id"  required>  
						      <label class="error" >This field is required.</label>  
						    </div>
					  	</div>
			 		</div> 
			 		<div class="col-md-4">
					  	<div class="form-group" ng-class="{ 'has-error' : addItemForm.category.$touched && addItemForm.category.$invalid }">
						    <label class="control-label col-sm-12" for="category">Category : <small class="help-block hide">Can't be empty</small></label>
						    <div class="col-sm-12"> 
						    	<select class="form-control" id="category" name="category" ng-model="category" required>
						    		<option ng-repeat="gcl in getCategoryList" value="{{gcl.id}}">{{gcl.id}} - {{gcl.cat_name}}</option> 
						    	</select>
						    	<label class="error">This field is required.</label> 
						    </div>
					  	</div>
				  	</div>
				  	<div class="col-md-4">
					  	<div class="form-group" ng-class="{ 'has-error' : addItemForm.supplier.$touched && addItemForm.supplier.$invalid }">
						    <label class="control-label col-sm-12" for="supplier">Supplier : <small class="help-block hide">Can't be empty</small></label>
						    <div class="col-sm-12">  
						      	<select class="form-control" id="supplier" name="supplier" ng-model="supplier" required>
						      		<option ng-repeat="gsl in getSupplierList" value="{{gsl.sup_id}}"> {{gsl.sup_id}} -  {{gsl.sup_name}}</option> 
						      	</select> 
						      	<label class="error">This field is required.</label> 
						    </div>
					  	</div>
				  	</div> 
				  	<div class="clearfix"></div>
				</div>
			  	<div class="row_">
			  		<div class="col-md-6">
					  	<div class="form-group" ng-class="{ 'has-error' : addItemForm.item_name.$touched && addItemForm.item_name.$invalid }">
						    <label class="control-label col-sm-12" for="item_name">Item Name : <small class="help-block hide">Can't be empty</small></label>
						    <div class="col-sm-12"> 
						      	<input type="text" class="form-control" id="item_name" name="item_name" ng-model="item_name"  required> 
						      	<label class="error">This field is required.</label>
						    </div>
					  	</div>
				  	</div> 
				  	<div class="col-md-6">
				  		<div class="form-group">
						  	<div class="checkbox related_input">
							  	<label><input type="checkbox" id="use_item_display_name" ng-model="use_item_display_name" ng-change="checked(use_item_display_name)" value="">Use same as Item Display Name.</label> 
							</div>
						</div>
				  	</div>
			  		<div class="clearfix"></div>
			  	</div> 
			  	<div class="row_"> 
				  	<div class="col-md-6">
			 			<div class="form-group" ng-class="{ 'has-error' : addItemForm.item_display_name.$touched && addItemForm.item_display_name.$invalid }">
						    <label class="control-label col-sm-12" for="item_display_name">Item Display Name : <small class="help-block hide ">Must be a numeric value</small></label>
						    <div class="col-sm-12">
						      <input type="text" class="form-control" id="item_display_name" name="item_display_name" ng-model="item_display_name" required>  
						      <label class="error">This field is required.</label>
						    </div>
					  	</div>
			 		</div>
				  	<div class="clearfix"></div>
		        </div>
		 		
			  	
				 
	        </div>
	         
	        

			<!-- price -->
	        <div class="col-md-12 price_column">
	        	<!-- <div class="col-md-12 divider"></div> -->

				<div class="col-md-12">
					<div class="col-md-12">
						<h3>Initial Stock Details</h3> 
					</div>
					<div class="col-md-6">
			 			<div class="form-group" ng-class="{ 'has-error' : addItemForm.barcode.$touched && addItemForm.barcode.$invalid }">
						    <label class="control-label col-sm-12" for="barcode">Barcode No : <small class="help-block hide ">Can't be empty</small></label>
						    <div class="col-sm-12">
						      <input type="text" class="form-control" id="barcode" name="barcode" ng-model="barcode"  ng-change="getBarcode()" required>  
						      <label class="error">This field is required.</label> 
						    </div>
					  	</div>
			 		</div> 
		 			<div class="col-md-6">
					  	<div class="form-group">
						    <label class="control-label col-sm-12" for="manufacture_id">Manufacture ID : <small class="help-block hide">Can't be empty</small></label>
						    <div class="col-sm-12"  > 
						      	<input type="text" class="form-control" id="manufacture_id" name="manufacture_id" ng-model="manufacture_id" >
						      	<label class="error">This field is required.</label>  
						    </div>
					  	</div>
				  	</div>
				</div>
	        	<div class="col-md-8">

	        		<div class="row_">
			            <div class="col-md-6">
				 			<div class="form-group" ng-class="{ 'has-error' : addItemForm.buy_price.$touched && addItemForm.buy_price.$invalid }">
							    <label class="control-label col-sm-12" for="buy_price">Buying Price : <small class="help-block hide ">Must be a numeric value</small></label>
							    <div class="col-sm-12">
							      	<input type="number" class="form-control" id="buy_price" name="buy_price" ng-model="buy_price"  required>  
							      	<label class="error">This field is required.</label> 
							    </div> 
						  	</div>
				 		</div> 
					  	<div class="col-md-6">
						  	<div class="form-group" ng-class="{ 'has-error' : addItemForm.sell_price.$touched && addItemForm.sell_price.$invalid }">
							    <label class="control-label col-sm-12" for="sell_price">Selling Price : <small class="help-block hide">Can't be empty</small></label>
							    <div class="col-sm-12"> 
							      	<input type="number" step=".01"  class="form-control" id="sell_price" name="sell_price" ng-model="sell_price" required> 
							      	<label class="error">This field is required.</label> 
							    </div>
						  	</div>
					  	</div> 
					</div>
					<div class="col-md-12"> 
						<div class="col-sm-12"> 
							<div class="form-group">
							  	<div class="checkbox options">
								  	<label><input type="checkbox" value="" id="calc_item" ng-model="calc_item" ng-change="checked()" >Calculate Item.</label>
								</div>
								<div class="checkbox options">
								  	<label><input type="checkbox" value="" id="price_changable" ng-model="price_changable" ng-change="checked()" >Price is changable on sale.</label>
								</div> 
							</div> 
						</div>
					</div>
					<svg id="code128" class=barcode></svg>
				  	<div class="clearfix"></div>

				</div>
				<div class="col-md-4">

						<div class="col-md-6">
						  	<div class="form-group">
							    <label class="control-label col-sm-12" for="quantity">Quantity : <small class="help-block hide">Can't be empty</small></label>
							    <div class="col-sm-12"> 
							      	<input type="number" class="form-control" id="quantity" name="quantity" ng-model="quantity"  value="1" min="1" > 
							    </div>
						  	</div>
					  	</div>
					  	<div class="col-md-6">
						  	<div class="form-group">
							    <label class="control-label col-sm-12" for="reorder_level">Re-Order Level : <small class="help-block hide">Can't be empty</small></label>
							    <div class="col-sm-12"> 
							      	<input type="number" class="form-control" value="1" min="1" class="form-control" id="reorder_level" name="reorder_level" required> 
							    </div>
						  	</div>
					  	</div>
					  	<div class="col-md-12">
						  	<div class="form-group">
							    <label class="control-label col-sm-12" for="discount">Discount : <small class="help-block hide">Can't be empty</small></label>
							    <div class="col-sm-6"> 
							      	<input type="number" class="form-control" value="0" min="0" id="discount" name="discount" ng-model="discount" required>  
							    </div>
							    <div class="col-sm-4 padding0">
							    	<select name="discount_type"  class="form-control" id="discount_type" ng-model="discount_type" >
							      		<option value="1">Rs.</option>
							      		<option value="2">%</option>
							      	</select>
							    </div>
						  	</div>
					  	</div>

					  	<div class="col-sm-12 net_price">

					  		<p>Net Amount</p>
					  		<h3><span id="sell_price">{{  net_price() | currency : "Rs. " : 2 }} </span></h3>
					  	</div>
					  	
			  		
			  	</div> 

	        </div>

	       
	      
		  	 <div class="form-group" >
				<div class="col-md-12"  ng-hide="addItemForm.$invalid"> 
					<md-button class="btn_add" type="button" id="add_item" ng-click="addItem()">Add Item</md-button>
					<md-button class="btn-default" ng-click="close()">Close</md-button>

					<!-- <button class="btn btn_add submit" type="submit" id="add_item">Add Item</button> 
					<button class="btn btn-default" type="button">Cancel</button> -->
				</div> 
			</div>
	    </form>
	</div>
</div>
