<div class="modal-content" id="guest-modal">
    <form id="form-untracked" method="post" role="form" action="{{ route('assignmentProducts.storeInventory') }}">
        @csrf
    	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" style="margin-top:0px!important;">Agregar inventario</h4>
        </div>
        <div class="modal-body">
        	<div id="message"></div>
            <div class="row">
                <div class="form-group col-sm-12">
                	<label>Matricula N°</label><br>
                	<select id="product_id" name="product_id" class="form-control select" data-url="{{ route('inventories.list') }}"></select>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="assignment_id" value="{{ $assignment->id }}">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" id="addInventory" class="btn btn-primary">Guardar</button>
        </div>
	</form>
</div>
<script>
    
    $(document).ready(function() {
        OrderProduct.addForm();
        $('#product_id').select2({
            language: "es",
            minimumInputLength: 3,
            minimumResultsForSearch: 20,
            ajax: {
                url: "{{ route('inventories.list') }}",
                dataType: 'json',
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }
        });

        
    });
    //$('#addInventory').on('click', function(event) {
    $(document).on('click', '#addInventory', function(event) {
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