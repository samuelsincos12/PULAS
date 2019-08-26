<?php
	error_reporting(0);
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
               
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                                    <a href="tambah" style="margin-bottom:20px" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp;&nbsp; Tambah Data</a>
 <?php 
    include '../func/pagination3.php';
	$page=isset($_GET['page']) ? intval($_GET['page']) : 1;
	$adjacents=isset($_GET['adjacents']) ? intval($_GET['adjacents']) : 3;
	$rpp=5;$whr="";
	if(isset($_GET['cari'])){
		$q=$_GET['cari'];
		if(empty($whr)){
			$whr.="id_puskes = '$q'";
		}
	}
	$t="";
	if(isset($_GET['cari'])){
		$rt=$_GET['cari'];
		if(empty($t)){
			$t.="cari=$rt";
		}
	}
	if(empty($t)){
		$sql="SELECT * FROM spesialis_puskes ORDER BY id_puskes DESC";
	} else {
		$sql="SELECT * FROM spesialis_puskes WHERE ".$whr." ORDER BY id_puskes DESC";
	}
	$result=mysql_query($sql);
	$tcount=mysql_num_rows($result);
	$tpages=isset($tcount) ? ceil($tcount/$rpp) : 1;
	$count=0;
	$i=($page-1)*$rpp;
	$no_urut=($page-1)*$rpp;
	if(empty($t)){
	$reload="?adjacents=".$adjacents;}else{$reload="?".$t."&amp;adjacents=".$adjacents;}
?>

                                    <div class="col-md-12"></div>
                                    <div class="input-group col-md-5 col-md-offset-8">
										<form action="cari_act" method="get">
											<div class="col-md-8 col-sm-8">
											<select class="form-control" name="cari">
												<option value="">Cari Pusat Kesehatan</option>
													<?php 
													$brg=mysql_query("select * from puskes");
													while($b=mysql_fetch_array($brg)){
														?>  
														<option value="<?php echo $b['id_puskes']; ?>"><?php echo $b['kategori']?> <?php echo $b['nama'] ?></option>
														<?php 
													}
													?>
											</select>
											</div>
											<button class="btn btn-primary"><i class="fa fa-search"></i></button>
										</form>
                                    </div>
									<br/>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center;" class="col-md-1 col-sm-1 col-xs-1">No</th>
                                                    <th style="text-align: center;" class="col-md-4 col-sm-4 col-xs-4">Nama Pusat Kesehatan</th>
													<th style="text-align: center;" class="col-md-4 col-sm-4 col-xs-4">Jenis Spesialis</th>
                                                    <th style="text-align: center;" class="col-md-3 col-md-3 col-xs-3">Opsi</th>
                                                </tr>
                                            </thead>
<?php 
    if(mysql_num_rows($result)>0){while(($count<$rpp)&&($i<$tcount)){mysql_data_seek($result, $i);$data = mysql_fetch_array($result);
?>
                                            <tbody>
                                                <tr style="text-align: center;">
                                                <td><?php echo ++$no_urut; ?></td>
                                                <td>
												<?php 
													$idpuskes=$data['id_puskes'];
													$deta=mysql_query("select * from puskes where id_puskes='$idpuskes'")or die(mysql_error());
													while($f=mysql_fetch_array($deta)){
														$sql2 = "SELECT * FROM 	spesialis where id_spesialis in($data[id_spesialis])";
														$query2 = mysql_query($sql2);
														$arrayspesialis = array();
														while($data2 = mysql_fetch_array($query2)){
															$arrayspesialis[] = $data2['jenis_spesialis'];
														}
														//echo $sql2."<br><br>";
													echo $f['kategori'];
												?>&nbsp
												<?php echo $f['nama']; } ?>
												</td>

												<td>
												<?php 
													echo implode(',', $arrayspesialis); ?>
												</td>

                                                <td style="text-align: center;">
													<a href="ubah?id=<?php echo $data['id_puskes']; ?>" data-toggle="tooltip" title="Edit" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>&nbsp;&nbsp;
                                                    <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus.act?id=<?php echo $data['id_puskes']; ?>' }" data-toggle="tooltip" title="Hapus" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                                </td>
												
                                            </tr>       
                                            </tbody>
<?php 
   $i++;$count++;}} else{echo "<tr><td colspan='4' align='center'>Data Tidak Ditemukan</td></tr>";}
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
                    <!--  end  Context Classes  -->
                <!-- /. ROW  -->
        </div>
               
    </div>
             <!-- /. PAGE INNER  -->
<?php
    require '../footer.php';
?>