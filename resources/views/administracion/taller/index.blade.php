@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Talleres <a href="{{action('TallerController@create')}}"><button class="btn btn-success">Nuevo</button></a></h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Grupo</th>
					<th>Taller</th>
					
					<th>Opciones</th>
				</thead>
			
					
					@foreach ($talleres as $post)
						
						<tr>
							
							<td>{{ $post->nombre_grupo }}</td>
							<td>{{ $post->categorias->nombre}}</td>
							</td>
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