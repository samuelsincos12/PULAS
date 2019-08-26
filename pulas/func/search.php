<?php 
	$t="";if(($_GET['search'])){$rt=$_GET['search'];if(empty($t)){$t.="search=$rt";}}if(empty($t)){header("location:../cari");}else{header("location:../cari/?$t");}
?>