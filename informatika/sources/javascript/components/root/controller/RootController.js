angular.module('informatika.RootController', []).controller('RootController', ['$location',function ($location) {

        var self = this;

        this.goHome = function () {
            $location.url("/");
        };
        this.goTo = function(path){
            $location.url('/' + path);
        };
        
    }]);
   