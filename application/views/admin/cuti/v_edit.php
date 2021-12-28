<?php 
  $id = (($data['id_cuti']*8*42/2)/2);
  $link = base64_encode($id);
  $link = str_replace('=', '', $link);
 ?>
<form method="POST" action="<?php echo base_url('cuti/edit_proses/'.$link) ?>">
<div class="main-content">
	<section class="section">
 


		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url('cuti') ?>" class="btn btn-outline-success">Kembali</a>
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
									<label>Perihal</label>
									<input type="text" class="form-control" name="perihal_cuti"
										placeholder="Perihal" value="<?php echo $data['perihal_cuti'] ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Tanggal Mulai Cuti</label>
									<input type="date" class="form-control" name="t_mulai_cuti"
										placeholder="Tanggal Mulai Cuti" value="<?php echo $data['t_mulai_cuti'] ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Tanggal Selesai Cuti</label>
									<input type="date" class="form-control" name="t_selesai_cuti"
										placeholder="Tanggal Mulai Cuti" value="<?php echo $data['t_selesai_cuti'] ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>No Surat Izin</label>
									<input type="text" class="form-control" name="no_surat_izin_cuti"
										placeholder="No Surat Izin" value="<?php echo $data['no_surat_izin_cuti'] ?>"
										required>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label>Pengesah Surat</label>
									<input type="text" class="form-control" name="pengesah_surat_cuti"
										placeholder="Pengesah Surat" value="<?php echo $data['perihal_cuti'] ?>"
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