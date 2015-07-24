 'use strict';

 angular.module('accounting')
     .controller('userctrl', function($scope, $filter, UsersFactory) {

         $scope.saveGroups = function() {
             console.log('employee: ', $scope.user);
             UsersFactory.createUsers($scope.user).then(function(data) {
                 console.log('data: ', data);
             });
         };

         $scope.refresh = function() {
             $scope.users = {};
             UsersFactory.getAllUsers().then(function(data) {
                 console.log('data: ', data);
                 $scope.users = data;
             });
         };

         $scope.getId = function(id){
            $scope.user = {};
            UsersFactory.getUserById(id).then(function(data){
                if(data.length > 0){
                    $scope.user = data[0];
                    $scope.user.position = data[0].idPosition;
                }
            });
         };

         function init() {
             $scope.users = {};
             $scope.user = {};
             $scope.positions = {};

             UsersFactory.getAllUsers().then(function(data) {
                 console.log('data: ', data);
                 $scope.users = data;
             });

             UsersFactory.getUsersPositions().then(function(data){
                console.log('positions: ',data);
                $scope.positions = data;
             });
         }

         init();
     });
