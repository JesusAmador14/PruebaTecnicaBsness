<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RegisterUser extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->model('AuthModel');
	}

	public function index()
	{
		if ($this->AuthModel->isLoggedAdministrator()) {
			$data['title'] = 'Registro de usuarios';
			$data['clase'] = 'registro';
			$data['email'] = $this->session->userdata('email');
			$this->load->view('administracion/header.php', $data);
			$this->load->view('register_user.php');
			$this->load->view('administracion/footer.php');
		} else {
			redirect('login');
		}
	}

	public function register()
	{
	}
}
