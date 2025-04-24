<?php encabezado() ?>
<!-- <?php var_dump($_GET['tiposdocumento']); ?> -->
<!-- <?php var_dump($_GET['msg']); ?> -->
<!-- <?php var_dump($_SESSION['permisos']); ?> -->

<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-12 m-auto">

                    <form method="post" action="#" autocomplete="off">
                        
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-primary">
                                <li class="offset-5"><h6 class="title text-white text-center"> SEGUIMIENTO DE ATENCIONES</h6></li>
                            </ol>
                        </nav>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-2">
                                    <label for="seg_fecha_inicio">Fecha Inicio</label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" id="seg_fecha_inicio" name="seg_fecha_inicio" value="">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label for="seg_fecha_fin">Fecha Fin</label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" id="seg_fecha_fin" name="seg_fecha_fin" value="">
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <label for="seg_fecha_fin">Estados pendientes</label>
                                    <div class="input-group center">
                                        <input class="form-control col-lg-2 offset-1" type="checkbox" id="seg_estadopendiente" name="seg_estadopendiente" checked>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <label for="seg_fecha_fin">Estados Finalizados</label>
                                    <div class="input-group">
                                        <input class="form-control col-lg-2 offset-1" type="checkbox" id="seg_estadofinalizado" name="seg_estadofinalizado" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <label for="creados">Casos creados sin asignación</label>
                                    <input class="text-center col-lg-8" type="text" id="seg_sin" disabled>
                                </div>
                                <div class="col-lg-2">
                                    <label for="creados">Casos ult llam >= 4dias</label>
                                    <input class="text-center col-lg-8" type="text" id="seg_retraso" disabled>
                                </div>
                                <div class="col-lg-2">
                                    <label for="creados">Casos abiertos</label>
                                    <input class="text-center col-lg-8" type="text" id="seg_abiertos" disabled>
                                </div>
                                <div class="col-lg-2">
                                    <label for="creados">Casos cerrados</label>
                                    <input class="text-center col-lg-8" type="text" id="seg_cerrados" disabled>
                                </div>
                                <div class="col-lg-2">
                                    <label for="creados">Casos anulados</label>
                                    <input class="text-center col-lg-8" type="text" id="seg_anulados" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                <button class="btn btn-primary col-lg-1" type="submit" id="reg_btnBuscar"><i class="fas fa-search"></i> Buscar</button>
                                    <!-- <button class="btn btn-primary col-lg-3" type="submit" id="reg_btnNuevoPaciente"><i class="fas fa-user-plus"></i> Nuevo Paciente</button> -->
                                    <button class="btn btn-primary col-lg-1" type="button" id="seg_llamada" disabled><i class="fas fa-phone"></i> Llamada</button>
                                    <button class="btn btn-primary col-lg-1" type="button" id="seg_detalle"><i class="fas fa-eye"></i> Detalle</button>

                                    <button class="btn btn-primary col-lg-2" type="button" id="seg_seguimiento" disabled><i class="fas fa-ambulance"></i> Seguimiento</button>
                                    <button class="btn btn-primary col-lg-2" type="button" id="seg_epidemiologia" disabled><i class="fas fa-virus"></i> PDF Alta Epidemiológica</button>
                                    <button class="btn btn-primary col-lg-1" type="button" id="seg_historico" ><i class="fas fa-book-medical"></i> Histórico</button>
                                    <button class="btn btn-primary col-lg-1" type="button" id="seg_exportar" onclick="fnExportExcel('reg_Table')" ><i class="fas fa-file-excel"></i> Exportar</button>
                                </div>
                            </div>

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
                            <div class="table-responsive mt-4">
                                <table class="table table-hover table-bordered" id="reg_Table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Acción</th>
                                            <th>Seg.Covid</th>
                                            <th>Estado</th>
                                            <th>TipDoc</th>
                                            <th>NroDocumento</th>
                                            <th>Sexo</th>
                                            <th>Paciente</th>
                                            <th>Fec.Nacimiento</th>
                                            <th>Correo</th>
                                            <th>Celular</th>
                                            <th>Distrito</th>
                                            <th>Provincia</th>
                                            <th>Departamento</th>
                                            <th>Dirección</th>
                                            <th>Casa</th>
                                            <th>Referencia</th>
                                            <th>NroSeguimiento</th>
                                            <th>Periodicidad</th>
                                            <th>Tipo Ingreso</th>
                                            <th>Fec.Registro</th>
                                            <th>Contesta</th>
                                            <th>Medicamento</th>
                                            <th>Fec.Atención</th>
                                            <th>Fec.Coordinada</th>
                                            <th>Fec.Creación</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>

