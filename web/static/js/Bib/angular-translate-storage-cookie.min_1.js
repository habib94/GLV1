/*!
 * angular-translate - v2.11.1 - 2016-07-17
 * 
 * Copyright (c) 2016 The angular-translate team, Pascal Precht; Licensed MIT
 */
!function(a,b){"function"==typeof define&&define.amd?define([],function(){return b()}):"object"==typeof exports?module.exports=b():b()}(this,function(){function a(a){"use strict";var b={get:function(b){return a.get(b)},set:function(b,c){a.put(b,c)},put:function(b,c){a.put(b,c)}};return b}return a.$inject=["$cookieStore"],angular.module("pascalprecht.translate").factory("$translateCookieStorage",a),a.displayName="$translateCookieStorage","pascalprecht.translate"});