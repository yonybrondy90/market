<section class="content">
      <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Lista de Productos</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
             </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                        <span class="fa fa-upload"></span> Importar Data
                    </button>
                    <a href="<?php echo base_url(); ?>backend/products/add" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Producto</a>
                </div>
            </div>
            <!-- /.row -->
            <?php if ($this->session->flashdata("success")): ?>
                <script>
                    swal("Exito", "<?php echo $this->session->flashdata("success") ;?>", "success");
                </script>
            <?php endif ?>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <table id="tb-without-buttons" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Stock Minimo</th>
                                <th>Categoria</th>
                                <th>Proveedor</th>
                                <th>Estado</th>
                                <th width="10">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($products): ?>
                            <?php $i = 1;?>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $product->name; ?></td>
                                    <td><?php echo $product->price; ?></td>
                                    <td><?php echo $product->stock; ?></td>
                                    <td><?php echo $product->minimum_stock; ?></td>
                                    <td><?php echo get_record('categories','id='.$product->category_id)->name; ?></td>
                                    <td><?php echo get_record('providers','id='.$product->provider_id)->name; ?></td>
                                    <td><?php echo $product->status; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>backend/products/edit/<?php echo $product->id; ?>" class="btn btn-warning btn-flat" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
                                    </td>
                                </tr>
                                <?php $i++;?>
                            <?php endforeach;?>
                        <?php endif;?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
    </div>
      <!-- /.box -->
</section>

<div class="modal modal-importar fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Importar Productos</h4>
            </div>
            <form action="<?php echo base_url() ?>backend/products/import" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Archivo</label>
                        <input type="file" name="file" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Cargar</button>

                </div>
            </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>