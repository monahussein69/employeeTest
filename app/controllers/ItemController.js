app.controller('ItemController', function(dataFactory,$scope,$http){
  
  var model = {
	  data : [],
	  getItems:getItems()
  }
  $scope.model = model;
  

 
  
  function getItems(){
	  dataFactory.getItems(function(result){
		  model.data = result;
		  console.log(result);
	  });
  }
  
 
});

app.controller('addItemController', function(dataFactory,$scope,$http,Upload){
  
  var model = {
	  data : [],
	  saveAdd:saveAdd,
	  querySearch:querySearch,
	  itemObj:{},
	  fetchTags:fetchTags,
	  searchResult:[],
	  setValue:setValue,
	  searchboxClicked:searchboxClicked,
	  containerClicked:containerClicked
  }
  $scope.model = model;
  
  
  function saveAdd(){
	  console.log(model.itemObj);
	  dataFactory.addItem(model.itemObj,function(result){
		 if(result.success){
			 alert('added successfully');
			 model.itemObj = [];
		 }
	  });
  }
  
  
    function fetchTags(){
      var searchText_len = model.itemObj.tag.trim().length;
      // Check search text length
      if(searchText_len > 0){
		  dataFactory.filterTags(model.itemObj.tag)
                .then(function (response) {
					console.log(response);
                     model.searchResult = response.data;
                });
      }else{
         model.searchResult = {};
      }               
   }

   // Set value to search box
   function setValue(index,$event){
      model.itemObj.tag = model.searchResult[index].name;
      model.itemObj.tag_id = model.searchResult[index].id;
      model.searchResult = {};
      $event.stopPropagation();
   }

   function searchboxClicked($event){
      $event.stopPropagation();
   }

   function containerClicked(){
      model.searchResult = {};
   }
  
 
  
 
});