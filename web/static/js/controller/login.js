/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var GLApp = angular.module("GLApp");

GLApp.controller("login",["$scope","$uibModal","$location","$timeout",
            "loginService","EVENTS","$route",
    function ($scope,$uibModal,$location,$timeout,
        loginService,EVENTS,$route){
        
        $scope.compte = {};
        
        $scope.login = function (){
            loginService.login($scope.compte,function (result){
                if(result){
                    GLApp.openInformationDialog($uibModal,"Bienvenue");
                    setTimeout(function (){
                         window.location = "/"; 
                    },2000);
                }else{
                    GLApp.openErrorDialog($uibModal,"Votre email et/ou mot de passe sont incorrects")
                }
            },function (){
                GLApp.openErrorConnexionDialog($uibModal); 
            });
        };
        
}]);