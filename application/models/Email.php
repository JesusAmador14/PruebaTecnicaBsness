<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('email'));
	}

	public function sendMailUserRegister($email, $password)
	{
		$this->email->from('jesus.macias.amador@gmail.com', 'Jesús Macías');
		$this->email->to($email);
		$this->email->subject('Registro completado');
		$data = array(
			'email' => $email,
			'password' => $password
		);
		$mensaje = $this->load->view('emails/registro.php', $data, TRUE);
		$this->email->message($mensaje);
		if ($this->email->send()) {
			return true;
		} else {
			return false;
		}
	}


	public function sendMailRecoverPassword($email, $password)
	{
		$this->email->from('jesus.macias.amador@gmail.com', 'Jesús Macías');
		$this->email->to($email);
		$this->email->subject('Recuperando accesos');
		$data = array(
			'email' => $email,
			'password' => $password
		);
		$mensaje = $this->load->view('emails/recover_password.php', $data, TRUE);
		$this->email->message($mensaje);
		if ($this->email->send()) {
			return true;
		} else {
			return false;
		}
	}
}
