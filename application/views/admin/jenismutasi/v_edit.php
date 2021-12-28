<?php

//Notifikasi input error
echo validation_errors('<div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> ','</div>');

//Open form
$id = (($data['id_jenis_mutasi']*8*42/2)/2);
$link = base64_encode($id);
$link = str_replace('=', '', $link);
echo form_open(base_url('jenismutasi/edit_proses/'.$link));
?>

<div class="main-content">
	<section class="section">
 


		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url('jenismutasi') ?>" class="btn btn-outline-success">Kembali</a>
					</div>
					<div class="card-body">

						<div class="row row-centered">
							<div class="col-6">
								<div class="form-group">
									<label>Nama Jenis Murasi</label>
									<input type="text" class="form-control" name="nama_jenis_mutasi"
										placeholder="Nama Jenis Mutasi" value="<?php echo $data['nama_jenis_mutasi'] ?>"
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

<?php
//Form close
echo form_close();
?>