<?php
require '../func/koneksi.php';
	$id=$_POST['uid'];
	$nama=$_POST['unama'];
	$kategori=$_POST['ukategori'];
	$jenis=$_POST['ujenis'];
	$email=$_POST['uemail'];
	$alamat=$_POST['ualamat'];
	$telepon=$_POST['utelepon'];
	$lat=$_POST['ulat'];
	$long=$_POST['ulong'];
	$gambar=$_FILES['ugambar']['name'];
	$tmp = $_FILES['ugambar']['tmp_name'];
	$idkec=$_POST['ukecamatan'];

	if(!empty($gambar)) {
		move_uploaded_file($tmp,'../assets/img/'.$gambar);
	}	
	if(!empty($gambar)){
	    $valfoto = ", gambar='$gambar'";
	}	
	mysql_query("update puskes set nama='$nama', kategori='$kategori', jenis='$jenis', email='$email', alamat='$alamat', telp='	$telepon', lat='$lat', lng='$long' $valfoto, id_kecamatan='$idkec' where id_puskes='$id'")or die(mysql_error());

	header("location:../puskes");
?>