
//$('#myForm').validator();
var ajaxStart = 0;
var datatable = $('html #emp_list').DataTable({ 
 
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


    getCategories();

 

    $('html').on('click', '#add_category', function(event) {
        event.preventDefault();
        /* Act on the event */ 
        if (ajaxStart==0) {
            ajaxStart=1;
        bootbox.confirm({
            title: "Add Category",
            message: $('.add_category_form').html(),
            buttons: {
                confirm: {
                    label: 'Add Category',
                    className: 'btn_add'
                },
                cancel: {
                    label: 'Cancel',
                    className: 'btn-default'
                }
            },
            callback: function (result) {
                
                if (result) {

                    var cat_id = $('.modal #cat_id').val();
                    var cat_name = $('.modal #cat_name').val();
                    var cat_desc = $('.modal #cat_desc').val();
                    var data = { id: cat_id, cat_name: cat_name, cat_desc: cat_desc };
                    
                     
                    if (validateCategoryFeilds(data)) { 
                        addCategories(data);
                         
                    }else{
                       
                        return false;
                    }
                         
                    ajaxStart=0;
                }else{
                    ajaxStart=0;
                }
            }
        });

         $('.bootbox .modal-dialog').css({ 
          'margin-top': function () {
            return ( ($('.bootbox').height() / 6) );
          }
        });

        }

    });


    $('html').on('click', '.delete', function(event) {
        event.preventDefault();
        /* Act on the event */
        var data_id = $(this).attr('data-id');

        if (ajaxStart===0) {
            ajaxStart = 1;

            bootbox.confirm({
                title: "Delete Category",
                message: "Are you sure you want to delete this category ?",
                buttons: {
                    confirm: {
                        label: 'Delete Category',
                        className: 'btn_add'
                    },
                    cancel: {
                        label: 'Cancel',
                        className: 'btn-default'
                    }
                },
                callback: function (result) {
                    
                    if (result) {

                       deleteCategories(data_id)
                       ajaxStart = 0;
                    }
                }
            });

            $('.bootbox .modal-dialog').css({
              'top': '50%',
              'margin-top': function () {
                return -( $('.bootbox').height()/4);
              }
            });

        }
        
         
    });


    $('html').on('click', '.edit', function(event) {
        event.preventDefault();
        /* Act on the event */
        var data_id = $(this).attr('data-id');
        getSelectedCategories(data_id);
    });


    $('html').on('keyup', '.form-control', function(event) {
        event.preventDefault();
        /* Act on the event */
        $(this).parent().siblings().find('.help-block').addClass('hide');
    });

    
    function validateCategoryFeilds(data){
        var stat = [];

        if (data.id==='') { 
            $('html #cat_id').parent().siblings().find('.help-block').removeClass('hide');
            stat.push(0);
        }

        if (data.cat_name==='') {
            $('html #cat_name').parent().siblings().find('.help-block').removeClass('hide');
            stat.push(0);
        }

        if (data.cat_desc==='') {
            $('html #cat_desc').parent().siblings().find('.help-block').removeClass('hide');
            stat.push(0);
        }

        if (stat.length===0) {
            return true;
        }else{
             return false;
        }

         
    }
	
    function addCategories(dataset){ 

        $.ajax({
            url: baseUrl()+'/categoryController/addCategories',
            type: 'POST',
            dataType: 'json',
            data: dataset,
            success: function(data){
                alert('success');
                getCategories();
            },
            error: function(data){

            } 
        });
        
    }
 
	function getCategories(){
		$.ajax({
			url: baseUrl()+'/categoryController/getCategories',
			type: 'POST',
			dataType: 'json',
			success: function(data){
				  
				if (data.status===200) {
					var categories = data.data

						datatable.destroy(); 
						var dataSet = []; 

						for (var i = 0; i < categories.length; i++) { 
                            var  buttons = 
                                '<a href="javascript:void(0);" id="edit'+i+'" class="edit" data-id="'+categories[i].id+'" ><i class="icon-pencil-edit-button" aria-hidden="true"></i></a>'
                                +'<a href="javascript:void(0);" id="delete'+i+'" class="delete" data-id="'+categories[i].id+'" ><i class="icon-rubbish-bin" aria-hidden="true"></i></a>';

							dataSet.push([categories[i].id, categories[i].cat_name, categories[i].cat_desc, buttons ]);
						}

					    datatable = $('html #emp_list').DataTable({  
					    	data: dataSet
					    });
					
				}

				
			},
			error: function(data){

			}
			

		}); 
		
	}


    function deleteCategories(id){

        
        $.ajax({
            url: baseUrl()+'/categoryController/deleteCategories',
            type: 'POST',
            dataType: 'json',
            data: {id:id},
            success: function(data){
                alert('success');
                getCategories();
            },
            error: function(data){

            } 
        });

    }

    function updateCategories(dataset){

        $.ajax({
            url: baseUrl()+'/categoryController/updateCategories',
            type: 'POST',
            dataType: 'json',
            data: dataset,
            success: function(data){
                alert('success');
                getCategories();
            },
            error: function(data){

            } 
        });

    }


    function getSelectedCategories(id){

        if (ajaxStart===0) {
            ajaxStart = 1;
            $.ajax({
                url: baseUrl()+'/categoryController/searchCategories',
                type: 'POST',
                dataType: 'json',
                data: {id:id},
                success: function(data){
                    console.log(data);
                    if (data.status===200) {
     

                        bootbox.confirm({
                            title: "Edit Category",
                            message: $('.add_category_form').html(),
                            buttons: {
                                confirm: {
                                    label: 'Edit Category',
                                    className: 'btn_add'
                                },
                                cancel: {
                                    label: 'Cancel',
                                    className: 'btn-default'
                                }
                            },
                            callback: function (result) {
                                
                                if (result) {

                                    var cat_id = $('.modal #cat_id').val();
                                    var cat_name = $('.modal #cat_name').val();
                                    var cat_desc = $('.modal #cat_desc').val();

                                    var dataset = { current_id:id, id:cat_id, cat_name:cat_name, cat_desc:cat_desc };
                                    updateCategories(dataset)
                                    
                                }
                            }
                        });

                         $('.bootbox .modal-dialog').css({ 
                          'margin-top': function () {
                            return ( ($('.bootbox').height() / 6) );
                          }
                        });


                         var edit_data = data.data;

                        $('.bootbox #cat_id').val(edit_data[0].id);
                        $('.bootbox #cat_name').val(edit_data[0].cat_name);
                        $('.bootbox #cat_desc').val(edit_data[0].cat_desc);

                        

                    }

                     ajaxStart = 0;
                    
                     
                },
                error: function(data){

                } 
            });

        }

       

    }

