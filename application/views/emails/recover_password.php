<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
	<title>Document</title>
	<style>
		body {
			background-color: #F5F5F5 !important;
			margin: 2.5rem;
		}

		.contenedor {
			margin: auto;
			font-family: 'Lato', Tahoma, Verdana, Segoe, sans-serif;
			margin-top: 2rem;
			background-color: #FFF;
			border-radius: 3px;
			box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
			width: 90%;
			margin-bottom: 2rem;
		}

		.barra_principal {
			padding: 1rem 2.5rem;
		}

		.info_principal {
			padding: 3rem;
			background-color: #000;
			text-align: left;
			font-size: 12px;
			color: #FFF;
			line-height: 14px;
			display: flex;
			justify-content: center;
			align-content: center;
			align-items: center;
		}

		.info_principal h3 {
			font-weight: 800;
			color: #FFF !important;
			font-family: 'Lato', Tahoma, Verdana, Segoe, sans-serif;
		}

		.centrar {
			display: flex;
			justify-content: center;
			align-items: center;
			width: 100%;
		}

		.centrar_vertical {
			display: flex;
			align-items: center;
			height: 100%;
		}

		.centrar_horizontal {
			display: flex;
			justify-content: center;
			width: 100%;
		}

		.colum {
			display: flex;
			flex-direction: column;
		}

		.row {
			display: flex;
			flex-direction: row;
		}

		.esquinas {
			justify-content: space-between;
			width: 100%;
		}

		.detail_all {
			padding: 1rem 2.5rem;
		}

		.detail_all h3 {
			font-size: 1.5rem;
			font-weight: 800;
			color: #000;
			margin: 0;
		}

		.detail_all h4 {
			font-size: 1.2rem;
			font-weight: 800;
			color: #000;
		}

		.espacio_1r {
			padding-left: .5rem;
			padding-right: .5rem;
		}

		.espacio_2r {
			padding-left: 1rem;
			padding-right: 1rem;
		}



		.mayuscula {
			/* text-transform: uppercase; */
			font-weight: 800 !important;
			color: rgb(33, 144, 227) !important;
		}

		.p-1 {
			padding: 1rem;
		}

		.text-center {
			text-align: center;
		}

		.ver {
			margin-top: 1rem;
			padding: .8rem 1.5rem;
			color: #FFF;
			text-decoration: none;
			border-radius: 5px;
			background-color: #000;
			transition: all .3s ease;
			border: 2px solid #000;
		}

		.ver:hover {
			background-color: #fff;
			color: #000;
			border: 2px solid #000;
		}
	</style>
</head>

<body>
	<div class="contenedor">
		<div class="info_principal">
			<h3 id="info_principal_text" style=" font-size: 38px">
				Recuperando accesos
			</h3>
		</div>

		<div class="detail_info">
			<br>
			<div class="subtitulo centrar">
				<p style="font-size: 20px;"><span>Tus datos de accesos son:</span></p>
			</div>

			<div class="detail_all">
				<div class="detail_subtitulo colum centrar_vertical centrar_horizontal">
					<div class="info_important row">
						<h4>Correo: &nbsp;&nbsp;</h4>
						<h4 class="mayuscula"><span id='correo'><?php echo $email; ?></span></h3>
					</div>
					<br>
					<div class="row">
						<h4>Contraseña: &nbsp;&nbsp;</h4>
						<h4 class='mayuscula'><span id='password'><?php echo $password; ?></span></h4>
					</div>
					<br>
					<div class=" row ">
						<a class="ver" target="_blank" href="http://localhost/PruebaTecnicaBsness">Acceder</a>
					</div>
					<br>
					<br>

				</div>
			</div>
		</div>
	</div>
</body>

</html>
