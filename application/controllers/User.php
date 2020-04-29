<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
			$data['title'] = 'Lista de usuarios';
			$data['clase'] = 'registro';
			$data['email'] = $this->session->userdata('email');
			$data['tipo_usuario'] = $this->session->userdata('tipo_usuario');
			$data['users'] = $this->getUsers();
			$this->load->view('administracion/header.php', $data);
			$this->load->view('users_list.php');
			$this->load->view('administracion/footer.php');
		} else {
			redirect('login');
		}
	}

	public function getUsers()
	{
		return $this->UserModel->getUsers();
	}
}
