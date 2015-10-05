 'use strict';

 angular.module('accounting')
     .controller('JVctrl', function($scope, $filter, JVFactory, toastr, ngDialog, $modalInstance) {

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

         $scope.removeRow = function(index) {
             $scope.entries.splice(index, 1);
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

         $scope.closeModal = function() {
             console.log('cancel');
             $modalInstance.close();
         }

          $scope.saveJVEntries = function() {
             console.log('jv: ', $scope.JV);
             console.log('jv: ', JSON.stringify($scope.entries));
             var data = {
                 JV: $scope.JV,
                 entries: JSON.stringify($scope.entries)
             }
             JVFactory.createJV(data).then(function(res) {
                 console.log('data: ', res);
                 toastr.success('Journal Voucher has been Created', 'JV Created');
                 $scope.entries = "";
                 $scope.JV = "";
                 $scope.totalDB = "";
                 $scope.totalCR = "";
             });
         };

         function init() {
             $scope.JVoucher = {};
             $scope.JV = {};
             $scope.acctTitles = {};
             $scope.entries = [];
             $scope.entry = {};
             
             JVFactory.getAcctTitle().then(function(data) {
                 $scope.acctTitles = data;
             });
         }

         init();
     });
