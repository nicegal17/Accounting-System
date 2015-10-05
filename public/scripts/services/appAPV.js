'use strict';

angular.module('accounting')
    .factory('appAPVFactory', function($http, $q) {

        return {

            getAPVNo: function(callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();

                $http.get('/api/v1/appAPV')
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

            getAcctEntries: function(apvID,callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();

                $http.get('/api/v1/appAPV/getAcctEntries/' + apvID)
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

            // approveJV: function(id,data,callback) {
            //     var cb = callback || angular.noop;
            //     var deferred = $q.defer();

            //     $http.put('/api/v1/appJV/'+ id,data).
            //     success(function(data) {
            //         deferred.resolve(data);
            //         return cb();
            //     }).
            //     error(function(err) {
            //         deferred.reject(err);
            //         return cb(err);
            //     }.bind(this));

            //     return deferred.promise;
            // },

            // denyJV: function(id,data,callback) {
            //     var cb = callback || angular.noop;
            //     var deferred = $q.defer();

            //     $http.put('/api/v1/appJV/denyJV/'+ id,data).
            //     success(function(data) {
            //         deferred.resolve(data);
            //         return cb();
            //     }).
            //     error(function(err) {
            //         deferred.reject(err);
            //         return cb(err);
            //     }.bind(this));

            //     return deferred.promise;
            // },
        };
    });
