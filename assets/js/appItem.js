/*
* ref: items.php
*/
  




app.controller('ItemsCtrl', ['$scope','$location', 'ajaxRequest', 'goTo', 'messageBox' , 'Notification',
  function($scope, $location, ajaxRequest, goTo, messageBox, Notification) {

    $scope.title = 'View Items';
    $scope.breadcrumb = 'Warn';
    $scope.animated_class = 'animated fadeIn';
   
     

    $scope.getItemsList = function (){
      ajaxRequest.post('ItemsController/getItemsJoined').then(function(response) {
          $scope.getItem = response.data.data;  
      });
    }

    $scope.getItemsList();
 
  
    $scope.navigateTo = function ( path ) {
        goTo.page( path );
    };



    $scope.displayPrice = function(price){
      return price+'.00';
    };

 
    $scope.editItem = function(item_id){ 
      goTo.page('/items/edit-item/'+item_id);
    };


    $scope.viewItemStock = function(item_id){
      goTo.page('/items/view-item-stock/'+item_id);
    }


    $scope.deleteItem = function(item_id){

        var options = {
            title:'Delete Item',
            message:"Are you sure you want to delete this item?", 
            id: item_id,
            className: 'short_modal',
        }

        messageBox.delete(options).then(function(post) {

          if (post == 1) {
            var deleteItemID =  $.param({ item_id: item_id })

            ajaxRequest.post('ItemsController/deleteItems',deleteItemID).then(function(response) {
                 
                if (response.status == 200) {
                    Notification.success('Item has been deleted successfully.');
                    $scope.getItemsList(); 
                 }else if(response.status == 500 || response.status == 404){
                    Notification.error('An error occured while deleting item. Please try again.'); 
                 } 
            });
          }


        });
    };
 

}]);


/*
* ref: add-items.php
*/
 

