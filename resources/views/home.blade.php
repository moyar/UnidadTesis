@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
           <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-clock-o fa-fw"></i> Plataforma UAAEP Universidad Austral de Chile
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                 <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-group fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$estudiante}}</div>
                                    <div>Estudiantes registrados!</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$tutores}}</div>
                                    <div>Tutores Registrados!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$tutorias}}</div>
                                    <div>Tutorias Registradas!</div>
                                </div>
                            </div>
                        </div>
    
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-sitemap fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$talleres}}</div>
                                    <div>Talleres Registrados!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="timeline">
                 <li >
                     
                      
                        <div class="timeline-badge warning"><i class="fa fa-check"></i> </div>
                                    <div class="timeline-panel" style="background: purple;color:white;">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title"><i class="fa fa-book fx-5x"></i>  Tutorías Académicas</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p><b>Grupales:</b></p>
                                            <p>Espacio extracurricular de acompañamiento y fortalecimiento académico, centrado en la revisión de contenidos específicos de asignaturas consideradas de alta
                                            reprobación.</p>
                                        </div>
                                    </div>
                            
                                </li>
                                <li class="timeline-inverted">
                                   
                                    <div class="timeline-badge warning"><i class="fa fa-clock-o"></i>
                                    </div>
                                    <div class="timeline-panel" style="background: #018989;color:white;">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title"><i class="fa fa-calendar fx-5x"></i> Talleres de Habilidades Académicas:</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>
                                                En estos talleres podrás conocer y ejercitar habilidades que te permitan hacer del estudio un proceso eficiente.<br>
                                                - Organizar tu tiempo y planificar tus estudios.<br>
                                                - Aprender hábitos y tecnicas de estudios acordes a las
                                                  exigencias de la Universidad.<br>
                                                - Mejorar tus habilidades lingüísticas.

                                            </p>
                                            
                                        </div>
                                
                                    </div>
                                </li>
                                <li>
                                    
                                    <div class="timeline-badge warning"><i class="fa fa-group"></i>
                                    </div>
                                    <div class="timeline-panel" style="background: #FFBF00;color: white;">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title"><i class="fa fa-user fx-5x"></i>     Talleres de Habilidades Socioemocionales</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>
                                                - Tecnicas de el manejo del estrés y la anciedad.<br>
                                                - Tecnicas comunicacionales y expresivas:<br>  
                                                       Cómo enfrentar presentaciones orales.
                                            </p>
                                        </div>
                                    </div>
                                
                                </li>
                            </ul>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
        </div>
 </div>

@endsection
