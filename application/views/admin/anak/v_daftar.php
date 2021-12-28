<div class="main-content">
	<section class="section">
 


		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url('anak/tambah') ?>" class="btn btn-outline-success">Tambah</a>
					</div>
					<div class="card-body">
						<div class="table-responsive">

							<table class="table table-striped display" id="table-1">
								<thead>
									<tr>
										<th class="text-center">
											#
										</th>
										<th>Orang Tua</th>
										<th>Nama Anak</th>
										<th>Tempat Tanggal Lahir</th>
										<th>Jenis Kelamin</th>
										<th>Pendidikan</th>
										<th>Pekerjaan</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; foreach ($data as $value): ?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo ucwords($value->nama_pegawai); ?></td>
										<td><?php echo ucwords($value->nama_anak); ?></td>
										<td><?php echo ucwords($value->tempat_lahir_anak." ,".$value->tgl_lahir_anak); ?></td>
										<td><?php if($value->jk_anak=="l"){echo "Laki - Laki";}elseif($value->jk_anak=="p"){echo "Perempuan";} ?></td>
										<td><?php echo ucwords($value->pendidikan_anak); ?></td>
										<td><?php echo ucfirst($value->pekerjaan_anak); ?></td>
										<td><?php echo ucwords($value->status_hub_anak); ?></td>
										<td>
											<?php 
											  $id = (($value->id_anak*8*42/2)/2);
											  $link = base64_encode($id);
											  $link = str_replace('=', '', $link);
											 ?>
											<a href="<?php echo base_url('anak/edit/').$link ?>" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
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
                    <a href="<?php echo base_url('anak/hapus_proses/').$link ?>" class="btn btn-danger">
                        <i class="fa fa-trash"></i> Hapus</a>

                    <a href="<?php echo base_url('anak/edit/').$link ?>" class="btn btn-warning">
                        <i class="fa fa-edit"></i> Edit</a>

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
	</section>
</div>