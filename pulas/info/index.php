<?php
  include '../func/koneksi.php';
  include '../func/em.php';

  $whr="";
  if(isset($_GET['detail'])){
    $v=$_GET['detail'];
    if(empty($whr)){
      $whr.="p.nama = '$v'";
    } else {
      $whr.="";
    }
  }
  if(isset($_GET['detailD'])){
    $v=$_GET['detailD'];
    if(empty($whr)){
      $whr.="p.id_puskes = '$v'";
    } else {
      $whr.="";
    }
  }
  $det=inf($whr);
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
            <h2>Detail Penelusuran</h2>
          </div>
<?php 
  while($d=mysqli_fetch_array($det)){
?>
          <div class="col-md-4 col-sm-4">
            <div class="panel panel-default">
              <div class="panel-body">
                  <div id="left-panel" class="col-md-12 col-sm-12" align="center" style="margin-bottom: 30px;">
                    <h4>Petunjuk Arah</h4>
                  </div>
              </div>
            </div>
          </div>
        <div class="col-md-8 col-sm-8">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="col-md-12 col-sm-12">
                  <div id="map" style="height: 400px;"></div>
                </div><hr class="bottom-line" style="width: 96%;">
                <div class="col-md-12 col-sm-12" style="margin-bottom: 30px;">
                  <h3 style="margin-left: 20px;"><?php echo $d['kategori'];?> <?php echo $d['nama'];?></h3>
                </div><hr class="bottom-line" style="width: 96%;">
                <div class="col-md-12 col-sm-12">
                  <div class="col-md_6 col-sm-6">
<?php
  if(empty($d['gambar'])){
 ?> 
    <img src="../../pulas_new/assets/img/www.png" width="100%">
 <?php
  }else{
 ?>
    <img src="../../pulas_new/assets/img/<?php echo $d['gambar'];?>" width="100%">
 <?php
  }
 ?> 
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <h4>Spesialis</h4>
                    <p>
                    
  
<?php
  if(empty($d['id_spesialis'])){
    echo "-";
  } else {
    $sql2 = "SELECT * FROM  spesialis where id_spesialis in($d[id_spesialis])";
    $query2 = mysqli_query($cn, $sql2);
    $arrayspesialis = array();
    while($data2 = mysqli_fetch_array($query2)){
      $arrayspesialis[] = $data2['jenis_spesialis'];
    }
    $vb = implode(',', $arrayspesialis);
    $a=explode(",", $vb);
    for($i=0;$i<count($a);$i++){
      echo "Dokter ".$a[$i].", ";
    }
  }
?>
                    </p>
                  </div>
                  </div>
                <div class="col-md-12 col-sm-12">
                  <div class="col-md-8 col-sm-9 col-xs-9">
                    <h4>Lokasi</h4>
                    <p><?php echo $d['alamat'];?></p>
                    <p>Kec. 
<?php 
  $brg=mysqli_query($cn, "select * from kecamatan");while($b=mysqli_fetch_array($brg)){if($d['id_kecamatan']==$b['id_kecamatan']){echo $b['nama'];}}
?>
                    </p>
                  </div>
                  <div class="col-md-4 col-sm-3 col-xs-3">
                    <h4>Jenis <?php echo $d['kategori'];?></h4>
                    <p><?php echo $d['jenis'];?></p>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <h4>Kontak</h4>
                    <p><i class="fa fa-phone"></i>&nbsp;&nbsp;<?php if(empty($d['telp'])){echo "-";}else{echo $d['telp'];}?></p>
                    <p><i class="fa fa-envelope"></i>&nbsp;&nbsp;<?php if(empty($d['email'])){echo "-";}else{echo $d['email'];}?></p>
                  </div>
                  </div>
                </div>
              </div>
            </div>
              <div class="col-md-12 col-sm-12" align="center">
            <a class="btn btn-primary" href="../cari"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
          </div>         
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
  <script>
    //var marker;
    function initialize(){ 
      var directionsDisplay = new google.maps.DirectionsRenderer;
      var directionsService = new google.maps.DirectionsService;
      map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 0.5086443, lng: 101.4432126}, 
          zoom: 6
        });
        infoWindow = new google.maps.InfoWindow;
        // Try HTML5 geolocation.
        if (navigator.geolocation) { navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            map.setCenter(pos);
        
            directionsDisplay.setMap(map);
            directionsDisplay.setPanel(document.getElementById('left-panel'));
                                
            var i = pos.lat;  
            var k = pos.lng;
                                          
            var start = i + "," + k;
            var end = '<?php echo $d['lat']; ?>, <?php echo $d['lng']; ?>';
            directionsService.route({
              origin: start,
              destination: end,
              provideRouteAlternatives:true,
              travelMode: 'DRIVING'
            }, function(response, status) {
                  if (status === 'OK') {
                      directionsDisplay.setDirections(response);
                  } else {
                      window.alert('Directions request failed due to ' + status);
                  }
              });
            var trafficLayer = new google.maps.TrafficLayer();
            trafficLayer.setMap(map);
          }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
              });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
          }
      }
      
      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
              infoWindow.setPosition(pos);
              infoWindow.setContent(browserHasGeolocation ? 'Error: The Geolocation service failed.' : 'Error: Your browser doesn\'t support geolocation.');
              infoWindow.open(map);
      }
    </script>
<?php
  }
?>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWFboeyMxawu1MRunyz8OIQBAk_jxzkhw&sensor=true&language=id&callback=initialize"></script>
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/jquery.easing.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/custom.js"></script>
</html>