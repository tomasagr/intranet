angular.module('app', [
  'app.agenda-controller',
  'app.user-controller',
  'app.user-profile-controller',
  'app.news-controlller',
  'app.users-service',
  'app.units-service',
  'app.sectors-service',
  'ui.calendar',
  'ui.bootstrap',
  'ngFileUpload',
  'oitozero.ngSweetAlert'
]).filter('inDate', function () {
  return function (input) {
    return new Date(input)
  }
})
