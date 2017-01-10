angular.module('informatika.EditContentController', ['informatika.HomeService']).controller('EditContentController', ['$scope', 'HomeService', '$routeParams',function ($scope, HomeService, $routeParams) {

	var self = this;

	this.id = $routeParams.id;

	this.content = [];

	HomeService.getContent(function(content){
		self.content = content;
		self.content = unescape(self.contentdata[0].content);
	},function(data){
		console.log(data);
	});


    this.updateContent = function(){
    	HomeService.updateContent(self.content.data[0].id, self.content.data[0].content, function(data){
			console.log(data);
		}, function(data){
			console.log(data);
		});
    };
}]);
