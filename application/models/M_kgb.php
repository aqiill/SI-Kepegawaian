<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kgb extends CI_Model {


    public function daftar(){
        $this->db->select('*');
        $this->db->from('tb_kgb');
        $this->db->join('tb_pegawai', 'tb_kgb.id_pegawai = tb_pegawai.id_pegawai');
        $query = $this->db->get();
        return $query->result();
    }

    public function masakgb(){
        $this->db->select('*');
        $this->db->from('tb_kgb');
        $this->db->join('tb_pegawai', 'tb_kgb.id_pegawai = tb_pegawai.id_pegawai');
        $this->db->join('tb_unitkerja', 'tb_pegawai.id_unitkerja = tb_unitkerja.id_unitkerja');
        $query = $this->db->get();
        return $query->result();
    }

    public function daftar_detail($id){
        $this->db->select('*');
        $this->db->from('tb_kgb');
        $this->db->join('tb_pegawai', 'tb_kgb.id_pegawai = tb_pegawai.id_pegawai');
        $this->db->where('id_kgb', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function view($id){
        $this->db->select('*');
        $this->db->from('tb_kgb');
        $this->db->join('tb_pegawai', 'tb_kgb.id_pegawai = tb_pegawai.id_pegawai');
        $this->db->where('tb_pegawai.id_pegawai', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function tambah($table,$data){
        return $this->db->insert($table,$data);
    }

    public function edit($table,$data,$id){
        return $this->db->update($table,$data,array('id_kgb' => $id));
    }

    public function hapus($table, $id)
    {
        return $this->db->delete($table,array('id_kgb' => $id));
    }
    // -----------------------------------------------------------------------
    public function daftar_o($id){
        $this->db->select('*');
        $this->db->from('tb_kgb');
        $this->db->join('tb_pegawai', 'tb_kgb.id_pegawai = tb_pegawai.id_pegawai');
        $this->db->where('tb_pegawai.id_unitkerja', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function masakgb_o($id){
        $this->db->select('*');
        $this->db->from('tb_kgb');
        $this->db->join('tb_pegawai', 'tb_kgb.id_pegawai = tb_pegawai.id_pegawai');
        $this->db->join('tb_unitkerja', 'tb_pegawai.id_unitkerja = tb_unitkerja.id_unitkerja');
        $this->db->where('tb_pegawai.id_unitkerja', $id);
        $query = $this->db->get();
        return $query->result();
    }
}