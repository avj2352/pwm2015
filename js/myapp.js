/*var myapp in angular is a - namespace*/
/*Adding ngRoute dependency*/
/*Including appController controller inside the module*/
/*Creating a controller to handle registration*/
var myApp = angular.module('myApp', ['ngRoute','ngAnimate']);

myApp.config(['$routeProvider',function($routeProvider) {
	$routeProvider.
	when('/register',{
		templateUrl: 'views/register.html',
		controller : 'RegistrationController'
	}).
    when('/index',{
        templateUrl: 'views/home.html'
    }).
	otherwise({
		/*this deals with the URL link and not the template page - so no .html extension*/
		redirectTo: '/index'
	});
}]);

myApp.controller('formController', ['$scope',function($scope){

}]);
