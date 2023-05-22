<?php
session_start();
include 'dbconnect.php';

if(isset($_SESSION['role'])){
	header("location:stock");
}

if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "Username atau Password salah!";
		}else if($_GET['pesan'] == "logout"){
			echo "Anda berhasil keluar dari sistem";
		}else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus Login";
		}else if($_GET['pesan'] == "noaccess"){
			echo "Akses Ditutup";
	}
}


if(isset($_POST['btn-login']))
{
 $uname = mysqli_real_escape_string($conn,$_POST['username']);
 $upass = mysqli_real_escape_string($conn,base64_encode($_POST['password']));

 // menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"select * from slogin where username='$uname' and password='$upass';");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 if($data['role']=="Admin" | $data['role']=="admin"){
		// buat session login dan username
		$_SESSION['user'] = $data['nickname'];
		$_SESSION['user_login'] = $data['username'];
		$_SESSION['id'] = $data['id'];
		$_SESSION['role'] = "Admin";
		header("location:stock");

 }
 else if($data['role']=="Manager" | $data['role']=="manager")
 {
	// buat session login dan username
	$_SESSION['user'] = $data['nickname'];
	$_SESSION['user_login'] = $data['username'];
	$_SESSION['id'] = $data['id'];
	$_SESSION['role'] = "Manager";
	header("location:stock");
 }else{
	echo"<script>
    alert('Akses ditolak !!');
	window.hisotry.back();
	  </script>";

 }
 
}else{
	echo"<script>
    alert('username atau password salah !!');
	window.hisotry.back();
	  </script>";
}

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>System Sign In</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style.css">
    <link rel="icon" 
      type="image/png" 
      href="unique.png">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
<form method="post">
	<div class="container">
		<div class="top">
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header" style="padding: 3%">
				<img src="unique.png" style="width: 20%"><br>
				<b style="color:white;font-size:30px">Log In</b>
			</div>
			<br>
			<label for="username">Username</label>
			<br/>
			<input type="text" id="username" name="username">
			<br/>
			<label for="password">Password</label>
			<br/>
			<input type="password" id="password" name="password">
			<br/>
			<button type="submit" name='btn-login'>Sign In</button>
			<br/>
			
		</div>
	</div>
</from>
</body>

<script>
	$(document).ready(function () {
    	$('#logo').addClass('animated fadeInDown');
    	$("input:text:visible:first").focus();
	});
	$('#username').focus(function() {
		$('label[for="username"]').addClass('selected');
	});
	$('#username').blur(function() {
		$('label[for="username"]').removeClass('selected');
	});
	$('#password').focus(function() {
		$('label[for="password"]').addClass('selected');
	});
	$('#password').blur(function() {
		$('label[for="password"]').removeClass('selected');
	});
</script>

</html>
