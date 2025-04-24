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
            <p>Al haber cumplido con el respectivo aislamiento domiciliario aunado a la mejoría 
            clínica de síntomas, y de acuerdo con lo establecido por el Ministerio de Salud en su 
            Resolución Ministerial N° 099_2022/MINSA, el paciente se encuentra en condiciones 
            de alta epidemiológica. </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-justify">
            <p>Se procede a brindarle el Alta epidemiológica por COVID-19 encontrándose APTO 
            para retornar a sus labores presenciales a partir del día <?php echo $data->fecha_inicio; ?>. </p>
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
        <div class="col-12 text-right">
            <p>Fecha de Emisión: <?php echo $data->fecha_emision; ?></p>
        </div>
    </div>
    <br>

    <div id="contenido_notas">
        <div class="row">
            <div class="col-12 text-justify">
                <p class="mb-0"><b>RECOMENDACIONES:</b></p>
                <p class="mb-0">Recuerde que, es importante que se siga cuidando y cumpla los lineamientos establecidos por el banco 
                para la prevención frente al Coronavirus: </p>
            </div>
        </div>
        <div class="row">
            <div class="col-11 offset-1 text-justify">
                <p class="mb-0"><b>Esquema completo de vacunación (3 dosis)</b> y registro en la <b>Web Salud al Día</b>. Si aún le falta una 
                dosis de la vacuna, puede acercarse a los vacunatorios a partir de los 14 días después del alta.
                <p class="mb-0">Auto reporte de sintomatología de forma diaria en la <b>Web Salud al Día</b></p>
                <p class="mb-0">Obligatorio el <b>uso permanente de mascarilla</b> cubriendo nariz y boca.</p>
                <p class="mb-0"><b>Distancia física</b>  de 1 metro entre personas. En comedores es de 1.5 metros, o usando los 
                separadores acrílicos si los hay.</p>
                <p class="mb-0"><b>Lavado de manos</b> con agua y jabón o <b>desinfección con alcohol en gel</b> por mínimo 20 segundos. En
                ambos casos asegúrese de tener las manos secas antes de tocar equipos enchufados a la corriente
                eléctrica.</p>
                <p class="mb-0">Cumpla con cualquier otro lineamiento que el banco implemente como medida de prevención.</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12 text-justify">
                <p class="mb-0"><b>IMPORTANTE:</b></p>
            </div>
        </div>
        <div class="row">
            <div class="col-11 offset-1 text-justify">
                <p class="mb-0">En caso pertenezca a la población vulnerable, NO deberá retornar a laborar de forma presencial sin 
                pasar por una evaluación previa por el equipo de SST. En este caso, escriba al buzón de 
                <span style="text-decoration:underline">sstconsultas@bcp.com.pe</span>, copiando este correo.</p>
                <p class="mb-0">Si al momento de recibir esta información, cuenta con descanso médico vigente otorgado por una 
                institución de salud, debe cumplirlo y reincorporarse al término de este. En este caso, coordine con 
                su jefatura para que sea registrado en el SIGA.</p>
                <p class="mb-0">En caso presente síntomas de enfermedad, deberá buscar atención médica a través de su seguro de 
                salud para recibir tratamiento y/o descanso médico de ser necesario.</p>
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