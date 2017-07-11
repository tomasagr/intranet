angular.module('app.portada-controller', [])
  .controller('PortadaController', ['$scope', 'Upload', '$http', function ($scope, Upload, $http) {
    $scope.file = '/images/cover-default.png'

    setTimeout(function () {
      $scope.getCover($scope.profileid)
    })

    $scope.getCover = function (id) {
      $http.get('/api/users/' + id + '/cover')
        .then(function (response) {
          if (response.data.url) {
            $scope.file = '/storage/' + response.data.url
          }
        })
    }

    $scope.upload = function (id) {
      if (typeof $scope.file !== 'object') {
        return
      }
      Upload.upload({
        url: '/api/users/' + id + '/cover',
        data: {file: $scope.file}
      }).then(function (resp) {
        $scope.success = true
      }, function (resp) {
        console.log('Error status: ' + resp.status)
      })
    }
  }])
