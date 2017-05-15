(function () {
  angular.module('app.controllers', [])
  .controller('UsersController', ['$scope', function ($scope) {
    $scope.toogleSectorSelect = function () {
      $scope.haveUnit = $scope.user.unit_id || false
    }
  }])
})()
