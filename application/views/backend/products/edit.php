<section class="content">
      <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Editar Producto</h3>

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
        <?php echo form_open('backend/products/update', "enctype=multipart/form-data"); ?>
        <div class="box-body">
            <div class="row">
                <input type="hidden" name="product_id" value="<?php echo $product->id ?>">
                <div class="col-md-5">
                    <div class="form-group <?php echo form_error('name') == true ? 'has-error' : '' ?>">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre de la Categoria" required="required" value="<?php echo set_value('name')?:$product->name; ?>">
                        <?php echo form_error('name'); ?>
                    </div>
                    <div class="form-group">
                        <label for="minimum_stock">Precio</label>
                        <input type="text" name="price" id="price" placeholder="Precio" required="required" class="form-control" value="<?php echo set_value('price') ? : $product->price; ?>">
                    </div>
                    <div class="form-group">
                        <label for="minimum_stock">Stock minimo</label>
                        <input type="text" name="minimum_stock" id="minimum_stock" placeholder="Stock minimo" required="required" class="form-control" value="<?php echo set_value('minimum_stock') ? : $product->minimum_stock; ?>">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="">Categoria</label>
                        <select name="category_id" id="category_id" class="form-control" required="required">
                            <option value="">Seleccione</option>
                            <?php foreach ($categories as $category): ?>
                                <?php 
                                    $selected = "";
                                    if ($product->category_id == $category->id) {
                                        $selected = "selected";
                                    }
                                ?>
                                <option value="<?php echo $category->id ?>" <?php echo $selected; ?>><?php echo $category->name ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Proveedor</label>
                        <select name="provider_id" id="provider_id" class="form-control" required="required">
                            <option value="">Seleccione</option>
                            <?php foreach ($providers as $provider): ?>
                                <?php 
                                    $selected = "";
                                    if ($product->provider_id == $provider->id) {
                                        $selected = "selected";
                                    }
                                ?>
                                <option value="<?php echo $provider->id ?>" <?php echo $selected; ?>><?php echo $provider->name ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Imagen</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">Imagen Actual</label>
                        <img src="<?php echo base_url(); ?>assets/backend/images/products/<?php echo $product->image; ?>" alt="<?php echo $product->name ?>" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                    <a href="<?php echo base_url(); ?>backend/products" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</a>
                </div>
            </div>
           
        </div>
        </form>
        <!-- /.box-footer-->
    </div>
      <!-- /.box -->

</section>