<style>
    tbody tr.odd.selected{
        background-color: #acbad4;
    }
    tbody tr.even.selected{
        background-color: #acbad4;
    }
</style>

<div id="modal_llamada" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Seguimiento casos COVID</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal_llamada_content">
            </div>
        </div>
    </div>
</div>
<div id="modal_detalle" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Detalle del Seguimiento</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal_detalle_content">
            </div>
        </div>
    </div>
</div>
<div id="modal_observacion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Observaciones del servicio</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal_observacion_content">
            </div>
        </div>
    </div>
</div>
<div id="modal_historico" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Historial de atenciones</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal_historico_content">
            </div>
        </div>
    </div>
</div>

<div id="modal_epidemiologia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Epidemiología</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal_epidemiologia_content">
            </div>
        </div>
    </div>
</div>
<div id="modal_descanso" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Descanso médico</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal_descanso_content">
            </div>
        </div>
    </div>
</div>
<div id="modal_descanso_template" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Descanso médico</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal_descanso_template_content">
            </div>
        </div>
    </div>
</div>
<?php pie() ?>

<script>
    $(document).ready(function(){
        $('#seg_fecha_inicio').val( fnCurrentDate() );
        $('#seg_fecha_fin').val( fnCurrentDate() );

        $('#reg_btnBuscar').on('click', function(event) {
            event.preventDefault();

            let fecha_ini = $('#seg_fecha_inicio').val();
            let fecha_fin = $('#seg_fecha_fin').val();
            let estado1 = $('#seg_estadopendiente').prop('checked');
            let estado2 = $('#seg_estadofinalizado').prop('checked');
            let condicion = ((estado1 && estado2)?3:estado1?1:estado2?2:0);

            let urldata = '<?php echo base_url() ?>Seguimiento/BuscarSeguimientoBCP?fecha_ini='+fecha_ini+'&fecha_fin='+fecha_fin+'&condicion='+condicion;
            
            process(true);
            jQuery.ajax({
                url: urldata,
                async: true,
                type: 'GET',
                success: function (response) {
                    response = JSON.parse(response);

                    $('#seg_retraso').val(response.data.datacount.retraso);
                    $('#seg_sin').val(response.data.datacount.sin);
                    $('#seg_anulados').val(response.data.datacount.anulado+' - ('+ response.data.datacount.anulado_per + ' %)');
                    $('#seg_cerrados').val(response.data.datacount.cerrado+' - ('+ response.data.datacount.cerrado_per + ' %)');
                    $('#seg_abiertos').val(response.data.datacount.abierto+' - ('+ response.data.datacount.abierto_per + ' %)');


                    let tablaH = jQuery('#reg_Table');
                    tablaH.DataTable().clear();
                    tablaH.DataTable().destroy();
                    tablaH.DataTable( {
                        data: response.data.data,
                        language: global_tablelanguage,
                        select: {
                            style: 'single'
                        },
                        sorting: false,
                        columns: [
                            {
                                "data": null,
                                "render": function ( data, type, row, meta ) {
                                    return '<button id="seg_btn_llamada" class="btn btn-primary" type="button" disabled><i class="fas fa-phone"></i></button>';
                                }
                            },
                            { "data": "id_seg_covid" },
                            { "data": "descripcion_estado" },
                            { "data": "documento_identidad" },
                            { "data": "numero_documento_id" },
                            { "data": "sexo" },
                            { "data": "paciente" },
                            { "data": "fecha_nacimiento" },
                            { "data": "correo_electronico" },
                            { "data": "tlf_celular" },
                            { "data": "distrito" },
                            { "data": "provincia" },
                            { "data": "departamento" },
                            { "data": "direccion" },
                            { "data": "tlf_casa" },
                            { "data": "referencia" },
                            { "data": "numero_seguimiento" },
                            { "data": "periodicidad" },
                            { "data": "tipo_ingreso" },
                            { "data": "fecha_registro" },
                            { "data": "pac_contesta" },
                            { "data": "envio_medicamento" },                            
                            { "data": "fecha_atencion" },
                            { "data": "fecha_coordinada" },
                            { "data": "fecha_creacion" }
                        ]
                    });
                },
                error: function(err){
                    console.log(err);
                }
            }).then(()=>{
                process(false);
            })
        });

        jQuery('#reg_Table tbody').on('click', 'tr', function () {
            var data = jQuery('#reg_Table').DataTable().row(jQuery(this)).data();
            $('#seg_llamada').prop('disabled', false);
            //$('#seg_exportar').prop('disabled', false);
            $('#seg_seguimiento').prop('disabled', false);
            $('#seg_epidemiologia').prop('disabled', true);
            //$('#seg_historico').prop('disabled', true);
            $($(this).children().children()).prop('disabled', false);
            if(data.cod_estado >= 80){
                $($(this).children().children()).prop('disabled', true);
                $('#seg_llamada').prop('disabled', true);
                $('#seg_seguimiento').prop('disabled', true);
                if(data.cod_estado == 82){
                    $('#seg_epidemiologia').prop('disabled', false);
                }
            }
            //return false;
        });
        jQuery('#reg_Table tbody').on('click', 'button', function () {
            var data = jQuery('#reg_Table').DataTable().row(jQuery(this).parents('tr')).data();
            if(jQuery(this)[0].id == 'seg_btn_llamada'){
                abrir_llamada(data);
            }
            return false;
        });

        $('#seg_llamada').on('click', function(event) {
            var data = $('#reg_Table').DataTable().rows({selected:  true}).data();
            if(data.count()>0){
                abrir_llamada(data[0]);
            }
            return false;
        });
        $('#seg_detalle').on('click', function(event) {
            var data = $('#reg_Table').DataTable().rows({selected:  true}).data();
            if(data.count()>0){
                ver_detalle(data[0].id_seg_covid);
            }
            return false;
        }); 

        $('#seg_seguimiento').on('click', function(event) {
            var data = $('#reg_Table').DataTable().rows({selected:  true}).data();
            if(data.count()>0){
                ver_observaciones(data[0]);
            }
            return false;
        }); 

        $('#seg_epidemiologia').on('click', function(event) {
            var data = $('#reg_Table').DataTable().rows({selected:  true}).data();
            if(data.count()>0){
                generar_epimiologia(data[0]);
            }
            return false;
        });
        $('#seg_historico').on('click', function(event) {
            var data = $('#reg_Table').DataTable().rows({selected:  true}).data();
            if(data.count()>0){
                ver_historial(data[0]);
            }
            return false;
        }); 

    });

    function abrir_llamada(data){
        console.log(data);
        let urldata = '<?php echo base_url() ?>Seguimiento/Llamada';
        $.ajax({
            url: urldata,
            async: false,
            type: 'GET',
            success: function (response) {
                $('#modal_llamada_content').html(response);
                $('#modal_llamada').modal('show');
                $('#idparent').val('modal_llamada');
                $('#idparent').text('modal_llamada');
                $('#lla_estadoanterior').val(data.cod_estado);
                $('#lla_codpaciente').val(data.cod_paciente);
                $('#lla_aseguradora').val(data.cliente);
                $('#lla_paciente').val(data.paciente);
                $('#lla_fechanacimiento').val(data.fecha_nacimiento);
                $('#lla_edad').val( fnCalculaEdad(data.fecha_nacimiento) );
                $('#lla_tipo_documento').val(data.documento_identidad);
                $('#lla_nro_documento').val(data.numero_documento_id);
                $('#lla_sexo').val(data.sexo);
                $('#lla_celular').val(data.tlf_celular);
                $('#lla_email').val(data.correo_electronico);
                
                $('#lla_codclasificacion').val(data.cod_clasif);
                $('#lla_clasificacion').val(data.clasificacion);
                
                $('#lla_vacunasi').prop('checked', !(data.vacunado == 'NO'));
                $('#lla_vacunano').prop('checked', (data.vacunado == 'NO'));
                $('#lla_vacunasi').prop('disabled', !(data.vacunado == 'NO'));
                $('#lla_vacunano').prop('disabled', !(data.vacunado == 'NO'));
                $('#lla_yavacunado').val(data.vacunado == 'NO'?'0':'1');
                
                $('#lla_dosis').val(data.fecha_vacuna);
                //$('#lla_dosis').val(fnConvertDate(data.fecha_vacuna));
                //$('#lla_dosis').val(data.fecha_vacuna.replace('/', '-'));
                $('#lla_idsegcovid').val(data.id_seg_covid);
                $('#lla_sintomas').val(data.fecha_inicio_sintoma);
                $('#lla_seg').val(data.numero_seguimiento+1);
                $('#lla_atencion').val(data.fecha_atencion);
                $('#lla_tipoingreso').val(data.tipo_ingreso);

                $('#modal_llamada').on('hidden.bs.modal', function () {
                    if( $('#lla_respuesta_grabar').val() != '' ){
                        $('#reg_btnBuscar').trigger('click');
                    }
                    if( $('#lla_respuesta_actualizar').val() != '' ){
                        $('#reg_btnBuscar').trigger('click');
                    }
                })
            },
            error: function (err) {
                Swal.fire({
                    icon: 'error',
                    title: 'ERROR HTML: ' + err.getMessage(),
                    showConfirmButton: false,
                    timer: 2000
                });
            },
            finally: function(){
            }
        });
    }
    function ver_detalle(id_seg_covid){
        let urldata = '<?php echo base_url() ?>Seguimiento/Detalle';
        $.ajax({
            url: urldata,
            async: false,
            type: 'GET',
            success: function (response) {
                $('#modal_detalle_content').html(response);
                $('#modal_detalle').modal('show');
                
                $('#det_idsegcovid').val(id_seg_covid);
                $('#det_idparent').val('modal_detalle');
            },
            error: function (err) {
                Swal.fire({
                    icon: 'error',
                    title: 'ERROR HTML: ' + err.getMessage(),
                    showConfirmButton: false,
                    timer: 2000
                });
            },
            finally: function(){
            }
        });
    }

    function ver_observaciones(data){
        let urldata = '<?php echo base_url() ?>Seguimiento/Observacion';
        $.ajax({
            url: urldata,
            async: false,
            type: 'GET',
            success: function (response) {
                $('#modal_observacion_content').html(response);
                $('#modal_observacion').modal('show');
                
                $('#obs_tipo_servicio').val('ATE');
                $('#obs_codigo_servicio').val(data.id_seg_covid);
                $('#obs_idparent').val('modal_observacion');
            },
            error: function (err) {
                Swal.fire({
                    icon: 'error',
                    title: 'ERROR HTML: ' + err.getMessage(),
                    showConfirmButton: false,
                    timer: 2000
                });
            },
            finally: function(){
            }
        });
    }

    function ver_historial(data){
        let urldata = '<?php echo base_url() ?>Seguimiento/Historial';
        $.ajax({
            url: urldata,
            async: false,
            type: 'GET',
            success: function (response) {
                $('#modal_historico_content').html(response);
                $('#modal_historico').modal('show');
                $('#hist_documento').val(data.numero_documento_id);
            },
            error: function (err) {
                Swal.fire({
                    icon: 'error',
                    title: 'ERROR HTML: ' + err.getMessage(),
                    showConfirmButton: false,
                    timer: 2000
                });
            },
            finally: function(){
            }
        });
    }

    function generar_epimiologia(data){
        let urldata = '<?php echo base_url() ?>Seguimiento/TemplateEpidemiologia?id_seg_covid='+data.id_seg_covid;
        $.ajax({
            url: urldata,
            async: false,
            type: 'GET',
            success: function (response) {
                $('#modal_epidemiologia_content').html(response);
                $('#modal_epidemiologia').modal('show');
            },
            error: function (err) {
                Swal.fire({
                    icon: 'error',
                    title: 'ERROR HTML: ' + err.getMessage(),
                    showConfirmButton: false,
                    timer: 2000
                });
            },
            finally: function(){
            }
        });
    }

</script>