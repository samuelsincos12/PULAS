<?php 
	require '../func/koneksi.php';$id=$_POST['uid'];$nama=$_POST['unama'];mysql_query("update spesialis set jenis_spesialis='$nama' where id_spesialis='$id'")or die(mysql_error());header("location:../spes");
?>