var ojp = angular.module('orgjswapp',['ngRoute','ngSanitize']) //for Post/Artcile Reading
		.config(function($locationProvider) {
	        //$locationProvider.html5Mode(true);
	        $locationProvider.html5Mode({
			  enabled: true,
			  requireBase: false
			});
	    });



ojp.controller('ajpctrlr', ['$scope' ,'$http','$location',function ($scope,$http,$location) {
	//$scope.articletitle="Title of Test";
	//$scope.mainarticle="dsdsds";	


		console.log($location.search());
//$scope.hidelodr=false;
	/*$.ajax({
	url:'/touch/srvc/dbgetCont.php?a='+$scope.uid+'&b='+$scope.token,
	context: document.body,
	method:'post',
	data:{aid:me.article.a}
	})*/
	
	var aid = $location.search().a;

	$http({
		method:'POST',
		url:'/touch/srvc/dbgetCont.php',
		data:$.param( {aid:aid} ),
		headers : {'Content-Type': 'application/x-www-form-urlencoded'}  

	}).success(function(data1) {
		$scope.hidelodr=true;
		//$scope.articles=data1.contdata;
		//$scope.articleid = data1.contdata[0].a;
		$scope.mainarticle = data1.contdata[0].pu;
		$scope.articletitle=data1.contdata[0].t;
		$scope.mainarticleimage=data1.contdata[0].mainimg;
		

		//$scope.thumbimg = data1.contdata[0].thumb;
		//$scope.pvt = Boolean(data1.contdata[0].p);
		

    	//console.log( "success",$scope.articletitle  );
  	})
  	.error(function(err) {
  		$scope.hidelodr=true;
    	alert( "error"+err );
  	});


	/*console.log(me.article.a);
	  $http.post('/touch/srvc/dbgetCont.php?a='+$scope.userToken+'&b='+$scope.sessionToken, {aid:me.article.a}).
	  success(function(data, status, headers, config) {
	    // this callback will be called asynchronously
	    // when the response is available
	    //$scope.articles=data.contdata;
	    console.log(data.contdata);
	  }).
	  error(function(data, status, headers, config) {
	    // called asynchronously if an error occurs
	    // or server returns response with an error status.
	  });
*/







}]);


