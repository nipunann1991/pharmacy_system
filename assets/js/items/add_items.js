var ajaxStart1 = 0, ajaxStart2 = 0;

getLastIndex(); 
getCategoryList();
getSupplierList();


$('html').on('change', '#use_item_display_name', function(event) {
	event.preventDefault(); 

	if($(this).is(':checked')){ 
	    $('#item_display_name').val( $('#item_name').val() );
	}
	 
	     
		
});

 
function getLastIndex(){

  if (ajaxStart2 === 0) {
      ajaxStart2 = 1; 

      $.ajax({
        url: baseUrl()+'/itemsController/getLastIndex',
        type: 'POST',
        dataType: 'json', 

        success: function(data){
        
           if (data.status==200) { 
	            var index  = '';
	            if (data.data.length == 0) {
	                index = 1;
	            }else{
	                index = parseInt(data.data[0].item_id) + 1; 
	            } 

            	$('#item_id').val(index);
           }

           ajaxStart2 = 0;
        },
        error: function(data){

        } 

      });

  }
 
}


function getCategoryList(){
	$.ajax({
        url: baseUrl()+'/itemsController/getCategoryList',
        type: 'POST',
        dataType: 'json', 
        success: function(data){

        	console.log(data)

        	var categoryData = []; 
        	var category_list = data.data;

        	category_list.forEach(function(category) { 
        		categoryData.push({ id: category.id, text: category.id+' - '+category.cat_name });  
			});			

        	$('select#category').select2({
        		data: categoryData
        	}); 

        	 
        },
        error: function(data){

        } 
    });
}


function getSupplierList(){
	$.ajax({
        url: baseUrl()+'/itemsController/getSupplierList',
        type: 'POST',
        dataType: 'json', 
        success: function(data){

        	var supplierData = []; 
        	var supplier_list = data.data;

        	supplier_list.forEach(function(supplier) { 
        		supplierData.push({ id: supplier.sup_id, text: supplier.sup_id+' - '+supplier.sup_name });  
			});			

        	$('select#supplier').select2({
        		data: supplierData
        	}); 

        	 
        },
        error: function(data){

        } 
    });
}