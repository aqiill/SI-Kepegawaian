
<form method="POST" action="<?php echo base_url('mutasi/tambah') ?>">
<div class="main-content">
	<section class="section">
 


		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url('mutasi') ?>" class="btn btn-outline-success">Kembali</a>
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
									<label>Jenis Mutasi</label>
									<select required class="form-control myselect" name="id_jenis_mutasi">
										<option selected disabled>Pilih</option>

										<?php foreach ($jenismutasi as $value): ?>
											<option value="<?php echo $value->id_jenis_mutasi ?>"><?php echo strtoupper($value->nama_jenis_mutasi) ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Asal Instansi</label>
									<input type="text" class="form-control" name="asal_instansi"
										placeholder="Asal Instansi" value="<?php echo set_value('asal_instansi') ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Tujuan Instansi</label>
									<select class="form-control myselect" name="id_unitkerja">
										<option selected disabled>Pilih</option>
										<?php foreach ($unitkerja as $value): ?>
											<option value="<?php echo $value->id_unitkerja ?>"><?php echo strtoupper($value->nama_unitkerja) ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>TMT</label>
									<input type="date" class="form-control" name="tmt_mutasi"
										placeholder="TMT" value="<?php echo set_value('tmt_mutasi') ?>"
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