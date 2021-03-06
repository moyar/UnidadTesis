@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Talleres <a href="categoria/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('administracion.categoria.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th >Id </th>
					<th>Nombre</th>
					<th>Opciones</th>
				</thead>
               @foreach ($categoria as $use)
				<tr>
					<td>{{ $use->id_categoria}}</td>
					<td>{{ $use->nombre}}</td>
					
					<td>
						<a href="{{URL::action('CategoriaController@edit',$use->id_categoria)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$use->id_categoria}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('administracion.categoria.modal')
				@endforeach
			</table>
		</div>
		{{$categoria->render()}}
	</div>
</div>

@endsection