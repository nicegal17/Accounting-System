'use strict';

angular.module('accounting')
    .factory('BranchFactory', function($http, $q) {

        return {
            getBranches: function(callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();

                $http.get('/api/v1/branches')
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

            createBranch: function(data,callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();

                $http.post('/api/v1/branches',data).
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

            getBranchByID: function(id, callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();
                $http.get('/api/v1/branches/' + id)
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

            updateBranch: function(id,data,callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();

                $http.put('/api/v1/branches/'+ id,data).
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
            
            deleteBranch: function(id,callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();

                $http.delete('/api/v1/branches/'+ id).
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

            searchBranch: function(data,callback) {
                var cb = callback || angular.noop;
                var deferred = $q.defer();

                $http.get('/api/v1/branches')
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
