<?php encabezado() ?>
<!-- <?php var_dump($data); ?> -->

<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#nuevo_producto"><i class="fas fa-plus-circle"></i> Nuevo</button>
                            <!-- <a class="btn btn-danger" href="/Clientes/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a> -->
                        </div>
                        <div class="col-lg-6">
                            <?php if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if(!empty($alert)){
                                    { ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong><?php echo $alert; ?></strong>
                                    </div>
                                    <?php }
                                }
                            } ?>
                        </div>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Precio regular</th>
                                    <th>Activo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if($data && $data->success && count($data->data)>0) 
                                    { 
                                        foreach ($data->data as $cl) { ?>
                                        <tr>
                                            <td><?php echo $cl->nombre; ?></td>
                                            <td><?php echo $cl->descripcion; ?></td>
                                            <td><?php echo $cl->precio_regular; ?></td>
                                            <td><?php echo $cl->activo?"Activo":"Inactivo"; ?></td>
                                            <td>
                                                <a href="<?php echo base_url() ?>Beneficios/editar?id=<?php echo $cl->id; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                <?php if($cl->activo){
                                                ?>
                                                <form action="<?php echo base_url() ?>Beneficios/eliminar?id=<?php echo $cl->id; ?>" method="post" class="d-inline elim">
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                                <?php
                                                } 
                                                else{
                                                    ?>
                                                    <a href="#" class="btn btn-primary disabled"><i class="fas fa-trash-alt"></i></a>
                                                    <?php
                                                }?>

                                            </td>
                                        </tr>
                                <?php 
                                        } 
                                    } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div id="nuevo_producto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Nuevo Producto Capitado</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/Beneficios/insertar" autocomplete="off">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripción">
                    </div>
                    <div class="form-group">
                        <label for="precio_regular">Precio regular</label>
                        <input id="precio_regular" class="form-control" type="number" min="1.00" step="0.01" name="precio_regular" value="">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Registrar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>



<?php pie() ?>