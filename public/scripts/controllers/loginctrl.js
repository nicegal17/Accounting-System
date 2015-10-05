'use strict';

angular.module('accounting')
  .controller('loginctrl', function($scope, $location) {

    // $scope.submit = function() {

    //  // $location.path('/dashboard');

    //   return false;
    // }


    $scope.login = function() {
    	$scope.dataLoading = true;
    	AuthenticationService.Login($scope.username, $scope.password, function(response) {
    		if (response.success) {
    			AuthenticationService.SetCredentials($scope.username, $scope.password);
    			$location.path('/');
    		} else {
    			$scope.error = response.message;
    			$scope.dataLoading = false;
    		}
    	});
    };

  });
