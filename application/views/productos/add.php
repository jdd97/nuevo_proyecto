
<!-- =============================================== -->
<body class="hold-transition sidebar-mini sidebar-collapse">
<!-- Content Wrapper. Contains page content -->   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Productos
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
                        <form action="<?php echo base_url(); ?>Productos/store" method="post">
                        <div class="form-group ">

                        <label for="detalle_producto">Detalle Producto:</label>
                        <input type="text" class="form-control"id="detalle_producto" name="detalle_producto" value="">
                        </div>
                        <div class="form-group ">

                        <label for="cod_producto">Codigo Producto:</label>
                        <input type="text" class="form-control"id="cod_producto" name="cod_producto" value="">
                        </div>
                        <div class="form-group ">

                        <label for="precio_compra">Precio Compra:</label>
                        <input type="text" class="form-control"id="precio_compra" name="precio_compra" value="">
                        </div>
                        <div class="form-group ">

                        <label for="precio_venta">Precio Venta:</label>
                        <input type="text" class="form-control"id="precio_venta" name="precio_venta" value="">
                        </div>
                        <div class="form-group ">

                        <label for="stock">Stock:</label>
                        <input type="text" class="form-control"id="stock" name="stock" value="">
                        </div>
                        <div class="form-group ">

                        <label for="stock_minimo">Stock Minimo:</label>
                        <input type="text" class="form-control"id="stock_minimo" name="stock_minimo" value="">
                        </div>
                    <div class="form-group">
                    <label for="Categoria">Categoria:</label>
                    <select name="id_categoria" id="categoria" class="form-control">
                      <option>selecione</option>
                        <?php foreach ($categorias as  $categoria):?> 
                            <option value="<?php echo $categoria->id_categoria;?>"><?php echo $categoria->descripcion_categoria;?></option>
                            <?php endforeach;?>

                    </select>
                  </div>
                  <div class="form-group">
                    <label for="Categoria">Marcas:</label>
                    <select name="id_marca" id="marca" class="form-control">
                      <option>selecione</option>
                        <?php foreach ($marcas as  $marca):?> 
                            <option value="<?php echo $marca->id_marca;?>"><?php echo $marca->descripcion_marca;?></option>
                            <?php endforeach;?>

                    </select>
                  </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                            Guardar
                            </button>
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
</body>
