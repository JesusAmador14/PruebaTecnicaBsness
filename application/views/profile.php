<section class="container p-5">
	<div class="row">
		<article class="card p-0 col-sm-12 col-md-6">
			<div class="card-header">
				Datos personales
			</div>
			<div class="card-body">
				<div class="form-group" id="contenedorNombre">
					<label for="nombre">Nombre</label>
					<input type="text" class="form-control" name="nombre" id="nombre" value="<?= $user->nombre ?>" disabled placeholder="Nombre" required>
					<div class="invalid-feedback"></div>
				</div>
				<div class="form-group" id="contenedorApellidos">
					<label for="apellidos">Apellidos</label>
					<input type="text" class="form-control" name="apellidos" id="apellidos" value="<?= $user->apellidos ?>" disabled placeholder="Apellidos" required>
					<div class="invalid-feedback"></div>
				</div>
				<div class="form-group" id="contenedorEmail">
					<label for="email">Email</label>
					<input type="text" class="form-control" name="email" id="email" value="<?= $user->email ?>" disabled placeholder="Email" required>
					<div class="invalid-feedback"></div>
				</div>
				<div class="form-group" id="contenedorTelefono">
					<label for="telefono">Teléfono</label>
					<input type="text" class="form-control" name="telefono" id="telefono" value="<?= $user->telefono ?>" disabled placeholder="Teléfono" required>
					<div class="invalid-feedback"></div>
				</div>
			</div>
		</article>

		<article class="card p-0 col-sm-12 col-md-6">
			<div class="card-header">
				Datos extras
			</div>
			<div class="card-body">
				<div class="form-group" id="contenedorEstado">
					<label for="estado">Direccion</label>
					<input type="text" class="form-control" name="estado" id="estado" value="<?= $user->direccion ?>" disabled placeholder="Estado" required>
					<div class="invalid-feedback"></div>
				</div>

				<div class="form-group">
					<label for="tipoUsuario">Tipo de usuario</label>
					<input type="text" class="form-control" name="estado" id="estado" value="<?= $user->tipo_usuario ?>" disabled placeholder="Tipo usuario" required>
				</div>
			</div>
		</article>
	</div>
</section>
