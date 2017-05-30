angular.module('app.agenda-controller', [])
  .controller('AgendaCalendarController', ['$scope', 'calendarConfig', 'calendarEventTitle',
    function ($scope, calendarConfig, calendarEventTitle) {
      moment.locale('es')

      $scope.viewDate = moment().startOf('month').toDate()
      $scope.calendarView = 'month'

      calendarConfig.showTimesOnWeekView = false
      calendarEventTitle.monthViewTooltip = calendarEventTitle.weekViewTooltip = calendarEventTitle.dayViewTooltip = function () {
        return ''
      }

      $scope.events = [
        {
          title: 'Event 1',
          color: 'red',
          startsAt: moment().startOf('month').toDate(),
          incrementsBadgeTotal: false
        },
        {
          title: 'Event 2',
          color: calendarConfig.colorTypes.info,
          startsAt: moment().startOf('month').toDate(),
          incrementsBadgeTotal: false
        }
      ]
    }])
