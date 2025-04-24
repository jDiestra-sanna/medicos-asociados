<input hidden id="obs_idparent" type="text" value=""/>
<div class="modal-body">
    <div class="col-md-12">
        <input type="hidden" id="siteds_hiddenaseguradoravalue">
        <ul class="nav nav-tabs tab" id="tabs_siteds">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#tab_busqueda">Búsqueda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#tab_paciente">Datos de paciente</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab_busqueda" role="tabpanel" aria-labelledby="busqueda-tab">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row pt-1">
                            <label for="cb_aseguradora">Aseguradora</label>
                                <select id="cb_aseguradora" class="form-control col-md-3" name="cb_aseguradora">
                                </select>
                                <label for="unidad_seguimiento" class="col-md-3 offset-3">Unidad negocio/clasificacion</label>
                                <input id="cod_unidad_seguimiento" class="form-control col-md-2" type="hidden" hidden name="cod_unidad_seguimiento">
                                <input id="unidad_seguimiento" class="form-control col-md-2" type="text" name="unidad_seguimiento" placeholder="Unidad seguimiento" readonly="">
                        </div>
                        <div class="row pt-1">
                            <input id="siteds_ape_paterno" class="form-control col-md-2 uppercase" type="text" name="siteds_ape_paterno" placeholder="Apellido paterno">
                            <input id="siteds_ape_materno" class="form-control col-md-2 uppercase" type="text" name="siteds_ape_materno" placeholder="Apellido materno">
                            <input id="siteds_nombres" class="form-control col-md-2 uppercase" type="text" name="siteds_nombres" placeholder="Nombres">
                            <label for="siteds_tipo_doc" class="col-md-1">Tipo Doc</label>
                            <select id="siteds_cb_tipodoc" class="form-control col-md-2" name="siteds_cb_tipodoc">
                                <option value="2">DNI</option>
                                <option value="3">CARNE EXTR.</option>
                                <option value="5">PASAPORTE</option>
                            </select>
                            <label for="siteds_nro_doc" class="col-md-1">NroDoc</label>
                            <input id="siteds_nro_doc" class="form-control col-md-2" type="text" name="siteds_nro_doc" placeholder="Nro Doc">
                        </div>
                        <div class="row pt-1">
                            <button class="btn btn-primary" type="button" id="siteds_buscar"><i class="fas fa-search"></i> Buscar en SITEDS</button>
                        </div>
                        <div class="row pt-1">
                            <h5>LISTADO DE ASEGURADOS</h5>
                            <div class="table-responsive mt-4">
                                <table class="table table-hover table-bordered" id="tblsiteds">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>DesProducto</th>
                                            <th>ApellidoPaternoAfiliado</th>
                                            <th>ApellidoMaternoAfiliado</th>
                                            <th>NombresAfiliado</th>
                                            <th>DesParentesco</th>
                                            <th>NombreContratante</th>
                                            <th>DesEstado</th>
                                            <th>CodigoAfiliado</th>
                                            <th>FechaNacimiento</th>
                                            <th>DesGenero</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <button id="siteds_selecciona" name="siteds_selecciona" class="btn btn-primary offset-9" type="button" ><i class="fas fa-check"></i> Selecciona asegurado</button>
                            <a class="btn btn-danger" data-dismiss="modal"><i class="fas fa-arrow-alt-circle-left"></i> Cerrar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab_paciente" role="tabpanel" aria-labelledby="paciente-tab">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <h5>INFORMACIÓN GENERAL</h5>
                        </div>
                        <div class="row">
                            <label for="siteds_autorizacion" class="col-md-2">N° Autorización: </label>
                            <input id="siteds_autorizacion" class="form-control col-md-2" type="text" style="font-weight:bold;">
                            <label for="siteds_asegurado" class="col-md-2">Código de asegurado: </label>
                            <input id="siteds_asegurado" class="form-control col-md-2" type="text" readonly>
                            <label for="siteds_accidente" class="col-md-2">N° declaración accidente: </label>
                            <input id="siteds_accidente" class="form-control col-md-2" type="text">
                        </div>
                        <div class="row">
                            <label for="siteds_poliza" class="col-md-2">Póliza/contrato: </label>
                            <input id="siteds_poliza" class="form-control col-md-2" type="text" readonly>
                            <label for="siteds_certificado" class="col-md-2">Certificado: </label>
                            <input id="siteds_certificado" class="form-control col-md-2" type="text" readonly>
                            <label for="siteds_solicitud" class="col-md-2">N° Solicitud Origen: </label>
                            <input id="siteds_solicitud" class="form-control col-md-2" type="text">
                        </div>
                        <div class="row">
                            <label for="siteds_producto" class="col-md-2">Producto: </label>
                            <input id="siteds_producto" class="form-control col-md-6" type="text" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <h5>DATOS DEL PACIENTE</h5>
                        </div>
                        <div class="row">
                            <label for="siteds_nombres" class="col-md-2">Apellidos y nombres: </label>
                            <input id="siteds_nombres" class="form-control col-md-6" type="text" readonly>
                        </div>
                        <div class="row">
                            <label for="siteds_genero" class="col-md-2">Género: </label>
                            <input id="siteds_genero" class="form-control col-md-2" type="text" readonly>
                            <label for="siteds_fecnac" class="col-md-2">Fecha de nacimiento: </label>
                            <input id="siteds_fecnac" class="form-control col-md-2" type="text" readonly>
                            <label for="siteds_parentesco" class="col-md-2">Parentesco: </label>
                            <input id="siteds_parentesco" class="form-control col-md-2" type="text" readonly>
                        </div>
                        <div class="row">
                            <label for="siteds_tipodoc" class="col-md-2">Tipo Documento: </label>
                            <input id="siteds_tipodoc" class="form-control col-md-2" type="text" readonly>
                            <label for="siteds_numdoc" class="col-md-2">Num. de documento: </label>
                            <input id="siteds_numdoc" class="form-control col-md-2" type="text" readonly>
                            <label for="siteds_edad" class="col-md-2">Edad: </label>
                            <input id="siteds_edad" class="form-control col-md-2" type="text" readonly>
                        </div>
                        <div class="row">
                            <label for="siteds_inivigencia" class="col-md-2">Inicio Vigencia: </label>
                            <input id="siteds_inivigencia" class="form-control col-md-2" type="text" readonly>
                            <label for="siteds_finvigencia" class="col-md-2">Fin Vigencia: </label>
                            <input id="siteds_finvigencia" class="form-control col-md-2" type="text" readonly>
                            <label for="siteds_estadocivil" class="col-md-2">Estado Civil: </label>
                            <input id="siteds_estadocivil" class="form-control col-md-2" type="text" readonly>
                        </div>
                        <div class="row">
                            <label for="siteds_tipoplan" class="col-md-2">Tipo plan de salud: </label>
                            <input id="siteds_tipoplan" class="form-control col-md-2" type="text" readonly>
                            <label for="siteds_nroplan" class="col-md-2">N° de plan: </label>
                            <input id="siteds_nroplan" class="form-control col-md-2" type="text" readonly>
                            <label for="siteds_estado" class="col-md-2">Estado: </label>
                            <input id="siteds_estado" class="form-control col-md-2" type="text" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <h5>DATOS DEL TITULAR</h5>
                        </div>
                        <div class="row">
                            <label for="siteds_tit_nombres" class="col-md-2">Apellidos y nombres: </label>
                            <input id="siteds_tit_nombres" class="form-control col-md-6" type="text" readonly>
                        </div>
                        <div class="row">
                            <label for="siteds_tit_tipodoc" class="col-md-2">Tipo Documento: </label>
                            <input id="siteds_tit_tipodoc" class="form-control col-md-2" type="text" readonly>
                            <label for="siteds_tit_numdoc" class="col-md-2">Num. de documento: </label>
                            <input id="siteds_tit_numdoc" class="form-control col-md-2" type="text" readonly>
                            <label for="siteds_tit_moneda" class="col-md-2">Moneda: </label>
                            <input id="siteds_tit_moneda" class="form-control col-md-2" type="text" readonly>
                        </div>
                        <div class="row">
                            <label for="siteds_tit_contratante" class="col-md-2">Nombre contratante: </label>
                            <input id="siteds_tit_contratante" class="form-control col-md-6" type="text" readonly>
                            <label for="siteds_tit_tipodoc_contratante" class="col-md-2">Tipo documento contratante: </label>
                            <input id="siteds_tit_tipodoc_contratante" class="form-control col-md-2" type="text" readonly>
                        </div>
                        <div class="row">
                            <label for="siteds_tit_tipoafiliacion" class="col-md-2">Tipo de afiliación: </label>
                            <input id="siteds_tit_tipoafiliacion" class="form-control col-md-2" type="text" readonly>
                            <label for="siteds_tit_fecha_afiliacion" class="col-md-2">Fecha de afiliación: </label>
                            <input id="siteds_tit_fecha_afiliacion" class="form-control col-md-2" type="text" readonly>
                            <label for="siteds_tit_nro_doc_contratante" class="col-md-2">N° documento contratante: </label>
                            <input id="siteds_tit_nro_doc_contratante" class="form-control col-md-2" type="text" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <h5>LISTADO DE BENEFICIOS</h5>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="tblbeneficios" style="width:100%;">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>CodigoCobertura</th>
                                            <th>Beneficio</th>
                                            <th>Restricciones</th>
                                            <th>DesCopagoFijo</th>
                                            <th>DesCopagoVariable</th>
                                            <th>FechaFinCarencia</th>
                                            <th>CondicionesEspeciales</th>
                                            <th>Observaciones</th>
                                            <th>DesCalificacionServicio</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <img width="180" hidden id="imgDocumentoSiteds"/>
                        <button id="siteds_genera" name="siteds_genera" class="btn btn-primary col-lg-2" type="button" ><i class="fas fa-calendar-plus"></i> Generar atención de consulta</button>
                        <!-- <button id="siteds_verdocumento" name="siteds_verdocumento" class="btn btn-primary col-lg-2" type="button" disabled><i class="fas fa-file"></i> Ver documento de autorización</button> -->
                        <a id="siteds_verdocumento" class="btn btn-primary disabled"><i class="fas fa-file"></i> Ver documento de autorización</a>
                        <a id="siteds_continuar" class="btn btn-primary disabled"><i class="fas fa-angle-double-right"></i> Continuar atención</a>
                        <a class="btn btn-danger" data-dismiss="modal"><i class="fas fa-arrow-alt-circle-left"></i> Cerrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var datadetalle = null;
    var codigo_autorizacion = '';
    $(document).ready(function(){
        siteds_cargaraseguradoras();

        $('#siteds_buscar').on('click', function(event) {
            event.preventDefault();

            $('#tblsiteds').DataTable().clear();
            $('#tblsiteds').DataTable().destroy();
            $('#tblsiteds').DataTable({
                language: global_tablelanguage
            });
            $('#tblbeneficios').DataTable().clear();
            $('#tblbeneficios').DataTable().destroy();
            $('#tblbeneficios').DataTable({
                language: global_tablelanguage
            });
            let ape_paterno = $('#siteds_ape_paterno').val().toUpperCase();
            let ape_materno = $('#siteds_ape_materno').val().toUpperCase();
            let nombres = $('#siteds_nombres').val().toUpperCase();
            let tipo_doc = $('#siteds_cb_tipodoc').val();
            let num_doc = $('#siteds_nro_doc').val();
            let cod_financ = $($('#cb_aseguradora').find(":selected")).attr('data-financ');
            
            let urldata = '<?php echo base_url() ?>Siteds/buscarpacientesitedsxnombre?ape_paterno='+ape_paterno+'&ape_materno='+ape_materno+'&nombres='+nombres+'&tipo_doc='+tipo_doc+'&nro_doc='+num_doc+'&cod_financ='+cod_financ;
            process(true);
            $.ajax({
                url: urldata,
                async: true,
                type: 'GET',
                success: function (response) {
                    let tablaH = $('#tblsiteds');        
                    $('#tblsiteds').DataTable().clear();
                    $('#tblsiteds').DataTable().destroy();
                    tablaH.DataTable( {
                        select: true,
                        createdRow: function( row, data, dataIndex){
                            if( data.CodEstado == 6){
                                $(row).css('color','red');
                            }
                        },
                        data: JSON.parse(response),
                        columns: [
                            { "data": "DesProducto" },
                            { "data": "ApellidoPaternoAfiliado" },
                            { "data": "ApellidoMaternoAfiliado" },
                            { "data": "NombresAfiliado" },
                            { "data": "DesParentesco" },
                            { "data": "NombreContratante" },
                            { "data": "DesEstado" },
                            { "data": "CodigoAfiliado" },
                            { "data": "FechaNacimiento" },
                            { "data": "DesGenero" }
                        ]
                    });
                }
            }).then(()=>{
                process(false);
            })
        });

        $("#tabs_siteds a").click(function(e){
            e.preventDefault();
            $('#tab_busqueda').removeClass("active").removeClass("show");
            $('#tab_paciente').removeClass("active").removeClass("show");
            $(this).tab("show");
        });

        // $('#tblsiteds tbody').dblclick(function(){
        jQuery('#siteds_selecciona').on('click', function () {
            // var data = jQuery('#tblsiteds').DataTable().row().data();
            var data = $('#tblsiteds').DataTable().rows({selected:  true}).data()[0];
            if($('#tblsiteds').DataTable().rows({selected:  true}).count() > 0){
                let cod_financ = $($('#cb_aseguradora').find(":selected")).attr('data-financ');
                let urldata = '<?php echo base_url() ?>Siteds/BuscarPacienteSitedsBeneficios?ape_paterno='+data.ApellidoPaternoAfiliado+
                '&ape_materno='+data.ApellidoMaternoAfiliado+'&nombres='+data.NombresAfiliado+'&cod_afiliado='+data.CodigoAfiliado+'&codtipodocumentoafiliado='+data.CodTipoDocumentoAfiliado+'&numerodocumentoafiliado='+data.NumeroDocumentoAfiliado+
                '&codproducto='+data.CodProducto+'&desproducto='+data.DesProducto+'&numeroplan='+data.NumeroPlan+'&codtipodocumentocontratante='+data.CodTipoDocumentoContratante+'&numerodocumentocontratante='+data.NumeroDocumentoContratante+
                '&nombrecontratante='+data.NombreContratante+'&codparentesco='+data.CodParentesco+'&tipocalificadorcontratante='+data.TipoCalificadorContratante+'&cod_financ='+cod_financ;
                process(true);
                $.ajax({
                    url: urldata,
                    async: true,
                    type: 'GET',
                    success: function (response) {

                        datadetalle = JSON.parse(response);
                        //$('#siteds_autorizacion').val();
                        $('#siteds_asegurado').val(data.CodigoAfiliado);
                        //$('#siteds_accidente').val();
                        $('#siteds_poliza').val(datadetalle.DatosAfiliado.NumeroPoliza);
                        $('#siteds_certificado').val();
                        $('#siteds_solicitud').val();
                        $('#siteds_producto').val(datadetalle.DatosAfiliado.DesProducto);
                        $('#siteds_nombres').val(datadetalle.DatosAfiliado.ApellidoPaternoAfiliado + ' ' + datadetalle.DatosAfiliado.ApellidoMaternoAfiliado + ' ' + datadetalle.DatosAfiliado.NombresAfiliado);
                        $('#siteds_genero').val(datadetalle.DatosAfiliado.DesGenero);
                        $('#siteds_fecnac').val(datadetalle.DatosAfiliado.FechaNacimiento);
                        $('#siteds_parentesco').val(datadetalle.DatosAfiliado.DesParentesco);
                        $('#siteds_tipodoc').val(datadetalle.DatosAfiliado.DesTipoDocumentoTitular);
                        $('#siteds_numdoc').val(datadetalle.DatosAfiliado.NumeroDocumentoTitular);
                        $('#siteds_edad').val(datadetalle.DatosAfiliado.Edad);
                        $('#siteds_inivigencia').val(datadetalle.DatosAfiliado.FechaInicioVigencia);
                        $('#siteds_finvigencia').val(datadetalle.DatosAfiliado.FechaFinVigencia);
                        $('#siteds_estadocivil').val(datadetalle.DatosAfiliado.DesEstadoCivil);
                        $('#siteds_tipoplan').val(datadetalle.DatosAfiliado.CodProducto);
                        $('#siteds_nroplan').val(datadetalle.DatosAfiliado.NumeroPlan);
                        $('#siteds_estado').val(datadetalle.DatosAfiliado.DesEstado);
                        $('#siteds_tit_nombres').val(datadetalle.DatosAfiliado.ApellidoPaternoTitular + ' ' + datadetalle.DatosAfiliado.ApellidoMaternoTitular + ' ' + datadetalle.DatosAfiliado.NombresTitular);
                        $('#siteds_tit_tipodoc').val(datadetalle.DatosAfiliado.DesTipoDocumentoTitular);
                        $('#siteds_tit_numdoc').val(datadetalle.DatosAfiliado.NumeroDocumentoTitular);
                        $('#siteds_tit_moneda').val(datadetalle.DatosAfiliado.DesMoneda);
                        $('#siteds_tit_contratante').val(datadetalle.DatosAfiliado.NombreContratante);
                        $('#siteds_tit_tipodoc_contratante').val(datadetalle.DatosAfiliado.DesTipoDocumentoContratante);
                        $('#siteds_tit_tipoafiliacion').val(datadetalle.DatosAfiliado.DesTipoAfiliacion);
                        $('#siteds_tit_fecha_afiliacion').val(datadetalle.DatosAfiliado.FechaAfiliacion);
                        $('#siteds_tit_nro_doc_contratante').val(datadetalle.DatosAfiliado.NumeroDocumentoContratante);

                        let tablaH = $('#tblbeneficios');
                        $('#tblbeneficios').DataTable().clear();
                        $('#tblbeneficios').DataTable().destroy();
                        tablaH.DataTable( {
                            select: {
                                style: 'single'
                            },
                            language: global_tablelanguage,
                            data: datadetalle.Coberturas,
                            searching: false,
                            sorting: false,
                            bInfo : false,
                            paginate: true,
                            columns: [
                                { "data": "CodigoCobertura" },
                                { "data": "Beneficios" },
                                { "data": "Restricciones" },
                                { "data": "DesCopagoFijo" },
                                { "data": "DesCopagoVariable" },
                                { "data": "FechaFinCarencia" },
                                { "data": "CondicionesEspeciales" },
                                { "data": "Observaciones" },
                                { "data": "DesCalificacionServicio" }
                            ]
                        });

                        $('#tab_busqueda').removeClass("active").removeClass("show");
                        $('#tab_paciente').removeClass("active").removeClass("show");
                        $("#tabs_siteds a").tab("show");

                    }
                }).then(()=>{
                    process(false);
                })
            }
            else{
                Swal.fire({
                    icon: 'error',
                    title: 'Debe seleccionar un Asegurado',
                    showConfirmButton: false,
                    timer: 2000
                });
            }
            return false;
        });

        jQuery('#siteds_genera').on('click', function () {
            var generaCodAutorizacion = false;
            var data = $('#tblbeneficios').DataTable().rows({selected:  true}).data()[0];
            if($('#tblbeneficios').DataTable().rows( { selected: true } ).count() > 0){
                switch ( parseInt($('#cod_unidad_seguimiento').val())) {
                    case 12:
                        if( data.CodigoCobertura == "4262" ){
                            generaCodAutorizacion = true;
                        }
                        break;
                    case 20:
                        if( data.CodigoCobertura == "1601" && $('#cb_aseguradora').val() == "044" ){
                            generaCodAutorizacion = true;
                        }
                        if( $('#cb_aseguradora').val() == "106" ){
                            generaCodAutorizacion = true;
                        }
                        break;
                    case 29:
                        if( data.CodigoCobertura == "4261" ){
                            generaCodAutorizacion = true;
                        }
                        break;
                    default:
                        generaCodAutorizacion = true;
                        break;
                }
                if(generaCodAutorizacion == true){
                    generaCodigoAutorizacion(data);
                }
                else{
                    Swal.fire({
                        icon: 'error',
                        title: 'La cobertura seleccionada no se aplica a ' + $('#unidad_seguimiento').text(),
                        showConfirmButton: false,
                        timer: 2000
                    });    
                }
            }
            else{
                Swal.fire({
                    icon: 'error',
                    title: 'Debe seleccionar un tipo de cobertura',
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        });

        jQuery('#siteds_continuar').on('click', function () {
            $('#siteds_json').val(JSON.stringify(datadetalle));
            $('#siteds_codigoautorizacion').val(codigo_autorizacion);
            $('#siteds').modal('hide');
        });
        
    });

    function siteds_cargaraseguradoras(){
        let urldata = '<?php echo base_url() ?>Siteds/CargarAseguradoras';
        $('#cb_aseguradora').find('option').remove();
        $.ajax({
            url: urldata,
            async: true,
            type: 'POST',
            success: function (response) {
                var data = JSON.parse(response);
                $.each(data, function(index, value) {
                    $('#cb_aseguradora').append( $('<option />').val(value.cod_cliente).text(value.cliente) );
                    $('#cb_aseguradora option:last').attr('data-financ', value.cod_financ);
                });
                if( $('#siteds_hiddenaseguradoravalue').val() != '' ){
                    $('#cb_aseguradora').val($('#siteds_hiddenaseguradoravalue').val());
                }
            },
            error: function(er){
                var a = er;
            }
        })
    }

    function generaCodigoAutorizacion(){
        let cod_financ = $($('#cb_aseguradora').find(":selected")).attr('data-financ');
        // var dataafiliado = $('#tblsiteds').DataTable().rows({selected:  true}).data()[0];
        var dataafiliado = datadetalle.DatosAfiliado;
        var databeneficio = $('#tblbeneficios').DataTable().rows({selected:  true}).data()[0];
        let urldata = '<?php echo base_url() ?>Siteds/ConsultaNumeroAutorizacion?ApellidoPaternoAfiliado='+dataafiliado.ApellidoPaternoAfiliado+'&ApellidoMaternoAfiliado='+dataafiliado.ApellidoMaternoAfiliado+'&BeneficioMaximoInicial='+databeneficio.BeneficioMaximoInicial+
        '&CodigoAfiliado='+dataafiliado.CodigoAfiliado+'&CodigoTitular='+dataafiliado.CodigoTitular+'&CodCalificacionServicio='+databeneficio.CodCalificacionServicio+'&DesCalificacionServicio='+databeneficio.DesCalificacionServicio
        +'&CodEstado='+dataafiliado.CodEstado+'&DesEstado='+dataafiliado.DesEstado+'&CodFechaActualizacionFoto='+dataafiliado.CodFechaActualizacionFoto+'&FechaActualizacionFoto='+dataafiliado.FechaActualizacionFoto+'&CodMoneda='+dataafiliado.CodMoneda+'&DesMoneda='+dataafiliado.DesMoneda+'&CodCopagoFijo='+databeneficio.CodCopagoFijo+'&DesCopagoFijo='+databeneficio.DesCopagoFijo+'&FechaInicioVigencia='+dataafiliado.FechaInicioVigencia+'&CodFechaFinVigencia='+dataafiliado.CodFechaFinVigencia+'&FechaFinVigencia='+dataafiliado.FechaFinVigencia
        +'&CodCopagoVariable='+databeneficio.CodCopagoVariable+'&DesCopagoVariable='+databeneficio.DesCopagoVariable+'&CodParentesco='+dataafiliado.CodParentesco+'&DesParentesco='+dataafiliado.DesParentesco+'&CodProducto='+dataafiliado.CodProducto
        +'&NumeroDocumentoContratante='+dataafiliado.NumeroDocumentoContratante+'&CodSubTipoCobertura='+databeneficio.CodigoSubTipoCobertura+'&CodTipoCobertura='+databeneficio.CodigoTipoCobertura+'&Observaciones='+databeneficio.Observaciones
        +'&CodTipoAfiliacion='+dataafiliado.CodTipoAfiliacion+'&DesTipoAfiliacion='+dataafiliado.DesTipoAfiliacion+'&DesProducto='+dataafiliado.DesProducto+'&CodEstadoMarital='+dataafiliado.CodEstadoCivil+'&DesEstadoCivil='+dataafiliado.DesEstadoCivil+'&Edad='+dataafiliado.Edad
        +'&CodFechaFinCarencia='+databeneficio.CodFechaFinCarencia+'&FechaFinCarencia='+databeneficio.FechaFinCarencia+'&CodFechaAfiliacion='+dataafiliado.CodFechaAfiliacion+'&FechaAfiliacion='+dataafiliado.FechaAfiliacion+'&CodFechaInicioVigencia='+dataafiliado.CodFechaInicioVigencia
        +'&CodFechaNacimiento='+dataafiliado.CodFechaNacimiento+'&FechaNacimiento='+dataafiliado.FechaNacimiento+'&CodGenero='+dataafiliado.CodGenero+'&DesGenero='+dataafiliado.DesGenero+'&CondicionesEspeciales='+databeneficio.CondicionesEspeciales
        +'&ApellidoMaternoTitular='+dataafiliado.ApellidoMaternoTitular+'&NombreContratante='+dataafiliado.NombreContratante
        +'&ApellidoPaternoTitular='+dataafiliado.ApellidoPaternoTitular+'&NombresAfiliado='+dataafiliado.NombresAfiliado+'&NombresTitular='+dataafiliado.NombresTitular
        +'&NumeroCertificado='+dataafiliado.NumeroCertificado+'&NumeroContrato='+dataafiliado.NumeroContrato+'&NumeroDocumentoAfiliado='+dataafiliado.NumeroDocumentoAfiliado+'&NumeroCobertura='+databeneficio.NumeroCobertura
        +'&NumeroDocumentoTitular='+dataafiliado.NumeroDocumentoTitular+'&NumeroPlan='+dataafiliado.NumeroPlan+'&NumeroPoliza='+dataafiliado.NumeroPoliza+'&CodigoCobertura='+databeneficio.CodigoCobertura+'&Beneficios='+databeneficio.Beneficios
        +'&CodTipoDocumentoContratante='+dataafiliado.CodTipoDocumentoContratante+'&DesTipoDocumentoContratante='+dataafiliado.DesTipoDocumentoContratante+'&CodTipoDocumentoAfiliado='+dataafiliado.CodTipoDocumentoAfiliado+'&DesTipoDocumentoAfiliado='+dataafiliado.DesTipoDocumentoAfiliado+'&CodTipoDocumentoTitular='+dataafiliado.CodTipoDocumentoTitular+'&DesTipoDocumentoTitular='+dataafiliado.DesTipoDocumentoTitular
        +'&CodTipoPlan='+dataafiliado.CodTipoPlan+'&DesTipoPlan='+dataafiliado.DesTipoPlan+'&CodIndicadorRestriccion='+databeneficio.CodIndicadorRestriccion+'&Restricciones='+databeneficio.Restricciones+'&cod_financ='+cod_financ;

        process(true);

        $('#siteds_autorizacion').val('');
        $('#siteds_verdocumento').addClass('disabled');
        $('#siteds_continuar').addClass('disabled');
        $.ajax({
            url: urldata,
            async: true,
            type: 'GET',
            success: function (response) {
                var responsesiteds = JSON.parse(response);
                if(responsesiteds && responsesiteds.NumeroAutorizacion){
                    Swal.fire({
                        icon: 'success',
                        title: 'Nro Autorización generado: ' + responsesiteds.NumeroAutorizacion,
                        showConfirmButton: false,
                        timer: 2000
                    });
                    $('#siteds_autorizacion').val(responsesiteds.NumeroAutorizacion);
                    $('#siteds_verdocumento').removeClass('disabled');
                    $('#siteds_continuar').removeClass('disabled');

                    codigo_autorizacion = responsesiteds.NumeroAutorizacion;
                    const linkSource = 'data:application/pdf;base64,'+responsesiteds.Documento;
                    const downloadLink = document.getElementById("siteds_verdocumento");
                    const fileName = responsesiteds.NumeroAutorizacion+'.pdf';
                    downloadLink.href = linkSource;
                    downloadLink.download = fileName;
                    // $('#siteds_continuar').removeAttr('disabled');
                    // $('#siteds_continuar').attr('disabled', 'disabled');
                }
                else{
                    Swal.fire({
                        icon: 'error',
                        title: 'No se pudo generar el Nro Autorización. Vuelva a intentarlo',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
                
            },
            error: function (error) {
                Swal.fire({
                    icon: 'error',
                    title: error,
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        }).then(()=>{
            process(false);
        })
    }
</script>