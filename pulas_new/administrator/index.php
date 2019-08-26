<?php
    require '../header.php';
?>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Data Admin</h2>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                                    <a href="tambah" style="margin-bottom:20px" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Tambah Admin </a>
                                    <div class="col-md-12"></div><br/>
<?php 
    include '../func/pagination3.php';$page=isset($_GET['page']) ? intval($_GET['page']) : 1;$adjacents=isset($_GET['adjacents']) ? intval($_GET['adjacents']) : 3;$rpp=5;$whr="";if(isset($_GET['cari'])){$q=$_GET['cari'];if(empty($whr)){$whr.="nama LIKE '%$q%' OR username LIKE '%$q%'";}}$t="";if(isset($_GET['cari'])){$rt=$_GET['cari'];if(empty($t)){$t.="cari=$rt";}}if(empty($t)){$sql="SELECT * FROM admin";}else{$sql="SELECT * FROM admin WHERE ".$whr;}$result=mysql_query($sql);$tcount=mysql_num_rows($result);$tpages=isset($tcount) ? ceil($tcount/$rpp) : 1;$count=0;$i=($page-1)*$rpp;$no_urut=($page-1)*$rpp;if(empty($t)){$reload="?adjacents=".$adjacents;}else{$reload="?".$t."&amp;adjacents=".$adjacents;}
?>
                                    <div class="col-md-12"></div>
                                    <form action="cari_act" method="get">
                                        <div class="input-group col-md-4 col-md-offset-8">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
                                            <input type="text" class="form-control" placeholder="Cari Admin" aria-describedby="basic-addon1" name="cari">   
                                        </div>
                                    </form><br/>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th "class="col-md-1 col-sm-1 col-xs-1" style="text-align: center;">No</th
                                                    ><th class="col-md-5 col-sm-5 col-xs-5" style="text-align: center;">Nama Admin</th>
                                                    <th class="col-md-4 col-sm-4 col-xs-4" style="text-align: center;">Foto</th>
                                                    <th class="col-md-4 col-sm-4 col-xs-4" style="text-align: center;">Opsi</th>
                                                </tr>
                                            </thead>
<?php 
    if(mysql_num_rows($result)>0){while(($count<$rpp)&&($i<$tcount)){mysql_data_seek($result, $i);$data = mysql_fetch_array($result);
?>
                                            <tbody>
                                                <tr style="text-align: center;">
                                                <td><?php echo ++$no_urut; ?></td>
                                                
    <td> <?php echo $data['nama']; ?></td>                                                                                  <td><?php
	  if(empty($data['Foto'] )){
?>
      <img height="80px" src="../assets/img/no.png" width="20%">
<?php
	  }else {
?>
      <img height="80px" src="../assets/img/<?php echo $data['Foto'];?>">
<?php
}
?>
                                            <td style="text-align: center;">
                                                    <a href="detail?id=<?php echo $data['id_admin']; ?>" data-toggle="tooltip" title="Detail" class="btn btn-success"><i class="fa fa-info-circle"></i></a>&nbsp;&nbsp;
                                                    <a href="ubah?id=<?php echo $data['id_admin']; ?>" data-toggle="tooltip" title="Edit" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>&nbsp;&nbsp;
                                                    <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus.act?id=<?php echo $data['id_admin']; ?>' }" data-toggle="tooltip" title="Hapus" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>       
                                            </tbody>
<?php 
   $i++;$count++;}} else{echo "<tr><td colspan='3' align='center'>Data Tidak Ditemukan</td></tr>";}
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
            </div>
                <!-- /. ROW  -->
        </div>
               
             <!-- /. PAGE INNER  -->
<?php
    require '../footer.php';
?>