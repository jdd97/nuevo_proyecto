
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Ventas
        <small>Nuevo</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        
                        <form action="<?php echo base_url();?>ventas/store" method="POST" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="">Comprobante:</label>
                                    <select name="tipo_comprobante" id="tipo_comprobante" class="form-control" required>
                                        <option value="">Seleccione...</option>
                                        <option value="">factura</option>
                                        <option value="">ticket</option>
                                    </select>
                                     <!--   	<?php foreach ($tipo_comprobante as $tipo_comprobante): ?>
                                       	<?php $datatipo_comprobante = $tipo_comprobante->id."*".$tipo_comprobante->cantidad."*".$tipo_comprobante->igv."*".$tipo_comprobante->serie; ?>
                                       		<option value="<?php echo $datatipo_comprobante; ?>"><?php echo $tipo_comprobante->nombre ?></option>
                                       	<?php endforeach; ?>
                                    </select> -->
                                    <input type="hidden" id="idtipo_comprobante" name="idtipo_comprobante">
                                    <input type="hidden" id="igv">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Serie:</label>
                                    <input type="text" class="form-control" id="serie" name="serie" readonly>
                                </div>
                               <!--  <div class="col-md-3">
                                    <label for="">Numero:</label>
                                    <input type="text" class="form-control" id="numero" name="numero" readonly>
                                </div>
                                  -->
                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="">Tipo Cliente:</label>
                             
                                    <select name="" id="" class="form-control">
                                        <?php foreach($tipo_cliente as $tipo_cliente): ?>
                                        <option value="<?php echo $tipo_cliente->id ?>"><?php echo $tipo_cliente->nombre ?></option>
                                        <?php endforeach; ?>
                                    </select>
                              
                                </div>

                                <div class="col-md-4">
                                    <label for="">Cliente:</label>
                                    <div class="input-group">
                                        <input type="hidden" name="id_cliente" id="id_cliente">
                                        <input type="text" class="form-control" disabled="disabled" id="id_cliente">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default" ><span class="fa fa-search"></span> Buscar</button>
                                        </span>
                                    </div><!-- /input-group -->
                                </div> 
                                
                                <div class="col-md-2">
                                    <label for="">Fecha:</label>
                                    <input type="date" class="form-control" name="fecha" required>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <label for="">Incluir IGV</label>
                                       
                                        <select name="" id="igv_select" class="form-control">
                                            <option value="none">Seleccionar</option>
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="">Producto:</label>
                                    <input type="text" class="form-control" id="id_producto">
                                </div>
                                <div class="col-md-2">
                                    <label for="">&nbsp;</label>
                                    <button id="btn-agregar" type="button" class="btn btn-success btn-flat btn-block"><span class="fa fa-plus"></span> Agregar</button>
                                </div>
                            </div>
                            <table id="tbventas" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th>Stock Minimo</th>
                                        <th>Cantidad</th>
                                        <th>Importe (S/. Nuevo sol)</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                </tbody>
                            </table>

                            <div class="form-group">
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">Subtotal:</span>
                                        <input type="text" class="form-control" placeholder="Subtotal" name="subtotal" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">IGV:</span>
                                        <input type="text" class="form-control" placeholder="IGV" name="igv" readonly="readonly">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">Descuento:</span>
                                        <input type="text" class="form-control" placeholder="Descuento" name="descuento" value="0.00" >
                                    </div>
                                </div> 
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">Total:</span>
                                        <input type="text" class="form-control" placeholder="Total" name="total" readonly="readonly">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success btn-flat btn-venta">Guardar</button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Lita de Clientes</h4>
            </div>
            <div class="modal-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Opcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($clientes)):?>
                            <?php foreach($clientes as $cliente):?>
                                <tr>
                                    <td><?php echo $cliente->id;?></td>
                                    <td><?php echo $cliente->nombre;?></td>
                                
                                    <td><?php echo $cliente->nrodocumento_cliente;?></td>
                              
                                    <?php $datacliente = $cliente->id."*".$cliente->nombre."*".$cliente->tipocliente."*".$cliente->tipodocumento."*".$cliente->nrodocumento_cliente."*".$cliente->telefono."*".$cliente->direccion;?>
                                    <td>
                                        <button type="button" class="btn btn-success btn-check" value="<?php echo $datacliente; ?>"><span class="fa fa-check"></span></button>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
