<?php
require '../func/koneksi.php';
	$id=$_POST['upuskes'];
	$spesialis=$_POST['uspesialis'];
	$selected_spesialis = "";
	
foreach ($spesialis as $spes){
	$selected_spesialis .= $spes . ", ";
}
	$selected_spesialis = substr($selected_spesialis, 0, -2);
	
	

mysql_query("update spesialis_puskes set id_spesialis='$selected_spesialis' where id_puskes='$id'")or die(mysql_error());

header("location:../spes_puskes");
?>