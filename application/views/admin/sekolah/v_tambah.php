
<form method="POST" action="<?php echo base_url('sekolah/tambah') ?>">
<div class="main-content">
	<section class="section">
 


		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url('sekolah') ?>" class="btn btn-outline-success">Kembali</a>
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
									<label>Tingkat Sekolah</label>
									<select class="form-control myselect" name="tingkat_sekolah">
										<option selected disabled>Pilih</option>
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
									<label>Nama Sekolah</label>
									<input type="text" class="form-control" name="nama_sekolah_pendidikan"
										placeholder="Nama Sekolah" value="<?php echo set_value('nama_sekolah_pendidikan') ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Alamat Sekolah</label>
									<input type="text" class="form-control" name="alamat_sekolah"
										placeholder="Alamat Sekolah" value="<?php echo set_value('alamat_sekolah') ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Jurusan</label> 
									<input type="text" class="form-control" name="jurusan" required
										placeholder="Jurusan" value="<?php echo set_value('jurusan') ?>"
										>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>No Ijazah</label>
									<input type="text" class="form-control" name="nomor_ijazah"
										placeholder="No Ijazah" value="<?php echo set_value('nomor_ijazah') ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Tanggal Ijazah</label>
									<input type="date" class="form-control" name="tgl_ijazah"
										placeholder="Tanggal Ijazah" value="<?php echo set_value('tgl_ijazah') ?>"
										required>
								</div>
							</div>

							<div class="col-12">
								<div class="form-group">
									<label>Nama Kepala Sekolah / Rektor</label>
									<input type="text" class="form-control" name="nama_kepsek_rektor"
										placeholder="Kepala Sekolah / Rektor" value="<?php echo set_value('jurusan') ?>"
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