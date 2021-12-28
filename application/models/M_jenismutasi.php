<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_jenismutasi extends CI_Model {


    public function daftar($table){
        return $this->db->get($table);
    }

    public function daftar_detail($table,$id){
        return $this->db->get_where($table, array('id_jenis_mutasi' => $id));
    }

    public function tambah($table,$data){
        $this->db->insert($table,$data);
    }

    public function edit($table,$data,$id){
        $this->db->update($table,$data,array('id_jenis_mutasi' => $id));
    }

    public function hapus($table,$id){
        $this->db->delete($table,array('id_jenis_mutasi' => $id));
    }
}