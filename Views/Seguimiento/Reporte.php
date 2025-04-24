<?php encabezado() ?>
<!-- <?php var_dump($_GET['tiposdocumento']); ?> -->
<!-- <?php var_dump($_GET['msg']); ?> -->
<!-- <?php var_dump($data); ?> -->

<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-12 m-auto">

                    <form method="post" action="#" autocomplete="off">
                        
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-primary">
                                <li class="offset-5"><h6 class="title text-white text-center"> REPORTE SEGUIMIENTO BCP</h6></li>
                            </ol>
                        </nav>
                        <div class="modal-body">
                            <div class="row">                                
                                <div class="col-lg-3">
                                    <label for="fecha_inicio">Seleccione filtro</label>
                                    <div class="input-group">
                                        <select id="rpt_filtro" class="form-control" >
                                            <option value="1" selected>FECHA PRIMER SEGUIMIENTO</option>
                                            <option value="2" selected>FECHA DE REGISTRO DE LLAMADA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-lg-6">
                                    <label for="rpt_fecha_inicio">Fecha Inicio</label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" id="rpt_fecha_inicio" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="rpt_fecha_fin">Fecha Fin</label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" id="rpt_fecha_fin" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary col-lg-2" type="submit" id="rpt_btnReporte"><i class="fas fa-search"></i> Filtrar</button>
                                    <button class="btn btn-primary col-lg-2" id="rpt_btnExcel" type="button" onclick="fnExportExcel('rpt_Table')" disabled><i class="fas fa-file-excel"></i> Exportar</button>
                                </div>
                            </div>

                            <?php if (isset($_GET['msg'])) {
                                if(!empty($_GET['msg'])){
                                    ?>
                                    <div class="alert alert-warning" role="alert">
                                    <?php
                                        $alert = json_decode($_GET['msg']);                                        
                                        foreach($alert as $valor){
                                        ?>
                                        <strong><?php echo $valor; ?></strong><br/>
                                    <?php 
                                        }
                                    ?>
                                    </div>
                                    <?php
                                }
                            } ?>
                        </div>

                        <div class="row">
                            <div class="table-responsive mt-4">
                                <table class="table table-hover table-bordered" id="rpt_Table">
                                    <thead class="thead-dark">
                                        <tr>
                                        <th>id_seg_covid</th>
                                        <th>cod_autorizacion</th>
                                        <th>fecha_registro_ate_seg</th> 
                                        <th>cod_ate_ref</th>
                                        <th>paciente</th>
                                        <th>tlf_celular</th>
                                        <th>correo_electronico</th>
                                        <th>dni</th>
                                        <th>fecha_nacimiento</th>
                                        <th>edad</th>
                                        <th>sexo</th>
                                        <th>clasificacion_atencion_ref</th>
                                        <th>asignar_proveedor</th>
                                        <th>pac_contesta</th>
                                        <th>cliente</th>
                                        <th>fecha_creacion_ate_ref</th> 
                                        <th>fecha_coord_lab</th>
                                        <th>fecha_creacion_seg</th>
                                        <th>fecha_primer_seg</th>
                                        <th>estado_seg</th>
                                        <th>periodicidad</th>
                                        <th>factores_riesgo</th>
                                        <th>usuario_registro</th>
                                        <th>distrito</th>
                                        <th>coordinar_ume</th>
                                        <th>evaluacion_domicilio</th>
                                        <th>envio_medicamento</th>
                                        <th>numero_seguimiento</th>
                                        <th>division</th>
                                        <th>area_tribu_coe</th>
                                        <th>servicio_tribu_coe</th>
                                        <th>unidad_organizativa</th>
                                        <th>tipo_ingreso</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>

<?php pie() ?>

<script>

    $(document).ready(function(){
        $('#rpt_fecha_inicio').val( fnCurrentDate() );
        $('#rpt_fecha_fin').val( fnCurrentDate() );

        $('#rpt_btnReporte').on('click', function(event) {
            event.preventDefault();
            let reporte = $('#rpt_filtro').val();
            let fecha_ini = $('#rpt_fecha_inicio').val();
            let fecha_fin = $('#rpt_fecha_fin').val();
            let urldata = '<?php echo base_url() ?>Seguimiento/cargarreporte?reporte='+reporte+'&fecha_ini='+fecha_ini+'&fecha_fin='+fecha_fin;
            process(true);
            jQuery.ajax({
                url: urldata,
                async: true,
                type: 'GET',
                success: function (response) {
                    response = JSON.parse(response);
                    $('#rpt_btnExcel').prop('disabled', true);
                    if(response.data.length>0){
                        $('#rpt_btnExcel').prop('disabled', false);
                    }
                    let tablaH = jQuery('#rpt_Table');
                    tablaH.DataTable().clear();
                    tablaH.DataTable().destroy();
                    tablaH.DataTable( {
                        language: global_tablelanguage,
                        buttons: [
                            'excelHtml5'
                        ],
                        data: response.data,
                        columns: [
                            { "data": "id_seg_covid" },
                            { "data": "cod_autorizacion" },
                            { "data": "fecha_registro_ate_seg" },
                            { "data": "cod_ate_ref" },
                            { "data": "paciente" },
                            { "data": "tlf_celular" },
                            { "data": "correo_electronico" },
                            { "data": "dni" },
                            { "data": "fecha_nacimiento" },
                            { "data": "edad" },
                            { "data": "sexo" },
                            { "data": "clasificacion_atencion_ref" },
                            { "data": "asignar_proveedor" },
                            { "data": "pac_contesta" },
                            { "data": "cliente" },
                            { "data": "fecha_creacion_ate_ref" }, 
                            { "data": "fecha_coord_lab" },
                            { "data": "fecha_creacion_seg" },
                            { "data": "fecha_primer_seg" },
                            { "data": "estado_seg" },
                            { "data": "periodicidad" },
                            { "data": "factores_riesgo" },
                            { "data": "usuario_registro" },
                            { "data": "distrito" },
                            { "data": "coordinar_ume" },
                            { "data": "evaluacion_domicilio" },
                            { "data": "envio_medicamento" },
                            { "data": "numero_seguimiento" },
                            { "data": "division" },
                            { "data": "area_tribu_coe" },
                            { "data": "servicio_tribu_coe" },
                            { "data": "unidad_organizativa" },
                            { "data": "tipo_ingreso" }
                        ]
                    });
                }
            }).then(()=>{
                process(false);
            })
        });

    });
    

</script>