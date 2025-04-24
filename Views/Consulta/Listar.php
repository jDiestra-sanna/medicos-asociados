<?php encabezado() ?>
<!-- <?php var_dump($_GET['tiposdocumento']); ?> -->
<!-- <?php var_dump($_GET['msg']); ?> -->
<!-- <?php var_dump($data); ?> -->

<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-12 m-auto">

                    <form method="post" action="/Consulta/buscar" autocomplete="off">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-primary">
                                <li class="offset-5"><h6 class="title text-white text-center"> BÚSQUEDA DE EMPLEADOS</h6></li>
                            </ol>
                        </nav>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="id_tipo_documento">Tipo Documento</label>
                                    <select id="id_tipo_documento" class="form-control" name="id_tipo_documento">
                                        <?php foreach ($_GET['tiposdocumento']->data as $cl) { ?>
                                            <option value="<?php echo $cl->id_doc_id; ?>"><?php echo $cl->descripcion_doc_id; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <label for="nro_documento">Nro documento</label>
                                    <input id="nro_documento" class="form-control" type="text" name="nro_documento" value="">
                                </div>
                                <div class="col-lg-5">
                                    <label for="id_empresa">Nombre paciente</label>
                                    <input id="nombre_apellido" class="form-control" type="text" name="nombre_apellido" value="" >
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Buscar</button>

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
                    
                    <?php if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
                    { 
                    ?>

                    <div class="row">
                        <div class="table-responsive mt-4">
                            <table class="table table-hover table-bordered" id="Table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th hidden></th>
                                        <th>Programa</th>
                                        <th>Empresa</th>
                                        <th>Tipo Documento</th>
                                        <th>Nro Documento</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Género</th>
                                        <th>Fecha Nac.</th>
                                        <th>Edad</th>
                                        <th>Correo</th>
                                        <th>Teléfono</th>
                                        <th>Ubigeo</th>
                                        <th>Dirección</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        
                                            if($data && $data->success && count($data->data)>0) 
                                            { 
                                                foreach ($data->data as $cl) { 
                                                    $tz  = new DateTimeZone('America/Lima');
                                                    $edad = date_diff(new DateTime($cl->fecha_nacimiento), new DateTime('now', $tz));
                                                    ?>
                                                <tr>
                                                    <td hidden><?php echo $cl->id; ?></td>
                                                    <td><?php echo $cl->programa; ?></td>
                                                    <td><?php echo $cl->empresa; ?></td>
                                                    <td><?php echo $cl->id_tipo_documento; ?></td>
                                                    <td><?php echo $cl->nro_documento; ?></td>
                                                    <td><?php echo $cl->nombre; ?></td>
                                                    <td><?php echo $cl->apellido; ?></td>
                                                    <td><?php echo $cl->genero?'H':'M'; ?></td>
                                                    <td><?php echo $cl->fecha_nacimiento; ?></td>
                                                    <td><?php echo $edad->y; ?></td>
                                                    <td><?php echo $cl->correo; ?></td>
                                                    <td><?php echo $cl->telefono; ?></td>
                                                    <td><?php echo $cl->ubigeo; ?></td>
                                                    <td><?php echo $cl->direccion; ?></td>
                                                    <td>
                                                        <div class="form-group form-check-inline">
                                                            <!-- <a href="<?php echo base_url() ?>Consulta/atencionespasadas?id_tipo_documento=<?php echo $cl->id_tipo_documento; ?>&nro_documento=<?php echo $cl->nro_documento; ?>" class="btn btn-primary"><i class="fas fa-file-medical-alt"></i></a> -->
                                                            <!-- <a class="idsopenmodal" id="openmodal_<?php echo $cl->id_tipo_documento; ?>_<?php echo $cl->nro_documento; ?>" href="#" onclick="abrirModal(e, <?php echo $cl->id_tipo_documento; ?>,<?php echo $cl->nro_documento; ?>);" class="btn btn-primary"><i class="fas fa-file-medical-alt"></i></a> -->
                                                            <a id="openmodal_<?php echo $cl->id_tipo_documento; ?>_<?php echo $cl->nro_documento; ?>" href="#" class="btn btn-primary idsopenmodal"><i class="fas fa-file-medical-alt"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                        <?php 
                                                } 
                                            } 
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb bg-primary">
                                    <li class="offset-5"><h6 class="title text-white text-center"> BENEFICIOS DEL EMPLEADO</h6></li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    <div class="row">
                        <div class="table-responsive mt-12">
                            <table class="table table-hover table-bordered" id="TableBeneficios">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Beneficio</th>
                                        <th>Nro veces</th>
                                        <th>Copago</th>
                                        <th>Delivery</th>
                                        <th>Laboratorio</th>
                                        <th>Nro atenciones disponibles</th>
                                        <th>Nro atenciones efectuadas</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                    <?php } ?>

                </div>
            </div>
        </div>
    </section>
</div>


<div id="modalHistorial" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Historial de Atenciones</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                </div><br/>
                <div class="row">
                    <div class="col-lg-12 pl-5 pr-5 pb-5">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="TablaHistorico" width="100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Fecha Atención</th>
                                        <th>Beneficio</th>
                                        <th>Nombre</th>
                                        <th>Cod.Atención</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>                        
                </div>
            </div>

        </div>
    </div>
</div>

<?php pie() ?>

<script>
var atenciones_pasadas;

$('.idsopenmodal').on('click', function(event) {
    event.preventDefault();
    let id = $(this).attr("id");
    
    let urldata = '<?php echo base_url() ?>Consulta/atencionespasadas?id_tipo_documento='+id.split("_")[1]+'&nro_documento='+id.split("_")[2];
    $.ajax({
        url: urldata,
        async: false,
        type: 'GET',
        success: function (response) {
            let tablaH = $('#TablaHistorico');
            tablaH.DataTable().clear();
            tablaH.DataTable().destroy();
            tablaH.DataTable( {
                data: JSON.parse(response).data,
                columns: [
                    { "data": "fec_ate" },
                    { "data": "beneficio" },
                    { "data": "nom_pac" },
                    { "data": "cod_ate" },
                    {
                        "data": null,
                        "render": function ( data, type, row, meta ) {
                            //return '0'; 
                            return 'ATENCION EFECTIVA';
                        }
                    }
                ]
            });
            $("#modalHistorial").modal(); 
        }
    })
});

function abrirModal(){
    let tablaH = $('#TablaHistorico');
    tablaH.DataTable().clear();
    tablaH.DataTable().destroy();
    tablaH.DataTable( {
        data: atenciones_pasadas,
        columns: [
            { "data": "fec_ate" },
            { "data": "beneficio" },
            { "data": "nom_pac" },
            { "data": "cod_ate" },
            {
                "data": null,
                "render": function ( data, type, row, meta ) {
                    //return '0'; 
                    return 'ATENCION EFECTIVA';
                }
            }
        ]
    });
    $("#modalHistorial").modal(); 
}
/*
function abrirModal(tipo_doc, nro_doc){
    let urldata = '<?php echo base_url() ?>Consulta/atencionespasadas?id_tipo_documento='+tipo_doc+'&nro_documento='+nro_doc;

    $.ajax({
        url: urldata,
        type: 'GET',
        success: function (response) {
            let tablaH = $('#TablaHistorico');
            tablaH.DataTable().clear();
            tablaH.DataTable().destroy();
            tablaH.DataTable( {
                data: JSON.parse(response).data,
                columns: [
                    { "data": "fec_ate" },
                    { "data": "beneficio" },
                    { "data": "nom_pac" },
                    { "data": "cod_ate" },
                    {
                        "data": null,
                        "render": function ( data, type, row, meta ) {
                            //return '0'; 
                            return 'ATENCION EFECTIVA';
                        }
                    }
                ]
            });
            $("#modalHistorial").modal(); 
        }
    })
}
*/
$(document).ready(function() {
    $('#TableBeneficios').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay datos",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "infoEmpty": "Mostrando 0 a 0 de 0 registros",
            "infoFiltered": "(Filtro de _MAX_ total registros)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ registros",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "No se encontraron coincidencias",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Próximo",
                "previous": "Anterior"
            },
            "aria": {
                "sortAscending": ": Activar orden de columna ascendente",
                "sortDescending": ": Activar orden de columna desendente"
            }
        }
    });

    $('#TablaHistorico').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay datos",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "infoEmpty": "Mostrando 0 a 0 de 0 registros",
            "infoFiltered": "(Filtro de _MAX_ total registros)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ registros",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "No se encontraron coincidencias",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Próximo",
                "previous": "Anterior"
            },
            "aria": {
                "sortAscending": ": Activar orden de columna ascendente",
                "sortDescending": ": Activar orden de columna desendente"
            }
        }
    });
});


