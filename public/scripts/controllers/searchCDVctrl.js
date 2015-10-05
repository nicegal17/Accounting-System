 'use strict';

 angular.module('accounting')
     .controller('searchCDVctrl', function($scope, $filter, SearchCDVFactory, ngDialog,$modalInstance) {

        $scope.closeModal = function() {
             console.log('cancel');
             $modalInstance.close();
         }

        $scope.changeMeChange = function(cdv) {
             console.log('cdv: ', cdv);
             var str = cdv.split('--');
             $scope.search.CDVNo = str[0];
             $scope.search.sDate = str[1];
             $scope.search.Particular = str[2];
             $scope.search.CDVNum = str[3];

             SearchCDVFactory.getAcctEntries($scope.search.CDVNo).then(function(data) {
                 $scope.accnts = data;
                 console.log(data);

             });
         }

        function init(){
            $scope.search = {};

            SearchCDVFactory.getCDVNo().then(function(data) {
                 $scope.IDs = data;
             });

        };

        init();
     });
