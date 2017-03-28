@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>{{$tutorias->asignaturas->nombre}}</h3>
		<h4>{{$tutorias->nombre_grupo}}: {{$tutorias->tutores->nombre}} {{$tutorias->tutores->apellidos}}</h4>
	</div>
</div>
<div>
	
	<a href="{{URL::action('TutoriaController@edit',$tutorias->id)}}"><button class="btn btn-info">Editar</button></a>
	<a href="{{URL::action('TutoriaController@crear',$tutorias->id)}}"><button class="btn btn-info">Crear Asistencia</button></a>
	<a href="{{URL::action('TutoriaController@ver',$tutorias->id)}}"><button class="btn btn-info">Ver Asistencia</button></a>
	<h1> </h1>
</div>

<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th >Rut </th>
					<th>Estudiante</th>
					<th>Ficha</th>
					
				</thead>
               @foreach ($estudiantes as $asi)
				<tr>
					<td>{!!$asi->rut!!}</td>
					<td>{!!$asi->nombre!!} {!!$asi->apellidos!!}</td>
           			<td><a><button class="btn  btn-success"><i class="fa fa-fw fa-eye"></i>Ficha</button></a></td>
				</tr>

				
				@endforeach
			</table>
		</div>
	</div>
</div>



@endsection