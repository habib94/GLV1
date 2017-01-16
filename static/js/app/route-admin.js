

var medecinApp=angular.module("medecinApp");

medecinApp.config(function($routeProvider) {
   
    $routeProvider.

    when('/home', {
       templateUrl: '/static/template/page/admin/homeAdmin.html',
    }).

    when('/profile',{
        templateUrl : '/static/template/page/admin/profileUser-admin.html',
    }).

    when('/gestioncentres',{
        templateUrl : '/static/template/page/admin/gestioncentres.html',
    }).
            
    when('/gestionmedecins',{
        templateUrl : '/static/template/page/admin/gestionmedecins.html',
    }).
            
    when('/gestiontechniciens',{
        templateUrl : '/static/template/page/admin/gestiontechniciens.html',
    }).
    when('/gestionarcs',{
        templateUrl : '/static/template/page/admin/gestionARCs.html',
    }).         

    otherwise({
       redirectTo: '/home'
    });
});