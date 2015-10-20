'use strict';

angular
    .module('accounting')
    .controller('MainCtrl', function($scope) {

        function init() {
            console.log('MainCtrl');
        }

        init();
    })
    .controller('headerCtrl', function($scope, $modal,UsersFactory) {

        function init() {
            console.log('headerCtrl');
        }

        $scope.openPosition = function() {
            console.log('asdasda');
            var modalInstance = $modal.open({
                animation: true,
                templateUrl: '/templates/modals/position.html',
                controller: 'positionctrl',
                size: 'md'
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

        $scope.openSearchCDV = function() {
            var modalInstance = $modal.open({
                animation: true,
                templateUrl: '/templates/modals/searchCDV.html',
                controller: 'searchCDVctrl',
                size: 'lg'
            });
        };

        $scope.openJV = function() {
            var modalInstance = $modal.open({
                animation: true,
                templateUrl: '/templates/modals/JV.html',
                controller: 'JVctrl',
                size: 'lg'
            });
        };

        $scope.openAppJV = function() {
            var modalInstance = $modal.open({
                animation: true,
                templateUrl: '/templates/modals/appJV.html',
                controller: 'appJVctrl',
                size: 'lg'
            });
        };

        $scope.openSearchJV = function() {
            var modalInstance = $modal.open({
                animation: true,
                templateUrl: '/templates/modals/searchJV.html',
                controller: 'searchJVctrl',
                size: 'lg'
            });
        };

        $scope.openCheck = function() {
            var modalInstance = $modal.open({
                animation: true,
                templateUrl: '/templates/modals/check.html',
                controller: 'checkctrl',
                size: 'md'
            });
        };

        $scope.openAPVoucher = function() {
            var modalInstance = $modal.open({
                animation: true,
                templateUrl: '/templates/modals/APVoucher.html',
                controller: 'apvctrl',
                size: 'lg'
            });
        };

        $scope.openAppAPV = function() {
            var modalInstance = $modal.open({
                animation: true,
                templateUrl: '/templates/modals/appAPV.html',
                controller: 'appAPVctrl',
                size: 'lg'
            });
        };

        $scope.openSearchAPV = function() {
            var modalInstance = $modal.open({
                animation: true,
                templateUrl: '/templates/modals/searchAPV.html',
                controller: 'searchAPVctrl',
                size: 'lg'
            });
        };

        $scope.openUser = function() {
            var modalInstance = $modal.open({
                animation: true,
                templateUrl: '/templates/modals/user.html',
                controller: 'userctrl',
                size: 'md'
            });
        };

        $scope.openBank = function() {
            console.log('bank');
            var modalInstance = $modal.open({
                animation: true,
                templateUrl: '/templates/modals/bank.html',
                controller: 'bankctrl',
                size: 'md'
            });
        };

        $scope.openGenAcct = function() {
            var modalInstance = $modal.open({
                animation: true,
                templateUrl: '/templates/modals/genAcct.html',
                controller: 'accountctrl',
                size: 'md'
            });
        };

        $scope.openSubAcct = function() {
            var modalInstance = $modal.open({
                animation: true,
                templateUrl: '/templates/modals/subAcct.html',
                controller: 'subAcctctrl',
                size: 'md'
            });
        };

        $scope.openFixedAsset = function() {
            var modalInstance = $modal.open({
                animation: true,
                templateUrl: '/templates/modals/fixedAssets.html',
                controller: 'assetctrl',
                size: 'md'
            });
        };

        $scope.openAcctPeriod = function() {
            var modalInstance = $modal.open({
                animation: true,
                templateUrl: '/templates/modals/acctPeriod.html',
                controller: 'assetctrl',
                size: 'sm'
            });
        };

        $scope.openBeginningBal = function() {
            var modalInstance = $modal.open({
                animation: true,
                templateUrl: '/templates/modals/beginBal.html',
                controller: 'beginBalctrl',
                size: 'md'
            });
        };

        $scope.logout = function(){
            console.log('logout');
            UsersFactory.logoutUser().then(function(data){
                if(data.success == true){
                    window.location.href=data.url;
                }
            });
        };

        $scope.seriesNumbers = function(){
           var modalInstance = $modal.open({
                animation: true,
                templateUrl: '/templates/modals/seriesNo.html',
                controller: 'seriesnumctrl',
                size: 'md'
            });
        };

        init();
    });
