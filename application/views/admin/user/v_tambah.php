
<form method="POST" enctype="multipart/form-data" action="<?php echo base_url('user/tambah') ?>">
<div class="main-content">
	<section class="section">
 


		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url('user') ?>" class="btn btn-outline-success">Kembali</a>
					</div>
					<div class="card-body">
						<div class="row row-centered">
							<div class="<?php if ($this->session->userdata('level')=="admin"){echo 'col-12';}else{echo 'col-6';} ?> ">
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

							<?php 
								if ($this->session->userdata('level')=="admin") { ?>


							<div class="col-6">
								<div class="form-group">
									<label>Level</label>
									<select class="form-control" name="level" required>
										<option selected disabled>Pilih</option>
										<?php 
										if ($this->session->userdata('level')=="admin") { ?>
										<option value="<?php echo base64_encode('operator') ?>">Operator</option>
										<?php } ?>
										<option value="<?php echo base64_encode('guru') ?>">Guru</option>
									</select>
								</div>
							</div>
							<?php } ?>

							<div class="col-6">
								<div class="form-group">
									<label>Status</label>
									<select class="form-control" name="status">
										<option selected disabled>Pilih</option>
										<option value="1">Aktif</option>
										<option value="0">Nonaktif</option>
									</select>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Username</label>
									<input type="text" class="form-control" name="username"
										value="<?php echo set_value('username') ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Password</label>
									<input type="password" class="form-control" name="password"
										value="<?php echo set_value('password') ?>"
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