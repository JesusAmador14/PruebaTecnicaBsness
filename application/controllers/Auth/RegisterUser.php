<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RegisterUser extends CI_Controller
{

	public function index()
	{
		$data['title'] = 'Registro de usuarios';
		$data['clase'] = 'registro';
		$this->load->view('administracion/header.php', $data);
		$this->load->view('register_user.php');
		$this->load->view('administracion/footer.php');
	}

	public function register()
	{
	}
}
