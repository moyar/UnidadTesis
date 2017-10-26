@extends ('layouts.admin')
@section ('contenido')




		{!!Form::open(array('action'=>['ComentarioController@updated',$comment->id],'method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<input name="_method" type="hidden" value="PUT">
			<input type="hidden" name="estudianteId" value="{{$comment->estudiantes->id_user}}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
           
            <div class="row">
             
          <div class="col-md-6">
            {{ Form::label('nombre', "Nombre:") }}
            {{ Form::text('nombre', $comment->nombre, ['class' => 'form-control']) }}
          </div>
          <div class="col-md-12">
           {{ Form::label('comentario', "Comentario:") }}
            {!! Form::textarea('comentario', $comment->comentario, ['class' => 'form-control', 'rows' => '5']) !!}
            {{ Form::submit('Actualizar Comentario', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
            
          </div>

         
        </div>
	</div>

</div>
{!!Form::close()!!}	




@endsection