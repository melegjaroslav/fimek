angular.module('informatika.EditProjectController', ['informatika.ProjectService']).controller('EditProjectController', ['$scope', 'ProjectService', '$routeParams',function ($scope, ProjectService, $routeParams) {

	var self = this;

	this.id = $routeParams.id;

	this.project = [];

	ProjectService.getProject(this.id, function(project){
            self.project = project;
    	}, function(data){
        	console.log(data);
    });

    this.updateProject = function(){
    	ProjectService.updateProject(self.project.data[0].id, self.project.data[0].name, self.project.data[0].author, self.project.data[0].description, self.project.data[0].content, self.project.data[0].thumbnail, self.project.data[0].link, function(data){
			console.log(data);
		}, function(data){
			console.log(data);
		});
    };
}]);


