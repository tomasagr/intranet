var app = angular.module('app', [
  'app.agenda-controller',
  'app.user-controller',
  'app.user-profile-controller',
  'app.news-controlller',
  'app.video-controller',
  'app.manual-controller',
  'app.users-service',
  'app.units-service',
  'app.sectors-service',
  'ui.calendar',
  'ui.bootstrap',
  'ngFileUpload',
  'oitozero.ngSweetAlert'
])

app.filter('inDate', function () {
  return function (input) {
    if (input) {
      return new Date(input)
    }
    return input
  }
})
