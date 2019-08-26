<?php
    session_start();
    include 'func/cek.php';
    include 'func/koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PULAS - Pesebaran Pusat Pelayanan Kesehatan di Pekanbaru</title>
    <link rel="icon" type="image/png" href="../assets/img/hhh.png" sizes="32x32">
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
</head>
<body onload="initialize()">
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../dashboard"><img src="../assets/img/pulass.png" height="40px" width="200px"></a> 
            </div>
            <?php 
                $use=$_SESSION['uname'];
                $fo=mysql_query("select nama, Foto from admin where username='$use'");
                while($f=mysql_fetch_array($fo)){
            ?>
            <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;"> 
                <?php echo $f['nama']; ?> &nbsp; &nbsp; &nbsp; 
                <a onclick="if(confirm('Apakah anda yakin ingin keluar ?')){location.href='../func/logout.php';}" class="btn btn-primary square-btn-adjust">Logout</a>
            </div>
        </nav>   
           <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				    <li class="text-center">
					<?php
	  if(empty($f['Foto'] )){
?>
      <img src="../assets/img/no.png" class="user-image img-responsive">
<?php
	  }else {
?>
      <img src="../assets/img/<?php echo $f['Foto']; }?>" class="user-image img-responsive"/>
<?php
}
?>
				    </li>
                    <?php
                        $page = basename(dirname($_SERVER['PHP_SELF']));
                    ?>
                    <li>
                        <a class="<?php if($page=='dashboard'){echo 'active-menu';}?>" href="../dashboard"><i class="fa fa-dashboard"></i>&nbsp;Dashboard</a>
                    </li>
                    <li>
                        <a class="<?php if($page=='kec'){echo 'active-menu';}?>" href="../kec"><i class="fa fa-laptop"></i>Data Kecamatan</a>
                            </li>							     
                    <li>
                        <a class="<?php if($page=='spes'){echo 'active-menu';}?>" href="../spes"><i class="fa fa-list"></i>Data Spesialis</a>
                            </li>
                    <li>
                        <a class="<?php if($page=='puskes'){echo 'active-menu';}?>" href="../puskes"><i class="fa fa-university"></i>&nbsp;Data Pusat Kesehatan
                        </a>
                    </li>
					<li>
                        <a class="<?php if($page=='spespuskes'){echo 'active-menu';}?>" href="../spes_puskes"><i class="fa fa-files-o"></i>&nbsp;Data Spesialis Pusat Kesehatan
                        </a>
                    </li>
                    <li>
                        <a class="<?php if($page=='administrator'){echo 'active-menu';}?>" href="../administrator"><i class="fa fa-user"></i>&nbsp;&nbsp;Data Admin</a>
                    </li>	
                </ul>
            </div>
        </nav>