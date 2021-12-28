<div class="main-content">
	<section class="section">
 


		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped display" id="table-1">
								<thead align="center">
									<tr>
										<th rowspan="2" class="text-center">
											#
										</th>
										<th>Nama</th>
										<th rowspan="2">NIP</th>
										<th colspan="2">PKT Terakhir</th>
										<th colspan="2">Jabatan</th>
										<th rowspan="2">ESL</th>
										<th colspan="2">MK GOL</th>
										<th colspan="3">Latihan Jabatan</th>
										<th colspan="3">PEND AKHIR</th>
										<th rowspan="2">KET</th>
									</tr>
									<tr>
										<th>TTL</th>
										<th>Pangkat Gol/Ruang</th>
										<th>TMT</th>
										<th>Nama</th>
										<th>TMT</th>
										<th>THN</th>
										<th>BLN</th>
										<th>Nama</th>
										<th>THN</th>
										<th>JLM JAM</th>
										<th>Asal</th>
										<th>T.LLS</th>
										<th>TK.Ijazah</th>
									</tr>
								</thead>
								<tbody>
	                              <?php
	                              	$no = 1;
	                              	foreach ($nominatif as $value) { 

	                              ?>

	                              <!-- <?php echo "<pre>"; print_r($value); echo "</pre>"; ?> -->
	                              	 <tr>
	                              		<td><?php echo $no++; ?></td>
	                              		<td><?php echo ucwords($value->nama_pegawai); ?>
	                              			<br><?php echo ucwords($value->tempatlahir_pegawai.', '.$value->tgllahir_pegawai); ?>
	                              		<td><?php echo ucwords($value->nip_pegawai); ?></td>
	                              		<td><?php echo ucwords($value->nama_pangkatgolongan); ?></td>
	                              		<td><?php echo ucwords($value->tmt_pangkat); ?></td>
	                              		<td><?php echo ucwords($value->nama_jabatan); ?></td>
	                              		<td><?php echo ucwords($value->tgl_sk); ?></td>
	                              		<td></td>
	                              		<td></td>
	                              		<td></td>
	                              		<td></td>
	                              		<td></td>
	                              		<td></td>
	                              		<td></td>
	                              		<td></td>
	                              		<td></td>
	                              		<td><?php echo strtoupper($value->status_pegawai); ?></td>
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