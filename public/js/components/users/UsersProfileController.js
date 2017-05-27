angular.module('app.user-profile-controller', [])
  .controller('UsersProfileController',
  ['$scope', 'SectorsService', 'UnitsService', 'UsersService', 'Upload', 'SweetAlert', '$window',
    function ($scope, SectorsService, UnitsService, UsersService, Upload, SweetAlert, $window) {
      $scope.user = {}
      $scope.user.profile = {}

      $scope.toggleSectorSelect = function () {
        $scope.haveUnit = $scope.user.unit_id || false
        
        $scope.unitSelected = $scope.units.filter(function (element, index) {     
            return $scope.user.unit_id === element.id
          })

          $scope.sectors = $scope.unitSelected[0].sectors
      }
      
      setTimeout(function () {
        UsersService.getAll($scope.profileid)
        .then(function (response) {
          $scope.user = response
          
          $scope.isVoted = $scope.user.voting.find(function(element) {
            return element.user_id == $scope.authid
          })

          if ($scope.user.avatar && $scope.user.avatar != "null") {
            $scope.fileAvatar = '/storage/' + $scope.user.avatar
          } else {
            $scope.fileAvatar = '/images/default.svg'
          }
          $scope.toggleSectorSelect()
        })
      }, 400)

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
          url: '/api/users/' + $scope.user.id + '/edit',
          data: { file: $scope.file, user: $scope.user },
          method: 'POST'
        }).then(function (resp) {
          SweetAlert.swal({
            title: 'Exito!',
            text: 'Datos guardados con exito',
            type: 'success',
            showCancelButton: false,
            confirmButtonColor: 'green',
            confirmButtonText: 'OK',
            closeOnConfirm: true},
          function () {
            $window.location = '/home'
          })
        }, function (resp) {
          console.log('Error status: ' + resp.status)
        })
      }
    }
  ])
