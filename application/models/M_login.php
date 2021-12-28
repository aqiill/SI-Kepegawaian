<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model {

    public function login($username,$password){
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_pegawai', 'tb_user.nama_user = tb_pegawai.id_pegawai');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get();
    }

}