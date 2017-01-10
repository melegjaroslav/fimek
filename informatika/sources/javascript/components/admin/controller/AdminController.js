angular.module('informatika.AdminController',['informatika.AdminService', 'informatika.HomeService', 'informatika.ProjectService']).controller('AdminController',['$scope','AdminService', 'HomeService','ProjectService', function ($scope, AdminService, HomeService, ProjectService) {
          
          var self = this;
          this.id = "";
          this.setContent = "";
          this.val = "koritnacka";
          this.projects = [];
          this.content = [];

          HomeService.getContent(function(content){
            self.content = content;
          }, function(data){
            console.log(data);
          });

          ProjectService.getProjects(function(projects){
            self.projects = projects;
          }, function(data){
            console.log(data);
          });

          this.addContent = function(){
            this.AdminService.addContent(this.content, function(data){
              if(!data.success){
                console.log('Content not added!');
              }else{
                console.log('Content added!');
              }
            });
          };

          this.deleteProject = function(pId){
            ProjectService.deleteProject(pId, function(data){
              console.log(data);
              ProjectService.getProjects(function(projects){
                self.projects = projects;
              }, function(data){
                console.log(data);
              });
            }, function(data){
                console.log(data);
            });
          };

}]);
   