<?php
  include '../func/koneksi.php';
  include '../func/pagination3.php';
  include '../func/em.php';
  
	$page=isset($_GET['page']) ? intval($_GET['page']) : 1;
	$adjacents=isset($_GET['adjacents']) ? intval($_GET['adjacents']) : 3;
	$rpp=5;

	$whr="";
  if(isset($_GET['search'])){ $q=$_GET['search'];
  	if(empty($whr)){ $whr.= cari($q);}
  }
  elseif(isset($_GET['spes'])){ $w=$_GET['spes'];
    if(empty($whr)){ $whr.= spes1($w); } 
    else { $whr.= spes2($w); }
  }
  elseif(isset($_GET['kec'])){ $x=$_GET['kec'];
    if(empty($whr)){ $whr.= kec1($x); } 
    else { $whr.= kec2($x); }
  }

	$t="";
	if(isset($_GET['search'])){ $rt=$_GET['search'];
	  if(empty($t)){ $t.="search=$rt"; }
  }
	elseif(isset($_GET['spes'])){ $rt=$_GET['spes'];
  	if(empty($t)){$t.="spes=$rt"; } 
    else { $t.="&spes=$rt"; }
  }
  elseif(isset($_GET['kec'])) { $rt=$_GET['kec'];
  	if(empty($t)){ $t.="kec=$rt"; }
    else{ $t.="&kec=$rt"; }
  }

	if(empty($t)) { $result = sin1(db_Conn()); } 
  else { $result = sin2(db_Conn(), $whr); }

	$tcount=mysql_num_rows($result);
	$tpages=isset($tcount) ? ceil($tcount/$rpp) : 1;$count=0;
	$i=($page-1)*$rpp;$no_urut=($page-1)*$rpp;

  if(empty($t)){ $reload="?adjacents=".$adjacents; } 
  else { $reload="?".$t."&amp;adjacents=".$adjacents; }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PULAS - Pesebaran Pusat Pelayanan Kesehatan di Pekanbaru</title>
    <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
    <link rel="icon" type="$image/png" href="../assets/img/hhh.png" sizes="32x32">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/imagehover.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <script type="text/javascript">
      function onReady(callback) {
          var intervalID = window.setInterval(checkReady, 300);
          function checkReady() {
              if (document.getElementsByTagName('body')[0] !== undefined) {
                  window.clearInterval(intervalID);
                  callback.call(this);
              }
          }
      }
      function show(id, value) {
          document.getElementById(id).style.display = value ? 'block' : 'none';
      }
      onReady(function () {
          show('pricing', true);
          show('cssload', false);
      });
    </script>
  </head>
  <body>
    <div id='cssload' style="background:url(../assets/img/loading.gif) no-repeat center;background-color:#fff;width:100%;height:100%;position:fixed;left:0;top:0;z-index:3000;"></div>
    <!--Navigation bar-->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../"><img src="../assets/img/asa.png" width="35%"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../#home" data-toggle="tooltip" title="Home"><i class="fa fa-home"></i>&nbsp; Home</a></li>
            <li><a href="../cari" data-toggle="tooltip" title="Telusuri"><i class="fa fa-search"></i>&nbsp; Telusuri</a></li>
            <li><a href="../lokasi_anda" data-toggle="tooltip" title="Terdekat"><i class="fa fa-map"></i>&nbsp; Terdekat</a></li>
            <li><a href="../#kami" data-toggle="tooltip" title="Kontak"><i class="fa fa-phone"></i>&nbsp; Kontak</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!--/ Navigation bar-->
    <!--Pricing-->
    <section id ="pricing" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="header-section text-center">
            <h2>Penelusuran Pusat Layanan Kesehatan</h2>
          </div>
          <div class="col-md-12 col-sm-12">
<?php
  if(empty($_GET['search']) && empty($_GET['spes']) && empty($_GET['kec'])){
    echo "";
  } else {
?>
            <div class="panel panel-default">
            <div class="panel-body" style="font-weight: bold;">
              <p>Hasil Penelusuran :  
<?php
  penelusuran();
?>
            </p>
            </div>
          </div>
<?php 
  } 
?>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <h4 style="text-align: center; margin-bottom: 20px;">Penelusuran</h4>
                <form method="GET" action="../func/carix">
                  <div class="col-md-12 col-sm-12" style="margin-bottom: 30px;">
                    <input class="form-control" type="text" name="search" placeholder="Masukkan Penelusuran" autocomplete="off" >
                  </div>
                  <div class="col-md-12 col-sm-12" style="margin-bottom: 30px;">
                    <label>Spesialis</label>
                      <select class="form-control" name="spes">
                        <option value="">Pilih Spesialis</option>
<?php 
  $brg=spesia(db_Conn());
  while($b=mysql_fetch_array($brg)){
?>  
                        <option value="<?php echo $b['id_spesialis'];?>">
                        <?php echo $b['jenis_spesialis'];?></option>
<?php 
  }
?>
                      </select>
                  </div>
                  <div class="col-md-12 col-sm-12" style="margin-bottom: 30px;">
                    <label>Kecamatan</label>
                      <select class="form-control" name="kec">
                        <option value="">Pilih Kecamatan</option>
<?php 
  $brg=kecam(db_Conn());
  while($b=mysql_fetch_array($brg)){
?>  
                        <option value="<?php echo $b['id_kecamatan'];?>">
                        <?php echo $b['nama'];?></option>
<?php 
  }
?>
                    </select>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <button class="btn btn-primary btn-block" data-toggle="tooltip" title="Cari"><i class="fa fa-search"></i>&nbsp;&nbsp;Telusuri</button>
                    <a class="btn btn-default btn-block" data-toggle="tooltip" title="ulangi" href="../cari"><i class="fa fa-refresh"></i>&nbsp;&nbsp;Refresh</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        <div class="col-md-8 col-sm-8">
