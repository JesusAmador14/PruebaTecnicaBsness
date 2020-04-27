<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RegisterUser extends CI_Controller
{

	public function index()
	{
		$this->load->view('register_user.php');
	}

	public function register()
	{
	}
}
