<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PULAS - Pesebaran Pusat Pelayanan Kesehatan di Pekanbaru</title>
	<!-- BOOTSTRAP STYLES-->
    <link rel="icon" type="image/png" href="assets/img/hhh.png" sizes="32x32">
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
</head>
<body>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12" style="margin-bottom: 70px;"></div>
        </div>
        <div class="row">
          <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
            <div align="center">
                    <form name="login_form" method="post" class="well well-lg" action="func/login" style="-webkit-box-shadow: 0px 0px 20px #888888;">
                        <img src="assets/img/asa.png" width="50%">
                        <br>
                        <h4>LOGIN</h4>
                        <br>
<?php 
  if(isset($_GET['pesan'])){
    echo '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>Password atau Username Salah</div>';
  }
?>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="uname" id="username" class="form-control" type="text" placeholder="Username" autocomplete="off" autofocus="" />
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input name="upass" id="password" class="form-control" type="password" placeholder="Password" autocomplete="off" />
                        </div>
                        <br />
                        <input name="submit" type="submit" value="Login" class="btn btn-primary btn-block">
                    </form>

                </div>
          </div>
        </div>
    </div>
     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
