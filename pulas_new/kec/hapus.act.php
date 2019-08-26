<?php
	include '../func/koneksi.php';$id=$_GET['id'];mysql_query("delete from kecamatan where id_kecamatan='$id'")or die(mysql_error());header("location:../kec");
?>