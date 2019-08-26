<?php
	include '../func/koneksi.php';$id=$_GET['id'];mysql_query("delete from admin where id_admin='$id'")or die(mysql_error());header("location:../administrator");
?>