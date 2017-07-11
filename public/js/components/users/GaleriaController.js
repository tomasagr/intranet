angular.module('app.galeria-controller', [])
  .controller('GaleriaController', ['$scope', 'Upload', '$http', function ($scope, Upload, $http) {
    setTimeout(function () {
      $scope.getGallery()
    })

    $scope.getGallery = function () {
      $http.get('/api/users/' + $scope.profileid + '/gallery')
        .then(function (response) {
          $scope.photos = response.data
        })
    }

    $scope.upload = function (file) {
      Upload.upload({
        url: '/api/users/' + $scope.profileid + '/gallery',
        data: {file: file}
      }).then(function (resp) {
        $scope.success = true
        $scope.photos = resp.data.photos
      }, function (resp) {
        console.log('Error status: ' + resp.status)
      })
    }
  }])
