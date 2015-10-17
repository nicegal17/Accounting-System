 'use strict';

 angular.module('accounting')
     .controller('podetailsctrl', function($scope, $stateParams, $filter, PODetFactory, toastr, ngTableParams) {

         function init() {
             $scope.poDetails = {};

             if (!_.isUndefined($stateParams.id)) {
                 PODetFactory.getPoDetails($stateParams.id).then(function(data) {
                     if (data.length > 0) {
                         console.log('data', data);
                         $scope.poDetails = data;
                         $scope.isUpdate = true;
                     }
                 });
             }
         }

         init();
     });
