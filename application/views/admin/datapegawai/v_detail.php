<div class="main-content">
	<section class="section">
 

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url('datapegawai') ?>" class="btn btn-outline-success">Kembali</a>
						<?php 
							$id = (($data['id_pegawai']*8*42/2)/2);
							$link = base64_encode($id);
							$link = str_replace('=', '', $link);
						 ?>
						<a onclick="return confirm('Konfirmasi Download Y/N')" href="<?php echo base_url('datapegawai/download_detail/'.$link) ?>" class="btn btn-success">Download</a>
					</div>
					<div class="card-body">
						<div class="row row-centered">

							<div class="col-12">
								<table class="table table-striped" id="table-1">
									<tbody>
										<tr>
											<td>Unit Kerja</td>
											<td>:</td>
											<td><?php echo strtoupper($data['nama_unitkerja']) ?></td>
											<td rowspan="12"><img style="float: right;" width="200" src="<?php echo base_url('assets/foto/').$data['foto'] ?>"></td>
										</tr>
										<tr>
											<td>Nama Pegawai</td>
											<td>:</td>
											<td><?php echo ucwords($data['nama_pegawai']) ?></td>
										</tr>
										<tr>
											<td>NIP</td>
											<td>:</td>
											<td><?php echo $data['nip_pegawai'] ?></td>
										</tr>
										<tr>
											<td>Jenis Kelamin</td>
											<td>:</td>
											<td><?php if($data['jk_pegawai']=="l"){echo "Laki - Laki";}elseif ($data['jk_pegawai']=="p") {echo "Perempuan";} ?></td>
										</tr>
										<tr>
											<td>Tempat Tanggal Lahir</td>
											<td>:</td>
											<td><?php echo ucwords($data['tempatlahir_pegawai'].", ".$data['tgllahir_pegawai']) ?></td>
										</tr>
										<tr>
											<td>Golongan Darah</td>
											<td>:</td>
											<td><?php echo $data['goldarah'] ?></td>
										</tr>
										<tr>
											<td>Agama</td>
											<td>:</td>
											<td><?php echo ucwords($data['agama']) ?></td>
										</tr>
										<tr>
											<td>HP</td>
											<td>:</td>
											<td><?php echo $data['hp'] ?></td>
										</tr>
										<tr>
											<td>Email</td>
											<td>:</td>
											<td><?php echo $data['email_pegawai'] ?></td>
										</tr>
										<tr>
											<td>Pendidikan Terakhir</td>
											<td>:</td>
											<td><?php echo $data['pendidikan_terakhir'] ?></td>
										</tr>
										<tr>
											<td>Status</td>
											<td>:</td>
											<td><?php echo strtoupper($data['status_pegawai']) ?></td>
										</tr>
										<tr>
											<td>Alamat</td>
											<td>:</td>
											<td><?php echo ucwords($data['alamat_pegawai']) ?></td>
										</tr>
									</tbody>
								</table>
							</div>

							<div class="col-12">
<p>
  <a class="btn btn-primary" data-toggle="collapse" href="#keluarga" role="button" aria-expanded="false" aria-controls="keluarga">
    Keluarga
  </a>
  <a class="btn btn-primary" data-toggle="collapse" href="#pendidikan" role="button" aria-expanded="false" aria-controls="pendidikan">
    Riwayat Pendidikan
  </a>
  <a class="btn btn-primary" data-toggle="collapse" href="#sertifikasi" role="button" aria-expanded="false" aria-controls="sertifikasi">
    Sertifikasi
  </a>
  <a class="btn btn-primary" data-toggle="collapse" href="#tugas" role="button" aria-expanded="false" aria-controls="tugas">
    Tugas
  </a>
  <a class="btn btn-primary" data-toggle="collapse" href="#pangkat" role="button" aria-expanded="false" aria-controls="pangkat">
    Pangkat
  </a>
  <a class="btn btn-primary" data-toggle="collapse" href="#kgb" role="button" aria-expanded="false" aria-controls="kgb">
    KGB
  </a>
  <a class="btn btn-primary" data-toggle="collapse" href="#sppd" role="button" aria-expanded="false" aria-controls="sppd">
    SPPD
  </a>
  <a class="btn btn-primary" data-toggle="collapse" href="#penghargaan" role="button" aria-expanded="false" aria-controls="penghargaan">
    Penghargaan
  </a>
  <a class="btn btn-primary" data-toggle="collapse" href="#hukuman" role="button" aria-expanded="false" aria-controls="hukuman">
    Hukuman
  </a>
  <a class="btn btn-primary" data-toggle="collapse" href="#cuti" role="button" aria-expanded="false" aria-controls="cuti">
    Cuti
  </a>
  <a class="btn btn-primary" data-toggle="collapse" href="#tunjangan" role="button" aria-expanded="false" aria-controls="tunjangan">
    Tunjangan
  </a>
  <a class="btn btn-primary" data-toggle="collapse" href="#kawin" role="button" aria-expanded="false" aria-controls="kawin">
    Kawin
  </a>
