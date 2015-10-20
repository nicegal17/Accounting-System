 'use strict';

 angular.module('accounting')
     .controller('podetailsctrl', function($scope, $stateParams, $filter, PODetFactory, toastr, ngTableParams) {

         function init() {
             $scope.poDetails = {};
             $scope.poItems = {};
             $scope.sums = {};

             if (!_.isUndefined($stateParams.id)) {
                 PODetFactory.getPoDetails($stateParams.id).then(function(data) {
                     if (data.length > 0) {
                         console.log('data', data);
                         $scope.poDetails = data;
                     }
                 });

                 PODetFactory.getPOItems($stateParams.id).then(function(data) {
                     if (data.length > 0) {
                         console.log('poItems', data);
                         $scope.poItems = data;
                     }
                 });

                 PODetFactory.selectSUM($stateParams.id).then(function(data) {
                     if (data.length > 0) {
                         $scope.sums = data;
                     }
                 });
             }
         }

         init();
     });
