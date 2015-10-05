'use strict';

angular.module('accounting')
    .factory('JVFactory', function($http, $q) {

        return {

            getAcctTitle: function(callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();

                $http.get('/api/v1/JV')
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

            createJV: function(data, callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();
                $http.post('/api/v1/JV', data)
                    .success(function(data) {
                        console.log('data: ', data);
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
