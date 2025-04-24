<?php encabezado() ?>
<!-- <?php var_dump(json_encode($data)); ?> -->

<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <form method="post" action="/Productos/Listar" autocomplete="off">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-primary">
                                <li class="offset-5"><h6 class="title text-white text-center"> LISTA DE PRODUCTOS</h6></li>
                            </ol>
                        </nav>
                        <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="estado">Estado</label>
                                        <select id="estado" class="form-control" name="estado">
                                            <option value="0">Todos</option>
                                            <option value="1">Sólo activos</option>
                                            <option value="2">Sólo inactivos</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="fecha_inicio">Fecha Inicio</label>
                                        <div class="input-group">
                                            <input class="form-control border-right-0 border fechas" required type="date" id="fecha_inicio" name="fecha_inicio">
                                            <span class="input-group-append">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="fecha_fin">Fecha Fin</label>
                                        <div class="input-group">
                                            <input class="form-control border-right-0 border fechas" required type="date" id="fecha_fin" name="fecha_fin">
                                            <span class="input-group-append">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="card-footer">
                            <div class="col-lg-6 mb-2">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Buscar</button>
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#nuevo_producto"><i class="fas fa-plus-circle"></i> Nuevo producto capitado</button>
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
                    </form>
                    <div class="table-responsive mt-4">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Activo</th>
                                    <th>Empresas</th>
                                    <th>Inicio</th>
                                    <th>Fin</th>
                                    <th>Venta total</th>
                                    <th>Costo <br/>operativo</th>
                                    <th>Rentabilidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if($data && $data->success && count($data->data)>0) 
                                    { 
                                        foreach ($data->data as $cl) {
                                            ?>
                                        <tr>
                                            <td><?php echo $cl->nombre; ?></td>
                                            <td><?php echo $cl->descripcion; ?></td>
                                            <td><?php echo $cl->activo?"Activo":"Inactivo"; ?></td>
                                            <!-- <td><?php //echo count($cl->items); ?></td> -->
                                            <td><?php echo $cl->total_empresas; ?></td>
                                            <td><?php echo $cl->fecha_inicio; ?></td>
                                            <td><?php echo $cl->fecha_fin; ?></td>
                                            <!-- <td style="text-align:center;"><?php //echo number_format($ventas_totales, 2, '.', ','); ?></td> 
                                            <td style="text-align:center;"><?php //echo number_format($costo_operativo, 2, '.', ','); ?></td>
                                            <td style="text-align:center;"><?php //echo number_format($ventas_totales - $costo_operativo, 2, '.', ','); ?></td>
                                        -->
                                            <td style="text-align:center;"><?php echo number_format($cl->total_venta, 2, '.', ','); ?></td>
                                            <td style="text-align:center;"><?php echo number_format($cl->total_gasto, 2, '.', ','); ?></td>
                                            <td style="text-align:center;"><?php echo number_format($cl->total_rentabilidad, 2, '.', ','); ?></td>
                                            
                                            <td>
                                                <a href="<?php echo base_url() ?>Productos/editar?id=<?php echo $cl->idcabecera; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                <?php if($cl->activo){
                                                ?>
                                                <form action="<?php echo base_url() ?>Productos/eliminar?id=<?php echo $cl->idcabecera; ?>" method="post" class="d-inline elim">
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                                <?php
                                                } 
                                                else{
                                                    ?>
                                                    <a href="#" class="btn btn-primary disabled"><i class="fas fa-trash-alt"></i></a>
                                                    <?php
                                                }?>

                                                <?php if($cl->activo){
                                                ?>
                                                <a href="<?php echo base_url() ?>Productos/detalle?id=<?php echo $cl->idcabecera; ?>" class="btn btn-primary"><i class="far fa-eye"></i></a>
                                                <!-- <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#asigna_producto"><i class="fas fa-plus-circle"></i></button>
                                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#asigna_producto"><i class="far fa-eye"></i></button> -->
                                                <?php
                                                } 
                                                ?>
                                            </td>
                                        </tr>
                                <?php 
                                        } 
                                    } ?>
                            </tbody>
                            <tfoot align="right">
                                <tr>
                                    <th id="foot0" colspan="6"></th>
                                    <th id="foot4"></th>
                                    <th id="foot5"></th>
                                    <th id="foot6"></th>
                                    <th></th>
                                </tr>
                            </tfoot>
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
            <form method="post" action="/Productos/insertar" autocomplete="off">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripción">
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

<div id="asigna_producto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Asignar Producto Capitado</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/Productos/insertar" autocomplete="off">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripción">
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

<script>
    $(document).ready(function() {
        var finalfoot4 = 0;var finalfoot5 = 0;var finalfoot6 = 0;
        let tabla = $("#Table");
        $('#foot0').text('TOTALES S/.');
        $("#Table tr").each(function(){
            let currentRow=$(this);
            let foot4 = currentRow.find("td:eq(6)").text();
            let foot5 = currentRow.find("td:eq(7)").text();
            let foot6 = currentRow.find("td:eq(8)").text();
            foot4 = foot4.replace(",", "");
            foot5 = foot5.replace(",", "");
            foot6 = foot6.replace(",", "");
            if( !isNaN(parseFloat(foot4) ) ){
                finalfoot4 += parseFloat(foot4);
            }
            if( !isNaN(parseFloat(foot5) ) ){
                finalfoot5 += parseFloat(foot5);
            }
            if( !isNaN(parseFloat(foot6) ) ){
                finalfoot6 += parseFloat(foot6);
            }
        });
        
        $('#foot4').text(finalfoot4.toFixed(2));
        $('#foot5').text(finalfoot5.toFixed(2));
        $('#foot6').text(finalfoot6.toFixed(2));
    } );
</script>