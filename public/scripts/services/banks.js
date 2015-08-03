'use strict';

angular.module('accounting')
    .factory('BankFactory', function($http, $q) {

        return {

            createBanks: function(data, callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();

                $http.post('/api/v1/bank', data).
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

            getBanks: function(callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();

                $http.get('/api/v1/bank')
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

            searchBank: function(data,callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();

                $http.get('/api/v1/bank')
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

            getBankByID: function(id, callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();
                $http.get('/api/v1/bank/' + id)
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

            updateBank: function(id,data,callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();

                $http.put('/api/v1/bank/'+ id,data).
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

            deleteBank: function(id,callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();

                $http.delete('/api/v1/bank/'+ id).
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
        };
    });
