<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RegisterUser extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->model('AuthModel');
		$this->load->helper('register_rules');
		$this->load->helper('string');
		$this->load->library(array('form_validation'));
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

	public function store()
	{
		$this->form_validation->set_error_delimiters('', '');
		$rules = getRegisterRules();
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == false) {
			$errors = array(
				'email' => form_error('email'),
				'nombre' => form_error('nombre'),
				'apellidos' => form_error('apellidos'),
				'telefono' => form_error('telefono'),
				'codigoPostal' => form_error('codigoPostal'),
				'municipio' => form_error('municipio'),
				'estado' => form_error('estado'),
			);
			echo json_encode($errors);
			set_status_header(400);
		} else {
			$email = $this->input->post('email');
			$nombre = $this->input->post('nombre');
			$apellidos = $this->input->post('apellidos');
			$telefono = $this->input->post('telefono');
			$codigoPostal = $this->input->post('codigoPostal');
			$colonia = $this->input->post('colonia');
			$municipio = $this->input->post('municipio');
			$estado = $this->input->post('estado');
			$tipoUsuario = $this->input->post('tipoUsuario');
			$password = random_string('alnum', 8);
			$direccion = $this->generateDirection($codigoPostal, $colonia, $municipio, $estado);
			$user = $this->getArrayUser($nombre, $apellidos, $telefono, $direccion);
			$userAccesos = $this->getArrayUserAccesos($email, $password, $tipoUsuario);

			if (!$this->UserModel->createUser($user, $userAccesos)) {
				$response = array('mensaje' => 'Verifique sus credenciales');
				echo json_encode($response);
				set_status_header(401);
				exit;
			}

			$this->sendMailUser($email, $password);
		}
	}

	public function generateDirection($codigoPostal, $colonia, $municipio, $estado)
	{
		$direccion = 'Colonia' . $colonia . ', ' . $municipio . ', ' . $estado . '. CP. ' . $codigoPostal;
		return $direccion;
	}

	public function sendMailUser($email, $password)
	{
		$this->load->model('Email');
		$this->Email->sendMailUserRegister($email, $password);
	}

	public function getArrayUser($nombre, $apellidos, $telefono, $direccion)
	{
		return array(
			'nombre' => $nombre,
			'apellidos' => $apellidos,
			'telefono' => $telefono,
			'direccion' => $direccion
		);
	}

	public function getArrayUserAccesos($email, $password, $tipoUsuario)
	{
		return array(
			'email' => $email,
			'password' => md5($password),
			'tipo_usuario' => $tipoUsuario,
			'status' => '1'
		);
	}
}
