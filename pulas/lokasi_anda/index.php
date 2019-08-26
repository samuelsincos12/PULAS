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

	if(empty($t)) { $result = sin1(); } 
  else { $result = sin2($whr); }

	$tcount=mysqli_num_rows($result);
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
            <li><a href="../lokasi_anda" data-toggle="tooltip" title="Terdekat"><i class="fa fa-search"></i>&nbsp; Terdekat</a></li>
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
            <h2>Penelusuran Pusat Layanan Kesehatan Terdekat</h2>
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
        <div class="col-md-12 col-sm-12">
<?php
  if(mysqli_num_rows($result)>0){
?>
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div id="map" style="height: 450px;"></div>
                  <div style="text-align: right; margin-top: 7px;">
                    <img src="../assets/img/A.png" height="25px"> Rumah Sakit &nbsp;&nbsp; 
                    <img src="../assets/img/AA.png" height="25px"> Puskesmas &nbsp;&nbsp;
                    <img src="../assets/img/AAA.png" height="25px"> Klinik &nbsp;&nbsp;
                  </div>
                </div>
              </div>
          </div>
  <script>
    function initialize(){ 
      var map,coordinate,marker,markerme,infowindow,content,coordinatme;
      infowindow = new google.maps.InfoWindow();

      var start_point = new google.maps.LatLng(0.5086443, 101.4432126);
      var mapOptions = {
        center: start_point,
        zoom: 13, 
        mapTypeId: google.maps.MapTypeId.ROADMAP 
      }

      map = new google.maps.Map(document.getElementById('map'), mapOptions);

      if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            //map.setCenter(pos);
            var i = pos.lat;  
            var k = pos.lng;
            var idank = i + "," + k;
            var radius = 2000;
               
            coordinatme = {lat: i, lng: k};
            markerme = new google.maps.Marker({
                position: coordinatme,
                map: map,
                title: 'Lokasi Saya'
            });
<?php 
  while($data = mysqli_fetch_array($result)) {
      $kategori = $data['kategori'];
      $nama = $data['nama'];
      $lat = $data['lat'];
      $lon = $data['lng'];
      $add=$data['alamat'];
      $id=$data['id_puskes'];
      $gmb=$data['gambar'];
?>
<?php
      if ($kategori == "Rumah Sakit") {
?>
          var image = "../assets/img/A.png";
<?php
      } elseif ($kategori == "Puskesmas") {
?>
        var image = "../assets/img/AA.png";
<?php
      } else {
?>
        var image = "../assets/img/AAA.png";
<?php
      }
?>
            var distance = Math.floor(google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(i, k), new google.maps.LatLng(<?php echo $lat;?>,  <?php echo $lon; ?>)));  

            if(distance <= radius) {
              
              content = "<div><p><img src=../../pulas_new/assets/img/<?php echo $gmb;?> style=width:25%;float:left;margin-right:10px;><h5><?php echo $kategori; echo $nama;?></h5><?php echo $add; ?></p><a href=../info/?detailD=<?php echo $id;?>>Detail</a></div>";

              coordinate = {lat: <?php echo $lat; ?>, lng: <?php echo $lon; ?>};
              marker = new google.maps.Marker({
                    position: coordinate,
                    map: map,
                    icon: image
              });

              google.maps.event.addListener(marker,'click', (function(marker,content,infowindow) {
                  return function() {
                    infowindow.setContent(content);
                    infowindow.open(map,marker);
                  };
              })(marker,content,infowindow));
            }
<?php }?>
          }, function(){
              handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            handleLocationError(false, infoWindow, map.getCenter());
        }
      }
    //google.maps.event.addDomListener(window, 'load', initialize);
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWFboeyMxawu1MRunyz8OIQBAk_jxzkhw&sensor=true&language=id&callback=initialize&v=3&libraries=geometry"></script>
  
<?php
  } else {
    echo "";
  }
?>
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