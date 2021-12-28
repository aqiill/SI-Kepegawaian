<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_wilayah extends CI_Model {


    public function daftar($table){
        return $this->db->get($table);
    }

    public function daftar_detail($table,$id){
        return $this->db->get_where($table, array('id_wilayah' => $id));
    }

    public function tambah($table,$data){
        $this->db->insert($table,$data);
    }

    public function edit($table,$data,$id){
        $this->db->update($table,$data,array('id_wilayah' => $id));
    }

    public function hapus($table,$id){
        $this->db->delete($table,array('id_wilayah' => $id));
    }

    public function hitung(){

        $this->db->select('nama_wilayah, COUNT(tb_unitkerja.id_wilayah) as total');
        $this->db->from('tb_wilayah');
        $this->db->join('tb_unitkerja', 'tb_wilayah.id_wilayah = tb_unitkerja.id_wilayah');
        $this->db->group_by('tb_unitkerja.id_wilayah');

        return $this->db->get();
    }
}