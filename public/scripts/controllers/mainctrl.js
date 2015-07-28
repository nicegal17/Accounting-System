'use strict';

angular
    .module('accounting')
    .controller('MainCtrl', function($scope) {

        function init() {
            console.log('MainCtrl');
        }

        init();
    })
    .controller('headerCtrl', function($scope, $modal) {

        function init() {
            console.log('headerCtrl');
        }

        $scope.openPosition = function() {
        	console.log('asdasda');
            var modalInstance = $modal.open({
                animation: true,
                templateUrl: '/templates/modals/position.html',
                controller: 'positionctrl',
                size: 'lg'
            });
        };

        $scope.openAppCDV = function() {
            console.log('asdasda');
            var modalInstance = $modal.open({
                animation: true,
                templateUrl: '/templates/modals/appCDV.html',
                controller: 'appCDVctrl',
                size: 'lg'
            });
        };

        $scope.openAudCDV = function() {
            console.log('asdasda');
            var modalInstance = $modal.open({
                animation: true,
                templateUrl: '/templates/modals/audCDV.html',
                controller: 'audCDVctrl',
                size: 'lg'
            });
        };

        init();
    });
