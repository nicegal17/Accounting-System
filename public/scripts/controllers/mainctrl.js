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

        init();
    });
