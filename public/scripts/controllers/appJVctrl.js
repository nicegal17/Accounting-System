 'use strict';

 angular.module('accounting')
     .controller('appJVctrl', function($scope, $filter, AppJVFactory, toastr, ngDialog, ngTableParams, $modalInstance) {

         $scope.appJV = function() {
             $scope.appjv = {};
         };

        $scope.closeModal = function() {
             console.log('cancel');
             $modalInstance.close();
         }

         $scope.changeMeChange = function(jv) {
             var str = jv.split('--');
             $scope.appjv.JID = str[0];
             $scope.appjv.sDate = str[1];
             $scope.appjv.Particular = str[2];
             $scope.appjv.JVNum = str[3];

             AppJVFactory.getAcctEntries($scope.appjv.JID).then(function(data) {
                 $scope.accnts = data;
                 console.log(data);

             });
         }

         $scope.approveJV = function() {
                 AppJVFactory.approveJV($scope.appjv.JID, $scope.appjv).then(function(data) {
                     console.log('data: ', data);
                     toastr.success('Journal Voucher has been approved', 'Approve JV');
                 });
         };

         $scope.denyJV = function() {
                 AppJVFactory.denyJV($scope.appjv.JID, $scope.appjv).then(function(data) {
                     console.log('data: ', data);
                     toastr.success('Journal Voucher has been denied', 'Denied JV');
                 });
         };

         function init() {
             $scope.appjv = {};
             $scope.appjv.JID = null;
             $scope.appjv.sDate = "";
             $scope.appjv.Particular = "";
             $scope.appjv.JVNum = "";
        
             AppJVFactory.getJVNo().then(function(data) {
                 $scope.jvnums = data;
             });
         }

         init();
     });
