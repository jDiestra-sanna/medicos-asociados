<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/css/bootstrap-slider.min.css" integrity="sha512-3q8fi8M0VS+X/3n64Ndpp6Bit7oXSiyCnzmlx6IDBLGlY5euFySyJ46RUlqIVs0DPCGOypqP8IRk/EyPvU28mQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js" integrity="sha512-f0VlzJbcEB6KiW8ZVtL+5HWPDyW1+nJEjguZ5IVnSQkvZbwBt2RfCBY0CBO1PsMAqxxrG4Di6TfsCPP3ZRwKpA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<input hidden id="lla_escovid" type="text" value="0"/>
<input hidden id="des_descansogenerado" type="text" value=""/>
<input hidden id="idparent" type="text" value=""/>
<input hidden id="lla_codpaciente" type="text" value=""/>
<input hidden id="lla_respuesta_grabar" type="text" value=""/>
<input hidden id="lla_respuesta_actualizar" type="text" value=""/>
<input hidden id="lla_codclasificacion" type="text" value=""/>
<input hidden id="lla_yavacunado" type="text" value=""/>
<div class="row">
    <div class="row col-4">
        <label for="seg_fecha_fin">Coordinar UME</label>
        <input class="form-control col-1 offset-2" type="checkbox" id="lla_ume" >
    </div>
    <div class="row col-4">
        <label for="seg_fecha_fin">Evaluación a domicilio</label>
        <input class="form-control col-1 offset-2" type="checkbox" id="lla_domicilio" >
    </div>
    <div class="row col-4">
        <label for="seg_fecha_fin">Evaluación Dr.Online</label>
        <input class="form-control col-1 offset-2" type="checkbox" id="lla_dronline" >
    </div>
</div>
<hr/>
<div class="row">
    <div class="row col-6">
        <label for="seg_fecha_fin">¿Paciente cuenta con vacuna?</label>
        <input class="form-control col-1 offset-2" type="radio" id="lla_vacunasi" name="lla_vacuna">SI
        <input class="form-control col-1 offset-2" type="radio" id="lla_vacunano" name="lla_vacuna">NO
    </div>
    <div class="row col-6">
        <label for="seg_fecha_fin" class="col-6">Fecha primera dosis</label>
        <input class="form-control col-6" type="date" id="lla_dosis" >
    </div>
</div>
<hr/>
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
                <input id="lla_aseguradora" name="lla_aseguradora" class="form-control uppercase" type="text" value="" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label>Paciente</label>
            </div>
            <div class="col-9">
                <input id="lla_paciente" name="lla_paciente" class="form-control uppercase" type="text" value="" readonly>
            </div>
        </div>
        <div class="row">
            <div class="row col-12">
                <label class="col-4">Fecha Nacimiento</label>
                <button id="lla_btnEditFechaNacimiento" class="btn btn-primary" type="button"><i class="fas fa-edit"></i></button>
                <input id="lla_fechanacimiento" class="form-control col-4" type="date" value="" readonly>

                <label class="col-1">Edad</label>
                <input id="lla_edad" class="form-control col-2" type="text" value="" readonly>
            </div>
        </div>
        <div class="row">
            <div class="row col-12">
                <label class="col-4">Tipo Documento</label>
                <input id="lla_tipo_documento" class="form-control col-3" type="text" value="" readonly>

                <label class="col-2">Número</label>
                <input id="lla_nro_documento" class="form-control col-3" type="text" value="" readonly>
            </div>
        </div>
        <div class="row">
            <div class="row col-12">
                <label class="col-2">Sexo</label>
                <button id="lla_btnSexo" class="btn btn-primary" type="button"><i class="fas fa-edit"></i></button>
                <select id="lla_sexo" class="form-control col-3" readonly>
                    <option value="MASCULINO">MASCULINO</option>
                    <option value="FEMENINO">FEMENINO</option>
                </select>
                <!-- <input id="lla_sexo" class="form-control col-3 uppercase" type="text" value="" readonly> -->

                <label class="col-2">Tlf.Movil</label>
                <button id="lla_btnTlfMovil" class="btn btn-primary" type="button"><i class="fas fa-edit"></i></button>
                <input id="lla_celular" class="form-control col-3" type="text" value="" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label>Email</label>
            </div>
            <div class="col-1">
            <button id="lla_btnEmail" class="btn btn-primary" type="button"><i class="fas fa-edit"></i></button>
            </div>
            <div class="col-8">
                <input id="lla_email" name="lla_email" class="form-control uppercase" type="text" value="" readonly>
            </div>
        </div>
        <div class="row">
            <button id="lla_btnActualizarDatos" class="btn btn-primary offset-8" type="button"> <i class="fas fa-save"></i>  Actualizar Datos </button>
        </div>
    </div>
    <div class="col-6">
        <div class="row">
            <div class="col-3">
                <label>Clasificación</label>
            </div>
            <div class="col-9">
                <input id="lla_clasificacion" name="lla_clasificacion" class="form-control uppercase" type="text" value="" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label>IdSeg.COVID</label>
            </div>
            <div class="col-3">
            <input id="lla_idsegcovid" name="lla_idsegcovid" class="form-control" type="text" value="" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label>Estado</label>
            </div>
            <div class="col-9">
                <div class="input-group">
                    <input id="lla_estadoanterior" class="form-control uppercase" type="text" value="" hidden>
                    <select id="lla_estado" class="form-control" name="lla_estado" required>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label>Periodo</label>
            </div>
            <div class="col-9">
                <select id="lla_periodo" class="form-control" required>
                    <option value="DIARIO">DIARIO</option>
                    <option value="INTERDIARIO">INTERDIARIO</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="row col-12">
                <label class="col-4">Fec.Ini Síntomas</label>
                <button id="lla_btnFechaIniSintomas" class="btn btn-primary" type="button"><i class="fas fa-edit"></i></button>
                <input id="lla_sintomas" class="form-control col-4" type="date" value="" readonly>

                <label class="col-2">Num.Seg</label>
                <input id="lla_seg" class="form-control col-1" type="text" value="" readonly>
            </div>
        </div>
        <div class="row">
            <div class="row col-12">
                <label class="col-4">Fecha Atención</label>
                <button id="lla_btnFechaAtencion" class="btn btn-primary" type="button"><i class="fas fa-edit"></i></button>
                <input id="lla_atencion" class="form-control col-4" type="date" value="" readonly>
            </div>
        </div>
        <div class="row">
            <div class="row col-12">
                <label class="col-4">Tipo Ingreso</label>
                <input id="lla_tipoingreso" class="form-control col-8 uppercase" type="text" value="" readonly>
            </div>
        </div>
    </div>
