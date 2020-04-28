<section class="container pt-5">
	<div class="row">
		<div class="card p-0 col-sm-12">
			<div class="card-header">
				<h4>Lista de usuarios</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead class="thead-dark">
							<tr>
								<th scope="col">Nombre</th>
								<th scope="col">Apellidos</th>
								<th scope="col">Email</th>
								<th scope="col">Dirección</th>
								<th scope="col">Teléfono</th>
								<th scope="col">Fecha de alta</th>
								<th scope="col">Tipo de usuario</th>
								<th scope="col">Estatus</th>
								<th scope="col">Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($users as $user) { ?>
								<tr>
									<td><?php echo $user->nombre; ?></td>
									<td><?php echo $user->apellidos; ?></td>
									<td><?php echo $user->email; ?></td>
									<td><?php echo $user->direccion; ?></td>
									<td><?php echo $user->telefono; ?></td>
									<td><?php echo $user->fecha_alta; ?></td>
									<td><?php echo $user->tipo_usuario; ?></td>
									<td><?php echo $user->status; ?></td>
									<td>
										<button class="btn btn-danger">Eliminar</button>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
