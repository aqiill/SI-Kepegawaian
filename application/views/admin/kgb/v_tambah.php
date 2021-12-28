
<form method="POST" action="<?php echo base_url('kgb/tambah') ?>">
<div class="main-content">
	<section class="section">
 


		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url('kgb') ?>" class="btn btn-outline-success">Kembali</a>
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
											<option value="<?php echo $link ?>"><?php echo strtoupper($value->nama_pegawai) ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Golongan</label>
									<input type="text" class="form-control" name="golongan"
										placeholder="Golongan" value="<?php echo set_value('golongan') ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>TMT KGB</label>
									<input type="date" class="form-control" name="tmt_kgb"
										placeholder="TMT KGB" value="<?php echo set_value('tmt_kgb') ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Gaji</label>
								      <div class="input-group mb-2">
								        <div class="input-group-prepend">
								          <div class="input-group-text">Rp</div>
								        </div>
								        <input name="gaji" type="number" class="form-control" id="inlineFormInputGroup" placeholder="Gaji">
								      </div>									
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