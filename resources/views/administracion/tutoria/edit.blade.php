@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Tutoria</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

	{!!Form::model($tutorias,['method'=>'PUT','route'=>['administracion.tutoria.update',$tutorias->id]])!!}
            {{Form::token()}}
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
           
             <div class="form-group">
            	<label for="nombre_grupo">Grupo </label>
            	<input type="text" name="nombre_grupo" class="form-control" value="{{$tutorias->nombre_grupo}}" >
            </div>
           <div class="form-group">
          
           {{ Form::label('asignaturas_id', "Asignaturas:", ['class' => 'form-spacing-top']) }}
			{{ Form::select('asignaturas_id', $asignaturas, null, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
          
           {{ Form::label('tutores_id', "Tutores:", ['class' => 'form-spacing-top']) }}
			{{ Form::select('tutores_id', $tutores, null, ['class' => 'form-control']) }}
			</div>
			
			

			<div class="form-group">
 			{{ Form::label('estudiantes', 'Estudiantes:', ['class' => 'form-spacing-top']) }}
			{{ Form::select('tags[]', $estudiantes, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}
			</div>

			

             <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	
            	{!! Html::link('administracion/tutoria', 'Cancelar',  array('class' => 'btn btn-danger')) !!}
            </div>


			{!!Form::close()!!}		
            
		</div>
            
		</div>
		{!! Html::script('js/select2.min.js') !!}
		{!! Html::style('css/select2.min.css') !!}

	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

	<script>
		tinymce.init({
			selector: 'textarea',
			plugins: 'link code',
			menubar: false
		});
	</script>

		    <script type="text/javascript">

		    $('.select2-multi').select2();
		    $('.select2-multi').select2().val({!! json_encode($tutorias->estudiantes()->getRelatedIds()) !!}).trigger('change');

		    </script>
@endsection

