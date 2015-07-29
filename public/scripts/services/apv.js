'use strict';

angular.module('accounting')
    .factory('APVFactory', function($http, $q) {

        return {

            getAcctTitle: function(callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();

                $http.get('/api/v1/AP')
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
