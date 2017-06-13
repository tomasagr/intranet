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

          if ($scope.search.sector_id === '') {
              $scope.selectedFilter = 'Todos'
              return true
            }

          $scope.selectedFilter = $scope.sectors.find(function (element) {
              return element.id == id
            })

          $scope.selectedFilter = $scope.selectedFilter.name
        }

      $scope.closeModal = function () {
          $scope.linkData = ''
        }
    }])
