angular.module('app.productos-controller', [])
.controller('ProductosController', ['$scope', '$http', function ($scope, $http) {
  $scope.selectedTab = ''

  $http.get('/api/category-products')
  .then(function (response) {
    $scope.categories = response.data
  })

  $http.get('/api/products')
  .then(function (response) {
    $scope.products = response.data
  })

  $scope.setCategory = function (category) {
    var selectedCategory = category || ''
    if (selectedCategory) {
      $scope.selectedTab = selectedCategory.tag
      $http.get('/api/products/category/' + category.id)
      .then(function (response) {
        $scope.products = response.data
      })
    } else {
      $scope.selectedTab = selectedCategory
      $http.get('/api/products')
      .then(function (response) {
        $scope.products = response.data
      })
    }
  }
}])
