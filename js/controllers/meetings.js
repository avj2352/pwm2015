myApp.controller('MeetingsController', ['$scope','$firebase', function($scope,$firebase){
	/*Create a reference to the firebase DB*/
	/*this is an online DB, URL is provided below*/
	var ref = new Firebase('https://myattendance.firebaseio.com/meetings');
	/*Calls the DB and places the data inside meetings variable*/
	var meetings = $firebase(ref);
	/*Fetches all of the data as a JSON object - For input things*/
	$scope.meetings = meetings.$asObject();
	/*$asObject() - the above line will insert all the data from Firebase inside the meetings as an OBJECT - meetings*/
	/*$asArray() - the above line will insert all the data from Firebase inside the meetings as an ARRAY - meetings*/
	/*This is called inside of the register.html*/
	$scope.addMeeting = function(){
		meetings.$push({
			name:$scope.meetingname,
			/*We need to know when Firebase stores a value, so convenient to create Firebase's datestamp*/
			date: Firebase.ServerValue.TIMESTAMP
		}).then(function(){
			$scope.meetingname = '';
		}); /*clear out the input field once the value is added*/
	}/*end method - addMeeting */

	$scope.deleteMeeting = function(key){
		meetings.$remove(key);
	}/*end method - deleteMeeting*/
}]);/*end controller - MeetingsController*/