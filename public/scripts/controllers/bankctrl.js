 'use strict';

 angular.module('accounting')
     .controller('bankctrl', function($scope, $filter, BankFactory, toastr, ngDialog) {

     	$scope.saveBank = function() {
             console.log('bank: ', $scope.bank);
             BankFactory.createBanks($scope.bank).then(function(data) {
                 console.log('data: ', data);
             });
         };

        /* function init() {
         	$scope.bank = {};
         }

         init();*/
     });
