/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var GLApp = angular.module("GLApp");

GLApp.controller("homeAgentAdministratif",["$scope","$uibModal","ouvrierService","$timeout","session",
    function ($scope,$uibModal,ouvrierService,$timeout,session){
        
        $scope.ouvriers = [];
        
        $scope.getOuvriers = function (){
            GLApp.openWaitDialog($uibModal);
            ouvrierService.getOuvriers().then(function (reponse){
                GLApp.closeWaitDialog();
                $scope.ouvriers = reponse.data;
                GLApp.apply($scope,$timeout);
            },function (){
                GLApp.openErrorConnexionDialog($uibModal);
            });
        };
        
        $scope.getOuvriers();
}]);