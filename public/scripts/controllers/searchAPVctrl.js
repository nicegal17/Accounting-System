 'use strict';

 angular.module('accounting')
     .controller('searchAPVctrl', function($scope, $filter, searchAPVFactory, ngDialog,$modalInstance) {

        $scope.closeModal = function() {
             console.log('cancel');
             $modalInstance.close();
         }

        $scope.changeMeChange = function(det) {
             var str = det.split('--');
             $scope.search.apvID = str[0];
             $scope.search.sDate = str[1];
             $scope.search.Particular = str[2];
             $scope.search.apvNum = str[3];

             searchAPVFactory.getAcctEntries($scope.search.apvID).then(function(data) {
                 $scope.accnts = data;
                 console.log(data);

             });
         }

        function init(){
            $scope.search = {};
            $scope.entries = [];
            $scope.acctTitles = {};

            searchAPVFactory.getAPVNo().then(function(data) {
                 $scope.apvs = data;
             });
        };

        init();
     });
