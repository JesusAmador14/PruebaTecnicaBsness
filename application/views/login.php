<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inicio de sesión</title>

	<!-- Estilos de bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/styles.css">
</head>

<body class="login">
	<section class="container">
		<div class="row">
			<div class="card my-0 mx-auto p-0 col-sm-12 col-md-6 col-lg-4">
				<div class="card-header text-center">
					<h4>Inicio de sesión</h4>
				</div>
				<div class="card-body p-4">
					<form>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
						</div>
						<div class="form-group">
							<label for="password">Contraseña</label>
							<input type="password" class="form-control" id="password" placeholder="Contraseña">
						</div>
						<button type="submit" class="btn btn-primary">Entrar</button>
					</form>
				</div>
			</div>
		</div>
	</section>

	<!-- Scripts de bootstrap -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
