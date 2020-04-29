<?php

class Profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
	}

	public function index()
	{
		$data['title'] = 'Perfil';
		$data['clase'] = 'registro';
		$data['email'] = $this->session->userdata('email');
		$data['tipo_usuario'] = $this->session->userdata('tipo_usuario');
		$data['id_usuario'] = $this->session->userdata('id_usuario');
		$data['user'] = $this->UserModel->getUserId($data['id_usuario']);
		$this->load->view('administracion/header.php', $data);
		$this->load->view('profile.php');
		$this->load->view('administracion/footer.php');
	}
}
