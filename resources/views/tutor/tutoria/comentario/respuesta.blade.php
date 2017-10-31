@extends ('layouts.admin')
@section ('contenido')

<style type="text/css">
  .comment-content {
  clear: both;
  margin-left: 65px;
  font-size: 16px;
  line-height: 1.3em;
}

</style>
<div class="row">
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
      <h3>Respuesta a:  <b>{{$topico->nombre}}</b></h3>
      <h3>Nueva Respuesta</h3>
      @if (count($errors)>0)
      <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        </ul>
      </div>
      @endif

      {!!Form::open(array('url'=>'tutor/tutoria/comentario/respuesta','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
          
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <input type="hidden" name="topicoId" value="{{$topico->id_topico}}">
            <div class="row">
             <form>
            <div class="col-md-8">
           {{ Form::label('comentario', "Respuesta:") }}
            {!! Form::textarea('comentario', null, ['class' => 'form-control', 'rows' => '5']) !!}

            {{ Form::submit('Agregar Respuesta', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
          </div>
        </div>
   </form>
{!!Form::close()!!}
@include('profesor.tutoria.comentario.indiceR')

</div>


@endsection