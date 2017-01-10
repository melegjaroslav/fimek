angular.module('informatika',
        [
            'ngRoute',
            'ngSanitize',
            'informatika.AdminController',
            'informatika.AdminService',
            'informatika.RootService',
            'informatika.RootController',
            'informatika.ProjectController',
            'informatika.ProjectService',
            'informatika.HomeController',
            'informatika.HomeService',
            'informatika.AddProjectController',
            'informatika.EditProjectController',
            'informatika.SingleProjectController',
            'informatika.EditContentController'

        ]).config(['$routeProvider', function ($routeProvider) {

        $routeProvider.when('/', {
            controller: 'HomeController',
            controllerAs: 'homeCtrl',
            templateUrl: 'partials/home.html',
            label: 'Informatika'
        }).when('/admin', {
            controller: 'AdminController',
            controllerAs: 'adminCtrl',
            templateUrl: 'partials/admin.html',
            label: 'Administrator'
        }).when('/projects', {
            controller: 'ProjectController',
            controllerAs: 'projectCtrl',
            templateUrl: 'partials/projects.html',
            label: 'Projects'
        }).when('/add-project', {
            controller: 'AddProjectController',
            controllerAs: 'projectCtrl',
            templateUrl: 'partials/add-project.html',
            label: 'Add Project'
        }).when('/edit-project/:id', {
            controller: 'EditProjectController',
            controllerAs: 'projectCtrl',
            templateUrl: 'partials/edit-project.html',
            label: 'Edit Project'
        }).when('/project/:id', {
            controller: 'SingleProjectController',
            controllerAs: 'projectCtrl',
            templateUrl: 'partials/project.html',
            label: 'Project'
        }).when('/edit-content/:id', {
            controller: 'EditContentController',
            controllerAs: 'contentCtrl',
            templateUrl: 'partials/edit-content.html',
            label: 'Edit Content'
        }).otherwise({redirectTo: function () {
                return '/';
            }});
    }]);