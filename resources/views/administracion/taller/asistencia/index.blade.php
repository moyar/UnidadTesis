
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Asistencia  </h3>
		<h4>Numero de sesiones realizadas: {{$fecha_taller->count()}}</h4>
	</div>
</div>

<input type="hidden" name="tallerId" value="{{$talleres->id}}">

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Fecha</th>
					<th>Periodo</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
					@foreach ($fecha_taller as $fe)
					<tr>
					 
						<td>{{$fe->fecha}}</td>
						<td>{{$fe->periodo}} </td>
						<td>{{$fe->estado}}</td>
						<td>
							<a href="{{URL::action('TallerController@asisAlumno',$fe->id_t)}}"><button class="btn btn-info">Realizar Asistencia</button></a>
							<a href="" data-target="#modal-delete-{{$fe->id_t}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
							<a href="{{URL::action('TallerController@editL',$fe->id_t)}}"><button class="btn btn-warning">Editar Asistencia</button></a>
						</td>

				   </tr>
				   
				   @include('administracion.taller.asistencia.modal')
				   @endforeach
			</table>
			</table>
		</div>
	
	</div>
</div>




