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
<div class="row">
    <img src="<?php echo base_url() ?>Assets/img/headerReceta.png" width="100%" id="logo_header"
</div>

<div class="row" id="descanso_contenido">

    <div class="col-6" style="border-right:dotted;border-color:lightgray;padding-top:45px;">
        <div class="row">
            <div class="col-4" style="display: inline-flex;">
                <label><b>N° Atención: </b><?php echo $data->idsegcovid; ?></label>
            </div>
            <div class="col-4" style="display: inline-flex;">
                <label><b>Fecha: </b><?php echo date_format(new DateTime($data->data[0]->fecha_registro),"d/m/Y"); ?></label>
            </div>
            <div class="col-4" style="display: inline-flex;">
                <label><b>DNI: </b><?php echo $data->data[0]->numero_documento_id; ?></label>
            </div>
        </div>
        <div class="row">
            <div class="col-8" style="display: inline-flex;">
                <label><b>Paciente: </b><?php echo strtoupper($data->data[0]->paciente); ?></label>
            </div>
            <div class="col-4" style="display: inline-flex;">
                <label><b>Edad: </b><?php echo strtoupper($data->data[0]->edad); ?></label>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="display: inline-flex;">
                <label><b>Diagnóstico presuntivo:       U07.1 COVID-19 VIRUS CONFIRMADO.</b></label>
            </div>
        </div>
        <hr>
        
        <div class="row">
            <div class="col-12" style="display: inline-flex;">
                <p class="mb-0"><b>Medicación:</b></p>
            </div>
        </div>
        
        <?php 
            if(count($data->data[4]) > 0){
                ?>
                <div class="row">
                    <div class="col-12 text-justify">
                        <table class="table table-hover table-bordered" id="tbl_detalledescanso" style="width:100%">
                            <tbody>
                <?php
                foreach($data->data[4] as $key=> $value){
                ?>
                            <tr>
                                <td><?php echo $value->descripcon; ?></td>
                                <td><?php echo $value->cantidad; ?></td>
                            </tr>
                <?php 
                }
                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php
            }
        ?>

        <div class="row">
            <div class="col-12" style="display: inline-flex;">
                <p class="col-4">Laboratorio</p>
                <div class="col-4">
                    Sí: 
                    <input type="checkbox" class="col-2">
                </div>
                <div class="col-4">
                    No: 
                    <input type="checkbox" class="col-2" checked>
                </div>
            </div>
        </div>
        
        <div class="row">
            <br><br>
        </div>

        <div class="row">
            <div class="col-12 text-center">
                <img width="180" src="data:image/jpeg;base64,<?php echo $data->data[1]->firma_usuario; ?>"/>
            </div>
        </div>

        <div class="row">
            <div class="col-12 text-center">
                <label><b><?php echo $data->data[1]->nombre; ?></b></label>
            </div>
            <div class="col-12 text-center">
                <label><b>CMP: <?php echo $data->data[1]->cmp_medico; ?></b></label>
            </div>
        </div>

        <div class="row">
            <br><br><br><br><br>
        </div>        

        <div class="col-12" style="font-size:6px; padding-bottom:150px;">
            <div class="row">
                <div class="col-12">
                    <p class="">Recomendaciones: </p>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <p class="mb-0">-Para los casos de entrega de medicamentos por DELIVERY y/o programación de exámenes de</p>
                    <p class="mb-0">LABORATORIO, la central de SANNA se comunicará con usted de acuerdo a disponibilidad.</p>
                    <p class="mb-0">- Al recibir mis medicamentos, he verificado y acepto que las medicinas entregadas corresponden a la receta</p>
                    <p class="mb-0">médica.</p>
                    <p class="mb-0">- Recuerde que la lectura de resultados la debe realizar el médico tratante.</p>
                    <p class="mb-0">- Ante cualquier incidencia o reclamo comuníquese a la CENTRAL DE SANNA (01) 635 5000 - OPCION 5</p>
                </div>
                <div class="col-4">
                    <p class="mb-0"><b>La validez de esta RECETA expira a los 07</b></p>
                    <p class="mb-0"><b>días calendario de la fecha de prescripción.</b></p>
                    <table style="border:solid;">
                        <tr>
                            <td class="text-center">
                            <b>RECUERDE QUE ES IMPORTANTE
                            SEGUIR LAS INDICACIONES DE SU
                            MÉDICO PARA EL
                            RESTABLECIMIENTO DE SU SALUD</b>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        
        
    </div>

    <div class="col-6" id="descanso_contenido" style="border-right:dotted;padding-top:45px;">
        <div class="row">
            <div class="col-4" style="display: inline-flex;">
                <label><b>N° Atención: </b><?php echo $data->idsegcovid; ?></label>
            </div>
            <div class="col-4" style="display: inline-flex;">
                <label><b>Fecha: </b><?php echo date_format(new DateTime($data->data[0]->fecha_registro),"d/m/Y"); ?></label>
            </div>
            <div class="col-4" style="display: inline-flex;">
                <label><b>DNI: </b><?php echo $data->data[0]->numero_documento_id; ?></label>
            </div>
        </div>
        <div class="row">
            <div class="col-8" style="display: inline-flex;">
                <label><b>Paciente: </b><?php echo strtoupper($data->data[0]->paciente); ?></label>
            </div>
            <div class="col-4" style="display: inline-flex;">
                <label><b>Edad: </b><?php echo strtoupper($data->data[0]->edad); ?></label>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="display: inline-flex;">
                <label><b>Diagnóstico presuntivo:       U07.1 COVID-19 VIRUS CONFIRMADO.</b></label>
            </div>
        </div>
        <hr>
        
        <div class="row">
            <div class="col-12" style="display: inline-flex;">
                <p class="mb-0"><b>Medicación:</b></p>
            </div>
        </div>
        
        <?php 
            if(count($data->data[4]) > 0){
                ?>
                <div class="row">
                    <div class="col-12 text-justify">
                        <table class="table table-hover table-bordered" id="tbl_detalledescanso" style="width:100%">
                            <tbody>
                <?php
                foreach($data->data[4] as $key=> $value){
                ?>
                            <tr>
                                <td><?php echo $value->descripcon; ?></td>
                                <td><?php echo $value->frecuencia; ?></td>
                            </tr>
                <?php 
                }
                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php
            }
        ?>

        <div class="row">
            <div class="col-12" style="display: inline-flex;">
                <p class="col-4">Observaciones</p>
            </div>
        </div>
        
        <div class="row">
            <br>
        </div>

        <div class="row">
            <div class="col-12 text-center">
                <img width="180" src="data:image/jpeg;base64,<?php echo $data->data[1]->firma_usuario; ?>"/>
            </div>
        </div>

        <div class="row">
            <div class="col-12 text-center">
                <label><b><?php echo $data->data[1]->nombre; ?></b></label>
            </div>
            <div class="col-12 text-center">
                <label><b>CMP: <?php echo $data->data[1]->cmp_medico; ?></b></label>
            </div>
        </div>
        
    </div>

