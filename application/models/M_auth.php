<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {
	
	function cekLogin($username, $password){
		return $this->db->query("SELECT * FROM user WHERE username = '$username' AND password = '$password'");
	}

	function dataUser($username, $password){
		return $this->db->query("SELECT * FROM user JOIN profile ON user.id_profile = profile.id_profile JOIN role ON user.id_role = role.id_role WHERE username = '$username' AND password = '$password'");
	}

}
