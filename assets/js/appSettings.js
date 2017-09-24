app.controller('SettingsCtrl', ['$scope','$location', 'ajaxRequest', 'goTo', 'messageBox' , 'Notification',
  function($scope, $location, ajaxRequest, goTo, messageBox, Notification) {

    $scope.title = 'Settings';
    $scope.breadcrumb = 'Settings';
    $scope.animated_class = 'animated fadeIn';
    $scope.user = '', $scope.user_password = '';

    ajaxRequest.post('SettingsController/getRoles').then(function(response) {
      	$scope.getRoles = response.data.data; 
	});



    $scope.getUsersList = function(){

    	ajaxRequest.post('SettingsController/getUsers').then(function(response) {
	      	$scope.getUsers = response.data.data;  
		});

    };


	$scope.getUsersList();


    $scope.openAddUserModal = function(){

    	$scope.animated_class = '';
    	$('#modalAddUser').modal('show');

    };


    $scope.addUserLogin = function(){

    	$scope.data = $.param({  
	        username: $scope.user,  
	        password: $scope.user_password, 
	        role_id: $scope.role,  
	    });

	   
     	 
     	ajaxRequest.post('SettingsController/addUsers', $scope.data).then(function(response) {
	      	if (response.status == 200) {
	            Notification.success('Supplier has been deleted successfully.');
                $scope.getUsersList(); 
            }else if(response.status == 500 || response.status == 404){
                Notification.error('An error occured while deleting item. Please try again.'); 
            } 
		});

    };


    $scope.editUser= function(id){ 
        alert(id)
    }


    $scope.deleteUser= function(id){ 

        var options = {
            title:'Delete User',
            message:"Are you sure you want to delete this user?", 
            id: id,
            className: 'short_modal',
        }

        messageBox.delete(options).then(function(post) {

          if (post == 1) {
            
            var deleteItemStockID =  $.param({ login_id: id })


            ajaxRequest.post('SettingsController/deleteUsers',deleteItemStockID).then(function(response) {
                 
                if (response.status == 200) {
                    Notification.success('User has been deleted successfully.'); 
                    $scope.getUsersList();
                    
                 }else if(response.status == 500 || response.status == 404){
                    Notification.error('An error occured while deleting item. Please try again.'); 
                 } 
            });
          }


        });
    }


}]);
