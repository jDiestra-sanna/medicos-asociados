<!--
  EJEMPLO DE MULTISTEPS
  https://www.phpzag.com/multi-step-form-using-jquery-bootstrap-and-php/ 
-->
<?php encabezado() ?>

<?php 
  $medico_data = json_decode($_SESSION['medico_data']);
  $nombres = $medico_data->nombres;
  $apellidos = $medico_data->apellidos;
  $tipodoc = $medico_data->tipodoc;
  $nrodocumento = $medico_data->nrodocumento;
  $telefono1 = $medico_data->telefono1;
  $telefono2 = $medico_data->telefono2;
  $email = $medico_data->email;

  $check_termino = isset($medico_data->check_termino)?$medico_data->check_termino:'';
  $check_datos = isset($medico_data->check_datos)?$medico_data->check_datos:'';
  $check_cookie = isset($medico_data->check_cookie)?$medico_data->check_cookie:'';
  $especialidad_estado = isset($medico_data->especialidad_estado)?$medico_data->especialidad_estado:'';

  $profesion = isset($medico_data->profesion)?$medico_data->profesion:'';
  $especialidad = isset($medico_data->especialidad)?$medico_data->especialidad:'';
  $especialidad_otro = isset($medico_data->especialidad_otro)?$medico_data->especialidad_otro:'';
  $nro_colegiatura = isset($medico_data->nro_colegiatura)?$medico_data->nro_colegiatura:'';
  $nro_rne = isset($medico_data->nro_rne)?$medico_data->nro_rne:'';
  $idioma = isset($medico_data->idioma)?$medico_data->idioma:'';
  $idioma_otro = isset($medico_data->idioma_otro)?$medico_data->idioma_otro:'';
  $nacionalidad = isset($medico_data->nacionalidad)?$medico_data->nacionalidad:'';
  $direccion = isset($medico_data->direccion)?$medico_data->direccion:'';
  $referencia = isset($medico_data->referencia)?$medico_data->referencia:'';
  $factor = isset($medico_data->factor_riesgo)?$medico_data->factor_riesgo:'';
  $factor_otro = isset($medico_data->factor_otro)?$medico_data->factor_otro:'';  
  $fecha_nacimiento = isset($medico_data->fecha_nacimiento)?$medico_data->fecha_nacimiento:'';

  $ubigeo_des = isset($medico_data->ubigeo_des)?$medico_data->ubigeo_des:'';
  $ubigeo_id = isset($medico_data->ubigeo_id)?$medico_data->ubigeo_id:'';

  $medico_solicitud = isset($_SESSION['medico_solicitud'])? json_decode($_SESSION['medico_solicitud']): null;
  $servicio = isset($medico_solicitud->servicio)?$medico_solicitud->servicio:'';
  $nro_solicitud = isset($medico_solicitud->nro_solicitud)?$medico_solicitud->nro_solicitud:'';
  $documento_comentario = isset($medico_solicitud->documento_comentario)?$medico_solicitud->documento_comentario:'';
  $activo = isset($medico_solicitud->activo)?$medico_solicitud->activo:0;

  // echo json_encode($_SESSION['solicitud_documentos']);
  $solicitud_documentos = isset($_SESSION['solicitud_documentos'])? json_decode($_SESSION['solicitud_documentos']): null;
  $file_0=''; $file_1=''; $file_2=''; $file_3=''; $file_4=''; $file_5='';
  $file_2da_0=''; $file_2da_1=''; $file_2da_2=''; $file_2da_3=''; $file_2da_4=''; $file_2da_5='';$file_2da_6='';$file_2da_7='';
  $file_psico_0=''; $file_psico_1=''; $file_psico_2=''; 
  // $file_psico_3='';
  $count_files_documentos = 0; $count_files_documentos_2da = 0; $count_files_documentos_psico = 0;
  if(is_array($solicitud_documentos)){
    for($index = 0;$index < count($solicitud_documentos);$index++){
      if($solicitud_documentos[$index]->tipo == 'cv') { $file_0 =  $solicitud_documentos[$index]->file_name; $count_files_documentos++;}
      if($solicitud_documentos[$index]->tipo == 'rne') { $file_1 =  $solicitud_documentos[$index]->file_name; $count_files_documentos++;}
      if($solicitud_documentos[$index]->tipo == 'titpro') { $file_2 =  $solicitud_documentos[$index]->file_name; $count_files_documentos++;}
      if($solicitud_documentos[$index]->tipo == 'declaracion') { $file_3 =  $solicitud_documentos[$index]->file_name; $count_files_documentos++;}
      if($solicitud_documentos[$index]->tipo == 'titesp') { $file_4 =  $solicitud_documentos[$index]->file_name; $count_files_documentos++;}
      if($solicitud_documentos[$index]->tipo == 'colegio') { $file_5 =  $solicitud_documentos[$index]->file_name; $count_files_documentos++;}

      if($solicitud_documentos[$index]->tipo == '2da_0') { $file_2da_0 =  $solicitud_documentos[$index]->file_name; $count_files_documentos_2da++;}
      if($solicitud_documentos[$index]->tipo == '2da_1') { $file_2da_1 =  $solicitud_documentos[$index]->file_name; $count_files_documentos_2da++;}
      if($solicitud_documentos[$index]->tipo == '2da_2') { $file_2da_2 =  $solicitud_documentos[$index]->file_name; $count_files_documentos_2da++;}
      if($solicitud_documentos[$index]->tipo == '2da_3') { $file_2da_3 =  $solicitud_documentos[$index]->file_name; $count_files_documentos_2da++;}
      if($solicitud_documentos[$index]->tipo == '2da_4') { $file_2da_4 =  $solicitud_documentos[$index]->file_name; $count_files_documentos_2da++;}
      if($solicitud_documentos[$index]->tipo == '2da_5') { $file_2da_5 =  $solicitud_documentos[$index]->file_name; $count_files_documentos_2da++;}
      if($solicitud_documentos[$index]->tipo == '2da_6') { $file_2da_6 =  $solicitud_documentos[$index]->file_name; $count_files_documentos_2da++;}
      if($solicitud_documentos[$index]->tipo == '2da_7') { $file_2da_7 =  $solicitud_documentos[$index]->file_name; $count_files_documentos_2da++;}
      
      if($solicitud_documentos[$index]->tipo == 'psico_0') { $file_psico_0 =  $solicitud_documentos[$index]->file_name; $count_files_documentos_psico++;}
      if($solicitud_documentos[$index]->tipo == 'psico_1') { $file_psico_1 =  $solicitud_documentos[$index]->file_name; $count_files_documentos_psico++;}
      if($solicitud_documentos[$index]->tipo == 'psico_2') { $file_psico_2 =  $solicitud_documentos[$index]->file_name; $count_files_documentos_psico++;}
      // if($solicitud_documentos[$index]->tipo == 'psico_3') { $file_psico_3 =  $solicitud_documentos[$index]->file_name; $count_files_documentos_psico++;}
    }
  }

  // $paso1 = ($servicio!='') && ($nombres!='') && ($apellidos!='') && ($tipodoc!='') && ($nrodocumento!='') && ($telefono1!='') && ($telefono2!='') && ($nro_colegiatura!='') && ($nro_rne!='') && ($profesion!='') && ($idioma!='') && ($fecha_nacimiento!='') && ($nacionalidad!='') && ($ubigeo_id!='') && ($direccion!='') && ($referencia!='') && ($factor) && ($check_termino) && ($check_datos);
  $paso1 = ($servicio!='') && ($nombres!='') && ($apellidos!='') && ($tipodoc!='') && ($nrodocumento!='') && ($telefono1!='') && ($telefono2!='') && ($nro_colegiatura!='') && ($nro_rne!='') && ($profesion!='') && ($idioma!='') && ($fecha_nacimiento!='')&& ($nacionalidad!='') && ($ubigeo_id!='') && ($direccion!='') && ($factor);


  $btnPaso2Continuarlabel = '<input id="btnPaso2Grabar" type="button" class="btn btn-primary" value="Grabar" />';
  $btnPaso2Continuar = $btnPaso2Continuarlabel;

//  echo $activo;
  if($activo > 1){
    $btnPaso2Continuar = '';
  }
  $btnPaso3Continuarlabel = '<input id="btnPaso3Grabar" type="button" class="btn btn-primary" value="Grabar" />';
  $btnPaso3Continuar = $btnPaso3Continuarlabel;
  // if($count_files_documentos_psico < 4){
  if($activo == 3){
    $btnPaso3Continuar = '';
  }
  $btnPaso4Continuarlabel = '<input id="btnPaso4Grabar" type="button" class="btn btn-primary" value="Grabar" />';
  $btnPaso4Continuar = $btnPaso4Continuarlabel;
  // if($count_files_documentos_2da < 8){
  if($activo == 4){
    $btnPaso4Continuar = '';
  }
  
  $fecha_vigencia = isset($medico_solicitud->fecha_vigencia)?$medico_solicitud->fecha_vigencia:'';
  $codigo_interbancario = isset($medico_solicitud->codigo_interbancario)?$medico_solicitud->codigo_interbancario:'';
  $nombre_banco = isset($medico_solicitud->banco)?$medico_solicitud->banco:'';
  $tipo_cuenta = isset($medico_solicitud->tipo_cuenta)?$medico_solicitud->tipo_cuenta:'';
  $ruc = isset($medico_solicitud->ruc)?$medico_solicitud->ruc:'';
  $emite_factura = '';
  if (isset($medico_solicitud->emite_factura)){
    $emite_factura = $medico_solicitud->emite_factura == 1?'1':'';
  }
  $detraccion = isset($medico_solicitud->detraccion)?$medico_solicitud->detraccion:'';

