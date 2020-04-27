<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{
		$data['title'] = 'Inicio de sesión';
		$this->load->view('login', $data);
	}

	public function loginUser()
	{
	}
}
