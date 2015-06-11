var ojp = angular.module('orgjswapp',['ui.tinymce','ngFileUpload','ngSanitize','ngCookies']);

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

ojp.controller('ajpctrlr', ['$scope' ,'$http', 'Upload','$cookies',function ($scope,$http,Upload,$cookies) {
	//$scope.articletitle="Title of Test";
	//$scope.mainarticle="dsdsds";	


	$scope.hidearticles=true;

	var ck = $cookies.get("Clancapuser");
	var cka = ck.split(";");
	$scope.hidelodr=true;
	$scope.email = cka[0];
	$scope.uid = cka[1];
	$scope.token = cka[2];

	 $scope.$watch('articleimage', function () {
        $scope.upload($scope.articleimage);
    });

	 $scope.upload = function (articleimage) {//Upload Header Main Image
	 	if(!articleimage || !articleimage.length) 
	 		return;

		$scope.hidearticles=true;
	 	//for (var i = 0; i < articleimage.length; i++) {
                var file = articleimage[0];
                Upload.upload({
                    url: '/touch/srvc/getArticleMainImage.php?a='+$scope.uid+'&b='+$scope.token,
                    fields: {'user': $scope.uid,'token': $scope.token},
                    file: file
                }).progress(function (evt) {
                    var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
                    console.log('progress: ' + progressPercentage + '% ' + evt.config.file.name);

                }).success(function (data, status, headers, config) {
                	$scope.hidelodr=true;
                    console.log('file ' + config.file.name + 'uploaded. Response: ' + data);
                    console.log('Success',data);
                    if(data.success){
                    	$scope.mainarticleimage='https://www.clancap.com/touch/srvc/profiles.php?i=k&k='+data.mainarticleimage;
                    	$scope.thumbimg='https://www.clancap.com/touch/srvc/profiles.php?i=k&k='+data.thumbimg;
                    }
                    //$scope.mainarticleimage=data.message;
                    else
                    	alert('Error: '+data.message);
                    $scope.hidelodr=true;
                });
        //}

	 	//alert('Image'+articleimage);
	 }


  $scope.phones = [
    {'name': 'Nexus S',
     'snippet': 'Fast just got faster with Nexus S.'},
    {'name': 'Motorola XOOM™ with Wi-Fi',
     'snippet': 'The Next, Next Generation tablet.'},
    {'name': 'MOTOROLA XOOM™',
     'snippet': 'The Next, Next Generation tablet.'}
  ];

$scope.imageup=function(a,b,c,d,e){
	console.log('gotit',$scope.contimgs);
}

$scope.newarticle=function(){
	$scope.articleid = '';
		$scope.articletitle='';
		$scope.mainarticleimage=null;
		$scope.mainarticle ='';
		$scope.thumbimg = null;
		$scope.pvt = true;
		$scope.thumbimg = '';
		$scope.articleimage = '';
}
$scope.loadarticle=function(me){
	$scope.hidearticles=false;
	$scope.hidelodr=false;
	/*$.ajax({
	url:'/touch/srvc/dbgetCont.php?a='+$scope.uid+'&b='+$scope.token,
	context: document.body,
	method:'post',
	data:{aid:me.article.a}
	})*/


	$http({
		method:'POST',
		url:'/touch/srvc/dbgetCont.php?a='+$scope.uid+'&b='+$scope.token,
		data:$.param( {aid:me.article.a} ),
		headers : {'Content-Type': 'application/x-www-form-urlencoded'}  

	}).success(function(data1) {
		$scope.hidelodr=true;
		//$scope.articles=data1.contdata;
		$scope.articleid = data1.contdata[0].a;
		$scope.articletitle=data1.contdata[0].t;
		$scope.mainarticleimage=data1.contdata[0].mainimg;
		$scope.mainarticle = data1.contdata[0].pu;
		$scope.thumbimg = data1.contdata[0].thumb;
		$scope.pvt = Boolean(data1.contdata[0].p);
		

    	//console.log( "success",$scope.articletitle  );
  	})
  	.error(function() {
  		$scope.hidelodr=true;
    	alert( "error" );
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

}
$scope.submitarticle=function(){
	$scope.hidelodr=false;
//$http.post('/touch/srvc/submitarticle.php?a='+$scope.uid+'&b='+$scope.token, {aid:$scope.articleid, title:$scope.articletitle, content:$scope.mainarticle, mainimg:$scope.mainarticleimage, thumb:$scope.thumbimg, pvt:$scope.pvt }).

$http({
	method:'POST',
	url:'/touch/srvc/submitarticle.php?a='+$scope.uid+'&b='+$scope.token, 
	data:$.param( {aid:$scope.articleid, title:$scope.articletitle, content:$scope.mainarticle, mainimg:$scope.mainarticleimage, thumb:$scope.thumbimg, pvt:$scope.pvt } ),
	headers : {'Content-Type': 'application/x-www-form-urlencoded'}  

}).success(function(data, status, headers, config) {
	$scope.hidelodr=true;
    // this callback will be called asynchronously
    // when the response is available
    alert(data);
}).error(function(data, status, headers, config) {
	$scope.hidelodr=true;
    // called asynchronously if an error occurs
    // or server returns response with an error status.
    alert('Error');
  });
}

var d;

//
/*$.ajax({
	url:'/touch/srvc/dbgetCont.php?a='+$scope.userToken+'&b='+$scope.sessionToken,
	context: document.body,
	method:'post',
	data:{l:0}
})
*/
$scope.LoadArticlesAgain=true;
$scope.Refresharticlelist=function(){
	$scope.LoadArticlesAgain=true;
	$scope.LoadArticles();
}
$scope.LoadArticles=function(){
	$scope.hideall();
	

	if($scope.LoadArticlesAgain === false)
		return;
	$scope.hidelodr=false;
	
	$http({
		method:'POST',
		url:'/touch/srvc/dbgetCont.php?admin=true&a='+$scope.uid+'&b='+$scope.token, 
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

$scope.hideprofiles=true;

$scope.getprofileToadmin=function(me){
	console.log('Rec:  ',me.profilemail);
	$scope.hidelodr=false;
	$http({
		method:'POST',
		url:'/touch/srvc/dbProfileAdmin.php?admin=true&a='+$scope.uid+'&b='+$scope.token, 
		data:$.param({email:me.profilemail}),
		headers : {'Content-Type': 'application/x-www-form-urlencoded'}  

	}).success(function(data1) {
		//$scope.LoadArticlesAgain=false;
		$scope.hidelodr=true;
		//alert(data1.userStatus);
		$scope.profilelevel=(data1.level)?data1.level:0;
		$scope.userStatus=data1.userStatus;
		
		//$scope.assign($scope.articles,data1.contdata);
	    //console.log( "success",data1.contdata  );
	}).error(function(err) {
		$scope.hidelodr=true;
	    alert( "error" );
	});
}


$scope.submitprofile=function(){
	$scope.hidelodr=false;
	$http({
		method:'POST',
		url:'/touch/srvc/dbProfileAdmin.php?admin=true&a='+$scope.uid+'&b='+$scope.token, 
		data:$.param({e:$scope.profilemail,l:$scope.profilelevel,u:$scope.userStatus}),
		headers : {'Content-Type': 'application/x-www-form-urlencoded'}  

	}).success(function(data1) {
		//$scope.LoadArticlesAgain=false;
		$scope.hidelodr=true;
		//$scope.assign($scope.articles,data1.contdata);
	    //console.log( "success",data1.contdata  );
	    alert(data1.message);
	}).error(function(err) {
		$scope.hidelodr=true;
	    alert( "error" );
	});	
}

$scope.hideall=function(){
	$scope.hideprofiles=true;
	$scope.hidearticles=true;
}

$scope.ProfileEditForm=function(){
	$scope.hideall();
	$scope.hideprofiles=false;

}


}]);