</p>

<div class="collapse" id="keluarga">
	<br><h3>A. Suami / Istri</h3>
	<table class="table table-striped" id="table-1">
		<tbody>
			<tr>
				<td>Suami / Istri</td>
				<td>:</td>
				<td><?php echo ucwords($pasutri['nama_pasutri']) ?></td>
			</tr>
			<tr>
				<td>Tanggal Nikah</td>
				<td>:</td>
				<td><?php echo ucwords($pasutri['tgl_nikah']) ?></td>
			</tr>
			<tr>
				<td>No Kartu</td>
				<td>:</td>
				<td><?php echo ucwords($pasutri['no_kartu']) ?></td>
			</tr>
		</tbody>
	</table>
	<br><div class="table-responsive">
		<h3>B. Anak</h3>
		<table class="table table-striped display" id="table-1">
			<thead>
				<tr>
					<th class="text-center">
						#
					</th>
					<th>Nama Anak</th>
					<th>Tempat Tanggal Lahir</th>
					<th>Jenis Kelamin</th>
					<th>Pendidikan</th>
					<th>Pekerjaan</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; foreach ($anak as $value): ?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo ucwords($value->nama_anak); ?></td>
					<td><?php echo ucwords($value->tempat_lahir_anak." ,".$value->tgl_lahir_anak); ?></td>
					<td><?php if($value->jk_anak=="l"){echo "Laki - Laki";}elseif($value->jk_anak=="p"){echo "Perempuan";} ?></td>
					<td><?php echo ucwords($value->pendidikan_anak); ?></td>
					<td><?php echo ucfirst($value->pekerjaan_anak); ?></td>
					<td><?php echo ucwords($value->status_hub_anak); ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<br><div class="table-responsive">
		<h3>C. Orang Tua</h3>
		<table class="table table-striped display" id="table-1">
			<thead>
				<tr>
					<th class="text-center">
						#
					</th>
					<th>Orang Tua</th>
					<th>Tempat Tanggal Lahir</th>
					<th>Jenis Kelamin</th>
					<th>Pendidikan</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; foreach ($ortu as $value): ?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo ucwords($value->nama_ortu); ?></td>
					<td><?php echo ucwords($value->tempat_lahir_ortu." ,".$value->tgl_lahir_ortu); ?></td>
					<td><?php if($value->jk_ortu=="l"){echo "Laki - Laki";}elseif($value->jk_ortu=="p"){echo "Perempuan";} ?></td>
					<td><?php echo ucwords($value->pendidikan_ortu); ?></td>
					<td><?php echo ucwords($value->status_hub_ortu); ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
	</div>
</div>

