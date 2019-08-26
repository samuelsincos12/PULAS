<?php
    require '../header.php';
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Data Spesialis</h2>   
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                         <h4 class="modal-title" style="text-align: center;">Tambah Spesialis</h4>
                    </div><br/><br/>
                    <div class="col-md-8 col-md-offset-2">
                        <form action="tambah.act" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Jenis Spesialis</label>
                                <input name="unama" type="text" class="form-control" placeholder="Jenis Spesialis">
                            </div>
                            <div class="form-group" style="text-align: center;">
                                <a href="../spes" class="btn btn-default">Batal</a>&nbsp;&nbsp;&nbsp;
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