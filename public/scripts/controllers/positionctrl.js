 'use strict';

 angular.module('accounting')
     .controller('positionctrl', function($scope, $filter, PositionFactory, toastr, ngDialog, ngTableParams, $modalInstance) {

         $scope.savePosition = function() {
             console.log('position`: ', $scope.position);
             if ($scope.isUpdate === true) {
                 PositionFactory.updatePositions($scope.position.idPosition,$scope.position).then(function(data) {
                     toastr.success('Record Successfully Updated', 'Record Updated');
                 });
             } else {
                 PositionFactory.createPositions($scope.position).then(function(data) {
                     toastr.success('Record Successfully Created', 'Record Saved');
                 });
             }
             $scope.position = {};
             $scope.refresh();

             $scope.isDisable = true;
         };

         $scope.addNew = function() {
             $scope.isUpdate = false;
             $scope.position = {};
             $scope.isDisable = false;
         };

         $scope.cancel = function() {
             $scope.position = {};
             $scope.isUpdate = false;
             $scope.isDisable = true;
         };

         $scope.refresh = function() {
             $scope.tableParams.reload();
             $scope.searchPosition = "";
         };

         $scope.closeModal = function() {
             console.log('cancel');
             $modalInstance.close();
         }

         $scope.$watch("searchPosition", function() {
             $scope.tableParams.reload();
         });

         $scope.getIDPos = function(id) {
             $scope.position = {};
             $scope.isDisable = false;
             PositionFactory.getPositionsByID(id).then(function(data) {
                 if (data.length > 0) {
                     $scope.position = data[0];
                     $scope.position.position = data[0].idPosition;
                     $scope.isUpdate = true;
                 }
             });
         };

         function init() {
             $scope.position = {};
             $scope.isUpdate = false;
             $scope.isDisable = true;

             $scope.tableParams = new ngTableParams({
                 page: 1, 
                 count: 5, 
                 sorting: {
                     name: 'asc' 
                 }
             }, {
                 getData: function($defer, params) {
                     PositionFactory.getPositions().then(function(data) {
                         var orderedData = {};

                         if ($scope.searchPosition) {
                             orderedData = $filter('filter')(data, $scope.searchPosition);
                             orderedData = params.sorting() ? $filter('orderBy')(orderedData, params.orderBy()) : orderedData;
                         } else {
                             orderedData = params.sorting() ? $filter('orderBy')(data, params.orderBy()) : data;
                         }

                         params.total(data.length);
                         $defer.resolve(orderedData.slice((params.page() - 1) * params.count(), params.page() * params.count()));
                     });
                 }
             });
         }

         init();
     });
