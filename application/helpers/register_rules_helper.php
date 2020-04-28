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
			'rules' => 'required|trim|max_length[50]|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]',
			'errors' => array(
				'required' => 'Campo requerido.',
				'max_length' => 'El campo no debe tener más de 50 caracteres.',
				'rgex_match' => 'Escriba solo letras.'
			),
		),

		array(
			'field' => 'apellidos',
			'label' => 'Apellidos',
			'rules' => 'required|trim|max_length[50]|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]',
			'errors' => array(
				'required' => 'Campo requerido.',
				'max_length' => 'El campo no debe tener más de 50 caracteres.',
				'rgex_match' => 'Escriba solo letras.'
			),
		),
	);
}
