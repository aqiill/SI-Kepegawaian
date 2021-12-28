<?php 
  $id = (($data['id_tunjangan']*8*42/2)/2);
  $link = base64_encode($id);
  $link = str_replace('=', '', $link);
 ?>
<form method="POST" action="<?php echo base_url('tunjangan/edit_proses/'.$link) ?>">
<div class="main-content">
	<section class="section">
 


		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url('tunjangan') ?>" class="btn btn-outline-success">Kembali</a>
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
									<label>No Tunjangan</label>
									<input type="text" class="form-control" name="no_tunjangan"
										placeholder="No Tunjangan" value="<?php echo $data['no_tunjangan'] ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Tanggal Tunjangan</label>
									<input type="date" class="form-control" name="tgl_tunjangan"
										placeholder="Tanggal Tunjangan" value="<?php echo $data['tgl_tunjangan'] ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Jenis Tunjangan</label>
									<input type="text" class="form-control" name="jenis_tunjangan"
										placeholder="Jenis Tunjangan" value="<?php echo $data['jenis_tunjangan'] ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>TMT Tunjangan</label>
									<input type="date" class="form-control" name="tmt_tunjangan"
										placeholder="TMT Tunjangan" value="<?php echo $data['tmt_tunjangan'] ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Perkawinan dari</label>
									<input type="text" class="form-control" name="perkawinan_dari"
										placeholder="Perkawinan dari" value="<?php echo $data['perkawinan_dari'] ?>"
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