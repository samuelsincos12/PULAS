<?php
	function sin1($cn)	{
		$sql= "SELECT p.id_puskes, p.nama, p.kategori, p.jenis, p.email, p.alamat, p.telp, p.lat, p.lng, p.gambar, p.id_kecamatan, sp.id_spesialis FROM puskes p LEFT OUTER JOIN spesialis_puskes sp ON p.id_puskes = sp.id_puskes";
		return mysqli_query($cn, $sql);
	}

	function sin2($cn, $whr)	{
		$sql= "SELECT p.id_puskes, p.nama, p.kategori, p.jenis, p.email, p.alamat, p.telp, p.lat, p.lng, p.gambar, p.id_kecamatan, sp.id_spesialis FROM puskes p LEFT OUTER JOIN spesialis_puskes sp ON p.id_puskes = sp.id_puskes WHERE ".$whr;
		return mysqli_query($cn, $sql);
	}

	function cari($cn, $q) {
		$sql = "p.nama LIKE '%$q%' OR p.kategori LIKE '%$q%' OR p.jenis LIKE '%$q%' OR p.alamat LIKE '%$q%' OR p.id_kecamatan LIKE '%$q%' OR sp.id_spesialis LIKE '%$q%'";
		return $sql;
	}

	function spes1($cn, $w) {
		$sql = "sp.id_spesialis LIKE '%$w%'";
		return $sql;
	}

	function spes2($cn, $w) {
		$sql = "OR sp.id_spesialis LIKE '%$w%'";
		return $sql;
	}

	function kec1($cn, $x) {
		$sql = "p.id_kecamatan LIKE '%$x%'";
		return $sql;
	}

	function kec2($cn, $x) {
		$sql = "OR p.id_kecamatan LIKE '%$x%'";
		return $sql;
	}

	function penelusuran ($cn) {
		$t="";
		  if(isset($_GET['search'])){
		    $rt=$_GET['search'];
				if(empty($t)){
		      $t.=$rt;
		    }
		  }
			elseif(isset($_GET['spes'])) {
		    $rt = $_GET['spes'];
		    if(empty($t)){
		      $deta=mysqli_query($cn, "select * from spesialis");
		      while($f=mysqli_fetch_array($deta)) {
		        if($rt==$f['id_spesialis']) {
		        $t = "Dokter ".$f['jenis_spesialis'];
		        }
		      }
		    } else {
		      $rt = $_GET['spes'];
		      $deta=mysqli_query($cn, "select * from spesialis");
		      while($f=mysqli_fetch_array($deta)) {
		        if($t==$f['id_spesialis']) {
		          $t .= " + Dokter ".$f['jenis_spesialis'];
		        }
		      }
		    }
		  }
		  elseif(isset($_GET['kec'])) {
		    $rt=$_GET['kec'];
			  if(empty($t)) {
		      $brg=mysqli_query($cn, "select * from kecamatan");
			    while($b=mysqli_fetch_array($brg)) {
		  	    if($rt==$b['id_kecamatan']) {
		          $t = "Kec. ".$b['nama'];
		        }
		      }
		    } else {
		      $brg=mysqli_query($cn, "select * from kecamatan");
			    while($b=mysqli_fetch_array($brg)) {
				    if($rt==$b['id_kecamatan']) {
		          $t .= " + Kec. ".$b['nama'];
		        }
		      }
		    }
		  }
		  echo $t;
	}

	function spesia($cn) {
		return mysqli_query($cn, "select * from spesialis");
	}

	function kecam($cn) {
		return mysqli_query($cn, "select * from kecamatan");
	}

	function inf($cn, $whr) {
		$det=mysqli_query($cn, "SELECT p.id_puskes, p.nama, p.kategori, p.jenis, p.email, p.alamat, p.telp, p.lat, p.lng, p.gambar, p.id_kecamatan, sp.id_spesialis FROM puskes p LEFT OUTER JOIN spesialis_puskes sp ON p.id_puskes = sp.id_puskes where $whr");
		return $det;
	}
?>