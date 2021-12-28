<?php 
  $id = (($data['id_pegawai']*8*42/2)/2);
  $link = base64_encode($id);
  $link = str_replace('=', '', $link);
 ?>
<form method="POST" enctype="multipart/form-data" action="<?php echo base_url('datapegawai/edit_proses/'.$link) ?>">

<div class="main-content">
	<section class="section">
 


		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url('datapegawai') ?>" class="btn btn-outline-success">Kembali</a>
					</div>
					<div class="card-body">
						<div class="row row-centered">
							<?php 
								if ($this->session->userdata('level')=="admin"){ ?>
							<div class="col-12">
								<div class="form-group">
									<label>Unit Kerja</label>
									<select class="form-control myselect" name="id_unitkerja">
										<option selected disabled>Pilih</option>
										<?php foreach ($unitkerja as $value): ?>
											<?php 
												$id = (($value->id_unitkerja*8*42/2)/2);
												$link = base64_encode($id);
												$link = str_replace('=', '', $link);
											 ?>											
											<option <?php if($data['id_unitkerja'] == $value->id_unitkerja){echo "selected";} ?> value="<?php echo $link ?>"><?php echo strtoupper($value->nama_unitkerja) ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<?php	}
							 ?>
							<div class="col-6">
								<div class="form-group">
									<label>Nama Pegawai</label>
									<input type="text" class="form-control" name="nama_pegawai"
										placeholder="Nama Pegawai" value="<?php echo $data['nama_pegawai']; ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>NIP</label>
									<input type="number" maxlength="18" class="form-control" name="nip_pegawai" placeholder="NIP Pegawai"
										value="<?php echo $data['nip_pegawai']; ?>">
								</div>
							</div>

							<div class="col-4">
								<div class="form-group">
									<label>Jenis Kelamin</label>
									<select class="form-control" name="jk_pegawai">
										<option selected disabled>Pilih</option>
										<option <?php if($data['jk_pegawai'] == "l"){echo "selected";} ?> value="l">Laki - Laki</option>
										<option <?php if($data['jk_pegawai'] == "p"){echo "selected";} ?> value="p">Perempuan</option>
									</select>
								</div>
							</div>

							<div class="col-4">
								<div class="form-group">
									<label>Tempat Lahir</label>
									<input type="text" class="form-control" name="tempatlahir_pegawai"
										placeholder="Tempat Lahir" value="<?php echo $data['tempatlahir_pegawai']; ?>"
										required>
								</div>
							</div>

							<div class="col-4">
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<input type="date" class="form-control" name="tgllahir_pegawai"
										placeholder="Tanggal Lahir" value="<?php echo $data['tgllahir_pegawai']; ?>"
										required>
								</div>
							</div>

							<div class="col-4">
								<div class="form-group">
									<label>Gol Darah</label>
									<select class="form-control" name="goldarah">
										<option selected disabled>Pilih</option>
										<option <?php if($data['goldarah'] == "A"){echo "selected";} ?> value="A">A</option>
										<option <?php if($data['goldarah'] == "B"){echo "selected";} ?> value="B">B</option>
										<option <?php if($data['goldarah'] == "AB"){echo "selected";} ?> value="AB">AB</option>
										<option <?php if($data['goldarah'] == "O"){echo "selected";} ?> value="O">O</option>
									</select>
								</div>
							</div>

							<div class="col-4">
								<div class="form-group">
									<label>Agama</label>
									<select class="form-control" name="agama">
										<option selected disabled>Pilih</option>
										<option <?php if($data['agama'] == "islam"){echo "selected";} ?> value="islam">Islam</option>
										<option <?php if($data['agama'] == "kristen"){echo "selected";} ?> value="kristen">Kristen</option>
										<option <?php if($data['agama'] == "protestan"){echo "selected";} ?> value="protestan">Protestan</option>
										<option <?php if($data['agama'] == "hindu"){echo "selected";} ?> value="hindu">Hindu</option>
										<option <?php if($data['agama'] == "budha"){echo "selected";} ?> value="budha">Budha</option>
										<option <?php if($data['agama'] == "konghucu"){echo "selected";} ?> value="konghucu">Kong Hu Cu</option>
									</select>
								</div>
							</div>
							
							<div class="col-4">
								<div class="form-group">
									<label>Hp</label>
									<input type="number" class="form-control" name="hp" placeholder="Hp"
										value="<?php echo $data['hp']; ?>" required>
								</div>
							</div>

							<div class="col-4">
								<div class="form-group">
									<label>Email</label>
									<input type="email" class="form-control" name="email_pegawai" placeholder="email"
										value="<?php echo $data['email_pegawai']; ?>" required>
								</div>
							</div>

							<div class="col-4">
								<div class="form-group">
									<label>Pendidikan Terakhir</label>
									<select class="form-control" name="pendidikan_terakhir" required>
										<option selected disabled>Pilih</option>
										<option <?php if($data['pendidikan_terakhir'] == "SD"){echo "selected";} ?> value="SD">SD</option>
										<option <?php if($data['pendidikan_terakhir'] == "SLTP"){echo "selected";} ?> value="SLTP">SLTP</option>
										<option <?php if($data['pendidikan_terakhir'] == "SLTA"){echo "selected";} ?> value="SLTA">SLTA</option>
										<option <?php if($data['pendidikan_terakhir'] == "D1"){echo "selected";} ?> value="D1">D1</option>
										<option <?php if($data['pendidikan_terakhir'] == "D2"){echo "selected";} ?> value="D2">D2</option>
										<option <?php if($data['pendidikan_terakhir'] == "D3"){echo "selected";} ?> value="D3">D3</option>
										<option <?php if($data['pendidikan_terakhir'] == "D4"){echo "selected";} ?> value="D4">D4</option>
										<option <?php if($data['pendidikan_terakhir'] == "S1"){echo "selected";} ?> value="S1">S1</option>
										<option <?php if($data['pendidikan_terakhir'] == "S2"){echo "selected";} ?> value="S2">S2</option>
										<option <?php if($data['pendidikan_terakhir'] == "S3"){echo "selected";} ?> value="S3">S3</option>
									</select>
								</div>
							</div>

							<div class="col-4">
								<div class="form-group">
									<label>Status</label>
									<select class="form-control" name="status_pegawai" required>
										<option selected disabled>Pilih</option>
										<option <?php if($data['status_pegawai'] == "pns"){echo "selected";} ?> value="pns">PNS</option>
										<option <?php if($data['status_pegawai'] == "honor"){echo "selected";} ?> value="honor">Honor</option>
									</select>
								</div>
							</div>
							
							<div class="col-8">
								<div class="form-group">
									<label>Alamat</label>
									<input type="text" class="form-control" name="alamat_pegawai"
										placeholder="Alamat"
										value="<?php echo $data['alamat_pegawai']; ?>" required>
								</div>
							</div>
							
							<div class="col-4">
								<div class="form-group">
									<label>Foto</label>
									<input type="file" class="form-control" name="foto"
										placeholder="Foto"
										value="<?php echo set_value('alamat') ?>">
								</div>
							</div>

							<div class="col-12">
								<img width="100" src="<?php echo base_url('assets/foto/').$data['foto'] ?>">
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