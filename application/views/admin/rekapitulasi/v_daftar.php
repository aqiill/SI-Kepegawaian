<div class="main-content">

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="row row-centered">

						<div class="col-12">

							<p>

								<a class="btn btn-primary" data-toggle="collapse" href="#golongan" role="button" aria-expanded="false" aria-controls="collapseExample">
									Golongan
								</a>
								
								<a class="btn btn-primary" data-toggle="collapse" href="#pendidikan" role="button" aria-expanded="false" aria-controls="collapseExample">
									Pendidikan
								</a>
								
								<a class="btn btn-primary" data-toggle="collapse" href="#unitkerja" role="button" aria-expanded="false" aria-controls="collapseExample">
									Unit Kerja
								</a>
								
								<a class="btn btn-primary" data-toggle="collapse" href="#pnssertifikasi" role="button" aria-expanded="false" aria-controls="collapseExample">
									PNS Sertifikasi
								</a>
								
								<a class="btn btn-primary" data-toggle="collapse" href="#pns" role="button" aria-expanded="false" aria-controls="collapseExample">
									PNS
								</a>
								
								<a class="btn btn-primary" data-toggle="collapse" href="#honor" role="button" aria-expanded="false" aria-controls="collapseExample">
									Honor
								</a>
							</p>

							<div class="collapse show" id="golongan">
								<br><h3>Golongan</h3>
								<div class="table-responsive">
									<table class="table table-striped  display" id="table-1">
										<thead>
											<tr>
												<th class="text-center">
													#
												</th>
												<th>Golongan</th>
												<th>Jumlah</th>
											</tr>
										</thead>
										<tbody>
											<?php $no=1; foreach ($pangkatgolongan as $value): ?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><?php echo ucwords($value->nama_pangkatgolongan); ?></td>
												<td><?php echo ucwords($value->total); ?></td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>	
						</div>

						<div class="collapse" id="pendidikan">
							<br><h3>Pendidikan</h3>
							<div class="table-responsive">
								<table class="table table-striped  display" id="table-1">
									<thead>
										<tr>
											<th class="text-center">
												#
											</th>
											<th>Pendidikan Terakhir</th>
											<th>Jumlah</th>
										</tr>
									</thead>
									<tbody>
										<?php $no=1; foreach ($pendidikan as $value): ?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo ucwords($value->pendidikan_terakhir); ?></td>
											<td><?php echo ucwords($value->total); ?></td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>	
					</div>

					<div class="collapse" id="unitkerja">
						<br><h3>Unit Kerja</h3>
						<div class="table-responsive">
							<table class="table table-striped  display" id="table-1">
								<thead>
									<tr>
										<th class="text-center">
											#
										</th>
										<th>Unit Kerja</th>
										<th>Jumlah Pegawai</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; foreach ($unitkerja as $value): ?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo strtoupper($value->nama_unitkerja); ?></td>
										<td><?php echo strtoupper($value->total); ?></td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>		
				</div>

				<div class="collapse" id="pnssertifikasi">
					<br><h3>PNS Sertifikasi</h3>
					<div class="table-responsive">
						<table class="table table-striped  display" id="table-1">
							<thead>
								<tr>
									<th class="text-center">
										#
									</th>
									<th>Unit Kerja</th>
									<th>Jumlah Pegawai</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach ($pnssertifikasi as $value): ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo strtoupper($value->nama_unitkerja); ?></td>
									<td><?php echo strtoupper($value->total); ?></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>	
			</div>

			<div class="collapse" id="pns">
				<br><h3>PNS</h3>
				<div class="table-responsive">
					<table class="table table-striped  display" id="table-1">
						<thead>
							<tr>
								<th class="text-center">
									#
								</th>
								<th>Unit Kerja</th>
								<th>Jumlah</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($pns as $value): ?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo ucwords($value->nama_unitkerja); ?></td>
								<td><?php echo ucwords($value->total); ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>	
		</div>

		<div class="collapse" id="honor">
			<br><h3>Honor</h3>
			<div class="table-responsive">
				<table class="table table-striped  display" id="table-1">
					<thead>
						<tr>
							<th class="text-center">
								#
							</th>
							<th>Unit Kerja</th>
							<th>Jumlah</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($honor as $value): ?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo ucwords($value->nama_unitkerja); ?></td>
							<td><?php echo ucwords($value->total); ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>	
	</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>