</div>
<form action="" id="form_detalle" style="display:none;">
    <div class="row">
        <div class="row col-lg-12">
            <ul class="nav nav-tabs tab" id="tab">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#riesgo">Factores de riesgo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sintomas">Síntomas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#redflag">Red Flag</a>
                </li>
            </ul>
        </div>
        <div class="row col-lg-12">
            <div class="tab-content" style="width:100%">
                <div class="tab-pane fade show active" id="riesgo" role="tabpanel" aria-labelledby="riesgo-tab">
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="row">
                                <label for="">NIEGA</label>
                                <input class="col-1" type="checkbox" id="lla_factorniega" >
                            </div>
                            <div class="row">
                                <label for="">OTROS</label>
                                <input class="col-1" type="checkbox" id="lla_factorotros">
                                <textarea class="form-control" id="lla_otros" cols="30" rows="3" disabled></textarea>
                            </div>
                            <div class="row">
                                <div class="table-responsive mt-4">
                                    <table class="table table-hover table-bordered" id="tbl_factor" style="width:100%">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Seleccionar</th>
                                                <th>Descripción</th>
                                                <th>Comentarios</th>
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
            <div class="tab-content" style="width:100%">
                <div class="tab-pane fade" id="sintomas" role="tabpanel" aria-labelledby="sintomas-tab">
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="row">
                                <label for="">ASINTOMÁTICO</label>
                                <input class="col-1" type="checkbox" id="lla_sintoma_asintomatico" >
                            </div>

                            <div class="row">
                                <label class="col-3">Podría indicarme cómo se siente respecto al día anterior?</label>
                                <div class="col-3">
                                    <input id="lla_slider_siente" type="text" data-slider-min="-2" data-slider-max="2" data-slider-step="1" data-slider-value="0"/>
                                </div>
                                <label class="col-3">¿Dolor en el garganta?</label>
                                    <div class="col-3">
                                        <input id="lla_slider_garganta" type="text" data-slider-min="0" data-slider-max="5" data-slider-step="1" data-slider-value="0"/>
                                    </div>
                                </div>
                            <div class="row">
                                <label class="col-3">¿Dolor en el pecho?</label>
                                <div class="col-3">
                                    <input id="lla_slider_pecho" type="text" data-slider-min="0" data-slider-max="5" data-slider-step="1" data-slider-value="0"/>
                                </div>
                                <label class="col-3">¿Dolor en el cabeza?</label>
                                <div class="col-3">
                                    <input id="lla_slider_cabeza" type="text" data-slider-min="0" data-slider-max="5" data-slider-step="1" data-slider-value="0"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <label class="col-4">¿Persistencia de tos?</label>
                                        <div class="col-2">
                                            <input type="radio" id="lla_tossi" name="lla_tos">SI
                                        </div>
                                        <select id="lla_tossi_detalle" class="col-4" disabled>
                                            <option value="">Seleccione</option>
                                            <option value="TOS SECA">TOS SECA</option>
                                            <option value="TOS PRODUCTIVA">TOS PRODUCTIVA</option>
                                        </select>
                                        <div class="col-2">
                                            <input type="radio" id="lla_tosno"  name="lla_tos" checked>NO
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-4">¿Mialgias yArtralgias?</label>
                                        <div class="col-2">
                                            <input type="radio" id="lla_mialgiasi" name="lla_mialgia">SI
                                        </div>
                                        <select id="lla_mialgiasi_detalle" class="col-4" disabled>
                                            <option value="">Seleccione</option>
                                            <option value="MUSCULAR">MUSCULAR</option>
                                            <option value="ESPALDA">ESPALDA</option>
                                            <option value="ARTICULAR">ARTICULAR</option>
                                            <option value="TODAS">TODAS</option>
                                        </select>
                                        <div class="col-2">
                                            <input type="radio" id="lla_mialgiano" name="lla_mialgia" checked>NO
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <label class="col-4">¿Congestión nasal?</label>
                                        <div class="col-2">
                                            <input type="radio" id="lla_congestionsi" name="lla_congestion">SI
                                        </div>
                                        <div class="col-2">
                                            <input class="offset-1" type="radio" id="lla_congestionno" name="lla_congestion" checked>NO
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-4">¿Diarrea?</label>
                                        <div class="col-2">
                                            <input type="radio" id="lla_diarreasi" name="lla_diarrea">SI
                                        </div>
                                        <input class="form-control col-2" id="lla_diarreasi_detalle" type="number" oninput="fnInputNumber(this, 0)" disabled>
                                        <div class="col-2">
                                            <input type="radio" id="lla_diarreano" name="lla_diarrea" checked>NO
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-4">¿Nauseas o vómito?</label>
                                        <div class="col-2">
                                            <input type="radio" id="lla_nauseasi" name="lla_nausea">SI
                                        </div>
                                        <input class="form-control col-2" id="lla_nauseasi_detalle" type="number" oninput="fnInputNumber(this, 0)" disabled>
                                        <div class="col-2">
                                            <input type="radio" id="lla_nauseano" name="lla_nausea" checked>NO
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-4">¿Otros síntomas?</label>
                                        <div class="col-2">
                                            <input type="radio" id="lla_otrossintomassi" name="lla_otrossintomas">SI
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" id="lla_otrossintomasno" name="lla_otrossintomas" checked>NO
                                        </div>
                                    </div>
                                    <div class="row">
                                        <textarea id="lla_otrossintomassi_detalle" cols="30" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content" style="width:100%">
                <div class="tab-pane fade" id="redflag" role="tabpanel" aria-labelledby="redflag-tab">
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <label class="col-4">¿Fiebre?</label>
                                        <div class="col-2">
                                            <input type="radio" id="lla_fiebresi" name="lla_fiebre">SI
                                        </div>
                                        <input class="form-control col-2" id="lla_fiebresi_detalle" oninput="fnInputNumber(this, 0, 41)" type="number" disabled> °C
                                        <div class="col-2">
                                            <input type="radio" id="lla_fiebreno" name="lla_fiebre" checked>NO
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-4">¿Siente que le falta el aire?</label>
                                        <div class="col-2">
                                            <input type="radio" id="lla_airesi" name="lla_aire">SI
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" id="lla_aireno" name="lla_aire" checked>NO
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-4">¿Se agita durante la conversación?</label>
                                        <div class="col-2">
                                            <input type="radio" id="lla_agitasi" name="lla_agita">SI
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" id="lla_agitano" name="lla_agita" checked>NO
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-4">¿Respiración rápida?</label>
                                        <div class="col-2">
                                            <input type="radio" id="lla_respiracionsi" name="lla_respiracion">SI
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" id="lla_respiracionno" name="lla_respiracion" checked>NO
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <label class="col-4">¿Cianosis?</label>
                                        <div class="col-2">
                                            <input type="radio" id="lla_cianosissi" name="lla_cianosis">SI
                                        </div>
                                        <div class="col-2">
                                            <input class="offset-1" type="radio" id="lla_cianosisno" name="lla_cianosis" checked>NO
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-4">¿Desorientación o confusión?</label>
                                        <div class="col-2">
                                            <input type="radio" id="lla_confusionsi" name="lla_confusion">SI
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" id="lla_confusionno" name="lla_confusion" checked>NO
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-4">¿Saturación O2?</label>
                                        <div class="col-2">
                                            <input type="radio" id="lla_saturacionsi" name="lla_saturacion">SI
                                        </div>
                                        <input class="form-control col-2" id="lla_saturacionsi_detalle" type="number" oninput="fnInputNumber(this, 0, 100)" disabled> %
                                        <div class="col-2">
                                            <input type="radio" id="lla_saturacionno" name="lla_saturacion" checked>NO
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-4">¿Paciente Red Flag?</label>
                                        <div class="col-2">
                                            <input type="radio" id="lla_redflagsi" name="lla_redflag">SI
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" id="lla_redflagno" name="lla_redflag" checked>NO
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="card-footer">
    <button id="lla_btnGuardar" class="btn btn-primary" type="button" ><i class="fas fa-save"></i> Guardar</button>
    <!-- <button id="lla_btnDescansoMedico" class="btn btn-primary" type="button" disabled><i class="fas fa-save"></i> Descanso Médico </button> -->
    <a class="btn btn-danger" data-dismiss="modal"><i class="fas fa-arrow-alt-circle-left"></i> Cerrar</a>
