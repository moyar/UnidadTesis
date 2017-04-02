@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Taller</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

	{!!Form::model($talleres,['method'=>'PUT','route'=>['administracion.taller.update',$talleres->id]])!!}
            {{Form::token()}}
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
           
             <div class="form-group">
            	<label for="nombre_grupo">Grupo </label>
            	<input type="text" name="nombre_grupo" class="form-control" value="{{$talleres->nombre_grupo}}" >
            </div>
           <div class="form-group">
          
           {{ Form::label('categoria_id', "Taller:", ['class' => 'form-spacing-top']) }}
			{{ Form::select('categoria_id', $categorias, null, ['class' => 'form-control']) }}
			</div>
			
			
			

			<div class="form-group">
 			{{ Form::label('estudiantes', 'Estudiantes:', ['class' => 'form-spacing-top']) }}
			{{ Form::select('tags[]', $estudiantes, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}
			</div>

			

             <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<a href="{{action('TallerController@mostrarGestionar',$talleres->id)}}" class="btn btn-danger">Cancelar</a>
            	
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
		    $('.select2-multi').select2().val({!! json_encode($talleres->estudiantes()->getRelatedIds()) !!}).trigger('change');

		    </script>
@endsection

