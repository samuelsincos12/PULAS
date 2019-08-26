<?php  
    require '../header.php';
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Data Pusat Kesehatan</h2>
                        <!-- .row -->
                        <hr />
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="white-box">
                                    <a href="tambah" style="margin-bottom:20px" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp;&nbsp; Tambah Pusat Kesehatan </a>
 <?php 
    include '../func/pagination3.php';
	$page=isset($_GET['page']) ? intval($_GET['page']) : 1;
	$adjacents=isset($_GET['adjacents']) ? intval($_GET['adjacents']) : 3;
	$rpp=5;$whr="";
	if(isset($_GET['cari'])){
	$q=$_GET['cari'];
	if(empty($whr)){
	$whr.="nama LIKE '%$q%' OR kategori LIKE '%$q%' OR jenis LIKE '%$q%' OR alamat LIKE '%$q%' OR id_kecamatan LIKE '%$q%'";}}
	$t="";
	if(isset($_GET['cari'])){
	$rt=$_GET['cari'];
	if(empty($t)){
	$t.="cari=$rt";}}
	if(empty($t)){
	$sql="SELECT * FROM puskes ORDER BY id_puskes DESC";}else{$sql="SELECT * FROM puskes WHERE ".$whr." ORDER BY id_puskes DESC";}
	$result=mysql_query($sql);
	$tcount=mysql_num_rows($result);$tpages=isset($tcount) ? ceil($tcount/$rpp) : 1;$count=0;$i=($page-1)*$rpp;$no_urut=($page-1)*$rpp;
	if(empty($t)){
	$reload="?adjacents=".$adjacents;}else{$reload="?".$t."&amp;adjacents=".$adjacents;}
?>

                                  <div class="col-md-12"></div>
                                    <form action="cari_act" method="get">
                                        <div class="input-group col-md-4 col-md-offset-8">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
                                            <input type="text" class="form-control" placeholder="Cari Layanan Kesehatan" aria-describedby="basic-addon1" name="cari">   
                                        </div>
                                    </form><br/>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="col-md-1 col-sm-1 col-xs-1" style="text-align: center;"> No </th>
                                                    <th class="col-md-2 col-sm-2 col-xs-2" style="text-align: center;">Nama Pusat Kesehatan</th>
                                                    <th class="col-md-3 col-sm-3 col-xs-3" style="text-align: center;">Alamat</th>
                                                    <th class="col-md-2 col-sm-2 col-xs-2" style="text-align: center;">Kontak</th>
													
													<th class="col-md-2 col-sm-2 col-xs-3" style="text-align: center;">Gambar</th>
                                                   
                                                    <th class="col-md-3 col-sm-3 col-xs-3" style="text-align: center;">Opsi</th>
                                                </tr>
                                            </thead>
<?php 
    if(mysql_num_rows($result)>0){while(($count<$rpp)&&($i<$tcount)){mysql_data_seek($result, $i);$b = mysql_fetch_array($result);
?>
                                            <tbody>
                                                <tr style="text-align: center;">
                                                <td><?php echo ++$no_urut; ?></td>
                                                <td>
<?php 
    $kat=$b['kategori'];if($kat=="Rumah Sakit"){echo "Rumah Sakit ".$b['nama'];}elseif($kat=='Puskesmas'){echo "Puskesmas ".$b['nama'];}else{echo "Klinik ".$b['nama'];}
?>
                                                </td>
                                                
                                                <td><?php echo $b['alamat'] ?></td>
												<td style="text-align: left;"> Email :
												<?php if(empty($b['email'])){echo "-";}else{echo $b['email'];}?> <br></br>
                                                Telp &nbsp; : <?php if(empty($b['telp'])){echo "-";}else{echo $b['telp'];}?></td>
												<td>
												<?php
													if (empty($b['gambar'])){
												?>
													<img src="../assets/img/www.png" width="100%">
												<?php
												}else{ 
												?>
												<img src="../assets/img/<?php echo $b['gambar'] ?>" width="100%"></td>
                                                <?php } ?>
                                                <td style="text-align: center;">
                                                    <a href="detail?id=<?php echo $b['id_puskes']; ?>" data-toggle="tooltip" title="Maps" class="btn btn-success"><i class="fa fa-info-circle"></i></a>&nbsp;
                                                    <a href="ubah?id=<?php echo $b['id_puskes']; ?>" data-toggle="tooltip" title="Edit" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>&nbsp;
                                                    <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ?')){ location.href='hapus.act?id=<?php echo $b['id_puskes']; ?>' }" data-toggle="tooltip" title="Hapus" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>       
                                            </tbody>
<?php 
   $i++;$count++;}} else{echo "<tr><td colspan='6' align='center'>Data Tidak Ditemukan</td></tr>";}
?>
                                        </table>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12" align="center">
<?php 
  echo paginate_three($reload, $page, $tpages, $adjacents); 
?>
                                    </div>
                                </div>
                            </div>
                    </div>
                
                 <!-- /. ROW  -->
                 <hr />
               </div>
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
<?php
    require '../footer.php';
?>        