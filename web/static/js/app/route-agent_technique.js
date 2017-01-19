

var GLApp=angular.module("GLApp");

GLApp.config(["$routeProvider",function($routeProvider) {
   
    $routeProvider.

    when('/demandes/:etat', {
       templateUrl: '/static/template/page/agent_technique/home.html'
    }).    
  
    otherwise({
       redirectTo: '/demandes/nouvelle'
    });
    
}]);