angular.module('app.sectors-service', [])
   .service('SectorsService', ['$http', function ($http) {
     var vm = this

     vm.getAll = function () {
       return $http.get('/api/sectors')
        .then(function (response) {
          return response.data
        })
        .catch(function (error) {
          return error
        })
     }
   }])
