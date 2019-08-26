<?php
	include '../func/koneksi.php';$id=$_GET['id'];mysql_query("delete from spesialis where id_spesialis='$id'")or die(mysql_error());header("location:../spes");
?>