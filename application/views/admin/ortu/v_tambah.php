
<form method="POST" action="<?php echo base_url('ortu/tambah') ?>">
<div class="main-content">
	<section class="section">
 


		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url('ortu') ?>" class="btn btn-outline-success">Kembali</a>
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
									<label>Nama Orang Tua</label>
									<input type="text" class="form-control" name="nama_ortu"
										placeholder="Nama Orang Tua" value="<?php echo set_value('nama_ortu') ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Tempat Lahir</label>
									<input type="text" class="form-control" name="tempat_lahir_ortu"
										placeholder="Tempat Lahir" value="<?php echo set_value('tempatlahir_ortu') ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<input type="date" class="form-control" name="tgl_lahir_ortu"
										placeholder="Tanggal Lahir" value="<?php echo set_value('tgllahir_ortu') ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Jenis Kelamin</label>
									<select class="form-control" name="jk_ortu">
										<option selected disabled>Pilih</option>
										<option value="l">Laki - Laki</option>
										<option value="p">Perempuan</option>
									</select>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Pendidkan Ortu</label>
									<select class="form-control" name="pendidikan_ortu">
										<option selected disabled>Pilih</option>
										<option value="Tidak Sekolah">Tidak Sekolah</option>
										<option value="PAUD">PAUD</option>
										<option value="TK">TK</option>
										<option value="SD">SD</option>
										<option value="SLTP">SLTP</option>
										<option value="SLTA">SLTA</option>
										<option value="D1">D1</option>
										<option value="D2">D2</option>
										<option value="D3">D3</option>
										<option value="D4">D4</option>
										<option value="S1">S1</option>
										<option value="S2">S2</option>
										<option value="S3">S3</option>
									</select>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Status</label>
									<select required class="form-control" name="status_hub_ortu">
										<option selected disabled>Pilih</option>
										<option value="Ayah Kandung">Ayah Kandung</option>
										<option value="Ibu Kandung">Ibu Kandung</option>
									</select>
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