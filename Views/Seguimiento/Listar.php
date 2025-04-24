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
                                <li class="offset-5"><h6 class="title text-white text-center"> PACIENTES SIN SEGUIMIENTO</h6></li>
                            </ol>
                        </nav>
                        <div class="modal-body">
                            <div class="row">
                                
                                <div class="col-lg-2">
                                    <label for="fecha_inicio">Empresa</label>
                                    <div class="input-group">
                                        <select id="busca_empresa" class="form-control" name="busca_empresa">
                                            <option value="1" selected>BCP</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label for="fecha_inicio">Apellido paterno</label>
                                    <div class="input-group">
                                        <input class="form-control uppercase" type="text" id="busca_apepaterno" name="busca_apepaterno" value="">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label for="fecha_inicio">Apellido materno</label>
                                    <div class="input-group">
                                        <input class="form-control uppercase" type="text" id="busca_apematerno" name="busca_apematerno" value="">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label for="fecha_inicio">Nombres</label>
                                    <div class="input-group">
                                        <input class="form-control uppercase" type="text" id="busca_nombres" name="busca_nombres" value="">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label for="fecha_inicio">Tipo Documento</label>
                                    <div class="input-group">
                                        <select id="busca_tipodoc" class="form-control" name="busca_tipodoc">
                                            <option value="2">DNI</option>
                                            <option value="3">CARNE EXTR.</option>
                                            <option value="5">PASAPORTE</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label for="fecha_inicio">Nro documento</label>
                                    <div class="input-group">
                                        <input class="form-control" type="number" id="busca_nrodocumento" name="busca_nrodocumento" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary col-lg-2" type="submit" id="reg_btnBuscar"><i class="fas fa-search"></i> Buscar</button>
                                    <button class="btn btn-primary col-lg-2" type="button" id="reg_nuevopaciente"><i class="fas fa-diagnoses"></i></i> Nuevo Sin Asociación</button>
                                    <button class="btn btn-primary col-lg-2" type="button" onclick="formularionuevopaciente();"><i class="fas fa-user-alt"></i></i> Nuevo Paciente</button>
                                    <!-- <button class="btn btn-primary col-lg-3" type="submit" id="reg_btnNuevoPaciente"><i class="fas fa-user-plus"></i> Nuevo Paciente</button> -->
                                    <button class="btn btn-primary col-lg-2" type="button" data-toggle="modal" data-target="#nueva_carga"><i class="fas fa-file-excel"></i> Cargar Empleados</button>
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
                                            <th>Matrícula</th>
                                            <th>Matrícula2</th>
                                            <th>Tipo Documento</th>
                                            <th>Documento</th>
                                            <th>Ape.Paterno</th>
                                            <th>Ape.Materno</th>
                                            <th>Nombres</th>
                                            <th>Sexo</th>
                                            <th>Fec.Nacimiento</th>
                                            <th>División</th>
                                            <th>Area Tribu</th>
                                            <th>Servicio Tribu</th>
                                            <th>Unid.Organizativa</th>
                                            <th>Función</th>
                                            <th>Correo</th>
                                            <th>Cod.Siga</th>
                                            <th>Matr.Superior</th>
                                            <th>Nombre Jefe</th>
                                            <th>Correo Jefe</th>
                                            <th>Correo analista</th>
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

<div id="nueva_carga" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Nuevo Carga Empleados</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/Seguimiento/empleadocargar" autocomplete="off">
                <div class="modal-body">
                    <input type="hidden" id="json_data" name="json_data" value=""></input>
                    <input type="hidden" id="json_data_final" name="json_data_final" value=""></input>
                    <input type="hidden" name="modal_cod_empresa" >
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="nombre">Empresa</label>
                            <input id="modal_empresa_nombre" class="form-control" disabled readonly type="text" name="modal_empresa_nombre" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="nro_veces">Archivo de carga de empleados</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="fileEmpleados" accept=".xls, .xlsx">
                                <label class="custom-file-label" for="fileEmpleados">Subir archivo</label>
                            </div>
                        </div>

                        <div class="col-lg-4"><br/>
                            <a href="/Assets/documents/seguimiento_empleados.xlsx" class="btn btn-warning"><i class="fas fa-file-download"></i> Descargar Plantilla</a>
                        </div>
                        
                    </div><br/>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="TablaCarga">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Id</th>
                                            <th>Matrícula</th>
                                            <th>Matrícula2</th>
                                            <th>Documento</th>
                                            <th>Documento</th>
                                            <th>Ape.Paterno</th>
                                            <th>Ape.Materno</th>
                                            <th>Nombres</th>
                                            <th>Sexo</th>
                                            <th>Fec.Nacimiento</th>
                                            <th>División</th>
                                            <th>Area Tribu</th>
                                            <th>Servicio Tribu</th>
                                            <th>Unid.Organizativa</th>
                                            <th>Función</th>
                                            <th>Correo</th>
                                            <th>Cod.Siga</th>
                                            <th>Matr.Superior</th>
                                            <th>Nombre Jefe</th>
                                            <th>Correo Jefe</th>
                                            <th>Correo analista</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>                        
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary confirmar" type="submit" id="btn_cargardatos"><i class="fas fa-save"></i> Cargar datos</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
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

<?php pie() ?>


