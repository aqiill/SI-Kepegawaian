<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pangkatgolongan extends CI_Model {


    public function daftar($table){
        return $this->db->get($table);
    }

    public function daftar_detail($table,$id){
        return $this->db->get_where($table,array('id_pangkatgolongan' => $id));
    }

    public function tambah($table,$data){
        return $this->db->insert($table,$data);
    }

    public function edit($table,$data,$id){
        return $this->db->update($table,$data,array('id_pangkatgolongan' => $id));
    }

    public function hapus($table, $id)
    {
        return $this->db->delete($table,array('id_pangkatgolongan' => $id));
    }

    public function rekapitulasi()
    {
        $this->db->select('nama_pangkatgolongan, COUNT(pangkat) as total');
        $this->db->from('tb_pangkatgolongan');
        $this->db->join('tb_pangkat','tb_pangkatgolongan.id_pangkatgolongan = tb_pangkat.pangkat');
        $this->db->group_by('pangkat');

        return $this->db->get();
    }
    // -----------------------------------------------------------------
    public function rekapitulasi_o($id)
    {
        $this->db->select('nama_pangkatgolongan,id_unitkerja, COUNT(pangkat) as total');
        $this->db->from('tb_pangkatgolongan');
        $this->db->join('tb_pangkat','tb_pangkatgolongan.id_pangkatgolongan = tb_pangkat.pangkat');
        $this->db->join('tb_pegawai','tb_pangkat.id_pegawai = tb_pegawai.id_pegawai');
        $this->db->group_by('pangkat');
        $this->db->where('tb_pegawai.id_unitkerja', $id);
        return $this->db->get();
    }
}