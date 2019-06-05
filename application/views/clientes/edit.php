
<!-- =============================================== -->
<body class="hold-transition sidebar-mini sidebar-collapse">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Clientes
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
                        <form action="<?php echo base_url();?>clientes/update" method="post">

                        <input type="hidden" name="id_cliente"value="<?php echo $clientes->id_cliente;?>">
                    
                    <div class="form-group ">
                        <label for="nombre">Razon Social:</label>

                        <input type="text" class="form-control"id="cliente" name="razonsocial_cliente" value="<?php echo $clientes->razonsocial_cliente;?>">
                         </div>
                         <div class="form-group ">
                        <label for="nombre">Nro Documento:</label>

                        <input type="text" class="form-control"id="cliente" name="nrodocumento_cliente" value="<?php echo $clientes->nrodocumento_cliente;?>">
                        </div>
                         <div class="form-group ">
                         <label for="nombre">Direccion:</label>

                        <input type="text" class="form-control"id="cliente" name="direccion_cliente" value="<?php echo $clientes->direccion_cliente;?>">
                        </div>
                        <div class="form-group ">
                         <label for="nombre">telefono:</label>

                        <input type="text" class="form-control"id="cliente" name="telefono_cliente" value="<?php echo $clientes->telefono_cliente;?>">
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