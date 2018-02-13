app.controller('mainController', function( $state, $scope , $rootScope){

	console.log( 'mainController running' );

	$scope.isRightShown = false;

	$scope.toggleRightBox = ( ) => {
		if( $scope.isRightShown == false ){
			$scope.isRightShown = true;
		}else{
			$scope.isRightShown = false;
		}
	}
	
	$scope.onLoad = ( ) => {

	}

	$scope.onLoad();

});
