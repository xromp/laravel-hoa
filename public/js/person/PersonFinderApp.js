define(['angular'], function() {
	'use strict';
	// angular
	// 	.module('PersonApp')
		app.lazy.controller('PersonFinderCtrl', PersonFinderCtrl)
		app.lazy.directive('showdetail', showdetail)
		app.lazy.factory('PersonFinderSrvs', PersonFinderSrvs)

		PersonFinderCtrl.$inject = ['$scope','$http', 'PersonFinderSrvs']
		function PersonFinderCtrl($scope, $http, PersonFinderSrvs) {
			var vm = this;
			vm.personData = [
				{'id':1,'name':'Rommel Penaflor','address':'#041 Boni Barangka Drive.','type':'OWNER','current_billing':'1,535.50','course':'Software Engineering'},
				{'id':2,'name':'Erikson Supent','address':'#002 Taas Ilaya Barangka','type':'OWNER','current_billing':'55.00','course':'Mechanical Engineering'},
				{'id':3,'name':'Bryan Evangelista','address':'#023 Barangay Plainview','type':'OWNER','current_billing':'0.00','course':'E-Commerce'}
			];

			vm.init = function(){
				var data = [];
				// $http({'url':'api/person/get'});
				PersonFinderSrvs.get(data)
				.then(function(response, status){
					if (status == 200) {
						vm.personData = response.data[0];
					}
				},function(){

				});

			};

	    	vm.showPersonDetail = function (person) {
		      if (person.isshowdetails) {
		        person.isshowdetails = false;
		      } else {
		        person.isshowdetails = true;
		      }
		    };
		    // --- Load Init --
		    vm.init();
		};

		function showdetail() {
			return {
				restrict:'A',
				scope:{
					'person':'=person'
				},
				templateUrl: 'person.finder-showdetail',
				controller: function($scope){
					$scope.personDetails = [];
					$scope.unPaidDetails = [];
					$scope.showdetail = function (person, i) {
					
					  var personDetails = [
						  {'person00id':1,'contactno':'+639123456789','address':'jan lang yan','representative':'Roberto Penaflor','respresentative_relationship':'Father','emergency_person':'Kim Miran','emergency_person_relationship':'Auntie','emergency_person_contactno':'+639471727639','address':'043 Del Rosario St. Loob, Gainza Camarines Sur 4412'},
						  {'person00id':2,'contactno':'+639000000000','address':'dito din'},
						  {'person00id':3,'contactno':'+639111111111','address':'0001 lang'},
					  ];

					  var unPaidDetails = [
						{'person00id':1,'unpaidlist':[
						  {'desc':'Monthly dues(July)','duedate':'05-May-2017','amount':'400.00','amountpaid':'0.00','classroom':'1-kindness'},
						  {'desc':'Extra Expenses for parking fee','duedate':'05-July-2017','amount':'500.00','amountpaid':'200.00','classroom':'2-Joy'},
						  {'desc':'Park Clean and Green','duedate':'30-August-2017','amount':'350.00','amountpaid':'0.00','classroom':'3-Hope'}
						  ]
						}
					  ]
					  // get request;
					  angular.forEach(personDetails , function (v, k) {
						if (v.person00id == person.id) {
						  $scope.personDetails[0] = v;
						}
					  });

					  angular.forEach(unPaidDetails, function (v, k) {
						console.log("here!");
						if (v.person00id == person.id) {
						  $scope.unPaidDetails[0] = v;
						  console.log($scope.unPaidDetails);
						}
					  }); 
					};

					$scope.$watch('person.isshowdetails', function (e) {
					  if (e) {
						$scope.showdetail($scope.person);
					  }
					});
				},
				link : function(scope, elem, atrr){

				}

			}
		};

		PersonFinderSrvs.inject = ['$http']
		function PersonFinderSrvs($http) {
			return {
				get:function(data){
					return $http({
						method:'GET',
						url:'api/person/get',
						data:data,
						headers:{'Content-Type':'application/json'}
					});
				}
			};
		};
})
