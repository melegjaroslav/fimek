angular.module('informatika.HomeController', ['informatika.HomeService', 'ngSanitize']).controller('HomeController', ['$scope', 'HomeService',function ($scope, HomeService) {

	var self = this;
	this.content = [];

	HomeService.getContent(function(content){
		self.content = content;
	},function(data){
		console.log(data);
	});

	/*ProjectService.getProjects(function(projects){
            self.projects = projects;
          }, function(data){
            console.log(data);
          });*/

}]);
   