<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_datapegawai extends CI_Model {


    public function perdaftar($table){
        return $this->db->get($table);
    }

    public function daftar(){
        $this->db->select('*');
        $this->db->from('tb_pegawai');
        $this->db->join('tb_unitkerja', 'tb_pegawai.id_unitkerja = tb_unitkerja.id_unitkerja');
        $query = $this->db->get();
        return $query->result();
    }

    public function daftar_detail($id){
        $this->db->select('*');
        $this->db->from('tb_pegawai');
        $this->db->join('tb_unitkerja', 'tb_pegawai.id_unitkerja = tb_unitkerja.id_unitkerja');
        $this->db->where('id_pegawai', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function tambah($table,$data){
        return $this->db->insert($table,$data);
    }

    public function edit($table,$data,$id){
        return $this->db->update($table,$data,array('id_pegawai' => $id));
    }

    public function hapus($table, $id)
    {
        return $this->db->delete($table,array('id_pegawai' => $id));
    }

    public function rekapitulasi()
    {
        $this->db->select('*, COUNT(pendidikan_terakhir) as total');
        $this->db->from('tb_pegawai');
        $this->db->group_by('pendidikan_terakhir');

        return $this->db->get();
    }

    public function rekapitulasi_pns()
    {
        $this->db->select('pendidikan_terakhir,nama_unitkerja, COUNT(status_pegawai) as total');
        $this->db->from('tb_pegawai');
        $this->db->join('tb_unitkerja','tb_pegawai.id_unitkerja = tb_unitkerja.id_unitkerja');
        $this->db->group_by('tb_pegawai.id_unitkerja');
        $this->db->where('status_pegawai', 'pns');
        return $this->db->get();
    }

    public function rekapitulasi_honor()
    {
        $this->db->select('pendidikan_terakhir,nama_unitkerja,COUNT(status_pegawai) as total');
        $this->db->from('tb_pegawai');
        $this->db->join('tb_unitkerja','tb_pegawai.id_unitkerja = tb_unitkerja.id_unitkerja');
        $this->db->group_by('tb_pegawai.id_unitkerja');
        $this->db->where('status_pegawai', 'honor');

        return $this->db->get();
    }


    // ----------------------------------------------------------------------------------------

    public function daftar_o($id){
        $this->db->select('*');
        $this->db->from('tb_pegawai');
        $this->db->join('tb_unitkerja', 'tb_pegawai.id_unitkerja = tb_unitkerja.id_unitkerja');
        $this->db->where('tb_pegawai.id_unitkerja', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function daftar_user($id,$id_pegawai){
        $this->db->select('*');
        $this->db->from('tb_pegawai');
        $this->db->join('tb_unitkerja', 'tb_pegawai.id_unitkerja = tb_unitkerja.id_unitkerja');
        $this->db->where('tb_pegawai.id_unitkerja', $id);
        $this->db->where('tb_pegawai.id_pegawai <>', $id_pegawai);
        $query = $this->db->get();
        return $query->result();
    }

    public function rekapitulasi_o($id)
    {
        $this->db->select('*, COUNT(pendidikan_terakhir) as total');
        $this->db->from('tb_pegawai');
        $this->db->group_by('pendidikan_terakhir');
        $this->db->where('tb_pegawai.id_unitkerja', $id);
        return $this->db->get();
    }

    public function rekapitulasi_pns_o($id)
    {
        $this->db->select('pendidikan_terakhir,nama_unitkerja, COUNT(status_pegawai) as total');
        $this->db->from('tb_pegawai');
        $this->db->join('tb_unitkerja','tb_pegawai.id_unitkerja = tb_unitkerja.id_unitkerja');
        $this->db->group_by('tb_pegawai.id_unitkerja');
        $this->db->where('status_pegawai', 'pns');
        $this->db->where('tb_pegawai.id_unitkerja', $id);
        return $this->db->get();
    }

    public function rekapitulasi_honor_o($id)
    {
        $this->db->select('nama_unitkerja, COUNT(status_pegawai) as total');
        $this->db->from('tb_pegawai');
        $this->db->join('tb_unitkerja','tb_pegawai.id_unitkerja = tb_unitkerja.id_unitkerja');
        $this->db->group_by('tb_pegawai.id_unitkerja');
        $this->db->where('status_pegawai', 'honor');
        $this->db->where('tb_pegawai.id_unitkerja', $id);

        return $this->db->get();
    }

    public function perdaftar_o($table,$id){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('tb_unitkerja', $table.'.id_unitkerja = tb_unitkerja.id_unitkerja');
        $this->db->where($table.'.id_unitkerja', $id);
        return $this->db->get();
    }

    // ------------------------------------------------------------------------------------------------------
    public function daftar_g($id){
        $this->db->select('*');
        $this->db->from('tb_pegawai');
        $this->db->join('tb_unitkerja', 'tb_pegawai.id_unitkerja = tb_unitkerja.id_unitkerja');
        $this->db->where('tb_pegawai.nama_pegawai', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function download_detail($id){
        $this->db->select('*');
        $this->db->from('tb_pegawai');
        $this->db->join('tb_unitkerja', 'tb_pegawai.id_unitkerja = tb_unitkerja.id_unitkerja');
        $this->db->where('tb_pegawai.id_pegawai', $id);
        $query = $this->db->get();
        return $query->result();
    }

}