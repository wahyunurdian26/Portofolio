<?php 
include '../dbconnect.php';
$barang=$_POST['barang']; //id barang
$qty=$_POST['qty'];
$tanggal=$_POST['tanggal'];
$penerima=$_POST['penerima'];
$ket=$_POST['ket'];

$diserahkan=$_POST['diserahkan'];
$mengetahui=$_POST['mengetahui'];
// memvalidasi apakah stok yang di input melebihi stok yang ada jika iya makan tampilkan notpe 
$dt=mysqli_query($conn,"select * from sstock_brg where idx='$barang'");
$data=mysqli_fetch_array($dt);

if($data['stock']<$qty){
   echo"<script>
   alert('Qty yang di input tidak boleh lebih banyak dari stok yang ada');
   window.history.back();
      </script>";
}else{
// pengurana qty stok di tabel stock
$sisa=$data['stock']-$qty;
$query1 = mysqli_query($conn,"update sstock_brg set stock='$sisa' where idx='$barang'");
// menyimpan barang yang keluar
$query2 = mysqli_query($conn,"insert into sbrg_keluar (idx,tgl,jumlah,penerima,keterangan,diserahkan,mengetahui) values('$barang','$tanggal','$qty','$penerima','$ket','$diserahkan','$mengetahui')");

if($query1 && $query2){
    echo " <div class='alert alert-success'>
    <strong>Success!</strong> Redirecting you back in 1 seconds.
  </div>
<meta http-equiv='refresh' content='1; url= keluar.php'/>  ";

} else {
    echo "<div class='alert alert-warning'>
    <strong>Failed!</strong> Redirecting you back in 1 seconds.
  </div>
 <meta http-equiv='refresh' content='1; url= keluar.php'/> ";
}
}
?>

<html>
<head>
  <title>Barang Keluar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>