let table = $('#Table');

$('#Table').on('click', 'tbody tr', function () {
    let row = table.DataTable().row($(this)).data();
    let data = <?php echo json_encode($data) ?>;

    data = data.data.filter(item => item.id == row[0]);
/*
    let urldata = '<?php echo base_url() ?>Consulta/atencionespasadas?id_tipo_documento='+data[0].id_tipo_documento+'&nro_documento='+data[0].nro_documento;
    $.ajax({
    url: urldata,
    async: false,
    type: 'GET',
    success: function (response) {
            atenciones_pasadas = JSON.parse(response).data
        }
    })
    */

    dataBeneficios = data[0].beneficios;
    let tabla = $('#TableBeneficios');
    tabla.DataTable().clear();
    tabla.DataTable().destroy();
    tabla.DataTable( {
        data: dataBeneficios,
        columns: [
            { "data": "beneficio" },
            { "data": "nro_veces" },
            { "data": "copago" },
            // { "data": "aplica_delivery" },
            //{ "data": "aplica_laboratorio" },
            {
                "data": "aplica_delivery",
                "render": function ( data, type, row, meta ) {
                return row.aplica_delivery?'SI':'NO'; }
            },
            {
                "data": "aplica_laboratorio",
                "render": function ( data, type, row, meta ) {
                return row.aplica_laboratorio?'SI':'NO'; }
            },
            {
                "data": null,
                "render": function ( data, type, row, meta ) {
                    //return '0'; 
                    return row.nro_veces>=999?'Ilimitado': row.nro_veces - row.nro_atenciones;
                }
            },
            { "data": "nro_atenciones" },
            // {
            //     "data": null,
            //     "render": function ( data, type, row, meta ) {
            //     return '0'; }
            // }
        ]
    });

});

</script>