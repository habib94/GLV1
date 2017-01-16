/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var GLApp = angular.module("GLApp");

GLApp.controller("creerDemande",["$scope","$uibModal","$prestationService","EVENTS","demandeService",
    function ($scope,$uibModal,$prestationService,EVENTS,demandeService){
        
        $scope.demande = {};
        
        $scope.prestations = [];
        
        $prestationService.getTous().then(function (prestations){
            $scope.prestations = prestations;
        },function (){
            GLApp.openErrorConnexionDialog($uibModal);
        });
        
        $scope.ajouterDemande = function (){
            $scope.$broadcast(EVENTS.CHECK_VALIDATION);
            if($scope.creerDemandeForm.$invalid)
                return;
            demandeService.save().then(function (){
               GLApp.openInformationDialog($uibModal,"Votre demande a été bien prise en charge"); 
            },function (){
                GLApp.openErrorConnexionDialog($uibModal);
            });
        };
        
}]);