<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_unitkerja extends CI_Model {


    public function daftar($table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('tb_wilayah',$table.'.id_wilayah = tb_wilayah.id_wilayah');
        return $this->db->get();
    }


    public function daftar_detail($table,$id){
        return $this->db->get_where($table, array('id_unitkerja' => $id));
    }

    public function tambah($table,$data){
        $this->db->insert($table,$data);
    }

    public function edit($table,$data,$id){
        $this->db->update($table,$data,array('id_unitkerja' => $id));
    }

    public function hapus($table,$id){
        $this->db->delete($table,array('id_unitkerja' => $id));
    }

    public function rekapitulasi()
    {
        $this->db->select('nama_unitkerja, COUNT(nama_unitkerja) as total');
        $this->db->from('tb_unitkerja');
        $this->db->join('tb_pegawai','tb_unitkerja.id_unitkerja = tb_pegawai.id_unitkerja');
        $this->db->group_by('nama_unitkerja');

        return $this->db->get();
    }
    // ------------------------------------------------------------------------
    public function daftar_o($table,$id){
        return $this->db->get_where($table,array('id_unitkerja' => $id));
    }
    public function rekapitulasi_o($id)
    {
        $this->db->select('nama_unitkerja, COUNT(nama_unitkerja) as total');
        $this->db->from('tb_unitkerja');
        $this->db->join('tb_pegawai','tb_unitkerja.id_unitkerja = tb_pegawai.id_unitkerja');
        $this->db->group_by('nama_unitkerja');
        $this->db->where('tb_pegawai.id_unitkerja', $id);
        return $this->db->get();
    }
}