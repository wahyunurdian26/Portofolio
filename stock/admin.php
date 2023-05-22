<!doctype html>
<html class="no-js" lang="en">

<?php 
    include '../dbconnect.php';
    include 'cekAdmin.php';
      
    if(isset($_POST['update'])){
        $id=$_POST['id'];
        $username=$_POST['username'];
        $nickname=$_POST['nickname'];
        $password= base64_encode($_POST['password']);
        $role=$_POST['role'];
              
       
        $updatedata = mysqli_query($conn,"update slogin set 
          nickname='$nickname',username='$username', role='$role',password='$password',username='$username' 
          where id='$id'");
          if ($updatedata){
          ?>
              <!-- <div class="alert alert-sucesss alert-dismissible fade show" role="alert">
                  <strong>Warning </strong>Data berhasil diedit
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div> -->
          <?php } else {

          }  
    }

    if(isset($_POST['hapus'])){
        $id = $_POST['id'];
        $delete = mysqli_query($conn,"delete from slogin where id='$id'");
        
        //cek apakah berhasil
        if ($delete){

            // echo " <div class='alert alert-success'>
            //     <strong>Success!</strong> Redirecting you back in 1 seconds.
            //   </div>
            // <meta http-equiv='refresh' content='1'; url= 'admin.php'/>  ";
            // } else { echo "<div class='alert alert-warning'>
            //     <strong>Failed!</strong> Redirecting you back in 1 seconds.
            //   </div>
            //  <meta http-equiv='refresh' content='1'; url='admin.php'/> ";
            // 
        }
    };
    include "templet/header.php";
    include "templet/sidebar.php";
	?>


            <div class="main-content-inner">
               
                <!-- market value area start -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Daftar User</h2>
									<button style="margin-bottom:20px" id=btn data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Barang</button>
                                </div>
                                    <div class="data-tables datatable-dark">
										 <table id="dataTable3" class="display" style="width:100%"><thead class="thead-dark">
											<tr>
												<th>No</th>
												<th>Nama</th>
												<th>Nickname</th>
												<th>Rule</th>
												
												
												<th id=btn>Opsi</th>
											</tr></thead><tbody>
											<?php 
											$brgs=mysqli_query($conn,"SELECT * from slogin order by username ASC");
											$no=1;
											while($p=mysqli_fetch_array($brgs)){
                                                $idb = $p['username'];
												?>
												
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $p['username'] ?></td>
													<td><?php echo $p['nickname'] ?></td>
													<td><?php echo $p['role'] ?></td>
													
                                                    <td id=btn><button data-toggle="modal" data-target="#edit<?=$idb;?>" id=btn class="btn btn-warning">Edit</button>
                                                     <button data-toggle="modal" id=btn data-target="#del<?=$idb;?>" class="btn btn-danger">Del</button></td>
												</tr>


                                                <!-- The Modal -->
                                                    <div class="modal fade" id="edit<?=$idb;?>">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <form method="post">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                            <h4 class="modal-title">Edit User <?php echo $p['username']?> - <?php echo $p['role']?></h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            
                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                            <input type="hidden" name=id value="<?php echo $p['id'];?>" >
                                                            <label for="nama">Username</label>
                                                            <input type="text" id="username" name="username" class="form-control" value="<?php echo $p['username'] ?>">

                                                            <label for="nickname">Nick Name</label>
                                                            <input type="text" id="nickname" name="nickname" class="form-control" value="<?php echo $p['nickname'] ?>">

                                                            <label for="password">Password</label>
                                                            <input type="password" id="password" name="password" class="form-control" value="<?php echo base64_decode($p['password']); ?>">

                                                            <label for="password">Rule</label>
                                                            <select class="form-select"  name="role" required>
                                                                <option value="">Rule</option>
                                                                <option value="Admin"<?php if($p['role']=='admin' | $p['role']=='Admin'){echo "selected";} ?>> Admin</option>
                                                                <option value="Manager" <?php if($p['role']=='manager' | $p['role']=='Manager'){echo "selected";} ?>> Manager</option>
                                                            </select>    
                                                            </div>
                                                            
                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success" name="update">Save</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                        </div>
                                                    </div>



                                                    <!-- The Modal -->
                                                    <div class="modal fade" id="del<?=$idb;?>">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <form method="post">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                            <h4 class="modal-title">Hapus User <?php echo $p['username']?> - <?php echo $p['role']?></h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            
                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus user ini?
                                                            <input type="hidden" name="id" value="<?=$p['id'];?>">
                                                            </div>
                                                            
                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-success" name="hapus">Hapus</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                        </div>
                                                    </div>


												<?php 
											}
											?>
										</tbody>
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
	
	<!-- modal input -->
			<div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Masukkan User Baru</h4>
						</div>
						<div class="modal-body">
							<form action="tmb_user_act.php" method="post">
								<div class="form-group">
									<label>Username</label>
									<input name="username" type="text" class="form-control" placeholder="Username" required>
								</div>
								<div class="form-group">
									<label>Nickaname</label>
									<input name="nickname" type="text" class="form-control" placeholder="Nickname">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input name="password" type="password" class="form-control" placeholder="Password">
								</div>
                                <label for="password">Rule</label>
                                 <select class="form-select"  name="role" required>
                                    <option value="">Rule</option>
                                    <option value="Admin"> Admin</option>
                                      <option value="Manager"> Manager</option>
                                 </select>   

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
								<input type="submit" class="btn btn-primary" value="Simpan">
							</div>
						</form>
					</div>
				</div>
			</div>
	<?php 
    include "templet/footer.php"
    ?>