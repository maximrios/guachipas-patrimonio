<style>
	.action {
		padding: 6px!important;
	}
	.action .btn {
		margin-bottom: 0!important;
	}
</style>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Entradas <small>Administre todas las entradas</small></h3>
        </div>
        <!--
        <div class="title_right">
            <a href="<?=base_url('administrator/providers/add');?>" class="btn btn-success btn-sm pull-right">Agregar nueva proveedor</a>
        </div>
    	-->
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Detalle de entrada</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <section class="content invoice">
                      <!-- title row -->
                      	<div class="row">
                        	<div class="col-xs-12 invoice-header">
                          		<h1>
                                	<i class="fa fa-globe"></i> Entrada.
                                    <small class="pull-right">Fecha: <?=$order->order_date?></small>
                                </h1>
                        	</div>
                        	<!-- /.col -->
                      	</div>
                      	<!-- info row -->
                      	<div class="row invoice-info">
                        	<div class="col-sm-4 invoice-col">
                          		Proveedor
                          		<address>
                                    <strong><?=$order->name?></strong>
                                    <br><?=$order->address?>
                                    <!--<br>New York, CA 94107-->
                                    <br>Telefono: <?=$order->phone?>
                                    <br>Email: <?=$order->email?>
                                </address>
                        	</div>
                        	<!--
                        	<div class="col-sm-4 invoice-col">
                          		To
                          		<address>
                                	<strong>John Doe</strong>
                                    <br>795 Freedom Ave, Suite 600
                                    <br>New York, CA 94107
                                    <br>Phone: 1 (804) 123-9876
                                    <br>Email: jon@ironadmin.com
                                </address>
                        	</div>
                        	-->
                        	<div class="col-sm-4 invoice-col">
                          		<b>Entrada #<?=$order->id?></b>
                          		<br>
                          		<br>
                          		<b>Fecha de creación:</b> <?=$order->created?>
                        	</div>
                        	<!-- /.col -->
                      	</div>
                      	<!-- /.row -->
                        <div class="row no-print">
                            <div class="col-xs-12">
                                <?php if(count($order->products) > 0) { ?>
                                    <a href="#" target="_self" class="btn btn-danger pull-right" disabled style="margin-right: 5px;" data-message="Para eliminar la entrada debe eliminar todos los productos."><i class="fa fa-times"></i> Eliminar</a>    
                                <?php } else { ?>
                                    <a href="<?=base_url('administrator/orders/delete?order_id='.$order->id)?>" target="_self" class="btn btn-danger pull-right btn-delete" data-message="Esta por eliminar la entrada. Desea continuar?" style="margin-right: 5px;"><i class="fa fa-times"></i> Eliminar</a>
                                <?php } ?>
                                <a href="<?=base_url('administrator/orders/edit?order_id='.$order->id)?>" target="_self" class="btn btn-warning pull-right" style="margin-right: 5px;"><i class="fa fa-pencil"></i> Editar</a>
                                <a href="<?=base_url('administrator/orders/report_detail?order_id='.$order->id)?>" target="_blank" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generar PDF</a>
                                <a href="<?=base_url('administrator/orders')?>" target="_self" class="btn btn-default pull-right" style="margin-right: 5px;">Ver todas las entradas</a>
                            </div>
                        </div>
                      	<!-- Table row -->
                      	<div class="row">
                        	<div class="col-xs-12 table">
                          		<table class="table table-striped">
                            		<thead>
                              			<tr>
                                			<th width="130">Código</th>
                                			<th>Producto</th>
                                			<th width="70">Cantidad</th>
                                			<!--
                                			<th>Precio unit.</th>
                                			<th>Subtotal</th>
                                			-->
                              			</tr>
                            		</thead>
                            		<tbody>
                            			<?php if(isset($order->products) && count($order->products) > 0) { 
                            				foreach ($order->products as $product) { ?>
                            					<tr>
                            						<td><?=$product->code?></td>
                            						<td><?=$product->name?></td>
                            						<td class="text-right"><?=$product->quantity?></td>
                            						<!--
                            						<td><?=$product->unit_price?></td>
                            						<td><?=$product->rate?></td>
                            						-->
                            					</tr>
                            				<?php }
                            			}
                            			else { ?>
                            				<tr>
                            					<td class="text-center" colspan="5">No hay registros para mostrar</td>
                            				</tr>
                            			<?php } ?>
                            		</tbody>
                          		</table>
                        	</div>
                        	<!-- /.col -->
                      	</div>
                        <div class="row no-print">
                            <div class="col-xs-12">
                                <?php if(count($order->products) > 0) { ?>
                                    <a href="#" target="_self" class="btn btn-danger pull-right" disabled style="margin-right: 5px;" data-message="Para eliminar la entrada debe eliminar todos los productos."><i class="fa fa-times"></i> Eliminar</a>    
                                <?php } else { ?>
                                    <a href="<?=base_url('administrator/orders/delete?order_id='.$order->id)?>" target="_self" class="btn btn-danger pull-right btn-delete" data-message="Esta por eliminar la entrada. Desea continuar?" style="margin-right: 5px;"><i class="fa fa-times"></i> Eliminar</a>
                                <?php } ?>
                                <a href="<?=base_url('administrator/orders/edit?order_id='.$order->id)?>" target="_self" class="btn btn-warning pull-right" style="margin-right: 5px;"><i class="fa fa-pencil"></i> Editar</a>
                                <a href="<?=base_url('administrator/orders/report_detail?order_id='.$order->id)?>" target="_blank" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generar PDF</a>
                                <a href="<?=base_url('administrator/orders')?>" target="_self" class="btn btn-default pull-right" style="margin-right: 5px;">Ver todas las entradas</a>
                            </div>
                        </div>
                      	<!-- this row will not appear when printing -->
                      	<!--
                      	<div class="row no-print">
                        	<div class="col-xs-12">
                          		<button class="btn btn-primary pull-right" disabled style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
                        	</div>
                      	</div>
                      	-->
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>