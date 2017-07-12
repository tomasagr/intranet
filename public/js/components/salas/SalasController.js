angular.module('app.salas-controller', [])
.controller('SalasController', ['$scope', 'calendarConfig', '$http', 'SweetAlert',
  function ($scope, calendarConfig, $http, SweetAlert) {
    moment.locale('es')

    $scope.format = 'DD [de] MMMM'
    $scope.tab = 'TOKYO'
    $scope.title = 'TOKYO | Sala Grande'
    $scope.calendarView = 'month'

    $scope.viewDate = moment().startOf('month').toDate()
    $scope.daySelected = moment().format($scope.format)

    $http.get('/api/salas/' + $scope.tab)
    .then(function (response) {
      $scope.sala = response.data
      $scope.title = response.data.nombre
      $scope.franja = response.data.franja
      $scope.reservas = response.data.reservas
      $scope.events = $scope.reservas.map(function (element) {
        return {
          title: 'Reserva',
          'user_id': element.user_id,
          'franja_id': element.franja_id,
          startsAt: moment(element.fecha).toDate(),
          incrementsBadgeTotal: false,
          color: {primary: '#008000'}
        }
      })
    })
    .then(function () {
      $http.get('/api/salas/' + $scope.sala.id + '/reservas/' + moment().format('YYYY-MM-DD [00:00:00]'))
      .then(function (response) {
        $scope.franja = response.data.franja
      })
      .catch(function (err) {
        console.error(err)
      })
    })

    $scope.userOwnFranja = function (id, user) {
      var userOwn = $scope.reservas.find(function (element) {
        return element.franja_id == id && element.user_id == user && element.sala_id == $scope.sala.id
      })

      return userOwn != undefined
    }

    $scope.deleteReserva = function (franja, authid) {
      SweetAlert.swal({
        title: 'Esta seguro?',
        text: 'Se dara de baja la reserva para la sala.',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Dar de baja!',
        cancelButtonText: 'No',
        closeOnConfirm: false},
       function () {
         $http.delete('/api/franja/' + franja + '/sala/' + $scope.sala.id + '/user/' + authid)
          .then(function () {
            window.location.reload()
          })
       })
    }

    $scope.setTab = function (name, date) {
      $scope.reservation = null
      $scope.tab = name
      $scope.daySelected = moment(date).format($scope.format)

      $http.get('/api/salas/' + $scope.tab)
      .then(function (response) {
        $scope.sala = response.data
        $scope.title = response.data.nombre
        $scope.franja = response.data.franja
        $scope.events = response.data.reservas.map(function (element) {
          return {
            title: 'Reserva',
            startsAt: moment(element.fecha).toDate(),
            incrementsBadgeTotal: false,
            color: {primary: '#008000'}
          }
        })
      })
      .then(function () {
        $http.get('/api/salas/' + $scope.sala.id + '/reservas/' + moment().format('YYYY-MM-DD [00:00:00]'))
        .then(function (response) {
          $scope.franja = response.data.franja
        })
        .catch(function (err) {
          console.error(err)
        })
      })
    }

    $scope.timespanClicked = function (date) {
      $scope.daySelected = moment(date).format($scope.format)
      $scope.dateActual = date
      $http.get('/api/salas/' + $scope.sala.id + '/reservas/' + moment(date).format('YYYY-MM-DD [00:00:00]'))
      .then(function (response) {
        $scope.franja = response.data.franja
      })
      .catch(function (err) {
        console.error(err)
      })
    }

    $scope.saveReservation = function () {
      var data = {
        fecha: moment($scope.dateActual).format('YYYY-MM-DD [00:00:00]'),
        sala_tag: $scope.tab,
        user_id: $('[data-userid]').val()
      }

      $scope.franjaIds = []
      $scope.reservationList = Object.keys($scope.reservation).filter(function (element) {
        var res = $scope.reservation[element]
        if (res) {
          return $scope.franjaIds.push(res)
        }
      })

      $scope.franjaIds.forEach(function (element) {
        $scope.setReservation(element, data)
      })
    }

    $scope.setReservation = function (id, data) {
      $http.post('/api/franja/' + id + '/reservation', data)
      .then(function (response) {
        SweetAlert.swal('Exito!', 'Sala reservada con éxito', 'success')

        $scope.events = response.data.map(function (element) {
          return {
            title: 'Reserva',
            startsAt: moment(element.fecha).toDate(),
            incrementsBadgeTotal: false,
            color: {primary: '#008000'}
          }
        })
      })
      .then(function () {
        $http.get('/api/salas/' + $scope.sala.id + '/reservas/' + moment($scope.dateActual).format('YYYY-MM-DD [00:00:00]'))
        .then(function (response) {
          $scope.franja = response.data.franja
          $scope.reservation = []
        })
        .catch(function (err) {
          console.error(err)
        })
      })
      .catch(function (err) {
        console.log(err)
      })
    }
  }])
