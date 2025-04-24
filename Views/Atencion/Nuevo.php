<input id="ate_cod_hia" name="ate_cod_hia" class="form-control" type="text" hidden>
<input id="ate_usuario" name="ate_usuario" class="form-control" type="text" value="<?php echo $_SESSION['usuario']; ?>" hidden>
<div class="row">
    <h4>Paciente</h4>
</div>
<div class="row">
    <div class="col-7">
        <div class="row" id="divbuscapaciente" style="display:none">
            <div class="col-11">
                <input id="ate_busca_paciente" name="ate_ubigeo" class="form-control uppercase" type="text" value="">
                <div id="ate_busca_paciente_result"></div>
                <input type="text" class="form-control" id="ate_busca_paciente_id" disabled="" hidden>
            </div>
            <div class="col-1 pl-0">
                <button class="btn btn-primary" type="submit" id="btnBuscarPaciente" onclick="configurarBuscarPaciente();"><i class="fas fa-search"></i></button>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label>Apellido paterno</label>
            </div>
            <div class="col-9">
                <input id="ate_ape_paterno" name="ate_ape_paterno" class="form-control uppercase" type="text" value="" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label>Apellido materno</label>
            </div>
            <div class="col-9">
                <input id="ate_ape_materno" name="ate_ape_materno" class="form-control uppercase" type="text" value="" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label>Nombres</label>
            </div>
            <div class="col-9">
                <input id="ate_nombres" name="ate_nombres" class="form-control uppercase" type="text" value="" disabled>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-lg-6">
                    <label>Tipo Documento</label>
                    <div class="input-group">
                        <select id="ate_tipo_documento" class="form-control" name="ate_tipo_documento" disabled>
                            <option value="2">DNI</option>
                            <option value="3">CARNE EXTR.</option>
                            <option value="5">PASAPORTE</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label>Nro Documento</label>
                    <input id="ate_nro_documento" name="ate_nro_documento" class="form-control" type="number" value="" disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label>Email</label>
            </div>
            <div class="col-9">
                <input id="ate_email" name="ate_email" class="form-control uppercase" type="text" value="" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label>Fecha Nacimiento</label>
                <div class="input-group">
                    <input id="ate_fecha_nacimiento" name="ate_fecha_nacimiento" class="form-control" type="date" value="" disabled>    
                </div>
            </div>
            <div class="col-lg-3">
                <label>Edad</label>
                <input id="ate_edad" name="ate_edad" class="form-control" type="number" value="" readonly>
            </div>
            <div class="col-lg-3">
                <label>Tlf.Movil</label>
                <input id="ate_movil" name="ate_movil" class="form-control" type="number" value="" disabled>
            </div>
        </div>
    </div>
    <div class="col-5">
        <div class="row">
            <div class="col-3">
                <label>Género</label>
            </div>
            <div class="col-9">
                <select id="ate_sexo" class="form-control" name="ate_sexo" disabled>
                    <option value="1">MASCULINO</option>
                    <option value="0">FEMENINO</option>
                </select>
            </div>
        </div>

        <ul class="nav nav-tabs tab" id="ate_tab_modulo">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#tab_datos">Datos</a>
            </li>
            <li class="nav-item">
                <a id="tabsited" class="nav-link" href="#tab_siteds">Siteds</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab_datos" role="tabpanel" aria-labelledby="datos-tab">
                <div class="modal-body">
                    <div id="datos_bcp">
                        <div class="row" id="matricula">
                            <div class="col-3">
                                <label>Matrícula</label>
                            </div>
                            <div class="col-9">
                                <input id="ate_matricula" name="ate_matricula" class="form-control uppercase" type="text" value="" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label>Tipo ingreso</label>
                            </div>
                            <div class="col-9">
                                <select id="ate_tipoingreso" class="form-control" name="ate_tipoingreso">
                                    <option value="CASO CONFIRMADO">CASO CONFIRMADO</option>
                                    <option value="CASO SOSPECHOSO">CASO SOSPECHOSO</option>
                                    <option value="CASO PROBABLE">CASO PROBABLE</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Fecha Inicio</label>
                                </div>
                            <div class="col-9">
                                <input id="ate_fecha_inicio" name="ate_fecha_inicio" class="form-control" type="date" value="" >
                            </div>
                        </div>
                    </div>

                    <div id="datos_covid">
                        <!-- <button class="btn btn-primary" id="ate_btnBuscarSiteds"><i class="fas fa-book-medical"></i> Siteds</button> -->
                        <div class="row">
                            <div class="col-3">
                                <label>Fecha Examen</label>
                            </div>
                            <div class="col-9">
                                <input id="ate_fechaexamen" class="form-control" type="date" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label>Atencion Referenciada</label>
                            </div>
                            <div class="col-3 pl-0">
                                <input id="ate_ref" class="form-control uppercase" type="text" value="" disabled>
                            </div>
                            <div class="col-2 pl-0 pr-0">
                                <label>Cod.Lab</label>
                            </div>
                            <div class="col-3 pl-0">
                                <input id="ate_codlab" class="form-control uppercase" type="text" value="" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label>Examen Laboratorio</label>
                            </div>
                            <div class="col-9">
                                <input id="ate_examenlab" class="form-control uppercase" type="text" value="">
                            </div>
                        </div>
                        <div class="row" id="ate_bloqueclasificacion">
                            <div class="col-3">
                                <label>Clasificación</label>
                            </div>
                            <div class="col-9">
                                <select id="ate_clasificacion" class="form-control" >
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show" id="tab_siteds" role="tabpanel" aria-labelledby="siteds-tab">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3">
                            <label>Aeguradora</label>
                        </div>
                        <div class="col-9">
                            <select id="ate_aseguradora" class="form-control">
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9">
                            <button class="btn btn-primary" id="ate_btnBuscarSiteds"><i class="fas fa-book-medical"></i> Siteds</button>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-3">
                            <label>Empresa</label>
                        </div>
                        <div class="col-9">
                            <input id="ate_siteds_empresa" class="form-control uppercase" type="text" value="" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label>Cod.Autorización</label>
                        </div>
                        <div class="col-9">
                            <input id="ate_siteds_codautorizacion" class="form-control uppercase" type="text" value="" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label>Cod.Asegurado</label>
                        </div>
                        <div class="col-9">
                            <input id="ate_siteds_asegurado" class="form-control uppercase" type="text" value="" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label>Tipo Afiliación</label>
                        </div>
                        <div class="col-9">
                            <input id="ate_siteds_tipoafiliacion" class="form-control uppercase" type="text" value="" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label>Producto</label>
                        </div>
                        <div class="col-9">
                            <input id="ate_siteds_producto" class="form-control uppercase" type="text" value="" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label>Póliza</label>
                        </div>
                        <div class="col-9">
                            <input id="ate_siteds_poliza" class="form-control uppercase" type="text" value="" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<form action="" id="form_direcciones">
    <div class="row">
        <h4>Dirección</h4>
    </div>
    <div class="row">
        <div class="table-responsive mt-4">
            <table class="table table-hover table-bordered" id="ate_direcciones" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <!-- <td>Cod.Dir</td>
                        <td>Cod Dis</td> -->
                        <td>Distrito</td>
                        <td>Provincia</td>
                        <td>Departamento</td>
                        <td>Dirección</td>
                        <td>Referencia</td>
                        <td>Telef casa</td>
                        <td>Telef trabajo</td>
                        <td>Telef Anexo</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>


