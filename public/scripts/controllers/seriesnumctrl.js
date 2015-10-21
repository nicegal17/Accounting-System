 'use strict';

 angular.module('accounting')
     .controller('seriesnumctrl', function($scope, $filter, SeriesFactory, toastr, ngDialog, ngTableParams, $modalInstance) {

         $scope.saveSeries = function() {
             SeriesFactory.updateNumSeries($scope.series.idNum, $scope.series).then(function(data) {
                 console.log('data: ', data);
                 toastr.success('Accounting Number Seris has been Successfully Updated', 'Update Record');
             });
         };

         $scope.$watch("seriesnum", function() {
             $scope.tableParams.reload();
         });

         $scope.getSeriesNum = function(id) {
             $scope.series = {};
             SeriesFactory.getSeriesDet(id).then(function(data) {
                 if (data.length > 0) {
                     $scope.series = data[0];
                     $scope.isUpdate = true;
                 }
             });
         };

         $scope.cancel = function() {
             $scope.series = {};
             $scope.isUpdate = false;
         };

         $scope.closeModal = function() {
             $modalInstance.close();
         }

         function init() {
             $scope.series = {};

             $scope.tableParams = new ngTableParams({
                 page: 1, // show first page
                 count: 10, // count per page
                 sorting: {
                     name: 'asc' // initial sorting
                 }
             }, {
                 getData: function($defer, params) {
                     SeriesFactory.getSeriesNum().then(function(data) {
                         console.log('data: ', data);
                         var orderedData = {};

                         if ($scope.seriesnum) {
                             orderedData = $filter('filter')(data, $scope.seriesnum);
                             orderedData = params.sorting() ? $filter('orderBy')(orderedData, params.orderBy()) : orderedData;
                         } else {
                             orderedData = params.sorting() ? $filter('orderBy')(data, params.orderBy()) : data;
                         }

                         params.total(data.length);
                         $defer.resolve(orderedData.slice((params.page() - 1) * params.count(), params.page() * params.count()));
                     });
                 }
             });
         }

         init();
     });
