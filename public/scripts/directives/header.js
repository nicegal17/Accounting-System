'use strict';
angular.module('accounting')
    .directive('navBar', function() {
        return {
            restrict: 'AE',
            templateUrl: 'templates/directives/header.html'
        };
    });
