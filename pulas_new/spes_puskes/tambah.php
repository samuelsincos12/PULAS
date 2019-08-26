<?php
    require '../header.php';
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Data Spesialis Pusat kesehatan</h2>   
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                         <h4 class="modal-title" style="text-align: center;">Tambah Data</h4>
                    </div><br/><br/></br>
                    <div class="col-md-8 col-md-offset-2">
                        <form action="tambah.act" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Pusat Kesehatan</label>
                        <select class="form-control" name="upuskes">
                            <option value="">Pilih Pusat Kesehatan</option>
                                <?php 
                                $brg=mysql_query("select * from puskes");
                                while($b=mysql_fetch_array($brg)){
                                    ?>  
                                    <option value="<?php echo $b['id_puskes']; ?>"><?php echo $b['kategori']?> <?php echo $b['nama'] ?></option>
                                    <?php 
                                }
                                ?>
                            </select>
							</br>
								<div class="form-group">
                        <label>Spesialis</label>
                        <table width="100%">
                            <tr>
                        <?php
                            $brg=mysql_query("select * from spesialis");
                                $no=100;
                                $kl=2;$br=0;
                                while($b=mysql_fetch_array($brg)){
                                    if($br>=$kl){
                                        echo "</tr><tr>";$br=0;
                                    }
                                    $br++;

                        ?>  
                            <td>
                            <div class="">
                            <input id="checkbox<?php echo $b['id_spesialis'];?>" type="checkbox" name="uspesialis[]" value="<?php echo $b['id_spesialis']?>">
                            <label style="font-weight: normal;" for="checkbox <?php echo $no;?>">Dokter <?php echo $b['jenis_spesialis']?></label>
                            </div>
                            </td>
                        <?php $no++; }?>
                            </tr>
                        </table>
                    </div></br>
                            <div class="form-group" style="text-align: center;">
                                <a href="../spes_puskes" class="btn btn-default">Batal</a>&nbsp;&nbsp;&nbsp;
                                <input type="submit" class="btn btn-primary" value="Simpan">
                            </div>                                                             
                        </form>
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