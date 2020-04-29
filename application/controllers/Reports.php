<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Reports extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel');
	}

	public function generateReportUsersData()
	{
		$this->load->model('UserModel');
		#Información que se guardara en el reporte
		$datos = $this->UserModel->getUsers();
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setTitle('Reporte de usuarios');
		// Centramos los titulos
		$sheet->getStyle('A1:H1')->getAlignment()->setHorizontal('center');
		// Alineamos el texto a la derecha
		$sheet->getStyle('A2:H1000')->getAlignment()->setHorizontal('right');
		// Generamos los filtro
		$sheet->setAutoFilter('A1:K1000');
		// Estilos de la cabecera
		$styleArray = [
			'font' => [
				'bold' => true,
				'color' => array('rgb' => 'FFFFFF'),
			],
			'fill' => [
				'fillType' => 'solid',
				'startColor' => [
					'argb' => '000000',
				],
			],
		];
		// le agregamos que se auto redimencione desde el rango A hasta K
		foreach (range('A', 'H') as $columnID) {
			$sheet->getColumnDimension($columnID)->setAutoSize(true);
		}
		// le agregamos los estilos que creamos en el arreglo
		$sheet->getStyle('A1:H1')->applyFromArray($styleArray);
		# Escribir encabezado de las compras
		$encabezado = ["Nombre", "Apellidos", "Email", "Dirección", "Teléfono", "Fecha de Alta", "Tipo de usuario",  "Status"];
		# El último argumento es por defecto es A1 pero lo pongo para que se explique mejor
		$sheet->fromArray($encabezado, null, 'A1');
		// creamos un contador que empience en dos para indicar que estemos en la fila 2 
		$numeroDeFila = 2;
		// mandamos a llamr la intancia que obtine todos los datos
		foreach ($datos as $user) {
			// vamos agregando los datos a las filas correspondientes
			$sheet->setCellValueByColumnAndRow(1, $numeroDeFila, $user->nombre);
			$sheet->setCellValueByColumnAndRow(2, $numeroDeFila, $user->apellidos);
			$sheet->setCellValueByColumnAndRow(3, $numeroDeFila, $user->email);
			$sheet->setCellValueByColumnAndRow(4, $numeroDeFila, $user->direccion);
			$sheet->setCellValueByColumnAndRow(5, $numeroDeFila, $user->telefono);
			$sheet->setCellValueByColumnAndRow(6, $numeroDeFila, $user->fecha_alta);
			$sheet->setCellValueByColumnAndRow(7, $numeroDeFila, $user->tipo_usuario);
			$sheet->setCellValueByColumnAndRow(8, $numeroDeFila, $user->status);
			$numeroDeFila++;
		}
		$writer = new Xlsx($spreadsheet);
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="reporte_de_usuarios.xlsx"');
		header('Cache-Control: max-age=0');
		$writer->save('php://output');
	}

	public function validateReportBinnecleGeneral()
	{
		if ($this->AuthModel->isLoggedAdministrator()) {
			$this->load->model('BinnecleModel');
			$datos = $this->BinnecleModel->getLogs();
			$this->generateReportBinnecle($datos, 'Reporte Bitácora General');
		} else if ($this->AuthModel->isLoggedUser()) {
			$this->load->model('BinnecleModel');
			$id = $this->uri->segment(2);
			// var_dump($id);
			$datos = $this->BinnecleModel->getLogsId($id);
			// var_dump($datos);
			$this->generateReportBinnecle($datos, 'Reporte Bitácora General');
		} else {
			redirect(base_url() + 'login');
		}
	}

	// Obtiene los parametros para el reporte por fechas
	public function validateReportBinnecleFilter()
	{
		if ($this->AuthModel->isLoggedAdministrator() || $this->AuthModel->isLoggedUser()) {
			$id_usuario = $this->input->post('idUsuario') ?: false;
			$fechaInicio = $this->input->post('fechaInicio');
			$fechaFinal = $this->input->post('fechaFinal');
			$this->validateDataReportBinnecle($id_usuario, $fechaInicio, $fechaFinal);
		} else {
			redirect(base_url() + 'login');
		}
	}

	// Identifica si el reporte se hará para un solo usuario o solo con rango de fechas
	public function validateDataReportBinnecle($id_usuario, $fechaInicio, $fechaFinal)
	{
		$this->load->model('BinnecleModel');
		if ($id_usuario != 0) {
			$datos = $this->BinnecleModel->getLogsByIdAndDate($id_usuario, $fechaInicio, $fechaFinal);
		} else {
			$datos = $this->BinnecleModel->getLogsByDate($fechaInicio, $fechaFinal);
		}
		$this->generateReportBinnecle($datos, 'Reporte Bitácora General');
	}

	// Se encarga de generar el archivo excel para cada reporte la bitacora
	public function generateReportBinnecle($datos, $title)
	{
		#Información que se guardara en el reporte
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setTitle($title);
		// Centramos los titulos
		$sheet->getStyle('A1:G1')->getAlignment()->setHorizontal('center');
		// Alineamos el texto a la derecha
		$sheet->getStyle('A2:G1000')->getAlignment()->setHorizontal('right');
		// Generamos los filtro
		$sheet->setAutoFilter('A1:F1000');
		// Estilos de la cabecera
		$styleArray = [
			'font' => [
				'bold' => true,
				'color' => array('rgb' => 'FFFFFF'),
			],
			'fill' => [
				'fillType' => 'solid',
				'startColor' => [
					'argb' => '000000',
				],
			],
		];
		// le agregamos que se auto redimencione desde el rango A hasta F
		foreach (range('A', 'G') as $columnID) {
			$sheet->getColumnDimension($columnID)->setAutoSize(true);
		}
		// le agregamos los estilos que creamos en el arreglo
		$sheet->getStyle('A1:G1')->applyFromArray($styleArray);
		# Escribir encabezado de las compras
		$encabezado = ["Nombre", "Apellidos", "Email", "Fecha de Ingreso", "Dirección IP", "Tipo de usuario",  "Status"];
		# El último argumento es por defecto es A1 pero lo pongo para que se explique mejor
		$sheet->fromArray($encabezado, null, 'A1');
		// creamos un contador que empience en dos para indicar que estemos en la fila 2 
		$numeroDeFila = 2;
		// mandamos a llamr la intancia que obtine todos los datos
		foreach ($datos as $user) {
			// vamos agregando los datos a las filas correspondientes
			$sheet->setCellValueByColumnAndRow(1, $numeroDeFila, $user->nombre);
			$sheet->setCellValueByColumnAndRow(2, $numeroDeFila, $user->apellidos);
			$sheet->setCellValueByColumnAndRow(3, $numeroDeFila, $user->email);
			$sheet->setCellValueByColumnAndRow(4, $numeroDeFila, $user->fecha_alta);
			$sheet->setCellValueByColumnAndRow(5, $numeroDeFila, $user->ip_address);
			$sheet->setCellValueByColumnAndRow(6, $numeroDeFila, $user->tipo_usuario);
			$sheet->setCellValueByColumnAndRow(7, $numeroDeFila, $user->status);
			$numeroDeFila++;
		}
		$writer = new Xlsx($spreadsheet);
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="reporte_de_bitacora.xlsx"');
		header('Cache-Control: max-age=0');
		$writer->save('php://output');
	}
}
