<?php
defined('BASEPATH') or exit('No direct script access allowed');
class UserModel extends CI_Model
{
	private $tabla = 'usuarios';
	// private $db = null;
	public function __construct()
	{
		parent::__construct();
		// $this->load->database();
		// $this->tabla = $this->db->table('Usuarios');
	}

	public function getUsers()
	{
		try {
			$users = $this->db->query("SELECT nombre, apellidos, email, direccion, telefono, fecha_alta, 
										CASE 
											When tipo_usuario = 0 THEN 'Administrador'
											When tipo_usuario = 1 THEN 'Usuario'
										END 
										AS
										tipo_usuario,
										CASE 
											When `status` = 0 THEN 'Inactivo'
											When `status` = 1 THEN 'Activo'
										END 
										AS
										`status`
										FROM Usuarios");
			if ($users->result() > 0) {
				return $users->result();
			} else {
				return false;
			}
		} catch (Exception $e) {
			echo $e;
		}
	}
}
