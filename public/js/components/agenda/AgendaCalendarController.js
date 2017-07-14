angular.module('app.agenda-controller', [])
.controller('AgendaCalendarController', ['$scope', 'calendarConfig', 'calendarEventTitle', '$http', '$sce',
  function ($scope, calendarConfig, calendarEventTitle, $http) {
    moment.locale('es')

    $scope.viewDate = moment().startOf('month').toDate()
    $scope.calendarView = 'month'
    $scope.daySelected = moment().format('DD [de] MMMM')

    calendarConfig.showTimesOnWeekView = false
    calendarEventTitle.monthViewTooltip = function (event) {
      return event.title
    }

    $scope.events = []

    $scope.getEvents = function (options) {
      var list = options.list || false
      var type = options.type || 'eventos'
      var url = options.url || '/api/events'

      $http.get(url)
      .then(function (response) {
        var eventos = response.data.eventos.map(function (element) {
          element.type = 'eventos'
          return element
        })
        var vacaciones = response.data.vacaciones.map(function (element) {
          element.type = 'vacaciones'
          eventos.push(element)
        })

        var data = eventos

        var daySelected = options.calendarDate || moment()
        $scope.frontEvents = data.filter(function (element) {
          var isSame = moment(element.fecha).isSame(daySelected, 'day')
          if (element.to_date != undefined) {
            var dateactual = moment(options.calendarDate) || moment()
            var isBetween = dateactual.isBetween(moment(element.fecha), moment(element.to_date))
          }
          return isSame || isBetween
        })

        if (!list) {
          var events = data.map(function (element) {
            var result = {
              title: element.titulo,
              originalStarts: moment(element.fecha).toDate(),
              startsAt: moment(element.fecha).toDate(),
              incrementsBadgeTotal: false,
              color: {}
            }

            if (element.type == 'vacaciones') {
              var toDate = element.to_date || element.fecha
              result.endsAt = moment(toDate).toDate()
            }

            if (element.is_birthday) {
              result.rrule = {
                freq: RRule.YEARLY,
                bymonth: moment(element.fecha).month() + 1,
                bymonthday: moment(element.fecha).date()
              }
            }
            if (element.tipo === 'AGRO') {
              result.color.primary = '#ff0000'
            } else if (element.tipo === 'SUMMIT') {
              result.color.primary = '#008000'
            } else if (element.type == 'vacaciones') {
              result.color.primary = '#f3922c'
              result.color.secondary = '#efb377'
            }

            return result
          })

          $scope.$watchGroup([
            'calendarView',
            'viewDate'
          ], function () {
            $scope.events = []

            events.forEach(function (event) {
              if (event.rrule != undefined) {
                var rule = new RRule(angular.extend({}, event.rrule, {
                  dtstart: moment($scope.viewDate).startOf($scope.calendarView).toDate(),
                  until: moment($scope.viewDate).endOf($scope.calendarView).toDate()
                }))
                rule.all().forEach(function (date) {
                  $scope.events.push(angular.extend({}, event, {
                    originalStarts: event.originalStarts,
                    startsAt: new Date(date)
                  }))
                })
              } else {
                $scope.events.push(event)
              }
            })
          })
        }
      })
    }

    $scope.getEvents({url: '/api/events'})

    $scope.timespanClicked = function (date, calendarCell, type) {
      if (calendarCell.events[0] != undefined) {
        $scope.daySelected = moment(calendarCell.events[0].originalStarts).format('DD [de] MMMM')
        var q = moment(calendarCell.events[0].originalStarts).format('YYYY-MM-DD [00:00:00]')
        $scope.getEvents({url: '/api/events/' + q, list: true, type: type, calendarDate: q})
      } else {
        $scope.frontEvents = []
      }
    }
  }])