?>
    
    <div class="col-lg-12 m-auto">
      <div class="card mt-6">
        <div class="card-header bg-primary text-center">
            <strong class="text-white">Inscripción Personal Médico</strong><br>
        </div>
        <div class="card-body">
            <h3>Bienvenido(a) a SANNA División Ambulatoria</h3>
            <div class="form-group">
            <span>Conócenos y descubre en qué consiste cada uno de nuestros servicios:</span> <a class="btn btn-primary" target="_blank" href="https://sanna.pe/sobre-sanna/servicios/">VER</a>
            <input type="text" id="med_nro_solicitud" class="offset-7" disabled value="Nro Solicitud: <?php echo $nro_solicitud; ?>" style="background-color: lightgray;"></input>
            </div>
            
            <div class="progress">
              <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="alert alert-success" style="display:none;"></div>	
            <div class="alert alert-danger" style="display:none;"></div>
            <form id="register_form" novalidate action="form_action.php"  method="post">
              <fieldset id="paso0">
                <h4>Paso 1: Selección del servicio y datos personales</h4>
                <span>Seleccione el servicio al cual desea suscribirse: (*)</span>
                <br>
                <span>(*) La suscripción es por servicio</span>
                <!-- <div class="row">
                  <input class="form-control col-1" type="radio" id="med_part" name="med_servicio" data-value="part" <?php echo ($servicio == 'part'? 'checked':''); ?> >Tópicos Particulares
                  <input class="form-control col-1" type="radio" id="med_paca" name="med_servicio" data-value="paca" <?php echo ($servicio == 'paca'? 'checked':''); ?> >Tópico Pacasmayo
                </div> -->
                <br>
                
                <div class="form-group border col-8 offset-2">
                  <!-- <h4>Datos personales</h4> -->

                  <div class="form-group">

                  <table class="table table-borderless">
                    <tbody>
                      <tr>
                        <td>
                          <input class="form-control col-2" type="radio" id="med_dom" name="med_servicio" data-value="dom" <?php echo ($servicio == 'dom'? 'checked':''); ?> >
                          <label for="med_dom">Médicos a Domicilio</label>
                        </td>
                        <td>
                          <input class="form-control col-2" type="radio" id="med_dr" name="med_servicio" data-value="dr" <?php echo ($servicio == 'dr'? 'checked':''); ?> >
                          <label for="med_dr">DR Online</label>
                        </td>
                        <td>
                          <input class="form-control col-2" type="radio" id="med_cro" name="med_servicio" data-value="cro" <?php echo ($servicio == 'cro'? 'checked':''); ?> >
                          <label for="med_cro">Crónicos</label>
                        </td>
                        <td>
                          <input class="form-control col-2" type="radio" id="med_covid" name="med_servicio" data-value="covid" <?php echo ($servicio == 'covid'? 'checked':''); ?> >
                          <label for="med_covid">Seguimiento COVID</label>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <input class="form-control col-3" type="radio" id="med_amb" name="med_servicio" data-value="amb" <?php echo ($servicio == 'amb'? 'checked':''); ?> >
                          <label for="med_amb">Ambulancias</label></td>
                        <td>
                          <input class="form-control col-3" type="radio" id="med_call" name="med_servicio" data-value="call" <?php echo ($servicio == 'call'? 'checked':''); ?> >
                          <label for="med_call">Call Médico</label>
                        </td>
                        <td>
                          <input class="form-control col-3" type="radio" id="med_tele" name="med_servicio" data-value="tele" <?php echo ($servicio == 'tele'? 'checked':''); ?> >
                          <label for="med_tele">Telemedicina</label>
                        </td>
                        <td>
                          <input class="form-control col-3" type="radio" id="med_midoc" name="med_servicio" data-value="midoc" <?php echo ($servicio == 'midoc'? 'checked':''); ?> >
                          <label for="med_midoc">MIDOC</label>
                        </td>
                        <td>
                          <input class="form-control col-3" type="radio" id="med_tsanna" name="med_servicio" data-value="tsanna" <?php echo ($servicio == 'tsanna'? 'checked':''); ?> >
                          <label for="med_tsanna">T-SANNA</label>
                        </td>
                      </tr>
                    </tbody>
                  </table>

                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-6">
                        <label for="med_nombres">Nombres</label>
                        <input type="text" class="form-control" name="med_nombres" id="med_nombres" placeholder="Nombres" value="<?php echo $nombres; ?>">      
                      </div>
                      <div class="col-6">
                        <label for="med_apellidos">Apellidos</label>
                        <input type="text" class="form-control" name="med_apellidos" id="med_apellidos" placeholder="Apellidos" value="<?php echo $apellidos; ?>">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <label for="med_tipodoc">Tipo doc. ident</label>
                        <select class="form-control" name="med_tipodoc" id="med_tipodoc" disabled>
                          <option value="dni" <?php echo ($tipodoc == 'dni'? 'selected':''); ?>>DNI</option>
                          <option value="carnet" <?php echo ($tipodoc == 'carnet'? 'selected':'') ?>>Carnet Extranjería</option>
                        </select>
                      </div>
                      <div class="col-6">
                        <label for="med_documento">Nro. documento</label>
                        <input type="text" class="form-control" disabled name="med_documento" id="med_documento" placeholder="Nro. documento" value="<?php echo $nrodocumento; ?>">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <label for="med_tlf1">Teléfono 1</label>
                        <input type="text" class="form-control" name="med_tlf1" id="med_tlf1" placeholder="Teléfono 1" value="<?php echo $telefono1; ?>">
                      </div>
                      <div class="col-6">
                        <label for="med_tlf2">Teléfono 2</label>
                        <input type="text" class="form-control" name="med_tlf2" id="med_tlf2" placeholder="Teléfono 2" value="<?php echo $telefono2; ?>">
                      </div>
                    </div>

                  </div>
                </div>
                
                <div class="text-center">
                  <input id="btnPaso0" type="button" class="next-form btn btn-primary" value="Continuar" />
                </div>

              </fieldset>



              <!-- Paso 1 -->
              <fieldset id="paso1">
                <h4>Paso 2: Selección del servicio</h4>
                
                <div class="form-group border">
                  <h4>Datos personales</h4>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-2">
                        <label for="med_colegiatura">Nro. de colegiatura</label>
                        <input type="number" min="0" max="999999" onKeyPress="if(this.value.length==6) return false;" class="form-control col-lg-6" name="med_colegiatura" id="med_colegiatura" value="<?php echo $nro_colegiatura; ?>">
                      </div>
                      <div class="col-2">
                        <label for="med_especialidad">Especialidad</label>
                        <select class="form-control" name="med_especialidad" id="med_especialidad">
                          <option value="" <?php echo ($especialidad == ''? 'selected':''); ?>>Seleccione una especialidad</option>
                          <option value="cirugia" <?php echo ($especialidad == 'cirugia'? 'selected':''); ?>>Cirugía</option>
                          <option value="otra" <?php echo ($especialidad == 'otra'? 'selected':''); ?>>Otra especialidad</option>
                        </select>
                      </div>
                      <div class="col-2">
                        <label for=""></label>
                        <div class="row">
                          <input class="form-control col-1" type="radio" id="med_esp_estado_si" name="med_esp_estado" data-value="1" <?php echo ($especialidad_estado==1? 'checked':''); ?>>Si
                          <input class="form-control col-1" type="radio" id="med_esp_estado_no" name="med_esp_estado" data-value="2" <?php echo ($especialidad_estado==2? 'checked':''); ?>>No
                          <input class="form-control col-1" type="radio" id="med_esp_estado_curso" name="med_esp_estado" data-value="3" <?php echo ($especialidad_estado==3? 'checked':''); ?>>En curso
                        </div>
                      </div>
                      <div class="col-2">
                        <label for="med_colegiatura">Nro. RNE</label>
                        <input type="number" min="0" max="999999" onKeyPress="if(this.value.length==6) return false;" class="form-control col-lg-6" name="med_rne" id="med_rne" value="<?php echo $nro_rne; ?>">
                      </div>
                      <div class="col-4">
                        <label for="med_especialidad_otros">Otros</label>
                        <input type="text" class="form-control" name="med_especialidad_otros" id="med_especialidad_otros" placeholder="Otra especialidad" value="<?php echo $especialidad_otro; ?>">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-2">
                        <label for="med_tlf2">Profesión</label>
                        <input type="text" class="form-control" name="med_profesion" id="med_profesion" placeholder="Profesión" value="<?php echo $profesion; ?>">
                      </div>
                      <div class="col-2">
                        <label for="med_idiomas">Conocimiento idiomas</label>
                        <select class="form-control" name="med_idiomas" id="med_idiomas">
                          <option value="ingles" <?php echo ($idioma == 'ingles'? 'selected':''); ?>>Inglés</option>
                          <option value="otro" <?php echo ($idioma == 'otro'? 'selected':''); ?>>Otros</option>
                        </select>
                      </div>
                      <div class="col-4">
                        <label for="med_idiomas_otros">Otros</label>
                        <input type="text" class="form-control" name="med_idiomas_otros" id="med_idiomas_otros" placeholder="Otro idioma" value="<?php echo $idioma_otro; ?>">
                      </div>
                      <div class="form-group col-4">
                        <label for="med_fechanac">Fecha de Nac.</label>
                        <div class="row col-lg-12">
                          <input type="date" class="form-control col-md-4" name="med_fechanac" id="med_fechanac" placeholder="Fecha Nacimiento" value="<?php echo $fecha_nacimiento; ?>">
                          <input type="text" class="form-control col-md-2" id="med_anos" disabled="">
                          <label disabled="">años</label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-4">
                        <label for="med_nacionalidad">Nacionalidad</label>
                        <input type="text" class="form-control" name="med_nacionalidad" id="med_nacionalidad" placeholder="Nacionalidad" value="<?php echo $nacionalidad; ?>">
                      </div>
                      <div class="col-8">
                        <label for="med_nacionalidad">Departamento / Provincia / Distrito </label>
                        <input id="med_ubigeo" name="med_ubigeo" class="form-control uppercase" type="text" value="<?php echo $ubigeo_des; ?>" placeholder="digite el nombre de su distrito">
                        <input type="text" class="form-control" id="med_ubigeoid" disabled="" hidden value="<?php echo $ubigeo_id; ?>">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8">
                        <label for="med_direccion">Dirección</label>
                        <input type="text" class="form-control" name="med_direccion" id="med_direccion" placeholder="Dirección" value="<?php echo $direccion; ?>">
                      </div>
                      <div class="col-4">
                        <label for="med_referencia">Referencia</label>
                        <input type="text" class="form-control" name="med_referencia" id="med_referencia" placeholder="Referencia" value="<?php echo $referencia; ?>">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-4" style="padding-left:20%">
                        <label for="med_factor">Factor de riesgo</label>
                        <div class="row">
                          <input class="form-control col-1" type="radio" id="med_factor_si" name="med_factor" <?php echo ($factor? 'checked':''); ?>>Si
                          <input class="form-control col-1" type="radio" id="med_factor_no" name="med_factor" <?php echo (!$factor? 'checked':''); ?>>No
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="med_factor_otro">Otros Factor Riesgo</label>
                        <input type="text" class="form-control" name="med_factor_otro" id="med_factor_otro" placeholder="Otros factor riesgo" value="<?php echo $factor_otro; ?>">
                      </div>
                    </div>

                  </div>
                </div>

                <!-- <div class="form-group">
                  <input class="col-3 offset-3" type="checkbox" id="med_terminos" name="med_terminos" disabled <?php echo ($check_termino? 'checked':''); ?> >He leido y acepto los <a href="#">términos y condiciones</a> y la cláusula informativa para el tratamiento de sus datos personales.
                  <br>
                  <input class="col-3 offset-3" type="checkbox" id="med_consentimiento" name="med_consentimiento" disabled <?php echo ($check_datos? 'checked':''); ?>>Acepto el tratamiento de mis datos personales conforme a los fines adicionales
                  <br>
                  <input class="col-3 offset-3" type="checkbox" id="med_cookie" name="med_cookie" disabled <?php echo ($check_cookie? 'checked':''); ?>>Acepto la política de cookies
                  <br>
                </div> -->
                
                <div class="text-center">
                  <input type="button" name="previous" class="previous-form btn btn-warning" value="Regresar" />
                  <input id="btnPaso1" type="button" class="next-form btn btn-primary" value="Continuar" />
                </div>
              </fieldset>

              <!-- Paso 2 -->
              <fieldset id="paso2">
                <h4>Paso 2: Documentación</h4>
                <div class="row" style="padding-left:15px;">
                  <span>Te estás suscribiendo al servicio de : </span><label class="form-label col-3 bold med_servicio_suscrito">XXXX</label>
                </div>
                <div class="form-group border">
                  <span>Como parte del proceso de suscripción al servicio, necesitamos la siguiente información:</span>
                  <br>
                  <div class="form-group">
                    <br>                    
                    <div class="row">
                      <div class="col-lg-4">
                        <label for="">Curriculum vitae simple actualizado </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file_cv" accept=".pdf, .doc, .docx" <?php echo ($file_0!=''?'disabled':''); ?>>
                            <label class="custom-file-label" for="file_cv"><?php echo $file_0; ?></label>
                        </div>
                      </div>
                      <div class="col-2">
                        <br>
                        <?php if(!($activo > 1)){ ?>
                        <a href="#" onclick="DeleteFile('cv')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        <?php } ?>
                      </div>

                      <div class="col-lg-4">
                        <label for="">Copia del RNE otorgado por el CMP (*) </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file_rne" accept=".pdf, .doc, .docx" <?php echo ($file_1!=''?'disabled':''); ?>>
                            <label class="custom-file-label" for="file_rne"><?php echo $file_1; ?></label>
                        </div>
                      </div>
                      <div class="col-2">
                        <br>
                        <?php if(!($activo > 1)){ ?>
                        <a href="#" onclick="DeleteFile('rne')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        <?php } ?>
                      </div>
                    </div>                    
                    <div class="row">
                      <div class="col-lg-4">
                        <label for="">Copia del Título Profesional: </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file_titpro" accept=".pdf, .doc, .docx" <?php echo ($file_2!=''?'disabled':''); ?>>
                            <label class="custom-file-label" for="file_titpro"><?php echo $file_2; ?></label>
                        </div>
                      </div>
                      <div class="col-2">
                        <br>
                        <?php if(!($activo > 1)){ ?>
                        <a href="#" onclick="DeleteFile('titpro')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        <?php } ?>
                      </div>

                      <div class="col-lg-4">
                        <label for="">Declaración Jurada de no tener antecedentes penales o judiciales: </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file_declaracion" accept=".pdf, .doc, .docx" <?php echo ($file_3!=''?'disabled':''); ?>>
                            <label class="custom-file-label" for="file_declaracion"><?php echo $file_3; ?></label>
                        </div>
                      </div>
                      <div class="col-2">
                        <br>
                        <?php if(!($activo > 1)){ ?>
                        <a href="#" onclick="DeleteFile('declaracion')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        <?php } ?>
                      </div>
                    </div>                                  
                    <div class="row">
                      <div class="col-lg-4">
                        <label for="">Copia de colegiatura otorgada por el CMP (*): </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file_colegio" accept=".pdf, .doc, .docx" <?php echo ($file_5!=''?'disabled':''); ?>>
                            <label class="custom-file-label" for="file_colegio"><?php echo $file_5; ?></label>
                        </div>
                      </div>
                      <div class="col-2">
                        <br>
                        <?php if(!($activo > 1)){ ?>
                        <a href="#" onclick="DeleteFile('colegio')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        <?php } ?>
                      </div>                                  
                      <div class="col-lg-4">
                        <label for="">Copia del título de especialidad (*): </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file_titesp" accept=".pdf, .doc, .docx" <?php echo ($file_4!=''?'disabled':''); ?>>
                            <label class="custom-file-label" for="file_titesp"><?php echo $file_4; ?></label>
                        </div>
                      </div>
                      <div class="col-2">
                        <br>
                        <?php if(!($activo > 1)){ ?>
                        <a href="#" onclick="DeleteFile('titesp')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <span>(*)  Si no cuenta, adjuntar evidencia del trámite.</span><br>
                        <span>     Si cuenta, adjuntar. Aplica constancias de culminación.</span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <label for="">Comentarios: </label>
                        <textarea class="form-control" name="med_comentario" id="med_comentario" cols="30" rows="2" <?php echo ($documento_comentario!=''?'disabled':''); ?>><?php echo $documento_comentario; ?></textarea>
                      </div>
                    </div>

                    <br>
                    <div class="row" style="padding-left:15px;">
                      <span><b>Si ha realizado una carga parcial de documento, cuenta con 72 horas para terminar la regularización, caso contrario, su proceso de solicitud de inscripción será desestimado</b></span>
                    </div>
                    <div class="row" style="padding-left:15px;">
                      <span>Si todos tus documentos se encuentran conforme, te informaremos para continuar con las pruebas psicotécnicas</span>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <!-- <input type="button" name="previous" class="previous-form btn btn-warning" value="Regresar" /> -->
                  <!-- <input id="btnPaso2Grabar" type="button" class="btn btn-primary" value="Grabar" /> -->
                  <?php echo $btnPaso2Continuar; ?>
                </div>
              </fieldset>	

              <!-- Paso 3 -->
              <fieldset  id="paso3">
                <h4>Paso 3: Documentación</h4>
                <div class="row" style="padding-left:15px;">
                  <span>Te estás suscribiendo al servicio de : </span><label class="form-label col-3 bold med_servicio_suscrito">XXXX</label>
                </div>
                <span>Como parte del proceso de suscripción al servicio, necesitamos la siguiente información:</span>
                <br>
                <div class="form-group border">
                  <div class="row">
                    <div class="col-3 offset-9 text-center">
                      <label for="">INTENTOS</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-2 offset-2">
                      <label for="">Certificado único laboral </label>
                    </div>
                    <div class="col-2">
                      <a href="https://www.empleosperu.gob.pe/portal-mtpe/#/" target="blank" ></i>ENLACE</a>
                    </div>
                    <div class="col-2">
                      <div class="custom-file">
                          <input type="file" class="custom-file-input" id="file_psico_0" accept=".pdf, .doc, .docx" <?php echo ($file_psico_0!=''?'disabled':''); ?>>
                          <label class="custom-file-label" for="file_psico_0"><?php echo $file_psico_0; ?></label></label>
                      </div>
                    </div>
                    <div class="col-1">
                      <?php if(!($activo == 3)){ ?>
                        <a href="#" onclick="DeleteFile('psico_0')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        <?php } ?>
                    </div>
                    <div class="col-3 text-center">
                      <label id="intento_psico_0">0 / 1</label>
                    </div>
                  </div>                                  
                  <div class="row">
                    <div class="col-lg-2 offset-2">
                      <label for="">Prueba Eysenck (*) </label>
                    </div>
                    <div class="col-2">
                      <!-- <a href="/Assets/documents/medicos/PRUEBA_EYSENCK.zip" >DESCARGA</a> -->
                      <a href="#" onclick="DownloadFile('PruebaEysenck')"  >DESCARGA</a>
                    </div>
                    <div class="col-2">
                      <div class="custom-file">
                          <input type="file" class="custom-file-input" id="file_psico_1" accept=".pdf, .doc, .docx" <?php echo ($file_psico_1!=''?'disabled':''); ?>>
                          <label class="custom-file-label" for="file_psico_1"><?php echo $file_psico_1; ?></label></label>
                      </div>
                    </div>
                    <div class="col-1">
                      <?php if(!($activo == 3)){ ?>
                        <a href="#" onclick="DeleteFile('psico_1')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        <?php } ?>
                    </div>
                    <div class="col-3 text-center">
                      <label id="intento_psico_1">0 / 1</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-2 offset-2">
                      <label for="">Prueba DISC </label>
                    </div>
                    <div class="col-2">
                      <!-- <a href="/Assets/documents/medicos/PRUEBA_DISC.zip" >DESCARGA</a> -->
                      <a href="#" onclick="DownloadFile('PruebaDisk')"  >DESCARGA</a>
                    </div>
                    <div class="col-2">
                      <div class="custom-file">
                          <input type="file" class="custom-file-input" id="file_psico_2" accept=".pdf, .doc, .docx" <?php echo ($file_psico_2!=''?'disabled':''); ?>>
                          <label class="custom-file-label" for="file_psico_2"><?php echo $file_psico_2; ?></label></label>
                      </div>
                    </div>
                    <div class="col-1">
                      <?php if(!($activo == 3)){ ?>
                        <a href="#" onclick="DeleteFile('psico_2')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        <?php } ?>
                    </div>
                    <div class="col-3 text-center">
                      <label id="intento_psico_2">0 / 1</label>
                    </div>
                  </div>                                  
                  <!-- <div class="row">
                    <div class="col-lg-2 offset-2">
                      <label for="">Prueba de Dibujo </label>
                    </div>
                    <div class="col-2">
                      <a href="/Assets/documents/medicos/PRUEBA_DISC.zip" >DESCARGA</a>
                    </div>
                    <div class="col-2">
                      <div class="custom-file">
                          <input type="file" class="custom-file-input" id="file_psico_3" accept=".pdf, .doc, .docx" <?php echo ($file_psico_3!=''?'disabled':''); ?>>
                          <label class="custom-file-label" for="file_psico_3"><?php echo $file_psico_3; ?></label></label>
                      </div>
                    </div>
                    <div class="col-1">
                      <?php if(!($activo == 3)){ ?>
                        <a href="#" onclick="DeleteFile('psico_3')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        <?php } ?>
                    </div>
                    <div class="col-3 text-center">
                      <label id="intento_psico_3">0 / 1</label>
                    </div>
                  </div> -->
                  <div class="row" style="padding-left:15px;">
                    <span><b>Recuerda que tienes un tiempo destinado para cada prueba</b></span>
                  </div>
                  <br>
                  <div class="row" style="padding-left:15px;">
                    <span><b>Si ha realizado una carga parcial de documento, cuenta con 72 horas para terminar la regularización, caso contrario, su proceso de solicitud de inscripción será desestimado</b></span>
                  </div>
                </div>
                <div class="text-center">
                  <!-- <input type="button" name="previous" class="previous-form btn btn-warning" value="Regresar" /> -->
                  <!-- <input id="btnPaso3Grabar" type="button" class="btn btn-primary" value="Grabar" /> -->
                  <?php echo $btnPaso3Continuar; ?>
                </div>
              </fieldset>

              <!-- Paso 4 -->
              <fieldset  id="paso4">
                <h4>Paso 4: 2da. Documentación</h4>
                <div class="row" style="padding-left:15px;">
                <span>Te estás suscribiendo al servicio de : </span><label class="form-label col-3 bold med_servicio_suscrito">XXXX</label>
                </div>
                <div class="form-group border">
                  <span>Como parte del proceso de suscripción al servicio, necesitamos la siguiente información:</span>
                  <br>
                  <div class="form-group">
                    <br>                    
                    <div class="row">
                      <div class="col-lg-3">
                        <label for="">Copia del Resolución de SUNEDU de médico cirujano (extranjero) </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file_2da_0" accept=".pdf, .doc, .docx" <?php echo ($file_2da_0!=''?'disabled':''); ?>>
                            <label class="custom-file-label" for="file_2da_0"><?php echo $file_2da_0; ?></label>
                        </div>
                      </div>
                      <div class="col-1">
                        <br>
                        <?php if(!($activo == 4)){ ?>
                        <a href="#" onclick="DeleteFile('2da_0')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        <?php } ?>
                      </div>
                      <div class="col-lg-3">
                        <label for="">Copia del Resolución de SUNEDU de especialidad (extranjero) </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file_2da_1" accept=".pdf, .doc, .docx" <?php echo ($file_2da_1!=''?'disabled':''); ?>>
                            <label class="custom-file-label" for="file_2da_1"><?php echo $file_2da_1; ?></label>
                        </div>
                      </div>
                      <div class="col-1">
                        <br>
                        <?php if(!($activo == 4)){ ?>
                        <a href="#" onclick="DeleteFile('2da_1')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        <?php } ?>
                      </div>
                      <div class="col-lg-4">
                        <label for="">Nro de cuenta o código interbancario </label>
                        <input id="codigo_interbancario" type="text" class="form-control" <?php echo ($codigo_interbancario!=''?'disabled':''); ?> value="<?php echo $codigo_interbancario; ?>">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3">
                        <label for="">Copia DNI, CE, PTP, CPP o Pasaporte (ambas caras): </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file_2da_2" accept=".pdf, .doc, .docx" <?php echo ($file_2da_2!=''?'disabled':''); ?>>
                            <label class="custom-file-label" for="file_2da_2"><?php echo $file_2da_2; ?></label>
                        </div>
                      </div>
                      <div class="col-1">
                        <br>
                        <?php if(!($activo == 4)){ ?>
                        <a href="#" onclick="DeleteFile('2da_2')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        <?php } ?>
                      </div>

                      <div class="col-lg-3">
                        <label for="">Firma escaneada: </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file_2da_3" accept=".pdf, .doc, .docx" <?php echo ($file_2da_3!=''?'disabled':''); ?>>
                            <label class="custom-file-label" for="file_2da_3"><?php echo $file_2da_3; ?></label>
                        </div>
                      </div>
                      <div class="col-1">
                        <br>
                        <?php if(!($activo == 4)){ ?>
                        <a href="#" onclick="DeleteFile('2da_3')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        <?php } ?>
                      </div>
                      <div class="col-lg-4">
                        <label for="">Nombre del banco </label>
                        <select name="nombre_banco" id="nombre_banco" class="form-control" <?php echo ($nombre_banco!=''?'disabled':''); ?> >
                          <option value="" >Seleccione una opción</option>
                          <option value="bcp" <?php echo ($nombre_banco == 'bcp'? 'selected':''); ?> >BANCO DE CRÉDITO DEL PERÚ</option>
                          <option value="interbank" <?php echo ($nombre_banco == 'interbank'? 'selected':''); ?> >INTERBANK</option>
                          <option value="scotia" <?php echo ($nombre_banco == 'scotia'? 'selected':''); ?> >SCOTIABANK</option>
                          <option value="bbva" <?php echo ($nombre_banco == 'bbva'? 'selected':''); ?>>BBVA</option>
                          <option value="bif" <?php echo ($nombre_banco == 'bif'? 'selected':''); ?>>BIF</option>
                          <option value="falabella" <?php echo ($nombre_banco == 'falabella'? 'selected':''); ?>>FALABELLA</option>
                          <option value="ripley" <?php echo ($nombre_banco == 'ripley'? 'selected':''); ?>>RIPLEY</option>
                          <option value="gnb" <?php echo ($nombre_banco == 'gnb'? 'selected':''); ?>>GNB</option>
                          <option value="aqrequipa" <?php echo ($nombre_banco == 'aqrequipa'? 'selected':''); ?>>CAJA AREQUIPA</option>
                        </select>
                      </div>
                    </div>                                  
                    <div class="row">
                      <div class="col-lg-3">
                        <label for="">Constancia de vacunación: </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file_2da_4" accept=".pdf, .doc, .docx" <?php echo ($file_2da_4!=''?'disabled':''); ?>>
                            <label class="custom-file-label" for="file_2da_4"><?php echo $file_2da_4; ?></label>
                        </div>
                      </div>
                      <div class="col-1">
                        <br>
                        <?php if(!($activo == 4)){ ?>
                        <a href="#" onclick="DeleteFile('2da_4')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        <?php } ?>
                      </div>                                  
                      <div class="col-lg-3">
                        <label for="">Foto tamaño carnet (*): </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file_2da_5" accept=".pdf, .doc, .docx" <?php echo ($file_2da_5!=''?'disabled':''); ?>>
                            <label class="custom-file-label" for="file_2da_5"><?php echo $file_2da_5; ?></label>
                        </div>
                      </div>
                      <div class="col-1">
                        <br>
                        <?php if(!($activo == 4)){ ?>
                        <a href="#" onclick="DeleteFile('2da_5')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        <?php } ?>
                      </div>
                      <div class="col-lg-4">
                        <label for="">Tipo de cuenta </label>
                        <select name="tipo_cuenta" id="tipo_cuenta" class="form-control" <?php echo ($tipo_cuenta!=''?'disabled':''); ?> >
                          <option value="" >Seleccione una opción</option>
                          <option value="ahorro" <?php echo ($tipo_cuenta == 'ahorro'? 'selected':''); ?> >AHORRO</option>
                          <option value="ctacte" <?php echo ($tipo_cuenta == 'ctacte'? 'selected':''); ?> >CUENTA CORRIENTE</option>
                        </select>
                      </div>
                    </div>                                 
                    <div class="row">
                      <div class="col-lg-3">
                        <label for="">Constancia de Habilidad profesional vigente: </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file_2da_6" accept=".pdf, .doc, .docx" <?php echo ($file_2da_6!=''?'disabled':''); ?>>
                            <label class="custom-file-label" for="file_2da_6"><?php echo $file_2da_6; ?></label>
                        </div>
                      </div>
                      <div class="col-1">
                        <br>
                        <?php if(!($activo == 4)){ ?>
                        <a href="#" onclick="DeleteFile('2da_6')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        <?php } ?>
                      </div>
                      <div class="col-lg-3">
                        <label for="">Fecha de vigencia: </label>
                        <input type="date" id="fecha_vigencia" name="fecha_vigencia" class="form-control col-lg-6" <?php echo ($fecha_vigencia!=''?'disabled':''); ?> value="<?php echo $fecha_vigencia; ?>">
                      </div>
                      <div class="col-lg-3 offset-1">
                        <label for="">Constancia de apertura de cuenta de banco (extranjeros): </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file_2da_7" accept=".pdf, .doc, .docx" <?php echo ($file_2da_7!=''?'disabled':''); ?>>
                            <label class="custom-file-label" for="file_2da_7"><?php echo $file_2da_7; ?></label>
                        </div>
                      </div>
                      <div class="col-1">
                        <br>
                        <?php if(!($activo == 4)){ ?>
                        <a href="#" onclick="DeleteFile('2da_7')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="row">
                      <div class="offset-8 col-lg-2">
                        <label for="">Nro de RUC: </label>
                        <!-- <input type="text" id="nro_ruc" name="nro_ruc" value="<?php //echo $ruc; ?>" class="form-control"> -->
                        <input type="number" min="0" max="999999999" onKeyPress="if(this.value.length==12) return false;" class="form-control col-lg-7" <?php echo ($ruc!=''?'disabled':''); ?> name="nro_ruc" id="nro_ruc" value="<?php echo $ruc; ?>">
                      </div>
                    </div>
                    <div class="row">
                      <div class="offset-8 col-lg-3">
                        <div class="row">
                          <label for="">Emitir factura: </label>
                          <input type="checkbox" id="factura" name="factura" <?php echo ($emite_factura=='1'?'checked':''); ?> class="form-control offset-1" <?php echo ($emite_factura!=''?'disabled':''); ?>  >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="offset-8 col-lg-2">
                        <label for="">Nro cuenta Detracción: </label>
                        <!-- <input type="text" id="detraccion" name="detraccion" value="<?php //echo $detraccion; ?>" class="form-control"> -->
                        <input type="number" min="0" max="99999999999" onKeyPress="if(this.value.length==11) return false;" class="form-control col-lg-7" <?php echo ($detraccion!=''?'disabled':''); ?> name="detraccion" id="detraccion" value="<?php echo $detraccion; ?>">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-12">
                        <label for="">Comentarios: </label>
                        <textarea class="form-control" name="med_comentario_paso4_2da" id="med_comentario_paso4_2da" cols="30" rows="2" <?php echo ($documento_comentario!=''?'disabled':''); ?> ><?php echo $documento_comentario; ?></textarea>
                      </div>
                    </div>

                    <br>
                    <div class="row" style="padding-left:15px;">
                      <span><b>Si ha realizado una carga parcial de documento, cuenta con 72 horas para terminar la regularización, caso contrario, su proceso de solicitud de inscripción será desestimado</b></span>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <!-- <input type="button" name="previous" class="previous-form btn btn-warning" value="Regresar" /> -->
                  <!-- <input id="btnPaso4Grabar" type="button" class="btn btn-primary" value="Grabar" /> -->
                  <?php echo $btnPaso4Continuar; ?>
                </div>
              </fieldset>

              <!-- Paso 5 -->
              <fieldset id="paso5">
                <div id="paso5_solicitudcompletada" class="col-12" style="display:block">
                  <br><br>
                  <h2 class="text-center">Solicitud completada</h2>
                  <br><br>
                  <div class="form-group text-center">  
                    <h3>Esté pendiente de su bandeja de correo o ingresa regularmente a este sitio </h3>
                  </div>
                  <div class="form-group text-center">  
                    <h3>con tus credenciales para conocer el estado de su Solicitud</h3>
                  </div>                
                  <br><br>
                  <div class="text-center logout">
                    <input id="btnPaso5" type="button" name="next" class="btn btn-success" data-toggle="modal" data-target="#logout" value="Salir">
                  </div>
                  <br><br>
                </div>
                <div id="paso5_solicitudaprobada" class="col-12" style="display:none">
                  <br><br>
                  <h2 class="text-center">Solicitud aprobada</h2>
                  <br><br>
                  <div class="form-group text-center">  
                    <h3>Su solicitud ha sido aprobada. Pronto se le contactará para continuar el proceso</h3>
                  </div>
                  <div class="form-group text-center">  
                    <h3>Esté atento su correo o teléfonos de contacto</h3>
                  </div>                
                  <br><br>
                  <div class="text-center logout">
                    <input id="btnPaso5" type="button" name="next" class="btn btn-success" data-toggle="modal" data-target="#logout" value="Salir">
                  </div>
                  <br><br>
                </div>
                <div id="paso5_solicitudrechazada" class="col-12" style="display:none">
                <br><br>
                  <h2 class="text-center">Solicitud rechazada</h2>
                  <br><br>
                  <div class="form-group text-center">  
                    <h3>Hemos decidido rechazar su solicitud</h3>
                  </div>
                  <div class="form-group text-center">  
                    <h3>Gracias por su tiempo. Esperamos contar con ud. en una próxima convocatoria</h3>
                  </div>
                  <br><br>
                  <div class="text-center logout">
                    <input id="btnPaso5" type="button" name="next" class="btn btn-success" data-toggle="modal" data-target="#logout" value="Salir">
                  </div>
                  <br><br>
                </div>
                <div id="paso6_solicitudvencida" class="col-12" style="display:none">
                  <br><br>
                  <h2 class="text-center">Solicitud vencida</h2>
                  <br><br>
                  <div class="form-group text-center">  
                    <h3>Su solicitud ha vencido. Se le contactará a cualquiera de sus medios de contacto</h3>
                  </div>
                  <br><br>
                  <div class="text-center logout">
                    <input id="btnPaso5" type="button" name="next" class="btn btn-success" data-toggle="modal" data-target="#logout" value="Salir">
                  </div>
                  <br><br>
                </div>

              </fieldset>
              
            </form>
        </div>
      </div>
    </div>    

<?php pie() ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<style type="text/css">
  #register_form fieldset:not(:first-of-type) {
    display: none;
  }
  input[type="radio"]{
    width: 25px!important;
    height: 20px!important;
  }
  input[type="checkbox"]{
    width: 25px!important;
    height: 20px!important;
  }
</style>
<script>
  // let servicio_values = [ { "dom": "Médicos a Domicilio"}, { "dr": "Dr Online"}, { "cro": "Crónicos"}, { "amb": "Ambulancias"}, { "call": "Call Médico"},
  // { "tele": "Telemedicina"}, { "covid": "Seguimiento COVID"}, { "part": "Tópicos Particulares"}, { "paca": "Tópico Pacasmayo"}  ]
  let servicio_values = [ { "cod": "Médicos a Domicilio"}, { "cod": "Dr Online"}, { "cod": "Crónicos"}, { "cod": "Ambulancias"}, { "cod": "Call Médico"},
  { "cod": "Telemedicina"}, { "cod": "Seguimiento COVID"}, { "cod": "Tópicos Particulares"}, { "cod": "Tópico Pacasmayo"}, { "cod": "Midoc"}, { "cod": "T-Sanna"}  ]
  let especialidad_obliga = false
  let especialidad_rne_obliga = false
    $(document).ready(function(){
      var form_count = 1, previous_form, next_form, total_forms;
      total_forms = $("fieldset").length;  
      $(".next-form").click(function(){
        previous_form = $(this).parent().parent();
        next_form = $(this).parent().parent().next();
        if(validate_step($(this))){
          send_data_step($(this))
          next_form.show();
          previous_form.hide();
          setProgressBarValue(++form_count);
        }
      });  
      $(".previous-form").click(function(){
        previous_form = $(this).parent().parent();
        next_form = $(this).parent().parent().prev();
        next_form.show();
        previous_form.hide();
        setProgressBarValue(--form_count);
      });
      setProgressBarValue(form_count);
      
      function setProgressBarValue(value){
        var percent = parseFloat(100 / total_forms) * value;
        percent = percent.toFixed();
        $(".progress-bar")
          .css("width",percent+"%")
          .html(percent+"%");   
      } 

      if( '<?php echo $activo ?>' == '2' || '<?php echo $activo ?>' == '1' ){
        $('#paso2').show();
        $('#paso0').hide();
        $('#paso1').hide();
        setProgressBarValue(3);
      }
      if( '<?php echo $activo ?>' == '20' || '<?php echo $activo ?>' == '3' ){
        $('#paso3').show();
        $('#paso0').hide();
        $('#paso1').hide();
        $('#paso2').hide();
        setProgressBarValue(4);
      }
      if( '<?php echo $activo ?>' == '22' || '<?php echo $activo ?>' == '4' ){
        $('#paso4').show();
        $('#paso0').hide();
        $('#paso1').hide();
        $('#paso2').hide();
        $('#paso3').hide();
        setProgressBarValue(5);
      }
      if( '<?php echo $activo ?>' == '21' || '<?php echo $activo ?>' == '23' || '<?php echo $activo ?>' == '24' || '<?php echo $activo ?>' == '25' || '<?php echo $activo ?>' == '26' || '<?php echo $activo ?>' == '5' ){
        $('#paso5').show();
        $('#paso0').hide();
        $('#paso1').hide();
        $('#paso2').hide();
        $('#paso3').hide();
        $('#paso4').hide();
        setProgressBarValue(6);

        if( '<?php echo $activo ?>' == '24' ){ //Aprobada
          $('#paso5_solicitudcompletada').hide();
          $('#paso5_solicitudaprobada').show();
          $('#paso5_solicitudrechazada').hide();
          $('#paso6_solicitudvencida').hide();
        }
        if( '<?php echo $activo ?>' == '21' || '<?php echo $activo ?>' == '23' || '<?php echo $activo ?>' == '25' ){ //Rechazada
          $('#paso5_solicitudcompletada').hide();
          $('#paso5_solicitudaprobada').hide();
          $('#paso5_solicitudrechazada').show();
          $('#paso6_solicitudvencida').hide();
        }
        if( '<?php echo $activo ?>' == '26' ){ //Vencida
          $('#paso5_solicitudcompletada').hide();
          $('#paso5_solicitudaprobada').hide();
          $('#paso5_solicitudrechazada').hide();
          $('#paso6_solicitudvencida').show();
        }
      }

      // Handle form submit and validation
      $( "#register_form" ).submit(function(event) {    
        var error_message = '';
        if(!$("#email").val()) {
          error_message+="Please Fill Email Address";
        }
        if(!$("#password").val()) {
          error_message+="<br>Please Fill Password";
        }
        if(!$("#mobile").val()) {
          error_message+="<br>Please Fill Mobile Number";
        }
        // Display error if any else submit form
        if(error_message) {
          $('.alert-success').removeClass('hide').html(error_message);
          return false;
        } else {
          return true;	
        }
      }); 
      
      $('#med_fechanac').on('change', function (data) {
          $('#med_anos').val( fnCalculaEdad($(this).val()) );
      });

      configurarUbigeo();

      $("#btnPaso2Grabar").click(function(){
        if(validate_step($(this))){
          send_data_step($(this))
        }
      });
      $("#btnPaso4Grabar").click(function(){
        if(validate_step($(this))){
          send_data_step($(this))
        }
      });      
      $("#btnPaso3Grabar").click(function(){
        if(validate_step($(this))){
          send_data_step($(this))
        }
      });

      $(".custom-file-input").change(function(data){
        $($(this).parent().children()[1]).text($(this).prop('files')[0].name)        
      })

      $('#med_anos').val( fnCalculaEdad($('#med_fechanac').val()) );

      $('.med_servicio_suscrito').text($('#med_<?php echo $servicio; ?>').next().text())

      //Eventos para especialidad
      $('input[type=radio][name=med_esp_estado]').on('change', function(data){
        let controlid = $(this).attr('id')
        especialidad_obliga = false
        especialidad_rne_obliga = false
        if(controlid == 'med_esp_estado_si'){
          // $('#med_especialidad').prop('disabled', '')
          // $('#med_rne').prop('disabled', '')
          especialidad_obliga = true
          especialidad_rne_obliga = true
        }else if(controlid == 'med_esp_estado_no'){
          // $('#med_especialidad').prop('disabled', 'disabled')
          // $('#med_rne').prop('disabled', 'disabled')
          $('#med_especialidad').val('')
          // $('#med_rne').val('')
          especialidad_obliga = false
          especialidad_rne_obliga = false
        }else{
          $('#med_especialidad').val('')
          especialidad_obliga = true
          especialidad_rne_obliga = false
        }
      })

    });

    function validate_step(div_step){
      let retorno = true
      let errores = [];
      $('.alert-danger').html('')
      $('.alert-danger').dequeue()
      if(div_step[0].id == "btnPaso1"){
        if(fnIsNewerThanToday( document.getElementById('med_fechanac') )){ errores.push('Fecha de Nac. no puede ser mayor a la fecha actual'); }
        // if(!$('#med_terminos').prop('checked')){ errores.push('Debe aceptar los términos y condiciones'); }
        // if(!$('#med_consentimiento').prop('checked')){ errores.push('Debe aceptar el tratamiento de datos personales'); }
        if($('#med_colegiatura').val() == ''){ errores.push('Debe ingresar su Nro. de colegiatura'); }
        //if($('#med_especialidad').val() == 'otra' && $('#med_especialidad_otros').val() == ''){ errores.push('Debe ingresar otra Especialidad'); }
        if(!$('#med_factor_si').prop('checked') && !$('#med_factor_no').prop('checked') ){ errores.push('Debe seleccionar un Factor de riesgo'); }
        if($('#med_ubigeoid').val() == ''){ errores.push('Debe seleccionar un Departamento/Provincia/Distrito'); }
        if($('input[type=radio][name=med_servicio]:checked').length == 0) { errores.push('Debe seleccionar un Servicio'); }
        if($('#med_tlf1').val() == ''){ errores.push('Debe ingresar el Teléfono 1'); }
        if($('#med_tlf2').val() == ''){ errores.push('Debe ingresar el Teléfono 2'); }
        if($('#med_colegiatura').val() == ''){ errores.push('Debe ingresar el Nro de colegiatura'); }
        // if($('#med_rne').val() == ''){ errores.push('Debe ingresar el Nro RNE'); }
        if($('#med_profesion').val() == ''){ errores.push('Debe ingresar la Profesión'); }
        if($('#med_fechanac').val() == ''){ errores.push('Debe ingresar la Fecha de Nacimiento'); }
        if($('#med_nacionalidad').val() == ''){ errores.push('Debe ingresar la Nacionalidad'); }
        if($('#med_direccion').val() == ''){ errores.push('Debe ingresar la Dirección'); }
        if($('#med_tipodoc').val() == ''){ errores.push('Debe seleccionar el Tipo de Documento'); }
        if($('#med_documento').val() == ''){ errores.push('Debe ingresar el Nro. documento'); }

        if(especialidad_obliga && $('#med_especialidad').val() == ''){ errores.push('El campo Especialidad es obligatorio'); }
        if(especialidad_rne_obliga && $('#med_rne').val() == ''){ errores.push('El campo Nro.RNE es obligatorio'); }
      }
      else if(div_step[0].id == "btnPaso2Grabar"){
        
      }
      else if(div_step[0].id == "btnPaso2"){
        if( '<?php echo is_array($solicitud_documentos)? $count_files_documentos:0; ?>' != '6'){
          errores.push('Debe completar la carga de sus documentos');
        }
      }

      if( errores.length > 0 ){ 
        errores.forEach(item => $('.alert-danger').append('<li>'+item+'</li>') );
          $('.alert-danger').show().delay(3000).queue(function() {
              $('.alert-danger').css('display', 'none');
          });
          retorno = false;
      }

      return retorno
    }
    function send_data_step(div_step){
      if(div_step[0].id == "btnPaso1"){
        send_data_paso1();
      }
      if(div_step[0].id == "btnPaso2Grabar"){
        send_data_paso2()
      }
      if(div_step[0].id == "btnPaso3Grabar"){
        send_data_paso3()
      }
      if(div_step[0].id == "btnPaso4Grabar"){
        send_data_paso4_2da()
      }
    }

    function send_data_paso1(){
      let send_retorno = false;
      let servicio_seleccionado = $('input[type=radio][name=med_servicio]:checked').attr('data-value');
      let datasend = {
        "servicio" : servicio_seleccionado,
        "telefono1" : $('#med_tlf1').val(),
        "telefono2" : $('#med_tlf2').val(),
        "nro_colegiatura" : $('#med_colegiatura').val(),
        "idioma" : $('#med_idiomas').val(),
        "idioma_otro" : $('#med_idiomas_otros').val(),
        "especialidad" : $('#med_especialidad').val(),
        "especialidad_otro" : $('#med_especialidad_otros').val(),
        "nro_rne" : $('#med_rne').val(),
        "fecha_nacimiento" : $('#med_fechanac').val(),
        "direccion" : $('#med_direccion').val(),
        "nacionalidad" : $('#med_nacionalidad').val(),
        "referencia" : $('#med_referencia').val(),
        "profesion" : $('#med_profesion').val(),
        "factor_riesgo": $('#med_factor_si').prop('checked'),
        "factor_otro": $('#med_factor_otro').val(),
        "ubigeo": $('#med_ubigeoid').val(),
        "especialidad_estado": $('input[type=radio][name=med_esp_estado]:checked').attr('data-value')
      }
      let urldata = '<?php echo base_url() ?>Medicos/CrearSolicitud';
      $.ajax({
          url: urldata,
          async: false,
          data: { 'datasend': datasend },
          type: 'POST',
          beforeSend: function(){
          },
          success: function(response){
              var retorno = JSON.parse(response);
              $('.alert-success').html('')
              $('.alert-success').dequeue()
              if(retorno.success){
                  //ok

                  Swal.fire({
                      icon: 'success',
                      title: 'Solicitud Nro. '+ retorno.data + ' generada correctamente',
                      showConfirmButton: false,
                      timer: 5000
                  }).then(() => {
                    window.location.reload()
                  })

                  $('#med_nro_solicitud').val('Nro Solicitud: '+retorno.data)
                  
                  $('.med_servicio_suscrito').text($('input[type=radio][name=med_servicio]:checked')[0].nextSibling.nodeValue.replace('\n', ''))
                  $('.alert-success').show().delay(3000).queue(function() {
                    $('.alert-success').css('display', 'none');
                  });
              }
              else{
                if( Array.isArray(retorno.message) ){ 
                    if( retorno.message.length > 0 ){
                      retorno.message.forEach(item => $('.alert-danger').append('<li>'+item+'</li>') );
                      $('.alert-danger').show().delay(3000).queue(function() {
                        $('.alert-danger').css('display', 'none');
                      });
                      return;
                    }
                  }
                  else{
                    $('.alert-danger').text(retorno.message);
                  }
                  $('.alert-danger').show().delay(3000).queue(function() {
                    $('.alert-danger').css('display', 'none');
                  });
              }
              },
              complete: function(){
                  // $('#registro_ok').css('display', 'none');
                  // $('#registro_error').css('display', 'none');
              },
              error: function(err){
                  
              }
      });
    }
    function send_data_paso2(){
      var form_data = new FormData();
      form_data.append("file_cv", document.getElementById('file_cv').files[0]);
      form_data.append("file_titpro", document.getElementById('file_titpro').files[0]);
      form_data.append("file_colegio", document.getElementById('file_colegio').files[0]);
      form_data.append("file_rne", document.getElementById('file_rne').files[0]);
      form_data.append("file_declaracion", document.getElementById('file_declaracion').files[0]);
      form_data.append("file_titesp", document.getElementById('file_titesp').files[0]);
      form_data.append("comentario", $('#med_comentario').val());
      
      let send_retorno = false;
      let urldata = '<?php echo base_url() ?>Medicos/SolicitudDocumento';
      
      $.ajax({
        url: urldata,
        async: false,
        data: form_data,
        type: 'POST',
        dataType: 'json',
        contentType: false,
        processData: false,
        beforeSend: function(){
        },
        success: function(response){
            var retorno = response;
            $('.alert-success').html('')
            $('.alert-success').dequeue()
            if(retorno.success){
                //ok
                $('.alert-success').append('Documentos cargados correctamente')
                let contadordocumentos = 0;
                retorno.data.forEach( function(valor, indice, array) {
                  if(valor.tipo == 'cv'){ $('#file_cv').prop('disabled', 'disabled'); contadordocumentos++;}
                  if(valor.tipo == 'titpro'){ $('#file_titpro').prop('disabled', 'disabled'); contadordocumentos++; }
                  if(valor.tipo == 'colegio'){ $('#file_colegio').prop('disabled', 'disabled'); contadordocumentos++; }
                  if(valor.tipo == 'rne'){ $('#file_rne').prop('disabled', 'disabled'); contadordocumentos++; }
                  if(valor.tipo == 'declaracion'){ $('#file_declaracion').prop('disabled', 'disabled'); contadordocumentos++; }
                  if(valor.tipo == 'titesp'){ $('#file_titesp').prop('disabled', 'disabled'); contadordocumentos++; }
                });                
                                
                $('.alert-success').show().delay(3000).queue(function() {
                  $('.alert-success').css('display', 'none');
                });

                if( contadordocumentos < 6 ){
                  Swal.fire({
                      icon: 'success',
                      title: 'Hemos recepcionado el '+ (contadordocumentos*100/6).toFixed(2)+ '% de la información solicitada \n Cuentas con un plazo de 72 horas para culminar la carga',
                      showConfirmButton: false,
                      timer: 5000
                  })
                  
                }else{
                  Swal.fire({
                      icon: 'success',
                      title: 'Hemos recepcionado el 100% de la información solicitada \n El equipo procederá a realizar la evaluación correspondiente \n y se estará informando via correo electrónico.',
                      showConfirmButton: false,
                      timer: 5000
                  }).then(() => {
                    window.location.reload()
                  })
                }
            }
            else{
                if( Array.isArray(retorno.message) ){ 
                  if(retorno.message.length > 0){
                    retorno.message.forEach(item => $('.alert-danger').append('<li>'+item+'</li>') );
                    $('.alert-danger').show().delay(3000).queue(function() {
                      $('.alert-danger').css('display', 'none');
                    });
                    return;
                  }
                }
                else{
                  $('.alert-danger').text(retorno.message);
                }
                $('.alert-danger').show().delay(3000).queue(function() {
                  $('.alert-danger').css('display', 'none');
                });
            }
        },
        complete: function(){
            // $('#registro_ok').css('display', 'none');
            // $('#registro_error').css('display', 'none');
        },
        error: function(err){
          debugger;
        }
      });
    }    
    function send_data_paso3(){
      var form_data = new FormData();
      form_data.append("file_psico_0", document.getElementById('file_psico_0').files[0]);
      form_data.append("file_psico_1", document.getElementById('file_psico_1').files[0]);
      form_data.append("file_psico_2", document.getElementById('file_psico_2').files[0]);
      // form_data.append("file_psico_3", document.getElementById('file_psico_3').files[0]);
      
      let send_retorno = false;
      let urldata = '<?php echo base_url() ?>Medicos/SolicitudPsicotecnico';
      
      $.ajax({
        url: urldata,
        async: false,
        data: form_data,
        type: 'POST',
        dataType: 'json',
        contentType: false,
        processData: false,
        beforeSend: function(){
        },
        success: function(response){
          debugger
            var retorno = response;
            $('.alert-success').html('')
            $('.alert-success').dequeue()
            if(retorno.success){
                //ok
                $('.alert-success').append('Documentos cargados correctamente')
                let contadordocumentos = 0;
                retorno.data.forEach( function(valor, indice, array) {
                  if(valor.tipo == 'psico_0'){ $('#file_'+valor.tipo).prop('disabled', 'disabled'); contadordocumentos++;}
                  if(valor.tipo == 'psico_1'){ $('#file_'+valor.tipo).prop('disabled', 'disabled'); contadordocumentos++;}
                  if(valor.tipo == 'psico_2'){ $('#file_'+valor.tipo).prop('disabled', 'disabled'); contadordocumentos++;}
                  // if(valor.tipo == 'psico_3'){ $('#file_'+valor.tipo).prop('disabled', 'disabled'); contadordocumentos++;}
                });                
                                
                $('.alert-success').show().delay(3000).queue(function() {
                  $('.alert-success').css('display', 'none');
                });

                if( contadordocumentos != 3 ){
                  Swal.fire({
                      icon: 'success',
                      title: 'Hemos recepcionado el '+ (contadordocumentos*100/4).toFixed(2)+ '% de la información solicitada \n Cuentas con un plazo de 72 horas para culminar la carga',
                      showConfirmButton: false,
                      timer: 5000
                  })
                }else{
                  Swal.fire({
                      icon: 'success',
                      title: 'Hemos recepcionado el 100% de la información solicitada \n El equipo procederá a realizar la evaluación correspondiente \n y se estará informando via correo electrónico.',
                      showConfirmButton: false,
                      timer: 5000
                  }).then(() => {
                    window.location.reload()
                  })
                }
            }
            else{
                if( Array.isArray(retorno.message) ){ 
                  if( retorno.message.length > 0 ){
                    retorno.message.forEach(item => $('.alert-danger').append('<li>'+item+'</li>') );
                    $('.alert-danger').show().delay(3000).queue(function() {
                      $('.alert-danger').css('display', 'none');
                    });
                    return;
                  }
                }
                else{
                  $('.alert-danger').text(retorno.message);
                }
                $('.alert-danger').show().delay(3000).queue(function() {
                  $('.alert-danger').css('display', 'none');
                });
            }
        },
        complete: function(){
            // $('#registro_ok').css('display', 'none');
            // $('#registro_error').css('display', 'none');
        },
        error: function(err){
          debugger;
        }
      });
    }
    function send_data_paso4_2da(){
      var form_data = new FormData();
      form_data.append("file_2da_0", document.getElementById('file_2da_0').files[0]);
      form_data.append("file_2da_1", document.getElementById('file_2da_1').files[0]);
      form_data.append("file_2da_2", document.getElementById('file_2da_2').files[0]);
      form_data.append("file_2da_3", document.getElementById('file_2da_3').files[0]);
      form_data.append("file_2da_4", document.getElementById('file_2da_4').files[0]);
      form_data.append("file_2da_5", document.getElementById('file_2da_5').files[0]);
      form_data.append("file_2da_6", document.getElementById('file_2da_6').files[0]);
      form_data.append("file_2da_7", document.getElementById('file_2da_7').files[0]);

      form_data.append("comentario", $('#med_comentario_paso4_2da').val());

      form_data.append("fecha_vigencia", $('#fecha_vigencia').val());
      form_data.append("codigo_interbancario", $('#codigo_interbancario').val());
      form_data.append("banco", $('#nombre_banco').val());
      form_data.append("tipo_cuenta", $('#tipo_cuenta').val());
      form_data.append("ruc", $('#nro_ruc').val());
      form_data.append("detraccion", $('#detraccion').val());
      form_data.append("emite_factura", ($('#factura').prop('checked')?1:0) );
      
      let send_retorno = false;
      let urldata = '<?php echo base_url() ?>Medicos/SolicitudDocumento2da';
      
      $.ajax({
        url: urldata,
        async: false,
        data: form_data,
        type: 'POST',
        dataType: 'json',
        contentType: false,
        processData: false,
        beforeSend: function(){
        },
        success: function(response){
            var retorno = response;
            $('.alert-success').html('')
            $('.alert-success').dequeue()
            if(retorno.success){
                //ok
                $('.alert-success').append('Documentos cargados correctamente')
                let contadordocumentos = 0;
                if(retorno.data) {
                  retorno.data.forEach( function(valor, indice, array) {
                    if(valor.tipo == '2da_0'){ $('#file_'+valor.tipo).prop('disabled', 'disabled'); contadordocumentos++;}
                    if(valor.tipo == '2da_1'){ $('#file_'+valor.tipo).prop('disabled', 'disabled'); contadordocumentos++;}
                    if(valor.tipo == '2da_2'){ $('#file_'+valor.tipo).prop('disabled', 'disabled'); contadordocumentos++;}
                    if(valor.tipo == '2da_3'){ $('#file_'+valor.tipo).prop('disabled', 'disabled'); contadordocumentos++;}
                    if(valor.tipo == '2da_4'){ $('#file_'+valor.tipo).prop('disabled', 'disabled'); contadordocumentos++;}
                    if(valor.tipo == '2da_5'){ $('#file_'+valor.tipo).prop('disabled', 'disabled'); contadordocumentos++;}
                    if(valor.tipo == '2da_6'){ $('#file_'+valor.tipo).prop('disabled', 'disabled'); contadordocumentos++;}
                    if(valor.tipo == '2da_7'){ $('#file_'+valor.tipo).prop('disabled', 'disabled'); contadordocumentos++;}
                  });
                }
                
                if($('#fecha_vigencia').val() != ''){ contadordocumentos++; }
                if($('#codigo_interbancario').val() != ''){ contadordocumentos++; }
                if($('#nombre_banco').val() != ''){ contadordocumentos++; }
                if($('#tipo_cuenta').val() != ''){ contadordocumentos++; }
                if($('#nro_ruc').val() != ''){ contadordocumentos++; }
                if($('#detraccion').val() != ''){ contadordocumentos++; }
                if($('#factura').prop('checked')){ contadordocumentos++; }

                $('.alert-success').show().delay(3000).queue(function() {
                  $('.alert-success').css('display', 'none');
                });
                debugger
                if( contadordocumentos != 15 ){
                  Swal.fire({
                      icon: 'success',
                      title: 'Hemos recepcionado el '+ (contadordocumentos*100/15).toFixed(2)+ '% de la información solicitada \n Cuentas con un plazo de 72 horas para culminar la carga',
                      showConfirmButton: false,
                      timer: 5000
                  })
                }else{
                  Swal.fire({
                      icon: 'success',
                      title: 'Hemos recepcionado el 100% de la información solicitada \n El equipo procederá a realizar la evaluación correspondiente \n y se estará informando via correo electrónico.',
                      showConfirmButton: false,
                      timer: 5000
                  }).then(() => {
                    window.location.reload()
                  })
                }

            }
            else{
                if( Array.isArray(retorno.message) ){ 
                  if( retorno.message.length > 0 ){
                    retorno.message.forEach(item => $('.alert-danger').append('<li>'+item+'</li>') );
                    $('.alert-danger').show().delay(3000).queue(function() {
                      $('.alert-danger').css('display', 'none');
                    });
                    return;
                  }
                }
                else{
                  $('.alert-danger').text(retorno.message);
                }
                $('.alert-danger').show().delay(3000).queue(function() {
                  $('.alert-danger').css('display', 'none');
                });
            }
        },
        complete: function(){
            // $('#registro_ok').css('display', 'none');
            // $('#registro_error').css('display', 'none');
        },
        error: function(err){
          debugger;
        }
      });
    }
    function DeleteFile(tipo){
      let send_retorno = false;
      let urldata = '<?php echo base_url() ?>Medicos/EliminarDocumento';
      
      $.ajax({
          url: urldata,
          async: false,
          data: { 'datasend': tipo },
          type: 'POST',
          beforeSend: function(){
          },
          success: function(response){
            var retorno = JSON.parse(response);
            $('.alert-success').html('')
            $('.alert-success').dequeue()
            if(retorno.success){
                //ok
                $('.alert-success').append('Documento eliminado correctamente')
                
                $('#file_cv').prop('disabled', '');  $($('#file_cv').parent().children()[1]).text(''); $('#file_cv').val('');
                $('#file_titpro').prop('disabled', ''); $($('#file_titpro').parent().children()[1]).text(''); $('#file_titpro').val('');
                $('#file_colegio').prop('disabled', ''); $($('#file_colegio').parent().children()[1]).text(''); $('#file_colegio').val('');
                $('#file_rne').prop('disabled', ''); $($('#file_rne').parent().children()[1]).text(''); $('#file_rne').val('');
                $('#file_declaracion').prop('disabled', ''); $($('#file_declaracion').parent().children()[1]).text(''); $('#file_declaracion').val('');
                $('#file_titesp').prop('disabled', ''); $($('#file_titesp').parent().children()[1]).text(''); $('#file_titesp').val('');

                $('#file_psico_0').prop('disabled', '');  $($('#file_psico_0').parent().children()[1]).text(''); $('#file_psico_0').val('');
                $('#file_psico_1').prop('disabled', '');  $($('#file_psico_1').parent().children()[1]).text(''); $('#file_psico_1').val('');
                $('#file_psico_2').prop('disabled', '');  $($('#file_psico_2').parent().children()[1]).text(''); $('#file_psico_2').val('');
                // $('#file_psico_3').prop('disabled', '');  $($('#file_psico_3').parent().children()[1]).text(''); $('#file_psico_3').val('');

                $('#file_2da_0').prop('disabled', '');  $($('#file_2da_0').parent().children()[1]).text(''); $('#file_2da_0').val('');
                $('#file_2da_1').prop('disabled', '');  $($('#file_2da_1').parent().children()[1]).text(''); $('#file_2da_1').val('');
                $('#file_2da_2').prop('disabled', '');  $($('#file_2da_2').parent().children()[1]).text(''); $('#file_2da_2').val('');
                $('#file_2da_3').prop('disabled', '');  $($('#file_2da_3').parent().children()[1]).text(''); $('#file_2da_3').val('');
                $('#file_2da_4').prop('disabled', '');  $($('#file_2da_4').parent().children()[1]).text(''); $('#file_2da_4').val('');
                $('#file_2da_5').prop('disabled', '');  $($('#file_2da_5').parent().children()[1]).text(''); $('#file_2da_5').val('');
                $('#file_2da_6').prop('disabled', '');  $($('#file_2da_6').parent().children()[1]).text(''); $('#file_2da_6').val('');

                retorno.data.forEach( function(valor, indice, array) {
                  if(valor.tipo == 'cv'){ $('#file_cv').prop('disabled', 'disabled'); $($('#file_cv').parent().children()[1]).text(valor.file_name)  }
                  if(valor.tipo == 'titpro'){ $('#file_titpro').prop('disabled', 'disabled'); $($('#file_titpro').parent().children()[1]).text(valor.file_name) }
                  if(valor.tipo == 'colegio'){ $('#file_colegio').prop('disabled', 'disabled'); $($('#file_colegio').parent().children()[1]).text(valor.file_name) }
                  if(valor.tipo == 'rne'){ $('#file_rne').prop('disabled', 'disabled'); $($('#file_rne').parent().children()[1]).text(valor.file_name) }
                  if(valor.tipo == 'declaracion'){ $('#file_declaracion').prop('disabled', 'disabled'); $($('#file_declaracion').parent().children()[1]).text(valor.file_name) }
                  if(valor.tipo == 'titesp'){ $('#file_titesp').prop('disabled', 'disabled');  }

                  if(valor.tipo == 'psico_0'){ $('#file_'+valor.tipo).prop('disabled', 'disabled'); $($('#file_'+valor.tipo).parent().children()[1]).text(valor.file_name) }
                  if(valor.tipo == 'psico_1'){ $('#file_'+valor.tipo).prop('disabled', 'disabled'); $($('#file_'+valor.tipo).parent().children()[1]).text(valor.file_name) }
                  if(valor.tipo == 'psico_2'){ $('#file_'+valor.tipo).prop('disabled', 'disabled'); $($('#file_'+valor.tipo).parent().children()[1]).text(valor.file_name) }
                  // if(valor.tipo == 'psico_3'){ $('#file_'+valor.tipo).prop('disabled', 'disabled'); $($('#file_'+valor.tipo).parent().children()[1]).text(valor.file_name) }

                  if(valor.tipo == '2da_0'){ $('#file_'+valor.tipo).prop('disabled', 'disabled'); $($('#file_'+valor.tipo).parent().children()[1]).text(valor.file_name) }
                  if(valor.tipo == '2da_1'){ $('#file_'+valor.tipo).prop('disabled', 'disabled'); $($('#file_'+valor.tipo).parent().children()[1]).text(valor.file_name) }
                  if(valor.tipo == '2da_2'){ $('#file_'+valor.tipo).prop('disabled', 'disabled'); $($('#file_'+valor.tipo).parent().children()[1]).text(valor.file_name) }
                  if(valor.tipo == '2da_3'){ $('#file_'+valor.tipo).prop('disabled', 'disabled'); $($('#file_'+valor.tipo).parent().children()[1]).text(valor.file_name) }
                  if(valor.tipo == '2da_4'){ $('#file_'+valor.tipo).prop('disabled', 'disabled'); $($('#file_'+valor.tipo).parent().children()[1]).text(valor.file_name) }
                  if(valor.tipo == '2da_5'){ $('#file_'+valor.tipo).prop('disabled', 'disabled'); $($('#file_'+valor.tipo).parent().children()[1]).text(valor.file_name) }
                  if(valor.tipo == '2da_6'){ $('#file_'+valor.tipo).prop('disabled', 'disabled'); $($('#file_'+valor.tipo).parent().children()[1]).text(valor.file_name) }
                });                
                                
                $('.alert-success').show().delay(3000).queue(function() {
                  $('.alert-success').css('display', 'none');
                  window.location.reload()                  
                });

                // if( retorno.data.length == 6 ){
                //   $('#btnPaso2Grabar').parent().append('<?php echo $btnPaso2Continuarlabel; ?>');
                // }
                // else{
                //   $('#btnPaso2').remove();
                // }
            }
            else{
                if( Array.isArray(retorno.message) ){ 
                  if( retorno.message.length > 0 ){
                    retorno.message.forEach(item => $('.alert-danger').append('<li>'+item+'</li>') );
                    $('.alert-danger').show().delay(3000).queue(function() {
                      $('.alert-danger').css('display', 'none');
                    });
                    return;
                  }
                }
                else{
                  $('.alert-danger').text(retorno.message);
                }
                $('.alert-danger').show().delay(3000).queue(function() {
                  $('.alert-danger').css('display', 'none');
                });
            }            
            
          },
          complete: function(){
              // $('#registro_ok').css('display', 'none');
              // $('#registro_error').css('display', 'none');
          },
          error: function(err){
              
          }
      });
      
    }
    function DownloadFile(tipo){
      urldata = '<?php echo base_url() ?>Medicos/searchFiles';
      window.location.href = urldata + '?datasend='+tipo
      return;
    }

    function configurarUbigeo(){
        let urldata = '<?php echo base_url() ?>Medicos/getUbigeos?search={term}';
        let ubigeos = [];
        const autoCompleteConfig = [{
            name: 'Seleccione un ubigeo',
            debounceMS: 250,
            minLength: 3,
            maxResults: -1,
            inputSource: document.getElementById('med_ubigeo'),
            targetID: document.getElementById('med_ubigeoid'),
            fetchURL: urldata,
            fetchMap: {
                id: "id",
                name: "text"
            }
        }];
        autocompleteBS(autoCompleteConfig);
        function resultHandlerBS(inputName, selectedData) {
            console.log(inputName);
            console.log(selectedData);
            document.getElementById('med_ubigeo').value=selectedData.id;
        }
    }
</script>