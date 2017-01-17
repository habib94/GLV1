

var medecinApp=angular.module("medecinApp");

medecinApp.config(function($routeProvider) {
   
    $routeProvider.

    when('/home', {
       templateUrl: '/static/template/page/superAdmin/homeSuperAdmin.html',
       controller :"gestionAdmin"
    }).

    when('/profile',{
        templateUrl : '/static/template/page/superAdmin/profileUser.html'
    }).

    otherwise({
       redirectTo: '/home'
    });
});