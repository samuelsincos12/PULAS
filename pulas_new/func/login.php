<?php
	session_start();include 'koneksi.php';$uname=$_POST['uname'];$pass=$_POST['upass'];$pas=md5($pass);$query=mysql_query("select * from admin where username='$uname' and password='$pas'")or die(mysql_error());if(mysql_num_rows($query)==1){$_SESSION['uname']=$uname;
		header("location:../dashboard");}else{header("location:../?pesan=gagal")or die(mysql_error());}
?>