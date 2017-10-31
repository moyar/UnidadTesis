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
      <h3>Nuevo Tema</h3>
      @if (count($errors)>0)
      <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        </ul>
      </div>
      @endif

      {!!Form::open(array('url'=>'profesor/tutoria/vertopico/topico','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
          
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <input type="hidden" name="tutoriaId" value="{{$tutoria->id}}">
            <div class="row">
             <form>
          <div class="col-md-6">
            {{ Form::label('nombre', "Nombre:") }}
            {{ Form::text('nombre', null, ['class' => 'form-control']) }}
            {{ Form::submit('Agregar Tema', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
          </div>

        </div>
   </form>
{!!Form::close()!!}
@include('profesor.tutoria.vertopico.indiceT')

</div>


@endsection