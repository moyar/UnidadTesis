<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modalA-delete-{{$aten->id_atencion}}">
	{{Form::Open(array('action'=>array('AtencionController@eliminar',$aten->id_atencion),'method'=>'delete'))}}
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
           
	<input type="hidden" name="estudianteId" value="{{$aten->estudiantes->id_user}}">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Eliminar Atencion</h4>
			</div>
			<div class="modal-body">
				<p>Confirme si desea Eliminar la Atencion</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>