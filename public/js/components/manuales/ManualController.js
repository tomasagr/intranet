angular.module('app.manual-controller', [])
.controller('ManualController', ['$scope', '$http', '$sce', 'SectorsService', function ($scope, $http, $sce, SectorsService) {
  $scope.search = {}
  $scope.link = ''
  $http.get('/api/manuals')
    .then(function (response) {
      $scope.manual = response.data
    })
    .catch(function (error) {
      console.error(error)
    })

  $scope.modalData = function (link) {
    $scope.linkData = $sce.trustAsResourceUrl('https://www.youtube.com/embed/' + link)
  }

  SectorsService.getAll()
    .then(function (response) {
      $scope.sectors = response
    })

  $scope.filterSector = function (id) {
    $scope.search.sector_id = id || ''
  }

  $scope.closeModal = function () {
    $scope.linkData = ''
  }
}])
