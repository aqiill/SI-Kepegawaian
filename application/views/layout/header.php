<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center"
				href="<?php echo base_url('beranda') ?>">
				<div class=" sidebar-brand-icon rotate-n-15">
					<i class="fas fa-laugh-wink"></i>
				</div>
				<div class="sidebar-brand-text mx-3">SIM PEGAWAI</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<?php if ($this->session->userdata('level')=="admin" || $this->session->userdata('level')=="operator"){ ?>

			<li class="nav-item active">
				<a class="nav-link" href="<?php echo base_url('beranda') ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Beranda</span></a>
			</li>
			<?php } ?>
			<?php 
				if ($this->session->userdata('level')=="admin") { ?>
			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
					aria-controls="collapseTwo">
					<i class="fas fa-fw fa-cog"></i>
					<span>Data Master</span>
				</a>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Data Master</h6>
						<a class="collapse-item" href="<?php echo base_url('cabangdinas') ?>">Cabang Dinas</a>
						<a class="collapse-item" href="<?php echo base_url('wilayah') ?>">Wilayah</a>
						<a class="collapse-item" href="<?php echo base_url('unitkerja') ?>">Unit Kerja</a>
						<a class="collapse-item" href="<?php echo base_url('jabatan') ?>">Jabatan</a>
						<a class="collapse-item" href="<?php echo base_url('pangkatgolongan') ?>">Pangkat Golongan</a>
						<a class="collapse-item" href="<?php echo base_url('jenismutasi') ?>">Jenis Mutasi</a>
						<a class="collapse-item" href="<?php echo base_url('user') ?>">User</a>
					</div>
				</div>
			</li>
			<?php	}
			 ?>

			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('datapegawai') ?>">
					<i class="fas fa-fw fa-chart-area"></i>
					<span>Data Pegawai</span></a>
			</li>

			<?php 
				if ($this->session->userdata('level')=="admin" || $this->session->userdata('level')=="operator") { ?>
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#riwayatkeluarga"
					aria-expanded="true" aria-controls="riwayatkeluarga">
					<i class="fas fa-th"></i>
					<span>Riwayat Keluarga</span>
				</a>
				<div id="riwayatkeluarga" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Riwayat Keluarga</h6>
						<a class="collapse-item" href="<?php echo base_url('pasutri') ?>">Suami / Istri</a>
						<a class="collapse-item" href="<?php echo base_url('anak') ?>">Anak</a>
						<a class="collapse-item" href="<?php echo base_url('ortu') ?>">Orang Tua</a>
					</div>
				</div>
			</li>

			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#riwayatpendidikan"
					aria-expanded="true" aria-controls="riwayatpendidikan">
					<i class="fa fa-school"></i>
					<span>Riwayat Pendidikan</span>
				</a>
				<div id="riwayatpendidikan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Riwayat Pendidikan</h6>
						<a class="collapse-item" href="<?php echo base_url('sekolah') ?>">Sekolah</a>
						<a class="collapse-item" href="<?php echo base_url('bahasa') ?>">Bahasa</a>
					</div>
				</div>
			</li>

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kepegawaian" aria-expanded="true"
					aria-controls="kepegawaian">
					<i class="fas fa-fw fa-folder"></i>
					<span>Kepegawaian</span>
				</a>
				<div id="kepegawaian" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Kepegawaian</h6>
						<a class="collapse-item" href="<?php echo base_url('sertifikasi') ?>">Sertifikasi</a>
						<a class="collapse-item" href="<?php echo base_url('tugas') ?>">Tugas Tambahan</a>
						<a class="collapse-item" href="<?php echo base_url('pangkat') ?>">Pangkat</a>
						<a class="collapse-item" href="<?php echo base_url('kgb') ?>">KGB</a>
						<a class="collapse-item" href="<?php echo base_url('sppd') ?>">Perjalanan Dinas</a>
						<a class="collapse-item" href="<?php echo base_url('penghargaan') ?>">Penghargaan</a>
						<a class="collapse-item" href="<?php echo base_url('hukuman') ?>">Hukuman</a>
						<a class="collapse-item" href="<?php echo base_url('cuti') ?>">Cuti</a>
						<a class="collapse-item" href="<?php echo base_url('tunjangan') ?>">Tunjangan</a>
						<a class="collapse-item" href="<?php echo base_url('kawin') ?>">Izin Kawin</a>
					</div>
				</div>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('mutasi') ?>">
					<i class="fas fa-fw fa-chart-area"></i>
					<span>Data Mutasi</span></a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('rekapitulasi') ?>">
					<i class="fas fa-fw fa-folder"></i>
					<span>Rekapitulasi</span>
			</li>



			<!-- Nav Item - Utilities Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="true"
					aria-controls="laporan">
					<i class="fas fa-fw fa-folder"></i>
					<span>Laporan</span>
				</a>
				<div id="laporan" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Laporan</h6>
						<a class="collapse-item" href="<?php echo base_url('laporan/nominatif') ?>">Nominatif</a>
						<a class="collapse-item" href="<?php echo base_url('laporan/duk') ?>">DUK</a>
						<a class="collapse-item" href="<?php echo base_url('laporan/bazeting') ?>">Bezeting</a>
						<!-- <a class="collapse-item" href="<?php echo base_url('laporan/keadaan') ?>">Keadaan Pegawai</a> -->
						<a class="collapse-item" href="<?php echo base_url('laporan/pensiun') ?>">Pensiun</a>
					</div>
				</div>
			</li>
			<?php	}
			 ?>


			<!-- Nav Item - Charts -->
			<?php 
				if ($this->session->userdata('level')=="operator") { ?>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('user') ?>">
					<i class="fas fa-users"></i>
					<span>User</span></a>
			</li>
			<?php	}
			 ?>

			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('user/gantipassword') ?>">
					<i class="fas fa-cog"></i>
					<span>Ganti Password</span></a>
			</li>

			<!-- Nav Item - Tables -->
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('login/logout') ?>">
					<i class="fas fa-sign-out-alt"></i>
					<span>Keluar</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>



					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">


						<div class="topbar-divider d-none d-sm-block"></div>

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small">Hi, <?php echo str_replace('-', ' ', strtoupper($this->session->userdata('nama_user')) ); ?></span>
								<img class="img-profile rounded-circle" src="https://cdn4.iconfinder.com/data/icons/web-ui-color/128/Account-512.png">
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

								<a class="dropdown-item" href="<?php echo base_url('user/gantipassword') ?>">
									<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
									Ganti Password
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Keluar
								</a>
							</div>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>

					</div>
