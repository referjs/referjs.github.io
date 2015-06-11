var ojp = angular.module('orgjswapp',[]);

/*
This directive allows us to pass a function in on an enter key to do what we want.
 */
ojp.directive('ngEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if(event.which === 13) {
                scope.$apply(function (){
                    scope.$eval(attrs.ngEnter);
                });
 
                event.preventDefault();
            }
        });
    };
});

ojp.controller('ajpctrlr', ['$scope' ,'$http',function ($scope,$http) {
	//$scope.articletitle="Title of Test";
	//$scope.mainarticle="dsdsds";	


	
$scope.LoadArticlesAgain=true;

$scope.LoadArticles=function(){
	
	

	if($scope.LoadArticlesAgain === false)
		return;

	$scope.hidelodr=false;
	
	$http({
		method:'POST',
		url:'/touch/srvc/dbgetCont.php?a=a&b=b', 
		data:$.param({l:0}),
		headers : {'Content-Type': 'application/x-www-form-urlencoded'}  

	}).success(function(data1) {
		$scope.LoadArticlesAgain=false;
		$scope.hidelodr=true;
		$scope.articles=data1.contdata;
		console.log($scope.articles);
		//$scope.assign($scope.articles,data1.contdata);
	    //console.log( "success",data1.contdata  );
	}).error(function(err) {
		$scope.hidelodr=true;
	    alert( "error" );
	  });

	$scope.assign=function(a,b){
		a=b;
	}
}

$scope.LoadArticles();


}]);


