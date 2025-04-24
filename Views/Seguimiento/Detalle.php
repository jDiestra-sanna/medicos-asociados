<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/css/bootstrap-slider.min.css" integrity="sha512-3q8fi8M0VS+X/3n64Ndpp6Bit7oXSiyCnzmlx6IDBLGlY5euFySyJ46RUlqIVs0DPCGOypqP8IRk/EyPvU28mQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js" integrity="sha512-f0VlzJbcEB6KiW8ZVtL+5HWPDyW1+nJEjguZ5IVnSQkvZbwBt2RfCBY0CBO1PsMAqxxrG4Di6TfsCPP3ZRwKpA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<input hidden id="det_idparent" type="text" value=""/>
<div class="row">
    <h4>Datos del paciente</h4>
</div>
<div class="row">
    <div class="col-6">
        <div class="row">
            <div class="col-3">
                <label>Aseguradora</label>
            </div>
            <div class="col-9">
                <input id="det_aseguradora" class="form-control uppercase" type="text" value="" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label>Paciente</label>
            </div>
            <div class="col-9">
                <input id="det_paciente" class="form-control uppercase" type="text" value="" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label>Estado</label>
            </div>
            <div class="col-9">
            <input id="det_estado" class="form-control" type="text" value="" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label>F.Atención</label>
            </div>
            <div class="col-3">
                <input id="det_fechaatencion" class="form-control" type="text" value="" readonly>
            </div>
            <div class="col-3">
                <label>F.Toma Muestra</label>
            </div>
            <div class="col-3">
                <input id="det_toma" class="form-control" type="text" value="" readonly>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="row">
            <div class="col-3">
                <label>Clasificación</label>
            </div>
            <div class="col-9">
                <input id="det_clasificacion" class="form-control uppercase" type="text" value="" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label>IdSeg.COVID</label>
            </div>
            <div class="col-3">
            <input id="det_idsegcovid" class="form-control" type="text" value="" readonly>
            </div>
            <div class="col-3">
                <label>Cant.Seguimientos</label>
            </div>
            <div class="col-3">
            <input id="det_cantidad" class="form-control" type="text" value="" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label>Nro Seguim.</label>
            </div>
            <div class="col-3">
                <input id="det_nroseguimiento" class="form-control" type="text" value="" readonly>
            </div>
            <div class="col-3">
                <label>¿Con vacuna?</label>
            </div>
            <div class="col-3">
                <input id="det_vacuna" class="form-control" type="text" value="" readonly>
            </div>
            <div class="col-3">
                <label>F.1ra Dosis</label>
            </div>
            <div class="col-3">
                <input id="det_primeradosis" class="form-control" type="text" value="" readonly>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="table-responsive mt-4">
        <table class="table table-hover table-bordered" id="det_Table" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>Nro Seguimiento</th>
                    <th>Fecha Registro</th>
                    <th>Estado</th>
                    <th>Contesta</th>
                    <th>Red Flag</th>
                    <th>Medicamento</th>
                    <th>UME</th>
                    <th>Domicilio</th>
                    <th>DrOnline</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<div class="form-group" id="det_Table_detalle" style="display:none;">
    <ul class="nav nav-tabs tab" id="det_detalle">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#tab_factor">Factor Riesgo</a>
        </li>
        <li class="nav-item">
            <a id="tabsintoma" class="nav-link" href="#tab_sintoma">Síntomas</a>
        </li>
        <li class="nav-item">
            <a id="tabredflag" class="nav-link" href="#tab_redflag">RedFlag</a>
        </li>
        <li class="nav-item">
            <a id="tabmedicamentos" class="nav-link" href="#tab_medicamentos">Medicamentos</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tab_factor" role="tabpanel" >
            <div class="modal-body">
                <div class="row">
                    <div class="table-responsive mt-4">
                        <table class="table table-hover table-bordered" id="det_factor" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Descripción</th>
                                    <th>Observación</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show" id="tab_sintoma" role="tabpanel" >
            <div class="modal-body">
                <div class="row">
                    <div class="table-responsive mt-4">
                        <table class="table table-hover table-bordered" id="det_sintoma" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Pregunta</th>
                                    <th>Descripción</th>
                                    <th>Respuesta</th>
                                    <th>Observación</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show" id="tab_redflag" role="tabpanel" >
            <div class="modal-body">
                <div class="row">
                    <div class="table-responsive mt-4">
                        <table class="table table-hover table-bordered" id="det_redflag" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Pregunta</th>
                                    <th>Descripción</th>
                                    <th>Respuesta</th>
                                    <th>Observación</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show" id="tab_medicamentos" role="tabpanel" >
            <div class="modal-body">
                <div class="row">
                    <div class="table-responsive mt-4">
                        <table class="table table-hover table-bordered" id="det_medicamento" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Pedido</th>
                                    <th>Medicamento</th>
                                    <th>Presentación</th>
                                    <th>Cantidad</th>
                                    <th>Indicación</th>
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
</div>

<div class="card-footer">
    <a class="btn btn-danger" data-dismiss="modal"><i class="fas fa-arrow-alt-circle-left"></i> Cerrar</a>
</div>

