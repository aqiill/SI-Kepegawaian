<?php 
  $id = (($data['id_bahasa']*8*42/2)/2);
  $link = base64_encode($id);
  $link = str_replace('=', '', $link);
 ?>
<form method="POST" action="<?php echo base_url('bahasa/edit_proses/'.$link) ?>">
<div class="main-content">
	<section class="section">
 


		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url('bahasa') ?>" class="btn btn-outline-success">Kembali</a>
					</div>
					<div class="card-body">

						<div class="row row-centered">
							<div class="col-6">
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
											<option <?php if($data['id_pegawai']==$value->id_pegawai){echo "selected";} ?> value="<?php echo $link ?>"><?php echo strtoupper($value->nama_pegawai) ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Jenis Bahasa</label>
									<input type="text" class="form-control" name="jenis_bahasa"
										placeholder="Jenis Bahasa" value="<?php echo $data['jenis_bahasa'] ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Bahasa</label>
									<input type="text" class="form-control" name="bahasa"
										placeholder="Bahasa" value="<?php echo $data['bahasa'] ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Kemampuan Bicara</label>
									<select class="form-control" name="kemampuan_bicara">
										<option selected disabled>Pilih</option>
										<option <?php if($data['kemampuan_bicara']=="aktif"){echo "selected";} ?> value="aktif">Aktif</option>
										<option <?php if($data['kemampuan_bicara']=="pasif"){echo "selected";} ?> value="pasif">Pasif</option>
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