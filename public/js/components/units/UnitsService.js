angular.module('app.units-service', [])
   .service('UnitsService', ['$http', function ($http) {
     var vm = this

     vm.getAll = function () {
       return $http.get('/api/units')
        .then(function (response) {
          return response.data
        })
        .catch(function (error) {
          return error
        })
     }
   }])
