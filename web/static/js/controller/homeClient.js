/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var GLApp = angular.module("GLApp");

GLApp.controller("homeClient",["$scope","$uibModal","demandeService","$timeout","session",
    function ($scope,$uibModal,demandeService,$timeout,session){
        
        $scope.demandes = [];
        GLApp.openWaitDialog($uibModal);
        demandeService.demandesOfClient(session.user()).then(function (reponse){
            $scope.demandes = reponse.data;
            GLApp.closeWaitDialog();
            GLApp.apply($scope,$timeout);
        },function (){
            GLApp.openErrorConnexionDialog($uibModal);
        });
        
        $scope.setSatisfaction = function (demande){
            $uibModal.open({
                animation: true,
                templateUrl: '/static/template/dialog/satisfaction.html',
                controller: 'satisfaction',
                resolve: {
                  demande: function () {
                    return demande;
                  }
                }
            });
        };
        
}]);