app.controller('ItemController', function(dataFactory,$scope,$http){
  
  var model = {
	  data : [],
	  getItems:getItems()
  }
  $scope.model = model;
  
  
  /*$scope.searchDB = function(){
      if($scope.searchText.length >= 3){
          if($.isEmptyObject($scope.libraryTemp)){
              $scope.libraryTemp = $scope.data;
              $scope.totalItemsTemp = $scope.totalItems;
              $scope.data = {};
          }
          getResultsPage(1);
      }else{
          if(! $.isEmptyObject($scope.libraryTemp)){
              $scope.data = $scope.libraryTemp ;
              $scope.totalItems = $scope.totalItemsTemp;
              $scope.libraryTemp = {};
          }
      }
  }
  $scope.saveAdd = function(){
    dataFactory.httpRequest('itemsCreate','POST',{},$scope.form).then(function(data) {
      $scope.data.push(data);
      $(".modal").modal("hide");
    });
  }*/
  
 
  
  function getItems(){
	  dataFactory.getItems(function(result){
		  model.data = result;
		  console.log(result);
	  });
  }
  
 
});

app.controller('addItemController', function(dataFactory,$scope,$http){
  
  var model = {
	  data : [],
	  saveAdd:saveAdd,
	  itemObj:{}
  }
  $scope.model = model;
  
  
  /*$scope.searchDB = function(){
      if($scope.searchText.length >= 3){
          if($.isEmptyObject($scope.libraryTemp)){
              $scope.libraryTemp = $scope.data;
              $scope.totalItemsTemp = $scope.totalItems;
              $scope.data = {};
          }
          getResultsPage(1);
      }else{
          if(! $.isEmptyObject($scope.libraryTemp)){
              $scope.data = $scope.libraryTemp ;
              $scope.totalItems = $scope.totalItemsTemp;
              $scope.libraryTemp = {};
          }
      }
  }
  $scope.saveAdd = function(){
    dataFactory.httpRequest('itemsCreate','POST',{},$scope.form).then(function(data) {
      $scope.data.push(data);
      $(".modal").modal("hide");
    });
  }*/
  
  function saveAdd(){
	  console.log(model.itemObj);
	  dataFactory.addItem(model.itemObj,function(result){
		 if(result){
			 alert('added successfully');
			 model.itemObj = [];
		 }
	  });
  }
  
 
  
 
});