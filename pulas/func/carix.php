<?php 
	$t="";if(($_GET['search'])){
	$rt=$_GET['search'];if(empty($t)){
	$t.="search=$rt";}}if(($_GET['spes'])){
	$rt=$_GET['spes'];if(empty($t)){
	$t.="spes=$rt";}else{
	$t.="&spes=$rt";}}if(($_GET['kec'])){
	$rt=$_GET['kec'];if(empty($t)){
	$t.="kec=$rt";}else{
	$t.="&kec=$rt";}}if(empty($t)){
	
	header("location:../cari");}else{header("location:../cari/?$t");}
?>