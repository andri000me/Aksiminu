<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
	
	function upload_refminu($data){
		$this->db->insert('ref_minu', $data);
	}

	function showref_minu(){
		return $this->db->query("SELECT * FROM ref_minu ORDER BY id_refminu DESC");
	}

	function deleteref_minu($id){

		$this->db->where('id_refminu',$id);
		$query = $this->db->get('ref_minu');
		$row = $query->row();

		unlink("./$row->dokumen");

		$this->db->delete('ref_minu', array('id_refminu' => $id));
	}

	function update_refminu($id, $data){
		if (!empty($_FILES['dokumen_edit']['name'])) {
			
			$this->db->where('id_refminu',$id);
			$query = $this->db->get('ref_minu');
			$row = $query->row();

			unlink("./$row->dokumen");
			$this->db->where('id_refminu',$id);
			$this->db->update('ref_minu', $data);
		} else {
			$this->db->where('id_refminu',$id);
			$this->db->update('ref_minu', $data);
		}
	}

	function total_minu(){
		return $this->db->count_all('ref_minu');
	}

	function total_user(){
		return $this->db->query("SELECT COUNT(*) as total FROM user WHERE username != 'administrator'");
	}

	function show_user(){
		return $this->db->query("SELECT * FROM user JOIN profile ON user.id_profile = profile.id_profile WHERE username != 'administrator' ORDER BY id_user DESC");
	}

	function upload_profile($data){
		$this->db->trans_start();
            //INSERT TO PROFILE
		$this->db->insert('profile', $data);
            //GET ID PROFILE
		$id_profile = $this->db->insert_id();
		$result = array(
			'username' => $this->input->post('username'),
			'password' => sha1(md5($this->input->post('password'))),
			'id_profile' => $id_profile,
			'id_role' => $this->input->post('id_role'),
			'date_created' => date('Y-m-d'),
			'date_updated' => date('Y-m-d'),
		);
            //INSERT TO USER TABLE
		$this->db->insert('user', $result);
		$this->db->trans_complete();
	}

	function update_user($id, $data){
			$this->db->where('id_user',$id);
			$this->db->update('user', $data);
			$id_profile = $this->input->post('idprofile_edit');
			$daprofile = array(
				'nama_lengkap' => $this->input->post('namalengkap_edit'),
			);
			$this->db->where('id_profile',$id_profile);
			$this->db->update('profile', $daprofile);
	}

	function delete_user($id){

		$this->db->where('id_user',$id);
		$this->db->join('profile', 'profile.id_profile = user.id_profile');
		$query = $this->db->get('user');
		$row = $query->row();

		unlink("./$row->photo");

		$this->db->delete('user', array('id_user' => $id));
		$this->db->delete('profile', array('id_profile' => $row->id_profile));
	}

}
