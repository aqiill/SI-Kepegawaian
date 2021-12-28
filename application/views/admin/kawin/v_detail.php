<div class="main-content">
	<section class="section">
 


		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url('kawin') ?>" class="btn btn-outline-success">Kembali</a>
					</div>
					<div class="card-body">
						<div class="row row-centered">
							<div class="col-12">
								<section class="section">
									<div class="section-header">
										<h1>Suami / Istri</h1>
									</div>
							</div>							
							<div class="col-12">
								<table class="table table-striped" id="table-1">
									<tbody>
										<tr>
											<td>Suami / Istri</td>
											<td>:</td>
											<td><?php echo ucwords($data['nama_pegawai']) ?></td>
										</tr>
										<tr>
											<td>No Izin Nikah</td>
											<td>:</td>
											<td><?php echo $data['no_izin_kawin'] ?></td>
										</tr>
										<tr>
											<td>Tanggal Izin Nikah</td>
											<td>:</td>
											<td><?php echo $data['tgl_izin_kawin'] ?></td>
										</tr>
										<tr>
											<td>Kebangsaan</td>
											<td>:</td>
											<td><?php echo ucwords($data['kebangsaan']) ?></td>
										</tr>
										<tr>
											<td>Tanggal Lahir</td>
											<td>:</td>
											<td><?php echo $data['tgllahir_pegawai'] ?></td>
										</tr>
										<tr>
											<td>Nama Ayah</td>
											<td>:</td>
											<td><?php echo ucwords($data['nama_ayah']) ?></td>
										</tr>
										<tr>
											<td>Pekerjaan Ayah</td>
											<td>:</td>
											<td><?php echo $data['pekerjaan_ayah'] ?></td>
										</tr>
										<tr>
											<td>Alamat Ayah</td>
											<td>:</td>
											<td><?php echo $data['alamat_ayah'] ?></td>
										</tr>
										<tr>
											<td>Nama Ibu</td>
											<td>:</td>
											<td><?php echo ucwords($data['nama_ibu']) ?></td>
										</tr>
										<tr>
											<td>Pekerjaan Ibu</td>
											<td>:</td>
											<td><?php echo ucwords($data['pekerjaan_ibu']) ?></td>
										</tr>
										<tr>
											<td>Alamat Ibu</td>
											<td>:</td>
											<td><?php echo ucwords($data['alamat_ibu']) ?></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-12">
								<section class="section">
									<div class="section-header">
										<h1>Suami / Istri</h1>
									</div>
							</div>

							<div class="col-12">
								<table class="table table-striped" id="table-1">
									<tbody>
										<tr>
											<td>Suami / Istri</td>
											<td>:</td>
											<td><?php echo ucwords($data['nama_dia']) ?></td>
										</tr>
										<tr>
											<td>Tempat Tanggal Lahir</td>
											<td>:</td>
											<td><?php echo ucwords($data['tempat_lahir_dia'].", ".$data['tgl_lahir_dia']) ?></td>
										</tr>
										<tr>
											<td>Pekerjaan</td>
											<td>:</td>
											<td><?php echo ucwords($data['pekerjaan_dia']) ?></td>
										</tr>
										<tr>
											<td>NIK</td>
											<td>:</td>
											<td><?php echo ucwords($data['nik_dia']) ?></td>
										</tr>
										<tr>
											<td>Kebangsaan</td>
											<td>:</td>
											<td><?php echo ucwords($data['kebangsaan_dia']) ?></td>
										</tr>
										<tr>
											<td>Nama Ayah</td>
											<td>:</td>
											<td><?php echo ucwords($data['nama_ayah_dia']) ?></td>
										</tr>
										<tr>
											<td>Pekerjaan Ayah</td>
											<td>:</td>
											<td><?php echo ucwords($data['pekerjaan_ayah_dia']) ?></td>
										</tr>
										<tr>
											<td>Alamat Ayah</td>
											<td>:</td>
											<td><?php echo ucwords($data['alamat_ayah_dia']) ?></td>
										</tr>
										<tr>
											<td>Nama Ibu</td>
											<td>:</td>
											<td><?php echo ucwords($data['nama_ibu_dia']) ?></td>
										</tr>
										<tr>
											<td>Pekerjaan Ibu</td>
											<td>:</td>
											<td><?php echo ucwords($data['pekerjaan_ibu_dia']) ?></td>
										</tr>
										<tr>
											<td>Alamat Ibu</td>
											<td>:</td>
											<td><?php echo ucwords($data['alamat_ibu_dia']) ?></td>
										</tr>
										<tr>
											<td>Tempat Nikah</td>
											<td>:</td>
											<td><?php echo ucwords($data['tempat_kawin']) ?></td>
										</tr>
										<tr>
											<td>Tanggal Nikah</td>
											<td>:</td>
											<td><?php echo ucwords($data['tanggal_kawin']) ?></td>
										</tr>
									</tbody>
								</table>
							</div>	

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
