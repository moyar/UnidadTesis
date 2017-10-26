@extends ('layouts.admin')
@section ('contenido')




		{!!Form::open(array('action'=>['AtencionController@update',$aten->id_atencion],'method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<input name="_method" type="hidden" value="PUT">
			<input type="hidden" name="estudianteId" value="{{$aten->estudiantes->id_user}}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
           
            <div class="row">
             
          <div class="col-md-6">
            {{ Form::label('citadas', "Nº Sesiones Citadas:") }}
            {{ Form::text('citadas', $aten->citadas, ['class' => 'form-control']) }}
          </div>
          <div class="col-md-6">
            {{ Form::label('asistidas', "Nº Sesiones Asistidas:") }}
            {{ Form::text('asistidas', $aten->asistidas, ['class' => 'form-control']) }}
          </div>
          <div class="col-md-6">
            {{ Form::label('diagnostico', "Diagnostico:") }}
            {{ Form::text('diagnostico', $aten->diagnostico, ['class' => 'form-control']) }}
          </div>
          <div class="col-md-6">
            {{ Form::label('derivaciones', "Derivaciones:") }}
            {{ Form::text('derivaciones', $aten->derivaciones, ['class' => 'form-control']) }}
          </div>
          <div class="col-md-12">
           {{ Form::label('observacion', "Observaciones:") }}
            {!! Form::textarea('observacion', $aten->observacion, ['class' => 'form-control', 'rows' => '5']) !!}
            {{ Form::submit('Actualizar Atención', ['class' => 'btn btn-primary btn-block', 'style' => 'margin-top:15px;']) }}
            
          </div>

         
        </div>
	</div>

</div>
{!!Form::close()!!}	




@endsection