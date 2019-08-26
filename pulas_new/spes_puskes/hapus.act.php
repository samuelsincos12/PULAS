<?php
	include '../func/koneksi.php';$id=$_GET['id'];mysql_query("delete from spesialis_puskes where id_puskes='$id'")or die(mysql_error());header("location:../spes_puskes");
?>