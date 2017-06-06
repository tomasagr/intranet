angular.module('app.user-selector-controller', [])
  .controller('UserSelectorController', ['$scope', 'UsersService', function ($scope, UsersService) {
    $scope.fields = [{}]
    $scope.selectedUser = []
    $scope.users = []
    $scope.privado = {value: 0}

    UsersService.index()
      .then(function (response) {
        $scope.users = response.data
      })

    $scope.addField = function () {
      $scope.fields.push({})
    }

    $scope.removeField = function (index) {
      $scope.fields.splice(index, 1)
    }
  }])
