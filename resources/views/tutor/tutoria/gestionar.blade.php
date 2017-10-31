@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>{{$tutorias->asignaturas->nombre}}</h3>
		<h4><b>Nombre Grupo Tutoría: </b>{{$tutorias->nombre_grupo}}</h4>
	
		<h4><b>Tutor: </b> {{$tutorias->users->name}} {{$tutorias->users->apellidos}}</h4>
	</div>
</div>
<div>
	<a href="{{URL::action('TutorRolController@ver',$tutorias->id)}}"><button class="btn btn-warning">Ver Asistencia</button></a>
	<a href="{{URL::action('TopicoController@verd',$tutorias->id)}}"><button class="btn btn-success">Matería</button></a>
	<h1> </h1>
	
</div>

<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th >Rut </th>
					<th>Estudiante</th>
					<th>Carrera</th>
					
				</thead>
               @foreach ($estudiantes as $asi)
				<tr>
					<td>{!!$asi->rut!!}</td>
					<td>{!!$asi->nombre!!} {!!$asi->apellidos!!}</td>
					<td>{{$asi->carreras->nombre}}</td>
				</tr>

				
				@endforeach
			</table>
		</div>
	</div>
</div>



@endsection