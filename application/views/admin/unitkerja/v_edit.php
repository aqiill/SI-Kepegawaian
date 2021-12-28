<?php

//Notifikasi input error
echo validation_errors('<div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> ','</div>');
$id = (($data['id_unitkerja']*8*42/2)/2);
$link = base64_encode($id);
$link = str_replace('=', '', $link);
//Open form
echo form_open(base_url('unitkerja/edit_proses/'.$link));
?>

<div class="main-content">
	<section class="section">
 


		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url('unitkerja') ?>" class="btn btn-outline-success">Kembali</a>
					</div>
					<div class="card-body">
						<div class="row row-centered">
							<div class="col-6">
								<div class="form-group">
									<label>Nama Unit Kerja (Sekolah)</label>
									<input type="text" class="form-control" name="nama_unitkerja"
										placeholder="Nama Unit Kerja" value="<?php echo $data['nama_unitkerja']; ?>"
										required>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Wilayah</label>
									<select class="form-control myselect" name="id_wilayah">
										<option selected disabled>Pilih</option>
										<?php foreach ($wilayah as $value): ?>
											<?php 
												$id = (($value->id_wilayah*8*42/2)/2);
												$link = base64_encode($id);
												$link = str_replace('=', '', $link);
											 ?>											
											<option <?php if ($value->id_wilayah == $data['id_wilayah']) {echo "selected";} ?> value="<?php echo $link ?>"><?php echo ucwords($value->nama_wilayah) ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Alamat</label>
									<input type="text" class="form-control" name="alamat"
										placeholder="Alamat Unit Kerja"
										value="<?php echo $data['alamat']; ?>" required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Kepala Sekolah</label>
									<input type="text" class="form-control" name="kepsek" placeholder="Kepala Sekolah"
										value="<?php echo $data['kepsek']; ?>" required>
								</div>
							</div>

							<div class="col-4">
								<div class="form-group">
									<label>Status</label>
									<select class="form-control " name="status_unitkerja">
										<option selected disabled>Pilih</option>
										<option <?php if($data['status_unitkerja'] == "negeri"){echo "selected";} ?> value="negeri">Negeri</option>
										<option <?php if($data['status_unitkerja'] == "swasta"){echo "selected";} ?> value="swasta"> Swasta</option>
									</select>
								</div>
							</div>

							<div class="col-4">
								<div class="form-group">
									<label>NPSN Sekolah</label>
									<input type="text" maxlength="8" class="form-control" name="npsn" placeholder="NPSN Sekolah"
										value="<?php echo $data['npsn']; ?>" required>
								</div>
							</div>

							<div class="col-4">
								<div class="form-group">
									<label>Email</label>
									<input type="email" class="form-control" name="email" placeholder="Email Sekolah"
										value="<?php echo $data['email_sekolah']; ?>" required>
								</div>
							</div>

							<div class="col-4">
								<div class="form-group">
									<label>Latitude</label>
									<input type="text" class="form-control" name="latitude" placeholder="Latitude"
										value="<?php echo $data['latitude']; ?>">
								</div>
							</div>
							<div class="col-4">
								<div class="form-group">
									<label>Longitude</label>
									<input type="text" class="form-control" name="longitude" placeholder="Longitude"
										value="<?php echo $data['longitude']; ?>">
								</div>
							</div>
							<div class="col-4">
								<div class="form-group">
									<label>Website</label>
									<input type="text" class="form-control" name="website" placeholder="Website Sekolah"
										value="<?php echo $data['website']; ?>">
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