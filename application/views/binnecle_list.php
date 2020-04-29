<section class="container pt-5">
	<div class="row">
		<div class="card p-0 col-sm-12">
			<div class="card-header">
				<h4>Logs
				</h4>
			</div>
			<div class="card-body">
				<div class="row input-daterange">
					<div class="col-1"><span>Del:</span></div>
					<div class="col-2">
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<button class="btn btn-default" type="button">
									<i class="fa fa-calendar fa-lg"></i>
								</button>
							</div>
							<input class="form-control ng-untouched ng-pristine ng-valid" name="dp" placeholder="yyyy-mm-dd">
						</div>
					</div>

					<div class="col-1"><span>Al:</span></div>
					<div class="col-2">
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<button class="btn btn-default" type="button">
									<i class="fa fa-calendar fa-lg"></i>
								</button>
							</div>
							<input class="form-control ng-untouched ng-pristine ng-valid" name="dp" ngbdatepicker="" placeholder="yyyy-mm-dd">
						</div>
					</div>
					<div class="col-2">
						<button class="btn btn-block btn-outline-dark"> Consultar </button>
					</div>
					<div class="col-2">
						<button class="btn btn-block btn-outline-success">
							Exportar <i class="fa fa-file-excel-o fa-lg"></i>
						</button>
					</div>

				</div>
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
