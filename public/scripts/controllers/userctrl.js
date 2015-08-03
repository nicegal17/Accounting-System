 'use strict';

 angular.module('accounting')
     .controller('userctrl', function($scope, $filter, UsersFactory, toastr, ngDialog, ngTableParams) {

         $scope.saveUser = function() {
             if ($scope.isUpdate === true) {
                 UsersFactory.updateUser($scope.user.userID, $scope.user).then(function(data) {
                     toastr.success('Record Successfully Updated', 'Record Updated');
                     $scope.refresh();
                 });
             } else {
                 UsersFactory.createUsers($scope.user).then(function(data) {
                     toastr.success('Record Successfully Created', 'Record Saved');
                     $scope.refresh();
                 });
             }
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

         $scope.getUserID = function(id) {
             $scope.user = {};
             $scope.isDisable = false;
             UsersFactory.getUserById(id).then(function(data) {
                 if (data.length > 0) {
                     $scope.user = data[0];
                     $scope.user.user = data[0].userID;
                     $scope.isUpdate = true;
                 }
             });
         };

          $scope.$watch("searchUser", function() {
             $scope.tableParams.reload();
         });

         function init() {
             $scope.users = {};
             $scope.user = {};
             $scope.empNames = {};
             $scope.isDisable = true;

             UsersFactory.getEmployee().then(function(data) {
                 console.log('empNames: ', data);
                 $scope.empNames = data;

                 $scope.user.empName = 3;
                 console.log($scope.user.empName);

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
