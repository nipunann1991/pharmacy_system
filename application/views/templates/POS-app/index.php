
<div ng-controller="posAppCtrl" class="page_inner {{animated_class}}">
	<div class="head hide">
		<div class="top"> 
			<h2>{{title}}</h2>
	  		<span class="breadcrumb">{{breadcrumb}}</span>
	  		<div class="clearfix"></div>
		</div> 
	  	 

	 
	</div>
 
	<div class="body"> 
		<div class="row">
			<div class="col-md-7">
				
				<div class="pos_item" ng-repeat="gi in getItems">
					<div class="pos_item_img" style="background-image: url('{{gi.image_url}}');"></div>
					<div class="pos_item_details">
						<span class="title">{{gi.item_display_name}}</span>
						<span class="category">Biscuit</span>

					</div>
				</div>

			</div>
			<div class="col-md-5">
				
				<table  class="row-border hover table table-responsive table-bordered table-striped">
				    <thead>
					    <tr> 
					        <th>Barcode</th>
					        <th>Item Name</th>
					        <th>Qty</th>
					        <th>Total</th> 
					        <th> </th>
					    </tr>
				    </thead>
				    <tbody>
					    <tr> <!-- ng-class="{ 'active_item' : gis.archived ==  '0'}" datatable="ng"  -->
					        <td>0453080787687</td>
					        <td>Tikiri Marie</td>
					        <td>1</td>
					        <td>30.00</td> 
					        <td> </td>
					    </tr>

				    </tbody>
				</table>


			</div>

			<div class="clearfix"></div>
		</div>
	</div>	

</div>





