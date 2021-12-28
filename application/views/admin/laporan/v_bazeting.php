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
										<th>Nama <br>Tempat, Taggal Lahir</th>
										<th>NIP</th>
										<th>Pangkat Gol/Ruang</th>
										<th>Jabatan</th>
										<th>Pendidikan Terakhir</th>
										<th>Umur</th>
										<th>Ket</th>
									</tr>
								</thead>
								<tbody>
	                              <?php
	                              	$no = 1;
	                              	foreach ($bazeting as $value) { 
									$birthDate = new DateTime($value->tgllahir_pegawai);
									$today = new DateTime("today");

									$y = $today->diff($birthDate)->y;

	                              ?>

	                              <!-- <?php echo "<pre>"; print_r($value); echo "</pre>"; ?> -->
	                              	 <tr>
	                              		<td><?php echo $no++; ?></td>
	                              		<td><?php echo ucwords($value->nama_pegawai); ?><br><?php echo ucwords($value->tempatlahir_pegawai.', '.$value->tgllahir_pegawai); ?></td>
	                              		<td><?php echo ucwords($value->nip_pegawai); ?></td>
	                              		<td><?php echo ucwords($value->nama_pangkatgolongan); ?></td>
	                              		<td><?php echo ucwords($value->nama_jabatan); ?></td>
	                              		<td><?php echo ucwords($value->pendidikan_terakhir); ?></td>
	                              		<td><?php echo ucwords($y); ?></td>
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