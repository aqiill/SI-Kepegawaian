<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model {

    public function bazeting(){
        $this->db->select('nama_pegawai, nip_pegawai, nama_pangkatgolongan,nama_jabatan,pendidikan_terakhir,tgllahir_pegawai,status_pegawai,tempatlahir_pegawai,agama,jk_pegawai,tmt_pangkat,tgl_sk,alamat_pegawai,hp');
        $this->db->from('tb_pangkat');
        $this->db->join('tb_pegawai', 'tb_pangkat.id_pegawai = tb_pegawai.id_pegawai');
        $this->db->join('tb_pangkatgolongan', 'tb_pangkat.pangkat = tb_pangkatgolongan.id_pangkatgolongan');
        $this->db->join('tb_tugastam', 'tb_tugastam.id_pegawai = tb_pegawai.id_pegawai');
        $this->db->join('tb_jabatan', 'tb_tugastam.id_jabatan = tb_jabatan.id_jabatan');
        $query = $this->db->get();
        return $query->result();
    }
    // ----------------------------------------------------------------------
    public function bazeting_o($id){
        $this->db->select('nama_pegawai, nip_pegawai, nama_pangkatgolongan,nama_jabatan,pendidikan_terakhir,tgllahir_pegawai,status_pegawai,tempatlahir_pegawai,agama,jk_pegawai,tmt_pangkat,tgl_sk,alamat_pegawai,hp');
        $this->db->from('tb_pangkat');
        $this->db->join('tb_pegawai', 'tb_pangkat.id_pegawai = tb_pegawai.id_pegawai');
        $this->db->join('tb_pangkatgolongan', 'tb_pangkat.pangkat = tb_pangkatgolongan.id_pangkatgolongan');
        $this->db->join('tb_tugastam', 'tb_tugastam.id_pegawai = tb_pegawai.id_pegawai');
        $this->db->join('tb_jabatan', 'tb_tugastam.id_jabatan = tb_jabatan.id_jabatan');
        $this->db->where('tb_pegawai.id_unitkerja', $id);
        $query = $this->db->get();
        return $query->result();
    }

}