<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper('login_rules');
		$this->load->helper('get_ip');
		$this->load->model('AuthModel');
		$this->load->model('BinnecleModel');
	}

	public function index()
	{
		$data['title'] = 'Inicio de sesión';
		$this->load->view('login', $data);
	}

	public function validate()
	{
		$this->form_validation->set_error_delimiters('', '');
		$rules = getLoginRules();
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == false) {
			$errors = array(
				'email' => form_error('email'),
				'password' => form_error('password')
			);
			echo json_encode($errors);
			set_status_header(400);
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$this->loginUser($email, $password);
		}
	}

	public function loginUser($email, $password)
	{
		$password = md5($password);
		if (!$res = $this->AuthModel->login($email, $password)) {
			$response = array('mensaje' => 'Verifique sus credenciales');
			echo json_encode($response);
			set_status_header(401);
			exit;
		}
		$this->AuthModel->createSession($res);
		$this->insertLog($res->id_usuario);
		$response = array('url' => 'users');
		echo json_encode($response);
		set_status_header(200);
	}

	public function insertLog($id)
	{
		$datos = array(
			'id_usuario' => $id,
			'ip_address' => getIP()
		);
		$this->BinnecleModel->insertLog($datos);
	}

	public function logOut()
	{
		$this->AuthModel->logOut();
	}
}
