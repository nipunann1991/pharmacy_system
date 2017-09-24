<div ng-controller="ItemsStockCtrl" class="page_inner {{animated_class}}">
	<div class="head">
		<div class="top"> 
			<h2>View Item &amp; Stock </h2>
	  		<span class="breadcrumb">{{breadcrumb}}</span>
	  		<div class="clearfix"></div>
		</div> 

	  	<div class="mid">
	  		<a href="" id="edit{{gis.item_id}}" class="edit" ng-click="editItem(item_id)"><i class="icon-pencil-edit-button" aria-hidden="true"></i></a>
	  		<div class="col-md-3">
	    		<div class="item_img row">
	    			<input type="file" file-model="myFile" id="imgInp" >
	    		</div>
	    	</div>
	        <div class="col-md-9">
	        	<h2>{{item_display_name}} </h2>
	        	<p>{{item_name}}</p>
	        	<ul> 
	        		<li><strong>Categoty ID: </strong> {{category_id}}</li>
	        		<li><strong>Categoty Name: </strong> {{category_name}}</li>
	        		<!-- <li><strong>Supplier ID: </strong>{{supplier_id}}</li>
	        		<li><strong>Supplier Name: </strong>{{supplier_name}}</li> -->
	        		
	        	</ul>
	        </div>
	        <div class="clearfix"></div>
	  	</div>
		
		<md-button ng-click="navigateTo('items')" ><i class="icon-list-with-dots" aria-hidden="true"></i> View Items</md-button>
		<md-button ng-click="openModalAddStock()" ><i class="icon-plus-sign-in-a-black-circle" aria-hidden="true"></i> Add New Stock</md-button>


	</div>
 
	<div class="body">  
	    <table datatable="ng" class="row-border hover table table-responsive table-bordered table-striped">
		    <thead>
			    <tr>
			        <th>Barcode</th>
			        <th>Purchase Date Time</th>
			        <th title="Manufacture Id">ManID</th>  
			        <th>Supplier Name</th>
			        <th>Purchased Qty</th>  
			        <th>Current Qty</th> 
			        <th>Re-Order</th> 
			        <th>Buy Price (Rs)</th> 
			        <th>Selling Price (Rs)</th> 
			        <th>Discount</th>
			        <th>Net Amount (Rs)</th>
			        <th ng-if="role_access"> </th>
			    </tr>
		    </thead>
		    <tbody>
			    <tr ng-repeat="gis in getSingleIteminStock" > <!-- ng-class="{ 'active_item' : gis.archived ==  '0'}" -->
			        <td> <a href="#items/view-barcode/{{gis.barcode}}">{{gis.barcode}}</a></td> 
			        <td>{{gis.purchase_date}}</td>
			        <td>{{gis.manufacture_id}}</td>
			        <td>{{gis.sup_name}}</td>
			        <td>{{gis.quantity}}</td>  
			        <td>
			        	<span class="" ng-class="{ 'cut_off' : gis.archived ==  '1',  'label label-success' : gis.archived ==  '0' }"  >{{gis.curr_quantity}}</span>
  
			        </td> 
			        <td>{{gis.reorder_level}}</td> 
			        <td class="text-right">{{ gis.buy_price | currency : "" : 2 }}</td>
			        <td class="text-right">{{ gis.sell_price | currency : "" : 2 }}</td>
			        <td class="text-right">{{ displayDiscount( gis.discount , gis.discount_type) }}</td>
			        <td class="text-right">{{ gis.net_amount | currency : "" : 2 }}</td>
			      <!--    <td class="txt_right">{{  }}</td>
			        <td class="txt_right">{{ displayDiscount( gi.discount , gi.discount_type) }}</td>  -->
			       <!--  <td class="txt_right">{{  gi.net_amount | currency : "" : 2 }}</td> -->

			        <td ng-if="role_access"> 
			        	<span ng-if="gis.archived == '0'">	
 						<a href="" id="edit{{gis.stock_id}}" title="Edit Stock" class="edit" ng-click="openEditStockModal(gis.stock_id)"><i class="icon-pencil-edit-button" aria-hidden="true"></i></a><a href="" title="Delete Stock" id="delete{{gis.stock_id}}" ng-click="deleteItem(gis.stock_id)" class="delete" ><i class="icon-rubbish-bin" aria-hidden="true"></i></a>
 						</span>
			        </td>
			    </tr>

		    </tbody>
		</table>


	<div id="myModalAdd" class="modal fade" role="dialog">
	  	<div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	    
	      	<div class="modal-header hide">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Add New Item to Stock</h4>
	      	</div>

	      	<div class="modal-body">
				<h2>Add New Item to Stock</h2>
	            <form class="form-horizontal" name="addItemStockForm" id="commentForm" > 
	              	<div class="price_column">
	              		<div class="row_">
	              			<div class="col-md-6">
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
		                      <div class="form-group" ng-class="{ 'has-error' : addItemStockForm.barcode.$touched && addItemStockForm.barcode.$invalid }">
		                          <label class="control-label col-sm-12" for="barcode">Barcode No : <small class="help-block hide ">Can't be empty</small></label>
		                          <div class="col-sm-12">

		                            <input type="text" class="form-control" id="barcode" name="barcode" ng-model="barcode" required>  
		                            <label class="error">This field is required.</label> 
		                          </div>

		                        </div>
		                    </div> 

		                   	<div class="col-md-6">
		                        <div class="form-group">
		                          <label class="control-label col-sm-12" for="manufacture_id">Manufacture ID : <small class="help-block hide">Can't be empty</small></label>
		                          <div class="col-sm-12"  ng-class="{ 'has-error' : addItemStockForm.manufacture_id.$touched && addItemStockForm.manufacture_id.$invalid }"> 
		                              <input type="text" class="form-control" id="manufacture_id" name="manufacture_id" ng-model="manufacture_id" required>
		                              <label class="error">This field is required.</label>  
		                          </div>
		                        </div>
		                    </div>
		                    <div class="clearfix"></div>
	                  	</div>

	                   	 
	                    <div class="row_"> 
	                        <div class="col-md-6">
		                        <div class="form-group" ng-class="{ 'has-error' : addItemStockForm.buy_price.$touched && addItemStockForm.buy_price.$invalid }">
		                            <label class="control-label col-sm-12" for="buy_price">Buying Price : <small class="help-block hide ">Must be a numeric value</small></label>
		                            <div class="col-sm-12">
		                                <input type="number" class="form-control" id="buy_price" name="buy_price" ng-model="buy_price"  required>  
		                                <label class="error">This field is required.</label> 
		                            </div> 
		                          </div>
		                      </div>                   
	                        <div class="col-md-6">
		                        <div class="form-group" ng-class="{ 'has-error' : addItemStockForm.sell_price.$touched && addItemStockForm.sell_price.$invalid }">
		                            <label class="control-label col-sm-12" for="sell_price">Selling Price : <small class="help-block hide">Can't be empty</small></label>
		                            <div class="col-sm-12"> 
		                                <input type="number" step=".01"  class="form-control" id="sell_price" name="sell_price" ng-model="sell_price" required> 
		                                <label class="error">This field is required.</label> 
		                            </div>
		                          </div>
		                    </div> 

		                    <div class="clearfix"></div>
	                	</div>

	                    <div class="col-md-12"> 
		                    <div class="col-sm-12"> 
		                        <div class="form-group">
		                            <div class="checkbox options">
		                             	<md-checkbox aria-label="calc_item" ng-model="calc_item"  >Calculate Item 
		                              	</md-checkbox> 
		                           	</div>
		                           	<div class="checkbox options">
		                              	<md-checkbox  aria-label="price_changable"  ng-model="price_changable" >Price is changable on sale.</md-checkbox>
		                          </div> 
		                        </div> 
		                    </div>
	                    </div>
	                  	<div class="clearfix"></div>  
						
						<div class="row_">
		                    <div class="col-md-4">
		                        <div class="form-group">
		                            <label class="control-label col-sm-12" for="quantity">Quantity : <small class="help-block hide">Can't be empty</small></label>
		                            <div class="col-sm-12"> 
		                                <input type="number" class="form-control" id="quantity" name="quantity" ng-model="quantity"  value="1" min="1" > 
		                            </div>
		                        </div>
		                    </div>
		                    <div class="col-md-4">
		                        <div class="form-group">
		                            <label class="control-label col-sm-12" for="reorder_level">Re-Order Level : <small class="help-block hide">Can't be empty</small></label>
		                            <div class="col-sm-12"> 
		                                <input type="number" class="form-control" value="1" min="1" class="form-control" id="reorder_level" name="reorder_level" ng-model="reorder_level" required> 
		                            </div>
		                        </div>
		                    </div>
		                    <div class="col-md-4">
		                        <div class="form-group">
		                            <label class="control-label col-sm-12" for="discount">Discount : <small class="help-block hide">Can't be empty</small></label>
		                            <div class="col-sm-6"> 
		                                <input type="number" class="form-control" value="0" min="0" id="discount" name="discount" ng-model="discount" required>  
		                            </div>
		                            <div class="col-sm-6 padding0">
		                              <select name="discount_type"  class="form-control" id="discount_type" ng-model="discount_type" >
		                                  <option ng-repeat="dtv in discount_type_vals" value="{{dtv.id}}" ng-selected="{{dtv.id==1}}">{{dtv.value}}</option>
		                                </select>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="col-md-6">
		                    	<svg id="code128" class=barcode></svg>
		                    </div>
		                    <div class="col-sm-6 net_price"> 
		                      	<p>Net Amount</p>
		                      	<h3 style="margin-bottom: 0"><span id="sell_price">{{  net_price() | currency : "Rs. " : 2 }} </span></h3>
		                    </div> 
		                </div>
		                <div class="clearfix"></div>
	                </div>
	              </form>
	            <div class="clearfix"></div>
	      </div>
	      <div class="modal-footer" ng-hide="addItemStockForm.$invalid">

	      	<md-button class="btn_add" type="button" id="edit_item"  ng-click="addStockItem(stock_id)">Add Stock</md-button>
			<md-button class="btn-default"  data-dismiss="modal">Close</md-button>

	        
	      </div>
	    </div>

	  </div>
	</div>
 

	<div id="myModalEdit" class="modal fade" role="dialog">
	  	<div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	    
	      	<div class="modal-header hide">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Edit Item Stock</h4>
	      	</div>

	      	<div class="modal-body">
				<h2>Edit Item Stock</h2>
	            <form class="form-horizontal" name="editItemStockForm" id="commentForm" > 
	              	<div class="price_column">
	                  	<div class="row_">
		                    <div class="col-md-6">
		                      <div class="form-group" ng-class="{ 'has-error' : editItemStockForm.barcode.$touched && editItemStockForm.barcode.$invalid }">
		                          <label class="control-label col-sm-12" for="barcode">Barcode No : <small class="help-block hide ">Can't be empty</small></label>
		                          <div class="col-sm-12">

		                            <input type="text" class="form-control" id="barcode" name="barcode" disabled ng-model="barcode" required>  
		                            <label class="error">This field is required.</label> 
		                          </div>

		                        </div>
		                    </div> 
		                   	<div class="col-md-6">
		                        <div class="form-group">
		                          <label class="control-label col-sm-12" for="manufacture_id">Manufacture ID : <small class="help-block hide">Can't be empty</small></label>
		                          <div class="col-sm-12"  ng-class="{ 'has-error' : editItemStockForm.manufacture_id.$touched && editItemStockForm.manufacture_id.$invalid }"> 
		                              <input type="text" class="form-control" id="manufacture_id" name="manufacture_id" ng-model="manufacture_id" required>
		                              <label class="error">This field is required.</label>  
		                          </div>
		                        </div>
		                    </div>
		                    <div class="clearfix"></div>
	                  	</div>

	                   	 
	                    <div class="row_"> 
	                        <div class="col-md-6">
		                        <div class="form-group" ng-class="{ 'has-error' : editItemStockForm.buy_price.$touched && editItemStockForm.buy_price.$invalid }">
		                            <label class="control-label col-sm-12" for="buy_price">Buying Price : <small class="help-block hide ">Must be a numeric value</small></label>
		                            <div class="col-sm-12">
		                                <input type="number" class="form-control" id="buy_price" name="buy_price" ng-model="buy_price"  required>  
		                                <label class="error">This field is required.</label> 
		                            </div> 
		                          </div>
		                      </div>                   
	                        <div class="col-md-6">
		                        <div class="form-group" ng-class="{ 'has-error' : editItemStockForm.sell_price.$touched && editItemStockForm.sell_price.$invalid }">
		                            <label class="control-label col-sm-12" for="sell_price">Selling Price : <small class="help-block hide">Can't be empty</small></label>
		                            <div class="col-sm-12"> 
		                                <input type="number" step=".01"  class="form-control" id="sell_price" name="sell_price" ng-model="sell_price" required> 
		                                <label class="error">This field is required.</label> 
		                            </div>
		                          </div>
		                    </div> 
		                    <div class="clearfix"></div>
	                	</div>

	                    <div class="col-md-12"> 
		                    <div class="col-sm-12"> 
		                        <div class="form-group">
		                            <div class="checkbox options">
		                             	<md-checkbox aria-label="calc_item" ng-model="calc_item"  >Calculate Item 
		                              	</md-checkbox> 
		                           	</div>
		                           	<div class="checkbox options">
		                              	<md-checkbox  aria-label="price_changable"  ng-model="price_changable" >Price is changable on sale.</md-checkbox>
		                          </div> 
		                        </div> 
		                    </div>
	                    </div>
	                  	<div class="clearfix"></div>  
						
						<div class="row_">
		                    <div class="col-md-4">
		                        <div class="form-group">
		                            <label class="control-label col-sm-12" for="quantity">Quantity : <small class="help-block hide">Can't be empty</small></label>
		                            <div class="col-sm-12"> 
		                                <input type="number" class="form-control" id="quantity" name="quantity" ng-model="quantity"  value="1" min="1" > 
		                            </div>
		                        </div>
		                    </div>
		                    <div class="col-md-4">
		                        <div class="form-group">
		                            <label class="control-label col-sm-12" for="reorder_level">Re-Order Level : <small class="help-block hide">Can't be empty</small></label>
		                            <div class="col-sm-12"> 
		                                <input type="number" class="form-control" value="1" min="1" class="form-control" id="reorder_level" name="reorder_level" ng-model="reorder_level" required> 
		                            </div>
		                        </div>
		                    </div>
		                    <div class="col-md-4">
		                        <div class="form-group">
		                            <label class="control-label col-sm-12" for="discount">Discount : <small class="help-block hide">Can't be empty</small></label>
		                            <div class="col-sm-6"> 
		                                <input type="number" class="form-control" value="0" min="0" id="discount" name="discount" ng-model="discount" required>  
		                            </div>
		                            <div class="col-sm-6 padding0">
		                              <select name="discount_type"  class="form-control" id="discount_type" ng-model="discount_type" >
		                                  <option ng-repeat="dtv in discount_type_vals" value="{{dtv.id}}" ng-selected="discount_type == dtv.id">{{dtv.value}}</option>
		                                </select>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="col-md-6">
		                    	<svg id="code128" class=barcode></svg>
		                    </div>
		                    <div class="col-sm-6 net_price">
		                      	<p>Net Amount</p>
		                      	<h3 style="margin-bottom: 0"><span id="sell_price">{{  net_price() | currency : "Rs. " : 2 }} </span></h3>
		                    </div> 
		                </div>
		                <div class="clearfix"></div>
	                </div>
	              </form>
	            <div class="clearfix"></div>
	      </div>
	      <div class="modal-footer">

	      	<md-button class="btn_add" type="button" id="edit_item"   ng-click="editStockItem(stock_id)">Edit Stock</md-button>
			<md-button class="btn-default"  data-dismiss="modal">Close</md-button>

	        
	      </div>
	    </div>

	  </div>
	</div>

			 
	</div>
</div>


