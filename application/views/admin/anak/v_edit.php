<?php 
  $id = (($data['id_anak']*8*42/2)/2);
  $link = base64_encode($id);
  $link = str_replace('=', '', $link);
 ?>
<form method="POST" enctype="multipart/form-data" action="<?php echo base_url('anak/edit_proses/'.$link) ?>">
<div class="main-content">
	<section class="section">
 


		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url('anak') ?>" class="btn btn-outline-success">Kembali</a>
					</div>
					<div class="card-body">
						<div class="row row-centered">
							<div class="col-6">
								<div class="form-group">
									<label>Orang Tua</label>
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
									<label>Nama Anak</label>
									<input type="text" class="form-control" name="nama_anak"
										placeholder="Nama Anak" value="<?php echo $data['nama_anak'] ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Tempat Lahir</label>
									<input type="text" class="form-control" name="tempat_lahir_anak"
										placeholder="Tempat Lahir" value="<?php echo $data['tempat_lahir_anak'] ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<input type="date" class="form-control" name="tgl_lahir_anak"
										placeholder="Tanggal Lahir" value="<?php echo $data['tgl_lahir_anak'] ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Jenis Kelamin</label>
									<select class="form-control" name="jk_anak">
										<option selected disabled>Pilih</option>
										<option <?php if($data['jk_anak']=="l"){echo "selected";} ?> value="l">Laki - Laki</option>
										<option <?php if($data['jk_anak']=="p"){echo "selected";} ?> value="p">Perempuan</option>
									</select>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Pendidkan Anak</label>
									<select class="form-control" name="pendidikan_anak">
										<option selected disabled>Pilih</option>
										<option <?php if($data['pendidikan_anak']=="Belum Sekolah"){echo "selected";} ?> value="Belum Sekolah">Belum Sekolah</option>
										<option <?php if($data['pendidikan_anak']=="PAUD"){echo "selected";} ?> value="PAUD">PAUD</option>
										<option <?php if($data['pendidikan_anak']=="TK"){echo "selected";} ?> value="TK">TK</option>
										<option <?php if($data['pendidikan_anak']=="SD"){echo "selected";} ?> value="SD">SD</option>
										<option <?php if($data['pendidikan_anak']=="SLTP"){echo "selected";} ?> value="SLTP">SLTP</option>
										<option <?php if($data['pendidikan_anak']=="SLTA"){echo "selected";} ?> value="SLTA">SLTA</option>
										<option <?php if($data['pendidikan_anak']=="D1"){echo "selected";} ?> value="D1">D1</option>
										<option <?php if($data['pendidikan_anak']=="D2"){echo "selected";} ?> value="D2">D2</option>
										<option <?php if($data['pendidikan_anak']=="D3"){echo "selected";} ?> value="D3">D3</option>
										<option <?php if($data['pendidikan_anak']=="D4"){echo "selected";} ?> value="D4">D4</option>
										<option <?php if($data['pendidikan_anak']=="S1"){echo "selected";} ?> value="S1">S1</option>
										<option <?php if($data['pendidikan_anak']=="S2"){echo "selected";} ?> value="S2">S2</option>
										<option <?php if($data['pendidikan_anak']=="S3"){echo "selected";} ?> value="S3">S3</option>
									</select>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Pekerjaan Anak</label>
									<input type="text" class="form-control" name="pekerjaan_anak"
										placeholder="Pekerjaan Anak" value="<?php echo $data['pekerjaan_anak'] ?>"
										>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Status</label>
									<select class="form-control" name="status_hub_anak">
										<option selected disabled>Pilih</option>
										<option <?php if($data['status_hub_anak']=="kandung"){echo "selected";} ?> value="kandung">Kandung</option>
										<option <?php if($data['status_hub_anak']=="angkat"){echo "selected";} ?> value="angkat">Angkat</option>
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