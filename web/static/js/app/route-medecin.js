

var medecinApp=angular.module("medecinApp");

medecinApp.config(function($routeProvider) {
   
    $routeProvider.

    when('/home', {
       templateUrl: '/static/template/page/medecin/homeMedecin.html',
       controller : 'homeMedecin'
    }).

    when('/profile',{
        templateUrl : '/static/template/page/medecin/profileUser-medecin.html'
    }).

    when('/patient/:idPatient',{
        templateUrl : '/static/template/page/medecin/pagePatient-medecin.html',
        controller : 'pagePatient'
    }).

    when('/patient/:idPatient/formulaire/:numeroFormulaire',{
        templateUrl : '/static/template/page/medecin/visites.html',
        controller : 'formulaire'
    }).
            
            
    when('/erreur',{
        templateUrl : '/static/template/page/medecin/erreur.html'
    }).        

    otherwise({
       redirectTo: '/home'
    });
});