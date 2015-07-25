 'use strict';

 angular.module('accounting')
     .controller('positionctrl', function($scope, $filter, PositionFactory, toastr, ngDialog, ngTableParams) {

         $scope.savePosition = function() {
             console.log('position`: ', $scope.position);
             if ($scope.isUpdate === true) {
                 PositionFactory.updatePositions($scope.position.idPosition,$scope.position).then(function(data) {
                     ptoastr.success('Record Successfully Updated', 'Record Updated');
                     $scope.refresh();
                 });
             } else {
                 PositionFactory.createPositions($scope.position).then(function(data) {
                     toastr.success('Record Successfully Created', 'Record Saved');
                     $scope.refresh();
                 });
             }
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
             $scope.searchEmp = "";
         };

         $scope.search = function() {
             $scope.tableParams.reload();
         };

         $scope.getIDPos = function(id) {
             $scope.position = {};
             PositionFactory.getPositionsByID(id).then(function(data) {
                 if (data.length > 0) {
                     $scope.position = data[0];
                     $scope.position.position = data[0].idPosition;
                 }
             });
         };

         function init() {
             console.log('hahahaha');

             $scope.position = {};
             $scope.isUpdate = false;
             $scope.isDisable = true;

             $scope.tableParams = new ngTableParams({
                 page: 1, // show first page
                 count: 5, // count per page
                 sorting: {
                     name: 'asc' // initial sorting
                 }
             }, {
                 getData: function($defer, params) {
                     PositionFactory.getPositions().then(function(data) {
                         console.log('data: ', data);
                         var orderedData = {};

                         if ($scope.searchEmp) {
                             orderedData = $filter('filter')(data, $scope.searchEmp);
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
