@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Tutores <a href="tutor/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('administracion.tutor.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
				
					<th>Rut</th>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Email</th>
					<th>Carrera</th>
					<th>Opciones</th>
				</thead>
               @foreach ($tutores as $use)
				<tr>
					
					<td>{{ $use->rut}}</td>
					<td>{{ $use->nombre}}</td>
					<td>{{ $use->apellidos}}</td>
					<td>{{ $use->email}}</td>
					<td>{{ $use->Carreras->nombre}}</td>

					<td>
						<a href="{{URL::action('TutorController@edit',$use->id_tutor)}}"><button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$use->id_tutor}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

                        <a href="{{URL::action('TutorController@show',$use->id_tutor)}}"><button class="btn  btn-success"><i class="fa fa-fw fa-eye"></i>Ficha</button></a>
					</td>
				</tr>
				@include('administracion.tutor.modal')
				@endforeach
			</table>
		</div>
		{{$tutores->render()}}
	</div>
</div>

@endsection