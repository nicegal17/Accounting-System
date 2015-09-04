 'use strict';

 angular.module('accounting')
     .controller('cdvctrl', function($scope, $filter, CDVFactory) {

         $scope.today = function() {
             $scope.dt = new Date();
         }

         $scope.today();

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

        /* $scope.changeMeChange = function(accnt) {
             console.log('accnt: ', accnt);
             var str = accnt.split('-');
             $scope.beginBal.normsID = str[1];
             $scope.beginBal.idAccntTitle = str[0];
             console.log('normsId: ', str[1]);
             console.log('accntId: ', str[0]);
         }*/
         $scope.row = {
             entries: [{
                 acctTitle:'',
                 DB:'',
                 CR:''
             }]
         };
         
         $scope.addRow = function() {
            /*var acctEntry = new Object();*/
            acctTitle = "";
            DB = "";
            CR = "";


           $scope.row.entries = {};
           var ee = new Array();
           $scope.row.entries.acctTitle = ee[0];
           $scope.row.entries.DB = ee[1];
           $scope.row.entries.CR = ee[2];
             // $scope.row.entries.push({
                 /*acctTitle:'',
                 DB:'',
                 CR:''*/
             // });
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

          $scope.saveCDVEntries = function() {
             console.log('cdv: ', $scope.CDV);
            /* CDVFactory.createCDV($scope.CDV).then(function(data) {
                 console.log('data: ', data);
             });*/
         };

         function init() {
             $scope.banks = {};
             $scope.accounts = {};
             $scope.acctTitles = {};
             $scope.row.entries.acctTitle = null;
             $scope.row.entries.DB= null;
             $scope.row.entries.CR=null;
             
        
             CDVFactory.getBankName().then(function(data) {
                 $scope.banks = data;
             });

             CDVFactory.getAcctNum().then(function(data) {
                 $scope.accounts = data;
             });

             CDVFactory.getAcctTitle().then(function(data) {
                 $scope.acctTitles = data;
             });
         }

         init();
     });
