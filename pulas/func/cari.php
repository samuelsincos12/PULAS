<?php 
$cari=$_GET['search'];
$fasil=$_GET['fasil'];
$spes=$_GET['spes'];
$kec=$_GET['kec'];
header("location:../cari/?search=$cari&fasil=$fasil&spes=$spes&kec=$kec");
?>