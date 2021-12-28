<?php

//Notifikasi input error
echo validation_errors('<div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> ','</div>');

//Open form
$id = (($data['id_cabdin']*8*42/2)/2);
$link = base64_encode($id);
$link = str_replace('=', '', $link);
echo form_open(base_url('cabangdinas/edit_proses/'.$link));
?>

<div class="main-content">
	<section class="section">
 

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url('cabangdinas') ?>" class="btn btn-outline-success">Kembali</a>
					</div>
					<div class="card-body">

						<div class="row row-centered">
							<div class="col-6">
								<div class="form-group">
									<label>Cabang Dinas</label>
									<input type="text" class="form-control" name="cabdin"
										placeholder="Cabang Dinas" value="<?php echo $data['cabdin'] ?>"
										required>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Pimpinan</label>
									<input type="text" class="form-control" name="pimpinan"
										placeholder="Pimpinan" value="<?php echo $data['pimpinan_cabdin'] ?>"
										required>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Alamat</label>
									<input type="text" class="form-control" name="alamat"
										placeholder="Alamat Cabang Dinas"
										value="<?php echo $data['alamat_cabdin'] ?>" required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Email</label>
									<input type="email" class="form-control" name="email" placeholder="email"
										value="<?php echo $data['email_cabdin'] ?>" required>
								</div>
							</div>

							<div class="col-4">
								<div class="form-group">
									<label>Telp</label>
									<input type="number" class="form-control" name="telp" placeholder="Telp"
										value="<?php echo $data['telp_cabdin'] ?>" required>
								</div>
							</div>

							<div class="col-8">
								<div class="form-group">
									<label>Website</label>
									<input type="text" class="form-control" name="website" placeholder="Website"
										value="<?php echo $data['website_cabdin'] ?>">
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

<?php
//Form close
echo form_close();
?>