app.controller('addItemsCtrl', ['$scope', '$http', 'goTo', 'ajaxRequest', '$q' , 'Notification', 'fileUpload', 'barcodeNo',
  function($scope, $http, goTo, ajaxRequest, $q, Notification, fileUpload, barcodeNo) {

   

    $scope.title = 'Add Items';
    $scope.breadcrumb = 'Warn';
    $scope.animated_class = 'animated fadeIn';

     

    $scope.calc_item1 = 1;
    $scope.price_changable1 = 1; 

    $scope.calc_item = true;
    $scope.price_changable = true; 
    $scope.net_amount = 0.00;
    $scope.buy_price = 0.00;
    $scope.sell_price = 0.00;
    $scope.discount = 0;
    $scope.quantity = $scope.reorder_level = 1;
    $scope.discount_type = '2';

 
    
    $scope.num = Math.floor((Math.random() * 10000000000000000) + 1);
    $scope.barcode = $scope.num;

    $scope.getBarcode = function(){ 
      barcodeNo.generateBarcode($scope.barcode)
    };

    $scope.getBarcode();
    

    ajaxRequest.post('ItemsController/getCategoryList').then(function(response) {
        $scope.getCategoryList = response.data.data;   
    });


    ajaxRequest.post('ItemsController/getSupplierList').then(function(response) {
        $scope.getSupplierList = response.data.data;  
    });


    ajaxRequest.post('ItemsController/getLastIndex').then(function(response) {
     
      if (response.data.data.length == 0) {
        $scope.item_id = 1;
      }else{  
        $scope.item_id = parseInt(response.data.data[0].item_id) + 1; 
      }
      
 
    });

    $("#imgInp").change(function(){
        $scope.readURL(this);
    });

    $scope.uploadFile = function(){
        
    };

    $scope.readURL = function(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.item_img').attr('style', 'background-image: url('+e.target.result+')');
            }

            reader.readAsDataURL(input.files[0]);


        }
    };

    
    

    $scope.checked = function(){

      if ($scope.use_item_display_name) {
        $scope.item_display_name = $scope.item_name;
      } 


      if (!$scope.price_changable) {
          $scope.price_changable1 = 0;
      }


      if (!$scope.calc_item) {
        $scope.calc_item1 = 0;
      }

    };


    $scope.close = function(){
      goTo.page('items');
    };

  
    $scope.addItem = function(){

        var myFile = $scope.myFile;
        var item_id = $scope.item_id;
        var item_name = $scope.item_name;
        var item_display_name =  $scope.item_display_name;
        var supplier = $scope.supplier;
        var category = $scope.category;
        var barcode = $scope.barcode;
        var manufacture_id = $scope.manufacture_id;
        var buy_price = $scope.buy_price;
        var sell_price = $scope.sell_price;
        var quantity = $scope.quantity;
        var reorder_level = $scope.reorder_level;
        var discount = $scope.discount;
        var discount_type = $scope.discount_type;
        var net_amount = $scope.net_amount;
        var price_changable = $scope.price_changable1;
        var calc_item = $scope.calc_item1;

        var data_item = $.param({ 
            item_id: item_id, 
            item_name: item_name, 
            item_display_name: item_display_name,  
            cat_id: category,
            image_url: '', 
 
        });


        var data_item_stock = $.param({ 

            item_id: item_id, 
            barcode: barcode,
            manufacture_id: manufacture_id,
            buy_price: buy_price,
            sell_price: sell_price,
            quantity: quantity,
            reorder_level: reorder_level,
            curr_quantity: quantity,
            discount: discount,
            discount_type: discount_type,
            net_amount: net_amount,
            calc_item: calc_item,
            price_changable: price_changable,
            sup_id: supplier,

        });


         
        ajaxRequest.post('ItemsController/addItem', data_item ).then(function(response) {

           

            if (response.status == 200) {

            var file = $scope.myFile;
            var uploadUrl = "index.php/ItemsController/fileUpload";
            var text = $scope.name;

            fileUpload.uploadFileToUrl(file, uploadUrl, text, item_id);

              ajaxRequest.post('ItemsController/addItemStock', data_item_stock ).then(function(response) {

                  if (response.status == 200) {
                      Notification.success('New item has been added successfully.');
                      $scope.resetForm();

                   }else if(response.status == 500 || response.status == 404){
                      Notification.error('An error occured while adding item. Please try again.'); 
                   }   
              });


             }else if(response.status == 500 || response.status == 404){
                Notification.error('An error occured while adding item. Please try again.'); 
             } 
            
        });


        

    };



    $scope.net_price = function(){


      if (isNaN($scope.sell_price)) {
        $scope.net_amount = 0;
      }else{ 
  
          switch($scope.discount_type){
 
            case '1' :  $scope.net_amount = $scope.sell_price - $scope.discount;
                      break;

            case '2' :  $scope.net_amount = $scope.sell_price - ( $scope.sell_price * $scope.discount / 100 );
                      break;

            default: break
          }
         
      }

      return $scope.net_amount;
       
    };


    $scope.navigateTo = function ( path ) {
        goTo.page( path );
    };


    $scope.resetForm = function(){
       $scope.item_id = $scope.barcode = '' 
       $scope.addItemForm.$setUntouched();
    }

 
    
}]);



/*
* ref: edit-items.php
*/