<script src="/Assets/js/xlsx.full.min.js"></script>

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

        $("#btn_cargardatos").click(function(e){
            e.preventDefault();

            var data = JSON.parse( $('#json_data_final').val() );
            if(data){
                process(true);
                let urldata = '<?php echo base_url() ?>Seguimiento/EmpleadoCargar';
                $.ajax({
                    url: urldata,
                    async: false,
                    data: data,
                    type: 'POST',
                    success: function (response) {
                        var data = JSON.parse(response);
                        if(data.success){
                            Swal.fire({
                                icon: 'success',
                                title: 'Carga exitosa',
                                showConfirmButton: true,
                                //timer: 2000
                            }).then((value) => {
                                $('#reg_btnBuscar').trigger('click');
                            });
                        }
                        else{
                            Swal.fire({
                                icon: 'error',
                                title: 'ERROR en la carga: ' + data.message,
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                    },
                    error: function (err) {
                        Swal.fire({
                            icon: 'error',
                            title: 'ERROR en la carga: ' + err.getMessage(),
                            showConfirmButton: false,
                            timer: 2000
                        });
                    },
                    finally: function(){
                        $('#nueva_carga').hide();
                        $('#nueva_carga').close();
                    }
                }).then(()=>{
                    process(false);
                })
            }        
        });

        $('#reg_btnBuscar').on('click', function(event) {
            event.preventDefault();

            let empresa = $('#busca_empresa').val();
            let ape_paterno = $('#busca_apepaterno').val();
            let ape_materno = $('#busca_apematerno').val();
            let nombres = $('#busca_nombres').val();
            let tipodoc = $('#busca_tipodoc').val();
            let nrodocumento = $('#busca_nrodocumento').val();
            let urldata = '<?php echo base_url() ?>Seguimiento/buscar?empresa='+empresa+'&ape_paterno='+ape_paterno+'&ape_materno='+ape_materno+'&nombres='+nombres+'&tipodoc='+tipodoc+'&numdoc='+nrodocumento;
            process(true);
            jQuery.ajax({
                url: urldata,
                async: true,
                type: 'GET',
                success: function (response) {
                    response = JSON.parse(response);
                    let tablaH = jQuery('#reg_Table');
                    tablaH.DataTable().clear();
                    tablaH.DataTable().destroy();
                    tablaH.DataTable( {
                        data: response.data,
                        columns: [
                            {
                                "data": null,
                                "render": function ( data, type, row, meta ) {
                                    return '<button id="nuevacarga" class="btn btn-primary" type="button"><i class="fas fa-ambulance"></i></button>';
                                }
                            },
                            { "data": "id_matricula" },
                            { "data": "matricula2" },
                            {
                                "data": "tipo_documento",
                                "render": function ( data, type, row, meta ) {
                                    let des_tipodocumento = tipos_documento.find(x => x.id === row.tipo_documento).nombre;
                                    return des_tipodocumento.toUpperCase();
                                }
                            },
                            { "data": "num_doc_id" },
                            { "data": "apellido_paterno" },
                            { "data": "apellido_materno" },
                            { "data": "nombres" },
                            {
                                "data": "genero",
                                "render": function ( data, type, row, meta ) {
                                    return row.genero?'MASCULINO':'FEMENINO';
                                }
                            },
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
                            { "data": "correo_jefe" }
                        ]
                    });
                }
            }).then(()=>{
                process(false);
            })
        });
        
        $('#reg_nuevopaciente').on('click', function(event) {
            formularioatencion();
            $('#divbuscapaciente').css('display', 'flex');
        });        

        jQuery('#reg_Table tbody').on('click', 'button', function () {
            var data = jQuery('#reg_Table').DataTable().row(jQuery(this).parents('tr')).data();
            if(jQuery(this)[0].id == 'nuevacarga'){
                validarAtencion(data);
            }
            return false;
        });
    });

    var selectedFile;
    document.getElementById("fileEmpleados").addEventListener("change", function(event) {
        selectedFile = event.target.files[0];
        if (selectedFile) {
          var fileReader = new FileReader();
          fileReader.onload = function(event) {
            var data = event.target.result;

            var workbook = XLSX.read(data, {
              type: "binary"
            });
            var jsonarray = [];
            workbook.SheetNames.forEach(sheet => {
              let rowObject = XLSX.utils.sheet_to_row_object_array(
                workbook.Sheets[sheet]
              );
              let jsonObject = rowObject;
              jsonarray.push(jsonObject);
            });
            cargarTabla(JSON.stringify(jsonarray[0]));
            console.log(JSON.stringify(jsonarray[0]));
          };
          fileReader.readAsBinaryString(selectedFile);
          event.target.value = '';
        }
    });

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
        let urldata = '<?php echo base_url() ?>Atencion/NuevaAtencion';
        $.ajax({
            url: urldata,
            async: false,
            type: 'GET',
            success: function (response) {
                $('#nuevo_atencion_content').html(response);
                $('#datos_covid').css('display', 'none');
                $('#datos_bcp').css('display', 'block');
                $('#tabsited').css('display', 'none');
                $('#nuevo_atencion').modal('show');
                if(data){
                    $('#ate_cod_hia').val(data.cod_hia);
                    $('#ate_ape_paterno').val(data.apellido_paterno);
                    $('#ate_ape_materno').val(data.apellido_materno);
                    $('#ate_nombres').val(data.nombres);
                    $('#ate_fecha_nacimiento').val(data.fecha_nacimiento);
                    $('#ate_tipo_documento').val(data.tipo_documento);
                    $('#ate_nro_documento').val(data.num_doc_id);
                    $('#ate_sexo').val(data.genero);
                    $('#ate_email').val(data.correo_electronico);
                    $('#ate_movil').val(parseInt(data.cel_pac));
                    $('#ate_edad').val(fnCalculaEdad(data.fecha_nacimiento));
                    $('#ate_matricula').val(data.id_matricula);

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
                                // { "data": "cod_dir" },
                                // { "data": "cod_dis" },
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