
<!-- =============================================== -->
<body class="hold-transition sidebar-mini sidebar-collapse">
<!-- Content Wrapper. Contains page content -->   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Categorías
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
                        <form action="<?php echo base_url(); ?>Categorias/store" method="post">
                        <div class="form-group ">

                        <label for="descripcion_categoria">Descripcion:</label>
                        <input type="text" class="form-control"id="descripcion_categoria" name="descripcion_categoria" value="">
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
