

var GLApp=angular.module("GLApp");

GLApp.config(["$routeProvider",function($routeProvider) {
   
    $routeProvider.

    when('/home', {
       templateUrl: '/static/template/page/client/home.html'
    }).

    when('/ajouter-demande', {
       templateUrl: '/static/template/page/client/creerDemande.html'
    }).    
  
    otherwise({
       redirectTo: '/home'
    });
}]);