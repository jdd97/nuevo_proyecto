
<!-- =============================================== -->
<body class="hold-transition sidebar-mini sidebar-collapse">
<!-- Content Wrapper. Contains page content -->   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Clientes
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
                        <form action="<?php echo base_url(); ?>Clientes/store" method="post">
                        <div class="form-group ">

                        <label for="razonsocial_cliente">Razon Social:</label>
                        <input type="text" class="form-control"id="razonsocial_cliente" name="razonsocial_cliente" value="">
                        </div>
                         <form action="<?php echo base_url(); ?>Clientes/store" method="post">
                        <div class="form-group ">

                        <label for="nrodocumento_cliente">Nro documento:</label>
                        <input type="text" class="form-control"id="nrodocumento_cliente" name="nrodocumento_cliente" value="">
                        </div>
                         
                         <div class="form-group ">

                        <label for="direccion_cliente">Direccion:</label>
                        <input type="text" class="form-control"id="direccion_cliente" name="direccion_cliente" value="">
                        </div>
                         <div class="form-group ">

                        <label for="telefono_cliente">Telefono:</label>
                        <input type="text" class="form-control"id="telefono_cliente" name="telefono_cliente" value="">
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
