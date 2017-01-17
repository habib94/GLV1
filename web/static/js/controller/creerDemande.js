/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var GLApp = angular.module("GLApp");

GLApp.controller("creerDemande",["$scope","$uibModal","$location","$timeout","prestationService","EVENTS","demandeService",
    function ($scope,$uibModal,$location,$timeout,prestationService,EVENTS,demandeService){
        
        $scope.demande = {};
        
        $scope.prestations = [];
        
        prestationService.getTous().then(function (prestations){
            $scope.prestations = prestations.data;
        },function (){
            GLApp.openErrorConnexionDialog($uibModal);
        });
        
        $scope.ajouterDemande = function (){
            $scope.$broadcast(EVENTS.CHECK_VALIDATION);
            if($scope.creerDemandeForm.$invalid)
                return;
            demandeService.save($scope.demande).then(function (){
               GLApp.openInformationDialog($uibModal,"Votre demande a été bien prise en charge"); 
               GLApp.go($location,$timeout,"/login");
            },function (){
                GLApp.openErrorConnexionDialog($uibModal);
            });
        };
        
}]);