</div>
<div class="row">
    <img src="<?php echo base_url() ?>Assets/img/footerReceta.png" width="100%" id="logo_footer"
</div>
<div class="card-footer">
    <button id="descargar" class="btn btn-primary" type="button" ><i class="fas fa-save"></i> Descargar</button>
    <a class="btn btn-danger" data-dismiss="modal"><i class="fas fa-arrow-alt-circle-left"></i> Cerrar</a>
</div>


<script>
    $(document).ready(function(){
        function getDataUrl(img) {
            // Create canvas
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');
            // Set width and height
            canvas.width = img.width;
            canvas.height = img.height;
            // Draw the image
            ctx.drawImage(img, 0, 0);
            return canvas.toDataURL('image/jpeg');
        }

        $('#descargar').on('click', function(event) {
            var element = document.getElementById('descanso_contenido');
            var opt = {
                margin:       0.2,
                filename:     <?php echo $data->idsegcovid; ?>,
                image:        { type: 'jpeg', quality: 1 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'in', format: 'a4', orientation: 'landscape' },                
            };
            html2pdf().from(element).set(opt).toPdf().get('pdf').then((pdf) => {
                var totalPages = pdf.internal.getNumberOfPages();
                for (let i = 1; i <= totalPages; i++) {
                    // set footer to every page
                    pdf.setPage(i);
                    // set footer font
                    pdf.setFontSize(8);
                    pdf.setTextColor(150);

                    pdf.addImage(document.getElementById('logo_header'), 'jpg', 0, 0, 11.65, 0.6);
                    pdf.addImage(document.getElementById('logo_footer'), 'jpg', 0, pdf.internal.pageSize.getHeight() - 0.6, 11.65, 0.5);

                    // pdf.line(0,pdf.internal.pageSize.getHeight() - 0.35, pdf.internal.pageSize.getWidth() , pdf.internal.pageSize.getHeight() - 0.35, 'F');
                    // pdf.text(pdf.internal.pageSize.getWidth() - 7, pdf.internal.pageSize.getHeight() - 0.2, 'Todos los derechos reservados ® SANNA');
                    // pdf.text(pdf.internal.pageSize.getWidth() - 6.5, pdf.internal.pageSize.getHeight() - 0.1, 'División Ambulatoria');
                }
            
            }).save();

        });
    });
</script>