 'use strict';

 angular.module('accounting')
     .controller('beginBalctrl', function($scope, $filter, beginBalFactory, toastr, $modalInstance) {

         $scope.saveBeginningBal = function() {
             console.log('beginBal: ', $scope.beginBal);
              beginBalFactory.createBeginBal($scope.beginBal).then(function(data) {
                  console.log('data: ', data);
                  toastr.success('Record Successfully Saved');
                  $scope.beginBal = {};
              });
         };

         $scope.changeMeChange = function(accnt) {
             console.log('accnt: ', accnt);
             var str = accnt.split('-');
             $scope.beginBal.normsID = str[1];
             $scope.beginBal.idAccntTitle = str[0];
             console.log('normsId: ', str[1]);
             console.log('accntId: ', str[0]);
         }

         $scope.cancel = function() {
             $scope.beginBal = {};
         };

         $scope.closeModal = function() {
             console.log('cancel');
             $modalInstance.close();
         }

         function init() {
             $scope.acctTitle = {};
             $scope.beginBal = {};
             $scope.beginBal.normsID = null;
             $scope.beginBal.idAccntTitle = null;

             beginBalFactory.getAcctTitles().then(function(data) {
                 $scope.acctTitles = data;
             });
         }

         init();
     });
