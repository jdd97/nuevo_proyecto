
<!-- =============================================== -->
<body class="hold-transition sidebar-mini sidebar-collapse">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <b>Marcas</b>
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url(); ?>Marcas/add" class="btn btn-primary"><span class="fa fa-plus"></span> Agregar Marca</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre/Descripción</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php if(!empty($marcas)):?>
                                <?php foreach($marcas as $marca):?>
                            <tr>
                                <td><?php echo $marca->id_marca;?></td>
                                <td><?php echo $marca->descripcion_marca;?></td>
                                <td>
                                    <div class="btn-group">

                                        <a href="<?php echo base_url();?>Marcas/edit/<?php echo $marca->id_marca;?>"class="btn btn-warning"><span class="far fa-edit"></span></a>
                                        <a href="<?php echo base_url(); ?>Marcas/delete/<?php echo $marca->id_marca; ?>"class="btn btn-danger btn-remove"><span class="fas fa-trash-alt"></span></a>
                                    </div>
                                </td>
                            </tr>
                <?php endforeach; ?>
                <?php endif; ?>
                        </tbody>
                    </table>
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