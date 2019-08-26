<?php
	require '../func/koneksi.php';
	
	$nama=$_POST['unama'];
	$id_admin=$_POST['uadmin'];
	$query = mysql_query("insert into kecamatan values('','$nama','$id_admin')")or die(mysql_error());
	
	
header("location:../kec");
 