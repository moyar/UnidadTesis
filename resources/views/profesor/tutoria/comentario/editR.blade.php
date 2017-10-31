@extends ('layouts.admin')
@section ('contenido')




		{!!Form::open(array('action'=>['RespuestaController@update',$comment->id_respuesta],'method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<input name="_method" type="hidden" value="PUT">
			<input type="hidden" name="topicoId" value="{{$comment->topicos->id_topico}}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
           
            <div class="row">
             
          <div class="col-md-6">
            {{ Form::label('nombre', "Respuesta:") }}
            {!! Form::textarea('comentario', $comment->comentario, ['class' => 'form-control', 'rows' => '5']) !!}
            {{ Form::submit('Actualizar Respuesta', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
          </div>

        </div>
	</div>

</div>
{!!Form::close()!!}	




@endsection