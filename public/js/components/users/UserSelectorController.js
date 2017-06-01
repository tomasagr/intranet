angular.module('app.user-selector-controller', [])
  .controller('UserSelectorController', ['$scope', function ($scope) {
    $scope.fields = [{}]

    $scope.addField = function () {
      $scope.fields.push({})
    }
  }])
