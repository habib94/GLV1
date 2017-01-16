

var GLApp=angular.module("GLApp");

GLApp.config(["$routeProvider",function($routeProvider) {
   
    $routeProvider.

    when('/home', {
       templateUrl: '/static/template/page/visiteur/homeVisiteur.html'
    }).

    when('/creer-demande', {
       templateUrl: '/static/template/page/visiteur/creerDemande.html'
    }).
            
    when('/login', {
       templateUrl: '/static/template/page/visiteur/login.html'
    }).        
  
    otherwise({
       redirectTo: '/home'
    });
}]);