<?php
  if(mysql_num_rows($result)>0){
?>
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div id="map" style="height: 400px;"></div>
                  <div style="text-align: right; margin-top: 7px;">
                    <img src="../assets/img/A.png" height="25px"> Rumah Sakit &nbsp;&nbsp; 
                    <img src="../assets/img/AA.png" height="25px"> Puskesmas &nbsp;&nbsp;
                    <img src="../assets/img/AAA.png" height="25px"> Klinik &nbsp;&nbsp;
                  </div>
                </div>
              </div>
          </div>
  <script>
    var marker;
    function initialize(){ 
      var infoWindow = new google.maps.InfoWindow;
      var start_point = new google.maps.LatLng(0.505895, 101.447181);
      var mapOptions = {
        center: start_point,
        zoom: 11, 
        mapTypeId: google.maps.MapTypeId.ROADMAP 
      } 
      var map = new google.maps.Map(document.getElementById('map'), mapOptions); 
      //var bounds = new google.maps.LatLngBounds(); 
          //ini
			var marker = new google.maps.Marker({
			  position: {lat: 0.462417,  lng: 101.465967},
			  map: map,
              icon: '../assets/img/br.png',
			  title: 'Bukit Raya'
			});
			
			var html = "<b>Kec. Bukit Raya</b><br/><div align='left'></div>";
			
			bindInfoWindow(marker, map, infoWindow, html);
		//ini	
          
          //ini
			var marker = new google.maps.Marker({
			  position: {lat: 0.545263,  lng: 101.462205},
			  map: map,
                 icon: '../assets/img/lp.png',
			  title: 'Lima Puluh'
			});
			
			var html = "<b>Kec. Lima Puluh</b><br/><div align='left'></div>";
			
			bindInfoWindow(marker, map, infoWindow, html);
		//ini	
          
          
          
			var marker = new google.maps.Marker({
			  position: {lat: 0.446204,    lng: 101.437158},
			  map: map,
                 icon: '../assets/img/md.png',
			  title: 'Marpoyan Damai'
			});
			
			var html = "<b>Kec. Marpoyan Damai</b><br/><div align='left'></div>";
			
			bindInfoWindow(marker, map, infoWindow, html);
          
          //ini
			var marker = new google.maps.Marker({
			  position: {lat: 0.520228,   lng: 101.397472},
			  map: map,
                 icon: '../assets/img/ps.png',
			  title: 'Payung Sekaki'
			});
			
			var html = "<b>Kec. Payung Sekaki</b><br/><div align='left'></div>";
			
			bindInfoWindow(marker, map, infoWindow, html);
		//ini	
          
          //ini
			var marker = new google.maps.Marker({
			  position: {lat: 0.517767,   lng: 101.450067},
			  map: map,
                 icon: '../assets/img/pku.png',
			  title: 'Pekanbaru Kota'
			});
			
			var html = "<b>Kec. Pekanbaru Kota</b><br/><div align='left'></div>";
			
			bindInfoWindow(marker, map, infoWindow, html);
		//ini	
           //ini
			var marker = new google.maps.Marker({
			  position: {lat: 0.512513,   lng: 101.458364 },
			  map: map,
                 icon: '../assets/img/sl.png',
			  title: 'Sail'
			});
			
			var html = "<b>Kec. Sail</b><br/><div align='left'></div>";
			
			bindInfoWindow(marker, map, infoWindow, html);
		//ini	
           //ini
			var marker = new google.maps.Marker({
			  position: {lat: 0.530553,   lng: 101.436374 },
			  map: map,
                 icon: '../assets/img/snp.png',
			  title: 'Senapelan'
			});
			
			var html = "<b>Kec. Senapelan</b><br/><div align='left'></div>";
			
			bindInfoWindow(marker, map, infoWindow, html);
		//ini	
          //ini
			var marker = new google.maps.Marker({
			  position: {lat: 0.507660,  lng: 101.438931 },
			  map: map,
                 icon: '../assets/img/skj.png',
			  title: 'Sukajadi'
			});
			
			var html = "<b>Kec. Sukajadi</b><br/><div align='left'></div>";
			
			bindInfoWindow(marker, map, infoWindow, html);
		//ini	
          //ini
			var marker = new google.maps.Marker({
			  position: {lat: 0.633952,    lng: 101.398101 },
			  map: map,
                 icon: '../assets/img/rm.png',
			  title: 'Rumbai'
			});
			
			var html = "<b>Kec. Rumbai</b><br/><div align='left'></div>";
			
			bindInfoWindow(marker, map, infoWindow, html);
		//ini	
          //ini
			var marker = new google.maps.Marker({
			  position: {lat: 0.615131,   lng: 101.500106 },
			  map: map,
                 icon: '../assets/img/rp.png',
			  title: 'Rumbai Pesisir'
			});
			
			var html = "<b>Kec. Rumbai Pesisir</b><br/><div align='left'></div>";
			
			bindInfoWindow(marker, map, infoWindow, html);
		//ini	
          //ini
			var marker = new google.maps.Marker({
			  position: {lat: 0.446112,  lng: 101.383188 },
			  map: map,
                 icon: '../assets/img/tmp.png',
			  title: 'Tampan'
			});
			
			var html = "<b>Kec. Tampan</b><br/><div align='left'></div>";
			
			bindInfoWindow(marker, map, infoWindow, html);
		//ini	
          //ini
			var marker = new google.maps.Marker({
			  position: {lat: 0.518626,     lng: 101.536852 },
			  map: map,
                 icon: '../assets/img/tr.png',
			  title: 'Tenayan Raya'
			});
			
			var html = "<b>Kec. Tenayan Raya</b><br/><div align='left'></div>";
			
			bindInfoWindow(marker, map, infoWindow, html);
		//ini	
		
		// Define the LatLng coordinates for the polygon's path.
var br = [
{lat:0.422387,  lng: 101.436845}, 
{lat:0.423902,  lng: 101.437475}, 
{lat:0.428880,  lng: 101.440994}, 
{lat:0.434502,  lng: 101.445371}, 
{lat:0.443599,  lng: 101.449363 }, 
{lat:0.451796,  lng: 101.452710}, 
{lat:0.459907,  lng: 101.452152},
{lat:0.461194,  lng: 101.451809},
{lat:0.465013,  lng: 101.454212},
{lat:0.475227,  lng: 101.453826},
{lat:0.494495,  lng: 101.454727},
{lat:0.496813,  lng: 101.455414},
{lat:0.497413,  lng: 101.455371},
{lat:0.498229,  lng: 101.455156},
{lat:0.498915,  lng: 101.454813},
{lat:0.499430,  lng: 101.454341},
{lat:0.500331,  lng: 101.453053},
{lat:0.500718,  lng: 101.453053},
{lat:0.502005,  lng: 101.453568},
{lat:0.501748,  lng: 101.454555},
{lat:0.503293,  lng: 101.454899},
{lat:0.504280,  lng: 101.455371},
{lat:0.505567,  lng: 101.456401},
{lat:0.505996,  lng: 101.456701},
{lat:0.506511,  lng: 101.457044},
{lat:0.506683,  lng: 101.457474},
{lat:0.507584,  lng: 101.458461},
{lat:0.507927,  lng: 101.458804},
{lat:0.507884,  lng: 101.459362},
{lat:0.508013,  lng: 101.459791},
{lat:0.508099,  lng: 101.460950},
{lat:0.509772,  lng: 101.463997},
{lat:0.510202,  lng: 101.464383},
{lat:0.510202,  lng: 101.464941},
{lat:0.510588,  lng: 101.465456},
{lat:0.510931,  lng: 101.466400},
{lat:0.512219,  lng: 101.467816},
{lat:0.513206,  lng: 101.468117},
{lat:0.513892,  lng: 101.468503},
{lat:0.513935,  lng: 101.469232},
{lat:0.514107,  lng: 101.469662},
{lat:0.513592,  lng: 101.469747},
{lat:0.512819,  lng: 101.470863},
{lat:0.512304,  lng: 101.471078},
{lat:0.511789,  lng: 101.472236},
{lat:0.511274,  lng: 101.472623},
{lat:0.510802,  lng: 101.472708},
{lat:0.510620,  lng: 101.473193},
{lat:0.509332,  lng: 101.474009},
{lat:0.509289,  lng: 101.474738},
{lat:0.507916,  lng: 101.476712},
{lat:0.508206,  lng: 101.477464},
{lat:0.507026,  lng: 101.478631},
{lat:0.505267,  lng: 101.479403},
{lat:0.504837,  lng: 101.480347},
{lat:0.503550,  lng: 101.481549},
{lat:0.502906,  lng: 101.481678},
{lat:0.502391,  lng: 101.481334},
{lat:0.499774,  lng: 101.481120},
{lat:0.499173,  lng: 101.480648},
{lat:0.498057,  lng: 101.480219},
{lat:0.495611,  lng: 101.480519},
{lat:0.493852,  lng: 101.478931},
{lat:0.492822,  lng: 101.478330},
{lat:0.492178,  lng: 101.477901},
{lat:0.489517,  lng: 101.477258},
{lat:0.488874,  lng: 101.477815},
{lat:0.488101,  lng: 101.477944},
{lat:0.487157,  lng: 101.479275},
{lat:0.484496,  lng: 101.479918},
{lat:0.484325,  lng: 101.480777},
{lat:0.483767,  lng: 101.481420},
{lat:0.482694,  lng: 101.481635},
{lat:0.481278,  lng: 101.483394},
{lat:0.479947,  lng: 101.485283},
{lat:0.479690,  lng: 101.485369},
{lat:0.479668,  lng: 101.485411},
{lat:0.478896,  lng: 101.485497},
{lat:0.478349,  lng: 101.486012},
{lat:0.477705,  lng: 101.485819},
{lat:0.477448,  lng: 101.485905},
{lat:0.476306,  lng: 101.485915},
{lat:0.474375,  lng: 101.486430},
{lat:0.473903,  lng: 101.485915},
{lat:0.472702,  lng: 101.486558},
{lat:0.470599,  lng: 101.488790},
{lat:0.469226,  lng: 101.488618},
{lat:0.467037,  lng: 101.488747},
{lat:0.465192,  lng: 101.488447},
{lat:0.464162,  lng: 101.488017},
{lat:0.463303,  lng: 101.488404},
{lat:0.462488,  lng: 101.489949},
{lat:0.462059,  lng: 101.489949},
{lat:0.461501,  lng: 101.489949},
{lat:0.461029,  lng: 101.490335},
{lat:0.460342,  lng: 101.490292},
{lat:0.459870,  lng: 101.489820},
{lat:0.459613,  lng: 101.489863},
{lat:0.459441,  lng: 101.490249},
{lat:0.457246,  lng: 101.491720},
{lat:0.457160,  lng: 101.492020},
{lat:0.454027,  lng: 101.494681},
{lat:0.451023,  lng: 101.498672},
{lat:0.448835,  lng: 101.502363},
{lat:0.446174,  lng: 101.505367},
{lat:0.445702,  lng: 101.499874},
{lat:0.446346,  lng: 101.495883},
{lat:0.452912,  lng: 101.485540},
{lat:0.455572,  lng: 101.478416},
{lat:0.456001,  lng: 101.476957},
{lat:0.453298,  lng: 101.475541},
{lat:0.451882,  lng: 101.474275},
{lat:0.448406,  lng: 101.471550},
{lat:0.448406,  lng: 101.471550}, 
{lat:0.447590,  lng:101.471292}, 
{lat:0.446990,  lng:101.470820}, 
{lat:0.446603,  lng:101.469962}, 
{lat:0.446389,  lng:101.469919}, 
{lat:0.445573,  lng:101.468975}, 
{lat:0.445573,  lng:101.468975}, 
{lat:0.444114,  lng:101.467559}, 
{lat:0.443814,  lng:101.467430}, 
{lat:0.444200,  lng:101.466486}, 
{lat:0.443771,  lng:101.466228}, 
{lat:0.443299,  lng:101.465542}, 
{lat:0.442569,  lng:101.465070}, 
{lat:0.441926,  lng:101.465155}, 
{lat:0.441883,  lng:101.463997}, 
{lat:0.441668,  lng:101.463439}, 
{lat:0.440252,  lng:101.463138},
{lat:0.439780,  lng:101.461765},
{lat:0.440381,  lng:101.460821},
{lat:0.440638,  lng:101.459319},
{lat:0.441110,  lng:101.459405},
{lat:0.441110,  lng:101.458976},
{lat:0.440552,  lng:101.458804},
{lat:0.440853,  lng:101.458246},
{lat:0.440939,  lng:101.456229},
{lat:0.441754,  lng:101.454727},
{lat:0.442269,  lng:101.454813},
{lat:0.442698,  lng:101.453697},
{lat:0.441926,  lng:101.453397},
{lat:0.439651,  lng:101.452109},
{lat:0.439823,  lng:101.451508},
{lat:0.439823,  lng:101.451551},
{lat:0.437978,  lng:101.450950},
{lat:0.437806,  lng:101.451036},
{lat:0.437463,  lng:101.450865},
{lat:0.436819,  lng:101.451208},
{lat:0.434115,  lng:101.450092},
{lat:0.433600,  lng:101.448933},
{lat:0.433772,  lng:101.448290},
{lat:0.431583,  lng:101.447217},
{lat:0.430553,  lng:101.448633},
{lat:0.429009,  lng:101.448118},
{lat:0.427764,  lng:101.448075},
{lat:0.427163,  lng:101.447131},
{lat:0.426391,  lng:101.447217},
{lat:0.425833,  lng:101.446916},
{lat:0.425447,  lng:101.447217},
{lat:0.424460,  lng:101.446873},
{lat:0.424202,  lng:101.446487},
{lat:0.422786,  lng:101.446873},
{lat:0.421499,  lng:101.445243},
{lat:0.419524,  lng:101.448633},
{lat:0.417078,  lng:101.447431},
{lat:0.417465,  lng:101.446015},
{lat:0.417465,  lng:101.446015},
{lat:0.417379,  lng:101.444127},
{lat:0.419911,  lng:101.439492},
{lat:0.421155,  lng:101.439235},
{lat:0.422443,  lng:101.436831},
{lat:0.423043,  lng:101.437046},
];

var lp = [
{lat:0.525287, lng: 101.453536}, 
{lat:0.532239, lng:101.453622},
{lat:0.532282, lng:101.447442},
{lat:0.537732, lng:101.447528},
{lat:0.537977, lng:101.447843},
{lat:0.538031, lng:101.447883},
{lat:0.538115, lng:101.447864},
{lat:0.538332, lng:101.447808},
{lat:0.538591, lng:101.447808},
{lat:0.538717, lng:101.447941},
{lat:0.538745, lng:101.448060},
{lat:0.538857, lng:101.448270},
{lat:0.539052, lng:101.448363},
{lat:0.539143, lng:101.448489},
{lat:0.539668, lng:101.448832},
{lat:0.539899, lng:101.448951},
{lat:0.540011, lng:101.449007},
{lat:0.540193, lng:101.449280},
{lat:0.540319, lng:101.449469},
{lat:0.540613, lng:101.449601},
{lat:0.540830, lng:101.449930},
{lat:0.541067, lng:101.450112},
{lat:0.541389, lng:101.450497},
{lat:0.541389, lng:101.450497},
{lat:0.542040, lng:101.451610},
{lat:0.542033, lng:101.452295},
{lat:0.541970, lng:101.452589},
{lat:0.541830, lng:101.453373},
{lat:0.541760, lng:101.453541},
{lat:0.541760, lng:101.454779},
{lat:0.541753, lng:101.456298},
{lat:0.541795, lng:101.456480},
{lat:0.542355, lng:101.457494},
{lat:0.542558, lng:101.458026},
{lat:0.542572, lng:101.458061},
{lat:0.542705, lng:101.458173},
{lat:0.543705, lng:101.458656},
{lat:0.544076, lng:101.458656},
{lat:0.544461, lng:101.458467},
{lat:0.544972, lng:101.458383},
{lat:0.545804, lng:101.458397},
{lat:0.546546, lng:101.458145},
{lat:0.546928, lng:101.457949},
{lat:0.547649, lng:101.457963},
{lat:0.548754, lng:101.457473},
{lat:0.549436, lng:101.456690},
{lat:0.550917, lng:101.455381},
{lat:0.551196, lng:101.454738},
{lat:0.551432, lng:101.453858},
{lat:0.551410, lng:101.453064},
{lat:0.550123, lng:101.451412},
{lat:0.549715, lng:101.450446},
{lat:0.550445, lng:101.448558},
{lat:0.551325, lng:101.447785},
{lat:0.551689, lng:101.447700},
{lat:0.555187, lng:101.449180},
{lat:0.555337, lng:101.450124},
{lat:0.555337, lng:101.451090},
{lat:0.556002, lng:101.453096},
{lat:0.556175, lng:101.453867},
{lat:0.556572, lng:101.454393},
{lat:0.556057, lng:101.455359},
{lat:0.555723, lng:101.455918},
{lat:0.554736, lng:101.456862},
{lat:0.553427, lng:101.458793},
{lat:0.552548, lng:101.460252},
{lat:0.552247, lng:101.461368},
{lat:0.551453, lng:101.462291},
{lat:0.550960, lng:101.463020},
{lat:0.549200, lng:101.464351},
{lat:0.548127, lng:101.465273},
{lat:0.546540, lng:101.466411},
{lat:0.546282, lng:101.467376},
{lat:0.545917, lng:101.468170},
{lat:0.545381, lng:101.468106},
{lat:0.544523, lng:101.467934},
{lat:0.543986, lng:101.468127},
{lat:0.543407, lng:101.468406},
{lat:0.542205, lng:101.468406},
{lat:0.541369, lng:101.468192},
{lat:0.540618, lng:101.468428},
{lat:0.539995, lng:101.468256},
{lat:0.538901, lng:101.468149},
{lat:0.538386, lng:101.467612},
{lat:0.537292, lng:101.467891},
{lat:0.536112, lng:101.467741},
{lat:0.534402, lng:101.467889},
{lat:0.532900, lng:101.467803},
{lat:0.532064, lng:101.467653},
{lat:0.530283, lng:101.468833},
{lat:0.530326, lng:101.468919},
{lat:0.530111, lng:101.468940},
{lat:0.529188, lng:101.468447},
{lat:0.528330, lng:101.468210},
{lat:0.527279, lng:101.468425},
{lat:0.527064, lng:101.468339},
{lat:0.526614, lng:101.467288},
{lat:0.526034, lng:101.467116},
{lat:0.525627, lng:101.467331},
{lat:0.525219, lng:101.467374},
{lat:0.524809, lng:101.467398},
{lat:0.524874, lng:101.465252},
{lat:0.524906, lng:101.463600},
{lat:0.525035, lng:101.460735},
{lat:0.525110, lng:101.456626},
{lat:0.525142, lng:101.453997},
{lat:0.525185, lng:101.453772},
{lat:0.525271, lng:101.453568},
{lat:0.525475, lng:101.453568},
];

var md = [
{lat:0.423889, lng:101.437505}, 
{lat:0.426464, lng:101.431668},
{lat:0.429210, lng:101.429952},
{lat:0.430412, lng:101.427377},
{lat:0.435218, lng:101.424974},
{lat:0.441055, lng:101.421025},
{lat:0.447234, lng:101.417935},
{lat:0.477102, lng:101.418279},
{lat:0.500791, lng:101.419309},
{lat:0.510575, lng:101.448835},
{lat:0.506112, lng:101.451238},
{lat:0.503366, lng:101.453641},
{lat:0.500619, lng:101.453126},
{lat:0.499246, lng:101.454499},
{lat:0.497701, lng:101.455529},
{lat:0.494440, lng:101.454499},
{lat:0.477961, lng:101.453984},
{lat:0.465602, lng:101.454156},
{lat:0.461138, lng:101.451924},
{lat:0.459594, lng:101.451924},
{lat:0.451869, lng:101.452783},
{lat:0.442943, lng:101.448663},
{lat:0.434532, lng:101.445230},
{lat:0.427322, lng:101.439908},
{lat:0.424576, lng:101.437505},
{lat:0.425606, lng:101.434243},
];

var ps = [
{lat:0.499115, lng:101.362968}, 
{lat:0.536020, lng:101.362968},
{lat:0.536879, lng:101.365372},
{lat:0.539282, lng:101.366230},
{lat:0.540505, lng:101.367131},
{lat:0.541191, lng:101.367088},
{lat:0.542565, lng:101.368333},
{lat:0.543337, lng:101.369363},
{lat:0.544238, lng:101.370994},
{lat:0.544496, lng:101.371122},
{lat:0.545139, lng:101.371122},
{lat:0.546298, lng:101.370522},
{lat:0.546513, lng:101.370479},
{lat:0.547028, lng:101.370822},
{lat:0.547328, lng:101.370736},
{lat:0.547929, lng:101.371294},
{lat:0.548229, lng:101.371852},
{lat:0.548573, lng:101.371809},
{lat:0.548701, lng:101.371852},
{lat:0.548787, lng:101.372066},
{lat:0.548830, lng:101.371938},
{lat:0.552864, lng:101.375113},
{lat:0.552091, lng:101.376272},
{lat:0.552306, lng:101.377173},
{lat:0.553164, lng:101.377388},
{lat:0.554194, lng:101.377345},
{lat:0.556383, lng:101.377774},
{lat:0.557713, lng:101.378289},
{lat:0.558185, lng:101.379105},
{lat:0.557842, lng:101.380177},
{lat:0.557971, lng:101.381079},
{lat:0.558314, lng:101.382581},
{lat:0.558915, lng:101.383182},
{lat:0.558958, lng:101.383310},
{lat:0.559129, lng:101.384984},
{lat:0.558400, lng:101.385113},
{lat:0.556082, lng:101.383954},
{lat:0.553593, lng:101.382323},
{lat:0.552263, lng:101.381551},
{lat:0.550074, lng:101.381465},
{lat:0.548358, lng:101.382924},
{lat:0.547242, lng:101.384598},
{lat:0.547586, lng:101.385885},
{lat:0.548787, lng:101.386872},
{lat:0.550074, lng:101.388117},
{lat:0.551877, lng:101.390906},
{lat:0.553121, lng:101.391593},
{lat:0.554323, lng:101.391979},
{lat:0.556039, lng:101.392623},
{lat:0.558786, lng:101.392795},
{lat:0.559172, lng:101.393224},
{lat:0.558958, lng:101.394082},
{lat:0.558357, lng:101.395026},
{lat:0.557284, lng:101.395842},
{lat:0.555782, lng:101.395327},
{lat:0.553465, lng:101.393095},
{lat:0.552306, lng:101.393138},
{lat:0.551233, lng:101.393696},
{lat:0.550589, lng:101.394554},
{lat:0.548272, lng:101.395756},
{lat:0.547972, lng:101.397215},
{lat:0.548744, lng:101.398245},
{lat:0.549860, lng:101.398803},
{lat:0.551190, lng:101.399747},
{lat:0.551619, lng:101.400906},
{lat:0.551834, lng:101.402064},
{lat:0.550332, lng:101.403266},
{lat:0.549946, lng:101.404081},
{lat:0.550246, lng:101.409317},
{lat:0.548272, lng:101.412965},
{lat:0.548358, lng:101.414853},
{lat:0.549688, lng:101.417643},
{lat:0.551104, lng:101.418801},
{lat:0.551877, lng:101.421247},
{lat:0.551319, lng:101.422320},
{lat:0.550117, lng:101.422363},
{lat:0.548058, lng:101.422149},
{lat:0.546770, lng:101.423136},
{lat:0.545826, lng:101.424767},
{lat:0.544839, lng:101.429144},
{lat:0.542307, lng:101.428071},
{lat:0.540762, lng:101.428114},
{lat:0.535098, lng:101.427556},
{lat:0.528661, lng:101.427728},
{lat:0.524756, lng:101.428972},
{lat:0.523211, lng:101.429873},
{lat:0.522352, lng:101.430388},
{lat:0.520765, lng:101.432363},
{lat:0.517846, lng:101.431333},
{lat:0.512997, lng:101.430303},
{lat:0.510208, lng:101.431075},
{lat:0.505015, lng:101.432577},
{lat:0.500767, lng:101.419402},
{lat:0.497355, lng:101.394125},
{lat:0.502934, lng:101.384684},
{lat:0.499072, lng:101.363226},
{lat:0.536149, lng:101.362883},
];

var rm = [
{lat:0.606145, lng:101.328064},
{lat:0.608806, lng:101.329952},
{lat:0.613097, lng:101.333042},
{lat:0.615500, lng:101.336304},
{lat:0.616358, lng:101.337849},
{lat:0.618418, lng:101.340938},
{lat:0.620306, lng:101.343685},
{lat:0.621164, lng:101.345230},
{lat:0.621336, lng:101.347118},
{lat:0.622538, lng:101.346603},
{lat:0.626486, lng:101.352096},
{lat:0.628717, lng:101.353470},
{lat:0.631120, lng:101.356560},
{lat:0.633008, lng:101.358448},
{lat:0.636270, lng:101.363083},
{lat:0.636956, lng:101.365658},
{lat:0.639016, lng:101.367203},
{lat:0.640046, lng:101.369778},
{lat:0.644337, lng:101.373726},
{lat:0.646569, lng:101.375957},
{lat:0.649487, lng:101.377159},
{lat:0.653435, lng:101.377159},
{lat:0.654980, lng:101.377846},
{lat:0.655623, lng:101.379476},
{lat:0.656224, lng:101.379906},
{lat:0.657769, lng:101.380850},
{lat:0.662146, lng:101.379991},
{lat:0.662575, lng:101.378103},
{lat:0.670385, lng:101.377502},
{lat:0.675621, lng:101.380764},
{lat:0.681199, lng:101.382137},
{lat:0.686692, lng:101.386343},
{lat:0.690554, lng:101.392094},
{lat:0.692528, lng:101.397243},
{lat:0.689181, lng:101.401621},
{lat:0.688323, lng:101.407200},
{lat:0.683602, lng:101.411320},
{lat:0.682916, lng:101.414925},
{lat:0.684975, lng:101.417843},
{lat:0.674676, lng:101.426598},
{lat:0.672359, lng:101.429344},
{lat:0.666180, lng:101.440416},
{lat:0.661889, lng:101.457153},
{lat:0.647813, lng:101.454407},
{lat:0.627644, lng:101.450544},
{lat:0.622323, lng:101.450544},
{lat:0.622323, lng:101.449257},
{lat:0.621551, lng:101.447969},
{lat:0.621894, lng:101.446682},
{lat:0.617860, lng:101.443935},
{lat:0.617002, lng:101.442305},
{lat:0.614427, lng:101.441017},
{lat:0.612796, lng:101.440760},
{lat:0.609449, lng:101.438442},
{lat:0.608248, lng:101.435524},
{lat:0.607990, lng:101.434408},
{lat:0.605930, lng:101.431747},
{lat:0.604986, lng:101.431318},
{lat:0.604471, lng:101.429516},
{lat:0.603699, lng:101.427627},
{lat:0.603098, lng:101.424366},
{lat:0.601467, lng:101.423422},
{lat:0.584347, lng:101.423423},
{lat:0.581813, lng:101.426168},
{lat:0.582328, lng:101.428314},
{lat:0.582071, lng:101.429516},
{lat:0.579839, lng:101.429859},
{lat:0.576921, lng:101.429001},
{lat:0.571257, lng:101.429172},
{lat:0.551173, lng:101.435953},
{lat:0.546710, lng:101.437756},
{lat:0.541990, lng:101.437155},
{lat:0.542762, lng:101.433807},
{lat:0.544908, lng:101.431833},
{lat:0.545423, lng:101.429945},
{lat:0.546024, lng:101.426426},
{lat:0.547740, lng:101.422821},
{lat:0.548856, lng:101.422735},
{lat:0.552203, lng:101.422649},
{lat:0.552461, lng:101.421190},
{lat:0.551688, lng:101.418529},
{lat:0.549800, lng:101.416298},
{lat:0.549028, lng:101.414324},
{lat:0.549199, lng:101.412435},
{lat:0.550916, lng:101.409260},
{lat:0.550744, lng:101.404024},
{lat:0.552890, lng:101.402307},
{lat:0.551602, lng:101.399303},
{lat:0.548684, lng:101.396814},
{lat:0.549285, lng:101.395870},
{lat:0.551517, lng:101.394754},
{lat:0.552546, lng:101.393810},
{lat:0.553662, lng:101.393896},
{lat:0.555035, lng:101.395269},
{lat:0.556237, lng:101.396471},
{lat:0.558554, lng:101.395956},
{lat:0.559842, lng:101.393467},
{lat:0.558812, lng:101.391750},
{lat:0.556065, lng:101.391922},
{lat:0.552375, lng:101.390720},
{lat:0.551087, lng:101.388317},
{lat:0.548169, lng:101.385313},
{lat:0.548341, lng:101.384025},
{lat:0.550401, lng:101.382051},
{lat:0.551517, lng:101.381966},
{lat:0.553147, lng:101.382395},
{lat:0.553233, lng:101.382566},
{lat:0.555808, lng:101.384712},
{lat:0.558383, lng:101.385914},
{lat:0.559584, lng:101.385656},
{lat:0.559842, lng:101.383768},
{lat:0.558383, lng:101.381107},
{lat:0.558812, lng:101.378618},
{lat:0.557009, lng:101.377159},
{lat:0.553233, lng:101.376558},
{lat:0.553491, lng:101.375614},
{lat:0.555550, lng:101.373983},
{lat:0.556752, lng:101.372782},
{lat:0.558297, lng:101.372524},
{lat:0.561129, lng:101.372696},
{lat:0.563876, lng:101.372610},
{lat:0.566021, lng:101.370207},
{lat:0.566107, lng:101.368404},
{lat:0.563704, lng:101.367889},
{lat:0.560099, lng:101.368833},
{lat:0.561472, lng:101.367031},
{lat:0.561537, lng:101.366259},
{lat:0.563189, lng:101.364799},
{lat:0.564305, lng:101.360851},
{lat:0.567909, lng:101.359735},
{lat:0.569283, lng:101.358877},
{lat:0.569540, lng:101.356045},
{lat:0.567051, lng:101.356216},
{lat:0.566450, lng:101.354929},
{lat:0.567738, lng:101.354156},
{lat:0.568939, lng:101.352697},
{lat:0.570484, lng:101.352011},
{lat:0.570913, lng:101.350723},
{lat:0.570484, lng:101.349693},
{lat:0.570656, lng:101.349350},
{lat:0.573402, lng:101.348749},
{lat:0.574175, lng:101.347032},
{lat:0.574089, lng:101.345144},
{lat:0.575720, lng:101.343771},
{lat:0.577179, lng:101.344114},
{lat:0.578724, lng:101.343943},
{lat:0.582328, lng:101.342913},
{lat:0.583787, lng:101.341711},
{lat:0.583873, lng:101.341024},
{lat:0.586190, lng:101.340080},
{lat:0.586877, lng:101.338020},
{lat:0.586791, lng:101.335016},
{lat:0.587821, lng:101.333042},
{lat:0.589023, lng:101.332699},
{lat:0.590310, lng:101.331068},
{lat:0.592370, lng:101.330295},
{lat:0.594258, lng:101.331068},
{lat:0.595460, lng:101.330639},
{lat:0.596575, lng:101.329866},
{lat:0.596661, lng:101.327721},
{lat:0.598549, lng:101.326004},
{lat:0.600180, lng:101.327806},
{lat:0.600266, lng:101.329866},
{lat:0.601038, lng:101.331926},
{lat:0.603184, lng:101.332184},
{lat:0.603699, lng:101.330725},
{lat:0.606789, lng:101.332613},
{lat:0.607389, lng:101.333643},
{lat:0.607389, lng:101.336904},
{lat:0.608763, lng:101.338192},
{lat:0.608334, lng:101.339050},
{lat:0.609449, lng:101.338879},
{lat:0.609707, lng:101.339651},
{lat:0.610565, lng:101.342655},
{lat:0.612110, lng:101.344887},
{lat:0.612281, lng:101.344887},
{lat:0.610737, lng:101.341883},
{lat:0.610651, lng:101.339994},
{lat:0.608162, lng:101.337248},
{lat:0.608076, lng:101.335102},
{lat:0.608489, lng:101.332398},
{lat:0.607733, lng:101.333085},
{lat:0.607132, lng:101.332055},
{lat:0.605072, lng:101.330939},
{lat:0.605759, lng:101.329480},
{lat:0.605072, lng:101.328021},
{lat:0.606016, lng:101.327849},
{lat:0.609492, lng:101.330081},
];

var rp = [
{lat:0.541921, lng:101.437279}, 
{lat:0.546728, lng:101.437794},
{lat:0.550418, lng:101.436077},
{lat:0.569129, lng:101.429812},
{lat:0.572647, lng:101.429039},
{lat:0.577196, lng:101.428953},
{lat:0.579685, lng:101.429726},
{lat:0.581745, lng:101.429726},
{lat:0.582217, lng:101.429082},
{lat:0.582260, lng:101.428524},
{lat:0.581659, lng:101.426464},
{lat:0.582174, lng:101.424833},
{lat:0.583547, lng:101.423288},
{lat:0.601228, lng:101.423117},
{lat:0.602000, lng:101.423460},
{lat:0.602172, lng:101.423632},
{lat:0.602601, lng:101.424233},
{lat:0.603116, lng:101.424318},
{lat:0.603631, lng:101.425348},
{lat:0.603674, lng:101.427144},
{lat:0.604704, lng:101.429118},
{lat:0.604961, lng:101.430834},
{lat:0.605562, lng:101.431521},
{lat:0.606077, lng:101.431607},
{lat:0.606420, lng:101.432122},
{lat:0.607450, lng:101.432894},
{lat:0.608201, lng:101.434632},
{lat:0.608308, lng:101.435812},
{lat:0.608738, lng:101.437014},
{lat:0.609467, lng:101.438602},
{lat:0.610497, lng:101.439417},
{lat:0.611527, lng:101.439675},
{lat:0.612299, lng:101.440233},
{lat:0.612986, lng:101.440791},
{lat:0.614488, lng:101.440834},
{lat:0.615518, lng:101.441735},
{lat:0.616977, lng:101.442078},
{lat:0.617406, lng:101.442507},
{lat:0.617835, lng:101.444052},
{lat:0.621869, lng:101.446370},
{lat:0.621526, lng:101.447743},
{lat:0.622212, lng:101.448515},
{lat:0.622384, lng:101.449631},
{lat:0.621955, lng:101.450404},
{lat:0.627619, lng:101.450318},
{lat:0.642381, lng:101.453408},
{lat:0.647273, lng:101.454438},
{lat:0.661863, lng:101.457098},
{lat:0.659718, lng:101.484478},
{lat:0.658259, lng:101.484993},
{lat:0.657229, lng:101.484822},
{lat:0.655341, lng:101.484049},
{lat:0.654740, lng:101.484393},
{lat:0.654483, lng:101.485766},
{lat:0.652852, lng:101.487311},
{lat:0.652251, lng:101.488513},
{lat:0.651393, lng:101.489028},
{lat:0.652165, lng:101.490315},
{lat:0.653538, lng:101.490916},
{lat:0.654311, lng:101.491860},
{lat:0.654654, lng:101.492718},
{lat:0.655770, lng:101.494435},
{lat:0.655512, lng:101.495293},
{lat:0.656971, lng:101.497010},
{lat:0.657916, lng:101.496924},
{lat:0.659203, lng:101.497353},
{lat:0.659460, lng:101.498126},
{lat:0.657057, lng:101.518553},
{lat:0.658087, lng:101.540268},
{lat:0.655083, lng:101.540955},
{lat:0.653281, lng:101.541813},
{lat:0.651050, lng:101.543959},
{lat:0.649762, lng:101.544474},
{lat:0.647788, lng:101.544388},
{lat:0.642295, lng:101.545933},
{lat:0.640407, lng:101.547392},
{lat:0.637146, lng:101.552456},
{lat:0.637918, lng:101.559752},
{lat:0.641008, lng:101.563786},
{lat:0.641008, lng:101.566618},
{lat:0.640064, lng:101.569451},
{lat:0.638777, lng:101.571425},
{lat:0.634314, lng:101.573742},
{lat:0.631996, lng:101.574172},
{lat:0.627448, lng:101.572798},
{lat:0.626332, lng:101.571339},
{lat:0.624529, lng:101.571339},
{lat:0.623242, lng:101.572283},
{lat:0.622555, lng:101.573399},
{lat:0.621526, lng:101.573485},
{lat:0.614831, lng:101.578120},
{lat:0.614660, lng:101.579150},
{lat:0.613630, lng:101.580351},
{lat:0.612771, lng:101.580695},
{lat:0.612943, lng:101.582068},
{lat:0.612342, lng:101.582926},
{lat:0.612256, lng:101.583870},
{lat:0.610368, lng:101.584729},
{lat:0.610368, lng:101.586016},
{lat:0.609853, lng:101.588076},
{lat:0.607965, lng:101.589964},
{lat:0.606635, lng:101.591516},
{lat:0.603373, lng:101.591172},
{lat:0.598910, lng:101.589627},
{lat:0.597194, lng:101.587567},
{lat:0.595134, lng:101.584306},
{lat:0.596507, lng:101.582246},
{lat:0.597194, lng:101.578984},
{lat:0.596679, lng:101.576924},
{lat:0.594619, lng:101.571088},
{lat:0.595306, lng:101.568513},
{lat:0.591701, lng:101.563878},
{lat:0.587581, lng:101.563878},
{lat:0.585006, lng:101.566110},
{lat:0.583462, lng:101.569200},
{lat:0.579514, lng:101.571088},
{lat:0.577625, lng:101.569200},
{lat:0.578827, lng:101.562162},
{lat:0.581745, lng:101.555810},
{lat:0.581917, lng:101.550317},
{lat:0.580200, lng:101.547055},
{lat:0.574536, lng:101.543965},
{lat:0.571961, lng:101.541219},
{lat:0.571789, lng:101.536927},
{lat:0.572819, lng:101.534524},
{lat:0.573677, lng:101.532807},
{lat:0.577625, lng:101.527314},
{lat:0.578655, lng:101.525083},
{lat:0.578140, lng:101.522851},
{lat:0.577110, lng:101.521134},
{lat:0.571961, lng:101.520619},
{lat:0.570073, lng:101.519590},
{lat:0.568356, lng:101.517701},
{lat:0.568013, lng:101.514611},
{lat:0.570073, lng:101.506200},
{lat:0.569729, lng:101.503797},
{lat:0.568013, lng:101.502080},
{lat:0.565953, lng:101.500707},
{lat:0.564236, lng:101.500363},
{lat:0.563035, lng:101.497960},
{lat:0.562348, lng:101.495214},
{lat:0.561490, lng:101.491952},
{lat:0.560975, lng:101.491094},
{lat:0.560975, lng:101.489034},
{lat:0.560117, lng:101.488347},
{lat:0.559945, lng:101.487317},
{lat:0.555654, lng:101.483026},
{lat:0.555482, lng:101.481137},
{lat:0.557542, lng:101.476846},
{lat:0.557542, lng:101.473241},
{lat:0.556169, lng:101.471353},
{lat:0.554109, lng:101.470838},
{lat:0.552221, lng:101.471181},
{lat:0.549474, lng:101.470838},
{lat:0.547243, lng:101.469293},
{lat:0.546899, lng:101.467748},
{lat:0.549303, lng:101.465345},
{lat:0.551877, lng:101.463456},
{lat:0.555482, lng:101.457791},
{lat:0.557027, lng:101.456590},
{lat:0.557714, lng:101.454358},
{lat:0.556340, lng:101.451440},
{lat:0.556340, lng:101.448865},
{lat:0.555482, lng:101.447492},
{lat:0.552221, lng:101.446118},
{lat:0.550161, lng:101.447320},
{lat:0.548788, lng:101.449723},
{lat:0.548788, lng:101.451783},
{lat:0.550332, lng:101.452985},
{lat:0.550676, lng:101.454015},
{lat:0.550161, lng:101.455045},
{lat:0.547758, lng:101.456933},
{lat:0.543981, lng:101.457276},
{lat:0.542951, lng:101.456418},
{lat:0.542951, lng:101.453328},
{lat:0.543295, lng:101.450925},
{lat:0.542265, lng:101.450067},
{lat:0.539862, lng:101.448007},
{lat:0.540548, lng:101.444230},
{lat:0.541235, lng:101.441999},
{lat:0.541921, lng:101.437020},
];

var sl = [
{lat:0.507256, lng:101.450661},
{lat:0.507814, lng:101.452335},
{lat:0.508715, lng:101.451948},
{lat:0.525389, lng:101.452527},
{lat:0.525174, lng:101.453686},
{lat:0.525046, lng:101.462612},
{lat:0.524874, lng:101.463556},
{lat:0.524831, lng:101.467376},
{lat:0.524187, lng:101.467461},
{lat:0.523501, lng:101.467461},
{lat:0.522986, lng:101.467547},
{lat:0.521183, lng:101.467204},
{lat:0.520711, lng:101.467461},
{lat:0.520153, lng:101.467547},
{lat:0.519553, lng:101.467504},
{lat:0.518437, lng:101.467891},
{lat:0.518222, lng:101.468406},
{lat:0.517480, lng:101.468803},
{lat:0.515957, lng:101.469061},
{lat:0.515249, lng:101.468889},
{lat:0.514712, lng:101.469318},
{lat:0.514026, lng:101.469662},
{lat:0.513876, lng:101.469275},
{lat:0.513854, lng:101.468954},
{lat:0.513897, lng:101.468610},
{lat:0.513425, lng:101.468267},
{lat:0.512352, lng:101.467945},
{lat:0.512073, lng:101.467795},
{lat:0.510893, lng:101.466443},
{lat:0.510743, lng:101.465821},
{lat:0.510593, lng:101.465520},
{lat:0.510206, lng:101.464920},
{lat:0.510164, lng:101.464426},
{lat:0.510056, lng:101.464297},
{lat:0.509777, lng:101.464083},
{lat:0.509691, lng:101.463761},
{lat:0.509391, lng:101.463310},
{lat:0.508104, lng:101.461079},
{lat:0.508018, lng:101.460821},
{lat:0.507996, lng:101.459813},
{lat:0.507760, lng:101.459276},
{lat:0.507868, lng:101.458890},
{lat:0.507632, lng:101.458482},
{lat:0.507417, lng:101.458418},
{lat:0.506709, lng:101.457452},
{lat:0.506580, lng:101.457130},
{lat:0.506301, lng:101.456830},
{lat:0.505958, lng:101.456680},
{lat:0.505829, lng:101.456487},
{lat:0.505443, lng:101.456379},
{lat:0.505379, lng:101.456251},
{lat:0.505293, lng:101.456186},
{lat:0.505164, lng:101.456229},
{lat:0.504606, lng:101.455950},
{lat:0.504435, lng:101.455714},
{lat:0.504456, lng:101.455521},
{lat:0.504306, lng:101.455349},
{lat:0.503769, lng:101.455113},
{lat:0.503254, lng:101.454856},
{lat:0.502439, lng:101.454598},
{lat:0.502010, lng:101.454555},
{lat:0.501752, lng:101.454513},
{lat:0.502074, lng:101.453568},
{lat:0.502975, lng:101.453912},
{lat:0.503254, lng:101.453826},
{lat:0.505422, lng:101.451573},
{lat:0.505851, lng:101.451294},
{lat:0.507245, lng:101.450629},
];

var snp = [
{lat:0.528600, lng:101.427694},
{lat:0.535187, lng:101.427630},
{lat:0.537934, lng:101.427694},
{lat:0.538620, lng:101.427823},
{lat:0.539200, lng:101.427845},
{lat:0.540230, lng:101.428038},
{lat:0.540530, lng:101.428188},
{lat:0.540745, lng:101.428231},
{lat:0.541732, lng:101.428124},
{lat:0.542182, lng:101.428038},
{lat:0.542440, lng:101.428124},
{lat:0.543706, lng:101.428810},
{lat:0.544263, lng:101.429111},
{lat:0.544414, lng:101.429282},
{lat:0.544671, lng:101.429390},
{lat:0.544778, lng:101.429626},
{lat:0.544757, lng:101.429840},
{lat:0.544392, lng:101.431235},
{lat:0.544156, lng:101.431643},
{lat:0.543362, lng:101.432372},
{lat:0.542289, lng:101.433552},
{lat:0.541603, lng:101.434861},
{lat:0.541152, lng:101.436342},
{lat:0.540830, lng:101.437994},
{lat:0.540895, lng:101.438209},
{lat:0.540745, lng:101.438552},
{lat:0.540702, lng:101.439067},
{lat:0.540509, lng:101.441191},
{lat:0.540509, lng:101.442007},
{lat:0.540273, lng:101.442543},
{lat:0.540165, lng:101.443080},
{lat:0.540251, lng:101.443037},
{lat:0.540444, lng:101.442543},
{lat:0.540466, lng:101.442608},
{lat:0.540315, lng:101.443208},
{lat:0.540058, lng:101.443766},
{lat:0.540015, lng:101.443595},
{lat:0.539436, lng:101.444968},
{lat:0.539200, lng:101.445054},
{lat:0.538964, lng:101.445676},
{lat:0.538749, lng:101.446534},
{lat:0.538921, lng:101.447049},
{lat:0.538921, lng:101.447478},
{lat:0.538706, lng:101.447629},
{lat:0.537977, lng:101.447800},
{lat:0.537891, lng:101.447650},
{lat:0.537719, lng:101.447500},
{lat:0.535938, lng:101.447521},
{lat:0.532248, lng:101.447436},
{lat:0.532291, lng:101.442672},
{lat:0.528428, lng:101.442350},
{lat:0.528514, lng:101.434368},
{lat:0.528450, lng:101.434346},
{lat:0.528407, lng:101.433016},
{lat:0.528557, lng:101.433037},
{lat:0.528536, lng:101.431535},
{lat:0.528600, lng:101.431535},
{lat:0.528579, lng:101.430420},
{lat:0.528664, lng:101.430441},
{lat:0.528707, lng:101.430248},
{lat:0.528643, lng:101.430248},
{lat:0.528643, lng:101.429433},
{lat:0.528686, lng:101.429390},
{lat:0.528686, lng:101.428124},
{lat:0.528600, lng:101.428102},
{lat:0.528622, lng:101.427694},
{lat:0.532591, lng:101.427694},
];

var skj = [
{lat:0.504849, lng:101.432676},
{lat:0.511844, lng:101.430380},
{lat:0.512638, lng:101.430337},
{lat:0.513067, lng:101.430230},
{lat:0.513324, lng:101.430315},
{lat:0.513560, lng:101.430509},
{lat:0.515019, lng:101.430938},
{lat:0.515277, lng:101.431131},
{lat:0.517401, lng:101.431367},
{lat:0.518345, lng:101.431496},
{lat:0.518732, lng:101.431646},
{lat:0.519482, lng:101.431753},
{lat:0.520233, lng:101.432011},
{lat:0.520748, lng:101.432311},
{lat:0.521328, lng:101.432225},
{lat:0.521757, lng:101.431882},
{lat:0.522315, lng:101.430659},
{lat:0.522444, lng:101.430294},
{lat:0.523366, lng:101.429886},
{lat:0.523624, lng:101.429564},
{lat:0.524696, lng:101.429092},
{lat:0.525598, lng:101.428127},
{lat:0.526349, lng:101.427805},
{lat:0.527100, lng:101.427741},
{lat:0.528602, lng:101.427676},
{lat:0.528602, lng:101.428105},
{lat:0.528687, lng:101.428127},
{lat:0.528687, lng:101.430444},
{lat:0.528602, lng:101.430444},
{lat:0.528580, lng:101.432998},
{lat:0.528430, lng:101.433041},
{lat:0.528451, lng:101.434350},
{lat:0.528516, lng:101.434350},
{lat:0.528430, lng:101.442353},
{lat:0.522808, lng:101.441988},
{lat:0.522336, lng:101.442139},
{lat:0.518689, lng:101.444478},
{lat:0.518624, lng:101.444606},
{lat:0.518624, lng:101.447331},
{lat:0.514376, lng:101.447331},
{lat:0.513410, lng:101.447632},
{lat:0.510406, lng:101.449112},
{lat:0.504849, lng:101.432676},
{lat:0.511844, lng:101.430380},
];

var pku = [
{lat:0.507211, lng:101.450635},
{lat:0.513326, lng:101.447653},
{lat:0.513626, lng:101.447524},
{lat:0.514356, lng:101.447310},
{lat:0.518583, lng:101.447310},
{lat:0.518626, lng:101.444606},
{lat:0.518712, lng:101.444456},
{lat:0.522381, lng:101.442095},
{lat:0.522853, lng:101.442009},
{lat:0.532272, lng:101.442664},
{lat:0.532272, lng:101.453650},
{lat:0.525277, lng:101.453564},
{lat:0.525363, lng:101.452534},
{lat:0.508670, lng:101.451934},
{lat:0.507897, lng:101.452320},
{lat:0.507254, lng:101.450603},
{lat:0.510601, lng:101.449015},
];

var tmp = [
{lat:0.431950, lng:101.362803},
{lat:0.471431, lng:101.357224},
{lat:0.471517, lng:101.356366},
{lat:0.472118, lng:101.355079},
{lat:0.473234, lng:101.353791},
{lat:0.474521, lng:101.352761},
{lat:0.476924, lng:101.351388},
{lat:0.479671, lng:101.350186},
{lat:0.483018, lng:101.349500},
{lat:0.490571, lng:101.349671},
{lat:0.492717, lng:101.350015},
{lat:0.496407, lng:101.351903},
{lat:0.497952, lng:101.353448},
{lat:0.498724, lng:101.355336},
{lat:0.499411, lng:101.355422},
{lat:0.499497, lng:101.355336},
{lat:0.500441, lng:101.355765},
{lat:0.501557, lng:101.358426},
{lat:0.500269, lng:101.359113},
{lat:0.499583, lng:101.358769},
{lat:0.497695, lng:101.359370},
{lat:0.499411, lng:101.364005},
{lat:0.502844, lng:101.384948},
{lat:0.497437, lng:101.394303},
{lat:0.500699, lng:101.419194},
{lat:0.480357, lng:101.418593},
{lat:0.447056, lng:101.418164},
{lat:0.440619, lng:101.421340},
{lat:0.436242, lng:101.424258},
{lat:0.433667, lng:101.425889},
{lat:0.430491, lng:101.427520},
{lat:0.428861, lng:101.430352},
{lat:0.427659, lng:101.431125},
{lat:0.427659, lng:101.430846},
{lat:0.427487, lng:101.430889},
{lat:0.427144, lng:101.430502},
{lat:0.426672, lng:101.430588},
{lat:0.426372, lng:101.430803},
{lat:0.425985, lng:101.430889},
{lat:0.423453, lng:101.430846},
{lat:0.423368, lng:101.431661},
{lat:0.422381, lng:101.432090},
{lat:0.422037, lng:101.432348},
{lat:0.421694, lng:101.432262},
{lat:0.421394, lng:101.432305},
{lat:0.421093, lng:101.432219},
{lat:0.421093, lng:101.430889},
{lat:0.422209, lng:101.429902},
{lat:0.422552, lng:101.429258},
{lat:0.422724, lng:101.428700},
{lat:0.421694, lng:101.428357},
{lat:0.422080, lng:101.427069},
{lat:0.423711, lng:101.423207},
{lat:0.423797, lng:101.423207},
{lat:0.424183, lng:101.421919},
{lat:0.425299, lng:101.420675},
{lat:0.426286, lng:101.418314},
{lat:0.426972, lng:101.415482},
{lat:0.427015, lng:101.414581},
{lat:0.427487, lng:101.413465},
{lat:0.428517, lng:101.411705},
{lat:0.429075, lng:101.410933},
{lat:0.430105, lng:101.409002},
{lat:0.430920, lng:101.407242},
{lat:0.431822, lng:101.404324},
{lat:0.432036, lng:101.404324},
{lat:0.432508, lng:101.402994},
{lat:0.431650, lng:101.402650},
{lat:0.432422, lng:101.399990},
{lat:0.432465, lng:101.399260},
{lat:0.432980, lng:101.397500},
{lat:0.434783, lng:101.394024},
{lat:0.436456, lng:101.391750},
{lat:0.435555, lng:101.391879},
{lat:0.434568, lng:101.391578},
{lat:0.434482, lng:101.391192},
{lat:0.433195, lng:101.390720},
{lat:0.433023, lng:101.389475},
{lat:0.432809, lng:101.389003},
{lat:0.432895, lng:101.386257},
{lat:0.434182, lng:101.383124},
{lat:0.434397, lng:101.381236},
{lat:0.433495, lng:101.376086},
{lat:0.433409, lng:101.375785},
{lat:0.434525, lng:101.375657},
{lat:0.434568, lng:101.374026},
{lat:0.434311, lng:101.373210},
{lat:0.434654, lng:101.373125},
{lat:0.434010, lng:101.370378},
{lat:0.435426, lng:101.370292},
{lat:0.435341, lng:101.369777},
{lat:0.433409, lng:101.365958},
{lat:0.433066, lng:101.365829},
{lat:0.432680, lng:101.365056},
{lat:0.431993, lng:101.362868},
{lat:0.441134, lng:101.361537},
];


var tr = [
{lat:0.425331, lng:101.566979},
{lat:0.425675, lng:101.560799},
{lat:0.426876, lng:101.558739},
{lat:0.426876, lng:101.556679},
{lat:0.429451, lng:101.555992},
{lat:0.431683, lng:101.554104},
{lat:0.432713, lng:101.551701},
{lat:0.433571, lng:101.545521},
{lat:0.432670, lng:101.539813},
{lat:0.433356, lng:101.539384},
{lat:0.433271, lng:101.536466},
{lat:0.434129, lng:101.529084},
{lat:0.435674, lng:101.527454},
{lat:0.437905, lng:101.527539},
{lat:0.438249, lng:101.526509},
{lat:0.436704, lng:101.525909},
{lat:0.436189, lng:101.524707},
{lat:0.437476, lng:101.521188},
{lat:0.441081, lng:101.515781},
{lat:0.442540, lng:101.515781},
{lat:0.442883, lng:101.510116},
{lat:0.444686, lng:101.506683},
{lat:0.448891, lng:101.502477},
{lat:0.451123, lng:101.498614},
{lat:0.454127, lng:101.494580},
{lat:0.459276, lng:101.490289},
{lat:0.459448, lng:101.489774},
{lat:0.459791, lng:101.489688},
{lat:0.460478, lng:101.490289},
{lat:0.461165, lng:101.490203},
{lat:0.462624, lng:101.489860},
{lat:0.463225, lng:101.488401},
{lat:0.464255, lng:101.488143},
{lat:0.468460, lng:101.488830},
{lat:0.469576, lng:101.488486},
{lat:0.470606, lng:101.488744},
{lat:0.471893, lng:101.487027},
{lat:0.472923, lng:101.486169},
{lat:0.473696, lng:101.485911},
{lat:0.474382, lng:101.486426},
{lat:0.476442, lng:101.485740},
{lat:0.478330, lng:101.485911},
{lat:0.478845, lng:101.485482},
{lat:0.480218, lng:101.485053},
{lat:0.481420, lng:101.482822},
{lat:0.483051, lng:101.481362},
{lat:0.484424, lng:101.480676},
{lat:0.484510, lng:101.480161},
{lat:0.485883, lng:101.479646},
{lat:0.486656, lng:101.479303},
{lat:0.487428, lng:101.478873},
{lat:0.488200, lng:101.477929},
{lat:0.489059, lng:101.477758},
{lat:0.489745, lng:101.477243},
{lat:0.490861, lng:101.477500},
{lat:0.494037, lng:101.478959},
{lat:0.494466, lng:101.479732},
{lat:0.495753, lng:101.480504},
{lat:0.498071, lng:101.480247},
{lat:0.499186, lng:101.480590},
{lat:0.499787, lng:101.481105},
{lat:0.502534, lng:101.481277},
{lat:0.503134, lng:101.481706},
{lat:0.503735, lng:101.481448},
{lat:0.504937, lng:101.480332},
{lat:0.505194, lng:101.479474},
{lat:0.507082, lng:101.478616},
{lat:0.507941, lng:101.477414},
{lat:0.509314, lng:101.474754},
{lat:0.509400, lng:101.473895},
{lat:0.510601, lng:101.473209},
{lat:0.511031, lng:101.472522},
{lat:0.511803, lng:101.472093},
{lat:0.512318, lng:101.471063},
{lat:0.513434, lng:101.470204},
{lat:0.515408, lng:101.468917},
{lat:0.518326, lng:101.468402},
{lat:0.518583, lng:101.467801},
{lat:0.520643, lng:101.467544},
{lat:0.522961, lng:101.467544},
{lat:0.525621, lng:101.467286},
{lat:0.526050, lng:101.467029},
{lat:0.526651, lng:101.467200},
{lat:0.527252, lng:101.468402},
{lat:0.528453, lng:101.468145},
{lat:0.528797, lng:101.468230},
{lat:0.530084, lng:101.468917},
{lat:0.530513, lng:101.468745},
{lat:0.531972, lng:101.467715},
{lat:0.537465, lng:101.468059},
{lat:0.538409, lng:101.467801},
{lat:0.539096, lng:101.468402},
{lat:0.540898, lng:101.468745},
{lat:0.541585, lng:101.468402},
{lat:0.543044, lng:101.468660},
{lat:0.543473, lng:101.469003},
{lat:0.543816, lng:101.468831},
{lat:0.544074, lng:101.468488},
{lat:0.545276, lng:101.468488},
{lat:0.545705, lng:101.468831},
{lat:0.546220, lng:101.469861},
{lat:0.550168, lng:101.472007},
{lat:0.553343, lng:101.472436},
{lat:0.554287, lng:101.472007},
{lat:0.555832, lng:101.472522},
{lat:0.556862, lng:101.474754},
{lat:0.556433, lng:101.476041},
{lat:0.554545, lng:101.479560},
{lat:0.554459, lng:101.481963},
{lat:0.555403, lng:101.484023},
{lat:0.556862, lng:101.485311},
{lat:0.558430, lng:101.489433},
{lat:0.558816, lng:101.489132},
{lat:0.560876, lng:101.491192},
{lat:0.562592, lng:101.494625},
{lat:0.562936, lng:101.498059},
{lat:0.564309, lng:101.500462},
{lat:0.567742, lng:101.502179},
{lat:0.569802, lng:101.503895},
{lat:0.569888, lng:101.506213},
{lat:0.567828, lng:101.515482},
{lat:0.567141, lng:101.516169},
{lat:0.569716, lng:101.519602},
{lat:0.571776, lng:101.520975},
{lat:0.576925, lng:101.521147},
{lat:0.578127, lng:101.522864},
{lat:0.578470, lng:101.525095},
{lat:0.575380, lng:101.530760},
{lat:0.572634, lng:101.534880},
{lat:0.571089, lng:101.537455},
{lat:0.571261, lng:101.541231},
{lat:0.574007, lng:101.543978},
{lat:0.578127, lng:101.546038},
{lat:0.578127, lng:101.547068},
{lat:0.578813, lng:101.546381},
{lat:0.580015, lng:101.547068},
{lat:0.581388, lng:101.550330},
{lat:0.581560, lng:101.555651},
{lat:0.578813, lng:101.561488},
{lat:0.577354, lng:101.569041},
{lat:0.579414, lng:101.571358},
{lat:0.583620, lng:101.569384},
{lat:0.584993, lng:101.566037},
{lat:0.587654, lng:101.563891},
{lat:0.589799, lng:101.563891},
{lat:0.592460, lng:101.566723},
{lat:0.594434, lng:101.571015},
{lat:0.596837, lng:101.577538},
{lat:0.596923, lng:101.578568},
{lat:0.597029, lng:101.578523},
{lat:0.595055, lng:101.578952},
{lat:0.591793, lng:101.580325},
{lat:0.590077, lng:101.581699},
{lat:0.588189, lng:101.581784},
{lat:0.585099, lng:101.584359},
{lat:0.582696, lng:101.584531},
{lat:0.577718, lng:101.585990},
{lat:0.574886, lng:101.585218},
{lat:0.574542, lng:101.583673},
{lat:0.572397, lng:101.581956},
{lat:0.571024, lng:101.579896},
{lat:0.565187, lng:101.580583},
{lat:0.558750, lng:101.581956},
{lat:0.557892, lng:101.581098},
{lat:0.556948, lng:101.579295},
{lat:0.553515, lng:101.577665},
{lat:0.550768, lng:101.575690},
{lat:0.549395, lng:101.576034},
{lat:0.548194, lng:101.575948},
{lat:0.546992, lng:101.576377},
{lat:0.543387, lng:101.577493},
{lat:0.542014, lng:101.579553},
{lat:0.542272, lng:101.581956},
{lat:0.542443, lng:101.585218},
{lat:0.542701, lng:101.586076},
{lat:0.543044, lng:101.586505},
{lat:0.542872, lng:101.587707},
{lat:0.542357, lng:101.588308},
{lat:0.541327, lng:101.588565},
{lat:0.540641, lng:101.588308},
{lat:0.539353, lng:101.588393},
{lat:0.537894, lng:101.589852},
{lat:0.533775, lng:101.592513},
{lat:0.531887, lng:101.592771},
{lat:0.530685, lng:101.591998},
{lat:0.529913, lng:101.590453},
{lat:0.528024, lng:101.588822},
{lat:0.525535, lng:101.588822},
{lat:0.524505, lng:101.589252},
{lat:0.520901, lng:101.589252},
{lat:0.516781, lng:101.587878},
{lat:0.510945, lng:101.585046},
{lat:0.506911, lng:101.582042},
{lat:0.501675, lng:101.582385},
{lat:0.499616, lng:101.581441},
{lat:0.496697, lng:101.579896},
{lat:0.495496, lng:101.579896},
{lat:0.489145, lng:101.583844},
{lat:0.479103, lng:101.587192},
{lat:0.474125, lng:101.588565},
{lat:0.471979, lng:101.585647},
{lat:0.472237, lng:101.580926},
{lat:0.473009, lng:101.577235},
{lat:0.472580, lng:101.572257},
{lat:0.470863, lng:101.570197},
{lat:0.468718, lng:101.569081},
{lat:0.460993, lng:101.570712},
{lat:0.454813, lng:101.573802},
{lat:0.453526, lng:101.570970},
{lat:0.450951, lng:101.569511},
{lat:0.447432, lng:101.566592},
{lat:0.440566, lng:101.570026},
{lat:0.436704, lng:101.569940},
{lat:0.435073, lng:101.568824},
{lat:0.434043, lng:101.567021},
{lat:0.430953, lng:101.566507},
{lat:0.429237, lng:101.568051},
{lat:0.427263, lng:101.567794},
{lat:0.425374, lng:101.567021},
];

		
		  // Construct the polygon.
        var polygon = new google.maps.Polygon({
          paths: br,
          strokeColor: 'red',
          strokeOpacity: 1,
          strokeWeight: 1,
          fillColor: 'blue',
          fillOpacity: 0.2
        });
        polygon.setMap(map);
          
        var polygon = new google.maps.Polygon({
          paths: lp,
          strokeColor: 'red',
          strokeOpacity: 1,
          strokeWeight: 1,
          fillColor: 'red',
          fillOpacity: 0.2
        });
        polygon.setMap(map);
          
        var polygon = new google.maps.Polygon({
          paths: md,
          strokeColor: 'red',
          strokeOpacity: 1,
          strokeWeight: 1,
          fillColor: 'yellow',
          fillOpacity: 0.2
        });
        polygon.setMap(map);
          
        var polygon = new google.maps.Polygon({
          paths: ps,
          strokeColor: 'red',
          strokeOpacity: 1,
          strokeWeight: 1,
          fillColor: 'green',
          fillOpacity: 0.2
        });
        polygon.setMap(map);
          
          var polygon = new google.maps.Polygon({
          paths: pku,
          strokeColor: 'red',
          strokeOpacity: 1,
          strokeWeight: 1,
          fillColor: 'black',
          fillOpacity: 0.2
        });
        polygon.setMap(map);
          
        var polygon = new google.maps.Polygon({
          paths: rm,
          strokeColor: 'red',
          strokeOpacity: 1,
          strokeWeight: 1,
          fillColor: 'orange',
          fillOpacity: 0.2
        });
        polygon.setMap(map);
          
        var polygon = new google.maps.Polygon({
          paths: rp,
          strokeColor: 'red',
          strokeOpacity: 1,
          strokeWeight: 1,
          fillColor: 'purple',
          fillOpacity: 0.2
        });
        polygon.setMap(map);
          
        var polygon = new google.maps.Polygon({
          paths: sl,
          strokeColor: 'red',
          strokeOpacity: 1,
          strokeWeight: 1,
          fillColor: 'orange',
          fillOpacity: 0.2
        });
        polygon.setMap(map);
          
        var polygon = new google.maps.Polygon({
          paths: snp,
          strokeColor: 'red',
          strokeOpacity: 1,
          strokeWeight: 1,
          fillColor: 'pink',
          fillOpacity: 0.3
        });
        polygon.setMap(map);
          
        var polygon = new google.maps.Polygon({
          paths: skj,
          strokeColor: 'red',
          strokeOpacity: 1,
          strokeWeight: 1,
          fillColor: '#607d8b',
          fillOpacity: 0.2
        });
        polygon.setMap(map);
          
        var polygon = new google.maps.Polygon({
          paths: tmp,
          strokeColor: 'red',
          strokeOpacity: 1,
          strokeWeight: 1,
          fillColor: '#e91e63',
          fillOpacity: 0.2
        });
        polygon.setMap(map);
          
        var polygon = new google.maps.Polygon({
          paths: tr,
          strokeColor: 'red',
          strokeOpacity: 1,
          strokeWeight: 1,
          fillColor: 'gray',
          fillOpacity: 0.2
        });
        polygon.setMap(map);
		
<?php 
  while($data = mysql_fetch_array($result)){
	  	$kategori = $data['kategori'];
	  	$nama = $data['nama'];
	  	$lat = $data['lat'];
	  	$lon = $data['lng'];
	  	$add=$data['alamat'];
	  	$id=$data['id_puskes'];
	  	$gmb=$data['gambar'];
		
	if($kategori=='Rumah Sakit'){
		echo("addMarker1($lat, $lon, '<div><p><img src=../../pulas_new/assets/img/$gmb style=width:25%;float:left;margin-right:10px;><h5>$kategori  $nama</h5> $add</p><a href=../info/?detailD=$id>Detail</a></div>')\n");}
	
	elseif ($kategori=='Puskesmas'){
		echo("addMarker2($lat, $lon, '<div><div><p><img src=../../pulas_new/assets/img/$gmb style=width:25%;float:left;margin-right:10px;><h5>$kategori  $nama</h5> $add</p><a href=../info/?detailD=$id>Detail</a></div>')\n");}
		
	else{
		echo("addMarker3($lat, $lon, '<div><p><img src=../../pulas_new/assets/img/$gmb style=width:25%;float:left;margin-right:10px;><h5>$kategori  $nama</h5> $add</p><a href=../info/?detailD=$id>Detail</a></div>')\n");}}
		
?> 
      function addMarker1(lat, lng, info){ 
        var lokasi = new google.maps.LatLng(lat, lng); 
        //bounds.extend(lokasi);  
        var marker = new google.maps.Marker({ 
          map: map, 
          position: lokasi, 
          icon: '<?php echo '../assets/img/A.png';?>' 
        }); 
        //map.fitBounds(bounds); 
        bindInfoWindow(marker, map, infoWindow, info); 
      }
      function addMarker2(lat, lng, info){ 
        var lokasi = new google.maps.LatLng(lat, lng); 
        //bounds.extend(lokasi); 
        var marker = new google.maps.Marker({ 
          map: map, 
          position: lokasi, 
          icon: '<?php echo '../assets/img/AA.png';?>' 
        }); 
        //map.fitBounds(bounds); 
        bindInfoWindow(marker, map, infoWindow, info); 
      } 
      function addMarker3(lat, lng, info){ 
        var lokasi = new google.maps.LatLng(lat, lng); 
        //bounds.extend(lokasi); 
        var marker = new google.maps.Marker({ 
          map: map, 
          position: lokasi, 
          icon: '<?php echo '../assets/img/AAA.png';?>' 
        }); 
        //map.fitBounds(bounds); 
        bindInfoWindow(marker, map, infoWindow, info); 
      } 
      function bindInfoWindow(marker, map, infoWindow, html){ 
        google.maps.event.addListener(marker, 'click', function(){ 
          infoWindow.setContent(html); 
          infoWindow.open(map, marker); 
        }); 
      } 
    }
    google.maps.event.addDomListener(window, 'load', initialize);
  </script>
  
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-ZCNbmY_gNDxYYOzJgVdkC2e4XVLfbVo&sensor=true&language=id&callback=initialize"></script>
  
<?php
  }else{echo "";}if(mysql_num_rows($result)>0){
  while(($count<$rpp)&&($i<$tcount)){mysql_data_seek($result, $i);$data = mysql_fetch_array($result);
?>
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="col-md-6 col-sm-6 col-xs-6"><h4> <?php echo $data ['kategori']; ?> <?php echo $data ['nama']; ?></h4></div>
                <div class="col-md-6 col-sm-6 col-xs-6" align="right"><a class="btn btn-primary" href="../info/?detail=<?php echo $data['nama'];?>" data-toggle="tooltip" title="Detail"><i class="fa fa-external-link"></i>&nbsp;&nbsp;Detail</a></div>
                <hr class="bottom-line" style="margin-top: 50px; width: 96%;">
                <div class="col-md-4 col-sm-4 col-xs-4">
				
<?php
	  if(empty($data['gambar'] )){
?>
      <img src="../../pulas_new/assets/img/www.png" width="100%">
<?php
	  }else {
?>
      <img src="../../pulas_new/assets/img/<?php echo $data['gambar'];?>" width="100%">
<?php
}
?>
                </div>
               <div class="col-md-8 col-sm-8 col-xs-8">
                  <div class="col-md-2 col-sm-5 col-xs-5" style="margin-bottom: 10px;">Alamat</div>
                  <div class="col-md-1 col-sm-1 col-xs-1" style="margin-bottom: 10px;"> : </div>
                  <div class="col-md-8 col-sm-4 col-xs-4" style="margin-bottom: 10px;"><?php echo $data ['alamat']; ?></div>
                  <div class="col-md-2 col-sm-5 col-xs-5" style="margin-bottom: 10px;">Jenis</div>
                  <div class="col-md-1 col-sm-1 col-xs-1" style="margin-bottom: 10px;"> : </div>
                  <div class="col-md-8 col-sm-4 col-xs-4" style="margin-bottom: 10px;"><?php echo $data ['jenis']; ?></div> 
                </div>
              </div>
            </div>
<?php
  $i++;$count++;}}else{
?>
           <div class="panel panel-default">
              <div class="panel-body" align="center">
                <h4>Data Tidak Ditemukan</h4>
              </div>
            </div>
<?php
  }
?>          
          </div>
          <div class="col-md-4 col-sm-4"></div>
          <div class="col-md-8 col-sm-8" align="center">
<?php 
  echo paginate_three($reload, $page, $tpages, $adjacents); 
?>
          </div>
        </div>
      </div>
    </section>
    <!--/ Pricing-->
    <!--Footer-->
    <footer id="footer" class="footer">
      <div class="container text-center">
        © 2017 PULAS. All rights reserved
      </div>
    </footer>
    <!--/ Footer-->
  </body>
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/jquery.easing.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/custom.js"></script>
</html>