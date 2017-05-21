 

$('select').select2();

getCategories();
getSuppliers();


$('html').on('click', '#add_item', function(event) {
    //event.preventDefault();

    $("#commentForm").validate({

      rules: {
        item_id: { 
          minlength: 2,
          number: true
        }
      },

      messages: {
        item_id: { 
          minlength: jQuery.validator.format("At least {0} characters required!"),
          number: 'Please enter numeric values only'
        }
      },

      submitHandler: function(form) {
        event.preventDefault();

        // var sup_id = $('#sup_id').val();
        // var sup_name = $('#sup_name').val();
        // var dealer = $('#dealer').val();
        // var nic = $('#nic').val();
        // var sup_address = $('#sup_address').val();
        // var tel = $('#tel').val();
        // var fax = $('#fax').val();
        // var email = $('#email').val();
        
        // var data = {sup_id: sup_id, sup_name: sup_name, dealer: dealer, nic: nic, sup_address: sup_address, tel: tel, fax: fax, email: email };
        // console.log(data);
        // addSupplier(data);

      }

    });  

});


function getCategories(){
 

	$.ajax({
		url: baseUrl()+'api/items/get_categories_list',
		type: 'POST',
		dataType: 'json',
		success: function(data){
        	
           	if (data.status==200) { 
               var categories = data.data;

               for (var i = 0; i < categories.length ; i++) {
               	 $('#category').append('<option value="'+categories[i].id+'">'+categories[i].cat_name+'</option>')
               }

           	}
 
        },
        error: function(data){

        } 

	});
	
}

function getSuppliers(){
 

	$.ajax({
		url: baseUrl()+'api/items/get_suppliers_list',
		type: 'POST',
		dataType: 'json',
		success: function(data){
        	
           	if (data.status==200) { 
               var supplier = data.data;

               for (var i = 0; i < supplier.length ; i++) {
               	 $('#supplier').append('<option value="'+supplier[i].sup_id+'">'+supplier[i].sup_name+'</option>')
               }

           	}
 
        },
        error: function(data){

        } 

	});
	
}