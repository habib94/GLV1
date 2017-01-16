/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var GLApp = angular.module("GLApp");

GLApp.controller("homeVisiteur",["$scope","$uibModal","prestationService","$timeout",
    function ($scope,$uibModal,prestationService,$timeout){
        
        $scope.prestations = [];
        
        prestationService.getTous().then(function (prestations){
            $scope.prestations = prestations.data;
            GLApp.apply($scope,$timeout);
        },function (){
            GLApp.openErrorConnexionDialog($uibModal);
        });
        
}]);