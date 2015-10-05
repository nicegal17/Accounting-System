 'use strict';

 angular.module('accounting')
     .controller('appCDVctrl', function($scope, $filter, AppCDVFactory, toastr, ngDialog, ngTableParams, $modalInstance) {

         $scope.appCDV = function() {
             $scope.appcdv = {};
         };

         $scope.closeModal = function() {
             console.log('cancel');
             $modalInstance.close();
         }

         $scope.changeMeChange = function(cdv) {
             console.log('cdv: ', cdv);
             var str = cdv.split('--');
             $scope.appcdv.CDVNo = str[0];
             $scope.appcdv.sDate = str[1];
             $scope.appcdv.Particular = str[2];
             $scope.appcdv.CDVNum = str[3];

             AppCDVFactory.getAcctEntries($scope.appcdv.CDVNo).then(function(data) {
                 $scope.accnts = data;
                 console.log(data);

             });
         }

         $scope.appCDV = function() {
                 AppCDVFactory.appCDV($scope.appcdv.CDVNo, $scope.appcdv).then(function(data) {
                     console.log('data: ', data);
                     toastr.success('Check Disbursement Voucher has been approved', 'Approve CDV');
                 });
         };

         $scope.denyCDV = function() {
                 AppCDVFactory.denyCDV($scope.appcdv.CDVNo, $scope.appcdv).then(function(data) {
                     console.log('data: ', data);
                     toastr.success('Check Disbursement Voucher has been denied', 'Denied CDV');
                 });
         };

         function init() {
             $scope.appcdv = {};
             $scope.appcdv.CDVNo = null;
             $scope.appcdv.sDate = "";
             $scope.appcdv.Particular = "";
             $scope.appcdv.CDVNum = "";
             $scope.entries = [];
             $scope.acctTitles = {};

             AppCDVFactory.getCDVNo().then(function(data) {
                 $scope.IDs = data;
             });
         }

         init();
     });
