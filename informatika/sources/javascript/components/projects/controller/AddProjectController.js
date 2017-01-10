angular.module('informatika.AddProjectController', ['informatika.ProjectService']).controller('AddProjectController', ['$scope', 'ProjectService',function ($scope, ProjectService) {

	var self = this;

	this.name = "";
	this.author = "";
	this.description = "";
	this.content = "";
	this.thumbnail = "";
	this.link = "";

	this.addProject = function(){
		ProjectService.addProject(self.name, self.author, self.description, self.content, self.thumbnail, self.link, function(data){
			console.log(data);
		}, function(data){
			console.log(data);
		});
	};

	this.clear = function(){
		self.name = "";
		self.author = "";
		self.description = "";
		self.content = "";
		self.thumbnail = "";
		self.link = "";
	};
}]);
