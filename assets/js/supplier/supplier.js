var ajaxStart = 0, ajaxStart1 = 0,  ajaxStart3 = 0 ;
var lastIndex = 0;

$('select').select2();

getSuppliers();
 


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
    localStorage.setItem('page_url','edit_supplier');
    loadPage('edit_supplier');

  }

 


  function deleteItem(data_id){ 

     bootbox.confirm({
        title: "Delete Supplier",
        message: "Are you sure you want to delete this supplier ?",
        className: 'short_modal',
        buttons: {
            confirm: {
                label: 'Delete',
                className: 'btn_remove'
            },
            cancel: {
                label: 'Cancel',
                className: 'btn-default btn_cancel'
            }
        },
        callback: function (result) {
            
            if (result) {
              var dataset = {sup_id: data_id}
              deleteSupplier(dataset);
              return false;
            }


        }
    });


  }



  function deleteSupplier(dataset){ 

    if (ajaxStart === 0) {
        ajaxStart = 1;
         $.ajax({
            url: baseUrl()+'/supplierController/deleteSupplier',
            type: 'POST',
            dataType: 'json',
            data: dataset,
            success: function(data){
              console.log('success++++++++33');
              alert('success');
               // $('.form-control').val('');
                getSuppliers();
                ajaxStart = 0;
               // getCategories();
            },
            error: function(data){

            } 
        });

      }

      return false;

  }
  


  function getSuppliers(){
 
    if (ajaxStart === 0) {
        ajaxStart = 1;
        $.ajax({
          url: baseUrl()+'/supplierController/getSuppliers',
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
                                    +'<a href="javascript:void(0);" id="delete'+i+'" onclick="deleteItem('+suppliers[i].sup_id+')" class="delete" data-id="'+suppliers[i].sup_id+'" ><i class="icon-rubbish-bin" aria-hidden="true"></i></a>'; 
                    dataSet.push([suppliers[i].sup_id, suppliers[i].sup_name, suppliers[i].dealer, suppliers[i].nic, suppliers[i].address, suppliers[i].tel, suppliers[i].fax, suppliers[i].email, buttons ]);
                    selected = '';

                   
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
