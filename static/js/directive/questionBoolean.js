/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var medecinApp=angular.module("medecinApp");




medecinApp.directive("questionRange",["$rootScope",function ($rootScope){

    function link(scope, element, attrs) {
        
        scope.$watch("reponseObj",function (reponseObj){
            $rootScope.changeReponseHandler(reponseObj);
        },true);
        
        if(scope.pourTable === undefined){
            scope.pourTable = false;
        }
        scope.slider = {
            options: {
              floor: 0,
              ceil: 10
            }
        };
    }

    return {
        restrict: 'E',
        transclude: true,
        link : link,
        scope: {
          reponseObj: '=reponse',
          ennonce : '=',
          show : '=',
          class : '=class',
          change : "=",
          pourTable:"=?"
        },
        templateUrl: '/static/template/question/questionRange.html'
     };
    
}]);

medecinApp.directive("questionBoolean",["$rootScope",function ($rootScope){

    function link(scope, element, attrs) {
        
        scope.$watch("reponseObj",function (reponseObj){
            $rootScope.changeReponseHandler(reponseObj);
        },true);
        
        if(scope.pourTable === undefined){
            scope.pourTable = false;
        }
    }

    return {
        restrict: 'E',
        transclude: true,
        link : link,
        scope: {
          reponseObj: '=reponse',
          ennonce : '=',
          show : '=',
          class : '=class',
          change : "=",
          pourTable:"=?"
        },
        templateUrl: '/static/template/question/questionBoolean.html'
     };
    
}]);

medecinApp.directive("questionDate",function (){
    
    
    function link(scope, element, attrs) {
        
        if(scope.pourTable === undefined){
            scope.pourTable = false;
        }
    }
    
    return {
        restrict: 'E',
        transclude: true,
        link:link,
        scope: {
          reponseObj: '=reponse',
          ennonce : '=',
          show : '=',
          class : '=class',
          change : "=",
          pourTable:"=?",
        },
        templateUrl: '/static/template/question/questionDate.html'
     };
});


medecinApp.directive("questionNumber",["$rootScope",function ($rootScope){
    
    function link(scope, element, attrs) {
        scope.$watch("reponseObj",function (reponseObj){
            $rootScope.changeReponseHandler(reponseObj);
        },true);
        
     
        if(scope.pourTable === undefined){
            scope.pourTable = false;
        }
    }
    
    return {
        restrict: 'E',
        link : link,
        transclude: true,
        scope: {
          reponseObj: '=reponse',
          ennonce : '=',
          show : '=',
          addon : '=',
          class : '=class',
          change : "=",
          pourTable:"=?"
        },
        templateUrl: '/static/template/question/questionNumber.html'
     };
}]);


medecinApp.directive("questionText",["$rootScope",function ($rootScope){
    
    function link(scope, element, attrs) {
        
        if(scope.pourTable === undefined){
            scope.pourTable = false;
        }
        
        scope.$watch("reponseObj",function (reponseObj){
            $rootScope.changeReponseHandler(reponseObj);
        },true);
    }
    
    return {
        restrict: 'E',
        link : link,
        transclude: true,
        scope: {
          reponseObj: '=reponse',
          ennonce : '=',
          show : '=',
          class : '=class',
          change : "=",
          pourTable:"=?"
        },
        templateUrl: '/static/template/question/questionText.html'
     };
}]);


medecinApp.directive("questionChoixHor",["$rootScope",function ($rootScope){
    
    function link(scope, element, attrs) {
        var choix = attrs.choix.split("|");
        scope.keyChoix = choix[0].split(";");
        scope.choix = choix[1].split(";");
        
        scope.$watch("reponseObj",function (reponseObj){
            $rootScope.changeReponseHandler(reponseObj);
        },true);
        
        scope.getChoix = function (index){
            return scope.choix[index];
        }
    }
    
    
    return {
        restrict: 'E',
        link : link,
        transclude: true,
        scope: {
          reponseObj: '=reponse',
          ennonce : '=',
          show : '=',
          class : '=class',
          change : "="
        },
        templateUrl: '/static/template/question/questionChoixH.html'
     };
}]);


medecinApp.directive("questionChoixVer",["$rootScope",function ($rootScope){
    
    function link(scope, element, attrs) {
        var choix = attrs.choix.split("|");
        scope.keyChoix = choix[0].split(";");
        scope.choix = choix[1].split(";");
        
        scope.$watch("reponseObj",function (reponseObj){
            $rootScope.changeReponseHandler(reponseObj);
        },true);
        
        
        scope.getChoix = function (index){
            return scope.choix[index];
        }
    }
    
    
    return {
        restrict: 'E',
        link : link,
        transclude: true,
        scope: {
          reponseObj: '=reponse',
          ennonce : '=',
          show : '=',
          customValue : '=custom',
          class : '=class',
          change : "=",
          id : "="
        },
        templateUrl: '/static/template/question/questionChoixV.html'
     };
}]);




