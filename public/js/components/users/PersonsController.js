angular.module('app.persons-controller', [])
  .controller('PersonsController', ['$scope', 'UnitsService', 'UsersService', function ($scope, UnitsService, UsersService) {
    $scope.search = {}
    UnitsService.getAll()
      .then(function (response) {
        $scope.units = response
      })

    $scope.changeUnit = function (index) {
      $scope.sectors = $scope.units[index].sectors
      $scope.search.unit_id = $scope.units[index].id
    }

    $scope.changeSector = function (index) {
      $scope.search.sector_id = $scope.sectors[index].id
    }

    $scope.clearFilter = function (index) {
      $scope.search = {}
      $scope.sectors = []
    }

    UsersService.index()
      .then(function (response) {
        $scope.users = response
      })
  }])
