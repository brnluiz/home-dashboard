'use strict';

/**
 * @ngdoc function
 * @name app.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the app
 */
app.controller('MainCtrl', function ($scope, $timeout, $http) {

  $scope.labels = ["13h30", "13h35", "13h40", "13h45", "13h50", "13h55", "14h00"];
  $scope.data = [
    [65, 59, 80, 81, 56, 55, 40]
  ];
  $scope.series = ['Historic Power Consume'];
  $scope.options = {
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,

    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines: true,
  };
  $scope.colours = {
  };
  $scope.devices = {}
  $scope.onClick = function (points, evt) {
    console.log(points, evt);
  };

  $http.get('http://localhost:8000/devices').
    success(function(data) {
      $scope.devices = data;
  });

  $scope.goHistory = function(id){
    console.log(id);
    return false;
  };

  $timeout(function () {
    // Insert the update here
  }, 3000);
});
