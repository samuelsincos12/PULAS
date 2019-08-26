<?php
	require '../func/koneksi.php';
	
	$nama=$_POST['unama'];
	$kategori=$_POST['ukategori'];
	$jenis=$_POST['ujenis'];
	$email=$_POST['uemail'];
	$alamat=$_POST['ualamat'];
	$telepon=$_POST['utelepon'];	
	$lat=$_POST['ulat'];
	$long=$_POST['ulong'];
	$gambar=$_FILES['ugambar']['name'];
	$idkec=$_POST['ukecamatan'];
	unlink("../assets/img/".$us['gambar']);
	move_uploaded_file($_FILES['ugambar']['tmp_name'], "../assets/img/".$_FILES['ugambar']['name']);
	
	mysql_query("insert into puskes values('','$nama', '$kategori', '$jenis', '$email', '$alamat', '$telepon', '$lat', '$long', '$gambar', '$idkec')")or die(mysql_error());
	
	header("location:../puskes");
?>