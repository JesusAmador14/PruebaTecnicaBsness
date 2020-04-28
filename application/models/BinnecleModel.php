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
}
