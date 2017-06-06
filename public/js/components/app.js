var app = angular.module('app', [
  'app.agenda-controller',
  'app.user-controller',
  'app.user-profile-controller',
  'app.news-controlller',
  'app.salas-controller',
  'app.search-controller',
  'app.persons-controller',
  'app.video-controller',
  'app.manual-controller',
  'app.user-selector-controller',
  'app.users-service',
  'app.units-service',
  'app.sectors-service',
  'ui.calendar',
  'ui.bootstrap',
  'ngFileUpload',
  'oitozero.ngSweetAlert',
  'mwl.calendar',
  'ngSanitize',
  'angucomplete-alt'
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
