

var medecinApp=angular.module("medecinApp");

medecinApp.config(function($routeProvider) {
   
    $routeProvider.

    when('/home/:tabActive', {
       templateUrl: '/static/template/page/ARC/homeARC.html',
       controller : 'homeARC'
    }).

    when('/profile',{
        templateUrl : '/static/template/page/ARC/profileUser-ARC.html'
    }).   


    when('/patient/:idPatient',{
        templateUrl : '/static/template/page/ARC/pagePatient.html',
        controller : 'pagePatient'
    }).

     when('/patient/:idPatient/formulaire/:numeroFormulaire',{
        templateUrl : '/static/template/page/ARC/visites.html',
        controller : 'formulaire'
    }).
         

    otherwise({
       redirectTo: '/home/0'
    });
});