<body class="hold-transition sidebar-mini sidebar-collapse">
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <b>Categorias</b>
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
                        <a href="<?php echo base_url(); ?>Categorias/add" class="btn btn-primary"><span class="fa fa-plus"></span> Agregar Categoria</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Descripción</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php if(!empty($categorias)):?>
                                <?php foreach($categorias as $categoria):?>
                            <tr>
                                <td><?php echo $categoria->id_categoria;?></td>
                                <td><?php echo $categoria->descripcion_categoria;?></td>
                                <td>
                                    <div class="btn-group">

                                        <a href="<?php echo base_url();?>Categorias/edit/<?php echo $categoria->id_categoria;?>"class="btn btn-warning"><span class="far fa-edit"></span></a>
                                        <a href="<?php echo base_url(); ?>Categorias/delete/<?php echo $categoria->id_categoria; ?>"class="btn btn-danger btn-remove"><span class="fas fa-trash-alt"></span></a>
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
<div class="modal modal-info" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Informacion de Categorias</h4>
              </div>
              <div class="modal-body">
            <!-- /.recibe datos del controlador y el metodo view-->    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info pull-right" data-dismiss="modal">Cerrar</button>
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

</body>