 'use strict';

 angular.module('accounting')
     .controller('apvctrl', function($scope, $filter, APVFactory, $modalInstance, ngDialog, toastr) {

        $scope.closeModal = function() {
             console.log('cancel');
             $modalInstance.close();
         }

         $scope.addRow = function(row) {
             var DB, CR;

             var title = _.find($scope.acctTitles, {
                 'idAcctTitle': parseInt(row.acctTitle)
             });

             if (row.DB === undefined || row.DB === null) {
                 DB = 0;
             } else {
                 DB = row.DB;
             }

             if (row.CR === undefined || row.CR === null) {
                 CR = 0;
             } else {
                 CR = row.CR;
             }

             $scope.entries.push({
                 acctTitle: row.acctTitle,
                 title: title.acctTitle,
                 DB: DB,
                 CR: CR
             });
             $scope.entry = {};
             $scope.total();
         };

         $scope.total = function() {
             $scope.totalDB = 0;
             $scope.totalCR = 0;
             angular.forEach($scope.entries, function(entry) {
                 $scope.totalDB += entry.DB;
                 $scope.totalCR += entry.CR;
                 console.log('$scope.totalDB: ', $scope.totalDB);
                 console.log('$scope.totalCR: ', $scope.totalCR);
             });
         };

         $scope.removeRow = function(index) {
             $scope.entries.splice(index, 1);
         };

         $scope.saveAPVEntries = function() {
             console.log('apv: ', $scope.APVoucher);
             console.log('apv: ', JSON.stringify($scope.entries));
             var data = {
                 APVoucher: $scope.APVoucher,
                 entries: JSON.stringify($scope.entries)
             }
             APVFactory.createAPV(data).then(function(res) {
                 console.log('data: ', res);
                 toastr.success('Account Payable Voucher has been Created', 'APV Created');
                 $scope.entries = "";
                 $scope.APVoucher = "";
                 $scope.totalDB = "";
                 $scope.totalCR = "";
             });
         };

         function init() {
             $scope.APVoucher = {};
             $scope.acctTitles = {};
             $scope.entries = [];
             $scope.entry = {};

             APVFactory.getAcctTitle().then(function(data) {
                 $scope.acctTitles = data;
             });
         }

         init();

     });
