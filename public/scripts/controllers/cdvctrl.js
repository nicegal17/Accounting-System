 'use strict';

 angular.module('accounting')
     .controller('cdvctrl', function($scope, $filter, CDVFactory, toastr) {

         $scope.today = function() {
             $scope.dt = new Date();
         }

         $scope.clear = function() {
             $scope.dt = null;
         };

         $scope.disabled = function(date, mode) {
             return (mode === 'day' && (date.getDay() === 0 || date.getDay() === 6));
         };

         $scope.toggleMin = function() {
             $scope.minDate = $scope.minDate ? null : new Date();
         };
         $scope.toggleMin();

         $scope.open = function($event) {
             $event.preventDefault();
             $event.stopPropagation();

             $scope.opened = true;
         };

         $scope.getDayClass = function(date, mode) {
             if (mode === 'day') {
                 var dayToCheck = new Date(date).setHours(0, 0, 0, 0);

                 for (var i = 0; i < $scope.events.length; i++) {
                     var currentDay = new Date($scope.events[i].date).setHours(0, 0, 0, 0);

                     if (dayToCheck === currentDay) {
                         return $scope.events[i].status;
                     }
                 }
             }

             return '';
         };

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

         $scope.saveCDVEntries = function() {
             console.log('cdv: ', $scope.CDV);
             console.log('cdv: ', JSON.stringify($scope.entries));
             var data = {
                 CDV: $scope.CDV,
                 entries: JSON.stringify($scope.entries)
             }
             CDVFactory.createCDV(data).then(function(res) {
                 console.log('data: ', res);
                 toastr.success('Check Disbursement Voucher has been Created', 'CDV Created');
                 $scope.entries = "";
                 $scope.CDV = "";
                 $scope.totalDB = "";
                 $scope.totalCR = "";
             });
         }; 

         function init() {
             $scope.banks = {};
             $scope.accounts = {};
             $scope.acctTitles = {};
             $scope.entries = [];
             $scope.entry = {};
             $scope.cdvnums = {};

             CDVFactory.getBankName().then(function(data) {
                 $scope.banks = data;
             });

             CDVFactory.getAcctNum().then(function(data) {
                 $scope.accounts = data;
             });

             CDVFactory.getAcctTitle().then(function(data) {
                 $scope.acctTitles = data;
             });

             CDVFactory.getCDVNum().then(function(data) {
                 $scope.cdvnums = data;
             });

             $scope.dateOptions = {
                 formatYear: 'yy',
                 startingDay: 1
             };

             $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
             $scope.format = $scope.formats[0];

             var tomorrow = new Date();
             tomorrow.setDate(tomorrow.getDate() + 1);
             var afterTomorrow = new Date();
             afterTomorrow.setDate(tomorrow.getDate() + 2);
             $scope.events = [{
                 date: tomorrow,
                 status: 'full'
             }, {
                 date: afterTomorrow,
                 status: 'partially'
             }];
         }

         $scope.today();

         init();
     });