app.controller('editItemsCtrl', ['$scope', '$http', 'goTo', 'ajaxRequest', '$q', '$routeParams' , 'Notification', 'fileUpload',
  function($scope, $http, goTo, ajaxRequest, $q, $routeParams, Notification, fileUpload) {
    $scope.title = 'Edit Items';
    $scope.breadcrumb = 'Warn';
    $scope.animated_class = 'animated fadeIn';

    $scope.discount_type = 1;

    $scope.routeParams = $routeParams.id;

    
    $("#imgInp").change(function(){
      $scope.readURL(this);

    });

    $scope.uploadFile = function(){
        
    };

    $scope.readURL = function(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.item_img').attr('style', 'background-image: url('+e.target.result+')');
            }

            reader.readAsDataURL(input.files[0]);

         }
    };

    var sendItemID =  $.param({ item_id: $routeParams.id })
 

    ajaxRequest.post('ItemsController/getCategoryList').then(function(response) {
        $scope.getCategoryList = response.data.data; 
    });

    ajaxRequest.post('ItemsController/getSupplierList').then(function(response) {
        $scope.getSupplierList = response.data.data;  
    });

    $scope.discount_type_vals = [{ id: 1, value: 'Rs.' },{ id: 2, value: '%' }];


    ajaxRequest.post('ItemsController/getSingleItem', sendItemID ).then(function(response) {


        
        $scope.getDetails = response.data.data[0];

        $scope.item_id = $scope.getDetails.item_id;
        $scope.item_name = $scope.getDetails.item_name;
        $scope.item_display_name = $scope.getDetails.item_display_name;
        $scope.supplier = $scope.getDetails.sup_id;
        $scope.category = $scope.getDetails.cat_id;
        $scope.barcode = $scope.getDetails.barcode;
        $scope.manufacture_id = $scope.getDetails.manufacture_id;
        $scope.buy_price = parseInt($scope.getDetails.buy_price);
        $scope.sell_price = parseInt($scope.getDetails.sell_price);
        $scope.quantity = parseInt($scope.getDetails.quantity);
        $scope.reorder_level = parseInt($scope.getDetails.reorder_level);
        $scope.discount = parseInt($scope.getDetails.discount);
        $scope.discount_type = $scope.getDetails.discount_type;
        $scope.net_amount = parseInt($scope.getDetails.net_amount);

        $('.item_img').attr('style', 'background-image: url('+$scope.getDetails.image_url+')');

  

        if ($scope.getDetails.calc_item) {
          $scope.calc_item = true;
          $scope.calc_item1 = 1;
        }else{
          $scope.calc_item1 = 0;
        }


        if ($scope.getDetails.price_changable) {
          $scope.price_changable = true;
          $scope.price_changable1 = 1;
        }else{
          $scope.price_changable1 = 0;
        }
       
         

    });

    

    $scope.navigateTo = function ( path ) {
        goTo.page( path+"/"+$scope.routeParams );
    };


    $scope.close = function(){
      goTo.page('items');
    };


    $scope.checked = function(){

      if ($scope.use_item_display_name) {
        $scope.item_display_name = $scope.item_name;
      } 


      if (!$scope.price_changable) {
          $scope.price_changable1 = 0;
      }


      if (!$scope.calc_item) {
        $scope.calc_item1 = 0;
      }

    };


    $scope.net_price = function(){


      if (isNaN($scope.sell_price)) {
        $scope.net_amount = 0;
      }else{ 
  
          switch($scope.discount_type){
 
            case '1' :  $scope.net_amount = $scope.sell_price - $scope.discount;
                      break;

            case '2' :  $scope.net_amount = $scope.sell_price - ( $scope.sell_price * $scope.discount / 100 );
                      break;

            default: break
          }
         
      }

      return $scope.net_amount;
       
    };


    $scope.editItem = function(){

        var item_id = $scope.item_id;
        var item_name = $scope.item_name;
        var item_display_name =  $scope.item_display_name;
        var supplier = $scope.supplier;
        var category = $scope.category;
        var barcode = $scope.barcode;
        var manufacture_id = $scope.manufacture_id;
        var buy_price = $scope.buy_price;
        var sell_price = $scope.sell_price;
        var quantity = $scope.quantity;
        var reorder_level = $scope.reorder_level;
        var discount = $scope.discount;
        var discount_type = $scope.discount_type;
        var net_amount = $scope.net_amount;
        var price_changable = $scope.price_changable1;
        var calc_item = $scope.calc_item1;



 

        var data = $.param({ 
            item_id: item_id, 
            item_name: item_name, 
            item_display_name: item_display_name, 
            cat_id: category,   

        });



        

      ajaxRequest.post('ItemsController/updateItems', data).then(function(response) {
        
           if (response.status == 200) {

              var file = $scope.myFile;
              var uploadUrl = "index.php/ItemsController/fileUpload";
              var text = $scope.name;
              
              if (typeof $scope.myFile != 'undefined') {
                fileUpload.uploadFileToUrl(file, uploadUrl, text, item_id);
              }
              
              Notification.success('Item details for <b>'+item_display_name+'</b> has been updated successfully.');
              $('#myModalEdit').modal('hide');

           }else if(response.status == 500 || response.status == 404){
              Notification.error('An error occured while updating. Please try again.'); 
           }
      });


    }

    $scope.resetForm = function(){
       $scope.item_id = $scope.barcode = '' 
       $scope.addItemForm.$setUntouched();
    }

 
    
}]);





/*
* ref: view-item-stock.php
*/

