angular.module('app.agenda-controller', [])
  .controller('AgendaCalendarController', ['$scope', 'calendarConfig', 'calendarEventTitle', '$http', '$sce',
    function ($scope, calendarConfig, calendarEventTitle, $http) {
      moment.locale('es')

      $scope.viewDate = moment().startOf('month').toDate()
      $scope.calendarView = 'month'
      $scope.daySelected = moment().format('DD [de] MMMM')

      calendarConfig.showTimesOnWeekView = false
      calendarEventTitle.monthViewTooltip = calendarEventTitle.weekViewTooltip = calendarEventTitle.dayViewTooltip = function () {
        return ''
      }

      $scope.events = []

      $scope.getEvents = function (options) {
        var list = options.list || false
        var type = options.type || 'eventos'
        var url = options.url || '/api/events'

        $http.get(url)
          .then(function (response) {
            if (type === 'eventos') {
              var data = response.data.eventos
            } else {
              var data = response.data.vacaciones
            }

            var daySelected = options.calendarDate || moment()

            $scope.frontEvents = data.filter(function (element) {
              return moment(element.fecha).isSame(daySelected, 'day')
            })

            if (!list) {
              $scope.events = data.map(function (element) {
                var result = {
                  title: element.titulo,
                  startsAt: moment(element.fecha).toDate(),
                  incrementsBadgeTotal: false,
                  color: {}
                }

                if (element.tipo === 'AGRO') {
                  result.color.primary = '#ff0000'
                } else if (element.tipo === 'SUMMIT') {
                  result.color.primary = '#008000'
                }

                return result
              })
            }
          })
      }
      $scope.getEvents({url: '/api/events'})

      $scope.timespanClicked = function (date, type) {
        $scope.daySelected = moment(date).format('DD [de] MMMM')
        var q = moment(date).format('YYYY-MM-DD [00:00:00]')
        $scope.getEvents(
          {url: '/api/events/' + q, list: true, type: type, calendarDate: q}
        )
      }
    }])