<div class="collapse" id="pendidikan">
	<div class="table-responsive">
		<br><h3>A. Pendidikan</h3>
		<table class="table table-striped display" id="table-1">
			<thead>
				<tr>
					<th class="text-center">
						#
					</th>
					<th>Tingkat Sekolah</th>
					<th>Nama Sekolah</th>
					<th>Alamat</th>
					<th>Jurusan</th>
					<th>No Ijazah</th>
					<th>Tanggal Ijazah</th>
					<th>Kepala Sekolah / Rektor</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; foreach ($sekolah as $value): ?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo ucwords($value->tingkat_sekolah); ?></td>
					<td><?php echo ucwords($value->nama_sekolah_pendidikan); ?></td>
					<td><?php echo ucfirst($value->alamat_sekolah); ?></td>
					<td><?php echo ucwords($value->jurusan); ?></td>
					<td><?php echo ucwords($value->nomor_ijazah); ?></td>
					<td><?php echo ucwords($value->tgl_ijazah); ?></td>
					<td><?php echo ucwords($value->nama_kepsek_rektor); ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	</div>
	<br>
	<div class="table-responsive">
		<h3>B. Bahasa</h3>
		<table class="table table-striped display" id="table-1">
			<thead>
				<tr>
					<th class="text-center">
						#
					</th>
					<th>Jenis Bahasa</th>
					<th>Bahasa</th>
					<th>Kemampuan Bicara</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; foreach ($bahasa as $value): ?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo ucwords($value->jenis_bahasa); ?></td>
					<td><?php echo ucwords($value->bahasa); ?></td>
					<td><?php echo ucfirst($value->kemampuan_bicara); ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	</div>	
</div>

<div class="collapse" id="sertifikasi">
	<br><h3>Sertifikasi</h3>
	<div class="table-responsive">
		<table class="table table-striped display" id="table-1">
			<thead>
				<tr>
					<th class="text-center">
						#
					</th>
					<th>No Sertifikat Sertifikasi</th>
					<th>No Peserta</th>
					<th>Mata Pelajaran</th>
					<th>Tahun</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; foreach ($sertifikasi as $value): ?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo ucwords($value->no_sertifikat_sertifikasi); ?></td>
					<td><?php echo ucwords($value->no_peserta); ?></td>
					<td><?php echo ucfirst($value->mapel_sertifikasi); ?></td>
					<td><?php echo ucfirst($value->tahun_sertifikasi); ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	</div>
</div>

<div class="collapse" id="tugas">
	<br><h3>Tugas Tambahan</h3>
	<table class="table table-striped display" id="table-1">
		<thead>
			<tr>
				<th class="text-center">
					#
				</th>
				<th>Jabatan</th>
				<th>No SK</th>
				<th>Tanggal SK</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($tugas as $value): ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo ucwords($value->nama_jabatan); ?></td>
				<td><?php echo ucwords($value->no_sk); ?></td>
				<td><?php echo ucfirst($value->tgl_sk_tugas); ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
	</table>
</div>

<div class="collapse" id="pangkat">
	<br><h3>Pangkat Golongan</h3>
	<table class="table table-striped display" id="table-1">
		<thead>
			<tr>
				<th class="text-center">
					#
				</th>
				<th>Pangkat Golongan</th>
				<th>TMT Pangkat</th>
				<th>Pengesah SK</th>
				<th>No SK</th>
				<th>Tanggal SK</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($pangkat as $value): ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo ucwords($value->nama_pangkatgolongan); ?></td>
				<td><?php echo ucfirst($value->tmt_pangkat); ?></td>
				<td><?php echo ucfirst($value->pengesah_sk); ?></td>
				<td><?php echo ucfirst($value->no_sk); ?></td>
				<td><?php echo ucfirst($value->tgl_sk); ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
</div>

<div class="collapse" id="kgb">
	<br><h3>KGB</h3>
	<table class="table table-striped display" id="table-1">
		<thead>
			<tr>
				<th class="text-center">
					#
				</th>
				<th>Golongan</th>
				<th>TMT KGB</th>
				<th>Gaji</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($kgb as $value): ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo ucwords($value->golongan); ?></td>
				<td><?php echo ucwords($value->tmt_kgb); ?></td>
				<td>Rp. <?php echo number_format($value->gaji); ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
</div>

<div class="collapse" id="sppd">
	<br><h3>SPPD</h3>
	<table class="table table-striped display" id="table-1">
		<thead>
			<tr>
				<th class="text-center">
					#
				</th>
				<th>No SPPD</th>
				<th>Dari</th>
				<th>Tujuan</th>
				<th>Perihal</th>
				<th>Uang Jalan</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($sppd as $value): ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo ucwords($value->no_sppd); ?></td>
				<td><?php echo ucwords($value->dari); ?></td>
				<td><?php echo ucfirst($value->tujuan); ?></td>
				<td><?php echo ucfirst($value->perihal); ?></td>
				<td>Rp. <?php echo number_format($value->uang_jalan); ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
