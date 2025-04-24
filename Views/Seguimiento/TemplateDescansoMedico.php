<!-- <?php var_dump($data); ?> -->
<!-- <?php var_dump($data); ?> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
    #descanso_contenido{
        font-size: 0.8rem;
    }
    #descanso_contenido_titulo{
        font-size: 1.2rem;
        font-weight: bold;
    }
    #descanso_contenido_nombre{
        font-size: 1.1rem;
        font-weight: bold;
    }
    #contenido_notas{
        font-size: 0.6rem;
    }
</style>

<div class="col-12" id="descanso_contenido">
    <div class="row text-center">
        <div class="col-4">
            <img src="<?php echo base_url() ?>Assets/img/logo.jpg" width="160" height="50" class="d-inline-block align-top" alt="">
        </div>
        <div class="col-8">
            <h4 style="color:rgb(28, 200, 138);">DESCANSO MÉDICO</h4>
        </div>
    </div>
    
    <hr>
    <div class="row">
        <div class="col-6 offset-6" style="display: inline-flex;">
            <p class="col-9 mb-0">Constancia de atención </p> <p class="col-3 mb-0" id="tipodocconstancia">(  )</p>
        </div>
    </div>
    <div class="row">
        <div class="col-6 offset-6" style="display: inline-flex;">
            <p class="col-9 mb-0">Descanso médico </p> <p class="col-3 mb-0" id="tipodocdescanso">( X )</p>
        </div>
    </div>
    <div class="row">
        <div class="col-6 offset-6" style="display: inline-flex;">
            <p class="col-9">Fecha: </p> <p class="col-3" id="fechadescanso"><?php echo $data->fecha_emision; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label for="seg_fecha_fin" ><b>Paciente: </b> <?php echo $data->data[0]->paciente; ?></label>
        </div>
        <div class="col-6">
            <label for="seg_fecha_fin" ><b>DNI: </b> <?php echo $data->data[0]->numero_documento_id; ?></label>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label for="seg_fecha_fin" ><b>Empresa: </b> <?php echo $data->empresa; ?></label>
        </div>
        <div class="col-6">
            <label for="seg_fecha_fin" ><b>Código afiliado: </b> <?php echo $data->data[0]->id_matricula; ?></label>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="seg_fecha_fin" ><b>Presunción diagnóstica (CIE10): </b> <?php echo $data->data[0]->diagnostio; ?></label>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label for="seg_fecha_fin" ><b>Fecha de inicio de DM: </b> <?php echo $data->data[0]->fecha_inicio_dm; ?></label>
        </div>
        <div class="col-6">
            <label for="seg_fecha_fin" ><b>Fecha de fin de DM: </b> <?php echo $data->data[0]->fecha_fin_dm; ?></label>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <label for="seg_fecha_fin" ><b>Nombre del médico: </b> <?php echo $data->data[1]->nombre; ?></label>
        </div>
        <div class="col-4">
            <label for="seg_fecha_fin" ><b>CMP: </b> <?php echo $data->data[1]->cmp_medico; ?></label>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-justify">
            
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <img width="180" src="data:image/jpeg;base64,<?php echo $data->data[1]->firma_usuario; ?>"/>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <p>SELLO Y FIRMA</p>
        </div>
    </div>

    <div id="division">
        <div class="row text-center">
            <h4 class="text-align-center" style="color:rgb(28, 200, 138);">INDICACIONES MÉDICAS</h4>
        </div>
        <div class="row">
            <div class="col-12 text-justify">
                <p>El (la) paciente <?php echo $data->data[0]->paciente; ?>  identificado con DNI <?php echo $data->data[0]->numero_documento_id; ?> ha sido </p>
                <p>diagnosticado (a) de COVID-19 durante los siguientes periodos de descansos médicos:</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-justify">
                <table class="table table-hover table-bordered" id="tbl_detalledescanso" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>Fecha de otorgamiento</th>
                            <th>Fecha de inicio de descanso médico</th>
                            <th>Fecha de fin de descanso médico</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $data->fecha_emision; ?></td>
                            <td><?php echo $data->data[0]->fecha_inicio_dm; ?></td>
                            <td><?php echo $data->data[0]->fecha_fin_dm; ?></td>
                        </tr>
                        <tr></tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-justify">
                <p>Durante estos periodos s ele brindo las siguientes indicaciones médicas:</p>
            </div>
        </div>

        <div id="contenido_notas">
            <div class="row">
                <div class="col-12 text-justify">
                    <p class="mb-0"><b>INDICACIONES:</b></p>
                </div>
            </div>
            <div class="row">
                <div class="col-11 offset-1 text-justify">
                    <ul>
                        <li>Cumple con tu aislamiento social, evitando salir, salvo necesites atención médica. </li>
                        <li>No recibas visitas. </li>
                        <li>Descansa bien y toma buena cantidad de líquidos. </li>
                        <li>Usa un baño separado, si es posible. </li>
                        <li>Si compartes ambientes con familiares, mantener una distancia de por lo menos 2 
                            metros y tener el ambiente ventilado, además de usar tu mascarilla. </li>
                        <li>Lávate las manos con frecuencia por un lapso mínimo de 20 segundos. </li>
                        <li>Lava tus platos, tazas o cubiertos por separado. </li>
                        <li>Si tienes algunas de las siguientes molestias, acude a emergencia o consulta con tu 
                            médico tratante.
                            <ul>
                                <li>Problemas para respirar</li>
                                <li>Dolor u opresión persistente en el pecho</li>
                                <li>Confusión que es nueva</li>
                                <li>Labios o cara de color azulado</li>
                                <li>Incapacidad para permanecer despierto</li>
                            </ul> 
                        </li>
                        <li>Sigue las indicaciones de tu médico tratante.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-footer">
    <button id="descargar" class="btn btn-primary" type="button" ><i class="fas fa-save"></i> Descargar</button>
    <a class="btn btn-danger" data-dismiss="modal"><i class="fas fa-arrow-alt-circle-left"></i> Cerrar</a>
</div>


<script>
    $(document).ready(function(){
        $('#descargar').on('click', function(event) {
            var element = document.getElementById('descanso_contenido');
            var opt = {
                margin:       1,
                filename:     <?php echo $data->idsegcovid; ?>,
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' },
                pagebreak:    { after: ['#division', '#pagina2'] }
            };
            html2pdf().set(opt).from(element).save();
        });
    });
</script>