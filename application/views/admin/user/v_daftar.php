<div class="main-content">
	<section class="section">

	</section>

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="row row-centered">

						<div class="col-12">
							<p>
								<a class="btn btn-success" href="<?php echo base_url('user/tambah') ?>">Tambah User</a>
								<?php 
								if ($this->session->userdata('level')=="admin") { ?>
									<a class="btn btn-primary" data-toggle="collapse" href="#operator" role="button" aria-expanded="false" aria-controls="operator">
									Akun Operator
									</a>
								<a class="btn btn-primary" data-toggle="collapse" href="#guru" role="button" aria-expanded="false" aria-controls="guru">
									Akun guru
								</a>
								<?php } ?>
							</p>
<?php 
	if ($this->session->userdata('level')=="admin") { ?>
							<div class="collapse show" id="operator">
									<h3>Akun Operator</h3>
									<div class="table-responsive">
										<table class="table table-striped  display" id="table-1">
											<thead>
												<tr>
													<th class="text-center">
														#
													</th>
													<th>Nama Operator</th>
													<th>Level</th>
													<th>Unit Kerja</th>
													<th>Status</th>
													<th>Username</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php $no=1; foreach ($operator as $value): ?>
												<tr>
													<td><?php echo $no++; ?></td>
													<td><?php echo str_replace('-', ' ', strtoupper($value->nama_pegawai)); ?></td>
													<td><?php echo strtoupper($value->nama_unitkerja); ?></td>
													<td><?php echo ucwords($value->level); ?></td>
													<?php 
													  $id = (($value->id_user*8*42/2)/2);
													  $link = base64_encode($id);
													  $link = str_replace('=', '', $link);
													 ?>
													<td><?php 
													if($value->status=="1"){
														echo "<a href='".base_url('user/edit/'.$link.'?status=1')."' class='btn btn-success'>Aktif</a>";
													}elseif ($value->status=="0") {
														echo "<a href='".base_url('user/edit/'.$link.'?status=0')."' class='btn btn-danger'>Nonaktif</a>";
													}; ?></td>
													<td><?php echo $value->username; ?></td>
													<td>
														<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#<?php echo $link ?>">
															<i class="far fa-trash-alt"></i>
														</button>

													</td>
												</tr>

<!-- Modal -->
<div class="modal fade" id="<?php echo $link ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda ingin mengahpus data <?php echo strtoupper($value->nama_pegawai); ?> ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <a href="<?php echo base_url('user/hapus/').$link ?>" class="btn btn-danger">
                        <i class="fa fa-trash"></i> Hapus</a>

                    <a href="" class="btn btn-primary" data-dismiss="modal">
                        <i class="fas fa-arrow-left"></i></i> Kembali</a>
      </div>

    </div>
  </div>
</div>

											<?php endforeach ?>
										</tbody>
									</table>
								
							</div>
						</div>
<?php } ?>

						<div class="collapse <?php if ($this->session->userdata('level')=="operator"){echo 'show';} ?>" id="guru">
							
								<h3>Akun Guru</h3>
								<div class="table-responsive">
									<table class="table table-striped  display" id="table-1">
										<thead>
											<tr>
												<th class="text-center">
													# 
												</th>
												<th>Nama Guru</th>
												<th>Unit Kerja</th>
												<th>Level</th>
												<th>Status</th>
												<th>Username</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $no=1; foreach ($guru as $value): ?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><?php echo str_replace('-', ' ', strtoupper($value->nama_pegawai)); ?></td>
												<td><?php echo strtoupper($value->nama_unitkerja); ?></td>
												<td><?php echo ucwords($value->level); ?></td>
												<?php 
												  $id = (($value->id_user*8*42/2)/2);
												  $link = base64_encode($id);
												  $link = str_replace('=', '', $link);
												 ?>
												<td><?php 
													if($value->status=="1"){
														echo "<a href='".base_url('user/edit/'.$link.'?status=1')."' class='btn btn-success'>Aktif</a>";
													}elseif ($value->status=="0") {
														echo "<a href='".base_url('user/edit/'.$link.'?status=0')."' class='btn btn-danger'>Nonaktif</a>";
													}; ?></td>
												<td><?php echo $value->username; ?></td>
												<td>
														<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#<?php echo $link ?>">
															<i class="far fa-trash-alt"></i>
														</button>
												</td>
											</tr>

<!-- Modal -->
<div class="modal fade" id="<?php echo $link ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda ingin mengahpus data <?php echo strtoupper($value->nama_pegawai); ?> ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <a href="<?php echo base_url('user/hapus/').$link ?>" class="btn btn-danger">
                        <i class="fa fa-trash"></i> Hapus</a>

                    <a href="" class="btn btn-primary" data-dismiss="modal">
                        <i class="fas fa-arrow-left"></i></i> Kembali</a>
      </div>

    </div>
  </div>
</div>
											
										<?php endforeach ?>
									</tbody>
								</table>
								
						</div>
					</div>



				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>