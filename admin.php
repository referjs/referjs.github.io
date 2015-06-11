<?php
require 'touch/srvc/db2bootstrap.php';
CheckSSL();

if(isset($_COOKIE['Clancapuser'])){
    $ck = $_COOKIE['Clancapuser'];
    $cka = explode(";", $ck);
    
    //echo 'Old Cookie'.$_COOKIE['Clancapuser'];

    if(!AuthenticateAdmin($cka[1],$cka[2],2) ){
        unset($_COOKIE['Clancapuser']);
        setcookie("Clancapuser", "", time()-3600);
        //echo 'UNSETTING'.$cka[1].'  '.$cka[2];
        header("location: login.php");
    }

}else
        header("location: login.php");

?><!DOCTYPE html>
<html lang="en" ng-app="orgjswapp">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="clancap Admin">
    <meta name="author" content="prabhatkr@gmail.com">

    <title>Admin Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body ng-controller="ajpctrlr">
     <!--ul>
    <li ng-repeat="phone in phones">
      <span>{{phone.name}}</span>
      <p>{{phone.snippet}}</p>
    </li>
  </ul-->

    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin.php">Clancap</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong><?php echo $cka[0]; ?></strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Test Rest </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.php?out"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>

<form  method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
    <input  id="my_form" ng-submit="imageup(this)" name="image" type="file" ng-model="contimgs" onchange="$('#my_form').submit();this.value='';">
</form>
                        <li>
                            <a ng-click="LoadArticles()" href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Articles<span class="fa arrow"></span></a>
                            <button ng-click="newarticle()" type="button" class="btn btn-primary">Publish New</button>
                            <button ng-click="Refresharticlelist()" type="button" class="btn btn-primary">Refresh Articles</button>
                            <ul class="nav nav-second-level">
                                 <li ng-repeat="article in articles">
                                  <a ng-click="loadarticle(this)" ng-href="#{{article.a}}"><img ng-src="/images/s{{article.p}}.png" />{{article.t}}</a>
                                  
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Profiles<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Overall Userbase</a>
                                </li>
                                <li>
                                    <a ng-click="ProfileEditForm()"  href="#">Profile Admin</a>
                                </li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i>Job Search</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Message<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">Flot Charts</a>
                                </li>
                                <li>
                                    <a href="morris.html">Morris.js Charts</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Post Job</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Server</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Settings<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                                <li>
                                    <a href="icons.html"> Icons</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grid</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Help Center<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="login.php">Login Page</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        

        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <!--h1 class="page-header">Post Article</h1-->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" ng-hide="hidearticles">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit &amp; Publish  <b><img ng-hide="hidelodr" class="ng-hide" src="touch/resources/img/lodr.gif"/> {{articleid}} </b>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form ng-submit="submitarticle()" role="form" method="post">
                                      
                                        <div class="form-group">
                                            <label>Article Title</label>
                                            <input ng-model="articletitle" name="articletitle" class="form-control" placeholder="Enter text">
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>Header Image</label>
                                            
                                            <input hidden='true' name="articleimage" ng-model="articleimage" > 

 Thumbnail: <img width="30" height="30" ng-src="{{thumbimg}}" src="/blank.png" ngf-accept="'image/*'">

    <div ngf-drop ng-model="articleimage" class="drop-box" 
        ngf-drag-over-class="dragover" ngf-multiple="true" ngf-allow-dir="true"
        ngf-accept="image/*" >Drop Image file here<br/>
        <i>Recommended Size: 512pixels X 512pixels</i>
        <br/><br/>
        <br/>Or:<br/>

        <input type="button" class="button" value="Select File" ngf-select ng-model="articleimage">
        
        <br/><br/>
        <br/><br/>
        <br/><br/>        
        
    </div>

    <div ngf-no-file-drop>File Drag/Drop is not supported for this browser</div>

        

                                        </div>
                                        <div class="Content">
                                            <label>Article Text</label>
                                            <textarea data-ui-tinymce ng-bind-html ng-model="mainarticle" html-text class="form-control" rows="8"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <!--label>Public/Private</label-->
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="privatestate" id="privatestate"  ng-model="pvt" checked>Private
                                            </label>
                                            
                                        </div>Ready to Publish: {{!pvt}} 
                                        
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <div class="panel panel-default panel-heading">
                                        <h3>Preview</h3>
                                    
                                        <div class="panel panel-default  panel-body">
                                        <h3>{{articletitle}}</h3>
                                        
                                        <img style="float:right" ng-src="{{mainarticleimage}}" width="280" height="280" alt="article Image"/>

                                        <span ng-bind-html="mainarticle"></span>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->

            </div>
            <!-- /.row -->

            <!----- Start: row for profiles edit  ---->
            <div class="row" ng-hide="hideprofiles">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Profile  <b><img ng-hide="hidelodr" class="ng-hide" src="touch/resources/img/lodr.gif"/> {{profileid}} </b>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form ng-submit="submitprofile()" role="form" method="post">
                                      
                                        <div class="form-group">
                                            <label>Enter Email to search user</label>
                                            <input ng-model="profilemail" ng-enter="getprofileToadmin(this)" class="form-control" placeholder="Search by Enter Email">
                                        </div>
                                       <div class="form-group">
                                            <label>Level</label>
                                            <input ng-model="profilelevel" class="form-control" placeholder="Enter Email above">
                                        </div>
                                       <div class="form-group">
                                            <label>UserStatus</label>
                                            <input ng-model="userStatus"  class="form-control" placeholder="Enter Email above">
                                        </div>
                                       
                                       
                                        
                                        
                                        <div class="form-group">
                                            <!--label>Public/Private</label-->
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="privatestate" id="privatestate"  ng-model="profilepvt" checked>Disabled
                                            </label>
                                            
                                        </div>Disabled: {{!pvt}} 
                                        
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        
                                    </form>
                                </div>
                               
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->

            </div>

            <!----- End: row for profiles  ---->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<script type="text/javascript" src="touch/srvc/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
/*tinymce.init({//Hidden due to http://plnkr.co/edit/04AFkp?p=preview   http://stackoverflow.com/questions/11953532/integrating-angularjs-and-tinymce
    selector: "textarea",
    plugins: [
        " autolink  link image charmap print preview anchor",
        " visualblocks code ",
        "insertdatetime media table  paste"
    ],
     menubar : false,
    toolbar: "  styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});*/
</script>


    <!-- jQuery -->
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <script type="text/javascript" src="js/tmcefb.js"></script>
    <script src="bower_components/angular/angular.min.js"></script>
    <script src="js/controllers.js"></script>
     <script type="text/javascript" src="js/tinymce.js"></script>
     <!--only needed if you support non HTML5 FormData browsers.-->
<script src="/bower_components/ng-file-upload/ng-file-upload-shim.min.js"></script>
<script src="/bower_components/ng-file-upload/ng-file-upload.min.js"></script>
<script src="/bower_components/angular-sanitize/angular-sanitize.js"></script>
<script src="/bower_components/angular-cookies/angular-cookies.js"></script>

</body>

</html>
