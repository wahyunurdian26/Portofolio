<body>
<div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <img src="../../user.jpg" alt="logo" width="30%" style="border-radius:50%">
                <b style="color:white;margin-top:7%;font-size:20px"> <?=$_SESSION['user'];?></b>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
							<li><a href="../index.php"><span>Notes</span></a></li>
                            <li>
                                <a href="../stock.php"><i class="ti-dashboard"></i><span>Stock Barang</span></a>
                            </li>
							<li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout"></i><span>Transaksi Data
                                    </span></a>
                                <ul class="active">
                                    <li><a href="../masuk.php">Barang Masuk / Kembali</a></li>
                                    <li><a href="../keluar.php">Barang Keluar</a></li>
                                </ul>
                            </li>
                          
                            <li id=btn>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout"></i><span>Laporan
                                    </span></a>
                                <ul class="active">
                                    <li><a href="lap_masuk_tgl.php">Barang masuk / kembali</a></li>
                                    <li><a href="lap_keluar_tgl.php">Barang keluar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="bi bi-gear"></i><span>Pengaturan
                                    </span></a>
                                <ul class="collapse">
                                    <li id="btn"><a href="../admin.php">Kelola Admin</a></li>
                                    <li><a href="../logout.php" onclick="return confirm('apakah yakin akan logout ???')">Log out</a></li>
                             
                                </ul>
                            </li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                            
                            <img src="../log2.png" style="width:30%;margin-left:1%;position: absolute">
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li><h5><div class="date">
								<script type='text/javascript'>
						<!--
						var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
						var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
						var date = new Date();
						var day = date.getDate();
						var month = date.getMonth();
						var thisDay = date.getDay(),
							thisDay = myDays[thisDay];
						var yy = date.getYear();
						var year = (yy < 1000) ? yy + 1900 : yy;
						document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);		
						//-->
						</script></b></div></h3>

						</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="../index.php">Home</a></li>
                                <li><span></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right" style="color:black; padding:0px;">
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->