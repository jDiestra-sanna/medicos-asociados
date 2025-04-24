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

                    <form method="post" action="#" autocomplete="off">
                        
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-primary">
                                <li class="offset-5"><h6 class="title text-white text-center"> EXÁMENES DE LABORATORIO</h6></li>
                            </ol>
                        </nav>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-2">
                                    <label for="fecha_inicio">Fecha Inicio</label>
                                    <div class="input-group">
                                        <input class="form-control border-right-0 border fechas" required type="date" id="reg_fecha_inicio" name="reg_fecha_inicio" value="<?php echo date("Y-m-d") ?>">
                                        <span class="input-group-append">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label for="fecha_fin">Fecha Fin</label>
                                    <div class="input-group">
                                        <input class="form-control border-right-0 border fechas" required type="date" id="reg_fecha_fin" name="reg_fecha_fin" value="<?php echo date("Y-m-d") ?>">
                                        <span class="input-group-append">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary col-lg-2" type="submit" id="reg_btnBuscar"><i class="fas fa-search"></i> Buscar</button>
                                    <button class="btn btn-primary col-lg-2" type="button" id="reg_nueva_sin"><i class="fas fa-diagnoses"></i></i> Nuevo Sin Asociación</button>
                                    <button class="btn btn-primary col-lg-2" type="button" id="reg_seguimiento"><i class="fas fa-ambulance"></i> Seguimiento</button>
                                    <button class="btn btn-primary col-lg-2" type="button" id="reg_verdatos"><i class="fas fa-user-alt"></i> Ver Datos</button>
                                    <!-- <button class="btn btn-primary col-lg-2" type="button" id="reg_nueva_con"><i class="fas fa-ambulance"></i></i> Nuevo Con Asociación</button> -->
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
                                            <th>Cod. Atención</th>
                                            <th>Cod. Laboratorio</th>
                                            <th>Descripcion</th>
                                            <th>Paciente</th>
                                            <th>Clasificacion</th>
                                            <th>Fecha Creacion</th>
                                            <th>Fecha Servicio</th>
                                            <th>Fecha Coordinada</th>
                                            <th>Hora Coordinada</th>
                                            <th>Fecha Cierre</th>
                                            <th>Flebotomista</th>
                                            <th>Estado</th>
                                            <th>Cliente</th>
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

<div id="nuevo_atencion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <input type="text" id="nuevo_codigo_atencion" hidden>
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Nueva atención</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="nuevo_atencion_content">
            </div>
        </div>
    </div>
</div>

<div id="nuevo_paciente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <input type="text" id="nuevo_paciente_json" hidden>
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Nuevo paciente</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="nuevo_paciente_content">
            </div>
        </div>
    </div>
</div>

<div id="nuevo_atencion_sin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <input type="text" id="nuevo_atencion_sin_json" hidden>
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Nueva atención sin asociación</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="nuevo_atencion_sin_content">
            </div>
        </div>
    </div>
</div>

<div id="siteds" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true" style="overflow-y: scroll;">
    <input type="text" id="siteds_json" hidden>
    <input type="text" id="siteds_codigoautorizacion" hidden>
    <div class="modal-dialog modal-xl" role="document" style="max-width:95%;padding:0 20px 0 20px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-book-medical"></i> Búsqueda en Siteds</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="siteds_content">
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

<div id="modal_datos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Detalle de la atención</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal_datos_content">
            </div>
        </div>
    </div>
</div>

<style>
    tbody tr.odd.selected{
        background-color: #acbad4;
    }
    tbody tr.even.selected{
        background-color: #acbad4;
    }
</style>

<?php pie() ?>

