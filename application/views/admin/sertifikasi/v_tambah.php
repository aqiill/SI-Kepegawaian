
<form method="POST" action="<?php echo base_url('sertifikasi/tambah') ?>">
<div class="main-content">
	<section class="section">
 


		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url('sertifikasi') ?>" class="btn btn-outline-success">Kembali</a>
					</div>
					<div class="card-body">
						<div class="row row-centered">
							<div class="col-12">
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
									<label>No Sertifikat Sertifikasi</label>
									<input type="text" class="form-control" name="no_sertifikat_sertifikasi"
										placeholder="No Sertifikat Sertifikasi" value="<?php echo set_value('no_sertifikat_sertifikasi') ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>No Peserta</label>
									<input type="text" class="form-control" name="no_peserta"
										placeholder="No Peserta" value="<?php echo set_value('no_peserta') ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Mata Pelajaran</label>
									<input type="text" class="form-control" name="mapel_sertifikasi"
										placeholder="Mata Pelajaran" value="<?php echo set_value('mapel_sertifikasi') ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Tahun</label>
									<input type="number" class="form-control" name="tahun_sertifikasi"
										placeholder="Tahun" value="<?php echo set_value('tahun_sertifikasi') ?>"
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