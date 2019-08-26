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
<?php
$id_tempat=mysql_real_escape_string($_GET['id']);

$det=mysql_query("select * from admin where id_admin='$id_tempat'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                         <h4 class="modal-title" style="text-align: center;">Detail Admin</h4>
                    </div><br/><br/>
                    <div class="col-md-4 col-sm-12 col-xs-12">           
                        <div class="panel panel-back noti-box">
						<?php if(empty($d['Foto'] )){
?>
      <img  width="100%" src="../assets/img/no.png" >
<?php
	  }else {
?>
      <img width="100%" src="../assets/img/<?php echo $d['Foto'];?>">
<?php
}
?>        
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-12">           
                        <div class="panel panel-back noti-box">
                            <table width="100%" cellspacing="100%">
                                <tr>
                                    <td>Nama Admin</td>
                                    <td width="5%">: </td>
                                    <td><?php echo $d['nama'];?></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td>: </td>
                                    <td><?php echo $d['username'];?></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td>: </td>
                                    <td><?php echo $d['password'];?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-7 col-md-offset-5">
                         <a href="../administrator" style="margin-bottom:20px;" class="btn btn-primary col-md-2"><i class="fa fa-arrow-left"></i>  Kembali </a>
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