</div>

<script>
    var indextabledireccion;
    var sliderSiente, sliderPecho, sliderGarganta, sliderCabeza;
    var tmp_fecha_nacimiento;
    var tmp_fecha_sintoma;
    var tmp_fecha_atencion;
    var tmp_sexo;
    var tmp_movil;
    var tmp_email;
    $(document).ready(function(){
        tmp_fecha_nacimiento = $('#lla_fechanacimiento').val();
        tmp_fecha_sintoma = $('#lla_sintomas').val();
        tmp_fecha_atencion = $('#lla_atencion').val();
        tmp_sexo = $('#lla_sexo').val();
        tmp_movil = $('#lla_celular').val();
        tmp_email = $('#lla_email').val();


        cargarTablaRiesgo();

        $('#lla_fechanacimiento').attr('max', fnCurrentDate());
        
        $("#tab a").click(function(e){
            e.preventDefault();
            $('#riesgo').removeClass("active").removeClass("show");
            $('#sintomas').removeClass("active").removeClass("show");
            $('#redflag').removeClass("active").removeClass("show");
            $($(this)[0].hash).tab("show");
            $(this).tab("show");
        });
        $('#per_direcciones').DataTable({
            language: global_tablelanguage,
            select: true,
            searching: false,
            sorting: false,
            bInfo : false,
            paginate: true,
            lengthMenu: [5],
        });

        var vacunado = parseInt($('#lla_yavacunado').val());
        if(vacunado){
            $('#lla_vacunasi').prop('checked', true);
        }

        // EVENTOS DE CONTROLES
        $('#pac_fecha_nacimiento').on('change', function (data) {
            $('#pac_edad').val( fnCalculaEdad($(this).val()) );
        });
        jQuery('#per_direcciones').on('click', 'button', function (data) {
            var data = jQuery('#per_direcciones').DataTable().row(jQuery(this).parents('tr')).data();
            if(jQuery(this)[0].id == 'per_direccionedit')
                seteditdireccion(data, $(this).parents('tr').index());
            if(jQuery(this)[0].id == 'per_direcciondelete')
                jQuery('#per_direcciones').DataTable().row( $(this).parents('tr') ).remove().draw();

        });
        $('#lla_factorniega').on('change', function (data) {
            $('#lla_factorotros').prop( "disabled", $('#lla_factorniega').prop('checked') );
            $("input[id^=riesgock]").prop( "disabled", $('#lla_factorniega').prop('checked') );
            if( $('#lla_factorniega').prop('checked') ){
                $("input[id^=riesgock]").prop('checked', !$('#lla_factorniega').prop('checked'));
                $("input[id^=riesgock]").trigger('change');
                $('#lla_factorotros').prop('checked', !$('#lla_factorniega').prop('checked'));
                $('#lla_factorotros').trigger('change');
            }
        });
        $("input[id^=riesgock]").on('change', function (data) {
            var id = this.id.split('_')[1];
            if(!$(this).prop('checked')){
                $('#riesgotxt_'+id).val('');
            }
            $('#riesgotxt_'+id).prop( "disabled", !$(this).prop('checked') );
        });
        $('#lla_factorotros').on('change', function (data) {
            if( !$('#lla_factorotros').prop('checked') ){
                $('#lla_otros').val('');
            }
            $('#lla_otros').prop( "disabled", !$('#lla_factorotros').prop('checked') );
        });
        $('#lla_sintoma_asintomatico').on('change', function (data) {
            if($(this).prop('checked')) 
            {
                sliderSiente.disable();
                sliderGarganta.disable();
                sliderCabeza.disable();
                sliderPecho.disable();
            }else{
                sliderSiente.enable();
                sliderGarganta.enable();
                sliderCabeza.enable();
                sliderPecho.enable();
            }

            $('#lla_tossi').prop( "disabled", $(this).prop('checked') );
            $('#lla_tossi_detalle').prop( "disabled", $(this).prop('checked') );
            $('#lla_tosno').prop( "disabled", $(this).prop('checked') );
            $('#lla_mialgiasi').prop( "disabled", $(this).prop('checked') );
            $('#lla_mialgiasi_detalle').prop( "disabled", $(this).prop('checked') );
            $('#lla_mialgiano').prop( "disabled", $(this).prop('checked') );
            $('#lla_congestionsi').prop( "disabled", $(this).prop('checked') );
            $('#lla_congestionno').prop( "disabled", $(this).prop('checked') );
            $('#lla_diarreasi').prop( "disabled", $(this).prop('checked') );
            $('#lla_diarreasi_detalle').prop( "disabled", $(this).prop('checked') );
            $('#lla_diarreano').prop( "disabled", $(this).prop('checked') );
            $('#lla_nauseasi').prop( "disabled", $(this).prop('checked') );
            $('#lla_nauseasi_detalle').prop( "disabled", $(this).prop('checked') );
            $('#lla_nauseano').prop( "disabled", $(this).prop('checked') );
            $('#lla_otrossintomassi').prop( "disabled", $(this).prop('checked') );
            $('#lla_otrossintomassi_detalle').prop( "disabled", $(this).prop('checked') );
            $('#lla_otrossintomasno').prop( "disabled", $(this).prop('checked') );
        });
        $('input[name*="lla_tos"]').on('change', function (data) {
            $('#lla_tossi_detalle').val('');
            $('#lla_tossi_detalle').prop('disabled', !$('#lla_tossi').prop('checked'));
        });
        $('input[name*="lla_mialgia"]').on('change', function (data) {
            $('#lla_mialgiasi_detalle').val('');
            $('#lla_mialgiasi_detalle').prop('disabled', !$('#lla_mialgiasi').prop('checked'));
        });
        $('input[name*="lla_diarrea"]').on('change', function (data) {
            $('#lla_diarreasi_detalle').val('');
            $('#lla_diarreasi_detalle').prop('disabled', !$('#lla_diarreasi').prop('checked'));
        });
        $('input[name*="lla_nausea"]').on('change', function (data) {
            $('#lla_nauseasi_detalle').val('');
            $('#lla_nauseasi_detalle').prop('disabled', !$('#lla_nauseasi').prop('checked'));
        });
        $('input[name*="lla_saturacion"]').on('change', function (data) {
            $('#lla_saturacionsi_detalle').val('');
            $('#lla_saturacionsi_detalle').prop('disabled', !$('#lla_saturacionsi').prop('checked'));
        });
        $('input[name*="lla_otrossintomas"]').on('change', function (data) {
            $('#lla_otrossintomassi_detalle').val('');
            $('#lla_otrossintomassi_detalle').prop('disabled', !$('#lla_otrossintomassi').prop('checked'));
        });
        $('input[name*="lla_fiebre"]').on('change', function (data) {
            $('#lla_fiebresi_detalle').val('');
            $('#lla_fiebresi_detalle').prop('disabled', !$('#lla_fiebresi').prop('checked'));
        });
        //EVENTOS DE CONTROLES

        jQuery('#lla_estado').on('change', function (data) {
            $('#form_detalle')[0].reset();
            if( $(this).val() == 20 || $(this).val() == 31 || $(this).val() == 82 || $(this).val() == 84 ){
                $('#form_detalle').css('display', 'block');
                sliderSiente = new Slider("#lla_slider_siente", { tooltip: 'always' });
                sliderPecho = new Slider("#lla_slider_pecho", { tooltip: 'always' });
                sliderGarganta = new Slider("#lla_slider_garganta", { tooltip: 'always' });
                sliderCabeza = new Slider("#lla_slider_cabeza", { tooltip: 'always' });
            }
            else{
                $('#form_detalle').css('display', 'none');
            }
        });
        jQuery('#lla_btnGuardar').on('click', function (data) {
            if ( !validardatos() ) { return false;}

            //$('#'+$('#idparent').val()).modal('hide');
            Swal.fire({
                title: '¿Estás seguro de la acción?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Si',
                denyButtonText: 'No',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    var retornograbacion = grabarLlamada();
                    if(retornograbacion){
                       Swal.fire({
                            icon: 'success',
                            title: 'Se registró el servicio de seguimiento COVID',
                            showConfirmButton: true,
                            //timer: 2000
                        }).then((value) => {

                            if( $('#lla_estado').val() == 20 || $('#lla_estado').val() == 31 ){
                                Swal.fire({
                                    title: '¿Desea emitir Descanso médico?',
                                    showDenyButton: true,
                                    showCancelButton: true,
                                    confirmButtonText: 'Si',
                                    denyButtonText: 'No',
                                    cancelButtonText: 'No',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        vistadescanso();
                                    }
                                    else{
                                        window.location.href = '<?php echo base_url() ?>Seguimiento/Seguimiento'; 
                                    }
                                });
                            }
                            else{
                                window.location.href = '<?php echo base_url() ?>Seguimiento/Seguimiento'; 
                            }
                        });
                    }
                    else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Hubieron errores en la creación del seguimiento',
                            showConfirmButton: false,
                            timer: 1500
                        }).then((value) => {
                            //$('#'+$('#idparent').val()).modal('show');
                        });
                    }
                } else if (result.isDenied) {
                    //$('#'+$('#idparent').val()).modal('show');
                }
            });


        });
        jQuery('#lla_btnActualizarDatos').on('click', function (data) {
            $('#'+$('#idparent').val()).modal('hide');
            Swal.fire({
                title: '¿Estás seguro de la acción?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Si',
                denyButtonText: 'No',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    var retornograbacion = actualizarPaciente();
                    if(retornograbacion){
                       $('#lla_respuesta_actualizar').val(1);
                       Swal.fire({
                            icon: 'success',
                            title: 'Se actualizaron los datos del paciente',
                            showConfirmButton: true,
                            //timer: 2000
                        }).then((value) => {
                            $('#'+$('#idparent').val()).modal('show');
                        });
                    }
                    else{
                        $('#lla_fechanacimiento').val(tmp_fecha_nacimiento);
                        $('#lla_sexo').val(tmp_sexo);
                        $('#lla_celular').val(tmp_movil);
                        $('#lla_email').val(tmp_email);
                        Swal.fire({
                            icon: 'error',
                            title: 'Hubieron errores en la creación del seguimiento',
                            showConfirmButton: false,
                            timer: 1500
                        }).then((value) => {
                            $('#'+$('#idparent').val()).modal('show');
                        });
                    }
                } else if (result.isDenied) {
                    $('#'+$('#idparent').val()).modal('show');
                }
                $('#lla_fechanacimiento').attr('readonly', true);
                $('#lla_sexo').attr('readonly', true);
                $('#lla_celular').attr('readonly', true);
                $('#lla_email').attr('readonly', true);
                $('#lla_codpaciente').attr('readonly', true);
                $('#lla_sintoma').attr('readonly', true);
                $('#lla_atencion').attr('readonly', true);
            });
        });
        
        jQuery('#lla_btnEditFechaNacimiento').on('click', function (data) {
            if( $('#lla_fechanacimiento').attr('readonly') ){
                $('#lla_fechanacimiento').removeAttr('readonly');
            }
            else{
                $('#lla_fechanacimiento').attr('readonly', true);
                $('#lla_fechanacimiento').val(tmp_fecha_nacimiento);
            }
        });
        jQuery('#lla_btnSexo').on('click', function (data) {
            if( $('#lla_sexo').attr('readonly') ){
                $('#lla_sexo').removeAttr('readonly');
            }
            else{
                $('#lla_sexo').attr('readonly', true);
                $('#lla_sexo').val(tmp_sexo);
            }
        });
        jQuery('#lla_btnTlfMovil').on('click', function (data) {
            if( $('#lla_celular').attr('readonly') ){
                $('#lla_celular').removeAttr('readonly');
            }
            else{
                $('#lla_celular').attr('readonly', true);
                $('#lla_celular').val(tmp_movil);
            }
        });
        jQuery('#lla_btnEmail').on('click', function (data) {
            if( $('#lla_email').attr('readonly') ){
                $('#lla_email').removeAttr('readonly');
            }
            else{
                $('#lla_email').attr('readonly', true);
                $('#lla_email').val(tmp_email);
            }
        });
        jQuery('#lla_btnFechaIniSintomas').on('click', function (data) {
            if( $('#lla_sintomas').attr('readonly') ){
                $('#lla_sintomas').removeAttr('readonly');
            }
            else{
                $('#lla_sintomas').attr('readonly', true);
                $('#lla_sintomas').val(tmp_fecha_sintoma);
            }
        });
        jQuery('#lla_btnFechaAtencion').on('click', function (data) {
            if( $('#lla_atencion').attr('readonly') ){
                $('#lla_atencion').removeAttr('readonly');
            }
            else{
                $('#lla_atencion').attr('readonly', true);
                $('#lla_atencion').val(tmp_fecha_atencion);
            }
        });
        

        var cod_clasificacion = parseInt($('#lla_codclasificacion').val());
        var tipo_ingreso = $('#lla_tipoingreso').val();

        if(cod_clasificacion == 900){
            if(tipo_ingreso == 'CASO CONFIRMADO'){
                cargarEstadosCovid(1);
            }
            if(tipo_ingreso == 'CASO SOSPECHOSO' || tipo_ingreso == 'CASO PROBABLE'){
                cargarEstadosCovid(2);
            }
        }
        else{
            var permisos = <?php echo json_encode($_SESSION['permisos']) ?>;
            let permiso14803 = permisos.find(x => x.cod_permiso === 14803);
            if( permiso14803 && permiso14803.length > 0 ){
                cargarEstadosCovid(3);
            }
            else{
                cargarEstadosCovid(4);
            }
        }

        $('#lla_btnDescansoMedico').on('click', function(event) {
            vistadescanso();
            return false;
        });

        // fnInputNumber(document.getElementById("lla_diarreasi_detalle"), 0);
    });

    function grabarLlamada(){
        var retorno = false;
        let urldata = '<?php echo base_url() ?>Seguimiento/insertSeguimientoBcp';
        var idsegcovid = parseInt($('#lla_idsegcovid').val());
        var nroseguimiento = parseInt($('#lla_seg').val());
        var estado = parseInt($('#lla_estado').val());
        var estadoanterior = parseInt($('#lla_estadoanterior').val());
        var check_ume = $('#lla_ume').prop('checked');
        var check_domicilio = $('#lla_domicilio').prop('checked');
        var check_dronline = $('#lla_dronline').prop('checked');
        var edad = $('#lla_edad').val();
        var des_estado = $("#lla_estado option:selected").text();
        var lla_factorniega = $('#lla_factorniega').prop('checked');
        var lla_factorotros = $('#lla_factorotros').prop('checked');
        var lla_sintoma_asintomatico = $('#lla_sintoma_asintomatico').prop('checked');
        var comentarios_factorotros = $('#lla_otros').val();
        var fecha_atencion = $('#lla_atencion').val();
        var fecha_coordinada  = $('#lla_tomamuestra').val();

        var vacunasi = null;
        var vacunado = parseInt($('#lla_yavacunado').val());
        if(vacunado == 0){
            var vacunasi = $('#lla_vacunasi').prop('checked');
            var vacunasi_detalle = $('#lla_dosis').val();
        }       

        var es_paciente_redflag = $('#lla_redflagsi').prop('checked');
        var cod_paciente = $('#lla_codpaciente').val();
        var periodo = $("#lla_periodo option:selected").text();
        var cod_clasificacion = parseInt($('#lla_codclasificacion').val());
        var paciente_no_contesta = !(estado==32);
        var es_mayor_edad = false;
        var con_morbilidad = false;
        var con_sintomas = false;

        var table = $('#tbl_factor').DataTable();
        var jsonFactor = [], jsonsintoma = [], jsonredflag = [];
        // Array para Factor Riesgo
        if($('#form_detalle').css('display') == 'block'){
            if(edad > 60 ){
                es_mayor_edad=true;
            }
            if(lla_factorniega){
                jsonFactor.push({ 'id_sc_fr' : 0, 'obs_riesgo': '' });
            }else{
                con_morbilidad = true;
                table.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
                    var datarow = $(this.data());
                    var checkrow = $(this.node()).find('td:first-child input[type="checkbox"]').prop('checked');
                    var inputrow = $($(this.node()).find('td').eq(2)).val();
                    var inputrow = $('#riesgotxt_' + datarow[0].id_sc_fr).val();
                    if(checkrow){
                        jsonFactor.push({ 'id_sc_fr' : datarow[0].id_sc_fr, 'obs_riesgo': inputrow });
                    }
                } );
                if(lla_factorotros){
                    jsonFactor.push({ 'id_sc_fr' : 99, 'obs_riesgo': comentarios_factorotros });
                }
            }
        }
        else{
            jsonFactor.push({ 'id_sc_fr' : -1, 'obs_riesgo': 'NO APLICA' });
        }

        // Array para Sintoma
        if($('#form_detalle').css('display') == 'block'){
            if(lla_sintoma_asintomatico){
                jsonsintoma.push({ 'id_preg_sint' : 0, 'rpta_pregunta_sintoma': '', 'obs_sintoma': '' });
            }else{
                con_sintomas = true;
                jsonsintoma.push({ 'id_preg_sint' : 1, 'rpta_pregunta_sintoma': $('#lla_slider_siente').val(), 'obs_sintoma': '' });
                jsonsintoma.push({ 'id_preg_sint' : 2, 'rpta_pregunta_sintoma': $('#lla_tossi').prop('checked')?'SI':'NO', 'obs_sintoma': $('#lla_tossi_detalle').val() });
                jsonsintoma.push({ 'id_preg_sint' : 3, 'rpta_pregunta_sintoma': $('#lla_mialgiasi').prop('checked')?'SI':'NO', 'obs_sintoma': $('#lla_mialgiasi_detalle').val() });
                jsonsintoma.push({ 'id_preg_sint' : 4, 'rpta_pregunta_sintoma': $('#lla_slider_pecho').val(), 'obs_sintoma': '' });
                jsonsintoma.push({ 'id_preg_sint' : 5, 'rpta_pregunta_sintoma': $('#lla_slider_garganta').val(), 'obs_sintoma': '' });
                jsonsintoma.push({ 'id_preg_sint' : 6, 'rpta_pregunta_sintoma': $('#lla_slider_cabeza').val(), 'obs_sintoma': '' });
                jsonsintoma.push({ 'id_preg_sint' : 7, 'rpta_pregunta_sintoma': $('#lla_congestionsi').prop('checked')?'SI':'NO', 'obs_sintoma': '' });
                jsonsintoma.push({ 'id_preg_sint' : 8, 'rpta_pregunta_sintoma': $('#lla_diarreasi').prop('checked')?'SI':'NO', 'obs_sintoma': $('#lla_diarreasi_detalle').val() });
                jsonsintoma.push({ 'id_preg_sint' : 9, 'rpta_pregunta_sintoma': $('#lla_nauseasi').prop('checked')?'SI':'NO', 'obs_sintoma': $('#lla_nauseasi_detalle').val() });
                jsonsintoma.push({ 'id_preg_sint' : 10, 'rpta_pregunta_sintoma': $('#lla_otrossintomassi').prop('checked')?'SI':'NO', 'obs_sintoma': $('#lla_otrossintomassi_detalle').text() });
            }
        }
        else{
            jsonsintoma.push({ 'id_preg_sint' : -1, 'rpta_pregunta_sintoma': '0', 'obs_sintoma': '' });
        }

        // Array para RedFlag
        if($('#form_detalle').css('display') == 'block'){
            jsonredflag.push({ 'id_preg_flag' : 1, 'rpta_pregunta_redflag': $('#lla_fiebresi').prop('checked'), 'obs_redflag': $('#lla_fiebresi_detalle').val() + ' C' });
            jsonredflag.push({ 'id_preg_flag' : 2, 'rpta_pregunta_redflag': $('#lla_airesi').prop('checked'), 'obs_redflag': '' });
            jsonredflag.push({ 'id_preg_flag' : 3, 'rpta_pregunta_redflag': $('#lla_agitasi').prop('checked'), 'obs_redflag': '' });
            jsonredflag.push({ 'id_preg_flag' : 4, 'rpta_pregunta_redflag': $('#lla_respiracionsi').prop('checked'), 'obs_redflag': '' });
            jsonredflag.push({ 'id_preg_flag' : 5, 'rpta_pregunta_redflag': $('#lla_cianosissi').prop('checked'), 'obs_redflag': '' });
            jsonredflag.push({ 'id_preg_flag' : 6, 'rpta_pregunta_redflag': $('#lla_confusionsi').prop('checked'), 'obs_redflag': '' });
            jsonredflag.push({ 'id_preg_flag' : 7, 'rpta_pregunta_redflag': $('#lla_saturacionsi').prop('checked'), 'obs_redflag': $('#lla_saturacionsi_detalle').val() });
            jsonredflag.push({ 'id_preg_flag' : 8, 'rpta_pregunta_redflag': $('#lla_redflagsi').prop('checked'), 'obs_redflag': '' });
        }

        let datos = { 'id_seg_covid' : idsegcovid, 'numero_seguimiento': nroseguimiento, 'estado': estado, 'estadoanterior': estadoanterior, 'des_estado' : des_estado,
            'check_ume': check_ume, 'check_domicilio' : check_domicilio, 'check_dronline' : check_dronline, 'periodo' : periodo, 'cod_clasificacion' : cod_clasificacion,
            'es_paciente_redflag' : es_paciente_redflag, 'es_mayor_edad' : es_mayor_edad, 'con_morbilidad' : con_morbilidad, 'con_sintomas' : con_sintomas,
            'fecha_atencion' : fecha_atencion, 'fecha_coordinada' : fecha_coordinada, 'vacuna' : vacunasi, 'vacuna_dosis' : vacunasi_detalle, 'cod_paciente' : cod_paciente,
            'paciente_no_contesta': paciente_no_contesta,
            'riesgo' : jsonFactor,
            'sintoma' : jsonsintoma,
            'redflag' : jsonredflag
        };
        console.log(datos);
        debugger;
        jQuery.ajax({
            url: urldata,
            async: false,
            data: datos,
            type: 'POST',
            success: function (response) {
                console.log(response);
                var data = JSON.parse(response);
                if(data.success)
                {
                    retorno = true;
                }
            },
            error: function(err){
                retorno = false;
            }
        })
        return retorno;
    }

    function cargarEstadosCovid(tipo_ingreso){
        let urldata = '<?php echo base_url() ?>Seguimiento/getSeguimientoCovidEstados?tipo_ingreso='+tipo_ingreso;
        $('#lla_estado').find('option').remove();
        $.ajax({
            url: urldata,
            async: false,
            type: 'POST',
            success: function (response) {
                var data = JSON.parse(response);
                $.each(data, function(index, value) {
                    $('#lla_estado').append( $('<option />').val(value.cod_estado).text(value.descripcion_estado) );
                });
            },
            error: function(er){
                var a = er;
            }
        })
    }
    function cargarTablaRiesgo(){
        let urldata = '<?php echo base_url() ?>Seguimiento/getFactoresRiesgo';
            jQuery.ajax({
                url: urldata,
                async: false,
                type: 'GET',
                success: function (response) {
                    response = JSON.parse(response);
                    let tablaH = $('#tbl_factor');
                    tablaH.DataTable().clear();
                    tablaH.DataTable().destroy();
                    tablaH.DataTable( {
                        data: response,
                        searching: false,
                        language: global_tablelanguage,
                        sorting: false,
                        bInfo : false,
                        paginate: false,
                        columns: [
                            {
                                "data": null,
                                "render": function ( data, type, row, meta ) {
                                    return '<input id="riesgock_'+ row.id_sc_fr +'" type="checkbox" class="form-control">';
                                },
                                "width":"50px"
                            },
                            { "data": "descripcion_fr", "width":"600px" },
                            {
                                "data": null,
                                "render": function ( data, type, row, meta ) {
                                    return '<input id="riesgotxt_'+ row.id_sc_fr +'" class="form-control col-12 uppercase" type="text" value="" disabled>';
                                },
                                "width":"150px"
                            }
                        ]
                    });
                },
                error: function(err){
                    console.log(err);
                }
            })
    }

    function adddireccion(){
        if ( !validardireccion() ) { return false; }
        let boton = $('#pac_btnAddDireccion').val();
        var tabla = $('#per_direcciones');
        if(boton == 'Grabar cambio'){
            tabla.DataTable().cell({row: indextabledireccion, column: 0}).data($('#pac_ubigeoid').val());
            tabla.DataTable().cell({row: indextabledireccion, column: 1}).data($('#pac_ubigeo').val());
            tabla.DataTable().cell({row: indextabledireccion, column: 2}).data($('#pac_direccion').val().toUpperCase());
            tabla.DataTable().cell({row: indextabledireccion, column: 3}).data($('#pac_referencia').val().toUpperCase());
            tabla.DataTable().cell({row: indextabledireccion, column: 4}).data($('#pac_tlfcasa').val());
            tabla.DataTable().cell({row: indextabledireccion, column: 5}).data($('#pac_tlftrabajo').val());
            tabla.DataTable().cell({row: indextabledireccion, column: 6}).data($('#pac_tlftrabajoanexo').val());
            $('#pac_btnAddDireccion').val('Agregar dirección');
        }
        else{
            tabla.DataTable().row.add( [
                $('#pac_ubigeoid').val(),
                $('#pac_ubigeo').val(),
                $('#pac_direccion').val().toUpperCase(),
                $('#pac_referencia').val().toUpperCase(),
                $('#pac_tlfcasa').val(),
                $('#pac_tlftrabajo').val(),
                $('#pac_tlftrabajoanexo').val(),
                '<button id="per_direccionedit" class="btn btn-primary" type="button"><i class="fas fa-edit"></i></button>'
                +'<button id="per_direcciondelete" class="btn btn-danger" type="button"><i class="fas fa-trash"></i></button>'
            ] ).draw( false );
        }
        $('#form_direcciones')[0].reset();
    }
    function seteditdireccion(data, index){
        indextabledireccion = index;
        $('#pac_ubigeoid').val(data[0]);
        $('#pac_ubigeo').val(data[1]);
        $('#pac_direccion').val(data[2]);
        $('#pac_referencia').val(data[3]);
        $('#pac_tlfcasa').val(data[4]);
        $('#pac_tlftrabajo').val(data[5]);
        $('#pac_tlftrabajoanexo').val(data[6]);

        $('#pac_btnAddDireccion').val('Grabar cambio');
    }

    function validardireccion(){
        var errores = [];
        if($('#pac_ubigeoid').val() == '') errores.push('Ingrese un UBIGEO valido');
        if($('#pac_direccion').val() == '') errores.push('Ingrese una DIRECCIÓN');
        if($('#pac_referencia').val() == '') errores.push('Ingrese una REFERENCIA');
        if(errores.length>0)
        {
            window.alert(errores.join('\n'));
            return false;
        }
        else return true;
    }
    function validardatos(){
        var errores = [];
        if($('#lla_estado').val() == '0') errores.push('Seleccione ESTADO');
        if($('#lla_periodo').val() == '') errores.push('Seleccione PERIODO');
        if($('#lla_tossi').prop('checked') && $('#lla_tossi_detalle').val() == '') errores.push('Seleccione PERSISTENCIA DE TOS');
        if($('#lla_mialgiasi').prop('checked') && $('#lla_mialgiasi_detalle').val() == '') errores.push('Seleccione MIALGIA');
        if($('#lla_diarreasi').prop('checked') && $('#lla_diarreasi_detalle').val() == '') errores.push('Ingrese DIARREA');
        if($('#lla_nauseasi').prop('checked') && $('#lla_nauseasi_detalle').val() == '') errores.push('Ingrese NAUSEA');
        if($('#lla_fiebresi').prop('checked') && $('#lla_fiebresi_detalle').val() == '') errores.push('Ingrese °C FIEBRE');
        if($('#lla_saturacionsi').prop('checked') && $('#lla_saturacionsi_detalle').val() == '') errores.push('Ingrese % SATURACION');

        if(errores.length>0)
        {
            $('#'+$('#idparent').val()).modal('hide');
            Swal.fire({
                icon: 'error',
                title: errores.join('\n'),
                showConfirmButton: false,
                timer: 1500
            }).then((value) => {
                $('#'+$('#idparent').val()).modal('show');
            });
            //window.alert(errores.join('\n'));
            return false;
        }
        else return true;
    }

    function actualizarPaciente(){
        var retorno = false;
        let urldata = '<?php echo base_url() ?>Paciente/actualizarpaciente';
        var fec_nac = $('#lla_fechanacimiento').val();
        var sexo = $('#lla_sexo').val();
        var movil = $('#lla_celular').val();
        var email = $('#lla_email').val();
        var cod_hia = $('#lla_codpaciente').val();

        var idsegcovid = parseInt($('#lla_idsegcovid').val());
        var fecha_sintoma = $('#lla_sintomas').val();
        var fecha_atencion = $('#lla_atencion').val();

        var datos = {
            cod_hia: cod_hia,
            fnac_pac: fec_nac,
            sex_pac:(sexo.trim()=='MASCULINO'?false:true),
            correo_pac: email,
            cel_pac: movil,
            fecha_sintoma : fecha_sintoma,
            fecha_atencion : fecha_atencion,
            idsegcovid: idsegcovid
        }
        console.log(datos);
        jQuery.ajax({
            url: urldata,
            async: false,
            data: { 'data': datos},
            type: 'POST',
            success: function (response) {
                console.log(response);
                var data = JSON.parse(response);
                if(data.success)
                {
                    retorno = true;
                }
            },
            error: function(err){
                retorno = false;
            }
        })
        return retorno;
    }
    
    function vistadescanso(){
        $('#modal_llamada').modal('hide');
        let urldata = '<?php echo base_url() ?>Seguimiento/DescansoMedico';
        $.ajax({
            url: urldata,
            async: false,
            type: 'GET',
            success: function (response) {
                $('#modal_descanso_content').html(response);
                $('#modal_descanso').modal('show');
                $('#des_paciente').val($('#lla_paciente').val());
                $('#des_idsegcovid').val($('#lla_idsegcovid').val());
                $('#des_atereferenciada').val('');
                $('#des_fatencion').val($('#lla_atencion').val());
                $('#des_clasificacion').val($('#lla_clasificacion').val());                

                $('#modal_descanso').on('hidden.bs.modal', function () {
                    if($('#des_descansogenerado').val() == '1' ){
                        process(true);
                        if($('#lla_escovid').val() == '1'){ //Covid
                            urldata = '<?php echo base_url() ?>Seguimiento/TemplateDescansoMedicoCovid?id_seg_covid='+$('#des_idsegcovid').val()+'&secuencia='+$('#des_orden').val();
                        }
                        else{
                            urldata = '<?php echo base_url() ?>Seguimiento/TemplateDescansoMedico?id_seg_covid='+$('#des_idsegcovid').val()+'&secuencia='+$('#des_orden').val();
                        }

                        $.ajax({
                            url: urldata,
                            async: false,
                            type: 'GET',
                            success: function (response) {
                                $('#modal_descanso_template_content').html(response);
                                $('#modal_descanso_template').modal('show');

                                $('#modal_descanso_template').on('hidden.bs.modal', function () {
                                    urldata = '<?php echo base_url() ?>Seguimiento/TemplateRecetaCovid?id_seg_covid='+$('#des_idsegcovid').val()+'&secuencia='+$('#des_orden').val();
                                    $.ajax({
                                        url: urldata,
                                        async: false,
                                        type: 'GET',
                                        success: function (response) {
                                            $('#modal_receta_template_content').html(response);
                                            $('#modal_receta_template').modal('show');
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
                                    }).then(()=>{
                                        process(false);
                                    });


                                });

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
                        }).then(()=>{
                            process(false);
                        });
                    }else{
                        $('#modal_llamada').modal('show');
                    }
                });
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