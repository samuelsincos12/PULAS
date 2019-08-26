<?php 
	require '../func/koneksi.php';
	
	$id=$_POST['uid'];
	$nama=$_POST['unama'];
	mysql_query("update kecamatan set nama='$nama' where id_kecamatan='$id'")or die(mysql_error());
	
	header("location:../kec");
?>