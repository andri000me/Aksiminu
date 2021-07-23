<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();
		$role = $this->session->userdata('role');
		$status = $this->session->userdata('status');
		if ($role != 'administrator' && $status == 'log in') {
			$this->session->set_flashdata('error', 'Mohon maaf, hanya administrator yang dapat mengakses page tersebut.');
			redirect(base_url());
		} elseif ($status != 'log in') {
			$this->session->set_flashdata('error', 'Silahkan login terlebih dahulu.');
			redirect(base_url('login'));
		}

		$this->load->model('m_admin');
	}

	public function index()
	{
		$ref_minu = $this->m_admin->total_minu();
		$user = $this->m_admin->total_user()->row();
		// var_dump($ref_minu);die();
		$data = array(
			'title' => 'Dashboard | AKSI MINU',
			'page' => 'welcome_message',
			'total_minu' => $ref_minu,
			'total_user' => $user->total,
		);
		$this->load->view('template/admin/index', $data);
	}

	public function referensi_minu()
	{
		$ref_minu = $this->m_admin->showref_minu()->result();
		$data = array(
			'title' => 'Referensi Minu | AKSI MINU',
			'page' => 'ref_minu/index',
			'ref_minu' => $ref_minu,
		);
		$this->load->view('template/admin/index', $data);
	}

	public function proses_minu()
	{
		$config['upload_path']          = './uploads/documents';
		$config['allowed_types']        = 'pdf';
		$config['max_size'] 			= 100000;

		$this->load->library('upload', $config);

		if ( $this->upload->do_upload('dokumen') )
		{
			$data = array(
				'judul' => $this->input->post('judul'),
				'dokumen' => 'uploads/documents/'.$this->upload->data('file_name'),
				'id_user' => $this->session->userdata('id_user'),
				'date_created' => date('Y-m-d'),
				'date_updated' => date('Y-m-d'),
			);
			$this->m_admin->upload_refminu($data);
			$this->session->set_flashdata('success', 'Data berhasil di Upload');
			redirect(base_url('admin/referensi_minu'));
		}
		else
		{
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url('admin/referensi_minu'));
		}
	}

	public function update_minu()
	{
		if (!empty($_FILES['dokumen_edit']['name'])) {

			$config['upload_path']          = './uploads/documents';
			$config['allowed_types']        = 'pdf';
			$config['max_size'] 			= 100000;

			$this->load->library('upload', $config);

			if ( $this->upload->do_upload('dokumen_edit') )
			{
				$data = array(
					'judul' => $this->input->post('judul_edit'),
					'dokumen' => 'uploads/documents/'.$this->upload->data('file_name'),
					'id_user' => $this->session->userdata('id_user'),
					'date_updated' => date('Y-m-d'),
				);
				$this->m_admin->update_refminu($this->input->post('idref_edit'), $data);
				$this->session->set_flashdata('success', 'Data berhasil di Update');
				redirect(base_url('admin/referensi_minu'));
			}
			else
			{
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect(base_url('admin/referensi_minu'));
			}
		} else {
			$data = array(
				'judul' => $this->input->post('judul_edit'),
				'dokumen' => $this->input->post('dokumen_data'),
				'id_user' => $this->session->userdata('id_user'),
				'date_updated' => date('Y-m-d'),
			);
			$this->m_admin->update_refminu($this->input->post('idref_edit'), $data);
			$this->session->set_flashdata('success', 'Data berhasil di Update');
			redirect(base_url('admin/referensi_minu'));
		}
	}

	public function deleterefminu()
	{
		$id = $this->input->post('id_refminu');
		$this->m_admin->deleteref_minu($id);
		$this->session->set_flashdata('success', 'Data berhasil di hapus');
		redirect(base_url('admin/referensi_minu'));
	}

	public function user()
	{
		$user = $this->m_admin->show_user()->result();
		$data = array(
			'title' => 'Dashboard | AKSI MINU',
			'page' => 'user/index',
			'user' => $user,
		);
		$this->load->view('template/admin/index', $data);
	}
	public function proses_user()
	{
		$config['upload_path']          = './uploads/images';
		$config['allowed_types']        = 'png|jpg|jpeg|gif';
		$config['max_size'] 			= 5000;

		$this->load->library('upload', $config);

		if ( $this->upload->do_upload('photo') )
		{
			$data = array(
				'nama_lengkap' => $this->input->post('nama'),
				'kotama' => $this->input->post('kotama'),
				'satker' => $this->input->post('satker'),
				'telepon' => $this->input->post('telepon'),
				'tingkat' => $this->input->post('tingkat'),
				'photo' => '/uploads/images/'.$this->upload->data('file_name'),
				'date_created' => date('Y-m-d'),
				'date_updated' => date('Y-m-d'),
			);
			$this->m_admin->upload_profile($data);
			$this->session->set_flashdata('success', 'Data berhasil di Upload');
			redirect(base_url('admin/user'));
		}
		else
		{
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url('admin/user'));
		}
	}

	public function update_user()
	{
		$data = array(
			'password' => sha1(md5($this->input->post('password_edit'))),
			'date_updated' => date('Y-m-d'),
		);
		$this->m_admin->update_user($this->input->post('iduser_edit'), $data);
		$this->session->set_flashdata('success', 'Data berhasil di Update');
		redirect(base_url('admin/user'));
	}

	public function deleteuser()
	{
		$id = $this->input->post('id_user');
		$this->m_admin->delete_user($id);
		$this->session->set_flashdata('success', 'Data berhasil di hapus');
		redirect(base_url('admin/user'));
	}
}
