<?php 
  $medico_data = json_decode($_SESSION['medico_data']);
  $nombres = $medico_data->nombres;
  $apellidos = $medico_data->apellidos;
  $tipodoc = $medico_data->tipodoc;
  $nrodocumento = $medico_data->nrodocumento;
  $telefono1 = $medico_data->telefono1;
  $telefono2 = $medico_data->telefono2;
  $email = $medico_data->email;
  $fecha_nacimiento = $medico_data->fecha_nacimiento;
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

  $ubigeo_des = isset($medico_data->ubigeo_des)?$medico_data->ubigeo_des:'';
  $ubigeo_id = isset($medico_data->ubigeo_id)?$medico_data->ubigeo_id:'';

  $medico_solicitud = isset($_SESSION['medico_solicitud'])? json_decode($_SESSION['medico_solicitud']): null;
  // echo json_encode($medico_solicitud);
  $fecha_solicitud = isset($medico_solicitud->fecha_solicitud)?$medico_solicitud->fecha_solicitud:'';

  $tz  = new \DateTimeZone('America/Lima');
  $solicitud_fecha = (new DateTime($fecha_solicitud))->format('Y-m-d');
  $solicitud_hora = (new DateTime($fecha_solicitud))->format('H:i:s');

  $servicio = isset($medico_solicitud->servicio)?$medico_solicitud->servicio:'';
  $array_servicio = array('dom' => 'Médicos a domicilio', 'dr' => 'DR Online', 'cro' => 'Crónicos', 'covid' => 'Seguimiento COVID', 'amb' => 'Ambulancias', 'call' => 'Call Médico', 'tel' => 'Telemedicina','midoc' => 'Midoc','tsanna' => 'T-Sanna');
  $servicio_nombre = '';
  if($servicio!= ''){
   foreach ($array_servicio as $key => $value){
    if($servicio == $key){
     $servicio_nombre = $value;
    }
   }
  }

  $check_termino = isset($medico_solicitud->check_termino)?$medico_solicitud->servicio:'';
  $check_datos = isset($medico_solicitud->servicio)?$medico_solicitud->servicio:'';
  $nro_solicitud = isset($medico_solicitud->nro_solicitud)?$medico_solicitud->nro_solicitud:'';
  $estado = isset($medico_solicitud->activo)?$medico_solicitud->activo:'';
  // $array_estado = array('1' => 'Nueva', '2' => 'Aprobado 1ra Documentacion', '3' => 'Rechazado 1ra Documentacion', '4' => 'Aprobado 2da Documentacion', '5' => 'Rechazado 2da Documentacion', '6' => 'Aprobado 3ra Documentacion', '7' => 'Rechazado 3ra Documentacion');
  $array_estado = array('1' => 'Nueva', '2' => 'Completado 1ra Documentacion', '20' => 'Aprobado 1ra Documentacion', '21' => 'Rechazado 1ra Documentacion', '3' => 'Completado 2da Documentacion', '22' => 'Aprobado 2da Documentacion', '23' => 'Rechazado 2da Documentacion', '4' => 'Completado 3ra Documentacion', '24' => 'Aprobado 3ra Documentacion', '25' => 'Rechazado 3ra Documentacion', '26' => 'Vencido');
  $estado_nombre = '';
  
  if($estado!= ''){
   foreach ($array_estado as $key => $value){
    if($estado == $key){
     $estado_nombre = $value;
    }
   }
  }
  $mostrarbotones = true;
  if($estado==20 || $estado==21 || $estado==22 || $estado==23 || $estado==24 || $estado==25 || $estado==26){
    $mostrarbotones = false;
  }

  $documento_comentario = isset($medico_solicitud->documento_comentario)?$medico_solicitud->documento_comentario:'';

  // echo json_encode($medico_solicitud);

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
  $btnPaso2Continuarlabel = '<input id="btnPaso2" type="button" name="next" class="next-form btn btn-secondary" value="Continuar" />';
  $btnPaso2Continuar = $btnPaso2Continuarlabel;
  if(is_array($solicitud_documentos) && $count_files_documentos != 6){
    $btnPaso2Continuar = '';
  }
  $btnPaso3Continuarlabel = '<input id="btnPaso3" type="button" name="next" class="next-form btn btn-secondary" value="Continuar" />';
  $btnPaso3Continuar = $btnPaso3Continuarlabel;
  if(is_array($solicitud_documentos) && $count_files_documentos_psico != 4){
    $btnPaso3Continuar = '';
  }
  $btnPaso4Continuarlabel = '<input id="btnPaso4" type="button" name="next" class="next-form btn btn-secondary" value="Continuar" />';
  $btnPaso4Continuar = $btnPaso4Continuarlabel;
  if(is_array($solicitud_documentos) && $count_files_documentos_2da != 8){
    $btnPaso4Continuar = '';
  }
  
  $fecha_vigencia = isset($medico_solicitud->fecha_vigencia)?$medico_solicitud->fecha_vigencia:'';
  $codigo_interbancario = isset($medico_solicitud->codigo_interbancario)?$medico_solicitud->codigo_interbancario:'';
  $nombre_banco = isset($medico_solicitud->banco)?$medico_solicitud->banco:'';
  $tipo_cuenta = isset($medico_solicitud->tipo_cuenta)?$medico_solicitud->tipo_cuenta:'';
  $ruc = isset($medico_solicitud->ruc)?$medico_solicitud->ruc:'';
  $emite_factura = isset($medico_solicitud->emite_factura)?$medico_solicitud->emite_factura:'';
  $detraccion = isset($medico_solicitud->detraccion)?$medico_solicitud->detraccion:'';

  // echo json_encode($medico_solicitud);
  $check_1_1_gdh = isset($medico_solicitud->check_1_1_gdh)?$medico_solicitud->check_1_1_gdh:'';  
  $check_1_1_hhmm = isset($medico_solicitud->check_1_1_hhmm)?$medico_solicitud->check_1_1_hhmm:'';
  $check_1_2_gdh = isset($medico_solicitud->check_1_2_gdh)?$medico_solicitud->check_1_2_gdh:'';
  $check_1_2_hhmm = isset($medico_solicitud->check_1_2_hhmm)?$medico_solicitud->check_1_2_hhmm:'';
  $check_1_3_gdh = isset($medico_solicitud->check_1_3_gdh)?$medico_solicitud->check_1_3_gdh:'';
  $check_1_3_hhmm = isset($medico_solicitud->check_1_3_hhmm)?$medico_solicitud->check_1_3_hhmm:'';
  $check_1_4_gdh = isset($medico_solicitud->check_1_4_gdh)?$medico_solicitud->check_1_4_gdh:'';
  $check_1_4_hhmm = isset($medico_solicitud->check_1_4_hhmm)?$medico_solicitud->check_1_4_hhmm:'';
  $check_1_5_gdh = isset($medico_solicitud->check_1_5_gdh)?$medico_solicitud->check_1_5_gdh:'';
  $check_1_5_hhmm = isset($medico_solicitud->check_1_5_hhmm)?$medico_solicitud->check_1_5_hhmm:'';
  $check_1_6_gdh = isset($medico_solicitud->check_1_6_gdh)?$medico_solicitud->check_1_6_gdh:'';
  $check_1_6_hhmm = isset($medico_solicitud->check_1_6_hhmm)?$medico_solicitud->check_1_6_hhmm:'';
  $check_1_diligencia = isset($medico_solicitud->check_1_diligencia)?$medico_solicitud->check_1_diligencia:'';
  $check_1_jefatura = isset($medico_solicitud->check_1_jefatura)?$medico_solicitud->check_1_jefatura:'';

  $check_2_1_gdh = isset($medico_solicitud->check_2_1_gdh)?$medico_solicitud->check_2_1_gdh:'';
  $check_2_1_hhmm = isset($medico_solicitud->check_2_1_hhmm)?$medico_solicitud->check_2_1_hhmm:'';
  $check_2_2_gdh = isset($medico_solicitud->check_2_2_gdh)?$medico_solicitud->check_2_2_gdh:'';
  $check_2_2_hhmm = isset($medico_solicitud->check_2_2_hhmm)?$medico_solicitud->check_2_2_hhmm:'';
  $check_2_3_gdh = isset($medico_solicitud->check_2_3_gdh)?$medico_solicitud->check_2_3_gdh:'';
  $check_2_3_hhmm = isset($medico_solicitud->check_2_3_hhmm)?$medico_solicitud->check_2_3_hhmm:'';
  $check_2_4_gdh = isset($medico_solicitud->check_2_4_gdh)?$medico_solicitud->check_2_4_gdh:'';
  $check_2_4_hhmm = isset($medico_solicitud->check_2_4_hhmm)?$medico_solicitud->check_2_4_hhmm:'';

  $check_3_1_gdh = isset($medico_solicitud->check_3_1_gdh)?$medico_solicitud->check_3_1_gdh:'';
  $check_3_1_hhmm = isset($medico_solicitud->check_3_1_hhmm)?$medico_solicitud->check_3_1_hhmm:'';
  $check_3_2_gdh = isset($medico_solicitud->check_3_2_gdh)?$medico_solicitud->check_3_2_gdh:'';
  $check_3_2_hhmm = isset($medico_solicitud->check_3_2_hhmm)?$medico_solicitud->check_3_2_hhmm:'';
  $check_3_3_gdh = isset($medico_solicitud->check_3_3_gdh)?$medico_solicitud->check_3_3_gdh:'';
  $check_3_3_hhmm = isset($medico_solicitud->check_3_3_hhmm)?$medico_solicitud->check_3_3_hhmm:'';
  $check_3_4_gdh = isset($medico_solicitud->check_3_4_gdh)?$medico_solicitud->check_3_4_gdh:'';
  $check_3_4_hhmm = isset($medico_solicitud->check_3_4_hhmm)?$medico_solicitud->check_3_4_hhmm:'';
  $check_3_5_gdh = isset($medico_solicitud->check_3_5_gdh)?$medico_solicitud->check_3_5_gdh:'';
  $check_3_5_hhmm = isset($medico_solicitud->check_3_5_hhmm)?$medico_solicitud->check_3_5_hhmm:'';
  $check_3_6_gdh = isset($medico_solicitud->check_3_6_gdh)?$medico_solicitud->check_3_6_gdh:'';
  $check_3_6_hhmm = isset($medico_solicitud->check_3_6_hhmm)?$medico_solicitud->check_3_6_hhmm:'';
  $check_3_7_gdh = isset($medico_solicitud->check_3_7_gdh)?$medico_solicitud->check_3_7_gdh:'';
  $check_3_7_hhmm = isset($medico_solicitud->check_3_7_hhmm)?$medico_solicitud->check_3_7_hhmm:'';
  $check_3_8_gdh = isset($medico_solicitud->check_3_8_gdh)?$medico_solicitud->check_3_8_gdh:'';
  $check_3_8_hhmm = isset($medico_solicitud->check_3_8_hhmm)?$medico_solicitud->check_3_8_hhmm:'';

  $check_3_cuenta_gdh = isset($medico_solicitud->check_3_cuenta_gdh)?$medico_solicitud->check_3_cuenta_gdh:'';
  $check_3_cuenta_hhmm = isset($medico_solicitud->check_3_cuenta_hhmm)?$medico_solicitud->check_3_cuenta_hhmm:'';
  $check_3_banco_gdh = isset($medico_solicitud->check_3_banco_gdh)?$medico_solicitud->check_3_banco_gdh:'';
  $check_3_banco_hhmm = isset($medico_solicitud->check_3_banco_hhmm)?$medico_solicitud->check_3_banco_hhmm:'';
  $check_3_tipocuenta_gdh = isset($medico_solicitud->check_3_tipocuenta_gdh)?$medico_solicitud->check_3_tipocuenta_gdh:'';
  $check_3_tipocuenta_hhmm = isset($medico_solicitud->check_3_tipocuenta_hhmm)?$medico_solicitud->check_3_tipocuenta_hhmm:'';
  $check_3_vigencia_gdh = isset($medico_solicitud->check_3_vigencia_gdh)?$medico_solicitud->check_3_vigencia_gdh:'';
  $check_3_vigencia_hhmm = isset($medico_solicitud->check_3_vigencia_hhmm)?$medico_solicitud->check_3_vigencia_hhmm:'';
  $check_3_ruc_gdh = isset($medico_solicitud->check_3_ruc_gdh)?$medico_solicitud->check_3_ruc_gdh:'';
  $check_3_ruc_hhmm = isset($medico_solicitud->check_3_ruc_hhmm)?$medico_solicitud->check_3_ruc_hhmm:'';
  $check_3_emitir_gdh = isset($medico_solicitud->check_3_emitir_gdh)?$medico_solicitud->check_3_emitir_gdh:'';
  $check_3_emitir_hhmm = isset($medico_solicitud->check_3_emitir_hhmm)?$medico_solicitud->check_3_emitir_hhmm:'';
  $check_3_detraccion_gdh = isset($medico_solicitud->check_3_detraccion_gdh)?$medico_solicitud->check_3_detraccion_gdh:'';
  $check_3_detraccion_hhmm = isset($medico_solicitud->check_3_detraccion_hhmm)?$medico_solicitud->check_3_detraccion_hhmm:'';

  $check_1_diligencia_motivo = isset($medico_solicitud->check_1_diligencia_motivo)?$medico_solicitud->check_1_diligencia_motivo:'';
  $check_1_jefatura_motivo = isset($medico_solicitud->check_1_jefatura_motivo)?$medico_solicitud->check_1_jefatura_motivo:'';

  $check_botones_1 = ($check_1_1_gdh && $check_1_2_gdh && $check_1_3_gdh && $check_1_4_gdh && $check_1_5_gdh && $check_1_6_gdh && $check_1_1_hhmm && $check_1_2_hhmm && $check_1_3_hhmm && $check_1_4_hhmm && $check_1_5_hhmm && $check_1_6_hhmm && $check_1_diligencia && $check_1_jefatura);
  // $check_botones_2 = ($check_2_1_gdh && $check_2_2_gdh && $check_2_3_gdh && $check_2_4_gdh && $check_2_1_hhmm && $check_2_2_hhmm && $check_2_3_hhmm && $check_2_4_hhmm);
  $check_botones_2 = ($check_2_1_gdh && $check_2_2_gdh && $check_2_3_gdh && $check_2_4_gdh);
  // $check_botones_3 = ($check_3_1_gdh && $check_3_2_gdh && $check_3_3_gdh && $check_3_4_gdh && $check_3_5_gdh && $check_3_6_gdh && $check_3_7_gdh && $check_3_8_gdh && $check_3_1_hhmm && $check_3_2_hhmm && $check_3_3_hhmm && $check_3_4_hhmm && $check_3_5_hhmm && $check_3_6_hhmm && $check_3_7_hhmm && $check_3_8_hhmm);
  $check_botones_3 = ($check_3_1_hhmm && $check_3_2_hhmm && $check_3_3_hhmm && $check_3_4_hhmm && $check_3_5_hhmm && $check_3_6_hhmm && $check_3_7_hhmm && $check_3_8_hhmm);

