<?php 
  $id = (($data['id_izin_kawin']*8*42/2)/2);
  $link = base64_encode($id);
  $link = str_replace('=', '', $link);
 ?>
<form method="POST" action="<?php echo base_url('kawin/edit_proses/'.$link) ?>">
<div class="main-content">
	<section class="section">
 


		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url('kawin') ?>" class="btn btn-outline-success">Kembali</a>
					</div>
					<div class="card-body">

						<div class="row row-centered">
							<div class="col-12">
								<section class="section">
									<div class="section-header">
										<h1>Suami / Istri</h1>
									</div>
							</div>

							<div class="col-12">
								<div class="form-group">
									<label>Suami / Istri</label>
									<select class="form-control myselect" name="id_pegawai">
										<option selected disabled>Pilih</option>
										<?php foreach ($pegawai as $value): ?>
											<?php 
												$id = (($value->id_pegawai*8*42/2)/2);
												$link = base64_encode($id);
												$link = str_replace('=', '', $link);
											 ?>											
											<option <?php if($data['id_pegawai'] == $value->id_pegawai){echo "selected";} ?> value="<?php echo $link ?>"><?php echo strtoupper($value->nama_pegawai) ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>No Izin Nikah</label>
									<input type="text" class="form-control" name="no_izin_kawin"
										placeholder="No Izin Nikah" value="<?php echo $data['no_izin_kawin']; ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Tanggal Izin Nikah</label>
									<input type="date" class="form-control" name="tgl_izin_kawin" placeholder="Tanggal Izin Nikah"
										value="<?php echo $data['tgl_izin_kawin']; ?>">
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Kebangsaan</label>
									<input type="text" class="form-control" name="kebangsaan"
										placeholder="Kebangsaan" value="<?php echo $data['kebangsaan']; ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<input disabled type="date" class="form-control" name="tgllahir_pegawai"
										placeholder="Tanggal Lahir" value="<?php echo $data['tgllahir_pegawai']; ?>"
										required>
								</div>
							</div>
							
							<div class="col-4">
								<div class="form-group">
									<label>Nama Ayah</label>
									<input type="text" class="form-control" name="nama_ayah" placeholder="Nama Ayah"
										value="<?php echo $data['nama_ayah']; ?>" required>
								</div>
							</div>
							
							<div class="col-4">
								<div class="form-group">
									<label>Pekerjaan Ayah</label>
									<input type="text" class="form-control" name="pekerjaan_ayah" placeholder="Pekerjaan Ayah"
										value="<?php echo $data['pekerjaan_ayah']; ?>" required>
								</div>
							</div>
							
							<div class="col-4">
								<div class="form-group">
									<label>Alamat Ayah</label>
									<input type="text" class="form-control" name="alamat_ayah" placeholder="Alamat Ayah"
										value="<?php echo $data['alamat_ayah']; ?>" required>
								</div>
							</div>
							
							<div class="col-4">
								<div class="form-group">
									<label>Nama Ibu</label>
									<input type="text" class="form-control" name="nama_ibu" placeholder="Nama Ibu"
										value="<?php echo $data['nama_ibu']; ?>" required>
								</div>
							</div>
							
							<div class="col-4">
								<div class="form-group">
									<label>Pekerjaan Ibu</label>
									<input type="text" class="form-control" name="pekerjaan_ibu" placeholder="Pekerjaan Ibu"
										value="<?php echo $data['pekerjaan_ibu']; ?>" required>
								</div>
							</div>
							
							<div class="col-4">
								<div class="form-group">
									<label>Alamat Ibu</label>
									<input type="text" class="form-control" name="alamat_ibu" placeholder="Alamat Ibu"
										value="<?php echo $data['alamat_ibu']; ?>" required>
								</div>
							</div>

							<div class="col-12">
								<section class="section">
									<div class="section-header">
										<h1>Suami / Istri</h1>
									</div>
							</div>
							
							<div class="col-4">
								<div class="form-group">
									<label>Suami / Istri</label>
									<input type="text" class="form-control" name="nama_dia" placeholder="Nama Calon II"
										value="<?php echo $data['nama_dia']; ?>" required>
								</div>
							</div>
							
							<div class="col-4">
								<div class="form-group">
									<label>Tempat Lahir</label>
									<input type="text" class="form-control" name="tempat_lahir_dia" placeholder="Tempat Lahir"
										value="<?php echo $data['tempat_lahir_dia']; ?>" required>
								</div>
							</div>
							
							<div class="col-4">
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<input type="date" class="form-control" name="tgl_lahir_dia" placeholder="Tanggal Lahir"
										value="<?php echo $data['tgl_lahir_dia']; ?>" required>
								</div>
							</div>
							
							<div class="col-4">
								<div class="form-group">
									<label>Pekerjaan</label>
									<input type="text" class="form-control" name="pekerjaan_dia" placeholder="Pekerjaan"
										value="<?php echo $data['pekerjaan_dia']; ?>" required>
								</div>
							</div>
							
							<div class="col-4">
								<div class="form-group">
									<label>No NIK</label>
									<input type="number" class="form-control" name="nik_dia" placeholder="No NIK"
										value="<?php echo $data['nik_dia']; ?>" required>
								</div>
							</div>
							
							<div class="col-4">
								<div class="form-group">
									<label>Kebangsaan</label>
									<input type="text" class="form-control" name="kebangsaan_dia" placeholder="Kebangsaan"
										value="<?php echo $data['kebangsaan_dia']; ?>" required>
								</div>
							</div>
							
							<div class="col-4">
								<div class="form-group">
									<label>Nama Ayah</label>
									<input type="text" class="form-control" name="nama_ayah_dia" placeholder="Nama Ayah"
										value="<?php echo $data['nama_ayah_dia']; ?>" required>
								</div>
							</div>
							
							<div class="col-4">
								<div class="form-group">
									<label>Pekerjaan Ayah</label>
									<input type="text" class="form-control" name="pekerjaan_ayah_dia" placeholder="Pekerjaan Ayah"
										value="<?php echo $data['pekerjaan_ayah_dia']; ?>" required>
								</div>
							</div>
							
							<div class="col-4">
								<div class="form-group">
									<label>Alamat Ayah</label>
									<input type="text" class="form-control" name="alamat_ayah_dia" placeholder="Alamat Ayah"
										value="<?php echo $data['alamat_ayah_dia']; ?>" required>
								</div>
							</div>
							
							<div class="col-4">
								<div class="form-group">
									<label>Nama Ibu</label>
									<input type="text" class="form-control" name="nama_ibu_dia" placeholder="Nama Ibu"
										value="<?php echo $data['nama_ibu_dia']; ?>" required>
								</div>
							</div>
							
							<div class="col-4">
								<div class="form-group">
									<label>Pekerjaan Ibu</label>
									<input type="text" class="form-control" name="pekerjaan_ibu_dia" placeholder="Pekerjaan Ibu"
										value="<?php echo $data['pekerjaan_dia']; ?>" required>
								</div>
							</div>
							
							<div class="col-4">
								<div class="form-group">
									<label>Alamat Ibu</label>
									<input type="text" class="form-control" name="alamat_ibu_dia" placeholder="Alamat Ibu"
										value="<?php echo $data['alamat_ibu_dia']; ?>" required>
								</div>
							</div>
							
							<div class="col-6">
								<div class="form-group">
									<label>Tempat Nikah</label>
									<input type="text" class="form-control" name="tempat_kawin" placeholder="Tempat Nikah"
										value="<?php echo $data['tempat_kawin']; ?>" required>
								</div>
							</div>
							
							<div class="col-6">
								<div class="form-group">
									<label>Tanggal Nikah</label>
									<input type="date" class="form-control" name="tanggal_kawin" placeholder="Tanggal Nikah"
										value="<?php echo $data['tanggal_kawin']; ?>" required>
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