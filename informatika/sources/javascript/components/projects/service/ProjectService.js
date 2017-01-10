angular.module('informatika.ProjectService',[]).service('ProjectService',['$http',function($http){
    
    this.getProjects = function (successCallback, errorCallback) {
        $http.get('/informatika/services/rest.php/projects').then(function (data) {
            successCallback(data);
        }).catch(function (data) {
            errorCallback(data);
        });
    };

    this.getProject = function (id, successCallback, errorCallback) {
        $http.get('/informatika/services/rest.php/project?pid='+id).then(function (data) {
            successCallback(data);
        }).catch(function (data) {
            errorCallback(data);
        });
    };

    this.addProject = function (name, author, description, content, thumbnail, link, successCallback, errorCallback) {
        $http.post('/informatika/services/rest.php/project', {name: name, author: author, description: description, content: content,thumbnail: thumbnail, link: link})
        .then(function (data) {
            successCallback(data);
        }).catch(function (data) {
            errorCallback(data);
        });
    };

    this.updateProject = function (id, name, author, description, content, thumbnail, link, successCallback, errorCallback) {
        $http.put('/informatika/services/rest.php/project', {id: id, name: name, author: author, description: description, content: content, thumbnail: thumbnail, link: link})
        .then(function (data) {
            successCallback(data);
        }).catch(function (data) {
            errorCallback(data);
        });
    };

    this.deleteProject = function (id, successCallback, errorCallback) {
        $http.delete('/informatika/services/rest.php/project?pid='+id).then(function (data) {
            successCallback(data);
        }).catch(function (data) {
            errorCallback(data);
        });
    };
}]);
