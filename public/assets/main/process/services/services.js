var appService = angular.module('appService', [])

appService.factory('appModule', function( serverUrl, $http ){
  var appFactory = {};

  appFactory.sendNotification = function( data ) {
    return $http.post('http://handsomedev.com:8080/api/notify', data);
  };

  // appFactory.getExpensesPerMonth = function( data ) {
  //   return $http.post(serverUrl.url + 'expenses/month', data);
  // };

  return appFactory;
});