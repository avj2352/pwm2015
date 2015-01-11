myApp.controller('RegistrationController', ['$scope','$location', function($scope,$location){
	/*$scope.$on('$viewContentLoaded',function(){*/
		/*Shows all the details of the myForm tag in the console*/
		/*console.log($scope.myForm);*/
	/*});*/

	$scope.login = function() {
    simpleLogin.$login('password', {
      email: $scope.user.email,
      password: $scope.user.password
    }).then(function(user) {
      $location.path('/meetings');
    }, function(error) {
      $scope.message = error.toString();
    });
  } //login

  $scope.register = function() {
    $location.path('/meetings');
  } //register

}]);