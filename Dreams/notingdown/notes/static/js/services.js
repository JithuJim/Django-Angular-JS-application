angular.module('notesapp')
.factory("defService",["$http",function($http){
        return {
            submitTasks: function(task) {
            return $http.post("http://127.0.0.1:8080/submit_task",{'task': task}).then(function(resp){return resp.data;});
        },
            deleteTasks: function(task) {
            return $http.post("http://127.0.0.1:8080/delete_task",{'task': task}).then(function(resp){
            return resp.data;});
        },
         initTasks: function() {
            return $http.post("http://127.0.0.1:8080/init_task").then(function(resp){
            return resp.data;});
        }
    };

}]).factory("repService",["$http",function($http){

}])
.factory("regService",["$http","$location",function($http,$location){
       return {
            submitUserDetails: function(user) {
           return $http.post("http://127.0.0.1:8080/register",user).then(function(resp){
            if(resp.data)
            {
                $location.path("/Home");
            };});
        }
    };
}]).factory("homeService",["$http","$location",function($http,$location){
     var service = {
      isLoggedIn: false,

      login: function(user) {

        return $http.post("http://127.0.0.1:8080/login",user)
              .then(function(response) {
          if(response.data == "success")
          {
            service.isLoggedIn = true;
            $location.path('/Task');
          }

        });
      }
    };
    return service;
}]);

