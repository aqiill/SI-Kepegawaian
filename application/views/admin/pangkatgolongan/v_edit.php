<?php 
  $id = (($data['id_pangkatgolongan']*8*42/2)/2);
  $link = base64_encode($id);
  $link = str_replace('=', '', $link);
 ?>
<form method="POST" action="<?php echo base_url('pangkatgolongan/edit_proses/'.$link) ?>">
<div class="main-content">
	<section class="section">
 


		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url('pangkatgolongan') ?>" class="btn btn-outline-success">Kembali</a>
					</div>
					<div class="card-body">

						<div class="row row-centered">
							<div class="col-12">
								<div class="form-group">
									<label>Nama Pangkat Golongan</label>
									<input type="text" class="form-control" name="nama_pangkatgolongan"
										placeholder="Jenis pangkatgolongan" value="<?php echo $data['nama_pangkatgolongan'] ?>"
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