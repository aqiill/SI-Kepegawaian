-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Des 2021 pada 03.34
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_simpeg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anak`
--

CREATE TABLE `tb_anak` (
  `id_anak` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `nama_anak` varchar(50) NOT NULL,
  `tempat_lahir_anak` varchar(50) NOT NULL,
  `tgl_lahir_anak` date NOT NULL,
  `jk_anak` enum('l','p') NOT NULL,
  `pendidikan_anak` enum('Belum Sekolah','PAUD','TK','SD','SLTP','SLTA','D1','D2','D3','D4','S1','S2','S3') NOT NULL,
  `pekerjaan_anak` text NOT NULL,
  `status_hub_anak` enum('kandung','angkat') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_anak`
--

INSERT INTO `tb_anak` (`id_anak`, `id_pegawai`, `nama_anak`, `tempat_lahir_anak`, `tgl_lahir_anak`, `jk_anak`, `pendidikan_anak`, `pekerjaan_anak`, `status_hub_anak`) VALUES
(1, 2, 'Trisno', 'Padang', '2000-12-14', 'l', 'SLTA', '', 'kandung'),
(2, 2, 'Lili', 'Jakarta', '1992-11-09', 'p', 'D3', '', 'kandung'),
(3, 2, 'Paijo', 'Pyk', '2021-12-13', 'l', 'Belum Sekolah', '', 'kandung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bahasa`
--

CREATE TABLE `tb_bahasa` (
  `id_bahasa` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `jenis_bahasa` varchar(50) NOT NULL,
  `bahasa` varchar(50) NOT NULL,
  `kemampuan_bicara` enum('aktif','pasif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cabdin`
--

CREATE TABLE `tb_cabdin` (
  `id_cabdin` int(5) NOT NULL,
  `cabdin` varchar(50) NOT NULL,
  `pimpinan_cabdin` varchar(50) NOT NULL,
  `alamat_cabdin` text NOT NULL,
  `email_cabdin` varchar(50) NOT NULL,
  `telp_cabdin` varchar(12) NOT NULL,
  `website_cabdin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cuti`
--

CREATE TABLE `tb_cuti` (
  `id_cuti` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `perihal_cuti` varchar(255) NOT NULL,
  `t_mulai_cuti` date NOT NULL,
  `t_selesai_cuti` date NOT NULL,
  `no_surat_izin_cuti` varchar(50) NOT NULL,
  `pengesah_surat_cuti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_cuti`
--

INSERT INTO `tb_cuti` (`id_cuti`, `id_pegawai`, `perihal_cuti`, `t_mulai_cuti`, `t_selesai_cuti`, `no_surat_izin_cuti`, `pengesah_surat_cuti`) VALUES
(1, 3, 'Nikah', '2021-12-14', '2021-12-15', '1234687986', 'Pak Edi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hukuman`
--

CREATE TABLE `tb_hukuman` (
  `id_hukuman` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `masalah` varchar(255) NOT NULL,
  `tgl_hukuman` date NOT NULL,
  `sanksi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_izin_kawin`
--

CREATE TABLE `tb_izin_kawin` (
  `id_izin_kawin` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `no_izin_kawin` varchar(50) NOT NULL,
  `tgl_izin_kawin` date NOT NULL,
  `kebangsaan` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `alamat_ayah` text NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(100) NOT NULL,
  `alamat_ibu` text NOT NULL,
  `nama_dia` varchar(50) NOT NULL,
  `tempat_lahir_dia` varchar(50) NOT NULL,
  `tgl_lahir_dia` date NOT NULL,
  `pekerjaan_dia` varchar(100) NOT NULL,
  `nik_dia` varchar(16) NOT NULL,
  `kebangsaan_dia` varchar(50) NOT NULL,
  `nama_ayah_dia` varchar(50) NOT NULL,
  `pekerjaan_ayah_dia` varchar(100) NOT NULL,
  `alamat_ayah_dia` text NOT NULL,
  `nama_ibu_dia` varchar(50) NOT NULL,
  `pekerjaan_ibu_dia` varchar(100) NOT NULL,
  `alamat_ibu_dia` text NOT NULL,
  `tempat_kawin` varchar(50) NOT NULL,
  `tanggal_kawin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(5) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_mutasi`
--

CREATE TABLE `tb_jenis_mutasi` (
  `id_jenis_mutasi` int(5) NOT NULL,
  `nama_jenis_mutasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kgb`
--

CREATE TABLE `tb_kgb` (
  `id_kgb` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `golongan` varchar(10) NOT NULL,
  `tmt_kgb` date NOT NULL,
  `gaji` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mutasi`
--

CREATE TABLE `tb_mutasi` (
  `id_mutasi` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `id_jenis_mutasi` int(5) NOT NULL,
  `id_unitkerja` int(5) NOT NULL,
  `tmt_mutasi` date NOT NULL,
  `asal_instansi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ortu`
--

CREATE TABLE `tb_ortu` (
  `id_ortu` int(6) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `nama_ortu` varchar(50) NOT NULL,
  `tempat_lahir_ortu` varchar(50) NOT NULL,
  `tgl_lahir_ortu` date NOT NULL,
  `jk_ortu` enum('l','p') NOT NULL,
  `pendidikan_ortu` enum('Tidak Sekolah','PAUD','TK','SD','SLTP','SLTA','D1','D2','D3','D4','S1','S2','S3') NOT NULL,
  `status_hub_ortu` enum('Ayah Kandung','Ibu Kandung') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pangkat`
--

CREATE TABLE `tb_pangkat` (
  `id_pangkat` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `pangkat` varchar(50) NOT NULL,
  `tmt_pangkat` varchar(50) NOT NULL,
  `pengesah_sk` varchar(50) NOT NULL,
  `no_sk` varchar(50) NOT NULL,
  `tgl_sk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pangkat`
--

INSERT INTO `tb_pangkat` (`id_pangkat`, `id_pegawai`, `pangkat`, `tmt_pangkat`, `pengesah_sk`, `no_sk`, `tgl_sk`) VALUES
(1, 2, '1', '2021-12-08', 'Aqil', '46466879', '2021-12-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pangkatgolongan`
--

CREATE TABLE `tb_pangkatgolongan` (
  `id_pangkatgolongan` int(5) NOT NULL,
  `nama_pangkatgolongan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pangkatgolongan`
--

INSERT INTO `tb_pangkatgolongan` (`id_pangkatgolongan`, `nama_pangkatgolongan`) VALUES
(1, 'IV/a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasutri`
--

CREATE TABLE `tb_pasutri` (
  `id_pasutri` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `nama_pasutri` varchar(50) NOT NULL,
  `tgl_nikah` date NOT NULL,
  `no_kartu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pasutri`
--

INSERT INTO `tb_pasutri` (`id_pasutri`, `id_pegawai`, `nama_pasutri`, `tgl_nikah`, `no_kartu`) VALUES
(1, 2, 'Wati', '2021-11-10', '32165498'),
(2, 3, 'suzy', '2026-06-01', '1234687946123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int(5) NOT NULL,
  `id_unitkerja` int(5) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `nip_pegawai` varchar(18) NOT NULL,
  `jk_pegawai` enum('l','p') NOT NULL,
  `tempatlahir_pegawai` varchar(50) NOT NULL,
  `tgllahir_pegawai` date NOT NULL,
  `goldarah` varchar(2) NOT NULL,
  `agama` enum('islam','kristen','protestan','hindu','budha','konghucu') NOT NULL,
  `hp` varchar(12) NOT NULL,
  `email_pegawai` varchar(50) NOT NULL,
  `pendidikan_terakhir` varchar(20) NOT NULL,
  `alamat_pegawai` text NOT NULL,
  `status_pegawai` enum('honor','pns') NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `id_unitkerja`, `nama_pegawai`, `nip_pegawai`, `jk_pegawai`, `tempatlahir_pegawai`, `tgllahir_pegawai`, `goldarah`, `agama`, `hp`, `email_pegawai`, `pendidikan_terakhir`, `alamat_pegawai`, `status_pegawai`, `foto`) VALUES
(1, 0, 'administrator', '', 'l', '', '2020-07-11', '', '', '', '', '', '', '', ''),
(2, 1, 'john doe', '199001102014050001', 'l', 'Singapore', '1990-01-10', 'A', 'islam', '081216951492', 'johndoe@gmail.com', 'S1', 'Bandung', 'pns', 'simpeg_1598531080.jpg'),
(3, 2, 'rony', '200212022025080001', 'l', 'Payakumbuh', '2002-12-02', 'O', 'islam', '081374821410', 'ronnyfebriansaputra@gmail.com', 'SLTA', 'Sarilamak', 'pns', 'simpeg_1639408001.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penghargaan`
--

CREATE TABLE `tb_penghargaan` (
  `id_penghargaan` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `tingkat` varchar(100) NOT NULL,
  `ranking` varchar(100) NOT NULL,
  `tgl_penghargaan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sekolah`
--

CREATE TABLE `tb_sekolah` (
  `id_sekolahpegawai` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `tingkat_sekolah` enum('PAUD','TK','SD','SLTP','SLTA','D1','D2','D3','D4','S1','S2','S3') NOT NULL,
  `nama_sekolah_pendidikan` varchar(50) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `nomor_ijazah` varchar(30) NOT NULL,
  `tgl_ijazah` date NOT NULL,
  `nama_kepsek_rektor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sertifikasi`
--

CREATE TABLE `tb_sertifikasi` (
  `id_sertifikasi` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `no_sertifikat_sertifikasi` varchar(30) NOT NULL,
  `no_peserta` varchar(30) NOT NULL,
  `mapel_sertifikasi` varchar(100) NOT NULL,
  `tahun_sertifikasi` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sppd`
--

CREATE TABLE `tb_sppd` (
  `id_sppd` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `no_sppd` varchar(50) NOT NULL,
  `dari` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `uang_jalan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tugastam`
--

CREATE TABLE `tb_tugastam` (
  `id_tugastam` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `id_jabatan` int(5) NOT NULL,
  `no_sk` varchar(20) NOT NULL,
  `tgl_sk_tugas` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tunjangan`
--

CREATE TABLE `tb_tunjangan` (
  `id_tunjangan` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `no_tunjangan` varchar(50) NOT NULL,
  `tgl_tunjangan` date NOT NULL,
  `jenis_tunjangan` varchar(100) NOT NULL,
  `tmt_tunjangan` date NOT NULL,
  `perkawinan_dari` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_unitkerja`
--

CREATE TABLE `tb_unitkerja` (
  `id_unitkerja` int(5) NOT NULL,
  `id_wilayah` int(5) NOT NULL,
  `nama_unitkerja` varchar(50) NOT NULL,
  `kepsek` varchar(50) NOT NULL,
  `status_unitkerja` varchar(50) NOT NULL,
  `npsn` varchar(8) NOT NULL,
  `alamat` text NOT NULL,
  `latitude` varchar(30) NOT NULL,
  `longitude` varchar(30) NOT NULL,
  `email_sekolah` varchar(20) NOT NULL,
  `website` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_unitkerja`
--

INSERT INTO `tb_unitkerja` (`id_unitkerja`, `id_wilayah`, `nama_unitkerja`, `kepsek`, `status_unitkerja`, `npsn`, `alamat`, `latitude`, `longitude`, `email_sekolah`, `website`) VALUES
(1, 1, 'sma negeri 1 payakumbuh', 'das', 'negeri', '321654', 'tiakar', '321654', '-3218', 'sman1pyk@gmail.com', 'sman1pyk.com'),
(2, 2, 'sma negeri 1 harau', 'duk', 'negeri', '32165', 'harau', '321654', '-14321', 'sahara@gmail.com', 'sahara.com'),
(3, 3, 'Sma negeri 1 batusangkar', 'kes', 'negeri', '2164', 'batusangkar', '2156', '-65421', 'sman1btskr@gmail.com', 'sma1btskr.sch.id'),
(4, 1, 'sma negeri 2 payakumbuh', 'irma', 'negeri', '21654', 'bukik sitabua', '321654', '-654321', 'cafla@gmail.com', 'cafla.sch.id'),
(5, 9, 'SMA Negeri 2 Batusangkar', 'Afendi', 'negeri', '31321654', 'Jalan Ahmad Yani', '', '', 'support@sman2.sch.id', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(5) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `level` enum('admin','cabdin','operator','guru') NOT NULL,
  `status` enum('0','1') NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `level`, `status`, `username`, `password`) VALUES
(1, '1', 'admin', '1', 'admin', 'b4ec794aa88875d4adf881528018ab6c2eab3c9a'),
(2, '2', 'guru', '1', 'johndoe', '9d444de75036a055785226e3e5fc28df3a6d3c7f');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_wilayah`
--

CREATE TABLE `tb_wilayah` (
  `id_wilayah` int(5) NOT NULL,
  `nama_wilayah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_wilayah`
--

INSERT INTO `tb_wilayah` (`id_wilayah`, `nama_wilayah`) VALUES
(1, 'payakumbuh'),
(2, '50 Kota'),
(9, 'Tanah Datar');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_anak`
--
ALTER TABLE `tb_anak`
  ADD PRIMARY KEY (`id_anak`);

--
-- Indeks untuk tabel `tb_bahasa`
--
ALTER TABLE `tb_bahasa`
  ADD PRIMARY KEY (`id_bahasa`);

--
-- Indeks untuk tabel `tb_cabdin`
--
ALTER TABLE `tb_cabdin`
  ADD PRIMARY KEY (`id_cabdin`);

--
-- Indeks untuk tabel `tb_cuti`
--
ALTER TABLE `tb_cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indeks untuk tabel `tb_hukuman`
--
ALTER TABLE `tb_hukuman`
  ADD PRIMARY KEY (`id_hukuman`);

--
-- Indeks untuk tabel `tb_izin_kawin`
--
ALTER TABLE `tb_izin_kawin`
  ADD PRIMARY KEY (`id_izin_kawin`);

--
-- Indeks untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `tb_jenis_mutasi`
--
ALTER TABLE `tb_jenis_mutasi`
  ADD PRIMARY KEY (`id_jenis_mutasi`);

--
-- Indeks untuk tabel `tb_kgb`
--
ALTER TABLE `tb_kgb`
  ADD PRIMARY KEY (`id_kgb`);

--
-- Indeks untuk tabel `tb_mutasi`
--
ALTER TABLE `tb_mutasi`
  ADD PRIMARY KEY (`id_mutasi`);

--
-- Indeks untuk tabel `tb_ortu`
--
ALTER TABLE `tb_ortu`
  ADD PRIMARY KEY (`id_ortu`);

--
-- Indeks untuk tabel `tb_pangkat`
--
ALTER TABLE `tb_pangkat`
  ADD PRIMARY KEY (`id_pangkat`);

--
-- Indeks untuk tabel `tb_pangkatgolongan`
--
ALTER TABLE `tb_pangkatgolongan`
  ADD PRIMARY KEY (`id_pangkatgolongan`);

--
-- Indeks untuk tabel `tb_pasutri`
--
ALTER TABLE `tb_pasutri`
  ADD PRIMARY KEY (`id_pasutri`);

--
-- Indeks untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `tb_penghargaan`
--
ALTER TABLE `tb_penghargaan`
  ADD PRIMARY KEY (`id_penghargaan`);

--
-- Indeks untuk tabel `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  ADD PRIMARY KEY (`id_sekolahpegawai`);

--
-- Indeks untuk tabel `tb_sertifikasi`
--
ALTER TABLE `tb_sertifikasi`
  ADD PRIMARY KEY (`id_sertifikasi`);

--
-- Indeks untuk tabel `tb_sppd`
--
ALTER TABLE `tb_sppd`
  ADD PRIMARY KEY (`id_sppd`);

--
-- Indeks untuk tabel `tb_tugastam`
--
ALTER TABLE `tb_tugastam`
  ADD PRIMARY KEY (`id_tugastam`);

--
-- Indeks untuk tabel `tb_tunjangan`
--
ALTER TABLE `tb_tunjangan`
  ADD PRIMARY KEY (`id_tunjangan`);

--
-- Indeks untuk tabel `tb_unitkerja`
--
ALTER TABLE `tb_unitkerja`
  ADD PRIMARY KEY (`id_unitkerja`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nama_user` (`nama_user`);

--
-- Indeks untuk tabel `tb_wilayah`
--
ALTER TABLE `tb_wilayah`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_anak`
--
ALTER TABLE `tb_anak`
  MODIFY `id_anak` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_bahasa`
--
ALTER TABLE `tb_bahasa`
  MODIFY `id_bahasa` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_cabdin`
--
ALTER TABLE `tb_cabdin`
  MODIFY `id_cabdin` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_cuti`
--
ALTER TABLE `tb_cuti`
  MODIFY `id_cuti` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_hukuman`
--
ALTER TABLE `tb_hukuman`
  MODIFY `id_hukuman` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_izin_kawin`
--
ALTER TABLE `tb_izin_kawin`
  MODIFY `id_izin_kawin` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_mutasi`
--
ALTER TABLE `tb_jenis_mutasi`
  MODIFY `id_jenis_mutasi` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_kgb`
--
ALTER TABLE `tb_kgb`
  MODIFY `id_kgb` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_mutasi`
--
ALTER TABLE `tb_mutasi`
  MODIFY `id_mutasi` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_ortu`
--
ALTER TABLE `tb_ortu`
  MODIFY `id_ortu` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_pangkat`
--
ALTER TABLE `tb_pangkat`
  MODIFY `id_pangkat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_pangkatgolongan`
--
ALTER TABLE `tb_pangkatgolongan`
  MODIFY `id_pangkatgolongan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_pasutri`
--
ALTER TABLE `tb_pasutri`
  MODIFY `id_pasutri` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_pegawai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_penghargaan`
--
ALTER TABLE `tb_penghargaan`
  MODIFY `id_penghargaan` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  MODIFY `id_sekolahpegawai` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_sertifikasi`
--
ALTER TABLE `tb_sertifikasi`
  MODIFY `id_sertifikasi` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_sppd`
--
ALTER TABLE `tb_sppd`
  MODIFY `id_sppd` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_tugastam`
--
ALTER TABLE `tb_tugastam`
  MODIFY `id_tugastam` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_tunjangan`
--
ALTER TABLE `tb_tunjangan`
  MODIFY `id_tunjangan` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_unitkerja`
--
ALTER TABLE `tb_unitkerja`
  MODIFY `id_unitkerja` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_wilayah`
--
ALTER TABLE `tb_wilayah`
  MODIFY `id_wilayah` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
