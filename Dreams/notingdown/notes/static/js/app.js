angular.module('notesapp', ['ngMaterial','ngMessages','ui.router'])
.config(['$locationProvider', '$stateProvider', '$urlRouterProvider','$httpProvider', function($locationProvider, $stateProvider, $urlRouterProvider,$httpProvider){

    $httpProvider.defaults.xsrfHeaderName = 'X-CSRFToken';
    $httpProvider.defaults.xsrfCookieName = 'csrftoken';

    $urlRouterProvider.otherwise('/Home');
    $locationProvider.html5Mode({
        enabled: true,
        requireBase: false
        });
    $stateProvider
        .state('home', {
            url:'/Home',
            templateUrl: './notes/static/partials/home.html',
            controller: 'homeController as homeCtrl'
        })
        .state('define', {
            url:'/Task',
            templateUrl: './notes/static/partials/define.html',
            controller: 'defineController as defCtrl',
            resolve: {
            auth: ['$location','$http',function($location,$http){
            return $http.post("http://127.0.0.1:8080/session").then(
               function(success) {
                    if(success.data != "success")
                    {
                      $location.path('/Home');
                    }
               });
                }]
            }
        })
        .state('collect', {
            url:'/Track',
            templateUrl: './notes/static/partials/collect.html',
            controller: 'collectController as colctrl',
            resolve: {
            auth: ['$location','$http',function($location,$http){
            return $http.post("http://127.0.0.1:8080/session").then(
               function(success) {
                    if(success.data != "success")
                    {
                      $location.path('/Home');
                    }
               });
                }]
            }
        })
        .state('register', {
            url:'/Register',
            templateUrl: './notes/static/partials/register.html',
            controller: 'registerController as regctrl'
        })
        .state('report', {
            url:'/Review',
            templateUrl: './notes/static/partials/report.html',
            controller: 'reportController as repctrl',
            resolve: {
            auth: ['$location','$http',function($location,$http){
            return $http.post("http://127.0.0.1:8080/session").then(
               function(success) {
                    if(success.data != "success")
                    {
                      $location.path('/Home');
                    }
               });
                }]
            }
        }).state('logout', {
            url:'/Home',
            templateUrl: './notes/static/partials/home.html',
            controller: 'logoutController as logoutctrl',
            resolve: {
            auth: ['$location','$http',function($location,$http){
            return $http.post("http://127.0.0.1:8080/logout").then(
               function(success) {
                    $location.path('/Home');
               });
                }]
            }
        });

}]);

