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
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                         <h4 class="modal-title" style="text-align: center;">Tambah Pusat Kesehatan</h4>
                    </div><br/><br/>
                    <div class="col-md-12 col-sm-12 col-xs-12"><br></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <form action="tambah.act" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Pusat Kesehatan</label>
                        <input name="unama" type="text" class="form-control" placeholder="Nama Tempat Layanan">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="ukategori">
                            <option value="">Pilih Kategori</option>
                            <option value="Rumah Sakit">Rumah Sakit</option>
                            <option value="Puskesmas">Puskesmas</option>
                            <option value="Klinik">Klinik</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jenis</label>
                        <select class="form-control" name="ujenis">
                            <option value="">Pilih Jenis</option>
                            <optgroup label="Rumah sakit">
                                <option value="RSUD">RSUD</option>
                                <option value="Swasta">Swasta</option>
                            </optgroup>
                            <optgroup label="Puskesmas">
                                <option value="Rawat Inap">Rawat Inap</option>
                                <option value="Non Rawat Inap">Non Rawat Inap</option>
                            </optgroup>
                            <optgroup label="Klinik">
                                <option value="Pratama">Pratama</option>
                                <option value="Utama">Utama</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="uemail" type="email" class="form-control" placeholder="Email">
                    </div>  
                    <div class="form-group">
                        <label>Alamat</label>
                        <input name="ualamat" type="text" class="form-control" placeholder="Alamat">
                    </div>  
                    <div class="form-group">
                        <label>Telepon</label>
                        <input name="utelepon" type="text" class="form-control" placeholder="Telepon">
                    </div>
                    <div id="maps">
                        <div class="form-group">
                            <label>Latitude</label>
                            <input name="ulat" type="text" class="form-control" id="long" value="">
                        </div>
                        <div class="form-group">
                            <label>Longitude</label>
                            <input name="ulong" type="text" class="form-control" id="lat" value="">
                        </div>
                    </div>
<script type="text/javascript">
    var map;
    var marker = false; 
    function initialize(){
        var centerOfMap = new google.maps.LatLng(0.506581, 101.445293);
        var options = {
          center: centerOfMap,
          zoom: 12
        };
        map = new google.maps.Map(document.getElementById('map'), options);
        google.maps.event.addListener(map, 'click', function(event) {                
            var clickedLocation = event.latLng;
            if(marker === false){
                marker = new google.maps.Marker({
                    position: clickedLocation,
                    map: map,
                    draggable: true
                });
                google.maps.event.addListener(marker, 'dragend', function(event){
                    markerLocation();
                });
            }else{
                marker.setPosition(clickedLocation);
            }
            markerLocation();
        });
    }
        
    function markerLocation(){
        var currentLocation = marker.getPosition();
        document.getElementById('lat').value = currentLocation.lat(); 
        document.getElementById('long').value = currentLocation.lng(); 
    }
        
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input name="ugambar" type="file"  placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Kecamatan</label>
                        <select class="form-control" name="ukecamatan">
                            <option value="">Pilih Kecamatan</option>
                                <?php 
                                $brg=mysql_query("select * from kecamatan");
                                while($b=mysql_fetch_array($brg)){
                                    ?>  
                                    <option value="<?php echo $b['id_kecamatan']; ?>"><?php echo $b['nama'] ?></option>
                                    <?php 
                                }
                                ?>
                            </select>
                    </div>                                                                  
                <div class="form-group" style="text-align: center;">
                                <a href="../puskes" class="btn btn-default">Batal</a>&nbsp;&nbsp;&nbsp;
                                <input type="submit" class="btn btn-primary" value="Simpan">
                            </div>
            </form>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                    <label>Tambah Koordinat</label>
                        <div class="panel panel-default">
                            <div id="map" style="height: 700px;"></div>
                        </div>
                    </div>
                    <!--  end  Context Classes  -->
              </div>
                <!-- /. ROW  -->
        </div>
    </div>
             <!-- /. PAGE INNER  -->
<?php
    require '../footer.php';
?>