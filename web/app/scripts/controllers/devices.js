'use strict';

/**
 * @ngdoc function
 * @name app.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the app
 */
app.controller('DevicesCtrl', function ($scope, $http, $location) {
  $scope.goToDevice = function(id) {
    $location.path( "/history/" + id );
  }

  // GET DATA process /////////////////////////////
  self = $scope;
  $http.get('http://localhost:8000/devices/').
    success(function(data) {
      $scope.devices = data;
      console.log(data);
  });
});