<script>

    let tipos_documento = [{"id":2, "nombre":"DNI"},
        {"id":1, "nombre":"DOC.TRIB.NO.DOM.SIN.RUC"},
        {"id":9, "nombre":"SIN DOC DE IDENTIDAD"},
        {"id":7, "nombre":"PART. DE NAC."},
        {"id":4, "nombre":"RUC"},
        {"id":5, "nombre":"PASAPORTE"},
        {"id":6, "nombre":"CED. DIPLOMATICA DE IDENTIDAD"},
        {"id":8, "nombre":"COD. NACIDO VIVO (CNV)"},
        {"id":3, "nombre":"CARNE EXTR."}
    ]
    $(document).ready(function(){
        $('#modal_empresa_nombre').val($('#busca_empresa').text().trim());
        $('#modal_cod_empresa').val($('#busca_empresa').val());
        $("#busca_tipodoc").click(function(e){
            $('#modal_empresa_nombre').val(jQuery(this).val().trim());
        });

        $('#reg_btnBuscar').on('click', function(event) {
            event.preventDefault();
            let fecha_inicio = $('#reg_fecha_inicio').val();
            let fecha_fin = $('#reg_fecha_fin').val();

            let urldata = '<?php echo base_url() ?>Seguimiento/buscaratenciones?fecha_inicio='+fecha_inicio+'&fecha_fin='+fecha_fin;
            let rowTotal = 0;
            $('#reg_Table').DataTable().clear();
            $('#reg_Table').DataTable().destroy();
            $('#reg_Table').DataTable( {
                processing: true,
                serverSide: true,
                language: global_tablelanguage,
                select: true,
                searching: false,
                pagingType: "simple",
                lengthMenu: [10, 20, 50],
                ajax: {
                    url : urldata,
                    dataFilter: function(data){
                        if(data == "null"){
                            return '{"total":80,"data":[],"recordsFiltered":80,"recordsDisplay":10,"recordsTotal":80}';
                        }else{
                            var json = jQuery.parseJSON( data );
                            return JSON.stringify(json.data); //
                        }
                    }
                },
                columns: [
                    {
                        "data": null,
                        "render": function ( data, type, row, meta ) {
                            return '<button id="nuevacarga" class="btn btn-primary" type="button"><i class="fas fa-ambulance"></i></button>';
                        }
                    },
                    { "data": "cod_atencion" },
                    { "data": "cod_serv_laboratorio" },
                    { "data": "descripcion", "width": "50%"},
                    { "data": "paciente" },
                    { "data": "clasificacion" },
                    { "data": "fecha_creacion" },
                    { "data": "fecha_servicio" },
                    { "data": "fecha_coordinada" },
                    { "data": "hora_coordinada" },
                    { "data": "fecha_cierre" },
                    { "data": "flebotomista" },
                    { "data": "estado" },
                    { "data": "cliente" }
                ]
            })            
        });
        
        $('#reg_nueva_sin').on('click', function(event) {
            formularioatencion();
            $('#divbuscapaciente').css('display', 'flex');
        });
        $('#reg_nueva_con').on('click', function(event) {
            var data = $('#reg_Table').DataTable().rows({selected:  true}).data();
            if(data.count()>0){
                formularioatencion(data[0]);
            }
            $('#divbuscapaciente').css('display', 'flex');
        });        

        jQuery('#reg_Table tbody').on('click', 'button', function () {
            var data = jQuery('#reg_Table').DataTable().row(jQuery(this).parents('tr')).data();
            if(jQuery(this)[0].id == 'nuevacarga'){
                formularioatencion(data);
            }
            return false;
        });

        $('#reg_Table').DataTable({
            language: global_tablelanguage
        });

        $('#reg_seguimiento').on('click', function(event) {
            var data = $('#reg_Table').DataTable().rows({selected:  true}).data();
            if(data.count()>0){
                ver_observaciones(data[0]);
            }
            return false;
        });
        $('#reg_verdatos').on('click', function(event) {
            var data = $('#reg_Table').DataTable().rows({selected:  true}).data();
            if(data.count()>0){
                ver_datos(data[0]);
            }
            return false;
        });
    });

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
                $('#obs_tipo_seguimiento_valor').val('LAB');
                $('#obs_codigo_servicio').val(data.cod_atencion);
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

    function ver_datos(data){
        let urldata = '<?php echo base_url() ?>Seguimiento/DatosSeguimiento';
        $.ajax({
            url: urldata,
            async: false,
            type: 'GET',
            success: function (response) {
                $('#modal_datos_content').html(response);
                $('#modal_datos').modal('show');                
                $('#datos_codigo_atencion').val(data.cod_atencion);
                $('#datos_idparent').val('modal_datos');
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


    function cargarTabla(json){
        let contadoritems = 1;
        let data = JSON.parse(json);
        //data.forEach(item => item.tipo_documento = tipos_documento.find(x => x.id === item.tipo_documento).nombre);
        data.forEach(item => item.id = contadoritems++);
        let tabla = $('#TablaCarga');
        tabla.DataTable().clear();
        tabla.DataTable().destroy();
        tabla.DataTable( {
            data: data,
            columns: [
                { "data": "id" },
                { "data": "id_matricula" },
                { "data": "matricula2" },
                { "data": "tipo_documento" },
                { "data": "num_doc_id" },
                { "data": "apellido_paterno" },
                { "data": "apellido_materno" },
                { "data": "nombres" },
                { "data": "genero" },
                { "data": "fecha_nacimiento" },
                { "data": "division" },
                { "data": "area_tribu_coe" },
                { "data": "servicio_tribu_coe" },
                { "data": "unidad_organizativa" },
                { "data": "funcion" },
                { "data": "correo_electronico" },
                { "data": "codigo_siga_superior" },
                { "data": "matricula_superior" },
                { "data": "nombre_completo_superior" },
                { "data": "correo_jefe" },
                {
                    "data": null,
                    "render": function ( data, type, row, meta ) {
                    return '<button class="btn btn-danger" type="button" onclick="remove('+(row.id).toString()+')"><i class="far fa-times-circle"></i></button>'; }
                }
            ]
        });
        $('#json_data').val(JSON.stringify(data));
        $('#json_data_final').val(JSON.stringify({ "data": data }));
        console.log(JSON.stringify({ "data": data }));
    }

    function remove(id){
        $("#TablaCarga tr").each(function(){
            var currentRow=$(this);
            var colid =currentRow.find("td:eq(0)").text();
            if(colid == id){
                currentRow.remove();
            }
        });
        let datatmp = JSON.parse($('#json_data').val());
        datatmp = datatmp.filter(item => item.id !== id);
        $('#json_data').val(JSON.stringify(datatmp));
        $('#json_data_final').val({ "data": JSON.stringify(datatmp) });
    }
    
    function formularioatencion(data){
        if(data){
            Swal.fire({
                icon: 'warning',
                title: 'Para crear un nuevo servicio de Seguimiento COVID-19, debe de confirmar si el resultado del examen es positivo <br/> ¿Desea confirmar que el resultado del examen es positivo?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Si',
                denyButtonText: 'No',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    formularioatencionabrir(data);
                }            
            });
        }
        else{
            formularioatencionabrir();
        }
    }
    function formularioatencionabrir(data){
        let urldata = '<?php echo base_url() ?>Atencion/NuevaAtencion';
        $.ajax({
            url: urldata,
            async: false,
            type: 'GET',
            success: function (response) {
                $('#nuevo_atencion_content').html(response);
                $('#datos_covid').css('display', 'block');
                $('#datos_bcp').css('display', 'none');
                $('#tabsited').css('display', 'block');
                $('#nuevo_atencion').modal('show');
                if(data){
                    $('#ate_ref').val(data.cod_atencion);
                    $('#ate_codlab').val(data.cod_serv_laboratorio);
                    $('#ate_fechaexamen').val(data.fecha_coordinada);
                    $('#ate_examenlab').val(data.descripcion);
                    $('#ate_clasificacion').val(99);
                    $('#ate_bloqueclasificacion').css('display', 'none');
                    

                    // Trae los datos del paciente
                    urldata = '<?php echo base_url() ?>Paciente/BuscarPacientePorCodHia?cod_hia='+data.cod_tit;
                    $.ajax({
                        url: urldata,
                        async: false,
                        type: 'GET',
                        success: function (response) {
                            data = JSON.parse(response);
                            $('#ate_cod_hia').val(data.cod_hia.trim());
                            $('#ate_ape_paterno').val(data.appat_pac);
                            $('#ate_ape_materno').val(data.apmat_pac);
                            $('#ate_nombres').val(data.nom_pac);
                            $('#ate_fecha_nacimiento').val(data.fnac_pac);
                            $('#ate_tipo_documento').val(data.id_doc_id);
                            $('#ate_nro_documento').val(data.num_doc_id);
                            $('#ate_sexo').val(data.sex_pac?1:0);
                            $('#ate_email').val(data.correo_pac);
                            $('#ate_movil').val(parseInt(data.cel_pac));
                            $('#ate_edad').val(fnCalculaEdad(data.fnac_pac));

                            if(data.direcciones != undefined && data.direcciones.length > 0 ){
                                let tablaH = jQuery('#ate_direcciones');
                                tablaH.DataTable().clear();
                                tablaH.DataTable().destroy();
                                tablaH.DataTable( {
                                    language: global_tablelanguage,
                                    select: {
                                        style: 'single'
                                    },
                                    searching: false,
                                    sorting: false,
                                    bInfo : false,
                                    paginate: true,
                                    lengthMenu: [5],
                                    data: data.direcciones,
                                    columns: [
                                        { "data": "distrito", "width":"15%" },
                                        { "data": "provincia", "width":"10%" },
                                        { "data": "departamento", "width":"10%" },
                                        { "data": "des_dir", "width":"35%" },
                                        { "data": "ref_dir", "width":"35%" },
                                        { "data": "tlf_casa", "width":"5%" },
                                        { "data": "tlf_oficina", "width":"5%" },
                                        { "data": "tlf_oficina_anx", "width":"5%" }
                                    ]
                                });
                            }  
                        }
                    }) 
                }
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


    function formularionuevopaciente(datapaciente){
        let urldata = '<?php echo base_url() ?>Paciente/NuevoPaciente';
        $.ajax({
            url: urldata,
            async: false,
            type: 'GET',
            success: function (response) {
                $('#nuevo_paciente_content').html(response);
                $('#nuevo_paciente').modal('show');
                $('#nuevo_paciente_json').val('');
                
                if(datapaciente){
                    $('#pac_ape_paterno').val(datapaciente.apellido_paterno);
                    $('#pac_ape_materno').val(datapaciente.apellido_materno);
                    $('#pac_nombres').val(datapaciente.nombres);
                    $('#pac_fecha_nacimiento').val(datapaciente.fecha_nacimiento);
                    $('#pac_tipo_documento').val(datapaciente.tipo_documento);
                    $('#pac_nro_documento').val(datapaciente.num_doc_id);
                    $('#pac_sexo').val(datapaciente.genero?1:0);
                    $('#pac_email').val(datapaciente.correo_electronico);
                    $('#pac_movil').val(datapaciente.cel_pac);
                    $('#pac_edad').val( fnCalculaEdad( datapaciente.fecha_nacimiento) );
                }
                $('#nuevo_paciente').on('hidden.bs.modal', function () {
                    if($('#nuevo_paciente_json').val() != ''){
                        var pacientenuevo = JSON.parse($('#nuevo_paciente_json').val());
                        Swal.fire({
                            icon: 'success',
                            title: 'Paciente generado con el código: ' + pacientenuevo.cod_hia,
                            showConfirmButton: true,
                        }).then((value) => {
                            var datanuevo = {
                                'cod_hia':pacientenuevo.cod_hia,
                                'tipo_documento':pacientenuevo.id_doc_id, 'num_doc_id': pacientenuevo.num_doc_id, 'apellido_paterno': pacientenuevo.appat_pac,
                                'apellido_materno': pacientenuevo.apmat_pac, 'nombres': pacientenuevo.nom_com, 'correo_electronico': pacientenuevo.correo_pac,
                                'fecha_nacimiento': pacientenuevo.fnac_pac, 'genero': parseInt(pacientenuevo.sex_pac),
                                'id_matricula': (datapaciente?'':datapaciente.id_matricula), 'matricula2': (datapaciente?'':datapaciente.matricula2), 'division': (datapaciente?'':datapaciente.division),
                                'area_tribu_coe': (datapaciente?'':datapaciente.area_tribu_coe), 'servicio_tribu_coe': (datapaciente?'':datapaciente.servicio_tribu_coe), 'unidad_organizativa': (datapaciente?'':datapaciente.unidad_organizativa),
                                'funcion': (datapaciente?'':datapaciente.funcion), 'codigo_siga_superior': (datapaciente?'':datapaciente.codigo_siga_superior), 'matricula_superior': (datapaciente?'':datapaciente.matricula_superior),
                                'nombre_completo_superior': (datapaciente?'':datapaciente.nombre_completo_superior), 'correo_jefe': (datapaciente?'':datapaciente.correo_jefe), 'direcciones' : pacientenuevo.direcciones
                            }
                            formularioatencion(datanuevo);
                        });
                    }
                    //$('#nuevo_paciente_content').html('');
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
        $('#nuevo_paciente').modal('toggle');
    }

    function validarAtencion(row){
        if(row!=undefined && row!=null){   
            var data = { 'numdoc' : row.num_doc_id }
            let urldata = '<?php echo base_url() ?>Paciente/buscarpaciente';
            process(true);
            jQuery.ajax({
                url: urldata,
                async: true,
                data: { 'data': data },
                type: 'POST',
                success: function (response) {
                    var datospaciente = JSON.parse(response);
                    if(datospaciente.length > 0){
                        datospaciente = datospaciente[0];
                        var data = {
                            'cod_hia':datospaciente.cod_hia,
                            'tipo_documento':datospaciente.id_doc_id, 'num_doc_id': datospaciente.doc_identidad, 'apellido_paterno': datospaciente.appat_pac,
                            'apellido_materno': datospaciente.apmat_pac, 'nombres': datospaciente.nom_pac, 'correo_electronico': datospaciente.correo_pac,
                            'fecha_nacimiento': datospaciente.fnac_pac, 'genero': datospaciente.sex_pac?1:0, 'cel_pac': datospaciente.cel_pac,
                            'id_matricula': row.id_matricula, 'matricula2': row.matricula2, 'division': row.division,
                            'area_tribu_coe': row.area_tribu_coe, 'servicio_tribu_coe': row.servicio_tribu_coe, 'unidad_organizativa': row.unidad_organizativa,
                            'funcion': row.funcion, 'codigo_siga_superior': row.codigo_siga_superior, 'matricula_superior': row.matricula_superior,
                            'nombre_completo_superior': row.nombre_completo_superior, 'correo_jefe': row.correo_jefe, 'direcciones' : datospaciente.direcciones
                        }
                        formularioatencion(data);
                    }
                    else{
                        Swal.fire({
                            icon: 'warning',
                            title: 'Debe completar sus datos para continuar con la atención',
                            showConfirmButton: true,
                            //timer: 1500
                        }).then((value) => {
                            formularionuevopaciente(row);
                        });
                    }
                },
                error: function(err){
                    console.log(err);
                    Swal.fire({
                        icon: 'error',
                        title: 'ERROR DESCONOCIDO',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            }).then(()=>{
                process(false);
            })
        }
    }

</script>