@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Grupos de Talleres <a href="{{action('TallerController@create')}}"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('administracion.taller.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th><center>Grupo</center></th>
					<th><center>Taller</center></th>
					<th><center>Semestre</center></th>
					<th><center>Año</center></th>
					
					<th><center>Opciones</center></th>
				</thead>
			
					
					@foreach ($talleres as $post)
						
						<tr>
							
							<td><center>{{ $post->nombre_grupo }}</center></td>
							<td><center>{{ $post->categorias->nombre}}</center></td>
							<td><center>{{ $post->semestre}}</center></td>
							<td><center>{{ $post->año}}</center></td>
							<td>
							<a href="{{URL::action('TallerController@mostrarGestionar',$post->id)}}"><button class="btn btn-info">Gestionar</button></a>
							<a href="" data-target="#modal-delete-{{$post->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
							
							</td>
	
						</tr>
						@include('administracion.taller.modal')
					@endforeach

			</table>
			</table>
		</div>
	</div>
</div>

@endsection