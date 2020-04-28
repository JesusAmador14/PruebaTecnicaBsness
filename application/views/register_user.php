<section class="container p-5">
	<form id="formRegistro" method="POST">
		<div class="row">
			<div class="card p-0 mx-auto my-2 col-sm-12 col-md-9 col-lg-8">
				<div class="card-header text-center">
					<h4>Datos personales</h4>
				</div>
				<div class="card-body p-4">
					<div class="row">
						<div class="form-group col-sm-12 col-lg-6">
							<label for="nombre">Nombre</label>
							<input type="text" class="form-control" id="nombre" pattern="/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u" title="Ingresa solo letras" maxlength="50" minlength="3" placeholder="Nombre">
						</div>
						<div class="form-group col-sm-12 col-lg-6">
							<label for="apellidos">Apellidos</label>
							<input type="text" class="form-control" id="apellidos" pattern="/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u" title="Ingresa solo letras" maxlength="50" minlength="3" placeholder="Apellidos">
						</div>
						<div class="form-group col-sm-12 col-lg-6">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="email" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="Ingresa un formato correcto de email" maxlength="50" minlength="6" placeholder="Email">
						</div>
						<div class="form-group col-sm-12 col-lg-6">
							<label for="telefono">Teléfono</label>
							<input type="text" class="form-control" id="telefono" pattern="^(\d{10})$" title="Debes ingresar solo números" placeholder="Teléfono">
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
						<div class="form-group col-sm-12 col-lg-6">
							<label for="codigoPostal">Código Postal</label>
							<input type="text" class="form-control" id="codigoPostal" placeholder="Código Postal">
						</div>

						<div class="form-group col-sm-12 col-lg-6" id="contenedorColonia">
							<label for="colonia">Colonia</label>
							<input type="text" class="form-control" id="colonia" maxlength="50" minlength="2" placeholder="Colonia">
						</div>
						<div class="form-group col-sm-12 col-lg-6">
							<label for="municipio">Municipio/Delegación</label>
							<input type="text" class="form-control" id="municipio" pattern="/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u" title="Ingresa solo letras" maxlength="50" minlength="2" placeholder="Municipio/Delegación">
						</div>
						<div class="form-group col-sm-12 col-lg-6">
							<label for="estado">Estado</label>
							<input type="text" class="form-control" id="estado" pattern="/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u" title="Ingresa solo letras" maxlength="50" minlength="2" placeholder="Estado">
						</div>

						<div class="form-group col-sm-12 col-lg-6">
							<label for="tipoUsuario">Tipo de usuario</label>
							<select class="custom-select" id="tipoUsuario">
								<option selected>Selecciona el tipo de usuario</option>
								<option value="0">Administrador</option>
								<option value="1">Usuario</option>
							</select>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</div>
		</div>
	</form>
</section>
