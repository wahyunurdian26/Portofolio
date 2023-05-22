<!-- cek apakah sudah login -->
	<?php 
	session_start();
	if($_SESSION['role']!="Manager"){
		header("location:../index.php?pesan=belum_login");
	}
	?>