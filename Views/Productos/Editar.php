<?php encabezado() ?>
<!-- <?php var_dump($_GET['msg']); ?> -->

<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="/Productos/actualizar" autocomplete="off">
                        <div class="card-header bg-primary">
                            <h6 class="title text-white text-center"><i class="fas fa-user-edit"></i> Modificar producto capitado</h6>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="<?php echo $data->data->id; ?>">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input id="nombre" class="form-control" type="text" name="nombre" value="<?php echo $data->data->nombre; ?>">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <input id="descripcion" class="form-control" type="text" name="descripcion" value="<?php echo $data->data->descripcion; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Modificar</button>
                            <a href="/Productos/Listar" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>