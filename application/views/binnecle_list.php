<section class="container pt-5">
	<div class="row">
		<div class="card p-0 col-sm-12">
			<div class="card-header d-flex justify-content-between">
				<h4>Logs
				</h4>
				<div class="reportes d-flex">
					<button class="btn btn-outline-dark mr-2" data-toggle="modal" data-target="#filtrosReporte">
						Reporte con filtros
					</button>
					<?php if ($tipo_usuario == 0) { ?>
						<a href="<?= base_url() ?>validateReportBinnecleGeneral" class="btn btn-outline-success">
							Reporte general <i class="fa fa-file-excel-o fa-lg"></i>
						</a>
					<?php } else { ?>
						<a href="<?= base_url() ?>validateReportBinnecleGeneral/<?= $id_usuario ?>" class="btn btn-outline-success">
							Reporte general <i class="fa fa-file-excel-o fa-lg"></i>
						</a>
					<?php } ?>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead class="thead-dark">
							<tr>
								<th scope="col">Nombre</th>
								<th scope="col">Apellidos</th>
								<th scope="col">Email</th>
								<th scope="col">Dirección ip</th>
								<th scope="col">Fecha de ingreso</th>
								<th scope="col">Tipo de usuario</th>
								<th scope="col">Estatus</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($logs as $log) { ?>
								<tr>
									<td><?php echo $log->nombre; ?></td>
									<td><?php echo $log->apellidos; ?></td>
									<td><?php echo $log->email; ?></td>
									<td><?php echo $log->ip_address; ?></td>
									<td><?php echo $log->fecha_alta; ?></td>
									<td><?php echo $log->tipo_usuario; ?></td>
									<td><?php echo $log->status; ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- Modal -->
<div class="modal fade" id="filtrosReporte" tabindex="-1" role="dialog" aria-labelledby="filtrosReporte" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<form method="POST" action="<?= base_url() ?>validateReportBinnecleFilter">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Filtros para el reporte de la bitácora</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body input-daterange">
					<?php if ($tipo_usuario == 0) { ?>
						<div class="form-group col-sm-12">
							<label for="idUsuario">Usuario (campo no requerido): </label>
							<select class="custom-select" name="idUsuario" id="idUsuario">
								<option value="0" selected>Selecciona un usuario</option>
								<?php foreach ($users as $user) { ?>
									<option value="<?= $user->id_usuario ?>"><?= $user->email ?></option>
								<?php } ?>
							</select>
						</div>
					<?php } else { ?>
						<input type="text" hidden value="<?= $id_usuario ?>" name="idUsuario">
					<?php } ?>
					<div class=""><span>Del:</span></div>
					<div class="">
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<button class="btn btn-default" type="button">
									<i class="fa fa-calendar fa-lg"></i>
								</button>
							</div>
							<input class="form-control" name="fechaInicial" placeholder="yyyy-mm-dd" required>
						</div>
					</div>

					<div class=""><span>Al:</span></div>
					<div class="">
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<button class="btn btn-default" type="button">
									<i class="fa fa-calendar fa-lg"></i>
								</button>
							</div>
							<input class="form-control" name="fechaFinal" placeholder="yyyy-mm-dd" required>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button class="btn btn-block btn-outline-success">
						Exportar <i class="fa fa-file-excel-o fa-lg"></i>
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
