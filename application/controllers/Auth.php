<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
		$this->load->model('m_auth');
	}

	public function index()
	{
		$data = array(
			'title' => 'Login | AKSIMINU', 
		);
		$this->load->view('auth/login', $data);
	}

	public function proses_login()
	{
		$username = $this->input->post('username');
		$password = sha1(md5($this->input->post('password')));
		$datasess = $this->m_auth->cekLogin($username, $password)->num_rows();
		$datauser = $this->m_auth->dataUser($username, $password)->row();
		if ($datasess > 0 && $datauser->role == 'administrator') {
			$datasession = array(
				'id_user' => $datauser->id_user,
				'username' => $datauser->username,
				'role' => $datauser->role,
				'status' => 'log in',
			);
			$this->session->set_userdata($datasession);
			redirect(base_url('admin'));
		} elseif ($datasess > 0 && $datauser->role == 'user') {
			$datasession = array(
				'id_user' => $datauser->id_user,
				'username' => $datauser->username,
				'role' => $datauser->role,
				'status' => 'log in',
			);
			$this->session->set_userdata($datasession);
			redirect(base_url());
		} else {
			$this->session->set_flashdata('error', 'Username atau Password Salah');
			redirect(base_url('login'));
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
