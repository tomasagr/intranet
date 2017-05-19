angular.module('app.agenda-controller', [])
  .controller('AgendaCalendarController', ['$scope', function ($scope) {
    $scope.test = 'angular'

    var config = {
      calendar: {
        height: 450,
        editable: true,
        lang: 'it',
        header: {
          left: 'prev',
          center: 'title',
          right: 'next'
        },
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Octubre', 'Noviembre', 'Diciembre'],
        dayNamesShort: ['LUN', 'MAR', 'MIE', 'JUE', 'VIE', 'SAB', 'DOM'],
        eventClick: $scope.alertOnEventClick,
        eventDrop: $scope.alertOnDrop,
        eventResize: $scope.alertOnResize,
        eventRender: $scope.eventRender
      }
    }

    $scope.eventConfig = config
    $scope.vacationsConfig = config
    $scope.tokyoConfig = config

    $scope.renderCalendar = function () {
      setTimeout(function () {
        $('#vacationsCalendar').fullCalendar('render')
        $('#tokyoCalendar').fullCalendar('render')
        $('#vacationsCalendar').fullCalendar('rerenderEvents')
      }, 300)
    }
  }])
