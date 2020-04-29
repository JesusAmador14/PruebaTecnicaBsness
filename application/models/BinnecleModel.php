<?php
class BinnecleModel extends CI_Model
{
	public function __construct()
	{
	}

	public function insertLog($datos)
	{
		$data = $this->db->insert('bitacora', $datos);
	}

	public function getLogs()
	{
		try {
			$this->db->select("nombre, apellidos, email, bitacora.fecha_alta, ip_address,
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
			`status`");
			$this->db->from('Usuarios');
			$this->db->join('Accesos', 'Usuarios.id = Accesos.id_usuario');
			$this->db->join('Bitacora', 'Usuarios.id = Bitacora.id_usuario');
			$logs = $this->db->get();
			if ($logs->result() > 0) {
				return $logs->result();
			} else {
				return false;
			}
		} catch (Exception $e) {
			echo $e;
		}
	}

	public function getLogsId($id)
	{
		try {
			$this->db->select("nombre, apellidos, email, bitacora.fecha_alta, ip_address,
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
							`status`");
			$this->db->from('Usuarios');
			$this->db->join('Accesos', ' Usuarios.id = Accesos.id_usuario');
			$this->db->join('Bitacora', ' Usuarios.id = Bitacora.id_usuario');
			$this->db->where('Usuarios.id', $id);
			$logs = $this->db->get();
			if ($logs->result() > 0) {
				return $logs->result();
			} else {
				return false;
			}
		} catch (Exception $e) {
			echo $e;
		}
	}
}
