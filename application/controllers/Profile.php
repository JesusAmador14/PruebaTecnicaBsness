<?php

class Profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->model('AuthModel');
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

	public function recoverPassword()
	{
		if ($this->AuthModel->idLogged()) {
			$email = $this->session->userdata('email');
			$id_usuario = $this->session->userdata('id_usuario');
			$password = random_string('alnum', 8);
			$this->changePassword($id_usuario, $password, $email);
		} else {
			redirect('login');
		}
	}

	public function changePassword($id_usuario, $password, $email)
	{
		$password = md5($password);
		if ($this->UserModel->recoverPassword($id_usuario, $password)) {
			$this->sendMailRecoverPassword($email);
		} else {
		}
	}

	public function sendMailRecoverPassword($email)
	{
		return $this->Email->sendMailRecoverPassword($email);
	}
}