</div>

<div class="collapse" id="penghargaan">
	<br><h3>Penghargaan</h3>
	<table class="table table-striped display" id="table-1">
		<thead>
			<tr>
				<th class="text-center">
					#
				</th>
				<th>Perihal</th>
				<th>Tingkat</th>
				<th>Ranking</th>
				<th>Tanggal</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($penghargaan as $value): ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo ucwords($value->perihal); ?></td>
				<td><?php echo ucwords($value->tingkat); ?></td>
				<td><?php echo ucfirst($value->ranking); ?></td>
				<td><?php echo ucfirst($value->tgl_penghargaan); ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
</div>

<div class="collapse" id="hukuman">
	<br><h3>Hukuman</h3>
	<table class="table table-striped display" id="table-1">
		<thead>
			<tr>
				<th class="text-center">
					#
				</th>
				<th>Masalah</th>
				<th>Tanggal</th>
				<th>Sanksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($hukuman as $value): ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo ucwords($value->masalah); ?></td>
				<td><?php echo ucwords($value->tgl_hukuman); ?></td>
				<td><?php echo ucfirst($value->sanksi); ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
</div>

<div class="collapse" id="cuti">
	<br><h3>Cuti</h3>
	<table class="table table-striped display" id="table-1">
		<thead>
			<tr>
				<th class="text-center">
					#
				</th>
				<th>Perihal</th>
				<th>Tanggal Mulai</th>
				<th>Tanggal Selesai</th>
				<th>Lama Cuti</th>
				<th>No Surat Izin Cuti</th>
				<th>Pengesah Surat</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($cuti as $value): ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo ucwords($value->perihal_cuti); ?></td>
				<td><?php echo ucwords($value->t_mulai_cuti); ?></td>
				<td><?php echo ucfirst($value->t_selesai_cuti); ?></td>
				<td>
					<?php 
					$tgl1 	= new DateTime($value->t_mulai_cuti);
					$tgl2 	= new DateTime($value->t_selesai_cuti);
					$d 		= $tgl2->diff($tgl1)->days + 1;
					echo $d." hari";
					?>	
				</td>
				<td><?php echo ucfirst($value->no_surat_izin_cuti); ?></td>
				<td><?php echo ucfirst($value->pengesah_surat_cuti); ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
</div>

<div class="collapse" id="tunjangan">
	<br><h3>Tunjangan</h3>
	<table class="table table-striped display" id="table-1">
		<thead>
			<tr>
				<th class="text-center">
					#
				</th>
				<th>No Tunjangan</th>
				<th>Tanggal Tunjangan</th>
				<th>Jenis</th>
				<th>TMT Tunjangan</th>
				<th>Perkawinan dari</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($tunjangan as $value): ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo ucwords($value->no_tunjangan); ?></td>
				<td><?php echo ucwords($value->tgl_tunjangan); ?></td>
				<td><?php echo ucfirst($value->jenis_tunjangan); ?></td>
				<td><?php echo ucfirst($value->tmt_tunjangan); ?></td>
				<td><?php echo ucfirst($value->perkawinan_dari); ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
</div>

<div class="collapse" id="kawin">
	<br><h3>Izin Kawin</h3>
	<table class="table table-striped display" id="table-1">
		<thead>
			<tr>
				<th class="text-center">
					#
				</th>
				<th>Suami / Istri</th>
				<th>Suami / Istri</th>
				<th>Tanggal Nikah</th>
				<th>No Izin Nikah</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($kawin as $value): ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo ucwords($value->nama_pegawai); ?></td>
				<td><?php echo ucwords($value->nama_dia); ?></td>
				<td><?php echo $value->tanggal_kawin; ?></td>
				<td><?php echo ucwords($value->no_izin_kawin); ?></td>
			</tr>
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
	</section>
</div>

