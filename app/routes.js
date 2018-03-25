var app =  angular.module('main-App',['ngRoute']);

app.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
           
            when('/', {
                templateUrl: 'index.php/templates/items.html',
                controller: 'ItemController'
            }).
            when('/items/add', {
                templateUrl: 'index.php/templates/addItem.html',
                controller: 'addItemController'
            });
}]);