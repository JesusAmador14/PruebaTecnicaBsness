<?php

function getRegisterRules()
{
	return array(
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|trim|max_length[50]|valid_email',
			'errors' => array(
				'required' => 'Campo requerido.',
				'max_length' => 'El campo no debe tener más de 50 caracteres.',
				'valid_mail' => 'Escriba una dirección email valida.'
			),
		),
		array(
			'field' => 'nombre',
			'label' => 'Nombre',
			'rules' => 'required|trim|max_length[50]',
			'errors' => array(
				'required' => 'Campo requerido.',
				'max_length' => 'El campo no debe tener más de 50 caracteres.',
			),
		),
		array(
			'field' => 'apellidos',
			'label' => 'Apellidos',
			'rules' => 'required|trim|max_length[50]',
			'errors' => array(
				'required' => 'Campo requerido.',
				'max_length' => 'El campo no debe tener más de 50 caracteres.'
			),
		),
		array(
			'field' => 'telefono',
			'label' => 'Teléfono',
			'rules' => 'required|trim|max_length[10]',
			'errors' => array(
				'required' => 'Campo requerido.',
				'max_length' => 'El campo no debe tener más de 10 caracteres.',
			),
		),
		array(
			'field' => 'codigoPostal',
			'label' => 'Código Postal',
			'rules' => 'required|trim|max_length[5]',
			'errors' => array(
				'required' => 'Campo requerido.',
				'max_length' => 'El campo no debe tener más de 5 caracteres.',
			),
		),
		array(
			'field' => 'estado',
			'label' => 'Estado',
			'rules' => 'required|trim|max_length[50]',
			'errors' => array(
				'required' => 'Campo requerido.',
				'max_length' => 'El campo no debe tener más de 50 caracteres.'
			),
		),
		array(
			'field' => 'municipio',
			'label' => 'Municipio',
			'rules' => 'required|trim|max_length[50]',
			'errors' => array(
				'required' => 'Campo requerido.',
				'max_length' => 'El campo no debe tener más de 50 caracteres.'
			),
		),
	);
}
