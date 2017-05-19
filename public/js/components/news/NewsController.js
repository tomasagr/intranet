angular.module('app.news-controlller', [])

  .controller('NewsController', ['$scope', '$http', function ($scope, $http) {
    $scope.background = '#ccc'
    $http.get('/api/news?limit=4')
      .then(function (response) {
        $scope.lastNews = response.data
        $scope.selected = response.data[0]

        $scope.institucionales = $scope.lastNews.find(function (element) {
          return element.category_id === 2
        })

        $scope.informales = $scope.lastNews.find(function (element) {
          return element.category_id === 1
        })
      })

    $scope.changeSelected = function (index) {
      $scope.selected = $scope.lastNews[index]
    }
  }])
