@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Tutorias</h3>
		@include('profesor.tutoria.search')
	</div>

</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th><center>Grupo</center></th>
					<th><center>Asignatura</center></th>
					<th><center>Tutor</center></th>
					<th><center>Semestre</center></th>
					<th><center>Año</center></th>
					<th><center>Opciones</center></th>
				</thead>
			
					
					@foreach ($tutorias as $post)
						
						<tr>
							
							<td><center>{{ $post->nombre_grupo }}</center></td>
							<td><center>{{$post->asignaturas->nombre}}</center></td>
							<td><center>{{$post->users->name}} {{ $post->users->apellidos }}</center></td>
							<td><center>{{ $post->semestre}}</center></td>
							<td><center>{{ $post->año}}</center></td>
							
							<td>
							<a href="{{URL::action('ProfesorController@mostrarGestionar',$post->id)}}"><button class="btn btn-info">Gestionar</button></a>
							
							</td>
	
						</tr>
					@endforeach

			</table>
			</table>
		</div>
	
	</div>
</div>

@endsection