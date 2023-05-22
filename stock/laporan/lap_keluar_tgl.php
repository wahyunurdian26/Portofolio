<!doctype html>
<html class="no-js" lang="en">

<?php 
    include '../../dbconnect.php';
    include '../cekAdmin.php';

    include "../templet_laporan/header.php";
    include "../templet_laporan/sidebar.php";

				?>
            <div class="main-content-inner">
               
                <!-- market value area start -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Laporan Barang Keluar</h2>
								</div>
                                 <div class="d-sm-flex justify-content-between align-items-center">
									<form action="" method=post>
                                        <div class="row justify-content-start mt-5">
                                           <div class="col">
                                             <label>  Pilih tanggal</label> 
                                            </div>    
                                            <div class="col">
                                                <input type=date name="tgl1" class="form-control" required>
                                            </div>
                                            <div class="col">
                                                 <input type=date name="tgl2" class="form-control" required>
                                            </div>
                                            <div class="col mb-4">
                                                <input type=submit name=search value="tampilkan" class="btn btn-primary">
                                            </div>
                                        </div>  
                                      
                                    </form>
                                 </div>
                                    <div class="data-tables datatable-dark">
										 <table id="" class="table table-striped" style="width:100%"><thead class="thead-dark">
                                         <tr>
												<th>No</th>
												<th>Tanggal</th>
												<th>Barang</th>
											 
												<th>Jumlah</th>
												<th>Penerima</th>
												<th>Keterangan</th>
                                               
												<th>Diserahkan</th>
                                                <th>Mengetahui</th>							
											</tr></thead><tbody>
											<?php 
                                            
                                            if(isset($_POST['search'])){
                                                 $tgl1=$_POST['tgl1'];
                                                 $tgl2=$_POST['tgl2'];
											$brg=mysqli_query($conn,"SELECT * from sbrg_keluar sb, sstock_brg st where st.idx=sb.idx AND tgl BETWEEN '$tgl1' AND '$tgl2' order by sb.id DESC");
											$no=1;
											while($b=mysqli_fetch_array($brg)){
                                                $idb = $b['idx'];
                                                $id = $b['id'];

												?>
												
												<tr>
												<td><?php echo $no++ ?></td>
													<td><?php $tanggals=$b['tgl']; echo date("d-M-Y", strtotime($tanggals)) ?></td>
													<td><?php echo $b['nama'] ?> <?php echo $b['jenis'] ?> <?php echo $b['merk'] ?></td>
												
                                                    
													<td><?php echo $b['jumlah'] ?></td>
													<td><?php echo $b['penerima'] ?></td>
													<td><?php echo $b['keterangan'] ?></td>
                                                   
                                                    <td><?php echo $b['diserahkan'] ?></td>
                                                    <td><?php echo $b['mengetahui'] ?></td>
                                                </tr>
                              			<?php
                                            }
                                          }
										?>
										</tbody>
										</table>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    <?php   if(isset($_POST['search'])){
                                  ?>
                    <a href="../exportbrgklr.php?T1=<?php echo base64_encode($tgl1).'&T2='.base64_encode($tgl2); ?>" id=btn target="_blank" class="btn btn-info">Export Data</a>
                   <?php } ?>             
                </div>
              
                
                <!-- row area start-->
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p><i class="bi bi-mortarboard-fill"></i>Program ini di buat oleh Mahasiswa STMIK Horizon Karawang</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
	
	<!-- modal input -->
		<?php	
            include "../templet_laporan/footer.php";
?>