<div class="main-content">
	<section class="section">
 


		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url('sekolah/tambah') ?>" class="btn btn-outline-success">Tambah</a>
					</div>
					<div class="card-body">
						<div class="table-responsive">

							<table class="table table-striped display" id="table-1">
								<thead>
									<tr>
										<th class="text-center">
											#
										</th>
										<th>Pegawai</th>
										<th>Tingkat Sekolah</th>
										<th>Nama Sekolah</th>
										<th>Alamat</th>
										<th>Jurusan</th>
										<th>No Ijazah</th>
										<th>Tanggal Ijazah</th>
										<th>Kepala Sekolah / Rektor</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; foreach ($data as $value): ?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo ucwords($value->nama_pegawai); ?></td>
										<td><?php echo ucwords($value->tingkat_sekolah); ?></td>
										<td><?php echo ucwords($value->nama_sekolah_pendidikan); ?></td>
										<td><?php echo ucfirst($value->alamat_sekolah); ?></td>
										<td><?php echo ucwords($value->jurusan); ?></td>
										<td><?php echo ucwords($value->nomor_ijazah); ?></td>
										<td><?php echo ucwords($value->tgl_ijazah); ?></td>
										<td><?php echo ucwords($value->nama_kepsek_rektor); ?></td>
										<td>
											<?php 
											  $id = (($value->id_sekolahpegawai*8*42/2)/2);
											  $link = base64_encode($id);
											  $link = str_replace('=', '', $link);
											 ?>											
											<a href="<?php echo base_url('sekolah/edit/').$link ?>" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
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
                    <a href="<?php echo base_url('sekolah/hapus_proses/').$link ?>" class="btn btn-danger">
                        <i class="fa fa-trash"></i> Hapus</a>

                    <a href="<?php echo base_url('sekolah/edit/').$link ?>" class="btn btn-warning">
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