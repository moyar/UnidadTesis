@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Tutorias <a href="tutoria/create/"><button class="btn btn-success">Nuevo</button></a></h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th ># </th>
					<th>Grupo</th>
					<th>Asignatura</th>
					<th>Tutor</th>
					<th>Opciones</th>
				</thead>
			
					
					@foreach ($tutorias as $post)
						
						<tr>
							<td>{{ $post->id }}</td>
							<td>{{ $post->nombre_grupo }}</td>
							<td>{{ $post->asignaturas->nombre}}</td>
							<td>{{$post->tutores->nombre}} {{ $post->tutores->apellidos }}</td>
							<td>
							<a href="{{URL::action('TutoriaController@edit',$post->id)}}"><button class="btn btn-info">Editar</button></a>
							<a href="{{URL::action('TutoriaController@crear',$post->id)}}"><button class="btn btn-info">Asistencia</button></a>
							</td>
	
						</tr>

					@endforeach

			</table>
			</table>
		</div>
	 {{$tutorias->render()}}
	</div>
</div>

@endsection