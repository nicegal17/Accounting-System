 'use strict';

 angular.module('accounting')
     .controller('branchctrl', function($scope, $filter, BranchFactory, toastr, ngDialog, ngTableParams) {

         $scope.saveBranch = function() {
             console.log('branch: ', $scope.branch);

             if ($scope.isUpdate === true) {
                 BranchFactory.updateBranch($scope.branch.brID, $scope.branch).then(function(data) {
                     console.log('data: ', data);
                     toastr.success('success', 'update');

                     $scope.refresh();
                 });
             } else {
                 BranchFactory.createBranch($scope.branch).then(function(data) {
                     console.log('data: ', data);
                     toastr.success('hello');
                     $scope.refresh();
                 });
             }
         };

         $scope.addNew = function() {
             $scope.isUpdate = false;
             $scope.branch = {};
             $scope.isDisable = false;
         };
 
         $scope.cancel = function() {
             $scope.branch = {};
             $scope.isUpdate = false;
             $scope.isDisable = true;
         };

         $scope.refresh = function() {
             $scope.tableParams.reload();
             $scope.searchUser = "";
         };

         $scope.getBRID = function(id) {
             $scope.branch = {};
             BranchFactory.getBranchByID(id).then(function(data) {
                 if (data.length > 0) {
                     $scope.branch = data[0];
                     $scope.isUpdate = true;
                 }
             });
         };

         $scope.delBranch = function(id) {
             ngDialog.openConfirm({
                 templateUrl: 'templates/directives/delModal.html',
                 className: 'ngdialog-theme-default',
                 scope: $scope
             }).then(function() {
                 BranchFactory.deleteBranch(id).then(function(data) {
                     $scope.refresh();
                 });
                 console.log(id);
             });

         };

         $scope.$watch("searchUser", function() {
             $scope.tableParams.reload();
         });

         /*$scope.search = function() {
             $scope.tableParams.reload();
         };*/


         function init() {
             $scope.branches = {};
             $scope.branch = {};
             $scope.isUpdate = false;
             $scope.isDisable = true;

             $scope.tableParams = new ngTableParams({
                 page: 1, // show first page
                 count: 10, // count per page
                 sorting: {
                     name: 'asc' // initial sorting
                 }
             }, {
                 getData: function($defer, params) {
                     BranchFactory.getBranches().then(function(data) {
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
