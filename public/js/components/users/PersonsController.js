angular.module('app.persons-controller', [])
  .controller('PersonsController', ['$scope', 'UnitsService', 'UsersService', function($scope, UnitsService, UsersService) {
    
    UnitsService.getAll()
      .then(function(response) {
        $scope.units = response
      })

    $scope.changeUnit = function(index) {
      $scope.sectors = $scope.units[index].sectors
    }

    UsersService.index()
      .then(function(response) {
        $scope.users = response
      })
  }]);