@extends('layouts.app')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Asignaciones <small></small></h3>
    </div>
    <div class="title_right">
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Asignaciones</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    
                        <div class="col-sm-5 mail_list_column">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <form action="#">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Agregar por matrícula
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="registration" name="registration" placeholder="Número de matrícula">
                                                </div>
                                                <div class="form-group">
                                                    <button id="compose" class="btn btn-sm btn-success btn-block" type="button">AGREGAR</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="panel panel-default">
                                    <form action="#">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Agregar por tipo
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <select id="product_id" name="product_id" class="form-control select" data-url="{{ route('products.list') }}" style="width:100%important!;">
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <button id="compose" class="btn btn-sm btn-success btn-block" type="button">AGREGAR</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="panel panel-default">
                                    <form action="{{ url('assignments/untracked') }}" method="post" id="non-registered-form">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNonRegistrable" aria-expanded="false" aria-controls="collapseNonRegistrable">
                                                Agregar no registrables
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseNonRegistrable" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="">Descripción</label>
                                                    <input type="text" id="name" name="name" placeholder="Descripción completa" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="quantity">Cantidad</label>
                                                    <input type="number" id="quantity" name="quantity" value="1" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <button id="add-non-registered" class="btn btn-sm btn-success btn-block" type="button">AGREGAR</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <hr>
                            <div id="items-lista">
                            </div>
                        </div>
                        <div class="col-sm-7 mail_view">
                            <div class="inbox-body">
                                <div class="mail_list_column">
                                    <div class="col-md-12">
                                        <div id="items-list">
                                        </div>      
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $('#product_id').select2({
            language: "es",
            minimumInputLength: 3,
            minimumResultsForSearch: 20,
            ajax: {
                url: "{{ route('products.list') }}",
                dataType: 'json',
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }
        });

        var productItem = function(id, name, qty = 1, description = '') {
            var container = $('#items-list');
            let item = '<div class="mail_list"><div class="left"><input type="number" id="product_'+id+'" name="products[]" value="' + qty + '" class="form-control"></div><div class="right"><h3>' + name + ' <small><i class="fa fa-times btn-delete" data-url="#" data-message="Esta por quitar el registro. Desea continuar?"></i></small></h3><p>' + description + '</p></div></div>';

            $(item).appendTo(container);
        }

        $('#registration').on('change', function() {
            let value = $(this).val();
            $.ajax({
                url: "{{ route('inventories.check') }}",
                type: 'post',
                data: 'registration=' + value,
                dataType: 'json',
                success: function(response) {
                    if(response.data.id) {
                        Swal.fire({
                            title: 'Agregar inventario',
                            html: '<span>Matricula N°: ' + response.data.registration + '</span>                        ',
                            icon: 'warning',
                            showCancelButton: true,
                            cancelButtonText: "Cancelar",
                            confirmButtonText: 'Confirmar'
                        }).then(function(result) {
                            if(result.isConfirmed === true) {
                                productItem(response.data.id, response.data.registration, 1, response.product.name);
                            }
                            else {
                                alert('no lo agrego');
                            }
                        })
                    }
                    else {
                        alert(response.data);
                    }
                }
            });
        });
        //Non registered
        $('#add-non-registered').on('change', function() {
            let value = $(this).val();
            $.ajax({
                url: "{{ route('inventories.check') }}",
                type: 'post',
                data: 'registration=' + value,
                dataType: 'json',
                success: function(response) {
                    if(response.data.id) {
                        Swal.fire({
                            title: 'Agregar inventario',
                            html: '<span>Matricula N°: ' + response.data.registration + '</span>                        ',
                            icon: 'warning',
                            showCancelButton: true,
                            cancelButtonText: "Cancelar",
                            confirmButtonText: 'Confirmar'
                        }).then(function(result) {
                            if(result.isConfirmed === true) {
                                productItem(response.data.id, response.data.registration, 1, response.product.name);
                            }
                            else {
                                alert('no lo agrego');
                            }
                        })
                    }
                    else {
                        alert(response.data);
                    }
                }
            });
        })
    });
</script>
@endsection