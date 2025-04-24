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
            <p class="col-11 mb-0"><b>N° de atención: <?php echo $data->idsegcovid; ?></b></p>
        </div>
    </div>
    
    <hr>
    <div class="row">
        <div class="col-12" style="display: inline-flex;">
            <p class="mb-0">Conste por el presente documento que el/la la Sr./ Sra. / Srta.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 offset-2" style="display: inline-flex;">
            <label><b><?php echo $data->data[0]->paciente; ?></b></label>
        </div>
    </div>
    <div class="row">
        <div class="col-12" style="display: inline-flex;">
            <p class="mb-0">Identificado (a) con :</p><p class="offset-1 mb-0"><b><?php echo $data->data[0]->numero_documento_id; ?></b></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12" style="display: inline-flex;">
            <p class="mb-0">Ha sido atendido(a) en la fecha :</p><p class="offset-1 mb-0"><b><?php echo date_format(new DateTime($data->data[0]->fecha_atencion),"d/m/Y"); ?></b></p>
        </div>
    </div>    
    <div class="row">
        <div class="col-12" style="display: inline-flex;">
            <p class="mb-0">Al momento de la atención con el diagnóstico presuntivo:</p>
        </div>
    </div>
    <?php 
        if(count($data->data[2]) > 0){
            ?>
            <div class="row">
                <div class="col-12 text-justify">
                    <table class="table table-hover table-bordered" id="tbl_detalledescanso" style="width:100%">
                        <tbody>
            <?php
            foreach($data->data[2] as $key=> $value){
            ?>
                        <tr>
                            <td><?php echo $value->cie10; ?></td>
                            <td><?php echo $value->diagnostico; ?></td>
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
            <p class="">Actualmente con el diagnóstico de:</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12" style="display: inline-flex;">
            <p class=""><b>U07.1   COVID-19 VIRUS IDENTIFICADO</b></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12" style="display: inline-flex;">
            <p class="">Para lo cual se le indicó el tratamiento a seguir y el presente descanso médico</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12" style="display: inline-flex;">
            <p class="col-1">Desde  </p><p><b><?php echo $data->data[0]->fecha_inicio_dm; ?></b></p>
            <p class="col-4"></p>
            <p class="col-1">Hasta  </p><p><b><?php echo $data->data[0]->fecha_fin_dm; ?></b></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12" style="display: inline-flex;">
            <p class="">Se expide la presente a solicitud del interesado para los fines que crea necesarios.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12" style="display: inline-flex;">
            <p class="">Atentamente</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12 text-center">
            <img width="180" src="data:image/jpeg;base64,<?php echo $data->data[1]->firma_usuario; ?>"/>
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
        <div class="col-12" style="display: inline-flex;">
            <p class="">Fecha de emisión: </p>
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