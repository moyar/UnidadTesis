@extends ('layouts.admin')
@section ('contenido')
<script>
	alumnos=[];
</script>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Nueva Asistencia</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'administracion/tutoria/asistencia','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <input type="hidden" name="tutoriaId" value="{{$tutorias->id}}">
            <div class="form-group col-md-4">
            	<label for="fecha">Fecha </label>
            	<input type="date" name="fecha" class="form-control">
            </div>
           <div class="form-group col-md-4">
           <label for = "periodo">Periodo</label>
           <select class="form-control" name="periodo">
					
						<option value='1'> I </option>
						<option value='2'> II </option>
						<option value='3'> III </option>
						<option value='4'> IV </option>
						<option value='5'> V </option>
						<option value='6'> VI </option>
						<option value='7'> VII </option>
						<option value='8'> VIII </option>

			</select>
			</div>
			<div class="form-group col-md-4">
			<label class="col-md-12">Opciónes</label>
			<button class="btn btn-info col-md-6 " type="submit">Guardar</button>
			<button href="{{action('TutoriaController@mostrarGestionar',$tutorias->id)}}" type="button" class="btn btn-danger col-md-6">Cancelar</button>
			</div>
			



			
		<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th >Id </th>
					<th>Estudiante</th>
					<th>Asistencia</th>
				</thead>
               @foreach ($estudiantes as $asi)
				<tr>
					<td>{!!$asi->rut!!}</td>
					<td>{!!$asi->nombre!!}</td>
					<td>
						<input type="checkbox" name="estado" value="{{$asi->id_user}}">
					 </td>
           		
				</tr>
				
				@endforeach
			</table>
		</div>
	</div>
</div>
{!!Form::close()!!}	
@endsection

