?>
    
    <div class="col-lg-12 m-auto">         
         
         <div class="alert alert-success" style="display:none;"></div>	
         <div class="alert alert-danger" style="display:none;"></div>
         <form id="register_form" novalidate action="form_action.php"  method="post">
           <div class="form-group">
             <ul class="nav nav-tabs tab" id="ate_tab_datos">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#tab_perso_1">Datos personales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#tab_perso_2">Datos adicionales</a>
                </li>
             </ul>
             <div class="tab-content" id="myTabDatos">
              <div class="tab-pane fade show active" id="tab_perso_1" role="tabpanel" aria-labelledby="datos1-tab">
                <div class="modal-body">
                 <div class="row">
                  <div class="col-4">
                     <label for="med_apellidos">Unidad</label>
                     <input disabled type="text" class="form-control" name="med_servicio" id="med_servicio" value="<?php echo $servicio_nombre;; ?>">
                   </div>
                   <div class="col-2">
                     <label for="med_tlf1">Nro Solicitud</label>
                     <input disabled type="text" class="form-control" name="med_nro_solicitud" id="med_nro_solicitud" value="<?php echo $nro_solicitud; ?>">
                   </div>
                   <div class="col-2">
                     <label for="med_tlf2">Fecha Solicitud</label>
                     <input disabled type="text" class="form-control" name="med_fecha_solicitud" id="med_fecha_solicitud" value="<?php echo $solicitud_fecha; ?>">
                   </div>
                   <div class="col-2">
                     <label for="med_tlf2">Hora Solicitud</label>
                     <input disabled type="text" class="form-control" name="med_fecha_solicitud" id="med_fecha_solicitud" value="<?php echo $solicitud_hora; ?>">
                   </div>
                   <div class="col-2">
                     <label for="med_estado">Estado</label>
                     <input disabled type="text" class="form-control" name="med_estado" id="med_estado" value="<?php echo $estado_nombre; ?>">
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-4">
                     <label for="med_nombres">Nombres</label>
                     <input disabled type="text" class="form-control" name="med_nombres" id="med_nombres" placeholder="Nombres" value="<?php echo $nombres; ?>">      
                   </div>
                   <div class="col-4">
                     <label for="med_apellidos">Apellidos</label>
                     <input disabled type="text" class="form-control" name="med_apellidos" id="med_apellidos" placeholder="Apellidos" value="<?php echo $apellidos; ?>">
                   </div>
                   <div class="col-2">
                     <label for="med_tipodoc">Tipo doc. ident</label>
                     <select disabled class="form-control" name="med_tipodoc" id="med_tipodoc">
                       <option value="dni" <?php echo ($tipodoc == 'dni'? 'selected':''); ?>>DNI</option>
                       <option value="carnet" <?php echo ($tipodoc == 'carnet'? 'selected':'') ?>>Carnet Extranjería</option>
                     </select>
                   </div>
                   <div class="col-2">
                     <label for="med_documento">Nro. documento</label>
                     <input disabled type="text" class="form-control" name="med_documento" id="med_documento" placeholder="Nro. documento" value="<?php echo $nrodocumento; ?>">
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-2">
                     <label for="med_colegiatura">Nro. de colegiatura</label>
                     <input disabled type="text" class="form-control" name="med_colegiatura" id="med_colegiatura" placeholder="Nro. de colegiatura" value="<?php echo $nro_colegiatura; ?>">
                   </div>
                   <div class="col-2">
                     <label for="med_colegiatura">Nro. RNE</label>
                     <input disabled type="text" class="form-control" name="med_rne" id="med_rne" placeholder="Nro. RNE" value="<?php echo $nro_rne; ?>">
                   </div>
                   <div class="col-4">
                     <label for="med_especialidad">Especialidad:</label>
                     <label><?php echo ($especialidad_estado==1? 'SI':$especialidad_estado==2)?'NO':'EN CURSO'; ?></label>
                     <input disabled type="text" class="form-control" name="med_especialidad" id="med_especialidad" value="<?php echo $especialidad!=''?$especialidad:$especialidad_otro; ?>">
                   </div>
                   <div class="col-4">
                     <label for="med_tlf2">Profesión</label>
                     <input disabled type="text" class="form-control" name="med_profesion" id="med_profesion" placeholder="Profesión" value="<?php echo $profesion; ?>">
                   </div>
                 </div>
                </div>
              </div>
              <div class="tab-pane fade show" id="tab_perso_2" role="tabpanel" aria-labelledby="datos1-tab">
                <div class="modal-body">
                  <div class="row">
                    <div class="col-2">
                      <label for="med_factor">Factor de riesgo</label>
                      <div class="row">
                        <input disabled class="form-control col-1" type="radio" id="med_factor_si" name="med_factor" <?php echo ($factor? 'checked':''); ?>>Si
                        <input disabled class="form-control col-1" type="radio" id="med_factor_no" name="med_factor" <?php echo (!$factor? 'checked':''); ?>>No
                      </div>
                    </div>                  
                   <div class="col-2">
                     <label for="med_idiomas">Conocimiento idiomas</label>
                     <input disabled type="text" class="form-control" name="med_idiomas" id="med_idiomas" value="<?php echo $idioma!=''?$idioma:$idioma_otro; ?>">
                   </div>
                   <div class="form-group col-3">
                     <label for="med_fechanac">Fecha de Nac.</label>
                     <div class="row" style="padding-left:15px;">
                       <input disabled type="date" class="form-control col-md-7" name="med_fechanac" id="med_fechanac" placeholder="Fecha Nacimiento" value="<?php echo $fecha_nacimiento; ?>">
                       <input disabled type="text" class="form-control col-3" id="med_anos" disabled> años
                     </div>
                   </div>
                   <div class="col-4">
                     <label for="med_nacionalidad">Nacionalidad</label>
                     <input disabled type="text" class="form-control" name="med_nacionalidad" id="med_nacionalidad" placeholder="Nacionalidad" value="<?php echo $nacionalidad; ?>">
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-12">
                     <label for="med_nacionalidad">Departamento / Provincia / Distrito </label>
                     <input disabled id="med_ubigeo" name="med_ubigeo" class="form-control uppercase" type="text" value="<?php echo $ubigeo_des; ?>" placeholder="digite el nombre de su distrito">
                     <input disabled type="text" class="form-control" id="med_ubigeoid" disabled="" hidden value="<?php echo $ubigeo_id; ?>">
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-8">
                     <label for="med_direccion">Dirección</label>
                     <input disabled type="text" class="form-control" name="med_direccion" id="med_direccion" placeholder="Dirección" value="<?php echo $direccion; ?>">
                   </div>
                   <div class="col-4">
                     <label for="med_referencia">Referencia</label>
                     <input disabled type="text" class="form-control" name="med_referencia" id="med_referencia" placeholder="Referencia" value="<?php echo $referencia; ?>">
                   </div>
                 </div>
                </div>
              </div>
             </div>
           </div>
           <div class="form-group">    
             <ul class="nav nav-tabs tab" id="ate_tab_modulo">
                <li class="nav-item">
                    <!-- <a id="tab_1_panel" class="nav-link <?php echo ($estado==2?'active':''); ?> <?php echo ($estado==3 || $estado!=2?'disabled':''); ?>" aria-current="page" href="#tab_1">1ra Documentación</a> -->
                    <a id="tab_1_panel" class="nav-link <?php echo ($estado==2?'active':''); ?> " aria-current="page" href="#tab_1">1ra Documentación</a>
                </li>
                <li class="nav-item">
                    <!-- <a id="tab_2_panel" class="nav-link <?php echo ($estado==3?'active':''); ?> <?php echo ($estado==3?'':'disabled'); ?>" aria-current="page" href="#tab_2">Pruebas Psicotécnicas</a> -->
                    <a id="tab_2_panel" class="nav-link <?php echo ($estado==3?'active':''); ?> " aria-current="page" href="#tab_2">Pruebas Psicotécnicas</a>
                </li>
                <li class="nav-item">
                    <!-- <a id="tab_3_panel" class="nav-link <?php echo ($estado==4?'active':''); ?> <?php echo ($estado==4?'':'disabled'); ?>" aria-current="page" href="#tab_3">2da Documentación</a> -->
                    <a id="tab_3_panel" class="nav-link <?php echo ($estado==4?'active':''); ?> " aria-current="page" href="#tab_3">2da Documentación</a>
                </li>
             </ul>
             <div class="tab-content border" id="myTabContent">
                <div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="datos-tab">
                   <div class="modal-body">
                     <div class="form-group"> 
                      <div class="row">
                         <div class="col-lg-1 offset-4">
                           <label class="offset-4" for="">GDH</label>
                         </div>
                         <div class="col-lg-1">
                           <label for="">HH.MM</label>
                         </div>
                         <div class="col-lg-1 offset-4">
                           <label for="">GDH</label>
                         </div>
                         <div class="col-lg-1">
                           <label for="">HH.MM</label>
                         </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3">
                          <label for="">Curriculum vitae simple actualizado AA</label>
                        </div>
                        <div class="row col-lg-3">
                          <!-- <a href="#" onclick="DeleteFile('cv')" class="btn btn-danger col-lg-3"><i class="fas fa-trash"></i></a> -->
  
                          <a href="#" onclick="DownloadFile('cv')" class="btn btn-warning col-lg-3 offset-3"><i class="fas fa-file-download"></i></a>

                          <input class="col-lg-3 form-control" type="checkbox" id="check_1_1_gdh" name="check_1_1_gdh" <?php echo ($check_1_1_gdh? 'checked':''); ?>>
                          <input class="col-lg-3 form-control" type="checkbox" id="check_1_1_hhmm" name="check_1_1_hhmm" <?php echo ($check_1_1_hhmm? 'checked':''); ?>>
                        </div>

                        <div class="col-lg-3">
                          <label for="">Copia del RNE otorgado por el CMP</label>
                        </div>
                        <div class="row col-lg-3">
                          <!-- <a href="#" onclick="DeleteFile('rne')" class="btn btn-danger col-lg-3"><i class="fas fa-trash"></i></a> -->
                          <a href="#" onclick="DownloadFile('rne')" class="btn btn-warning col-lg-3 offset-3"><i class="fas fa-file-download"></i></a>
                          <input class="col-lg-3 form-control" type="checkbox" id="check_1_2_gdh" name="check_1_2_gdh" <?php echo ($check_1_2_gdh? 'checked':''); ?>>
                          <input class="col-lg-3 form-control" type="checkbox" id="check_1_2_hhmm" name="check_1_2_hhmm" <?php echo ($check_1_2_hhmm? 'checked':''); ?>>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-lg-3">
                          <label for="">Copia del Título Profesional: </label>
                        </div>
                        <div class="row col-lg-3">
                          <!-- <a href="#" onclick="DeleteFile('titpro')" class="btn btn-danger col-lg-3"><i class="fas fa-trash"></i></a> -->
                          <a href="#" onclick="DownloadFile('titpro')" class="btn btn-warning col-lg-3 offset-3"><i class="fas fa-file-download"></i></a>
                          <input class="col-lg-3 form-control" type="checkbox" id="check_1_3_gdh" name="check_1_3_gdh" <?php echo ($check_1_3_gdh? 'checked':''); ?>>
                          <input class="col-lg-3 form-control" type="checkbox" id="check_1_3_hhmm" name="check_1_3_hhmm" <?php echo ($check_1_3_hhmm? 'checked':''); ?>>
                        </div>

                        <div class="col-lg-3">
                          <label for="">Declaración Jurada de no tener antecedentes penales o judiciales: </label>
                        </div>
                        <div class="row col-lg-3">
                          <!-- <a href="#" onclick="DeleteFile('declaracion')" class="btn btn-danger col-lg-3"><i class="fas fa-trash"></i></a> -->
                          <a href="#" onclick="DownloadFile('declaracion')" class="btn btn-warning col-lg-3 offset-3"><i class="fas fa-file-download"></i></a>
                          <input class="col-lg-3 form-control" type="checkbox" id="check_1_4_gdh" name="check_1_4_gdh" <?php echo ($check_1_4_gdh? 'checked':''); ?>>
                          <input class="col-lg-3 form-control" type="checkbox" id="check_1_4_hhmm" name="check_1_4_hhmm" <?php echo ($check_1_4_hhmm? 'checked':''); ?>>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-lg-3">
                          <label for="">Copia de colegiatura otorgada por el CMP (*): </label>
                        </div>
                        <div class="row col-lg-3">
                          <!-- <a href="#" onclick="DeleteFile('colegio')" class="btn btn-danger col-lg-3"><i class="fas fa-trash"></i></a> -->
                          <a href="#" onclick="DownloadFile('colegio')" class="btn btn-warning col-lg-3 offset-3"><i class="fas fa-file-download"></i></a>
                          <input class="col-lg-3 form-control" type="checkbox" id="check_1_5_gdh" name="check_1_5_gdh" <?php echo ($check_1_5_gdh? 'checked':''); ?>>
                          <input class="col-lg-3 form-control" type="checkbox" id="check_1_5_hhmm" name="check_1_5_hhmm" <?php echo ($check_1_5_hhmm? 'checked':''); ?>>
                        </div>                                  
                        <div class="col-lg-3">
                          <label for="">Copia del título de especialidad (*): </label>
                        </div>
                        <div class="row col-lg-3">
                          <!-- <a href="#" onclick="DeleteFile('titesp')" class="btn btn-danger col-lg-3"><i class="fas fa-trash"></i></a> -->
                          <a href="#" onclick="DownloadFile('titesp')" class="btn btn-warning col-lg-3 offset-3"><i class="fas fa-file-download"></i></a>
                          <input class="col-lg-3 form-control" type="checkbox" id="check_1_6_gdh" name="check_1_6_gdh" <?php echo ($check_1_6_gdh? 'checked':''); ?>>
                          <input class="col-lg-3 form-control" type="checkbox" id="check_1_6_hhmm" name="check_1_6_hhmm" <?php echo ($check_1_6_hhmm? 'checked':''); ?>>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-lg-4">
                          <label for="">¿Debida diligencia? </label>
                        </div>
                        <div class="row col-lg-3">
                          <input class="form-control col-1" type="radio" id="check_1_diligencia_si" name="check_1_diligencia" <?php echo ($check_1_diligencia? 'checked':''); ?>>Si
                          <input class="form-control col-1" type="radio" id="check_1_diligencia_no" name="check_1_diligencia" <?php echo (!$check_1_diligencia? 'checked':''); ?>>No
                        </div>
                        <div class="col-lg-4">
                          <input <?php echo $check_1_diligencia?'':'disabled'; ?> type="text" class="form-control" name="check_1_diligencia_motivo" id="check_1_diligencia_motivo" value="<?php echo $check_1_diligencia_motivo; ?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4">
                          <label for="">¿Aprobado por Jefatura? </label>
                        </div>
                        <div class="row col-lg-3">
                          <input class="form-control col-1" type="radio" id="check_1_jefatura_si" name="check_1_jefatura" <?php echo ($check_1_jefatura? 'checked':''); ?>>Si
                          <input class="form-control col-1" type="radio" id="check_1_jefatura_no" name="check_1_jefatura" <?php echo (!$check_1_jefatura? 'checked':''); ?>>No
                        </div>                        
                        <div class="col-lg-4">
                          <input <?php echo $check_1_jefatura?'':'disabled'; ?> type="text" class="form-control" name="check_1_jefatura_motivo" id="check_1_jefatura_motivo" value="<?php echo $check_1_jefatura_motivo; ?>">
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-12">
                          <label for="">Comentarios para el médico: </label>
                          <textarea class="form-control" name="med_paso2_comentario" id="med_paso2_comentario" cols="30" rows="2"></textarea>
                        </div>
                      </div>
                      <div class="row text-center">
                        <div class="col-12">
                        <?php if($mostrarbotones){ ?>
                        <input <?php echo ($check_botones_1?'':'disabled'); ?> type="button" id="aceptar_1" class="btn btn-primary col-lg-2" value="Aceptar">
                        <input <?php echo ($check_botones_1?'':'disabled'); ?> type="button" id="rechazar_1" class="btn btn-danger col-lg-2" value="Rechazar">
                        <?php } ?>
                        </div>
                      </div>
                    </div>
                   </div>
                </div>
                <div class="tab-pane fade show" id="tab_2" role="tabpanel" aria-labelledby="datos-tab">

                   <div class="modal-body">
                     <div class="form-group">
                       <div class="row">
                         <div class="col-lg-1 offset-4">
                           <label for="">GDH</label>
                         </div>
                         <div class="col-lg-1">
                           <!-- <label for="">HH.MM</label> -->
                         </div>
                         <div class="col-lg-1 offset-4">
                           <label for="">GDH</label>
                         </div>
                         <div class="col-lg-1">
                           <!-- <label for="">HH.MM</label> -->
                         </div>
                      </div>
                      <div class="row">
                       <div class="col-lg-3">
                         <label for="">Certificado único laboral </label>
                       </div>
                       <div class="row col-lg-3">
                           <!-- <a href="#" onclick="DeleteFile('psico_0')" class="btn btn-danger col-lg-3"><i class="fas fa-trash"></i></a> -->
                           <a href="#" onclick="DownloadFile('psico_0')" class="btn btn-warning col-lg-3 offset-3"><i class="fas fa-file-download"></i></a>
                            <input class="col-lg-3 form-control" type="checkbox" id="check_2_1_gdh" name="check_2_1_gdh" <?php echo ($check_2_1_gdh? 'checked':''); ?>>
                            <!-- <input class="col-lg-3 form-control" type="checkbox" id="check_2_1_hhmm" name="check_2_1_hhmm" <?php echo ($check_2_1_hhmm? 'checked':''); ?>> -->
                       </div>
                        <div class="col-lg-3">
                          <label for="">Prueba Eysenck (*) </label>
                        </div>
                        <div class="row col-lg-3">
                            <!-- <a href="#" onclick="DeleteFile('psico_1')" class="btn btn-danger col-lg-3"><i class="fas fa-trash"></i></a> -->
                            <a href="#" onclick="DownloadFile('psico_1')" class="btn btn-warning col-lg-3 offset-3"><i class="fas fa-file-download"></i></a>
                            <input class="col-lg-3 form-control" type="checkbox" id="check_2_2_gdh" name="check_2_2_gdh" <?php echo ($check_2_2_gdh? 'checked':''); ?>>
                            <!-- <input class="col-lg-3 form-control" type="checkbox" id="check_2_2_hhmm" name="check_2_2_hhmm" <?php echo ($check_2_2_hhmm? 'checked':''); ?>> -->
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-lg-3">
                          <label for="">Prueba DISC </label>
                        </div>
                        <div class="row col-lg-3">
                            <!-- <a href="#" onclick="DeleteFile('psico_2')" class="btn btn-danger col-lg-3"><i class="fas fa-trash"></i></a> -->
                            <a href="#" onclick="DownloadFile('psico_2')" class="btn btn-warning col-lg-3 offset-3"><i class="fas fa-file-download"></i></a>
                          <input class="col-lg-3 form-control" type="checkbox" id="check_2_3_gdh" name="check_2_3_gdh" <?php echo ($check_2_3_gdh? 'checked':''); ?>>
                          <!-- <input class="col-lg-3 form-control" type="checkbox" id="check_2_3_hhmm" name="check_2_3_hhmm" <?php echo ($check_2_3_hhmm? 'checked':''); ?>> -->
                        </div>
                        
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-12">
                          <label for="">Comentarios para el médico: </label>
                          <textarea class="form-control" name="med_paso3_comentario" id="med_paso3_comentario" cols="30" rows="2"></textarea>
                        </div>
                      </div>
                      <div class="row text-center">
                        <div class="col-12">
                        <?php if($mostrarbotones){ ?>
                        <input <?php echo ($check_botones_2?'':'disabled'); ?> type="button" id="aceptar_2" class="btn btn-primary col-lg-2" value="Aceptar">
                        <input <?php echo ($check_botones_2?'':'disabled'); ?> type="button" id="rechazar_2" class="btn btn-danger col-lg-2" value="Rechazar">
                        <?php } ?>
                        </div>
                      </div>

                     </div>
                   </div>

                </div>
                <div class="tab-pane fade show" id="tab_3" role="tabpanel" aria-labelledby="datos-tab">
                    <div class="modal-body">
                     <div class="form-group">
                       <div class="row">
                         <div class="col-lg-1 offset-4">
                           <!-- <label class="offset-10" for="">GDH</label> -->
                         </div>
                         <div class="col-lg-1">
                           <label for="" class="offset-2">HH.MM</label>
                         </div>
                         <div class="col-lg-1 offset-4">
                           <!-- <label class="offset-10" for="">GDH</label> -->
                         </div>
                         <div class="col-lg-1">
                           <label for="">HH.MM</label>
                         </div>
                      </div>
                      <div class="row">
                       <div class="col-lg-4">
                         <label for="">Copia del Resolución de SUNEDU de médico cirujano (extranjero) </label>
                       </div>
                       <div class="row col-lg-2">
                         <!-- <a href="#" onclick="DeleteFile('2da_0')" class="btn btn-danger col-lg-3"><i class="fas fa-trash"></i></a> -->
                         <a href="#" onclick="DownloadFile('2da_0')" class="btn btn-warning col-lg-3 offset-3"><i class="fas fa-file-download"></i></a>
                         <!-- <input class="col-lg-3 form-control" type="checkbox" id="check_3_1_gdh" name="check_3_1_gdh" <?php echo ($check_3_1_gdh? 'checked':''); ?>> -->
                         <input class="col-lg-3 form-control offset-3 " type="checkbox" id="check_3_1_hhmm" name="check_3_1_hhmm" <?php echo ($check_3_1_hhmm? 'checked':''); ?>>
                       </div>
                       <div class="col-lg-5">
                        <div class="row">
                         <div class="col-lg-6">
                          <label for="">Cuenta BCP o CCI </label>
                         </div>
                         <div class="col-lg-6">
                          <input disabled id="codigo_interbancario" type="text" class="form-control" value="<?php echo $codigo_interbancario; ?>">
                         </div>
                        </div>
                       </div>
                       <div class="col-lg-1">
                        <div class="row">
                         <div class="col-lg-6">
                          <!-- <input class="form-control" type="checkbox" id="check_3_cuenta_gdh" name="check_3_cuenta_gdh" <?php echo ($check_3_cuenta_gdh? 'checked':''); ?>> -->
                         </div>
                         <div class="col-lg-6">
                          <input class="form-control" type="checkbox" id="check_3_cuenta_hhmm" name="check_3_cuenta_hhmm" <?php echo ($check_3_cuenta_hhmm? 'checked':''); ?>>
                         </div>
                        </div>
                       </div>
                      </div>
                      <br>
                      <div class="row">                       
                        <div class="col-lg-4">
                          <label for="">Copia del Resolución de SUNEDU de especialidad (extranjero) </label>
                        </div>
                        <div class="row col-lg-2">
                          <!-- <a href="#" onclick="DeleteFile('2da_1')" class="btn btn-danger col-lg-3"><i class="fas fa-trash"></i></a> -->
                          <a href="#" onclick="DownloadFile('2da_1')" class="btn btn-warning col-lg-3 offset-3"><i class="fas fa-file-download"></i></a>
                          <!-- <input class="col-lg-3 form-control" type="checkbox" id="check_3_2_gdh" name="check_3_2_gdh" <?php echo ($check_3_2_gdh? 'checked':''); ?>> -->
                          <input class="col-lg-3 form-control offset-3 " type="checkbox" id="check_3_2_hhmm" name="check_3_2_hhmm" <?php echo ($check_3_2_hhmm? 'checked':''); ?>>
                        </div>
                        <div class="col-lg-5">
                         <div class="row">
                          <div class="col-lg-6">
                           <label for="">Nombre del banco </label>
                          </div>
                          <div class="col-lg-6">
                           <select disabled name="nombre_banco" id="nombre_banco" class="form-control">
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
                        </div>                        
                        <div class="col-lg-1">
                         <div class="row">
                          <div class="col-lg-6">
                           <!-- <input class="form-control" type="checkbox" id="check_3_banco_gdh" name="check_3_banco_gdh" <?php echo ($check_3_banco_gdh? 'checked':''); ?>> -->
                          </div>
                          <div class="col-lg-6">
                           <input class="form-control" type="checkbox" id="check_3_banco_hhmm" name="check_3_banco_hhmm" <?php echo ($check_3_banco_hhmm? 'checked':''); ?>>
                          </div>
                         </div>
                        </div>
                      </div>
                      <br>
                      <div class="row">                       
                        <div class="col-lg-4">
                          <label for="">Copia DNI, CE, PTP, CPP o Pasaporte (ambas caras): </label>
                        </div>
                        <div class="row col-lg-2">
                          <!-- <a href="#" onclick="DeleteFile('2da_2')" class="btn btn-danger col-lg-3"><i class="fas fa-trash"></i></a> -->
                          <a href="#" onclick="DownloadFile('2da_2')" class="btn btn-warning col-lg-3 offset-3"><i class="fas fa-file-download"></i></a>
                          <!-- <input class="col-lg-3 form-control" type="checkbox" id="check_3_3_gdh" name="check_3_3_gdh" <?php echo ($check_3_3_gdh? 'checked':''); ?>> -->
                          <input class="col-lg-3 form-control offset-3 " type="checkbox" id="check_3_3_hhmm" name="check_3_3_hhmm" <?php echo ($check_3_3_hhmm? 'checked':''); ?>>
                        </div>
                        <div class="col-lg-5">
                         <div class="row">
                          <div class="col-lg-6">
                           <label for="">Tipo de cuenta </label>
                          </div>
                          <div class="col-lg-6">
                           <select disabled name="tipo_cuenta" id="tipo_cuenta" class="form-control">
                            <option value="" >Seleccione una opción</option>
                            <option value="ahorro" <?php echo ($tipo_cuenta == 'ahorro'? 'selected':''); ?> >AHORRO</option>
                            <option value="ctacte" <?php echo ($tipo_cuenta == 'ctacte'? 'selected':''); ?> >CUENTA CORRIENTE</option>
                           </select>
                          </div>
                         </div>
                        </div>
                        <div class="col-lg-1">
                         <div class="row">
                          <div class="col-lg-6">
                           <!-- <input class="form-control" type="checkbox" id="check_3_tipocuenta_gdh" name="check_3_tipocuenta_gdh" <?php echo ($check_3_tipocuenta_gdh? 'checked':''); ?>> -->
                          </div>
                          <div class="col-lg-6">
                           <input class="form-control" type="checkbox" id="check_3_tipocuenta_hhmm" name="check_3_tipocuenta_hhmm" <?php echo ($check_3_tipocuenta_hhmm? 'checked':''); ?>>
                          </div>
                         </div>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                       <div class="col-lg-4">
                         <label for="">Firma escaneada: </label>
                       </div>
                       <div class="row col-lg-2">
                         <!-- <a href="#" onclick="DeleteFile('2da_3')" class="btn btn-danger col-lg-3"><i class="fas fa-trash"></i></a> -->
                         <a href="#" onclick="DownloadFile('2da_3')" class="btn btn-warning col-lg-3 offset-3"><i class="fas fa-file-download"></i></a>
                         <!-- <input class="col-lg-3 form-control" type="checkbox" id="check_3_4_gdh" name="check_3_4_gdh" <?php echo ($check_3_4_gdh? 'checked':''); ?>> -->
                         <input class="col-lg-3 form-control offset-3 " type="checkbox" id="check_3_4_hhmm" name="check_3_4_hhmm" <?php echo ($check_3_4_hhmm? 'checked':''); ?>>
                       </div>
                       <div class="col-lg-5">
                        <div class="row">
                         <div class="col-lg-6">
                          <label for="">Fecha de vigencia: </label>
                         </div>
                         <div class="col-lg-6">
                          <input disabled type="date" id="fecha_vigencia" name="fecha_vigencia" class="form-control" value="<?php echo $fecha_vigencia; ?>">
                         </div>
                        </div>
                       </div>
                        <div class="col-lg-1">
                         <div class="row">
                          <div class="col-lg-6">
                           <!-- <input class="form-control" type="checkbox" id="check_3_vigencia_gdh" name="check_3_vigencia_gdh" <?php echo ($check_3_vigencia_gdh? 'checked':''); ?>> -->
                          </div>
                          <div class="col-lg-6">
                           <input class="form-control" type="checkbox" id="check_3_vigencia_hhmm" name="check_3_vigencia_hhmm" <?php echo ($check_3_vigencia_hhmm? 'checked':''); ?>>
                          </div>
                         </div>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-lg-4">
                          <label for="">Constancia de vacunación: </label>
                        </div>
                        <div class="row col-lg-2">
                          <!-- <a href="#" onclick="DeleteFile('2da_4')" class="btn btn-danger col-lg-3"><i class="fas fa-trash"></i></a> -->
                          <a href="#" onclick="DownloadFile('2da_4')" class="btn btn-warning col-lg-3 offset-3"><i class="fas fa-file-download"></i></a>
                          <!-- <input class="col-lg-3 form-control" type="checkbox" id="check_3_5_gdh" name="check_3_5_gdh" <?php echo ($check_3_5_gdh? 'checked':''); ?>> -->
                          <input class="col-lg-3 form-control offset-3 " type="checkbox" id="check_3_5_hhmm" name="check_3_5_hhmm" <?php echo ($check_3_5_hhmm? 'checked':''); ?>>
                        </div>
                        <div class="col-lg-5">
                         <div class="row">
                          <div class="col-lg-6">
                           <label for="">Nro de RUC: </label>
                          </div>
                          <div class="col-lg-6">
                           <input disabled type="text" id="nro_ruc" name="nro_ruc" value="<?php echo $ruc; ?>" class="form-control">
                          </div>
                         </div>
                        </div>
                        <div class="col-lg-1">
                         <div class="row">
                          <div class="col-lg-6">
                           <!-- <input class="form-control" type="checkbox" id="check_3_ruc_gdh" name="check_3_ruc_gdh" <?php echo ($check_3_ruc_gdh? 'checked':''); ?>> -->
                          </div>
                          <div class="col-lg-6">
                           <input class="form-control" type="checkbox" id="check_3_ruc_hhmm" name="check_3_ruc_hhmm" <?php echo ($check_3_ruc_hhmm? 'checked':''); ?>>
                          </div>
                         </div>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-lg-4">
                          <label for="">Foto tamaño carnet (*): </label>
                        </div>
                        <div class="row col-lg-2">
                          <!-- <a href="#" onclick="DeleteFile('2da_5')" class="btn btn-danger col-lg-3"><i class="fas fa-trash"></i></a> -->
                          <a href="#" onclick="DownloadFile('2da_5')" class="btn btn-warning col-lg-3 offset-3"><i class="fas fa-file-download"></i></a>
                          <!-- <input class="col-lg-3 form-control" type="checkbox" id="check_3_6_gdh" name="check_3_6_gdh" <?php echo ($check_3_6_gdh? 'checked':''); ?>> -->
                          <input class="col-lg-3 form-control offset-3 " type="checkbox" id="check_3_6_hhmm" name="check_3_6_hhmm" <?php echo ($check_3_6_hhmm? 'checked':''); ?>>
                        </div>
                        <div class="col-lg-5">
                         <div class="row">
                          <div class="col-lg-6">
                           <label for="">Emitir factura: </label>
                          </div>
                          <div class="col-lg-6">
                           <input disabled type="checkbox" id="factura" name="factura" <?php echo ($emite_factura=='1'?'checked':''); ?> class="form-control offset-1">
                          </div>
                         </div>
                        </div>
                        <div class="col-lg-1">
                         <div class="row">
                          <div class="col-lg-6">
                           <!-- <input class="form-control" type="checkbox" id="check_3_emitir_gdh" name="check_3_emitir_gdh" <?php echo ($check_3_emitir_gdh? 'checked':''); ?>> -->
                          </div>
                          <div class="col-lg-6">
                           <input class="form-control" type="checkbox" id="check_3_emitir_hhmm" name="check_3_emitir_hhmm" <?php echo ($check_3_emitir_hhmm? 'checked':''); ?>>
                          </div>
                         </div>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-lg-4">
                          <label for="">Constancia de Habilidad profesional vigente: </label>
                        </div>
                        <div class="row col-lg-2">
                          <!-- <a href="#" onclick="DeleteFile('2da_6')" class="btn btn-danger col-lg-3"><i class="fas fa-trash"></i></a> -->
                          <a href="#" onclick="DownloadFile('2da_6')" class="btn btn-warning col-lg-3 offset-3"><i class="fas fa-file-download"></i></a>
                          <!-- <input class="col-lg-3 form-control" type="checkbox" id="check_3_7_gdh" name="check_3_7_gdh" <?php echo ($check_3_7_gdh? 'checked':''); ?>> -->
                          <input class="col-lg-3 form-control offset-3" type="checkbox" id="check_3_7_hhmm" name="check_3_7_hhmm" <?php echo ($check_3_7_hhmm? 'checked':''); ?>>
                        </div>
                        <div class="col-lg-5">
                         <div class="row">
                          <div class="col-lg-6">
                           <label for="">Nro cuenta Detracción: </label>
                          </div>
                          <div class="col-lg-6">
                           <input disabled type="text" id="detraccion" name="detraccion" value="<?php echo $detraccion; ?>" class="form-control">
                          </div>
                         </div>
                        </div>
                        <div class="col-lg-1">
                         <div class="row">
                          <div class="col-lg-6">
                           <!-- <input class="form-control" type="checkbox" id="check_3_detraccion_gdh" name="check_3_detraccion_gdh" <?php echo ($check_3_detraccion_gdh? 'checked':''); ?>> -->
                          </div>
                          <div class="col-lg-6">
                           <input class="form-control" type="checkbox" id="check_3_detraccion_hhmm" name="check_3_detraccion_hhmm" <?php echo ($check_3_detraccion_hhmm? 'checked':''); ?>>
                          </div>
                         </div>
                        </div>
                        
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-lg-4">
                          <label for="">Constancia de apertura de cuenta de banco (extranjeros): </label>
                        </div>
                        <div class="row col-lg-2">
                          <!-- <a href="#" onclick="DeleteFile('2da_7')" class="btn btn-danger col-lg-3"><i class="fas fa-trash"></i></a> -->
                          <a href="#" onclick="DownloadFile('2da_7')" class="btn btn-warning col-lg-3 offset-3"><i class="fas fa-file-download"></i></a>
                          <!-- <input class="col-lg-3 form-control" type="checkbox" id="check_3_8_gdh" name="check_3_8_gdh" <?php echo ($check_3_8_gdh? 'checked':''); ?>> -->
                          <input class="col-lg-3 form-control offset-3" type="checkbox" id="check_3_8_hhmm" name="check_3_8_hhmm" <?php echo ($check_3_8_hhmm? 'checked':''); ?>>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-12">
                          <label for="">Comentarios para el médico: </label>
                          <textarea class="form-control" name="med_paso4_comentario" id="med_paso4_comentario" cols="30" rows="2"></textarea>
                        </div>
                      </div>
                      <div class="row text-center">
                        <div class="col-12">
                        <?php if($mostrarbotones){ ?>
                        <input <?php echo ($check_botones_3?'':'disabled'); ?> type="button" id="aceptar_3" class="btn btn-primary col-lg-2" value="Aceptar">
                        <input <?php echo ($check_botones_3?'':'disabled'); ?> type="button" id="rechazar_3" class="btn btn-danger col-lg-2" value="Rechazar">
                        <?php } ?>
                        </div>
                      </div>

                     </div>
                    </div>
                </div>
             </div>
           </div>
           
           <div class="form-group">
             <div class="row">
               <div class="col-12">
                 <label for="">Comentarios de la solicitud: </label>
                 <textarea disabled class="form-control" name="med_comentario" id="med_comentario" cols="30" rows="2"><?php echo $documento_comentario; ?></textarea>
               </div>
             </div>
           </div>
         </form>
     </div>
    </div>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> -->

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
  
    $(document).ready(function(){  

      $("#ate_tab_modulo a").click(function(e){
        e.preventDefault();
          let tab_panel = e.target.id
          $('#tab_1').removeClass("active").removeClass("show");
          $('#tab_2').removeClass("active").removeClass("show");
          $('#tab_3').removeClass("active").removeClass("show");

          $('#'+tab_panel.replace('_panel','')).addClass("active").addClass("show");
          // $(this).tab("show");
      });
      $("#ate_tab_datos a").click(function(e){
          e.preventDefault();
          $('#tab_perso_1').removeClass("active").removeClass("show");
          $('#tab_perso_2').removeClass("active").removeClass("show");
          $(this).tab("show");
      });

      $("input[type=checkbox]").click(function(e){
          send_check($(this))
      });
      $("input[type=radio]").click(function(e){
        let control_id = $(this).attr('name');
        if(control_id == 'check_1_diligencia'){
          if($('#check_1_diligencia_si').prop('checked')){
            $('#check_1_diligencia_motivo').removeAttr('disabled')
          }
          else{
            $('#check_1_diligencia_motivo').attr('disabled', 'disabled')
            $('#check_1_diligencia_motivo').val('')
          }
        }
        if(control_id == 'check_1_jefatura'){
          if($('#check_1_jefatura_si').prop('checked')){
            $('#check_1_jefatura_motivo').removeAttr('disabled')
          }
          else{
            $('#check_1_jefatura_motivo').attr('disabled', 'disabled')
            $('#check_1_jefatura_motivo').val('')
          }
        }
        send_check($(this))
      });
      $("#check_1_diligencia_motivo").blur(function(e){
        send_check($(this))
      });
      $("#check_1_jefatura_motivo").blur(function(e){
        send_check($(this))
      });

      configurarUbigeo();
      
      /* SECCION DE BOTONES DE APROBACIÓN Y RECHAZOS */
        $("#aceptar_1").click(function(){
            send_status(20)
            $('#medico_validar').hide()
            $('.modal-backdrop').remove();
            buscarSolicitudes()
        });
        $("#rechazar_1").click(function(){
          $('#medico_validar').hide()
          $('#medico_motivo_1').modal('show');
          buscarSolicitudes()
        });
        $("#rechazar_1_1").click(function(){
          $('#medico_validar').show()
          $('#medico_motivo_1').hide();
          send_status(21)
          $('#medico_validar').modal('hide')
          $('.modal-backdrop').remove();
          buscarSolicitudes()
        })      
        $("#aceptar_2").click(function(){
            send_status(22)
          $('#medico_validar').hide()
          $('.modal-backdrop').remove();
          buscarSolicitudes()
        });
        $("#rechazar_2").click(function(){
          $('#medico_validar').hide()
          $('#medico_motivo_2').modal('show')
          buscarSolicitudes()
        });
        $("#rechazar_2_1").click(function(){        
          $('#medico_validar').show()
          $('#medico_motivo_2').hide();
          send_status(23)
          $('#medico_validar').modal('hide')
          $('.modal-backdrop').remove();
          buscarSolicitudes()
        })
        $("#aceptar_3").click(function(){        
            send_status(24)
          $('#medico_validar').hide()
          $('.modal-backdrop').remove();
          buscarSolicitudes()
        });
        $("#rechazar_3").click(function(){
          $('#medico_validar').hide()
          $('#medico_motivo_3').modal('show');
          buscarSolicitudes()
        });
        $("#rechazar_3_1").click(function(){
          $('#medico_validar').show()
          $('#medico_motivo_3').hide();
          send_status(25)
          $('#medico_validar').modal('hide')
          $('.modal-backdrop').remove();
          buscarSolicitudes()
        })
      /* SECCION DE BOTONES DE APROBACIÓN Y RECHAZOS */

      $("div .custom-file-input").change(function(data){
        $($(this).parent().children()[1]).text($(this).prop('files')[0].name)        
      })

      /* SECCION DE ACTIVACION POR ESTADO DE LOS TABS */
        if( '<?php echo $estado ?>' == '2' ){
          $('#tab_1').addClass('active')
          $('#tab_2').removeClass('active')
          $('#tab_3').removeClass('active')
        }
        if( '<?php echo $estado ?>' == '3' ){
          $('#tab_1').removeClass('active')
          $('#tab_2').addClass('active')
          $('#tab_3').removeClass('active')
        }
        if( '<?php echo $estado ?>' == '4' ){
          $('#tab_1').removeClass('active')
          $('#tab_2').removeClass('active')
          $('#tab_3').addClass('active')
        }
        if( '<?php echo $estado ?>' == '20' || '<?php echo $estado ?>' == '21' || '<?php echo $estado ?>' == '22' || '<?php echo $estado ?>' == '23' || '<?php echo $estado ?>' == '24' || '<?php echo $estado ?>' == '25' || '<?php echo $estado ?>' == '26'){
          debugger
          $('input[id^=check_1]').attr('disabled', 'disabled')
          $('input[id^=check_2]').attr('disabled', 'disabled')
          $('input[id^=check_3]').attr('disabled', 'disabled')
        }
        else{
          if( '<?php echo $estado ?>' == '2'){
            $('#tab_1_panel').removeClass('disabled')
            $('#tab_2_panel').addClass('disabled')
            $('#tab_3_panel').addClass('disabled')
          }
          if( '<?php echo $estado ?>' == '3'){
            $('#tab_1_panel').addClass('disabled')
            $('#tab_2_panel').removeClass('disabled')
            $('#tab_3_panel').addClass('disabled')
          }
          if( '<?php echo $estado ?>' == '4'){
            $('#tab_1_panel').addClass('disabled')
            $('#tab_2_panel').addClass('disabled')
            $('#tab_3_panel').removeClass('disabled')
          }
        }
      /* SECCION DE ACTIVACION POR ESTADO DE LOS TABS */

      $('#med_anos').val( fnCalculaEdad($('#med_fechanac').val()) );
    });

    function send_status(estado){
      let send_retorno = false;
      let estadoactualsolicitud = $('#estado').val()
      let comentariorechazo = $('#medico_motivo_'+estado+'_text').val()
      let datasend = {
        "activo" : estado,
        "comentario" : comentariorechazo==undefined?'':comentariorechazo,
        "admin_comentario" : (estadoactualsolicitud=="2"? $('#med_paso2_comentario').val():(estadoactualsolicitud=="3"?$('#med_paso3_comentario').val():$('#med_paso4_comentario').val()) )
      }
      let urldata = '<?php echo base_url() ?>Medicos/CambiarEstado';
      
      $.ajax({
          url: urldata,
          async: false,
          data: { 'datasend': datasend },
          type: 'POST',
          beforeSend: function(){
          },
          success: function(response){
              $('#medico_motivo_'+estado+'_text').val('')
              var retorno = JSON.parse(response);
              $('.alert-success').html('')
              $('.alert-success').dequeue()
              if(retorno.success){
                  //ok
                  $('.alert-success').append('Solicitud actualizada correctamente')  
                  $('.alert-success').show().delay(3000).queue(function() {
                    $('.alert-success').css('display', 'none');
                  });
              }
              else{
                  if( Array.isArray(retorno.message) && retorno.message.length > 0 ){ 
                      retorno.message.forEach(item => $('.alert-danger').append('<li>'+item+'</li>') );
                      $('.alert-danger').show().delay(3000).queue(function() {
                        $('.alert-danger').css('display', 'none');
                      });
                      return;
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

    function send_check(check_input){
      if(check_input.attr('type') == 'radio'){
        checkinput = check_input.attr('name')
        checkvalue = check_input.attr('id').includes('_si')?1:0;
      }
      if(check_input.attr('type') == 'checkbox'){
        checkinput = check_input.attr('id')
        checkvalue = check_input.prop('checked')?1:0;
      }
      if(check_input.attr('type') == 'text'){
        checkinput = check_input.attr('id')
        checkvalue = check_input.val();
      }      

      let datasend = {
        "check_data" : checkinput,
        "check_value" : checkvalue,
        
      }
      let urldata = '<?php echo base_url() ?>Medicos/ValidarSolicitud';
      
      $.ajax({
          url: urldata,
          async: true,
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
                  $('.alert-success').append('Solicitud actualizada correctamente')  
                  $('.alert-success').show().delay(3000).queue(function() {
                    $('.alert-success').css('display', 'none');
                  });
              }
              else{
                  if( Array.isArray(retorno.message) && retorno.message.length > 0 ){ 
                      retorno.message.forEach(item => $('.alert-danger').append('<li>'+item+'</li>') );
                      $('.alert-danger').show().delay(3000).queue(function() {
                        $('.alert-danger').css('display', 'none');
                      });
                      return;
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

      validate_step(check_input)
    }

    function validate_step(check_input){
      let retorno = true
      let todoschecked = true
      let control_id = check_input.attr('id')
      if(control_id.includes('check_1')){
        // paso 1
        let controles = $('[id^="check_1"]')
        for (let i = 0; i < controles.length; i++) {
          if($(controles[i]).attr('type') == "checkbox" ){
            todoschecked = todoschecked && $(controles[i]).prop('checked')
          }
        }
        if(todoschecked && $('#check_1_diligencia_si').prop('checked') && $('#check_1_jefatura_si').prop('checked') ){
          $('#aceptar_1').removeAttr('disabled')
          $('#rechazar_1').removeAttr('disabled')
          // $('#tab_2_panel').removeClass('disabled')
          // $('#tab_3_panel').removeClass('disabled')
        }
        else{
          $('#aceptar_1').attr('disabled', 'disabled')
          $('#rechazar_1').attr('disabled', 'disabled')
          // $('#tab_2_panel').addClass('disabled')
          // $('#tab_3_panel').addClass('disabled')
        }
      }
      if(control_id.includes('check_2')){
        // paso 2
        let controles = $('[id^="check_2"]')
        for (let i = 0; i < controles.length; i++) {
          if($(controles[i]).attr('type') == "checkbox" ){
            todoschecked = todoschecked && $(controles[i]).prop('checked')
          }
        }
        if(todoschecked){
          $('#aceptar_2').removeAttr('disabled')
          $('#rechazar_2').removeAttr('disabled')
          // $('#tab_3_panel').removeClass('disabled')
        }
        else{
          $('#aceptar_2').attr('disabled', 'disabled')
          $('#rechazar_2').attr('disabled', 'disabled')
          // $('#tab_3_panel').addClass('disabled')
        }
      }
      if(control_id.includes('check_3')){
        // paso 3
        let controles = $('[id^="check_3"]')
        for (let i = 0; i < controles.length; i++) {
          if($(controles[i]).attr('type') == "checkbox" ){
            todoschecked = todoschecked && $(controles[i]).prop('checked')
          }
        }
        if(todoschecked){
          $('#aceptar_3').removeAttr('disabled')
          $('#rechazar_3').removeAttr('disabled')
        }
        else{
          $('#aceptar_3').attr('disabled', 'disabled')
          $('#rechazar_3').attr('disabled', 'disabled')
        }
      }
      return retorno
    } 

    function DownloadFile(tipo){
      let send_retorno = false;
      let urldata = '<?php echo base_url() ?>Medicos/existsFiles';
      
      $.ajax({
          url: urldata,
          async: false,
          data: { 'datasend': tipo },
          type: 'POST',
          beforeSend: function(){
          },
          success: function(response){
            var retorno = JSON.parse(response);
            if(retorno.existe){
              urldata = '<?php echo base_url() ?>Medicos/searchFiles';
              window.location.href = urldata + '?datasend='+tipo
              return;
            }else{
              Swal.fire({
                  icon: 'warning',
                  title: 'Documento solicitado no existe',
                  showConfirmButton: false,
                  timer: 3000
              })
            }
          }
    })
      




      

      // $.ajax({
      //     url: urldata,
      //     async: false,
      //     type: 'POST',
      //     data: {'datasend' : tipo},
      //     beforeSend: function(){
      //     },
      //     success: function(response){
      //       var retorno = JSON.parse(response);
      //       // window.open('<?php //echo base_url() ?>'+retorno);
      //       // window.open(retorno);
      //     },
      //     complete: function(){
      //         // $('#registro_ok').css('display', 'none');
      //         // $('#registro_error').css('display', 'none');
      //     },
      //     error: function(err){
              
      //     }
      // });
      
    }

    function configurarUbigeo(){
        let urldata = '<?php echo base_url() ?>Medicos/getUbigeos?search={term}';
        let ubigeos = [];
        const autoCompleteConfig = [{
            name: 'Seleccione un ubigeo',
            debounceMS: 250,
            minLength: 2,
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