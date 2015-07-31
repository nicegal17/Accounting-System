 'use strict';

 angular.module('accounting')
     .controller('userctrl', function($scope, $filter, UsersFactory, toastr, ngDialog, ngTableParams) {

         $scope.saveUser = function() {
             UsersFactory.createUsers($scope.user).then(function(data) {
                 toastr.success('Record Successfully Created', 'Record Saved');
             });
         };

         $scope.addNew = function() {
             $scope.isUpdate = false;
             $scope.user = {};
             $scope.isDisable = false;
         };

         $scope.cancel = function() {
             $scope.user = {};
             $scope.isUpdate = false;
             $scope.isDisable = true;
         };

         function init() {
             $scope.users = {};
             $scope.user = {};
             $scope.empNames = {};
             $scope.isDisable = true;

             UsersFactory.getEmployee().then(function(data) {
                 console.log('empNames: ', data);
                 $scope.empNames = data;
             });

             $scope.tableParams = new ngTableParams({
                 page: 1, 
                 count: 5, 
                 sorting: {
                    name: 'asc'
                 }
             }, {
                 getData: function($defer, params) {
                     UsersFactory.getAllUsers().then(function(data) {
                         console.log('data: ', data);
                         var orderedData = {};

                         if ($scope.searchUser) {
                             orderedData = $filter('filter')(data, $scope.searchUser);
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
