'use strict';

/**
 * @ngdoc function
 * @name app.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the app
 */
app.controller('HistoryCtrl', function ($scope, $routeParams, $http, $filter) {
  // Chart configs ///////////////////////////////
  $scope.series  = ['Consumed Power (W)', 'Price (R$)'];
  $scope.options = {
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,

    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines: true,
  };

  $scope.onPowerChartClick = function (points, evt) {
    console.log(points, evt);
  };

  // Parameters config ////////////////////////////
  $scope.param = $routeParams.param;

  // GET DATA process /////////////////////////////
  self = $scope;
  $http.get('http://localhost:8000/history/'+$scope.param).
    success(function(json) {
      $scope.history = json.data;

      var temp = [ [], [] ];
      angular.forEach($scope.history, function(value, key) {
        this.push(parseFloat( value['power_total'] ));
      }, temp[0]);
      angular.forEach($scope.history, function(value, key) {
        this.push(parseFloat( value['price'] ));
      }, temp[1]);

      self.data = temp;


      var temp = [];
      angular.forEach($scope.history, function(value, key) {
        var isoDate = new Date( value['created_at'] ).toISOString();
        var legendDate = $filter('date')(isoDate, 'HH:mm:ss', 0);
        
        this.push(legendDate);
      }, temp);
      self.labels = temp;
  });
});
