<!-- <?php var_dump($data); ?> -->
<!-- <?php var_dump($data); ?> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
    #contenido{
        font-size: 0.8rem;
    }
    #contenido_titulo{
        font-size: 1.2rem;
        font-weight: bold;
    }
    #contenido_nombre{
        font-size: 1.1rem;
        font-weight: bold;
    }
    #contenido_notas{
        font-size: 0.6rem;
    }
</style>

<div class="col-12" id="contenido">
    <div class="row text-center">
        <img src="<?php echo base_url() ?>/Assets/img/logo.jpg" width="160" height="50" class="d-inline-block align-top" alt="">
    </div>
    <hr>
    <div class="row">
        <div class="col-12 text-center">
            <p id="contenido_titulo">CONSTANCIA DE ALTA EPIDEMIOLÓGICA</p>
        </div>
        <div class="col-12">
            <p>Por la presente se deja constancia que paciente: </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <p id="contenido_nombre"><?php echo $data->data[0]->paciente; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-justify">
            <p>Ha sido atendido el día <?php echo date_format(new DateTime($data->data[0]->fecha_atencion),"d/m/Y"); ?>, por el médico asociado de SANNA Division
            Ambulatoria,<?php if($data->modelo=='modelo1') { ?> el cual al momento de la visita diagnóstico:<?php } else{?> quien al momento de la atención recibe la comunicación del paciente, 
                de que este cuenta con prueba externa con resultado  POSITIVO:<?php }?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-justify">
            <p><?php if($data->modelo=='modelo1') { ?>1.	COVID-19  VIRUS NO IDENTIFICADO (U07.2)<?php } else{?>1.	COVID VIRUS IDENTIFICADO (U07.1)<?php }?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-justify">
            <p>Para lo cual se le brindó tratamiento a seguir, <?php if($data->modelo=='modelo1') { ?>se indicó prueba diagnostica para
            descartar COVID - 19 y descanso médico. <?php } else{?> se brinda recomendaciones generales
                de aislamiento de acuerdo a documento técnico “Prevención, diagnóstico y
                tratamiento de personas afectadas por COVID - 19 en el Perú” aprobado por Resolución 
                Ministerial Nº 193 - 2020 - MINSA y sus modificatorias, tratamiento a seguir y descanso
                médico.<?php }?></p>
        </div>
    </div>
    <?php if($data->modelo=='modelo1') { ?>
    <div class="row">
        <div class="col-12 text-justify">
            <p>Se le confirmó el diagnóstico de COVID 19 (U07.1), se brinda recomendaciones
            generales de aislamiento de acuerdo a documento técnico “Prevención, diagnóstico y 
            tratamiento de personas afectadas por COVID - 19 en el Perú” aprobado por Resolución 
            Ministerial Nº 193-2020-MINSA y sus modificatorias.</p>
        </div>
    </div>
    <?php } ?>
    <div class="row">
        <div class="col-12 text-justify">
            <p>Al momento debido a la mejoría clínica de síntomas y de acuerdo a la Resolución 
            Ministerial Nº 193 - 2020 - MINSA y sus modificatorias, paciente se encuentra en 
            condiciones de alta epidemiológica.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-justify">
            <p>Se expide la presente a solicitud del interesado para los fines que crea necesarios.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-justify">
            <p>Atentamente.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <img width="180" src="data:image/jpeg;base64,<?php echo $data->data[2]->firma_usuario; ?>"/>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <p>SELLO Y FIRMA</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <p>AREA DE SEGUIMIENTO</p>
            <p>SANNA/DIVISION AMBULATORIA</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-right">
            <p>Fecha de Alta: <?php echo date_format(new DateTime($data->data[0]->fecha_registro),"d/m/Y"); ?></p>
        </div>
    </div>
    <br>
    
</div>

<div class="card-footer">
    <button id="descargar" class="btn btn-primary" type="button" ><i class="fas fa-save"></i> Descargar</button>
    <a class="btn btn-danger" data-dismiss="modal"><i class="fas fa-arrow-alt-circle-left"></i> Cerrar</a>
</div>


<script>
    $(document).ready(function(){
        $('#descargar').on('click', function(event) {
            var element = document.getElementById('contenido');
            var opt = {
                margin:       1,
                filename:     <?php echo $data->idsegcovid; ?>,
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' },
                pagebreak:    { after: ['#pagina1', '#pagina2'] }
            };
            html2pdf().set(opt).from(element).save();
        });
    });
</script>