<?php
    require '../header.php';
?> 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Data Pusat Kesehatan</h2>   
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
<?php
$id_tempat=mysql_real_escape_string($_GET['id']);

$det=mysql_query("select * from puskes where id_puskes='$id_tempat'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                    </div><br/><br/>
                    <div class="col-md-4 col-sm-12 col-xs-12"></div>
                    <div class="col-md-12 col-sm-12 col-xs-12">           
                        <div class="panel panel-back noti-box">
                            <div id="map-canvas" style="height: 400px;"></div>
                        </div>
                    </div>
<script>
    var marker;
    function initialize() {
      var infoWindow = new google.maps.InfoWindow;
      var mapOptions = {
        mapTypeId: google.maps.MapTypeId.ROADMAP
      } 
      var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
      var bounds = new google.maps.LatLngBounds();
<?php
  $kategori=$d['kategori'];$nama=$d['nama'];$lat=$d['lat'];$lon=$d['lng'];if ($kategori=='Rumah Sakit'){echo ("addMarker1($lat, $lon, '<b>$nama</b>');\n");}elseif($kategori=='Puskesmas'){echo ("addMarker2($lat, $lon, '<b>$nama</b>');\n");}else{echo ("addMarker3($lat, $lon, '<b>$nama</b>');\n");}                  
?> 
    function addMarker1(lat, lng, info) {
      var lokasi = new google.maps.LatLng(lat, lng);
      bounds.extend(lokasi);
      var marker = new google.maps.Marker({
        map: map,
        position: lokasi,
        icon: '<?php echo '../assets/img/A.png';?>'
      });       
      map.fitBounds(bounds);
      bindInfoWindow(marker, map, infoWindow, info);
     }

     function addMarker2(lat, lng, info) {
      var lokasi = new google.maps.LatLng(lat, lng);
      bounds.extend(lokasi);
      var marker = new google.maps.Marker({
        map: map,
        position: lokasi,
        icon: '<?php echo '../assets/img/AA.png';?>'
      });       
      map.fitBounds(bounds);
      bindInfoWindow(marker, map, infoWindow, info);
     }

     function addMarker3(lat, lng, info) {
      var lokasi = new google.maps.LatLng(lat, lng);
      bounds.extend(lokasi);
      var marker = new google.maps.Marker({
        map: map,
        position: lokasi,
        icon: '<?php echo '../assets/img/AAA.png';?>'
      });       
      map.fitBounds(bounds);
      bindInfoWindow(marker, map, infoWindow, info);
     }
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }
 
        }
      google.maps.event.addDomListener(window, 'load', initialize);
  </script>
  <div class="col-md-12 col-sm-12 col-xs-12">
&nbsp; <label>Alamat : </label>  <?php echo $d['alamat'];?></div></br>
<div class="col-md-12 col-sm-12 col-xs-12">
&nbsp; <label>kec : </label>  
<?php 
    $idkec=$d['id_kecamatan'];
    $deta=mysql_query("select * from kecamatan where id_kecamatan='$idkec'")or die(mysql_error());
    while($f=mysql_fetch_array($deta)){
        echo $f['nama'];
    }
?>
</div> </div></br></br></br>

                     
                    <div class="col-md-7 col-md-offset-5">
                         <a href="../puskes" style="margin-bottom:20px;" class="btn btn-primary col-md-2"><i class="fa fa-arrow-left"></i>  Kembali </a>
                    </div>
             </div>
                    <!--  end  Context Classes  -->
               
                <!-- /. ROW  -->
<?php
}
?>
        </div>
    </div>
             <!-- /. PAGE INNER  -->
<?php
    require '../footer.php';
?>