'use strict';

angular.module('accounting')
    .factory('PositionFactory', function($http, $q) {
        return {
            getPositions: function(callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();

                $http.get('/api/v1/position')
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

            createPositions: function(data,callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();

                $http.post('/api/v1/position',data).
                success(function(data) {
                    deferred.resolve(data);
                    return cb();
                }).
                error(function(err) {
                    deferred.reject(err);
                    return cb(err);
                }.bind(this));

                return deferred.promise;
            },

            getPositionsByID: function(id, callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();
                $http.get('/api/v1/position/' + id)
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

            updatePositions: function(id,data,callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();

                $http.put('/api/v1/position/'+ id,data).
                success(function(data) {
                    deferred.resolve(data);
                    return cb();
                }).
                error(function(err) {
                    deferred.reject(err);
                    return cb(err);
                }.bind(this));

                return deferred.promise;
            },
        }
    });
