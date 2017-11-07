@extends ('layouts.admin')
@section ('contenido')




		{!!Form::open(array('action'=>['TutoriaController@updateL',$fecha_tutoria->id_f],'method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
<div class="well well bs-component">
<input name="_method" type="hidden" value="PUT">
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-8 col-xs-12">
		<h3 style="border-bottom-style: solid;"><center> <i class="fa fa-file-text"></i> Listado de Alumnos</center> </h3>
		
		<h5 class="col-md-6"><b>Nombre Tutoría: </b>{{$tutorias->asignaturas->nombre}}</h5>
		<h5 class="col-md-6"><b>Tutor: </b> {{$tutorias->users->name}} {{$tutorias->users->apellidos}}</h5>
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
					<td>{{$asi->estudiantes->rut}}</td>
					<td>{{$asi->estudiantes->nombre}}</td>
					<td>{{$asi->estudiantes->email}}</td>
					<td>
					@if($asi->estado==1)
						<input type="checkbox" name="estado[]" value="{{$asi->estudiantes->id_user}}" checked>
					@elseif($asi->estado==0)
							<input type="checkbox" name="estado[]" value="{{$asi->estudiantes->id_user}}">
					@endif
					 </td>
					
				</tr>
				@endforeach
				
				
			</table>

		<div>
		<a href=""><button class="btn btn-info  " type="submit">Guardar</button></a>
		<a href=""><button class="btn btn-danger " type="cancel">Cancelar</button></a>
		</div>
		</div>
	</div>
	
</div>
{!!Form::close()!!}	




@endsection