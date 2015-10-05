 'use strict';

 angular.module('accounting')
     .controller('accountctrl', function($scope, $filter, AccountFactory,toastr, ngDialog, $modalInstance) {

        $scope.saveAccount = function() {
             if ($scope.isUpdate === true) {
                 AccountFactory.updateAccount($scope.account.acctTypeID, $scope.account).then(function(data) {
                     console.log('data: ', data);
                     toastr.success('Record Successfully Updated', 'Update Record');
                     $scope.refresh();
                 });
             } else {   
                 AccountFactory.createAccount($scope.account).then(function(data) {
                    console.log('data: ',data);
                     toastr.success('Record Successfully Created', 'Record Created');
                     $scope.refresh();
                 });
             }
         };

        $scope.Account = {
            name:'Account'
        };

        $scope.AccountVal = {
            "valID":"1",
            "value":"With Sub Account"
        };

        $scope.closeModal = function() {
             console.log('cancel');
             $modalInstance.close();
         }

     	function init(){
     		$scope.Account = {};
     		$scope.funds = {};
     		$scope.acctTypes = {};
     		$scope.norms = {};
     		$scope.finStatements = {};
            $scope.withSubAcct = false;
            $scope.noSubAcct = false;

     		AccountFactory.getFunds().then(function(data){
     			$scope.funds = data;
     		});

     		AccountFactory.getAcctTypes().then(function(data){
     			$scope.acctTypes = data;
     		});

     		AccountFactory.getNorms().then(function(data){
     			$scope.norms = data;
     		});

     		AccountFactory.getFS().then(function(data){
     			$scope.finStatements = data;
     		});

            AccountFactory.getAccountTitles().then(function(data){
                $scope.acctTitles = data;
            });
     	}

     	init();
     });
