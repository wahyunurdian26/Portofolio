<!doctype html>
<html class="no-js" lang="en">

<?php 
    include '../dbconnect.php';
    include 'cekAdmin.php';
    include 'templet/header.php';
    include 'templet/sidebar.php';
?>
            <div class="main-content-inner">
        
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Notes</h2>
                                </div>
                                <div class="market-status-table mt-4">
                                    <div class="table-responsive">
										 <table class="table table-bordered table-hover"><thead class="thead-dark">  
										<tr>
										 <th><center> No </center></th>
										 <th><center> Catatan </center></th>
										 <th><center> Ditulis oleh </center></th>
										 <th><center> Action </center></th>


										</tr></thead>
										 <form method ='POST' action = 'notes.php'>
										 <tr class="table-active">
											<td><center><input type = 'hidden'/></center> </td>
											<td><center> <input type = 'text' class='form-control' name = 'konten' required /></center> </td>
											<td><center>Saya, <strong><?=$_SESSION['user'];?></strong> <span class="badge badge-secondary"><?=$_SESSION['role'];?></span></center> </td>
											<td><center><input type = 'submit' name = 'submit'  class='btn btn-primary btn-sm' value = 'Add Note'/></center></td>
											<tr>
										 </form>
										<?php  
										// Perintah untuk menampilkan data
										$queri="Select * From notes where status='aktif' Order by id DESC" ;  //menampikan SEMUA data dari tabel

										$hasil=MySQLi_query ($conn,$queri);    //fungsi untuk SQL

										// nilai awal variabel untuk no urut
										$i = 1;

										// perintah untuk membaca dan mengambil data dalam bentuk array
										while ($data = mysqli_fetch_array ($hasil)){
										$id = $data['id'];
										 echo "  <form method ='POST' action = 'done.php'>
										  <tr>
										  <td><center>".$i."</center></td>
										  <td><strong><center>".$data['contents']."</center></strong></td>
										  <td><strong><center>".$data['admin']."</center></strong></td>
										  <td><center><input type = 'hidden' name = 'id' value = '".$data['id']."'> <input type='submit' name = 'submit'  class='btn btn-danger btn-sm' value = 'Delete' formaction='del.php' /></center></td>
										  </form></td>
										  </tr> </form>
										  ";
										 $i++; 
										}
										?>
										</table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
                
                <!-- row area start-->
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p><i class="bi bi-mortarboard-fill"></i> Program ini di buat oleh Mahasiswa STMIK Horizon Karawang</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
<?php 
include('templet/footer.php')
?>