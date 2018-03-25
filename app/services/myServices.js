app.factory('dataFactory', function($http) {
  var myService = {};

  myService.getItems = function(callback) {
        $http.get("index.php/items/index").success(function (response) {
            callback(response);
        });
    }

	myService.addItem = function(item,callback) {
	
		var postData = 'myData='+JSON.stringify(item);
		
                $http({
                        method : 'POST',
                        url : 'index.php/items/store',
                        data: postData,
                        headers : {'Content-Type': 'application/x-www-form-urlencoded'}  

                }).success(function(response){
						if (typeof item.picture !== 'string') {
							myService.uploadPhoto(item.picture, response.id);
						}
                }).error(function(error){
                        console.log(error);
        });
		
		
    }
	
	    myService.uploadPhoto = function (file, id) {
        return new Promise(function (resolve) {
				Upload.upload({
					url: 'index.php/items/uploadPhoto', //webAPI exposed to upload the file
					data: {files: file, id: id} 
				}).then(function (resp) {
					console.log(resp);
					if (resp.status === 200) {
						
						
					} else {
					}
				}, function (resp) { //catch error
				}, function (evt) {
				
				});
			});
		};
	
  
  return myService;
});