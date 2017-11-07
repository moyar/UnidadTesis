@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3><i class="fa fa-users"></i> Listado de Nuevas Solicitudes</h3>
		
		@include('director.nuevo.search')
	</div>
	 
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th><center>Rut</center></th>
					<th><center>Nombres</center></th>
					<th><center>Apellidos</center></th>
					<th><center>Email</center></th>
					<th><center>Carrera</center></th>
					<th><center>Motivo</center></th>
					<th><center>Opciones</center></th>
					
				</thead>
               @foreach ($usuarios as $use)
              
				<tr>
					
					<td><center>{{$use->rut}}</center></td>
					<td><center>{{$use->nombre}}</center></td>
					<td><center>{{$use->apellidos}}</center></td>
					<td><center>{{$use->email}}</center></td>
					<td><center>{{$use->carreras->nombre}}</center></td>
					@if($use->motivo == 1)
					<td><center>Atención Psicopedagógica</center></td>
					@endif
					@if($use->motivo == 2)
						<td><center>Tutorías</center></td>
					@endif
					@if($use->motivo == 3)
						<td><center>Ambos</center></td>
					@endif
					 {!!Form::open(array('url'=>'director/nuevo','method'=>'POST','autocomplete'=>'off'))!!}
             			{{Form::token()}}
					<td>

						
            			 <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            			 <input type="hidden" name="usuId" value="{{ $use->id_user }}">
						 <a><button class="btn btn-success" type="submit"><i class="fa fa-user-plus"></i></button></a>
						
						 
                         {!!Form::close()!!}	

             
                         <a href="{{URL::action('DirectorNuevoController@edit',$use->id_user)}}"><button class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
                         <a href="" data-target="#modal-delete-{{$use->id_user}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-user-plus"></i></button></a>

                        

                         
					</td>
				</tr>
				@include('director.nuevo.modal')
				@endforeach
			
			</table>
		</div>
	</div>
</div>

@endsection