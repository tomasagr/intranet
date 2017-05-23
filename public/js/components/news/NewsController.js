angular.module('app.news-controlller', [])
  .controller('NewsController', ['$scope', '$http', function ($scope, $http) {
    $scope.background = '#ccc'

    var pathname = window.location.pathname
    var url = '/api/news?limit=4'

    if (pathname == '/institutional') {
      url = '/api/news?limit=4&category=2'
    } else if (pathname == '/informal') {
      url = '/api/news?limit=4&category=1'
    }

    $http.get(url)
      .then(function (response) {
        $scope.lastNews = response.data
        $scope.selected = response.data[0]

        $scope.institucionales = $scope.lastNews.filter(function (element) {
          return element.category_id === 2
        })

        $scope.informales = $scope.lastNews.filter(function (element) {
          return element.category_id === 1
        })
      })
      .catch(function (error) {
        console.log(error)
      })

    $scope.changeSelected = function (index) {
      $scope.selected = $scope.lastNews[index]
    }
  }])
