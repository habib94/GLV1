

var medecinApp=angular.module("medecinApp");

medecinApp.config(function($routeProvider, $locationProvider) {
   
    $routeProvider.

    when('/home', {
       templateUrl: '/static/template/page/technicien/homeTechnicien.html',
       controller : 'homeTechnicien'
    }).

    when('/profile',{
        templateUrl : '/static/template/page/technicien/profileUser-technicien.html'
    }).


    when('/centre/:idCentre',{
        templateUrl : '/static/template/page/technicien/pageCentre.html',
        controller : 'pageCentre'
    }).

    when('/patient/:idPatient',{
        templateUrl : '/static/template/page/technicien/pagePatient.html',
        controller : 'pagePatient'
    }).

    when('/patient/:idPatient/formulaire/:numeroFormulaire',{
        templateUrl : '/static/template/page/technicien/visites.html',
        controller : 'formulaire'
    }).    
            
    when('/erreur',{
        templateUrl : '/static/template/page/technicien/erreur.html',
    }).        

    otherwise({
       redirectTo: '/home'
    });
});