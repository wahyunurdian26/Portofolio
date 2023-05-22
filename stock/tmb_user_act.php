<?php 
include '../dbconnect.php';

$username=$_POST['username'];
$nickname=$_POST['nickname'];
$password= base64_encode($_POST['password']);
$role=$_POST['role'];
	  
$query = mysqli_query($conn,"INSERT INTO slogin VALUES (NULL, '$username', '$password', '$role', '$nickname')");
if ($query){
  echo " <div class='alert alert-success'>
    <strong>Success!</strong> Redirecting you back in 1 seconds.
   </div>
 <meta http-equiv='refresh' content='1; url= admin.php'/>  ";
} 
else {
      echo "<div class='alert alert-warning'>
    <strong>Failed!</strong> Redirecting you back in 1 seconds.
  </div>
 <meta http-equiv='refresh' content='1'; url='admin.php'/> ";
echo"gagal";
}
 
?>
 
  <html>
<head>
  <title>Tambah Barang</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>