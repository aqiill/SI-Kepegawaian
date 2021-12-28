
<form method="POST" enctype="multipart/form-data" action="<?php echo base_url('user/gantipassword') ?>">
<div class="main-content">
	<section class="section">
 


		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="row row-centered">
							<div class="col-12">
								<?php 
									if($this->session->flashdata('gagal')){ ?>
									<div class="alert alert-danger" role="alert">
									  <?php echo $this->session->flashdata('gagal'); ?>
									</div>
								<?php	}
								 ?>
							</div>
							
							<div class="col-12">
								<div class="form-group">
									<label>Nama User</label>
									<input type="text" class="form-control" name="nama_user" readonly
										placeholder="Nama User" value="<?php echo ucwords($this->session->userdata('nama_user')) ?>"
										>
								</div>
							</div>

							<div class="col-12">
								<div class="form-group">
									<label>Password Lama</label>
									<input type="password" class="form-control" name="passwordlama"
										value="<?php echo set_value('passwordlama') ?>"
										required>
								</div>
							</div>

							<div class="col-12">
								<div class="form-group">
									<label>Password Baru</label>
									<input type="password" class="form-control" name="passwordbaru"
										value="<?php echo set_value('passwordbaru') ?>"
										required>
								</div>
							</div>

							<div class="col-12">
								<div class="form-group">
									<label>Konfirmasi Password</label>
									<input type="password" class="form-control" name="konfirmasipasswordbaru"
										value="<?php echo set_value('konfirmasipasswordbaru') ?>"
										required>
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
		</div>
	</section>
</div>

</form>