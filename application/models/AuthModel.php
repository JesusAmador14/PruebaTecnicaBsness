<?php
class AuthModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	public function login($email, $password)
	{
		try {
			$data = $this->db->get_where('Accesos', array('email' => $email, 'password' => $password));
			if (!$data->result()) {
				return false;
			}
			return $data->row();
		} catch (Exception $e) {
			echo $e;
		}
	}

	public function createSession($user)
	{
		$data = array(
			'email' => $user->email,
			'tipo_usuario' => $user->tipo_usuario,
			'id_usuario' => $user->id_usuario,
			'is_logged' => TRUE
		);
		$this->session->set_userdata($data);
	}

	public function logOut()
	{
		$data = array(
			'email',
			'tipo_usuario',
			'is_logged'
		);
		$this->session->unset_userdata($data);
		$this->session->sess_destroy();
		redirect(base_url() + 'login');
	}

	public function isLoggedAdministrator()
	{
		if ($this->session->userdata('is_logged') && $this->session->userdata('tipo_usuario') == 0) {
			return true;
		}
		return false;
	}

	public function isLoggedUser()
	{
		if ($this->session->userdata('is_logged') && $this->session->userdata('tipo_usuario') == 1) {
			return true;
		}
		return false;
	}
}
