
<!-- =============================================== -->
<body class="hold-transition sidebar-mini sidebar-collapse">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Productos
        <small>Editar</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                    <?php if($this->session->flashdata("error")): ?>
                <div class="alert alert-danger alert-dismissible">
                <p><?php echo $this->session->flashdata("error");?></p>
                </div>
            <?php endif; ?>
                        <form action="<?php echo base_url();?>Productos/update" method="post">

                        <input type="hidden" name="id_producto"value="<?php echo $productos->id_producto;?>">
                    
                    <div class="form-group ">
                        <label for="nombre">Detalle:</label>

                        <input type="text" class="form-control"id="producto" name="detalle_producto" value="<?php echo $productos->detalle_producto;?>">
                    </div>
                     <div class="form-group ">
                        <label for="nombre">Codigo Producto:</label>

                        <input type="text" class="form-control"id="producto" name="cod_producto" value="<?php echo $productos->cod_producto;?>">
                    </div>
                     <div class="form-group ">
                        <label for="nombre">Precio Compra:</label>

                        <input type="text" class="form-control"id="producto" name="precio_compra" value="<?php echo $productos->precio_compra;?>">
                    </div>
                     <div class="form-group ">
                        <label for="nombre">Precio Venta:</label>

                        <input type="text" class="form-control"id="producto" name="precio_venta" value="<?php echo $productos->precio_venta;?>">
                    </div>
                     <div class="form-group ">
                        <label for="nombre">Stock:</label>

                        <input type="text" class="form-control"id="producto" name="stock" value="<?php echo $productos->stock;?>">
                    </div>
                     <div class="form-group ">
                        <label for="nombre">Stock Minimo:</label>

                        <input type="text" class="form-control"id="producto" name="stock_minimo" value="<?php echo $productos->stock_minimo;?>">
                    </div>
                    
                     <div class="form-group">
                    <label for="Categoria">Categoria:</label>
                    <select name="id_categoria" id="id_categoria" value="<?php echo $productos->id_categoria;?>" class="form-control">
                     
                        <?php foreach ($categorias as  $categoria):?> 
                            <option value="<?php echo $categoria->id_categoria;?>"><?php echo $categoria->descripcion_categoria;?></option>
                            <?php endforeach;?>

                    </select>
                  </div>
                    <div class="form-group">
                                <button type="submit" class="btn btn-success"><span class="fa fa-save"></span>
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