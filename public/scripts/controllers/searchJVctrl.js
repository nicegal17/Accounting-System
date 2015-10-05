 'use strict';

 angular.module('accounting')
     .controller('searchJVctrl', function($scope, $filter, ngDialog, SearchJVFactory, $modalInstance) {

        $scope.closeModal = function() {
             console.log('cancel');
             $modalInstance.close();
         }

        $scope.changeMeChange = function(jv) {
             var str = jv.split('--');
             $scope.search.JID = str[0];
             $scope.search.sDate = str[1];
             $scope.search.Particular = str[2];
             $scope.search.JVNum = str[3];

             SearchJVFactory.getAcctEntries($scope.search.JID).then(function(data) {
                 $scope.accnts = data;
                 console.log(data);

             });
         }

        function init(){
            $scope.search = {};

            SearchJVFactory.getJVNo().then(function(data) {
                 $scope.jvs = data;
             });
        };

        init();
     });
