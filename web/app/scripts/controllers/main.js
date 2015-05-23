'use strict';

/**
 * @ngdoc function
 * @name app.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the app
 */
app.controller('MainCtrl', function ($scope, $timeout) {
  $scope.awesomeThings = [
    'HTML5 Boilerplate',
    'AngularJS',
    'Karma'
  ];

  $scope.labels = ["January", "February", "March", "April", "May", "June", "July"];
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
  $scope.onClick = function (points, evt) {
    console.log(points, evt);
  };

  $timeout(function () {
    $scope.labels = ["January", "February", "March", "April", "May", "June", "July"];
    $scope.data = [
      [65, 59, 80, 81, 56, 55, 40]
    ];
  }, 3000);
});
