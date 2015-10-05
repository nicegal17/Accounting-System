 'use strict';

 angular.module('accounting')
     .controller('employeectrl', function($scope, $filter, EmployeeFactory, toastr, ngDialog, ngTableParams) {

         $scope.saveEmployee = function() {
             console.log('employee: ', $scope.employee);

             if ($scope.isUpdate === true) {
                 EmployeeFactory.updateEmployee($scope.employee.empID, $scope.employee).then(function(data) {
                     toastr.success('Employee Details has been updated', 'Update Employee Details');
                 });
             } else {
                 EmployeeFactory.createEmployee($scope.employee).then(function(data) {
                     console.log('data: ', data);
                     toastr.success('New Employee has been added to the system.', 'Add New Employee');
                 });
             }

             $scope.employee = {};
             $scope.refresh();

             $scope.isDisable = true;
         };

         $scope.addNew = function() {
             $scope.isUpdate = false;
             $scope.employee = {};
             $scope.isDisable = false;
         };

         $scope.cancel = function() {
             $scope.employee = {};
             $scope.isUpdate = false;
             $scope.isDisable = true;
         };

         $scope.refresh = function() {
             $scope.tableParams.reload();
             $scope.searchEmployee = "";
         };

         $scope.getIDPos = function(id) {
             $scope.employee = {};
             EmployeeFactory.getPosID(id).then(function(data) {
                 if (data.length > 0) {
                     $scope.employee = data[0];
                     $scope.employee.position = data[0].idPosition;
                 }
             });
         };

         $scope.getEmployeeID = function(id) {
             $scope.employee = {};
             $scope.isDisable = false;
             EmployeeFactory.getEID(id).then(function(data) {
                 if (data.length > 0) {
                     $scope.employee = data[0];
                     $scope.isUpdate = true;
                 }
             });
         };

         $scope.$watch("searchEmployee", function() {
             $scope.tableParams.reload();
         });

         function init() {
             $scope.employees = {};
             $scope.employee = {};
             $scope.positions = {};
             $scope.isUpdate = false;
             $scope.isDisable = true;

             $scope.tableParams = new ngTableParams({
                 page: 1, // show first page
                 count: 10, // count per page
                 sorting: {
                     name: 'asc' // initial sorting
                 }
             }, {
                 getData: function($defer, params) {
                     EmployeeFactory.getEmployees().then(function(data) {
                         console.log('data: ', data);
                         var orderedData = {};

                         if ($scope.searchEmployee) {
                             orderedData = $filter('filter')(data, $scope.searchEmployee);
                             orderedData = params.sorting() ? $filter('orderBy')(orderedData, params.orderBy()) : orderedData;
                         } else {
                             orderedData = params.sorting() ? $filter('orderBy')(data, params.orderBy()) : data;
                         }

                         params.total(data.length);
                         $defer.resolve(orderedData.slice((params.page() - 1) * params.count(), params.page() * params.count()));
                     });
                 }
             });

             EmployeeFactory.getUsersPositions().then(function(data) {
                 console.log('positions: ', data);
                 $scope.positions = data;
             });
         }

         init();
     });
