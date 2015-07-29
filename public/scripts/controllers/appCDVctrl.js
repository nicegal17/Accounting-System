 'use strict';

 angular.module('accounting')
     .controller('appCDVctrl', function($scope, $filter, CDVFactory, toastr, ngDialog, ngTableParams) {

     	 $scope.appCDV = function() {
     	 	 $scope.cdv = {};
             $scope.isAppAud = false;
             $scope.isDisable = true;
         };

          $scope.audCDV = function() {
          	 $scope.cdv = {};
             $scope.isAppCDV= false;
             $scope.isDisable = true;
             $scope.ActLabel = "Audit Check Disbursement Voucher";
         };

         function init(){
         	$scope.cdv = {};
         	$scope.isUpdate = false;
            $scope.isDisable = true;

        }

         init();
});
