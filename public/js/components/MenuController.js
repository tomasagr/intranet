angular.module('app.search-controller', [])
  .controller('MenuController', ['$scope', '$http', function($scope, $http) {


    $scope.toggleBox = function() {
      $scope.isOpen = !$scope.isOpen
    }

    $scope.search = function() {
      window.location = '/search?q=' + $scope.querySend
    }

    if (window.location.search.indexOf('q') > -1) {
      var q = window.location.search.split('=')[1]
      
      $http.get('/api/news/search?q='+q)
        .then(function(response) {
          $scope.news = response.data
        })
    } else {
      $http.get('/api/news/search')
        .then(function(response) {
          $scope.news = response.data
        })
    }
  }])