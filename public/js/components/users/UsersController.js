angular.module('app.user-controller', [])
  .controller('UsersController', ['$scope', 'SectorsService', 'UnitsService', 'UsersService', 'Upload', 'SweetAlert', '$window',
    function ($scope, SectorsService, UnitsService, UsersService, Upload, SweetAlert, $window) {
      $scope.user = {}
      $scope.user.profile = {}

      $scope.toogleSectorSelect = function () {
        $scope.haveUnit = $scope.user.unit_id || false

        if ($scope.haveUnit) {
          $scope.sectorSelected = $scope.sectors.filter(function (element) {
            return $scope.user.unit_id === element.unit_id
          })
        }
      }

      UnitsService.getAll()
        .then(function (response) {
          $scope.units = response
          return SectorsService.getAll()
        })
        .then(function (response) {
          $scope.sectors = response
        })

      $scope.store = function () {
        Upload.upload({
          url: '/api/users',
          data: { file: $scope.file, user: $scope.user }
        }).then(function (resp) {
          SweetAlert.swal({
            title: 'Exito!',
            text: 'Registrado con éxito. Recibirás un email cuando tu cuenta este activa',
            type: 'success',
            showCancelButton: false,
            confirmButtonColor: 'green',
            confirmButtonText: 'OK',
            closeOnConfirm: true},
          function () {
            $window.location = '/login'
          })
        }, function (resp) {
          console.log('Error status: ' + resp.status)
        })
      }
    }
  ])
