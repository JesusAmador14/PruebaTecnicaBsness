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

	public function createUser($user, $userAccesos)
	{
		try {
			$this->db->trans_begin();
			$this->db->insert('usuarios', $user);
			$userAccesos['id_usuario'] = $this->db->insert_id();
			$this->db->insert('accesos', $userAccesos);
			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				return false;
			} else {
				$this->db->trans_commit();
				return true;
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}

	public function getUsersEmails()
	{
		try {
			$users = $this->db->query("SELECT id_usuario, email FROM Accesos");
			if ($users->result() > 0) {
				return $users->result();
			} else {
				return false;
			}
		} catch (Exception $e) {
			echo $e;
		}
	}

	public function getUserId($id)
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
										FROM Usuarios INNER JOIN Accesos ON Usuarios.id = Accesos.id_usuario
										WHERE Usuarios.id = " . $id . "");
			if ($users->result() > 0) {
				$user = $users->result();
				return $user[0];
			} else {
				return false;
			}
		} catch (Exception $e) {
			echo $e;
		}
	}
}
