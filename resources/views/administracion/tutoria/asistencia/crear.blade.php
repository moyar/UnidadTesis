@extends ('layouts.admin')
@section ('contenido')

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
          
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
						

			</select>
			</div>
			<div class="form-group col-md-4">
			<label class="col-md-12">Opciónes</label>
			<button class="btn btn-info col-md-6 " type="submit">Guardar</button>
			<button href="{{action('TutoriaController@mostrarGestionar',$tutorias->id)}}" type="button" class="btn btn-danger col-md-6">Cancelar</button>
			</div>

{!!Form::close()!!}	
@include('administracion.tutoria.asistencia.index')
@endsection

















