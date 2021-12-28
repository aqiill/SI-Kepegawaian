<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penghargaan extends CI_Model {


    public function daftar(){
        $this->db->select('*');
        $this->db->from('tb_penghargaan');
        $this->db->join('tb_pegawai', 'tb_penghargaan.id_pegawai = tb_pegawai.id_pegawai');
        $query = $this->db->get();
        return $query->result();
    }

    public function jlmdaftar($table){
        return $this->db->get($table);
    }

    public function jlmdaftar_o($table,$id){
        $this->db->select('*');
        $this->db->from('tb_penghargaan');
        $this->db->join('tb_pegawai', 'tb_penghargaan.id_pegawai = tb_pegawai.id_pegawai');
        $this->db->where('id_unitkerja', $id);
        return $this->db->get();
    }

    public function daftar_detail($id){
        $this->db->select('*');
        $this->db->from('tb_penghargaan');
        $this->db->join('tb_pegawai', 'tb_penghargaan.id_pegawai = tb_pegawai.id_pegawai');
        $this->db->where('id_penghargaan', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function view($id){
        $this->db->select('*');
        $this->db->from('tb_penghargaan');
        $this->db->join('tb_pegawai', 'tb_penghargaan.id_pegawai = tb_pegawai.id_pegawai');
        $this->db->where('tb_pegawai.id_pegawai', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function tambah($table,$data){
        return $this->db->insert($table,$data);
    }

    public function edit($table,$data,$id){
        return $this->db->update($table,$data,array('id_penghargaan' => $id));
    }

    public function hapus($table, $id)
    {
        return $this->db->delete($table,array('id_penghargaan' => $id));
    }
    // ------------------------------------------------------------------
    public function daftar_o($id){
        $this->db->select('*');
        $this->db->from('tb_penghargaan');
        $this->db->join('tb_pegawai', 'tb_penghargaan.id_pegawai = tb_pegawai.id_pegawai');
        $this->db->where('tb_pegawai.id_unitkerja', $id);
        $query = $this->db->get();
        return $query->result();
    }
}