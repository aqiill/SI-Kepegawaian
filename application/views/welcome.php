<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SIM PEGAWAI</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/img/'); ?>/prov.png">
	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
	<!-- Custom styles for this page -->
	<link href="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top" class="bg-gradient-success">

	<div class="container-fluid">
		<div align="center"><br><br>
			<!-- Page Heading -->
			<h1 class="h3 mb-2 text-white"><strong>E-SIM PEGAWAI</strong></h1>
			<p class="mb-4 text-white">Aplikasi SIM Pegawai, berguna untuk memetakan Pegawai di Cabang Dinas Wilayah 4 Provinsi Sumatera Barat
			</p>
		</div>
		<!-- Content Row -->
		<div class="row">

			<div class="col-xl-8 col-lg-7">

				<!-- Area Chart -->
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-grey">Jumlah Pegawai Cabdin Wilayah IV Provinsi Sumatera Barats</h6>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Wilayah</th>
										<th>Total Sekolah</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; foreach ($data as $value): ?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><a href="#!"><?php echo ucwords($value->nama_wilayah); ?></a></td>
											<td><?php echo $value->total; ?></td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>

					</div>



				</div>
			</div>

			<!-- Donut Chart -->
			<div class="col-xl-4 col-lg-5">
				<div class="card shadow mb-4">
					<!-- Card Header - Dropdown -->
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-grey">Cabdin Wilayah IV Provinsi Sumatera Barat</h6>

					</div>
					<!-- Card Body -->
					<div class="card-body">
						<div class="chart-pie pt-4">
							<canvas id="myPieChart"></canvas>
						</div>
						<hr>
						Pegawai Cabdin Wilayah IV Prov. Sumatera Barat
					</div>
				</div>
			</div>
		</div>

		<?php 
			foreach ($data as $value) {
				$wilayah[] = $value->nama_wilayah;
				$total[] = $value->total;
			}
		 ?>

		<!-- Bootstrap core JavaScript-->
		<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
		<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Core plugin JavaScript-->
		<script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom scripts for all pages-->
		<script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

		<!-- Page level plugins -->
		<script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>


		<!-- Page level custom scripts -->
		<script>


			// Set new default font family and font color to mimic Bootstrap's default styling
			Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#858796';

			// Pie Chart Example
			var ctx = document.getElementById("myPieChart");
			var myPieChart = new Chart(ctx, {
			  type: 'doughnut',
			  data: {
			    labels: <?php echo json_encode($wilayah); ?>,
			    datasets: [{
			      data: <?php echo json_encode($total); ?>,
			      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#36d9cc'],
			      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#36c2b7'],
			      hoverBorderColor: "rgba(234, 236, 244, 1)",
			    }],

			  },
			  options: {
			    maintainAspectRatio: false,
			    tooltips: {
			      backgroundColor: "rgb(255,255,255)",
			      bodyFontColor: "#858796",
			      borderColor: '#dddfeb',
			      borderWidth: 1,
			      xPadding: 15,
			      yPadding: 15,
			      displayColors: false,
			      caretPadding: 10,
			    },
			    legend: {
			      display: false
			    },
			    cutoutPercentage: 80,
			  },
			});			
		</script>
		<!-- <script src="<?php echo base_url() ?>assets/js/demo/chart-area-demo.js"></script> -->
		<!-- <script src="<?php echo base_url() ?>assets/js/demo/chart-pie-demo.js"></script> -->
		<!-- <script src="<?php echo base_url() ?>assets/js/demo/chart-bar-demo.js"></script> -->

		<!-- Page level plugins -->
		<script src="<?php echo base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>