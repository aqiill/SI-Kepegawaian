<?php 
  $id = (($data['id_pangkat']*8*42/2)/2);
  $link = base64_encode($id);
  $link = str_replace('=', '', $link);
 ?>
<form method="POST" action="<?php echo base_url('pangkat/edit_proses/'.$link) ?>">
<div class="main-content">
	<section class="section">
 


		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url('pangkat') ?>" class="btn btn-outline-success">Kembali</a>
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
									<label>Pangkat</label>
									<select class="form-control" name="pangkat">
										<option selected disabled>Pilih</option>
										<?php foreach ($pangkat as $pangkatgolongan): ?>
											<option value="<?php echo $pangkatgolongan->id_pangkatgolongan ?>" <?php if($data['pangkat']==$pangkatgolongan->id_pangkatgolongan){echo "selected";} ?>><?php echo $pangkatgolongan->nama_pangkatgolongan; ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>TMT Pangkat</label>
									<input type="date" class="form-control" name="tmt_pangkat"
										placeholder="TMT Pangkat" value="<?php echo $data['tmt_pangkat'] ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Pengesah SK</label>
									<input type="text" class="form-control" name="pengesah_sk"
										placeholder="Pengesah SK" value="<?php echo $data['pengesah_sk'] ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>No SK</label>
									<input type="text" class="form-control" name="no_sk"
										placeholder="No SK" value="<?php echo $data['no_sk'] ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Tanggal SK</label>
									<input type="date" class="form-control" name="tgl_sk"
										placeholder="Tanggal SK" value="<?php echo $data['tgl_sk'] ?>"
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