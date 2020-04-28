<?php

function getLoginRules()
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
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|trim|min_length[8]|max_length[32]',
			'errors' => array(
				'required' => 'Campo requerido.',
				'min_length' => 'El campo debe tener al menos 8 carecteres.',
				'max_length' => 'El campo no debe tener más de 32 caracteres.'
			),
		),
	);
}
