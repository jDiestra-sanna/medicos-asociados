<?php encabezado() ?>
<!-- <?php var_dump($_GET['tiposdocumento']); ?> -->
<!-- <?php var_dump($_GET['msg']); ?> -->
<!-- <?php var_dump(json_encode($data['beneficios'])); ?> -->

<?php
$anos = array(); $ano = intval(date('Y'));
while($ano <= intval(date('Y')) + 5){
    $anos[] = $ano;
    $ano ++;
}
?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-12 m-auto">

                    
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-primary">
                            <li class="offset-5"><h6 class="title text-white text-center"> SOLICITUDES</h6></li>
                        </ol>
                    </nav>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <label for="negocio">Unidad de negocio:</label>
                                <select id="negocio" class="form-control" name="negocio">
                                    <option value="dom">Médicos a Domicilio</option>
                                    <option value="dr">DR Online</option>
                                    <option value="cro">Crónicos</option>
                                    <option value="covid">Seguimiento COVID</option>
                                    <option value="amb">Ambulancias</option>
                                    <option value="call">Call Médico</option>
                                    <option value="tele">Telemedicina</option>
                                    <option value="midoc">MIDOC</option>
                                    <option value="tsanna">T-SANNA</option>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <label for="fecha_inicio">Fecha Inicio</label>
                                <div class="input-group">
                                    <input class="form-control border-right-0 border fechas" required type="date" id="med_fecha_inicio" name="med_fecha_inicio" value="<?php echo date("Y-m-d") ?>">
                                    <span class="input-group-append">
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <label for="fecha_fin">Fecha Fin</label>
                                <div class="input-group">
                                    <input class="form-control border-right-0 border fechas" required type="date" id="med_fecha_fin" name="med_fecha_fin" value="<?php echo date("Y-m-d") ?>">
                                    <span class="input-group-append">
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="estado">Estado:</label>
                                <select id="estado" class="form-control" name="estado">
                                    <option value="2">Nueva solicitud</option>
                                    <option value="3">2da Evaluación</option>
                                    <option value="4">3ra Evaluación</option>
                                    <option value="100">Solicitudes Aprobadas</option>
                                    <option value="200">Solicitudes Rechazadas</option>
                                    <option value="26">Solicitudes Vencidas</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="button" onclick="buscarSolicitudes();"><i class="fas fa-search"></i> Buscar</button>
                        <button class="btn btn-primary col-lg-1" type="button" id="med_exportar" onclick="downloadExcel()" ><i class="fas fa-file-excel"></i> Exportar</button>
                        <button class="btn btn-primary col-lg-2" type="button" id="med_validar" onclick="ValidarSolicitud(this)" ><i class="fas fa-eye"></i> Validar Solicitud</button>

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
                    
                    <div class="row">
                        <div class="col-lg-12">
                        <table class="table table-hover table-bordered text-center" id="Tabla">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nro Solicitud</th>
                                    <th>Fecha Solicitud</th>
                                    <th>Hora Solicitud</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Nro Colegiatura</th>
                                    <th>Especialidad</th>
                                    <th>Situación</th>
                                    <th>Unidad</th>
                                    <th>Estado</th>
                                    <!-- <th>Fecha Máx. Aprobación</th> -->
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

<div id="medico_validar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Validar Solicitud</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="medico_validar_content">
            </div>
        </div>
    </div>
</div>
<div id="medico_motivo_1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Motivo Rechazo</h5>
            <button class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="medico_motivo_1_content">
            <div class="row">
            <label for="">Ingrese el motivo por el cual la solicitud es rechazada:</label>
            </div>
            <div class="row">
            <textarea name="medico_motivo_21_text" id="medico_motivo_21_text" cols="100" rows="4"></textarea>
            </div>
            <div class="row">
            <input type="button" id="rechazar_1_1" class="btn btn-danger col-lg-3" value="Confirmar Rechazo">
            </div>
        </div>
    </div>
    </div>
</div>
<div id="medico_motivo_2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-l" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Motivo Rechazo</h5>
            <button class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="medico_motivo_2_content">
            <div class="row">
            <label for="">Ingrese el motivo por el cual la solicitud es rechazada:</label>
            </div>
            <div class="row">
            <textarea name="medico_motivo_23_text" id="medico_motivo_23_text" cols="100" rows="4"></textarea>
            </div>
            <div class="row">
            <input type="button" id="rechazar_2_1" class="btn btn-danger col-lg-3" value="Confirmar Rechazo">
            </div>
        </div>
    </div>
    </div>
</div>
<div id="medico_motivo_3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-l" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Motivo Rechazo</h5>
            <button class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="medico_motivo_3_content">
            <div class="row">
            <label for="">Ingrese el motivo por el cual la solicitud es rechazada:</label>
            </div>
            <div class="row">
            <textarea name="medico_motivo_25_text" id="medico_motivo_25_text" cols="100" rows="4"></textarea>
            </div>
            <div class="row">
            <input type="button" id="rechazar_3_1" class="btn btn-danger col-lg-3" value="Confirmar Rechazo">
            </div>
        </div>
    </div>
    </div>
</div>

<div id="motivo_rechazo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Datos del rechazo</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="motivo_rechazo_content">

            </div>
        </div>
    </div>
</div>


