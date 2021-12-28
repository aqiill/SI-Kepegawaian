
<form method="POST" enctype="multipart/form-data" action="<?php echo base_url('datapegawai/tambah') ?>">
<div class="main-content">
	<section class="section">
 


		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url('datapegawai') ?>" class="btn btn-outline-success">Kembali</a>
					</div>
					<div class="card-body">
						<div class="row row-centered">
							<?php 
								if ($this->session->userdata('level')=="admin"){ ?>

							<div class="col-12">
								<div class="form-group">
									<label>Unit Kerja</label>
									<select class="form-control myselect" name="id_unitkerja">
										<option selected disabled>Pilih</option>
										<?php foreach ($unitkerja as $value): ?>
											<?php 
												$id = (($value->id_unitkerja*8*42/2)/2);
												$link = base64_encode($id);
												$link = str_replace('=', '', $link);
											 ?>
											<option value="<?php echo $link ?>"><?php echo strtoupper($value->nama_unitkerja) ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<?php	}
							 ?>

							<div class="col-6">
								<div class="form-group">
									<label>Nama Pegawai</label>
									<input type="text" class="form-control" name="nama_pegawai"
										placeholder="Nama Pegawai" value="<?php echo set_value('nama_pegawai') ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>NIP</label>
									<input type="number" maxlength="18" class="form-control" name="nip_pegawai" placeholder="NIP Pegawai"
										value="<?php echo set_value('telp') ?>">
								</div>
							</div>

							<div class="col-4">
								<div class="form-group">
									<label>Jenis Kelamin</label>
									<select class="form-control" name="jk_pegawai">
										<option selected disabled>Pilih</option>
										<option value="l">Laki - Laki</option>
										<option value="p">Perempuan</option>
									</select>
								</div>
							</div>

							<div class="col-4">
								<div class="form-group">
									<label>Tempat Lahir</label>
									<input type="text" class="form-control" name="tempatlahir_pegawai"
										placeholder="Tempat Lahir" value="<?php echo set_value('tempatlahir_pegwai') ?>"
										required>
								</div>
							</div>

							<div class="col-4">
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<input type="date" class="form-control" name="tgllahir_pegawai"
										placeholder="Tanggal Lahir" value="<?php echo set_value('tgllahir_pegwai') ?>"
										required>
								</div>
							</div>

							<div class="col-4">
								<div class="form-group">
									<label>Gol Darah</label>
									<select class="form-control" name="goldarah">
										<option selected disabled>Pilih</option>
										<option value="A">A</option>
										<option value="B">B</option>
										<option value="AB">AB</option>
										<option value="O">O</option>
									</select>
								</div>
							</div>

							<div class="col-4">
								<div class="form-group">
									<label>Agama</label>
									<select class="form-control" name="agama">
										<option selected disabled>Pilih</option>
										<option value="islam">Islam</option>
										<option value="kristen">Kristen</option>
										<option value="protestan">Protestan</option>
										<option value="hindu">Hindu</option>
										<option value="budha">Budha</option>
										<option value="konghucu">Kong Hu Cu</option>
									</select>
								</div>
							</div>
							
							<div class="col-4">
								<div class="form-group">
									<label>Hp</label>
									<input type="number" class="form-control" name="hp" placeholder="Hp"
										value="<?php echo set_value('hp') ?>" required>
								</div>
							</div>

							<div class="col-4">
								<div class="form-group">
									<label>Email</label>
									<input type="email" class="form-control" name="email_pegawai" placeholder="email"
										value="<?php echo set_value('email') ?>" required>
								</div>
							</div>

							<div class="col-4">
								<div class="form-group">
									<label>Pendidikan Terakhir</label>
									<select class="form-control myselect" name="pendidikan_terakhir" required>
										<option selected disabled>Pilih</option>
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

							<div class="col-4">
								<div class="form-group">
									<label>Status</label>
									<select class="form-control" name="status_pegawai" required>
										<option selected disabled>Pilih</option>
										<option value="pns">PNS</option>
										<option value="honor">Honor</option>
									</select>
								</div>
							</div>
							
							<div class="col-6">
								<div class="form-group">
									<label>Alamat</label>
									<input type="text" class="form-control" name="alamat_pegawai"
										placeholder="Alamat"
										value="<?php echo set_value('alamat') ?>" required>
								</div>
							</div>
							
							<div class="col-6">
								<div class="form-group">
									<label>Foto</label>
									<input type="file" class="form-control" name="foto"
										placeholder="Foto"
										value="<?php echo set_value('alamat') ?>" required>
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