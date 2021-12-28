<?php 
   if ($this->session->flashdata('gagal')) { ?>
<div class="alert alert-danger" role="alert">
  <?php echo $this->session->flashdata('gagal'); ?> 
</div>
<?php   }
 ?>

<div class="main-content">
	<section class="section">



		<div class="row">
			<div class="col-12">
				<div class="card">
					<?php if ($this->session->userdata('level')=='admin' || $this->session->userdata('level')=='operator') { ?>
					<div class="card-header">
						<a href="<?php echo base_url('datapegawai/tambah') ?>" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>&nbsp;
						<a onclick="return confirm('Konfirmasi Download Y/N')" href="<?php echo base_url('datapegawai/download') ?>" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Download</a>
					</div>
					<?php } ?>
					<div class="card-body">
						<div class="table-responsive">

							<table class="table table-striped display" id="table-1">
								<thead>
									<tr>
										<th class="text-center">
											#
										</th>
										<th>Unit Kerja</th>
										<th>Nama Pegawai</th>
										<th>NIP</th>
										<th>Tempat Tanggal Lahir</th>
										<th>Alamat</th>
										<th>Hp</th>
										<th>Email</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; foreach ($data as $value): ?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo strtoupper($value->nama_unitkerja); ?></td>
										<td><?php echo ucwords($value->nama_pegawai); ?></td>
										<td><?php echo $value->nip_pegawai; ?></td>
										<td><?php echo ucwords($value->tempatlahir_pegawai." ,".$value->tgllahir_pegawai); ?></td>
										<td><?php echo ucwords($value->alamat_pegawai); ?></td>
										<td><?php echo $value->hp; ?></td>
										<td><?php echo $value->email_pegawai; ?></td>
										<td>
											<a href="
											<?php 
											$id = encrypt($value->id_pegawai);
											$link = str_replace('=', '', $id);
											echo base_url('datapegawai/detailpegawai/'.$link) ?>
											" class="btn btn-outline-info"><i class="fas fa-info"></i></a>
									<?php if ($this->session->userdata('level')=='admin' || $this->session->userdata('level')=='operator') { ?>
												
											<a href="<?php echo base_url('datapegawai/edit/').$link ?>" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
											<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#<?php echo $link ?>">
												<i class="far fa-trash-alt"></i>
											</button>
									<?php	} ?>
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
                    <a href="<?php echo base_url('datapegawai/hapus_proses/').$link ?>" class="btn btn-danger">
                        <i class="fa fa-trash"></i> Hapus</a>

                    <a href="<?php echo base_url('datapegawai/edit/').$link ?>" class="btn btn-warning">
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
