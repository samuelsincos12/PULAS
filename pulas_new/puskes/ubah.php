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
                         <h4 class="modal-title" style="text-align: center;">Edit Pusat Kesehatan</h4>
                    </div><br/><br/>
                    <div class="col-md-12 col-sm-12 col-xs-12"><br></div>
                    
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <form action="ubah.act" method="post" enctype="multipart/form-data">
                        <input name="uid" type="hidden" class="form-control" value="<?php echo $d['id_puskes'];?>">
                    <div class="form-group">
                        <label>Nama Pusat Kesehatan</label>
                        <input name="unama" type="text" class="form-control" value="<?php echo $d['nama'];?>">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="ukategori">
                        	<option value="">Pilih Kategori</option>
                            <option <?php if($d['kategori']== "Rumah Sakit"){echo "selected"; }?> value="Rumah Sakit">Rumah Sakit</option>
                            <option <?php if($d['kategori']== "Puskesmas"){echo "selected"; }?> value="Puskesmas">Puskesmas</option>
                            <option <?php if($d['kategori']== "Klinik"){echo "selected"; }?> value="Klinik">Klinik</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jenis</label>
                        <select class="form-control" name="ujenis">
                            <option value="">Pilih Jenis</option>
                            <optgroup label="Rumah Sakit">
                                <option <?php if($d['jenis']== "RSUD"){echo "selected"; }?>  value="RSUD">RSUD</option>
                            <option <?php if($d['jenis']== "Swasta"){echo "selected"; }?> value="Swasta">Swasta</option>
                            </optgroup>
                            <optgroup label="Puskesmas">
                                <option <?php if($d['jenis']=="Rawat Inap"){echo "selected";}?> value="Rawat Inap">Rawat Inap</option>
                                <option <?php if($d['jenis']=="Non Rawat Inap"){echo "selected";}?> value="Non Rawat Inap">Non Rawat Inap</option>
                            </optgroup>
                            <optgroup label="Klinik">
                                <option <?php if($d['jenis']== "Pratama"){echo "selected"; }?> value="Pratama">Pratama</option>
                                <option <?php if($d['jenis']== "Utama"){echo "selected"; }?> value="Utama">Utama</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="uemail" type="email" class="form-control" value="<?php echo $d['email'];?>">
                    </div>  
                    <div class="form-group">
                        <label>Alamat</label>
                        <input name="ualamat" type="text" class="form-control" value="<?php echo $d['alamat'];?>">
                    </div>  
                    <div class="form-group">
                        <label>Telepon</label>
                        <input name="utelepon" type="text" class="form-control" value="<?php echo $d['telp'];?>">
                    </div>
                    <div class="form-group">
                        <label>Latitude</label>
                        <input name="ulat" type="text" class="form-control" id="lat" value="<?php echo $d['lat'];?>">
                    </div>
                    <div class="form-group">
                        <label>Longitude</label>
                        <input name="ulong" type="text" class="form-control" id="long" value="<?php echo $d['lng'];?>">
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
                        <input name="ugambar" type="file" size="30"/><br/>
						<img src="../assets/img/<?php echo $d['gambar']; ?>" width="250">
                    </div>
                    <div class="form-group">
                        <label>Kecamatan</label>
                        <select class="form-control" name="ukecamatan">
                                <?php 
                                $brg=mysql_query("select * from kecamatan");
                                while($b=mysql_fetch_array($brg)){
                                    ?>  
                                    <option <?php if($d['id_kecamatan']==$b['id_kecamatan']){echo "selected"; }?> value="<?php echo $b['id_kecamatan']; ?>"><?php echo $b['nama'] ?></option>
                                    <?php 
                                }
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
                    <label>Edit Koordinat</label>
                        <div class="panel panel-default">
                            <div id="map" style="height: 900px;"></div>
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