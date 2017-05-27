
var ajaxStart = 0;
var edit_id = 1; 

if (typeof edit_id !== 'undefined') {
	edit_id = localStorage.getItem('edit');
} 


getSupplierList();
getSingleSupplier(edit_id); 




$('html').on('change', '#edit_sup_id', function(event) { 
	getSingleSupplier($(this).val());

});

$('html').on('click', '#cancel', function(event) {
    event.preventDefault(); 
    $('#view_add_supplier').trigger('click');
     
});



$('html').on('click', '#edit_supplier', function(event) {
     
    $("#commentForm").validate({

      rules: {
        sup_id: { 
          minlength: 2,
          number: true
        }
      },

      messages: {
        sup_id: { 
          minlength: jQuery.validator.format("At least {0} characters required!"),
          number: 'Please enter numeric values only'
        }
      },

      submitHandler: function(form) {
        event.preventDefault();

        var sup_id = $('#edit_sup_id').val();
        var sup_name = $('#edit_sup_name').val();
        var dealer = $('#edit_dealer').val();
        var nic = $('#edit_nic').val();
        var sup_address = $('#edit_sup_address').val();
        var tel = $('#edit_tel').val();
        var fax = $('#edit_fax').val();
        var email = $('#edit_email').val();
        
        var data = { id: sup_id, values: 'sup_id = "'+sup_id+'", sup_name = "'+sup_name+'", dealer = "'+dealer+'", nic = "'+nic+'", address = "'+sup_address+'", tel = "'+tel+'", fax = "'+fax+'", email = "'+email+'"' };
     
        editSupplier(data);

      }

    });  

});

function getSupplierList(){
	$.ajax({
        url: baseUrl()+'/supplierController/getSupplierList',
        type: 'POST',
        dataType: 'json', 
        success: function(data){

        	var supplierData = []; 
        	var supplier_list = data.data;

        	supplier_list.forEach(function(supplier) { 
        		supplierData.push({ id: supplier.sup_id, text: supplier.sup_id+' - '+supplier.sup_name });  
			});			

        	$('select#edit_sup_id').select2({
        		data: supplierData
        	}); 

        	$('#edit_sup_id').val(edit_id).trigger("change");
        },
        error: function(data){

        } 
    });
}

function getSingleSupplier(select_id){ 

	if (ajaxStart==0) {
		ajaxStart = 1;
	 
      	$.ajax({
            url: baseUrl()+'/supplierController/getSingleSupplier',
            type: 'POST',
            dataType: 'json',
            data: {sup_id: select_id},
            success: function(data){
                
                console.log(data);

                var edit_supplier = data.data[0]; 

 				//$('#edit_sup_id').val(edit_supplier.sup_id);
                $('#edit_sup_name').val(edit_supplier.sup_name);
                $('#edit_dealer').val(edit_supplier.dealer);
                $('#edit_nic').val(edit_supplier.nic);
                $('#edit_nic').val(edit_supplier.nic);
                $('#edit_sup_address').val(edit_supplier.address);
                $('#edit_tel').val(edit_supplier.tel);
                $('#edit_fax').val(edit_supplier.fax);
                $('#edit_email').val(edit_supplier.email); 

                ajaxStart = 0;
            },
            error: function(data){

            } 
        });
    

    }



     return false;

}


   function editSupplier(dataset){  
    
         $.ajax({
            url: baseUrl()+'/supplierController/updateSupplier',
            type: 'POST',
            dataType: 'json',
            data: dataset,
            success: function(data){
                alert('success'); 

                loadPage('edit_supplier');
                
                
            },
            error: function(data){

            } 
        });

    
        
    }