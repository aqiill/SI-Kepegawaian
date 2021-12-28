<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_cabangdinas extends CI_Model {


    public function daftar($table){
        return $this->db->get($table);
    }

    public function daftar_detail($table,$id){
        return $this->db->get_where($table,array('id_cabdin' => $id));
    }

    public function tambah($table,$data){
        return $this->db->insert($table,$data);
    }

    public function edit($table,$data,$id){
        return $this->db->update($table,$data,array('id_cabdin' => $id));
    }

    public function hapus($table, $id)
    {
        return $this->db->delete($table,array('id_cabdin' => $id));
    }
}