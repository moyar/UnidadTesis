@extends ('layouts.admin')
@section ('contenido')
    <div class="container col-md-6 col-md-offset-3">
        <div class="well well bs-component">

            <div class="form-horizontal" method="post">
                
                 {!!Form::open(array('action'=>['TutorRolController@perfilu',$usu->id],'method'=>'POST','autocomplete'=>'off'))!!}

                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                {!! csrf_field() !!}

                <fieldset>
                    <legend>Editar Perfil usuario</legend>
                    <div class="form-group">
                        <label for="name" class="col-lg-2 control-label">Nombre</label>

                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name"
                                   value="{{ $usu->name }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="apellidos" class="col-lg-2 control-label">Apellidos</label>

                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="apellidos" placeholder="apellidos" name="apellidos"
                                   value="{{ $usu->apellidos }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rut" class="col-lg-2 control-label">Rut</label>

                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="rut" placeholder="Rut" name="rut"
                                   value="{{ $usu->rut }}">
                        </div>
                    </div>
                   

                    <div class="form-group">
                        <label for="email" class="col-lg-2 control-label">Email</label>

                        <div class="col-lg-10">
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                                   value="{{ $usu->email }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-lg-2 control-label">Contraseña</label>

                        <div class="col-lg-10">
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-lg-2 control-label">Repita Contraseña</label>

                        <div class="col-lg-10">
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                           
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </fieldset>
                {!!Form::close()!!}     
            </div>
        </div>
    </div>
@endsection