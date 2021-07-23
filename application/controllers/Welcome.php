<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$status = $this->session->userdata('status');
		if ($status != 'log in') {
			$this->session->set_flashdata('error', 'Silahkan login terlebih dahulu.');
			redirect(base_url('login'));
		}

		$this->load->model('m_admin');
	}

	public function index()
	{
		$data = array(
			'page' => 'index_welcome',
			'title' => 'Beranda | AKSI MINU',
		);
		$this->load->view('template/user/body', $data);
	}

	public function referensiminu()
	{
		$ref_minu = $this->m_admin->showref_minu()->result();
		$data = array(
			'page' => 'ref_minu/index_user',
			'title' => 'Beranda | AKSI MINU',
			'ref_minu' => $ref_minu,
		);
		$this->load->view('template/user/body', $data);
	}
}
