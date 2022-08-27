<div class="modal-content" id="guest-modal">
	<form id="form-untracked" method="post" role="form" action="{{ route('assignmentProducts.store') }}">
        @csrf
    	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" style="margin-top:0px!important;">Agregar no registrable</h4>
        </div>
        <div class="modal-body">
        	<div id="message"></div>
            <div class="row">
                <div class="form-group col-sm-12">
                	<label>Descripción</label><br>
                	<textarea name="name" id="name" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group col-sm-3">
                	<label>Cantidad</label><br>
                    <input type="number" id="quantity" name="quantity" class="form-control" value="1">
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="assignment_id" value="{{ $assignment->id }}">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" id="addUntracked" class="btn btn-primary">Guardar</button>
        </div>
	</form>
</div>

<script>
    $('#addUntracked').on('click', function(event) {
        event.preventDefault()
        let form = $(this).closest('form')[0]
        var formData = new FormData(document.getElementById('form-untracked'));
        $.ajax({
            url: form.action,
            type: 'POST',
            data: formData,
            dataType: 'json',
            processData: false, 
            contentType: false,
            success: function(response) {
                $('#modal').hide();
            }
        })
    });
</script>