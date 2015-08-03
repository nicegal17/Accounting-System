 'use strict';

 angular.module('accounting')
     .controller('bankctrl', function($scope, $filter, BankFactory, toastr, ngDialog, ngTableParams) {

         $scope.saveBank = function() {
             if ($scope.isUpdate === true) {
                 BankFactory.updateBank($scope.bank.bankID, $scope.bank).then(function(data) {
                     console.log('data: ', data);
                     toastr.success('Record Successfully Updated', 'Update Record');
                     $scope.refresh();
                 });
             } else {
                 BankFactory.createBanks($scope.bank).then(function(data) {
                     toastr.success('Record Successfully Created', 'Record Created');
                     $scope.refresh();
                 });
             }
         };

         $scope.addNew = function() {
             $scope.isUpdate = false;
             $scope.bank = {};
             $scope.isDisable = false;
         };

         $scope.cancel = function() {
             $scope.bank = {};
             $scope.isUpdate = false;
             $scope.isDisable = true;
         };

         $scope.refresh = function() {
             $scope.tableParams.reload();
             $scope.searchBank = "";
         };

         $scope.$watch("searchBank", function() {
             $scope.tableParams.reload();
         });

         $scope.getBankID = function(id) {
             $scope.bank = {};
             $scope.isDisable = false;
             BankFactory.getBankByID(id).then(function(data) {
                 if (data.length > 0) {
                     $scope.bank = data[0];
                     $scope.isUpdate = true;
                 }
             });
         };

         $scope.delBank = function(id) {
             ngDialog.openConfirm({
                 templateUrl: 'templates/directives/delModal.html',
                 className: 'ngdialog-theme-default',
                 scope: $scope
             }).then(function() {
                 BankFactory.deleteBank(id).then(function(data) {
                     $scope.refresh();
                 });
                 console.log(id);
             });

         };

         function init() {
             $scope.bank = {};
             $scope.banks = {};
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
                     BankFactory.getBanks().then(function(data) {
                         var orderedData = {};

                         if ($scope.searchBank) {
                             orderedData = $filter('filter')(data, $scope.searchBank);
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
