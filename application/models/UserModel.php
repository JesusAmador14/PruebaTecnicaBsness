<?php
defined('BASEPATH') or exit('No direct script access allowed');
class UserModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getUsers()
	{
		try {
			$users = $this->db->query("SELECT nombre, apellidos, email, direccion, telefono, Usuarios.fecha_alta, 
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
										FROM Usuarios INNER JOIN Accesos ON Usuarios.id = Accesos.id_usuario");
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
