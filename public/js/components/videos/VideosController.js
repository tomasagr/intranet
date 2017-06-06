angular.module('app.video-controller', [])
  .controller('VideosController', ['$scope', '$http', '$sce', function ($scope, $http, $sce) {
    $scope.videoSelected = true

    $http.get('/api/videos')
      .then(function (response) {
        $scope.videos = response.data
        var link = $scope.videos[0].link
        $scope.link = $sce.trustAsResourceUrl('https://www.youtube.com/embed/' + link)
      })

    $http.get('/api/informacion')
      .then(function (response) {
        $scope.info = response.data
      })

    $http.get('/api/curiosidades')
      .then(function (response) {
        $scope.curiosidades = response.data
      })

    $scope.toggleCuriosidad = function (index) {
      $scope.curiosidades[index].isOpen = !$scope.curiosidades[index].isOpen
    }

    $scope.selectVideo = function (index) {
      $scope.videoSelected = true
      var link = $scope.videos[index].link
      $scope.link = $sce.trustAsResourceUrl('https://www.youtube.com/embed/' + link)
    }

    $scope.selectContent = function (index) {
      $scope.infoSelected = $scope.info[index]
    }
  }])
