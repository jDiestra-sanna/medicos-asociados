<?php encabezado() ?>
<!-- <?php var_dump($_GET['listEmpresas']); ?> -->
<!-- <?php var_dump($_GET['msg']); ?> -->
<!-- <?php var_dump(json_encode($data)); ?> -->

<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-12 m-auto">

                    <form method="post" action="/Productos/actualizaDetalle" autocomplete="off" class="confirmar">
                    
                        <!-- <div class="card-header bg-dark">
                            <h6 class="title text-white text-center"><i class="fas fa-user-edit"></i> Detalle Producto</46>
                        </div> -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-primary">
                                <li class="breadcrumb-item"><a href="/Productos/Listar">LISTADO PRODUCTOS</a></li>
                                <li class="offset-4"><h6 class="title text-white text-center"> EMPRESAS DEL PRODUCTO</h6></li>
                            </ol>
                        </nav>
                        <div class="modal-body">
                            <input type="hidden" name="id_prodcap_cabecera" value="<?php echo $data->data->id; ?>">
                            <input type="hidden" name="id" id="id">
                            <div class="row">
                                <div class="col-lg-2">
                                    <label for="nombre">Nombre</label>
                                    <input id="nombre" class="form-control" disabled readonly type="text" name="nombre" value="<?php echo $data->data->nombre; ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="id_empresa">Empresa</label>
                                    <select id="id_empresa" class="form-control" name="id_empresa">
                                        <?php foreach ($_GET["listEmpresas"] as $cl) { ?>
                                            <option value="<?php echo $cl->cod_gru; ?>"><?php echo $cl->nom_gru; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <label for="fecha_inicio">Fecha Inicio</label>
                                    <div class="input-group">
                                        <input class="form-control border-right-0 border fechas" type="date" id="fecha_inicio" name="fecha_inicio">
                                        <span class="input-group-append">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label for="fecha_fin">Fecha Fin</label>
                                    <div class="input-group">
                                        <input class="form-control border-right-0 border fechas" type="date" id="fecha_fin" name="fecha_fin">
                                        <span class="input-group-append">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label for="nombre">Permanencia (días)</label>
                                    <input id="tiempo_permanencia" class="form-control" type="number" name="tiempo_permanencia" value="" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-1">
                                    <label for="nombre">Cant. Afiliados</label>
                                    <!-- <input class="form-control" disabled readonly type="number" value="<?php echo count($data->data->items); ?>"> -->
                                    <input class="form-control" disabled readonly type="number" id="nro_beneficiarios" name="nro_beneficiarios" value="0">
                                </div>
                                <div class="col-lg-1 offset-lg-1">
                                    <label for="nombre">Edad desde</label>
                                    <input id="edad_desde" class="form-control" type="number" min="1" onkeydown="if(event.key==='.'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');" step="1" name="edad_desde" value="">
                                </div>
                                <div class="col-lg-1">
                                    <label for="nombre">Edad hasta</label>
                                    <input id="edad_hasta" class="form-control" type="number" min="1" onkeydown="if(event.key==='.'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');" step="1" name="edad_hasta" value="">
                                </div>
                                <div class="col-lg-1">
                                    <label for="nombre">¿Tiene contrato?</label><br/>
                                    <div class="form-check-inline">
                                        <label class="form-check-label" for="tiene_contrato1">
                                            <input type="radio" class="form-check-input" id="tiene_contrato1" name="tiene_contrato" value="1" checked>Si
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label" for="tiene_contrato2">
                                            <input type="radio" class="form-check-input" id="tiene_contrato2" name="tiene_contrato" value="0">No
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label for="limite_credito">Línea crédito (días)</label>
                                    <input id="limite_credito" class="form-control" type="number" min="1" step="1" name="limite_credito" value="">
                                </div>
                                <div class="col-lg-2">
                                    <label for="tarifa_total">Tarifa total (soles)</label>
                                    <input id="tarifa_total" class="form-control" type="number" min="1.00" step="0.01" name="tarifa_total" value="">
                                </div>
                                <div class="col-lg-2">
                                    <label for="nombre">Atenciones para</label><br/>
                                    <div class="form-check-inline">
                                        <label class="form-check-label" for="atenciones_para">
                                            <input type="checkbox" class="form-check-input" id="atenciones_para1" name="atenciones_para[]" value="Lima">Lima
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label" for="atenciones_para">
                                        <input type="checkbox" class="form-check-input" id="atenciones_para2" name="atenciones_para[]" value="Provincia">Provincia
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Grabar</button>
                            <a href="/Productos/Listar" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>

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
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Fin</th>
                                        <th>Tiempo permanencia</th>
                                        <th>Empresa</th>
                                        <th>Tiene contrato</th>
                                        <th>Límite crédito</th>
                                        <th>Tarifa total</th>
                                        <th>Atenciones para</th>
                                        <th>Edad desde</th>
                                        <th>Edad hasta</th>
                                        <th>Acción</th>
                                        <th hidden></th>
                                        <th hidden></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if($data && $data->success && count($data->data->items)>0) 
                                        { 
                                            foreach ($data->data->items as $cl) { ?>
                                            <tr>
                                                <td hidden><?php echo $cl->id; ?></td>
                                                <td><?php echo $cl->fecha_inicio; ?></td>
                                                <td><?php echo $cl->fecha_fin; ?></td>
                                                <td><?php echo $cl->tiempo_permanencia; ?></td>
                                                <td><?php echo $cl->empresa; ?></td>
                                                <td><?php echo $cl->tiene_contrato?'SI':'NO'; ?></td>
                                                <td><?php echo $cl->limite_credito; ?></td>
                                                <td><?php echo $cl->tarifa_total; ?></td>
                                                <td><?php echo $cl->atenciones_para; ?></td>
                                                <td><?php echo $cl->edad_desde; ?></td>
                                                <td><?php echo $cl->edad_hasta; ?></td>
                                                <td>
                                                    <div class="form-group form-check-inline">
                                                    <button id="detalle<?php echo $cl->id; ?>" class="btn btn-primary" type="button" onclick="showRow(<?php echo $cl->id; ?>)"><i class="fas fa-edit"></i></button>
                                                    <a href="<?php echo base_url() ?>Productos/Empleados?id=<?php echo $cl->id; ?>&id_prodcap_cabecera=<?php echo $_GET["id"]; ?>&producto=<?php echo $data->data->nombre ?>&empresa=<?php echo $cl->empresa ?>" class="btn btn-primary"><i class="fas fa-users"></i></a>
                                                    <a href="<?php echo base_url() ?>Productos/Beneficios?id=<?php echo $cl->id; ?>&id_prodcap_cabecera=<?php echo $_GET["id"]; ?>&producto=<?php echo $data->data->nombre ?>&empresa=<?php echo $cl->empresa ?>" class="btn btn-primary"><i class="fas fa-gift"></i></a>
                                                    </div>
                                                </td>
                                                <td hidden><?php echo $cl->id_empresa; ?></td>
                                                <td hidden><?php echo $cl->nro_beneficiarios; ?></td>
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
    function getDifferenceInDays(date1, date2) {
    const diffInMs = Math.abs(date2 - date1);
    return diffInMs / (1000 * 60 * 60 * 24);
    }
    $('.fechas').on('blur', function () {
        const date1 = new Date($('#fecha_inicio').val());
        const date2 = new Date($('#fecha_fin').val());
        $('#tiempo_permanencia').val(getDifferenceInDays(date1, date2) + 1);

    });
    function showRow(id) {
        let myTab = document.getElementById('Table');
        for (i = 1; i < myTab.rows.length; i++) {
            if(id == myTab.rows.item(i).cells.item(0).innerText){
                $('#id').val(id);
                $('#id_empresa').val(myTab.rows.item(i).cells.item(12).innerHTML);
                $('#fecha_inicio').val(myTab.rows.item(i).cells.item(1).innerHTML);
                $('#fecha_fin').val(myTab.rows.item(i).cells.item(2).innerHTML);
                $('#tiempo_permanencia').val(myTab.rows.item(i).cells.item(3).innerHTML);
                if( myTab.rows.item(i).cells.item(5).innerHTML=='SI' )
                    $('#tiene_contrato1').prop('checked', true);
                else
                    $('#tiene_contrato2').prop('checked', true);
                $('#limite_credito').val(myTab.rows.item(i).cells.item(6).innerHTML);
                $('#tarifa_total').val(myTab.rows.item(i).cells.item(7).innerHTML);
                $('#edad_desde').val(myTab.rows.item(i).cells.item(9).innerHTML);
                $('#edad_hasta').val(myTab.rows.item(i).cells.item(10).innerHTML);
                
                $('#atenciones_para1').prop('checked', false);
                $('#atenciones_para2').prop('checked', false);
                if( myTab.rows.item(i).cells.item(8).innerHTML.includes('Lima') )
                    $('#atenciones_para1').prop('checked', true);
                if( myTab.rows.item(i).cells.item(8).innerHTML.includes('Provincia') )
                    $('#atenciones_para2').prop('checked', true);

                $('#nro_beneficiarios').val(myTab.rows.item(i).cells.item(13).innerHTML);

                // var objCells = myTab.rows.item(i).cells;
                // for (var j = 0; j < objCells.length; j++) {
                //     console.log(objCells.item(j).innerHTML);
                // }
            }
        }
    };
</script>