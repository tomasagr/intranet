 angular.module('app.users-service', [])
  .service('UsersService', ['$http', function ($http) {
    var vm = this

    vm.store = function (data, file) {
      return $http.post('/api/users', {data})
        .then(function (response) {
          return response.data
        })
        .catch(function (error) {
          return error
        })
    }

    vm.index = function (id) {
      return $http.get('/api/users')
        .then(function (response) {
          return response.data
        })
        .catch(function (error) {
          return error
        })
    }

    vm.search = function (q) {
      return $http.get('/api/users/search?q=' + q)
        .then(function (response) {
          return response.data
        })
        .catch(function (error) {
          return error
        })
    }

    vm.getAll = function (id) {
      return $http.get('/api/users/' + id)
        .then(function (response) {
          return response.data
        })
        .catch(function (error) {
          return error
        })
    }
  }])
