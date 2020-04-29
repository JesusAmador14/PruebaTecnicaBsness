<section class="container p-5">
	<form id="formRegister" method="POST">
		<div class="row">
			<div class="card p-0 mx-auto my-2 col-sm-12 col-md-9 col-lg-8">
				<div class="card-header text-center">
					<h4>Datos personales</h4>
				</div>
				<div class="card-body p-4">
					<div class="row">
						<div class="form-group col-sm-12 col-lg-6" id="contenedorNombre">
							<label for="nombre">Nombre</label>
							<input type="text" class="form-control" name="nombre" id="nombre" pattern="^[a-zA-Z_áéíóúñ\s]*$" title="Ingresa solo letras" maxlength="50" minlength="3" placeholder="Nombre" required>
							<div class="invalid-feedback"></div>
						</div>
						<div class="form-group col-sm-12 col-lg-6" id="contenedorApellidos">
							<label for="apellidos">Apellidos</label>
							<input type="text" class="form-control" name="apellidos" id="apellidos" pattern="^[a-zA-Z_áéíóúñ\s]*$" title="Ingresa solo letras" maxlength="50" minlength="3" placeholder="Apellidos" required>
							<div class="invalid-feedback"></div>
						</div>
						<div class="form-group col-sm-12 col-lg-6" id="contenedorEmail">
							<label for="email">Email</label>
							<input type="email" class="form-control" name="email" id="email" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="Ingresa un formato correcto de email" maxlength="50" minlength="6" placeholder="Email" required>
							<div class="invalid-feedback"></div>
						</div>
						<div class="form-group col-sm-12 col-lg-6" id="contenedorTelefono">
							<label for="telefono">Teléfono</label>
							<input type="tel" class="form-control" name="telefono" id="telefono" pattern="^(\d{10})$" title="Debes ingresar solo números y minímo 10 digitos" placeholder="Teléfono" required>
							<div class="invalid-feedback"></div>
						</div>
					</div>
				</div>
			</div>

			<div class="card mx-auto my-2 p-0 col-sm-12 col-md-9 col-lg-8">
				<div class="card-header text-center">
					<h4>Dirección y tipo de usuario</h4>
				</div>
				<div class="card-body p-4">
					<div class="row">
						<div class="form-group col-sm-12 col-lg-6" id="contenedorCodigoPostal">
							<label for="codigoPostal">Código Postal</label>
							<input type="text" class="form-control" name="codigoPostal" id="codigoPostal" placeholder="Código Postal" required>
							<div class="invalid-feedback"></div>
						</div>
						<div class="form-group col-sm-12 col-lg-6" id="contenedorColonia">
							<label for="colonia">Colonia</label>
							<input type="text" class="form-control" name="colonia" id="colonia" maxlength="50" minlength="2" placeholder="Colonia" required>
							<div class="invalid-feedback"></div>
						</div>
						<div class="form-group col-sm-12 col-lg-6" id="contenedorMunicipio">
							<label for="municipio">Municipio/Delegación</label>
							<input type="text" class="form-control" name="municipio" id="municipio" pattern="^[a-zA-Z_áéíóúñ\s]*$" title="Ingresa solo letras" maxlength="50" minlength="2" placeholder="Municipio/Delegación" required>
							<div class="invalid-feedback"></div>
						</div>
						<div class="form-group col-sm-12 col-lg-6" id="contenedorEstado">
							<label for="estado">Estado</label>
							<input type="text" class="form-control" name="estado" id="estado" pattern="^[a-zA-Z_áéíóúñ\s]*$" title="Ingresa solo letras" maxlength="50" minlength="2" placeholder="Estado" required>
							<div class="invalid-feedback"></div>
						</div>

						<div class="form-group col-sm-12 col-lg-6">
							<label for="tipoUsuario">Tipo de usuario</label>
							<select class="custom-select" name="tipoUsuario" id="tipoUsuario" required>
								<option selected>Selecciona el tipo de usuario</option>
								<option value="0">Administrador</option>
								<option value="1">Usuario</option>
							</select>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
				<div id="alertError" class="alert alert-danger alert-dismissible fade mt-2" role="alert">

				</div>
			</div>
		</div>
	</form>
</section>
