angular.module("notesapp")
.controller('defineController', ['defService','$scope','$compile', '$mdDialog',function(defService,$scope,$compile,$mdDialog){
  $scope.message = '';
  $scope.tasks = '';
  $scope.initTask = function()
  {
      defService.initTasks().then(function(success){
            $scope.message  = success;

        },function(error){
            $scope.message_err_init = error.statusText;
        });
  };

  $scope.submit = function(inp)
  {
      $scope.message.push({'task':inp})
      $scope.tasks='';
      defService.submitTasks(inp).then(function(success){
            $scope.message_return  = success;

        },function(error){
            $scope.message_err_submit = error.statusText;
        });
  };

  $scope.deleteTask = function(inp)
  {
        defService.deleteTasks(inp).then(function(success){
            $scope.message_delete  = success;

        },function(error){
            $scope.message__err_delete = error.statusText;
        });
  };

    /*Dialog */
    var alert = '';
    $scope.addSubtasks = showAlert;

    function showAlert() {
      alert = $mdDialog.alert()
        .title('Attention, ' )
        .content('This is an example of how easy dialogs can be!')
        .ok('Close');
      $mdDialog
          .show( alert )
          .finally(function() {
            alert = undefined;
          });
    }
    /*End of Dialog*/
    }])
.controller("collectController",function(){

}).controller("reportController",function(){

}).controller("registerController",['regService','$scope', function(regService,$scope){

  $scope.submit = function()
  {
      regService.submitUserDetails($scope.user);
  };

    }]).controller("homeController",['homeService','$scope','$location', function(homeService,$scope,$location){

      $scope.login = function()
      {
        $scope.user.session = $scope.user.email + $scope.user.password;
        homeService.login($scope.user);
      };

    }]).controller("logoutController",['homeService','$scope', function(homeService,$scope){

      $scope.logout = function()
      {
        homeService.logout();
      };

    }])
.constant('mdSelectConfig', {
  selectActiveClass: 'active'
})

.service('mdSelectService', ['$document', function($document) {
  var activeScope = null;

  this.activate = function(selectScope) {
    if (!activeScope) {
      $document.bind('click', deactivateSelect);
      $document.bind('keydown', escapeKeyBind);
    }

    if (activeScope && activeScope !== selectScope) {
      activeScope.isActive = false;
    }

    activeScope = selectScope;
  }
  this.deactivate = function(selectScope) {
    if (activeScope === selectScope) {
      activeScope = null;
      $document.unbind('click', deactivateSelect);
      $document.unbind('keydown', escapeKeyBind);
    }
  }

  var deactivateSelect = function(event) {
    if (!activeScope) { return; }

    var toggleElement = activeScope.getToggleElement();
    if (event && toggleElement && toggleElement[0].contains(event.target)) {
      return;
    }

    activeScope.$apply(function() {
      activeScope.isActive = false;
    });
  };

  var escapeKeyBind = function(event) {
    if (event.keyCode === 27) {
      activeScope.focusToggleElement();
      deactivateSelect();
    }
  };
}])
.directive('mdSelect', function (){
  return {
    controller: 'mdSelectController',
    restrict: 'E',
    scope: {
      label: '='
    },
    link: function($scope, $el, $attrs, mdSelectCtrl) {
      mdSelectCtrl.init($el);

      $scope.selectedItemIndex = -1;

      $el.bind('keydown', function(event){
        // Up or down arrow keys
        if(event.keyCode === 38 || event.keyCode === 40){
          event.preventDefault();

          if(event.keyCode === 38 && $scope.selectedItemIndex > 0){
            $scope.selectedItemIndex--;
          }

          console.log($scope.numSelectListItems);
          if(event.keyCode === 40 && $scope.selectedItemIndex < $scope.numSelectListItems-1){
            $scope.selectedItemIndex++;
          }
        }
      });
    }
  };
})

;
