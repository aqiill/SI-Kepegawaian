<?php

if($this->session->userdata('level')=="" || $this->session->userdata('username')=="" || $this->session->userdata('id_user')==""){
	redirect(base_url('login'));
}

function encrypt($id)
{
    $kali   = (($id*8*42/2)/2);
    $encode = base64_encode($kali);
    return $encode;
}

require_once('head.php');
require_once('header.php');
// require_once('sidebar.php');
require_once('content.php');
require_once('footer.php');
?>