<div class="card-footer">
    <button id="ate_btnAtencion" name="ate_btnAtencion" class="btn btn-primary col-lg-2" type="button" ><i class="fas fa-save"></i> Crear atención</button>
    <button class="btn btn-primary col-lg-2" type="button" onclick="formularionuevopaciente();"><i class="fas fa-user-alt"></i></i> Nuevo Paciente</button>
    <a class="btn btn-danger" data-dismiss="modal"><i class="fas fa-arrow-alt-circle-left"></i> Cerrar</a>
</div>

<style>
    tbody tr.odd.selected{
        background-color: #acbad4;
    }
    tbody tr.even.selected{
        background-color: #acbad4;
    }
</style>

<script>
    var indextabledireccion;
    $(document).ready(function(){
        $('#ate_fecha_inicio').attr('max', fnCurrentDate());

        jQuery('#ate_direcciones').on('click', 'button', function (data) {
            var data = jQuery('#ate_direcciones').DataTable().row(jQuery(this).parents('tr')).data();
            if(jQuery(this)[0].id == 'per_direccionedit')
                seteditdireccion(data, $(this).parents('tr').index());
            if(jQuery(this)[0].id == 'per_direcciondelete')
                jQuery('#ate_direcciones').DataTable().row( $(this).parents('tr') ).remove().draw();
            
        });

        jQuery('#ate_btnAtencion').on('click', function (data) {
            if ( !validardatospersona() ) { return false; }
            if ( !validardireccion() ) { return false; }

            $('#nuevo_atencion').modal('hide');
            Swal.fire({
                title: '¿Estás seguro de la acción?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Si',
                denyButtonText: 'No',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    grabarAtencion();
                } else if (result.isDismissed) {
                    $('#nuevo_atencion').modal('show');
                }
            });
        });

        jQuery('#ate_busca_paciente_id').on('change', function (data) {
            let urldata = '<?php echo base_url() ?>Paciente/BuscarPacientePorCodHia?cod_hia='+$(this).val();
            jQuery.ajax({
                url: urldata,
                async: true,
                type: 'GET',
                success: function (response) {
                    var data = JSON.parse(response);
                    if(data){
                        $('#ate_cod_hia').val(data.cod_hia);
                        $('#ate_ape_paterno').val(data.appat_pac);
                        $('#ate_ape_materno').val(data.apmat_pac);
                        $('#ate_nombres').val(data.nom_pac);
                        $('#ate_sexo').val(data.sex_pac?1:0);
                        $('#ate_nro_documento').val(data.num_doc_id);
                        $('#ate_tipo_documento').val(data.id_doc_id);
                        $('#ate_email').val(data.correo_pac);
                        $('#ate_fecha_nacimiento').val(data.fnac_pac);
                        $('#ate_edad').val(data.edad.y);
                        $('#ate_movil').val(data.cel_pac);
                        $('#ate_matricula').val('');
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
                error: function(err){
                    console.log(err);
                    Swal.fire({
                        icon: 'error',
                        title: 'ERROR DESCONOCIDO',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            });
        });

        if( $('#datos_covid').css('display') == 'block' ){
            cargarclasificaciones();
            cargaraseguradoras();
        }

        jQuery('#ate_btnBuscarSiteds').on('click', function (data) {
            formulariositeds();
        });

        $("#ate_tab_modulo a").click(function(e){
            e.preventDefault();
            $('#tab_datos').removeClass("active").removeClass("show");
            $('#tab_siteds').removeClass("active").removeClass("show");
            $(this).tab("show");
        });
        
    });
    function cargarclasificaciones(){
        let urldata = '<?php echo base_url() ?>Seguimiento/getClasificaciones';
        jQuery.ajax({
            url: urldata,
            async: false,
            type: 'GET',
            success: function (response) {
                var data = JSON.parse(response);
                $.each(data, function(index, value) {
                    $('#ate_clasificacion').append( $('<option />').val(value.cod_clasif).text(value.nom_clasif) );
                });
            },
            error: function(err){
                console.log(err);
            }
        });
    }

    function grabarAtencion(){
        var direccion = jQuery('#ate_direcciones').DataTable().data();
        var cod_hia = $('#ate_cod_hia').val();
        var apepaterno = $('#ate_ape_paterno').val();
        var apematerno = $('#ate_ape_materno').val();
        var nombres = $('#ate_nombres').val();
        var user = $('#ate_usuario').val();
        var fecha_atencion = $('#ate_fecha_inicio').val();
        var cod_dir = direccion[0].cod_dir;
        var cod_dis = direccion[0].cod_dis;
        var tipo_ingreso = $('#ate_tipoingreso').val();
        var matricula = $('#ate_matricula').val();

        var cod_ate = ($('#ate_ref').val()==''?0:$('#ate_ref').val());
        var cod_lab = ($('#ate_codlab').val()==''?0:$('#ate_codlab').val());
        var examenlab = $('#ate_examenlab').val();
        var codaseguradora = '999';
        var txtaseguradora = 'PARTICULAR';
        var siteds_codautorizacion = $('#ate_siteds_codautorizacion').val();
        var clasif_ate_referenciada = '-1';

        var datos_covid = 0;
        if( $('#datos_covid').css('display') == 'block' ){
            datos_covid = 1;
            if( cod_ate != '' ){
                if( cod_lab != '' ){
                    tipo_ingreso = "SEG COVID ASOCIADO";    
                }
                else{
                    tipo_ingreso = "SEG COVID CASO EXTERNO";
                }
            }else{
                tipo_ingreso = "SEG COVID SIN ASOCIACION";
            }
            if( $('#ate_bloqueclasificacion').css('display') == 'block' ){
                clasif_ate_referenciada =  $('#ate_clasificacion').val();
            }
            codaseguradora = $('#ate_aseguradora').val();
            txtaseguradora = $( "#ate_aseguradora option:selected" ).text();
        }

        var datasend = {
            'user' : user,
            'cod_tit': cod_hia,
            'apepat': apepaterno,
            'apemat': apematerno,
            'nombre': nombres, 
            'fec_ate': fecha_atencion,
            'cod_dir': cod_dir,
            'cod_dis': cod_dis,
            'tipo_ingreso': tipo_ingreso,
            'id_matricula': matricula,
            'datos_covid': datos_covid,
            'cod_ate': cod_ate,
            'cod_lab': cod_lab,
            'examenlab': examenlab,
            'codaseguradora': codaseguradora,
            'txtaseguradora': txtaseguradora,
            'siteds_codautorizacion' : siteds_codautorizacion,
            'clasif_ate_referenciada': clasif_ate_referenciada
        }
        let urldata = '<?php echo base_url() ?>Atencion/insertAtencion';
        jQuery.ajax({
            url: urldata,
            async: false,
            data: { 'dataatencion' : datasend },
            type: 'POST',
            success: function (response) {
                var dataresponse = JSON.parse(response);
                if(dataresponse.success)
                {
                    $('#nuevo_codigo_atencion').val(dataresponse.data.cod_atencion);
                    $('#nuevo_atencion').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Atención generada con el código: ' + dataresponse.data.cod_atencion,
                        showConfirmButton: true,
                        //timer: 2000
                    }).then((value) => {
                        if(datos_covid){
                            window.location.href = '<?php echo base_url() ?>Seguimiento/SeguimientoCovid'; 
                        }else{
                            window.location.href = '<?php echo base_url() ?>Seguimiento/Seguimiento'; 
                        }
                    });
                }
                else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Hubieron errores en la creación de la atención',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    $('#nuevo_atencion').modal('hide');
                }
            },
            error: function(err){
                console.log(err);
                Swal.fire({
                    icon: 'error',
                    title: 'Hubieron errores en la creación del paciente',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        })
    }

    function validardireccion(){
        var countdirecciones = jQuery('#ate_direcciones').DataTable().rows('.selected').data().count();
        if(countdirecciones == 0)
        {
            $('#nuevo_atencion').modal('hide');
            Swal.fire({
                icon: 'warning',
                title: 'Debe seleccionar una dirección',
                showConfirmButton: false,
                timer: 1500
            }).then((value) => {
                $('#nuevo_atencion').modal('show');
            });
            return false;
        }
        else return true;
    }
    function validardatospersona(){
        var errores = [];

        if( $('#datos_bcp').css('display') == 'block' ){
            if($('#ate_fecha_inicio').val() == '') {errores.push('Ingrese FECHA DE INCIO');}
            else{
                if(fnIsNewerThanToday( document.getElementById('ate_fecha_inicio') )){
                    errores.push('Fecha inicio debe ser menor que fecha actual');
                }
            }
        }
        
        if($('#ate_ape_paterno').val() == '') errores.push('Ingrese APELLIDO PATERNO');
        if($('#ate_ape_materno').val() == '') errores.push('Ingrese APELLIDO MATERNO');
        if($('#ate_nombres').val() == '') errores.push('Ingrese NOMBRES');
        if($('#ate_fecha_nacimiento').val() == '') errores.push('Ingrese FECHA DE NACIMIENTO');

        if($('#ate_tipo_documento').val() == '') { errores.push('Ingrese TIPO DOCUMENTO'); }
        else{
            if( $('#ate_tipo_documento').val() == 2 && $('#ate_nro_documento').val().length != 8 ){ errores.push('Verifique el nro de dígitos del documento');}
            else if($('#ate_tipo_documento').val() == 3 && $('#ate_nro_documento').val().length != 9){ errores.push('Verifique el nro de dígitos del documento');}
            else if( $('#ate_nro_documento').val().length > 15 ){ errores.push('Verifique el nro de dígitos del documento'); }
            
        }
        if($('#ate_nro_documento').val() == '') errores.push('Ingrese NRO DOCUMENTO');
        if($('#ate_sexo').val() == '') errores.push('Ingrese GÉNERO');
        if( $('#ate_direcciones').DataTable().rows().count() == 0 ) errores.push('Ingrese al menos una DIRECCION');
        if(errores.length>0)
        {
            $('#nuevo_atencion').modal('hide');
            Swal.fire({
                icon: 'warning',
                title: errores.join('\n'),
                showConfirmButton: false,
                timer: 1500
            }).then((value) => {
                $('#nuevo_atencion').modal('show');
            });
            //window.alert(errores.join('\n'));
            return false;
        }
        else return true;
    }
    function configurarBuscarPaciente(){
        findtextdata(document.getElementById('ate_busca_paciente'), 'Paciente/getPacientesBuscar', -1, 5);
    }
    function formulariositeds(data){
        let urldata = '<?php echo base_url() ?>Seguimiento/Siteds';
        $.ajax({
            url: urldata,
            async: false,
            type: 'GET',
            success: function (response) {
                $('#siteds_content').html(response);
                $('#nuevo_atencion').modal('hide');
                $('#siteds').modal('show');

                $('#siteds_hiddenaseguradoravalue').val($('#ate_aseguradora').val());
                $('#cod_unidad_seguimiento').val(29);
                $('#unidad_seguimiento').val('SEGUIMIENTO COVID');
                // $('#ate_cod_hia').val(data.cod_hia);
                // $('#ate_ape_paterno').val(data.apellido_paterno);
                // $('#ate_ape_materno').val(data.apellido_materno);
                // $('#ate_nombres').val(data.nombres);                
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

        $('#siteds').on('hidden.bs.modal', function () {
            debugger;
            $('#nuevo_atencion').modal('show'); 
            var datos_siteds = JSON.parse($('#siteds_json').val());
            $('#ate_siteds_empresa').val(datos_siteds.DatosAfiliado.NombreContratante);
            $('#ate_siteds_codautorizacion').val($('#siteds_codigoautorizacion').val());
            $('#ate_siteds_asegurado').val(datos_siteds.DatosAfiliado.CodigoAfiliado);
            $('#ate_siteds_tipoafiliacion').val(datos_siteds.DatosAfiliado.DesTipoAfiliacion);
            $('#ate_siteds_producto').val(datos_siteds.DatosAfiliado.DesProducto);
            $('#ate_siteds_poliza').val(datos_siteds.DatosAfiliado.NumeroPoliza);
        });
    }
    function cargaraseguradoras(){
        let urldata = '<?php echo base_url() ?>Siteds/CargarAseguradoras';
        $('#ate_aseguradora').find('option').remove();
        $.ajax({
            url: urldata,
            async: true,
            type: 'POST',
            success: function (response) {
                var data = JSON.parse(response);
                $.each(data, function(index, value) {
                    $('#ate_aseguradora').append( $('<option />').val(value.cod_cliente).text(value.cliente) );
                    $('#ate_aseguradora option:last').attr('data-financ', value.cod_financ);
                });
                $('#ate_aseguradora').val("044");
            },
            error: function(er){
                var a = er;
            }
        })
    }


</script>