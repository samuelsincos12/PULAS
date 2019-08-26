<?php
	require '../func/koneksi.php';
	
	
	$idpuskes=$_POST['upuskes'];
	
	$spesialis=$_POST['uspesialis'];
	$selected_spesialis = "";
	foreach ($spesialis as $spes){$selected_spesialis .= $spes.", ";
	}$selected_spesialis = substr($selected_spesialis, 0, -2);
	
	
	mysql_query("insert into spesialis_puskes values('$idpuskes','$selected_spesialis')")or die(mysql_error());
	
	
header("location:../spes_puskes");
?>
 