angular.module('informatika.HomeService',[]).service('HomeService',['$http',function($http){
       
       this.getContent = function (successCallback, errorCallback) {
            $http.get('/informatika/services/rest.php/mainContent').then(function (data) {
                successCallback(data);
            }).catch(function (data) {
                errorCallback(data);
            });
        };

        this.addContent = function (content, successCallback, errorCallback) {
            $http.post('/informatika/services/rest.php/mainContent',{content: content}).then(function (data) {
                successCallback(data);
            })
            .catch(function(data){
            	errorCallback(data);
            });
        };

        this.updateContent = function(id, content, successCallback, errorCallback){
        	$http.put('/informatika/services/rest.php/mainContent', {id: id,content:content}).then(function(data){
        		successCallback(data);
        	})
        	.catch(function(data){
        		errorCallback(data);
        	});
        };

        this.deleteContent = function(id, successCallback, errorCallback){
        	$http.delete('/informatika/services/rest.php/mainContent?cid='+id).then(function(data){
        		successCallback(data);
        	})
        	.catch(function(data){
        		errorCallback(data);
        	});
        };
}]);