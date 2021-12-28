
<form method="POST" action="<?php echo base_url('penghargaan/tambah') ?>">
<div class="main-content">
	<section class="section">
 


		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url('penghargaan') ?>" class="btn btn-outline-success">Kembali</a>
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

							<div class="col-12">
								<div class="form-group">
									<label>Perihal</label>
									<input type="text" class="form-control" name="perihal"
										placeholder="Perihal" value="<?php echo set_value('perihal') ?>"
										required>
								</div>
							</div>

							<div class="col-4">
								<div class="form-group">
									<label>Tingkat</label>
									<input type="text" class="form-control" name="tingkat"
										placeholder="Tingkat" value="<?php echo set_value('tingkat') ?>"
										required>
								</div>
							</div>

							<div class="col-4">
								<div class="form-group">
									<label>Ranking</label>
									<input type="text" class="form-control" name="ranking"
										placeholder="Ranking" value="<?php echo set_value('ranking') ?>"
										required>
								</div>
							</div>

							<div class="col-4">
								<div class="form-group">
									<label>Tanggal</label>
									<input type="date" class="form-control" name="tgl_penghargaan"
										placeholder="Tanggal" value="<?php echo set_value('tgl_penghargaan') ?>"
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