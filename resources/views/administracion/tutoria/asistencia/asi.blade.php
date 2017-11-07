@extends ('layouts.admin')

@section ('contenido')
{!!Form::open(array('url'=>'administracion/tutoria/asistencia/asi','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
 <div class="well well bs-component">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-8 col-xs-12">
			<h3 style="border-bottom-style: solid;"><center> <i class="fa fa-file-text"></i> Nueva Asistencia</center> </h3>
			<h5 class="col-md-6"><b>Nombre Tutoría: </b>{{$tutorias->asignaturas->nombre}}</h5>
			<h5 class="col-md-6"><b>Tutor: </b> {{$tutorias->users->name}} {{$tutorias->users->apellidos}} </h5>
			<h3> </h3>
		</div>
	</div>
</div>
<div class="row">
		
         <input type="hidden" name="_token" value="{!! csrf_token() !!}">
         <input type="hidden" name="tutoriaID" value="{{$tutorias->id}}">
         <input type="hidden" name="fechaID" value="{{$fecha_tutoria->id_f}}">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th >Rut </th>
					<th>Estudiantes</th>
					<th>Correo</th>
					<th>Asistencia</th>
				</thead>
               @foreach ($estudiantes as $asi)
				<tr>
					<td>{!!$asi->rut!!}</td>
					<td>{!!$asi->nombre!!}</td>
					<td>{!!$asi->email!!}</td>
					<td>
						<input type="checkbox" name="estado[]" value="{{$asi->id_user}}">
					 </td>
           		
				</tr>
				
				@endforeach
			</table>

		<button class="btn btn-info" type="submit">Guardar</button>
		<a href=""><button class="btn btn-danger " type="cancel">Cancelar</button></a>
		</div>
	</div>
	
</div>
{!!Form::close()!!}	
@endsection