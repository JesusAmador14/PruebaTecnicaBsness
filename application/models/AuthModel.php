<?php
class AuthModel extends CI_Model
{
	public function __construct()
	{
	}
	public function login($email, $password)
	{
		try {
			$data = $this->db->get_where('Usuarios', array('email' => $email, 'password' => $password));
			return $data;
		} catch (Exception $e) {
			echo $e;
		}
	}
}
