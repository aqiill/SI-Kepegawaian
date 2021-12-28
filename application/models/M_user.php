<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model {


    public function admin($table){
        $this->db->select('id_user,nama_user,level,status,username');
        $this->db->from($table);
        $this->db->join('tb_unitkerja',$table.'.id_unitkerja = tb_unitkerja.id_unitkerja');
        $this->db->where('level','admin');
        return $this->db->get();
    }

    public function sekolah($table){
        $this->db->select('id_user,nama_unitkerja,nama_user,level,status,username,nama_pegawai');
        $this->db->from($table);
        $this->db->join('tb_pegawai',$table.'.nama_user = tb_pegawai.id_pegawai');
        $this->db->join('tb_unitkerja','tb_pegawai.id_unitkerja = tb_unitkerja.id_unitkerja');
        $this->db->where('level','operator');
        return $this->db->get();
    }

    public function guru($table){
        $this->db->select('id_user,nama_unitkerja,nama_user,level,status,username,nama_pegawai');
        $this->db->from($table);
        $this->db->join('tb_pegawai',$table.'.nama_user = tb_pegawai.id_pegawai');
        $this->db->join('tb_unitkerja','tb_pegawai.id_unitkerja = tb_unitkerja.id_unitkerja');
        $this->db->where('level','guru');
        return $this->db->get();
    }    

    public function detail($table,$id){
        return $this->db->get_where($table,array('id_user' => $id));
    }

    public function tambah($table,$data){
        return $this->db->insert($table,$data);
    }

    public function edit($table,$data,$id){
        return $this->db->update($table,$data,array('id_user' => $id));
    }

    public function hapus($table, $id)
    {
        return $this->db->delete($table,array('id_user' => $id));
    }

// ------------------------------------------------------------------------------
    public function guru_o($table,$id){
        $this->db->select('id_user,nama_unitkerja,nama_user,level,status,username,nama_pegawai');
        $this->db->from($table);
        $this->db->join('tb_pegawai',$table.'.nama_user = tb_pegawai.id_pegawai');
        $this->db->join('tb_unitkerja','tb_pegawai.id_unitkerja = tb_unitkerja.id_unitkerja');
        $this->db->where('level','guru');
        $this->db->where('tb_pegawai.id_unitkerja',$id);
        return $this->db->get();
    } 
}