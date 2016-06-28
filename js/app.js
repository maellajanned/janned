var app = angular.module('myApp', []);

app.controller('MainCtrl', function($scope) {
  $scope.IsVisible = true;

  $scope.IsVisible = function(){
    if($scope.IsVisible = true) return $scope.IsVisible = false;
  }
})
