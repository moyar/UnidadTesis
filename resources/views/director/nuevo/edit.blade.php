@extends ('layouts.admin')
@section ('contenido')
<div class="well well bs-component">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h4 style="color: green;"><b>Editar Motivo</b> </h4>
      <h3 style="border-bottom-style: solid;">{{ $usuarios->nombre}} {{ $usuarios->apellidos}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

      {!!Form::model($usuarios,['method'=>'PUT','route'=>['director.nuevo.update',$usuarios->id_user]])!!}
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
             {{Form::token()}}
                     
          
                       
                         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                               <div class="form-group col-md-12">
                                   <label for = "motivo">Motivo</label>
                                   <select class="form-control" name="motivo">
                                                @if($usuarios->motivo == 1)
                                                  <option value='{{$usuarios->motivo}}'> Atencíon Psicopedagógica </option>
                                                @endif
                                                @if($usuarios->motivo == 2)
                                                  <option value='{{$usuarios->motivo}}'> Solicitud Tutorías </option>
                                                @endif
                                                @if($usuarios->motivo == 3)
                                                  <option value='{{$usuarios->motivo}}'> Ambos </option>
                                                @endif
                                                  <option value=''> Seleccione Motivo </option>
                                                  <option value='1'> Atención Psicopedagógica</option>
                                                  <option value='2'> Solicitud Tutorías</option>
                                                  <option value='3'> Ambas</option>
                                                 
                                                    
                                    </select>
                               </div>

                            <div class="form-group col-md-12">
                             <button class="btn btn-success" type="submit">Aceptar</button>
                           </div>
                        </div>
                </div>
                


      {!!Form::close()!!}		
            
		</div>
@endsection