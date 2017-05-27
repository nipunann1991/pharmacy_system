var ajaxStart1 = 0, ajaxStart2 = 0;

$('select').select2();

getLastIndex(); 



$('html').on('click', '#cancel', function(event) {
    event.preventDefault(); 
    $('#view_add_supplier').trigger('click');
});


$('html').on('click', '#add_supplier', function(event) {
    //event.preventDefault();

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

        var sup_id = $('#sup_id').val();
        var sup_name = $('#sup_name').val();
        var dealer = $('#dealer').val();
        var nic = $('#nic').val();
        var sup_address = $('#sup_address').val();
        var tel = $('#tel').val();
        var fax = $('#fax').val();
        var email = $('#email').val();
        
        var data = {sup_id: sup_id, sup_name: sup_name, dealer: dealer, nic: nic, address: sup_address, tel: tel, fax: fax, email: email };
        //console.log(data);
        addSupplier(data);

      }

    });  

});

 

function getLastIndex(){

  if (ajaxStart2 === 0) {
      ajaxStart2 = 1; 

      $.ajax({
        url: baseUrl()+'/supplierController/getLastIndex',
        type: 'POST',
        dataType: 'json',
        data: { search_col: 'sup_id', table: 'supplier' },

        success: function(data){
        
           if (data.status==200) { 
              var index  = '';
              if (data.data.length == 0) {
                index = 1;
              }else{
                index = parseInt(data.data[0].sup_id) + 1; 
              }

            $('#sup_id').val(index);
           }

           ajaxStart2 = 0;
        },
        error: function(data){

        } 

      });

  }
 
}


function addSupplier(dataset){ 

    if (ajaxStart === 0) {
      ajaxStart = 1;
       $.ajax({
          url: baseUrl()+'/supplierController/addSupplier',
          type: 'POST',
          dataType: 'json',
          data: dataset,
          success: function(data){
              alert('success');
              $('.form-control').val('');
              getSuppliers();
              ajaxStart = 0;
             
          },
          error: function(data){

          } 
      });

    }
      
  }