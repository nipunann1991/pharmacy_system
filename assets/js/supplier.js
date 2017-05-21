var ajaxStart = 0, ajaxStart1 = 0, ajaxStart2 = 0, ajaxStart3 = 0 ;
var lastIndex = 0;

$('select').select2();

getSuppliers();
getIndex(); 
setTimeout(function(){
  getSelectedSuppliers('1');
}, 100);
 


 
function getIndex(){

  if (ajaxStart2 === 0) {
      ajaxStart2 = 1; 

      $.ajax({
        url: baseUrl()+'api/supplier/get_suppliers_last_index',
        type: 'POST',
        dataType: 'json',
        data: { search_col: 'sup_id', table: 'supplier' },

        success: function(data){
        
           if (data.status==200) { 
              var index  = '';
              if (data.data.length == 0) {
                index = 1;
              }else{
                index = data.data[0].sup_id + 1;
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





var datatable = $('html #supplier_list').DataTable({ 

    "order": [], //Initial no order.
    "pageLength": 50, 
    "searching": true,
    "info": true,
    "deferRender": true, 
    "autoWidth": false, 
    dom: 'Bfrtip',
    buttons: [ 
      {
          extend:    'excelHtml5',
          text:      '<i class="fa fa-file-excel-o"></i>',
          titleAttr: 'Excel'
      },
      {
          extend:    'csvHtml5',
          text:      '<i class="fa fa-file-text-o"></i>',
          titleAttr: 'CSV'
      },
      {
          extend:    'pdfHtml5',
          text:      '<i class="fa fa-file-pdf-o"></i>',
          titleAttr: 'PDF',
          header: true,
          title: 'Employee Details',
          //orientation: 'landscape',
          customize: function(doc) {
            doc.defaultStyle.fontSize = 8; //<-- set fontsize to 16 instead of 10 
            doc.styles.tableHeader.fontSize = 8;
          }  
      },
      {
          extend:    'print',
          text:      '<i class="fa fa-print"></i>',
          titleAttr: 'Print'
      }
    ]


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
        
        var data = {sup_id: sup_id, sup_name: sup_name, dealer: dealer, nic: nic, sup_address: sup_address, tel: tel, fax: fax, email: email };
        console.log(data);
        addSupplier(data);

      }

    });  

  });


  $('html').on('click', '#edit_supplier', function(event) {
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

 

  function editItem(id){

    localStorage.setItem('edit', id ); 
    localStorage.setItem('page_url','supplier/edit-supplier');
    loadPage('supplier/edit-supplier');

  }


  $('html').on('change', '#edit_sup_id', function(event) {
    event.preventDefault();
    /* Act on the event */
    var selected_id =  $('#edit_sup_id :selected').val(); 
    getSelectedSuppliers(selected_id);

  });


 
    function addSupplier(dataset){ 

      if (ajaxStart === 0) {
        ajaxStart = 1;
         $.ajax({
            url: baseUrl()+'api/supplier/add_supplier',
            type: 'POST',
            dataType: 'json',
            data: dataset,
            success: function(data){
                alert('success');
                $('.form-control').val('');
                ajaxStart = 0;
               // getCategories();
            },
            error: function(data){

            } 
        });

      }
        
    }


   function editSupplier(dataset){ 

      if (ajaxStart3 === 0) {
        ajaxStart3 = 1;
         $.ajax({
            url: baseUrl()+'api/supplier/update_supplier',
            type: 'POST',
            dataType: 'json',
            data: dataset,
            success: function(data){
                alert('success'); 

                getSuppliers();
                getIndex(); 
                getSelectedSuppliers(dataset.id);
              
                ajaxStart3 = 0;
               // getCategories();
            },
            error: function(data){

            } 
        });

      }
        
    }

  function getSelectedSuppliers(id){

    if (ajaxStart1 === 0) {
        ajaxStart1 = 1;

        $.ajax({
          url: baseUrl()+'api/supplier/search_supplier',
          type: 'POST',
          dataType: 'json',
          data: { table: "supplier", data: 'sup_id = '+id,  },
        })
        .done(function(data) {
          console.log(data);

          if (data.status==200) {
              
            for (var i = 0; i < data.data.length; i++) {

              var sup_id = $('#edit_sup_id').val(data.data[0].sup_id);
              var sup_name = $('#edit_sup_name').val(data.data[0].sup_name);
              var dealer = $('#edit_dealer').val(data.data[0].dealer);
              var nic = $('#edit_nic').val(data.data[0].nic);
              var sup_address = $('#edit_sup_address').val(data.data[0].address);
              var tel = $('#edit_tel').val(data.data[0].tel);
              var fax = $('#edit_fax').val(data.data[0].fax);
              var email = $('#edit_email').val(data.data[0].email);
              
            }

            localStorage.removeItem('edit');
          }

          ajaxStart1 = 0;
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
    }
    
  }




  function getSuppliers(){
 
    if (ajaxStart === 0) {
        ajaxStart = 1;
        $.ajax({
          url: baseUrl()+'api/supplier/get_suppliers',
          type: 'POST',
          dataType: 'json',
          success: function(data){
              
            if (data.status===200) {
              var suppliers = data.data

               $('select#edit_sup_id').empty();

                datatable.destroy(); 
                var dataSet = []; 
                var selected = '';

                for (var i = 0; i < suppliers.length; i++) { 
                     var  buttons =  '<a href="javascript:void(0);" id="edit'+i+'" onclick="editItem('+suppliers[i].sup_id+')" ><i class="icon-pencil-edit-button" aria-hidden="true"></i></a>'
                                    +'<a href="javascript:void(0);" id="delete'+i+'" class="delete" data-id="'+suppliers[i].sup_id+'" ><i class="icon-rubbish-bin" aria-hidden="true"></i></a>'; 
                    dataSet.push([suppliers[i].sup_id, suppliers[i].sup_name, suppliers[i].dealer, suppliers[i].nic, suppliers[i].address, suppliers[i].tel, suppliers[i].fax, suppliers[i].email, buttons ]);
                    selected = '';

                    if (i===0) {
                      selected = 'selected';
                    }

                    $('select#edit_sup_id').append('<option value="'+suppliers[i].sup_id+'" '+selected+' >'+suppliers[i].sup_id+' ( '+suppliers[i].sup_name+' ) </option>');

                }
                 
                datatable = $('html #supplier_list').DataTable({  
                  data: dataSet
                });
              
            }

            ajaxStart = 0;

            
          },
          error: function(data){

          }
          

        });  
    }
 }
