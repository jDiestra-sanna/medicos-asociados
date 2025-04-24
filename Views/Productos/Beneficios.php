<?php encabezado() ?>
<!-- <?php var_dump($_GET["listBeneficios"]->data[0]); ?> -->
<!-- <?php var_dump($_GET['msg']); ?> -->
<!-- <?php var_dump($_GET['data']); ?> -->
<!-- <?php var_dump(json_encode($data)); ?> -->

<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-12 m-auto">

                    <form method="post" action="/Productos/beneficioInserta?producto=<?php echo $_GET['producto'] ?>&empresa=<?php echo $_GET['empresa'] ?>" autocomplete="off" class="confirmar">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-primary">
                                <li class="breadcrumb-item"><a href="/Productos/detalle?id=<?php echo $_GET["id_prodcap_cabecera"]; ?>">DETALLE PRODUCTO</a></li>
                                <li class="offset-4"><h6 class="title text-white text-center"> LISTA DE BENEFICIOS</h6></li>
                            </ol>
                        </nav>
                        <div class="modal-body">
                            <input type="hidden" id="id" name="id" value="">
                            <input type="hidden" name="id_prodcap_detalle" value="<?php echo $_GET['id']; ?>">
                            <input type="hidden" name="id_prodcap_cabecera" value="<?php echo $_GET['id_prodcap_cabecera']; ?>">
                            <input type="hidden" name="producto" value="<?php echo $_GET['producto']; ?>">
                            <input type="hidden" name="empresa" value="<?php echo $_GET['empresa']; ?>">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="nombre">Producto</label>
                                    <input id="nombre" class="form-control" disabled readonly type="text" name="nombre" value="<?php echo $_GET['producto']; ?>">
                                </div>
                                <div class="col-lg-6">
                                    <label for="nombre">Empresa</label>
                                    <input id="nombre" class="form-control" disabled readonly type="text" name="nombre" value="<?php echo $_GET['empresa']; ?>">
                                </div>                                                
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="id_beneficio">Beneficio</label>
                                    <select id="id_beneficio" class="form-control" name="id_beneficio">
                                        <?php foreach ($_GET["listBeneficios"]->data as $cl) { ?>
                                            <option value="<?php echo $cl->id; ?>"><?php echo $cl->nombre; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <label for="nro_veces">Nro. veces</label>
                                    <input id="nro_veces" class="form-control" type="number" min="1" step="1" name="nro_veces" value="0">
                                </div>
                                <div class="col-lg-2">
                                    <label for="copago">Copago</label>
                                    <input id="copago" class="form-control" type="number" min="0.00" step="0.01" name="copago" value="0">
                                </div>
                                <div class="col-lg-2">
                                    <label for="nombre">Aplica delivery</label><br/>
                                    <div class="form-check-inline">
                                        <label class="form-check-label" for="aplica_delivery">
                                            <input type="radio" class="form-check-input" id="aplica_delivery1" name="aplica_delivery" value="1" checked>Si
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label" for="aplica_delivery">
                                        <input type="radio" class="form-check-input" id="aplica_delivery2" name="aplica_delivery" value="0" checked>No
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label for="nombre">Aplica Laboratorio</label><br/>
                                    <div class="form-check-inline">
                                        <label class="form-check-label" for="aplica_laboratorio">
                                            <input type="radio" class="form-check-input" id="aplica_laboratorio1" name="aplica_laboratorio" value="1" checked>Si
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label" for="aplica_laboratorio">
                                        <input type="radio" class="form-check-input" id="aplica_laboratorio2" name="aplica_laboratorio" value="0" checked>No
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Agregar/Actualizar</button>
                            <a href="/Productos/detalle?id=<?php echo $_GET["id_prodcap_cabecera"]; ?>" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>

                            <?php if (isset($_GET['msg'])) {
                                if(!empty($_GET['msg'])){
                                    ?>
                                    <div class="alert alert-warning" role="alert">
                                    <?php
                                        $alert = json_decode($_GET['msg']);                                        
                                        foreach($alert as $valor){
                                        ?>
                                        <strong><?php echo $valor; ?></strong><br/>
                                    <?php 
                                        }
                                    ?>
                                    </div>
                                    <?php
                                }
                            } ?>
                        </div>
                    </form>

                    <div class="row">
                        <div class="table-responsive mt-4">
                            <table class="table table-hover table-bordered" id="Table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th hidden></th>
                                        <th>Beneficio</th>
                                        <th>Nro veces</th>
                                        <th>Copago</th>
                                        <th>Delivery</th>
                                        <th>Laboratorio</th>
                                        <th>Acción</th>
                                        <th hidden></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if($data && $data->success && count($data->data)>0) 
                                        { 
                                            foreach ($data->data as $cl) { ?>
                                            <tr>
                                                <td hidden><?php echo $cl->id; ?></td>
                                                <td><?php echo $cl->beneficio; ?></td>
                                                <td><?php echo $cl->nro_veces; ?></td>
                                                <td><?php echo $cl->copago; ?></td>
                                                <td><?php echo $cl->aplica_delivery?'SI':'NO'; ?></td>
                                                <td><?php echo $cl->aplica_laboratorio?'SI':'NO'; ?></td>
                                                <td>
                                                    <div class="form-group form-check-inline">  
                                                        <button id="detalle<?php echo $cl->id; ?>" class="btn btn-primary offset-1" type="button" onclick="showRow(<?php echo $cl->id; ?>)"><i class="fas fa-edit"></i></button>
                                                        &nbsp
                                                        <?php if($cl->activo){
                                                        ?>
                                                        <form action="<?php echo base_url() ?>Productos/beneficiosinactivar?id=<?php echo $cl->id; ?>&id_detalle=<?php echo $_GET['id']; ?>&id_prodcap_cabecera=<?php echo $_GET["id_prodcap_cabecera"]; ?>" method="post" class="d-inline elim">
                                                            <input type="hidden" name="producto" value="<?php echo $_GET['producto']; ?>">
                                                            <input type="hidden" name="empresa" value="<?php echo $_GET['empresa']; ?>">
                                                            <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="INACTIVAR"><i class="fas fa-minus-circle" title="Inactivo"></i></button>
                                                        </form>
                                                        <?php
                                                        } 
                                                        else{
                                                            ?>
                                                            <button type="button" class="btn btn-danger disabled" data-toggle="tooltip" data-placement="top" title="INACTIVADO"><i class="fas fa-minus-circle"></i></button>
                                                            <?php
                                                        }?>
                                                        &nbsp
                                                        <form action="<?php echo base_url() ?>Productos/beneficioseliminar?id=<?php echo $cl->id; ?>&id_detalle=<?php echo $_GET['id']; ?>&id_prodcap_cabecera=<?php echo $_GET["id_prodcap_cabecera"]; ?>" method="post" class="d-inline elim">
                                                            <input type="hidden" name="producto" value="<?php echo $_GET['producto']; ?>">
                                                            <input type="hidden" name="empresa" value="<?php echo $_GET['empresa']; ?>">
                                                            <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="ELIMINAR"><i class="fas fa-trash-alt"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td hidden><?php echo $cl->id_beneficio; ?></td>
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
        </div>
    </section>
</div>
<?php pie() ?>

<script>
    function showRow(id) {
        let myTab = document.getElementById('Table');
        for (i = 1; i < myTab.rows.length; i++) {
            if(id == myTab.rows.item(i).cells.item(0).innerText){
                debugger;
                $('#id').val(id);
                $('#id_beneficio').val(myTab.rows.item(i).cells.item(7).innerHTML);
                $('#nro_veces').val(myTab.rows.item(i).cells.item(2).innerHTML);
                $('#copago').val(myTab.rows.item(i).cells.item(3).innerHTML);
                
                if( myTab.rows.item(i).cells.item(4).innerHTML=='SI' )
                    $('#aplica_delivery1').prop('checked', true);
                else
                    $('#aplica_delivery2').prop('checked', true);
                if( myTab.rows.item(i).cells.item(5).innerHTML=='SI' )
                    $('#aplica_laboratorio1').prop('checked', true);
                else
                    $('#aplica_laboratorio2').prop('checked', true);

                // var objCells = myTab.rows.item(i).cells;
                // for (var j = 0; j < objCells.length; j++) {
                //     console.log(objCells.item(j).innerHTML);
                // }
            }
        }
    };
</script>