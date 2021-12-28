<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_mutasi extends CI_Model {


    public function daftar(){
        $this->db->select('*');
        $this->db->from('tb_mutasi');
        $this->db->join('tb_pegawai', 'tb_mutasi.id_pegawai = tb_pegawai.id_pegawai');
        // $this->db->join('tb_unitkerja', 'tb_pegawai.id_unitkerja = tb_unitkerja.id_unitkerja');
        $this->db->join('tb_unitkerja', 'tb_mutasi.id_unitkerja = tb_unitkerja.id_unitkerja');
        $this->db->join('tb_jenis_mutasi', 'tb_mutasi.id_jenis_mutasi = tb_jenis_mutasi.id_jenis_mutasi');
        $query = $this->db->get();
        return $query->result();
    }

    public function daftar_detail($id){
        $this->db->select('*');
        $this->db->from('tb_mutasi');
        $this->db->join('tb_pegawai', 'tb_mutasi.id_pegawai = tb_pegawai.id_pegawai');
        // $this->db->join('tb_unitkerja', 'tb_pegawai.id_unitkerja = tb_unitkerja.id_unitkerja');
        $this->db->join('tb_unitkerja', 'tb_mutasi.id_unitkerja = tb_unitkerja.id_unitkerja');
        $this->db->join('tb_jenis_mutasi', 'tb_mutasi.id_jenis_mutasi = tb_jenis_mutasi.id_jenis_mutasi');
        $this->db->where('id_mutasi', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function tambah($table,$data){
        return $this->db->insert($table,$data);
    }

    public function edit($table,$data,$id){
        return $this->db->update($table,$data,array('id_mutasi' => $id));
    }

    public function hapus($table, $id)
    {
        return $this->db->delete($table,array('id_mutasi' => $id));
    }

    public function rekapitulasi()
    {
        $this->db->select('*, COUNT(nama_unitkerja) as total');
        $this->db->from('tb_sertifikasi');
        $this->db->join('tb_pegawai','tb_sertifikasi.id_pegawai = tb_pegawai.id_pegawai');
        $this->db->join('tb_unitkerja','tb_unitkerja.id_unitkerja = tb_pegawai.id_unitkerja');
        $this->db->group_by('nama_unitkerja');

        return $this->db->get($id);
    }
    // ----------------------------------------------------------------------
    public function daftar_o($id){
        $this->db->select('*');
        $this->db->from('tb_mutasi');
        $this->db->join('tb_pegawai', 'tb_mutasi.id_pegawai = tb_pegawai.id_pegawai');
        // $this->db->join('tb_unitkerja', 'tb_pegawai.id_unitkerja = tb_unitkerja.id_unitkerja');
        $this->db->join('tb_unitkerja', 'tb_mutasi.id_unitkerja = tb_unitkerja.id_unitkerja');
        $this->db->join('tb_jenis_mutasi', 'tb_mutasi.id_jenis_mutasi = tb_jenis_mutasi.id_jenis_mutasi');
        $this->db->where('tb_pegawai.id_unitkerja', $id);
        $query = $this->db->get();
        return $query->result();
    }
}