<?php 
  $id = (($data['id_sppd']*8*42/2)/2);
  $link = base64_encode($id);
  $link = str_replace('=', '', $link);
 ?>
<form method="POST" action="<?php echo base_url('sppd/edit_proses/'.$link) ?>">
<div class="main-content">
	<section class="section">
 


		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url('sppd') ?>" class="btn btn-outline-success">Kembali</a>
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
									<label>No SPPD</label>
									<input type="text" class="form-control" name="no_sppd"
										placeholder="No SPPD" value="<?php echo $data['no_sppd'] ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Dari</label>
									<input type="text" class="form-control" name="dari"
										placeholder="Dari" value="<?php echo $data['dari'] ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Tujuan</label>
									<input type="text" class="form-control" name="tujuan"
										placeholder="Tujuan" value="<?php echo $data['tujuan'] ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Perihal</label>
									<input type="text" class="form-control" name="perihal"
										placeholder="Perihal" value="<?php echo $data['perihal'] ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Uang Jalan</label>
								      <div class="input-group mb-2">
								        <div class="input-group-prepend">
								          <div class="input-group-text">Rp</div>
								        </div>
								        <input name="uang_jalan" type="number" class="form-control" id="inlineFormInputGroup" placeholder="Uang Jalan" value="<?php echo $data['uang_jalan'] ?>">
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