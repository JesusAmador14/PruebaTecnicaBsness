<?php
defined('BASEPATH') or exit('No direct script access allowed');
class UserModel extends CI_Model
{
	private $table = null;
	private $db = null;
	public function __construct()
	{
		$this->db = \Config\Database::connect();
		$this->table = $this->db->table('Usuarios');
	}

	public function getUsers()
	{
		$users = $this->db->select('*')->from('Usuarios');
	}
}
