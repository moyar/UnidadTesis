@extends ('layouts.admin')
@section ('contenido')




		{!!Form::open(array('action'=>['TopicoController@updated',$comment->id_topico],'method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<input name="_method" type="hidden" value="PUT">
			<input type="hidden" name="tutoriaId" value="{{$comment->tutorias->id}}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
           
            <div class="row">
             
          <div class="col-md-6">
            {{ Form::label('nombre', "Nombre:") }}
            {{ Form::text('nombre', $comment->nombre, ['class' => 'form-control']) }}
            {{ Form::submit('Actualizar Tema', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
          </div>

        </div>
	</div>

</div>
{!!Form::close()!!}	




@endsection