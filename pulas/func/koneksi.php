<?php
	define('db_host','localhost');
	define('db_user','root');
	define('db_pass','');
	define('db_name','perpus_new');
	mysql_connect(db_host,db_user,db_pass);mysql_select_db(db_name);
	//function db_Conn() {
		//return mysqli_connect(db_host,db_user,db_pass, db_name) or die("Koneksi Gagal");
	//}
?>