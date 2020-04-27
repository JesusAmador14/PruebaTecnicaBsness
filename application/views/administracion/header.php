<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo isset($title) ? $title : 'Prueba Técnica'; ?></title>

	<!-- Estilos de bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/styles.css">
</head>

<body class='<?php echo isset($clase) ? $clase : ''; ?>'>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Prueba Técnica</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="<?= base_url() ?>users">Usuarios</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Bitacora</a>
				</li>
			</ul>
		</div>
	</nav>
