 'use strict';

 angular.module('accounting')
     .controller('subAcctctrl', function($scope, $filter, SubAcctFactory, toastr, ngDialog, $modalInstance) {

         $scope.saveSubAccount = function() {

             SubAcctFactory.createSubAccts($scope.subAccount).then(function(data) {
                 toastr.success('Record Successfully Created', 'Record Created');
                 $scope.subAccount = {};
                 $scope.refresh();
             });

         };

          $scope.cancel = function() {
             $scope.subAccount = {};
         };

         $scope.closeModal = function() {
             console.log('cancel');
             $modalInstance.close();
         }

         function init() {
             $scope.subAccount = {};
             $scope.subAccounts = {};

             SubAcctFactory.getAccountTitles().then(function(data) {
                 $scope.acctTitles = data;
             });

             SubAcctFactory.getNorms().then(function(data) {
                 $scope.norms = data;
             });

             SubAcctFactory.getAcctTypes().then(function(data) {
                 $scope.acctTypes = data;
             });

             SubAcctFactory.getFunds().then(function(data) {
                 $scope.funds = data;
             });

             SubAcctFactory.getFinStatements().then(function(data) {
                 $scope.statements = data;
             });
         }

         init();
     });
