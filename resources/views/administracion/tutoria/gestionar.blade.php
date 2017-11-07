@extends ('layouts.admin')
@section ('contenido')
<div class="well well bs-component">
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-8 col-xs-12">
		<h3 style="border-bottom-style: solid;"><center> <i class="fa fa-book"></i> {{$tutorias->asignaturas->nombre}}</center> </h3>
		<h4><b>Nombre Grupo Tutoría: </b>{{$tutorias->nombre_grupo}}</h4>
		<h4><b>Nombre Tutor: </b>{{$tutorias->users->name}} {{$tutorias->users->apellidos}}</h4>
	</div>
</div>
<div>
	
	<a href="{{URL::action('TutoriaController@edit',$tutorias->id)}}"><button class="btn btn-info">Editar</button></a>
	<a href="{{URL::action('TutoriaController@crear',$tutorias->id)}}"><button class="btn btn-success">Crear Asistencia</button></a>
	<a href="{{URL::action('TutoriaController@ver',$tutorias->id)}}"><button class="btn btn-warning">Ver Asistencia</button></a>
	<h1> </h1>
</div>
</div>
<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th ><center>Rut</center> </th>
					<th><center>Estudiante</center></th>
					<th><center>Correo</center></th>
					<th><center>Ficha</center></th>
					
				</thead>
               @foreach ($estudiantes as $asi)
				<tr>
					<td><center>{!!$asi->rut!!}</center></td>
					<td><center>{!!$asi->nombre!!} {!!$asi->apellidos!!}</center></td>
					<td><center>{!!$asi->email!!}</center></td>
           			<td><center><a href="{{URL::action('EstudianteController@datos',$asi->id_user)}}"><button class="btn  btn-success"><i class="fa fa-fw fa-eye"></i>Ficha</button></a></center></td>
           			 
				</tr>

				
				@endforeach
			</table>
		</div>
	</div>
</div>



@endsection