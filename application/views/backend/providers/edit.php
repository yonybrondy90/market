<section class="content">
      <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Editar Proveedor</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
             </div>
        </div>
        <?php if ($this->session->flashdata("success")): ?>
            <script>
                swal("Exito", "<?php echo $this->session->flashdata("success") ;?>", "success");
            </script>
        <?php endif ?>
        <?php echo form_open('backend/providers/update', "enctype=multipart/form-data"); ?>
        <input type="hidden" name="provider_id" value="<?php echo $provider->id?>">
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group <?php echo form_error('name') == true ? 'has-error' : '' ?>">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre de la categoria" required="required" value="<?php echo set_value('name')?:$provider->name; ?>">
                        <?php echo form_error('name'); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                    <a href="<?php echo base_url(); ?>providers" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</a>
                </div>
            </div>
        </div>
        </form>
        <!-- /.box-footer-->
    </div>
      <!-- /.box -->

</section>