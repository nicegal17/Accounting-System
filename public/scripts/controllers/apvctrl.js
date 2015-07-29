 'use strict';

 angular.module('accounting')
     .controller('apvctrl', function($scope, $filter, APVFactory) {

         $scope.row = {
             entries: [{
                 acctTitle: '',
                 DB: '',
                 CR: ''
             }]
         };

         $scope.addRow = function() {
             $scope.row.entries.push({
                 acctTitle: '',
                 DB: '',
                 CR: ''
             });
         };

         $scope.removeRow = function(index) {
             $scope.row.entries.splice(index, 1);
         };

         $scope.total = function() {
             var total = 0;
             angular.forEach($scope.row.entries, function(entry) {
                 total += entry.DB + entry.CR;

             })
             return total;
         };

         function init() {
             $scope.APVoucher = {};
             $scope.AP = {};
             $scope.acctTitles = {};

             APVFactory.getAcctTitle().then(function(data) {
                 $scope.acctTitles = data;
             });
         }

         init();

     });
