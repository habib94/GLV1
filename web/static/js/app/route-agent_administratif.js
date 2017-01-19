

var GLApp=angular.module("GLApp");

GLApp.config(["$routeProvider",function($routeProvider) {
   
    $routeProvider.

    when('/home', {
       templateUrl: '/static/template/page/agent_administratif/home.html'
    }).
    
    when('/add-ouvrier', {
       templateUrl: '/static/template/page/agent_administratif/add-ouvrier.html'
    }).
    
  
    otherwise({
       redirectTo: '/home'
    });
}]);