<!doctype html>
<html class="no-js" lang="en">

<?php 
    include '../dbconnect.php';
    include 'cekAdmin.php';

    if(isset($_POST['update'])){
        $id = $_POST['id']; //iddata
        $idx = $_POST['idx']; //idbarang
        $jumlah = $_POST['jumlah'];
        $keterangan = $_POST['keterangan'];
        $tanggal = $_POST['tanggal'];
        $pengirim=$_POST['pengirim'];
        $pemeriksa=$_POST['pemeriksa'];
     

        $lihatstock = mysqli_query($conn,"select * from sstock_brg where idx='$idx'"); //lihat stock barang itu saat ini
        $stocknya = mysqli_fetch_array($lihatstock); //ambil datanya
        $stockskrg = $stocknya['stock'];//jumlah stocknya skrg

        $lihatdataskrg = mysqli_query($conn,"select * from sbrg_masuk where id='$id'"); //lihat qty saat ini
        $preqtyskrg = mysqli_fetch_array($lihatdataskrg); 
        $qtyskrg = $preqtyskrg['jumlah'];//jumlah skrg

        if($jumlah >= $qtyskrg){
            //ternyata inputan baru lebih besar jumlah masuknya, maka tambahi lagi stock barang
            $hitungselisih = $jumlah-$qtyskrg;
            $tambahistock = $stockskrg+$hitungselisih;

            $queryx = mysqli_query($conn,"update sstock_brg set stock='$tambahistock' where idx='$idx'");
            $updatedata1 = mysqli_query($conn,"update sbrg_masuk set tgl='$tanggal',jumlah='$jumlah',keterangan='$keterangan', pengirim='$pengirim', pemeriksa='$pemeriksa' where id='$id'");
            
            //cek apakah berhasil
            if ($updatedata1 && $queryx){

                echo " <div class='alert alert-success'>
                    <strong>Success!</strong> Redirecting you back in 1 seconds.
                </div>
                <meta http-equiv='refresh' content='1; url= masuk.php'/>  ";
                } else { echo "<div class='alert alert-warning'>
                    <strong>Failed!</strong> Redirecting you back in 3 seconds.
                </div>
                <meta http-equiv='refresh' content='3; url= masuk.php'/> ";
                };

        } else {
            //ternyata inputan baru lebih kecil jumlah masuknya, maka kurangi lagi stock barang
            $hitungselisih = $qtyskrg-$jumlah;
            $kurangistock = $stockskrg-$hitungselisih;

            $query1 = mysqli_query($conn,"update sstock_brg set stock='$kurangistock' where idx='$idx'");

            $updatedata = mysqli_query($conn,"update sbrg_masuk set tgl='$tanggal',jumlah='$jumlah',keterangan='$keterangan', pengirim='$pengirim', pemeriksa='$pemeriksa' where id='$id'");
            
            //cek apakah berhasil
            if ($query1 && $updatedata){

                echo " <div class='alert alert-success'>
                    <strong>Success!</strong> Redirecting you back in 1 seconds.
                </div>
                <meta http-equiv='refresh' content='1; url= masuk.php'/>  ";
                } else { echo "<div class='alert alert-warning'>
                    <strong>Failed!</strong> Redirecting you back in 3 seconds.
                </div>
                <meta http-equiv='refresh' content='3; url= masuk.php'/> ";
                };

        };


        
    };

    if(isset($_POST['hapus'])){
        $id = $_POST['id'];
        $idx = $_POST['idx'];

        $lihatstock = mysqli_query($conn,"select * from sstock_brg where idx='$idx'"); //lihat stock barang itu saat ini
        $stocknya = mysqli_fetch_array($lihatstock); //ambil datanya
        $stockskrg = $stocknya['stock'];//jumlah stocknya skrg

        $lihatdataskrg = mysqli_query($conn,"select * from sbrg_masuk where id='$id'"); //lihat qty saat ini
        $preqtyskrg = mysqli_fetch_array($lihatdataskrg); 
        $qtyskrg = $preqtyskrg['jumlah'];//jumlah skrg

        $adjuststock = $stockskrg-$qtyskrg;

        $queryx = mysqli_query($conn,"update sstock_brg set stock='$adjuststock' where idx='$idx'");
        $del = mysqli_query($conn,"delete from sbrg_masuk where id='$id'");

        
        //cek apakah berhasil
        if ($queryx && $del){

            echo " <div class='alert alert-success'>
                <strong>Success!</strong> Redirecting you back in 1 seconds.
              </div>
            <meta http-equiv='refresh' content='1; url= masuk.php'/>  ";
            } else { echo "<div class='alert alert-warning'>
                <strong>Failed!</strong> Redirecting you back in 1 seconds.
              </div>
             <meta http-equiv='refresh' content='1; url= masuk.php'/> ";
            }
    };
    include 'templet/header.php';
    include 'templet/sidebar.php';
	?>
            <div class="main-content-inner">
               
                <!-- market value area start -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Barang Masuk / Kembali</h2>
									<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah</button>
                                </div>
                                <div class="markettable mt-4">
                                    <div class="table-responsive">
										 <table id="dataTable3" class="table table-hover"><thead class="thead-dark">
											<tr>
												<th>No</th>
												<th>Tanggal</th>
												<th>Nama Barang</th>
												<th>Jenis</th>
												<th>Merk</th>
												<th>Jumlah</th>
												<th>Keterangan</th>                                                
                                                <th>Pengirim</th>
                                                <th>Pemeriksa</th>								
												<th>Opsi</th>
											</tr></thead><tbody>
											<?php 
											$brg=mysqli_query($conn,"SELECT * from sbrg_masuk sb, sstock_brg st where st.idx=sb.idx order by sb.id DESC");
											$no=1;
											while($b=mysqli_fetch_array($brg)){
                                                $idb = $b['idx'];
                                                $id = $b['id'];

												?>
												
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php $tanggals=$b['tgl']; echo date("d-M-Y", strtotime($tanggals)) ?></td>
													<td><?php echo $b['nama'] ?></td>
													<td><?php echo $b['jenis'] ?></td>
													<td><?php echo $b['merk'] ?></td>
												
													<td><?php echo $b['jumlah'] ?></td>
													<td><?php echo $b['keterangan'] ?></td>
                                                    <td><?php echo $b['pengirim'] ?></td>
                                                    <td><?php echo $b['pemeriksa'] ?></td>

                                                    <td><button  data-toggle="modal" data-target="#edit<?=$id;?>" class="btn btn-warning">E</button> 
                                                    <button data-toggle="modal" data-target="#del<?=$id;?>" class="btn btn-danger">D</button></td>
												</tr>

                                                <!-- The Modal -->
                                                <div class="modal fade" id="edit<?=$id;?>">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <form method="post">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                            <h4 class="modal-title">Edit Data</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            
                                                            <!-- Modal body -->
                                                            <div class="modal-body">

                                                            <label for="tanggal">Tanggal</label>
                                                            <input type="date" id="tanggal" name="tanggal" class="form-control" value="<?php echo $b['tgl'] ?>">
                                                            
                                                            <label for="nama">Barang</label>
                                                            <input type="text" id="nama" name="nama" class="form-control" value="<?php echo $b['nama'] ?> <?php echo $b['merk'] ?> <?php echo $b['jenis'] ?>" disabled>

                                                           
                                                            <label for="jumlah">Jumlah</label>
                                                            <input type="text" id="jumlah" name="jumlah" class="form-control" value="<?php echo $b['jumlah'] ?>">

                                                            <label for="keterangan">Keterangan</label>
                                                            <input type="text" id="keterangan" name="keterangan" class="form-control" value="<?php echo $b['keterangan'] ?>">
                                                            <input type="hidden" name="id" value="<?=$id;?>">
                                                            <input type="hidden" name="idx" value="<?=$idb;?>">

                                                            <label for="pengirim">Pengirim</label>
                                                            <input type="text" id="pengirim" name="pengirim" class="form-control" value="<?php echo $b['pengirim'] ?>">

                                                            
                                                            <label for="pemeriksa">Pemeriksa</label>
                                                            <input type="text" id="pemeriksa" name="pemeriksa" class="form-control" value="<?php echo $b['pemeriksa'] ?>">

                                                          
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
                                                    <div class="modal fade" id="del<?=$id;?>">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <form method="post">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                            <h4 class="modal-title">Hapus Barang <?php echo $b['nama']?> - <?php echo $b['jenis']?></h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            
                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus barang ini dari daftar stock  masuk?
                                                            <br>
                                                            *Stock barang akan berkurang
                                                            <input type="hidden" name="id" value="<?=$id;?>">
                                                            <input type="hidden" name="idx" value="<?=$idb;?>">
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
							<h4 class="modal-title">Input Barang Masuk</h4>
						</div>
						<div class="modal-body">
							<form action="barang_masuk_act.php" method="post">
								<div class="form-group">
									<label>Tanggal</label>
									<input name="tanggal" type="date" class="form-control">
								</div>
								<div class="form-group">
									<label>Nama Barang</label>
									<select name="barang" class="custom-select form-control">
									<option selected>Pilih barang</option>
									<?php
									$det=mysqli_query($conn,"select * from sstock_brg order by nama ASC");
									while($d=mysqli_fetch_array($det)){
									?>
										<option value="<?php echo $d['idx'] ?>"><?php echo $d['nama'] ?> <?php echo $d['jenis'] ?> <?php echo $d['merk'] ?></option>
										<?php
								}
								?>
									</select>
								</div>
								<div class="form-group">
									<label>Jumlah</label>
									<input name="qty" type="number" min="1" class="form-control" placeholder="Qty">
								</div>
								<div class="form-group">
									<label>Keterangan</label>
									<input name="ket" type="text" class="form-control" placeholder="Keterangan">
								</div>
								<div class="form-group">
									<label>Pengirim</label>
									<input name="pengirim" type="text" class="form-control" placeholder="Pemeriksa">
								</div>
                                <div class="form-group">
									<label>Pemeriksa</label>
									<input name="pemeriksa" type="text" class="form-control" placeholder="Pemeriksa">
								</div>
                                
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