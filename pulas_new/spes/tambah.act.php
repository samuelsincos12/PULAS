<?php
	require '../func/koneksi.php';$nama=$_POST['unama'];$query = mysql_query("insert into spesialis values('','$nama')")or die(mysql_error());header("location:../spes");
 ?>