app.factory('dataFactory', function($http,Upload) {
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
						console.log('response');
						console.log(response);
						callback(response);
                }).error(function(error){
                        console.log(error);
        });
		
		
    }
	
	    myService.uploadPhoto = function (file, id) {
			console.log('id');
			console.log(id);
        return new Promise(function (resolve) {
				Upload.upload({
					url: 'index.php/items/uploadPhoto', //webAPI exposed to upload the file
					data: {files: file, id: id} 
				}).then(function (resp) {
					
				}, function (resp) { //catch error
				}, function (evt) {
				
				});
			});
		}
		
		
		myService.filterTags = function(tag) {
			var encodeString = 'tag='+tag;
			return $http({
				url: './index.php/tags/getTags',
				method: "POST",
				data: encodeString,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			});
        }
	
  
  return myService;
});