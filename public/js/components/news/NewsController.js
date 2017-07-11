angular.module('app.news-controlller', [])
    .controller('NewsController', ['$scope', '$http', function ($scope, $http) {
      $scope.background = '#ccc'

      var pathname = window.location.pathname
      var url = '/api/news'

      if (pathname == '/institutional') {
        url = '/api/news?limit=4&category=2'
      } else if (pathname == '/informal') {
        url = '/api/news?limit=4&category=1'
      }

      $scope.isHome = pathname === '/home'
      $scope.isSecondary = pathname === '/institutional' || pathname === '/informal'

      $http.get(url)
            .then(function (response) {
              $scope.lastNews = response.data.slice(0, 4)
              $scope.selected = response.data[0]

              $scope.institucionales = response.data.filter(function (element) {
                return element.category_id === 2
              }).slice(0, 3)

              $scope.informales = response.data.filter(function (element) {
                return element.category_id === 1
              }).slice(0, 3)
            })
            .then(function () {
              $scope.lengthNews = -1
              $scope.go()
            })
            .catch(function (error) {
              console.log(error)
            })

      $scope.go = function () {
        $scope.lengthNews += 1
        if ($scope.lengthNews === 4) {
          $scope.lengthNews = 0
        }
        $scope.selected = $scope.lastNews[$scope.lengthNews]
        if (!$scope.$$phase) {
          $scope.$apply()
        }
        setTimeout($scope.go, 3000)
      }

      $scope.changeSelected = function (index) {
        $scope.selected = $scope.lastNews[index]
      }
    }])
