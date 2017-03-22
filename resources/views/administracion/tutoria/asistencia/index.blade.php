
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Asistencia  </h3>
		<h4>Numero de Tutorias realizadas: {{$fecha_tutoria->count()}}</h4>
	</div>
</div>

<input type="hidden" name="tutoriaId" value="{{$tutorias->id}}">

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
					@foreach ($fecha_tutoria as $fe)
					<tr>
					 
						<td>{{$fe->fecha}}</td>
						<td>{{$fe->periodo}} </td>
						<td>{{$fe->estado}}</td>
						<td>
							<a href="{{URL::action('TutoriaController@asisAlumno',$fe->id_f)}}"><button class="btn btn-info">Alumnos</button></a>
						</td>

				   </tr>
				   @endforeach
			</table>
			</table>
		</div>
	
	</div>
</div>

