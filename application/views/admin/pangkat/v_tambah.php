
<form method="POST" action="<?php echo base_url('pangkat/tambah') ?>">
<div class="main-content">
	<section class="section">
 


		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url('pangkat') ?>" class="btn btn-outline-success">Kembali</a>
					</div>
					<div class="card-body">

						<div class="row row-centered">
							<div class="col-6">
								<div class="form-group">
									<label>Pegawai</label>
									<select class="form-control myselect" name="id_pegawai">
										<option selected disabled>Pilih</option>
										<?php foreach ($pegawai as $value): ?>
											<?php 
												$id = (($value->id_pegawai*8*42/2)/2);
												$link = base64_encode($id);
												$link = str_replace('=', '', $link);
											 ?>											
											<option value="<?php echo $link ?>"><?php echo strtoupper($value->nama_pegawai) ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Pangkat</label>
									<select class="form-control myselect" name="pangkat">
											<option disabled selected>Pilih</option>
										<?php foreach ($pangkat as $pangkatgolongan): ?>
											<option value="<?php echo $pangkatgolongan->id_pangkatgolongan; ?>"><?php echo $pangkatgolongan->nama_pangkatgolongan; ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>TMT Pangkat</label>
									<input type="date" class="form-control" name="tmt_pangkat"
										placeholder="TMT Pangkat" value="<?php echo set_value('tmt_pangkat') ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Pengesah SK</label>
									<input type="text" class="form-control" name="pengesah_sk"
										placeholder="Pengesah SK" value="<?php echo set_value('pengesah_sk') ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>No SK</label>
									<input type="text" class="form-control" name="no_sk"
										placeholder="No SK" value="<?php echo set_value('no_sk') ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Tanggal SK</label>
									<input type="date" class="form-control" name="tgl_sk"
										placeholder="Tanggal SK" value="<?php echo set_value('tgl_sk') ?>"
										required>
								</div>
							</div>

						</div>
					</div>
						<div class="card-footer text-right">
							<button class="btn btn-primary mr-1" type="submit">Simpan</button>
							<button class="btn btn-secondary" type="reset">Reset</button>
						</div>
				</div>
			</div>
		</div>
	</section>
</div>

</form>