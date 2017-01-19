/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var GLApp = angular.module("GLApp");

GLApp.controller("addOuvrier",["$scope","$uibModal","$location","$timeout",
            "prestationService","EVENTS","ouvrierService","$route",
    function ($scope,$uibModal,$location,$timeout,
        prestationService,EVENTS,ouvrierService,$route){
        
        $scope.ouvrier = {tarifs:[]};
        
        $scope.newTarif = {};
        
        $scope.prestations = [];
        
        $scope.remove = function (tarif){
            var indice = $scope.ouvrier.tarifs.indexOf(tarif);
            $scope.ouvrier.tarifs = $scope.ouvrier.tarifs.splice(indice+1,1);
        }
        
        $scope.addTarif = function (){
            $scope.ouvrier.tarifs = $scope.ouvrier.tarifs.concat($scope.newTarif);
            $scope.newTarif = {};
        };
        
        prestationService.getTous().then(function (prestations){
            $scope.prestations = prestations.data;
        },function (){
            GLApp.openErrorConnexionDialog($uibModal);
        });
        
        $scope.ajouterOuvrier = function (){
            $scope.$broadcast(EVENTS.CHECK_VALIDATION);
            if($scope.addOuvrierForm.$invalid)
                return;
            ouvrierService.save($scope.ouvrier).then(function (){
                GLApp.openInformationDialog($uibModal,"L'ouvrier a été bien ajouté");
                $route.reload();
            },function (){
                GLApp.openErrorConnexionDialog($uibModal);
            });
        };
        
}]);