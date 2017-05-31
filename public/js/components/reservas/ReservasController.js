angular.module('app.reservas-controller', [])
  .controller('ReservasController', ['$scope', '$http', function ($scope, $http) {
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
            $scope.reservas = response.data.reservas
            $scope.franja = $scope.franja.filter(function (element) {
              return element != null
            })
          })
          .catch(function (err) {
            console.error(err)
          })
        })

    $scope.setTab = function (name, date) {
      $scope.tab = name
      $scope.daySelected = moment(date).format($scope.format)

      $http.get('/api/salas/' + $scope.tab)
        .then(function (response) {
          $scope.sala = response.data
          $scope.title = response.data.nombre
          $scope.franja = response.data.franja
          $scope.reservas = response.data.reservas
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
            $scope.franja = $scope.franja.filter(function (element) {
              return element != null
            })
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
            $scope.reservas = response.data.reservas
            $scope.franja = response.data.franja
            $scope.franja = $scope.franja.filter(function (element) {
              return element != null
            })
          })
          .catch(function (err) {
            console.error(err)
          })
    }

    $scope.setTab = function (name, date) {
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
            $scope.reservas = response.data.reservas
            $scope.franja = $scope.franja.filter(function (element) {
              return element != null
            })
          })
          .catch(function (err) {
            console.error(err)
          })
        })
    }
  }])
