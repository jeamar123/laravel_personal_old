app.directive('authDirective', [
  '$http',
  '$state',
  '$stateParams',
  '$rootScope',
  function directive($http,$state,$stateParams,$rootScope) {
    return {
      restrict: "A",
      scope: true,
      link: function link( scope, element, attributeSet )
      {
        console.log( "authDirective Runinng !" );

        scope.isSignupShow = false;

        scope.toggleSignup = ( ) =>{
          if( scope.isSignupShow == false ){
            scope.isSignupShow = true;
          }else{
            scope.isSignupShow = false;
          }
        }

        scope.onLoad = ( ) =>{

        }

        scope.onLoad();

      }
    }


  }
])