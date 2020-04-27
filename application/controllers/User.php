<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
	}

	public function index()
	{
		$data['title'] = 'Lista de usuarios';
		$data['clase'] = 'registro';
		$users['users'] = $this->getUsers();
		$this->load->view('administracion/header.php', $data);
		$this->load->view('users_list.php', $users);
		$this->load->view('administracion/footer.php');
	}

	public function getUsers()
	{
		return $this->UserModel->getUsers();
	}
}
