angular.module('app.video-controller', [])
  .controller('VideosController', ['$scope', '$http', '$sce', function($scope, $http, $sce) {
    $scope.videoSelected = null

    $http.get('/api/videos')
      .then(function(response) {
        $scope.videos = response.data
      })

    $scope.selectVideo = function(index) {
      $scope.videoSelected = true
      var link = $scope.videos[index].link
      $scope.link = $sce.trustAsResourceUrl('https://www.youtube.com/embed/'+ link)
    }
  }])