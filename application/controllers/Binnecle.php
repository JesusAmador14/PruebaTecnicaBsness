<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Binnecle extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('BinnecleModel');
		$this->load->model('AuthModel');
	}

	public function index()
	{

		if ($this->AuthModel->isLoggedAdministrator() || $this->AuthModel->isLoggedUser()) {

			switch ($this->session->userdata('tipo_usuario')) {
				case 0:
					$this->loadViewAdministrator();
					break;
				case 1:
					$this->loadViewUser();
					break;
				default:
					redirect(base_url() + 'login');
					break;
			}
		} else {
			redirect(base_url() + 'login');
		}
	}

	public function loadViewAdministrator()
	{
		$data['title'] = 'Bitacora';
		$data['clase'] = 'registro';
		$data['email'] = $this->session->userdata('email');
		$data['logs'] = $this->getLogs();
		$data['tipo_usuario'] = $this->session->userdata('tipo_usuario');
		$this->load->view('administracion/header.php', $data);
		$this->load->view('binnecle_list.php');
		$this->load->view('administracion/footer.php');
	}

	public function loadViewUser()
	{
		$data['title'] = 'Bitacora';
		$data['clase'] = 'registro';
		$data['email'] = $this->session->userdata('email');
		$id = $this->session->userdata('id_usuario');
		$data['tipo_usuario'] = $this->session->userdata('tipo_usuario');
		$data['logs'] = $this->getLogsId($id);
		$this->load->view('administracion/header.php', $data);
		$this->load->view('binnecle_list.php');
		$this->load->view('administracion/footer.php');
	}

	public function getLogs()
	{
		return $this->BinnecleModel->getLogs();
	}

	public function getLogsId($id)
	{
		return $this->BinnecleModel->getLogsId($id);
	}
}
