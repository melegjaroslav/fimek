angular.module('informatika.SingleProjectController', ['informatika.ProjectService']).controller('SingleProjectController', ['$scope', 'ProjectService', '$routeParams',function ($scope, ProjectService, $routeParams) {

	var self = this;

	this.id = $routeParams.id;

	this.project = [];

	ProjectService.getProject(this.id, function(project){
            self.project = project;
    	}, function(data){
        	console.log(data);
    });
}]);


