 'use strict';

 angular.module('accounting')
     .controller('userctrl', function($scope, $filter, UsersFactory) {

         function init() {
             $scope.users = {};
             $scope.user = {};
             $scope.empNames = {};

             UsersFactory.getAllUsers().then(function(data) {
                 console.log('empNames: ', data);
                 $scope.empNames = data;
             });
         }

         init();
     });