<?php pie() ?>
<style>
    tbody tr.odd.selected{
        background-color: #acbad4;
    }
    tbody tr.even.selected{
        background-color: #acbad4;
    }
</style>
<script>
    var data = [];

    function buscarSolicitudes(){
        if( $('#med_fecha_fin').val() == '' && $('#med_fecha_fin').val() == '' ) { 
            Swal.fire({
                icon: 'warning',
                title: 'Debe escoger un rango de fecha',
                showConfirmButton: false,
                timer: 1500
            });
        }
        
        let urldata = '<?php echo base_url() ?>Medicos/BuscarSolicitudes'
        let datasend = {
            "servicio" : $('#negocio').val(),
            "fecha_ini" : $('#med_fecha_inicio').val(),
            "fecha_fin" : $('#med_fecha_fin').val(),

            "estado" : $('#estado').val()
        }      

        $.ajax({
            url: urldata,
            async: false,
            data: { 'datasend': datasend },
            type: 'POST',
            beforeSend: function(){
                process(true)
            },
            success: function (response) {
                validatesession(response)
                datos = JSONsanna.parse(response);

                let tabla = $('#Tabla');
                tabla.DataTable().clear();
                tabla.DataTable().destroy();
                tabla.DataTable( {
                    data: datos.data,
                    select: {
                        style: 'single'
                    },
                    columns: [
                        { "data": "nro_solicitud" },
                        {
                        "data": null,
                        "render": function ( data, type, row, meta ) {
                            return fnConvertDate(data.fecha_solicitud);
                            }
                        },
                        {
                        "data": null,
                        "render": function ( data, type, row, meta ) {
                            return fnConvertTime(data.fecha_solicitud);
                            }
                        },
                        { "data": "nombres" },
                        { "data": "apellidos" },
                        { "data": "nro_colegiatura" },
                        { "data": "especialidad" },
                        {
                        "data": null,
                        "render": function ( data, type, row, meta ) {
                            return data.activo==2?'1/3':data.activo==3?'2/3':'3/3';
                            }
                        },
                        { "data": "servicio" },
                        {
                        "data": null,
                        "render": function ( data, type, row, meta ) {
                            return data.activo==2?'Nueva solicitud':data.activo==3?'2da Evaluación':data.activo==4?'3ra Evaluación':(data.activo==20||data.activo==22||data.activo==24)?'Solicitudes Aprobadas':(data.activo==21||data.activo==23||data.activo==25)?'<div class="col-lg-12">Solicitudes Aprobadas</div><div class="col-lg-12"><input type="button" onclick="VerMotivos('+data.id+')" class="btn btn-warning" value="Ver Motivos"></div>':data.activo==26?'Solicitudes Vencidas':'';
                            }
                        }
                    ]
                });
            },
            complete: function(){
                process(false)
            }
        })
    }
    function ValidarSolicitud(){
        var countSolicitud = $('#Tabla').DataTable().rows('.selected').data().count();
        var row = $('#Tabla').DataTable().rows('.selected').data()[0]
        if(countSolicitud > 0){
            let urldata = '<?php echo base_url() ?>Medicos/VerSolicitud?id_medico='+row.id_medico+'&nro_solicitud='+row.nro_solicitud;
            $.ajax({
                url: urldata,
                async: false,
                type: 'GET',
                success: function (response) {
                    $('#medico_validar_content').html(response);
                    $('#medico_validar').modal('show');
                },
                error: function (err) {
                    window.alert('ERROR HTML: ' + err.getMessage());
                },
                finally: function(){
                }
            });
        }

    }
    function VerMotivos(id){
        if(id > 0){
            let urldata = '<?php echo base_url() ?>Medicos/MotivosSolicitud?id='+id;
            $.ajax({
                url: urldata,
                async: false,
                type: 'GET',
                success: function (response) {
                    $('#motivo_rechazo_content').html(response);
                    $('#motivo_rechazo').modal('show');
                },
                error: function (err) {
                    window.alert('ERROR HTML: ' + err.getMessage());
                },
                finally: function(){
                }
            });
        }
    }
    function downloadExcel(){
        if( $('#med_fecha_fin').val() == '' && $('#med_fecha_fin').val() == '' ) {
            Swal.fire({
                icon: 'warning',
                title: 'Debe escoger un rango de fecha',
                showConfirmButton: false,
                timer: 1500
            });
        }        
        let urldata = '<?php echo base_url() ?>Medicos/SolicitudesExportar'
        let datasend = {
            "servicio" : $('#negocio').val(),
            "fecha_ini" : $('#med_fecha_inicio').val(),
            "fecha_fin" : $('#med_fecha_fin').val(),
            "estado" : $('#estado').val()
        }
        $.ajax({
            url: urldata,
            async: false,
            data: { 'datasend': datasend },
            type: 'POST',
            beforeSend: function(){
                process(true)
            },
            success: function (response) {
                validatesession(response)
                datos = JSONsanna.parse(response);
                JSONToCSVConvertor(datos.data, 'Reporte de Solicitudes', true)

            },
            complete: function(){
                process(false)
            }
        })
    }

    $(document).ready(function() {

        $('#Tabla').DataTable({
            "paging":   false,
            "ordering": false,
            "info":     false,
            "bFilter": false,
            "bPaginate": false,
            language: {
                "decimal": "",
                "emptyTable": "No hay datos",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
            }
        });
    });


</script>