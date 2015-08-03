 'use strict';

 angular.module('accounting')
     .controller('accountctrl', function($scope, $filter, AccountFactory) {

     	function init(){
     		$scope.fund = {};
     		$scope.funds = {};
     		$scope.acctType = {};
     		/*$scope.acctTypes = {};*/

     		AccountFactory.getFunds().then(function(data){
     			console.log('funds: ',data);
     			$scope.funds = data;
     		});

     		AccountFactory.getAcctTypes().then(function(data){
     			console.log('account type: ',data);
     			$scope.acctTypes = data;
     		});
     	}

     	init();
     });
