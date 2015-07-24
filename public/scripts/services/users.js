'use strict';

angular.module('accounting')
    .factory('UsersFactory', function($http, $q) {
        var abouts = {};
        return {
            getAllUsers: function(callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();
                $http.get('/api/v1/users')
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
            getUserById: function(id, callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();
                $http.get('/api/v1/users/' + id)
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
            getUsersPositions: function(callback) {
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
            createUsers: function(data, callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();
                $http.post('/api/v1/users', data)
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
            updateUsers: function(id, data, callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();
                $http.put('/api/1.0/a/bout/' + id, data)
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
            deleteUsers: function(id, callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();
                $http.put('/api/1.0/a/bout/' + id, data)
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
