
<!-- =============================================== -->
<body class="hold-transition sidebar-mini sidebar-collapse">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Categorías
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
                        <form action="<?php echo base_url();?>categorias/update" method="post">

                        <input type="hidden" name="id_categoria"value="<?php echo $categorias->id_categoria;?>">
                    
                    <div class="form-group ">
                        <label for="nombre">Descripción:</label>

                        <input type="text" class="form-control"id="categoria" name="descripcion_categoria" value="<?php echo $categorias->descripcion_categoria;?>">
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