<script>
    var datadetalle = null;
    $(document).ready(function(){
        
        $("#det_detalle a").click(function(e){
            e.preventDefault();
            $('#tab_factor').removeClass("active").removeClass("show");
            $('#tab_sintoma').removeClass("active").removeClass("show");
            $('#tab_redflag').removeClass("active").removeClass("show");
            $('#tab_medicamentos').removeClass("active").removeClass("show");
            $(this).tab("show");
        });

        let urldata = '<?php echo base_url() ?>Seguimiento/getDetalleSeguimiento?id_seg_covid='+parseInt($('#det_idsegcovid').val());
        process(true);
        jQuery.ajax({
            url: urldata,
            async: false,
            type: 'GET',
            success: function (response) {
                datadetalle = JSON.parse(response).data;
                $('#det_aseguradora').val(datadetalle.cliente);
                $('#det_paciente').val(datadetalle.paciente);
                $('#det_estado').val(datadetalle.descripcion_estado);
                $('#det_clasificacion').val(datadetalle.clasificacion);
                $('#det_cantidad').val(datadetalle.detalle.length);

                $('#det_fechaatencion').val(datadetalle.fecha_atencion);
                $('#det_toma').val(datadetalle.fecha_coordinada);
                $('#det_nroseguimiento').val(datadetalle.numero_seguimiento);
                $('#det_vacuna').val(datadetalle.vacunado);

                let tablaH = jQuery('#det_Table');
                tablaH.DataTable().clear();
                tablaH.DataTable().destroy();
                tablaH.DataTable( {
                    data: datadetalle.detalle,
                    language: global_tablelanguage,
                    select: {
                        style: 'single'
                    },
                    sorting: false,
                    bInfo : false,
                    columns: [
                        { "data": "numero_seguimiento" },
                        { "data": "fecha_reg_num_seg" },
                        { "data": "estado" },
                        { "data": "pac_contesta" },
                        { "data": "red_flag" },
                        { "data": "medicamento" },
                        { "data": "coordinar_ume" },
                        { "data": "evaluacion_domicilio" },
                        { "data": "evaluacion_dronline" }
                    ]
                });
            },
            error: function(err){
                console.log(err);
            }
        }).then(()=>{
            process(false);
        })

        jQuery('#det_Table tbody').on('click', 'tr', function () {
            var data = jQuery('#det_Table').DataTable().row(jQuery(this)).data();
            if(data){
                urldata = '<?php echo base_url() ?>Seguimiento/getSubDetalleSeguimiento?id_seg_covid='+parseInt($('#det_idsegcovid').val())+'&cod_paciente='+datadetalle.cod_paciente+'&nro_seguimiento='+data.numero_seguimiento;
                process(true);
                jQuery.ajax({
                    url: urldata,
                    async: true,
                    type: 'GET',
                    success: function (response) {
                        data = JSON.parse(response).data;
                        if(data!= undefined || data!=null){
                            $('#det_Table_detalle').css('display', 'block');
                            datafactor = data.factor;
                            let tablaF = jQuery('#det_factor');
                            tablaF.DataTable().clear();
                            tablaF.DataTable().destroy();
                            tablaF.DataTable( {
                                data: datafactor,
                                language: global_tablelanguage,
                                sorting: false,
                                bInfo : false,
                                columns: [
                                    { "data": "descripcion" },
                                    { "data": "observacion" }
                                ]
                            });

                            datasintoma = data.sintoma;
                            let tablaS = jQuery('#det_sintoma');
                            tablaS.DataTable().clear();
                            tablaS.DataTable().destroy();
                            tablaS.DataTable( {
                                data: datasintoma,
                                language: global_tablelanguage,
                                sorting: false,
                                bInfo : false,
                                columns: [
                                    { "data": "preg" },
                                    { "data": "descripcion" },
                                    { "data": "respuesta" },
                                    { "data": "observacion" }
                                ]
                            });

                            dataredflag = data.redflag;
                            let tablaG = jQuery('#det_redflag');
                            tablaG.DataTable().clear();
                            tablaG.DataTable().destroy();
                            tablaG.DataTable( {
                                data: dataredflag,
                                language: global_tablelanguage,
                                sorting: false,
                                bInfo : false,
                                columns: [
                                    { "data": "preg" },
                                    { "data": "descripcion" },
                                    { "data": "respuesta" },
                                    { "data": "observacion" }
                                ]
                            });

                            datamedicamento = data.medicamento;
                            let tablaM = jQuery('#det_medicamento');
                            tablaM.DataTable().clear();
                            tablaM.DataTable().destroy();
                            tablaM.DataTable( {
                                data: datamedicamento,
                                language: global_tablelanguage,
                                sorting: false,
                                bInfo : false,
                                columns: [
                                    { "data": "cod_ped" },
                                    { "data": "medicamento" },
                                    { "data": "presentacion" },
                                    { "data": "cantidad" },
                                    { "data": "indicacion" }
                                ]
                            });

                            datavacuna = data.vacuna[0];
                            $('#det_primeradosis').val(datavacuna.fecha_primera_dosis);
                        }
                        else{
                            $('#det_Table_detalle').css('display', 'none');
                        }

                    },
                    error: function(err){
                        console.log(err);
                    }
                }).then(()=>{
                    process(false);
                })
            }
        });
    });

</script>