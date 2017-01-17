/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var GLApp=angular.module("GLApp");

GLApp.config(['$interpolateProvider',function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[[');
    $interpolateProvider.endSymbol(']]]');
    
}]);

