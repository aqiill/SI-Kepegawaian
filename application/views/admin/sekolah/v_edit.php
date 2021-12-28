<?php 
  $id = (($data['id_sekolahpegawai']*8*42/2)/2);
  $link = base64_encode($id);
  $link = str_replace('=', '', $link);
 ?>
<form method="POST" action="<?php echo base_url('sekolah/edit_proses/'.$link) ?>">
<div class="main-content">
	<section class="section">
 


		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url('sekolah') ?>" class="btn btn-outline-success">Kembali</a>
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
											<option <?php if($data['id_pegawai']==$value->id_pegawai){echo "selected";} ?> value="<?php echo $link ?>"><?php echo strtoupper($value->nama_pegawai) ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Tingkat Sekolah</label>
									<select class="form-control myselect" name="tingkat_sekolah">
										<option selected disabled>Pilih</option>
										<option <?php if($data['tingkat_sekolah']=="Tidak Sekolah"){echo "selected";} ?> value="Tidak Sekolah">Tidak Sekolah</option>
										<option <?php if($data['tingkat_sekolah']=="PAUD"){echo "selected";} ?> value="PAUD">PAUD</option>
										<option <?php if($data['tingkat_sekolah']=="TK"){echo "selected";} ?> value="TK">TK</option>
										<option <?php if($data['tingkat_sekolah']=="SD"){echo "selected";} ?> value="SD">SD</option>
										<option <?php if($data['tingkat_sekolah']=="SLTP"){echo "selected";} ?> value="SLTP">SLTP</option>
										<option <?php if($data['tingkat_sekolah']=="SLTA"){echo "selected";} ?> value="SLTA">SLTA</option>
										<option <?php if($data['tingkat_sekolah']=="D1"){echo "selected";} ?> value="D1">D1</option>
										<option <?php if($data['tingkat_sekolah']=="D2"){echo "selected";} ?> value="D2">D2</option>
										<option <?php if($data['tingkat_sekolah']=="D3"){echo "selected";} ?> value="D3">D3</option>
										<option <?php if($data['tingkat_sekolah']=="D4"){echo "selected";} ?> value="D4">D4</option>
										<option <?php if($data['tingkat_sekolah']=="S1"){echo "selected";} ?> value="S1">S1</option>
										<option <?php if($data['tingkat_sekolah']=="S2"){echo "selected";} ?> value="S2">S2</option>
										<option <?php if($data['tingkat_sekolah']=="S3"){echo "selected";} ?> value="S3">S3</option>
									</select>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Nama Sekolah</label>
									<input type="text" class="form-control" name="nama_sekolah_pendidikan"
										placeholder="Nama Sekolah" value="<?php echo $data['nama_sekolah_pendidikan'] ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Alamat Sekolah</label>
									<input type="text" class="form-control" name="alamat_sekolah"
										placeholder="Alamat Sekolah" value="<?php echo $data['alamat_sekolah'] ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Jurusan</label>
									<input type="text" class="form-control" name="jurusan"
										placeholder="Jurusan" value="<?php echo $data['jurusan'] ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>No Ijazah</label>
									<input type="text" class="form-control" name="nomor_ijazah"
										placeholder="No Ijazah" value="<?php echo $data['nomor_ijazah'] ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Tanggal Ijazah</label>
									<input type="date" class="form-control" name="tgl_ijazah"
										placeholder="Tanggal Ijazah" value="<?php echo $data['tgl_ijazah'] ?>"
										required>
								</div>
							</div>

							<div class="col-12">
								<div class="form-group">
									<label>Nama Kepala Sekolah / Rektor</label>
									<input type="text" class="form-control" name="nama_kepsek_rektor"
										placeholder="Kepala Sekolah / Rektor" value="<?php echo $data['nama_kepsek_rektor'] ?>"
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