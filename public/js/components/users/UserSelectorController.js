angular.module('app.user-selector-controller', [])
  .controller('UserSelectorController', ['$scope', function ($scope) {
    $scope.fields = [{}]
    $scope.privado = {value: 0}

    $scope.addField = function () {
      $scope.fields.push({})
    }

    $scope.removeField = function (index) {
      $scope.fields.splice(index, 1)
    }
  }])
