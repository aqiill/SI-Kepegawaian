<?php

//Notifikasi input error
echo validation_errors('<div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> ','</div>');

//Open form

  $id = (($data['id_pasutri']*8*42/2)/2);
  $link = base64_encode($id);
  $link = str_replace('=', '', $link);

echo form_open(base_url('pasutri/edit_proses/'.$link));
?>

<div class="main-content">
	<section class="section">
 


		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url('pasutri') ?>" class="btn btn-outline-success">Kembali</a>
					</div>
					<div class="card-body">
						<div class="row row-centered">
							<div class="col-12">
								<div class="form-group">
									<label>Nama Pegawai</label>
									<select class="form-control myselect" name="id_pegawai">
										<option selected disabled>Pilih</option>
										<?php foreach ($pegawai as $value): ?>
											<?php 
												$id = (($value->id_pegawai*8*42/2)/2);
												$link = base64_encode($id);
												$link = str_replace('=', '', $link);
											 ?>											
											<option <?php if($data['id_pegawai'] == $value->id_pegawai){echo "selected";} ?> value="<?php echo $link ?>"><?php echo strtoupper($value->nama_pegawai) ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Nama Pasangan</label>
									<input type="text" class="form-control" name="nama_pasutri"
										placeholder="Nama Pasangan" value="<?php echo $data['nama_pasutri'] ?>"
										required>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Tanggal Nikah</label>
									<input type="date" class="form-control" name="tgl_nikah"
										placeholder="Tanggal Nikah"
										value="<?php echo $data['tgl_nikah'] ?>" required>
								</div>
							</div>

							<div class="col-12">
								<div class="form-group">
									<label>No Kartu</label>
									<input type="number" class="form-control" name="no_kartu" placeholder="No Kartu"
										value="<?php echo $data['no_kartu'] ?>" required>
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