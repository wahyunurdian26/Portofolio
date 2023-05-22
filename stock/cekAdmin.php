<!-- cek apakah sudah login -->
	<?php 
	session_start();
	if($_SESSION['role']==Null){
		header("location:../index.php?pesan=belum_login");
		//  session_destroy();
	}
	?>