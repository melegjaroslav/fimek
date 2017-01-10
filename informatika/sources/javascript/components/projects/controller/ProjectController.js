angular.module('informatika.ProjectController', ['informatika.ProjectService']).controller('ProjectController', ['$scope', 'ProjectService',function ($scope, ProjectService) {

	var self = this;
	this.projects = [];

	ProjectService.getProjects(function(projects){
            self.projects = projects;
          }, function(data){
            console.log(data);
          });
	}]);
   