angular.module('informatika.HomeService',[]).service('HomeService',['$http',function($http){
       
       this.getContent = function (successCallback, errorCallback) {
            $http.get('/services/rest.php/mainContent').then(function (data) {
                successCallback(data);
            }).catch(function (data) {
                errorCallback(data);
            });
        };

        this.addContent = function (content, successCallback, errorCallback) {
            $http.post('/services/rest.php/mainContent',{content: content}).then(function (data) {
                successCallback(data);
            })
            .catch(function(data){
            	errorCallback(data);
            });
        };

        this.updateContent = function(id, content, successCallback, errorCallback){
        	$http.put('/services/rest.php/mainContent', {id: id,content:content}).then(function(data){
        		successCallback(data);
        	})
        	.catch(function(data){
        		errorCallback(data);
        	});
        };

        this.deleteContent = function(id, successCallback, errorCallback){
        	$http.delete('/services/rest.php/mainContent?cid='+id).then(function(data){
        		successCallback(data);
        	})
        	.catch(function(data){
        		errorCallback(data);
        	});
        };
}]);