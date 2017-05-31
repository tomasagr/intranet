var app = angular.module('app', [
  'app.reservas-controller',
  'oitozero.ngSweetAlert',
  'mwl.calendar'
])

app.filter('inDate', function () {
  return function (input) {
    if (input) {
      return new Date(input)
    }
    return input
  }
})

app.config(['calendarConfig', function (calendarConfig) {
  calendarConfig.dateFormatter = 'moment' // use moment to format dates
}])
