'use strict';

angular.module('accounting')
    .factory('SearchJVFactory', function($http, $q) {

        return {

            getJVNo: function(callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();

                $http.get('/api/v1/SearchJV')
                    .success(function(data) {
                        deferred.resolve(data);
                        return cb();
                    })
                    .error(function(err) {
                        deferred.reject(err);
                        return cb(err);
                    }.bind(this));

                return deferred.promise;
            },

            getAcctEntries: function(JID,callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();

                 $http.get('/api/v1/appJV/getAcctEntries/' + JID)
               // $http.get('/api/v1/SearchJV/getAcctEntries/' + JID)
                    .success(function(data) {
                        deferred.resolve(data);
                        return cb();
                    })
                    .error(function(err) {
                        deferred.reject(err);
                        return cb(err);
                    }.bind(this));

                return deferred.promise;
            },
        };
    });
