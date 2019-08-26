<?php
    require '../header.php';
?> 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Data Spesialis Pusat Kesehatan</h2>   
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
<?php
$id_speskes=mysql_real_escape_string($_GET['id']);
$det=mysql_query("select * from spesialis_puskes where id_puskes='$id_speskes'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>
            <div class="row">
              <div class="col-md-12">
                  <div class="col-md-12">
                         <h4 class="modal-title" style="text-align: center;">Edit Spesialis Pusat Kesehatan</h4>
                    </div><br/><br/>
                    
                    <div class="col-md-8 col-md-offset-2">
                        <form action="ubah.act" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                                <label>Nama Pusat Kesehatan</label>
                        <select class="form-control" name="upuskes">
                            <option value="">Pilih Pusat Kesehatan</option>
                                <?php 
                                $brg=mysql_query("select * from puskes");
                                while($b=mysql_fetch_array($brg)){
                                    ?>  
                                    <option value="<?php echo $b['id_puskes']; ?>"><?php echo $b['kategori']?> <?php echo $b['nama'] ?></option>
									<option <?php if($d['id_puskes']==$b['id_puskes']){echo "selected"; }?> value="<?php echo $b['id_puskes']; ?>"><?php echo $b['nama'] ?></option>
                                    <?php 
                                }
                                ?>
                            </select>
							</br>
                    </div>
                    
                    <div class="form-group">
                        <label>Spesialis</label>
                        <table width="100%">
                            <tr>
                        <?php
                            $xc = explode(",", $d['id_spesialis']);
                            $brg=mysql_query("select id_spesialis, jenis_spesialis from spesialis");
                                $kl=2;$br=0;
                                while($b=mysql_fetch_array($brg)){
                                    if($br>=$kl){
                                        echo "</tr><tr>";$br=0;
                                    }
                                    $br++;
                        ?>  
							<td>
                            <div>
                            <input type="checkbox" name="uspesialis[]" value="<?php echo $b['id_spesialis'];?>" <?php if(in_array($b['id_spesialis'], $xc)) echo 'checked'; ?>>Dokter <?php echo $b['jenis_spesialis'];?>
                            </div>
                            </td>
                        <?php }}?>
                        
                        </td>
                            </tr></table></br>
                    </div>                                                                 
                <div class="form-group" style="text-align: center;">
                                <a href="../spes_puskes" class="btn btn-default">Batal</a>&nbsp;&nbsp;&nbsp;
                                <input type="submit" class="btn btn-primary" value="Simpan">
                            </div>
            </form>
                    </div>
                  
             </div>
                <!-- /. ROW  -->
        </div>
    </div>
             <!-- /. PAGE INNER  -->
<?php
    require '../footer.php';
?>