app.controller('ItemsStockCtrl', ['$scope','$location', 'ajaxRequest', 'goTo', 'messageBox' , 'Notification', '$routeParams', 'barcodeNo', 
  function($scope, $location, ajaxRequest, goTo, messageBox, Notification, $routeParams, barcodeNo) {

    $scope.title = 'View Stock';
    $scope.breadcrumb = 'Warn';
    $scope.animated_class = 'animated fadeIn';

    $scope.calc_item1 = 1;
    $scope.price_changable1 = 1;  
    $scope.stock_id = 0;

    $scope.discount_type_vals = [{ id: 1, value: 'Rs.' },{ id: 2, value: '%' }]; 

    var sendItemID =  $.param({ item_id: $routeParams.id })



   

    ajaxRequest.post('ItemsController/getSingleItemJoined', sendItemID ).then(function(response) {

        
        $scope.getDetails = response.data.data[0];
        $scope.stock_id = $scope.getDetails.stock_id; 
        $scope.item_id = $scope.getDetails.item_id;
        $scope.item_name = $scope.getDetails.item_name;
        $scope.item_display_name = $scope.getDetails.item_display_name;
        $scope.supplier_id = $scope.getDetails.sup_id;
        $scope.supplier_name = $scope.getDetails.sup_name;
        $scope.category_id = $scope.getDetails.cat_id;
        $scope.category_name = $scope.getDetails.cat_name;
        

        $('.item_img').attr('style', 'background-image: url('+$scope.getDetails.image_url+')');

  

        if ($scope.getDetails.calc_item) {
          $scope.calc_item = true;
          $scope.calc_item1 = 1;
        }else{
          $scope.calc_item1 = 0;
        }


        if ($scope.getDetails.price_changable) {
          $scope.price_changable = true;
          $scope.price_changable1 = 1;
        }else{
          $scope.price_changable1 = 0;
        } 

    });


    $scope.getSingleItemStock = function (){

      var sendItemID =  $.param({ item_id: $routeParams.id });

      ajaxRequest.post('ItemsController/getSingleItemStock', sendItemID ).then(function(response) {
          $scope.getSingleIteminStock = response.data.data;  
          $scope.stock_id = $scope.getSingleIteminStock[0].stock_id; 
          
      });

      ajaxRequest.post('ItemsController/getSupplierList').then(function(response) {
          $scope.getSupplierList = response.data.data;  
      });

    };
 

    $scope.editItem = function(item_id){ 
      goTo.page('/items/edit-item/'+item_id);
    };


    /*
    * Edit Item
    */

    $scope.openEditStockModal = function(stock_id){

       

        var sendItemBarcode = $.param({ stock_id: stock_id }); 
        $scope.stock_id =  stock_id;

        ajaxRequest.post('ItemsController/getSingleItemFromStock', sendItemBarcode ).then(function(response) {

            $scope.getSingleItemFromStock = response.data.data[0]; 
 

            $scope.barcode = $scope.getSingleItemFromStock.barcode;
            $scope.manufacture_id = $scope.getSingleItemFromStock.manufacture_id;
            $scope.buy_price = parseInt($scope.getSingleItemFromStock.buy_price);
            $scope.sell_price = parseInt($scope.getSingleItemFromStock.sell_price);
            $scope.quantity = parseInt($scope.getSingleItemFromStock.quantity);
            $scope.reorder_level = parseInt($scope.getSingleItemFromStock.reorder_level);
            $scope.discount = parseInt($scope.getSingleItemFromStock.discount);
            $scope.discount_type = $scope.getSingleItemFromStock.discount_type;
            $scope.net_amount = parseInt($scope.getSingleItemFromStock.net_amount);


             // $scope.num = Math.floor((Math.random() * 10000000000000000) + 1);
             //  $scope.barcode = $scope.num;

              JsBarcode("#code128",  $scope.barcode , {  
                width:2,
                height:30,
                fontSize: 14 
              }); 


            if ($scope.getSingleItemFromStock.calc_item == 1) {
              $scope.calc_item = true;
              $scope.calc_item1 = 1;
            }else{
              $scope.calc_item1 = 0;
            }


            if ($scope.getSingleItemFromStock.price_changable == 1) {
              $scope.price_changable = true;
              $scope.price_changable1 = 1;
            }else{
              $scope.price_changable1 = 0;
            }

            
        });

          $scope.animated_class = ''
          $('#myModalEdit').modal('show');

    };


    $scope.editStockItem = function(stock_id){
   
        var item_id = $routeParams.id; 
        var barcode = $scope.barcode;
        var manufacture_id = $scope.manufacture_id;
        var buy_price = $scope.buy_price;
        var sell_price = $scope.sell_price;
        var quantity = $scope.quantity;
        var reorder_level = $scope.reorder_level;
        var discount = $scope.discount;
        var discount_type = $scope.discount_type;
        var net_amount = $scope.net_amount;
        var price_changable = $scope.price_changable;
        var calc_item = $scope.calc_item;

        if ($scope.price_changable) { 
          price_changable = 1;
        }else{
          price_changable = 0;
        }


        if ($scope.calc_item) { 
          calc_item = 1;
        }else{
          calc_item = 0;
        }
 

        var data = $.param({ 
            stock_id : stock_id,
            item_id: item_id,
            barcode: barcode, 
            manufacture_id: manufacture_id, 
            buy_price: buy_price, 
            sell_price: sell_price,
            quantity: quantity, 
            reorder_level: reorder_level, 
            discount: discount, 
            discount_type: discount_type, 
            net_amount: net_amount,
            price_changable: price_changable,
            calc_item: calc_item,
        });

        

      ajaxRequest.post('ItemsController/updateItemsStock', data).then(function(response) {
        
          if (response.status == 200) {
              Notification.success('Item details has been updated successfully.');
              $scope.getSingleItemStock();
              $('#myModalEdit').modal('hide');
          }else if(response.status == 500 || response.status == 404){
              Notification.error('An error occured while updating. Please try again.'); 
          }


      });

    
    };


     $scope.openModalAddStock = function(){


            
        $scope.animated_class = ''; 

        $scope.barcode = '';
        $scope.manufacture_id = '0';
        $scope.buy_price = 0;
        $scope.sell_price = 0;
        $scope.quantity = 1;
        $scope.reorder_level = 1;
        $scope.discount = 0;
        $scope.discount_type = '1';
        $scope.net_amount = 0;

          $scope.num = Math.floor((Math.random() * 10000000000000000) + 1);
          $scope.barcode = $scope.num;

          barcodeNo.generateBarcode($scope.barcode) 

        $scope.animated_class = ''
        $('#myModalAdd').modal('show');
     };


     $scope.addStockItem = function(){

          var data_add_item_stock = $.param({ 

            item_id: $routeParams.id, 
            barcode: $scope.barcode,
            sup_id: $scope.supplier,
            manufacture_id: $scope.manufacture_id,
            buy_price: $scope.buy_price,
            sell_price: $scope.sell_price,
            quantity: $scope.quantity,
            reorder_level: $scope.reorder_level,
            curr_quantity: $scope.quantity,
            discount: $scope.discount,
            discount_type: $scope.discount_type,
            net_amount: $scope.net_amount,
            calc_item: $scope.calc_item,
            price_changable: $scope.price_changable,

        });

        ajaxRequest.post('ItemsController/addItemStock', data_add_item_stock ).then(function(response) {

            if (response.status == 200) {
                Notification.success('New Stock has been added successfully.'); 
                $scope.getSingleItemStock(); 
                $('#myModalAdd').modal('hide');
             }else if(response.status == 500 || response.status == 404){
                Notification.error('An error occured while adding item. Please try again.'); 
             }   
        });


     };


    $scope.deleteItem = function(stock_id){
       
        var options = {
            title:'Delete Item',
            message:"Are you sure you want to delete this item?", 
            id: stock_id,
            className: 'short_modal',
        }

        messageBox.delete(options).then(function(post) {

          if (post == 1) {
            var deleteItemStockID =  $.param({ stock_id: stock_id })


            ajaxRequest.post('ItemsController/deleteItemsStock',deleteItemStockID).then(function(response) {
                 
                if (response.status == 200) {
                    Notification.success('Item has been deleted successfully.'); 
                    $scope.getSingleItemStock();
                    
                 }else if(response.status == 500 || response.status == 404){
                    Notification.error('An error occured while deleting item. Please try again.'); 
                 } 
            });
          }


        });
    };

 

    $scope.net_price = function(){

      if (isNaN($scope.sell_price)) {
        $scope.net_amount = 0;
      }else{ 
  
          switch($scope.discount_type){
 
            case '1' :  $scope.net_amount = $scope.sell_price - $scope.discount;
                      break;

            case '2' :  $scope.net_amount = $scope.sell_price - ( $scope.sell_price * $scope.discount / 100 );
                      break;

            default: break
          }
         
      }

      return $scope.net_amount;
       
    };

    $scope.navigateTo = function ( path ) {
        goTo.page( path );
    };


    $scope.displayDiscount = function(discount, discount_type ){

       if (discount_type == 1) {
         return currency+''+discount;

       }else if(discount_type == 2){
          return discount+'%';

       }else{

       }

    };




   

    

    $scope.getSingleItemStock();

   
 

}]);



