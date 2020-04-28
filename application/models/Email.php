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
		$mensaje = "Su contraseña es: " . $password;
		$this->email->message($mensaje);
		if ($this->email->send()) {
			echo json_encode("SE ENVIOOOO");
			return true;
		} else {
			echo json_encode("No SE ENVIOOOO");

			return false;
		}
	}
}
