<?php
    require '../header.php';
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Data Kecamatan</h2>   
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
<?php
$id_kecamatan=mysql_real_escape_string($_GET['id']);

$det=mysql_query("select * from kecamatan where id_kecamatan='$id_kecamatan'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                         <h4 class="modal-title" style="text-align: center;">Edit Spesialis</h4>
                    </div><br/><br/>
                    <div class="col-md-8 col-md-offset-2">
                        <form action="ubah.act" method="post" enctype="multipart/form-data">
                            <input name="uid" type="hidden" class="form-control" value="<?php echo $d['id_kecamatan'];?>">
                            <div class="form-group">
                                <label>Jenis Spesialis</label>
                                <input name="unama" type="text" class="form-control" value="<?php echo $d['nama']; }?>">
                            </div>
                            <div class="form-group" style="text-align: center;">
                                <a href="../kec" class="btn btn-default">Batal</a>&nbsp;&nbsp;&nbsp;
                                <input type="submit" class="btn btn-primary" value="Edit">
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