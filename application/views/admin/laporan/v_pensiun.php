<div class="main-content">
	<section class="section">
 


		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">

							<table class="table table-striped display" id="table-1">
								<thead>
									<tr>
										<th class="text-center">
											#
										</th>
										<th>NIP</th>
										<th>Nama</th>
										<th>TTL</th>
										<th>JK</th>
										<th>No Telp</th>
										<th>Tanggal Pensiun</th>
									</tr>
								</thead>
								<tbody>
	                              <?php
	                              	$no = 1;
	                              	foreach ($pegawai as $value) { 
	                              	$tgllahir 		= $value->tgllahir_pegawai;
	                              	$tahunpensiun	= date('d-n-Y', strtotime('+60 year',strtotime($tgllahir)));
	                              ?>
	                              	<tr>
	                              		<td><?php echo $no++; ?></td>
	                              		<td><?php echo $value->nip_pegawai; ?></td>
	                              		<td><?php echo ucwords($value->nama_pegawai); ?></td>
	                              		<td><?php echo ucwords($value->tempatlahir_pegawai.', '.date('d-m-Y', strtotime($value->tgllahir_pegawai))); ?></td>
	                              		<td><?php echo ucwords($value->jk_pegawai); ?></td>
	                              		<td><?php echo $value->hp; ?></td>
	                              		<td><?php echo $tahunpensiun; ?></td>
	                              	</tr>
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
	</section>
</div>