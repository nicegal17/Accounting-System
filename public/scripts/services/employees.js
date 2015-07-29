'use strict';

angular.module('accounting')
    .factory('EmployeeFactory', function($http, $q) {

        return {
            createEmployee: function(data, callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();
                $http.post('/api/v1/employees', data)
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

            getPosID: function(id, callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();
                $http.get('/api/v1/employees/' + id)
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

            getEmployees: function(callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();
                $http.get('/api/v1/employees')
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
