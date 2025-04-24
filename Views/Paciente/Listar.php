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
                                <li class="offset-5"><h6 class="title text-white text-center"> BUSQUEDA DE PACIENTES</h6></li>
                            </ol>
                        </nav>
                        <div class="modal-body">
                            <div class="row">
                                
                                <div class="col-lg-2">
                                    <label for="fecha_inicio">Apellido paterno</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" id="busca_apepaterno" name="busca_apepaterno" value="">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label for="fecha_inicio">Apellido materno</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" id="busca_apematerno" name="busca_apematerno" value="">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label for="fecha_inicio">Nombres</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" id="busca_nombres" name="busca_nombres" value="">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label for="fecha_inicio">Tipo Documento</label>
                                    <div class="input-group">
                                        <select id="busca_tipodoc" class="form-control" name="busca_tipodoc">
                                            <option value="1">DOC.TRIB.NO.DOM.SIN.RUC</option>
                                            <option value="2">DNI</option>
                                            <option value="3">CARNE EXTR.</option>
                                            <option value="4">RUC</option>
                                            <option value="5">PASAPORTE</option>
                                            <option value="6">CED. DIPLOMATICA DE IDENTIDAD</option>
                                            <option value="7">PART. DE NAC.</option>
                                            <option value="8">COD. NACIDO VIVO (CNV)</option>
                                            <option value="9">SIN DOC DE IDENTIDAD</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label for="fecha_inicio">Nro documento</label>
                                    <div class="input-group">
                                        <input class="form-control" type="number" id="busca_nrodocumento" name="busca_nrodocumento" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary col-lg-2" type="submit" id="reg_btnBuscar"><i class="fas fa-search"></i> Buscar</button>
                                    <button class="btn btn-primary col-lg-3" type="submit" id="reg_btnNuevoPaciente"><i class="fas fa-user-plus"></i> Nuevo Paciente</button>
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
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>

<div id="nuevo_paciente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Nuevo paciente</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="nuevo_paciente_content">
            </div>
        </div>
    </div>
</div>

<?php pie() ?>

<script>

    $(document).ready(function(){

        $('#reg_btnBuscar').on('click', function(event) {
            event.preventDefault();

            let ape_paterno = $('#busca_apepaterno').val();
            let ape_materno = $('#busca_apematerno').val();
            let nombres = $('#busca_nombres').val();
            let tipodoc = $('#busca_tipodoc').val();
            let nrodocumento = $('#busca_nrodocumento').val();
            let urldata = '<?php echo base_url() ?>Paciente/buscarpaciente?ape_paterno='+ape_paterno+'&ape_materno='+ape_materno+'&nombres='+nombres+'&tipodoc='+tipodoc+'&numdoc='+nrodocumento;

            jQuery.ajax({
                url: urldata,
                async: true,
                type: 'GET',
                success: function (response) {
                    debugger;
                    response = JSON.parse(response);
                }
            })
        });

        $('#reg_btnNuevoPaciente').on('click', function(event) {
            event.preventDefault();
            let urldata = '<?php echo base_url() ?>Paciente/NuevoPaciente';
            $.ajax({
                url: urldata,
                async: false,
                type: 'GET',
                success: function (response) {
                    $('#nuevo_paciente_content').html(response);
                    $('#nuevo_paciente').modal('show');
                },
                error: function (err) {
                    window.alert('ERROR HTML: ' + err.getMessage());
                },
                finally: function(){
                }
            });
        });
    });

    let tipos_documento = [{"id":1, "nombre":"DOC.TRIB.NO.DOM.SIN.RUC"},
        {"id":9, "nombre":"SIN DOC DE IDENTIDAD"},
        {"id":7, "nombre":"PART. DE NAC."},
        {"id":4, "nombre":"RUC"},
        {"id":2, "nombre":"DNI"},
        {"id":5, "nombre":"PASAPORTE"},
        {"id":6, "nombre":"CED. DIPLOMATICA DE IDENTIDAD"},
        {"id":8, "nombre":"COD. NACIDO VIVO (CNV)"},
        {"id":3, "nombre":"CARNE EXTR."}
    ]
    
    function crearAtencion(data){
        if(data!=undefined && data!=null){         
            $('#id_matricula').val(data.id_matricula);
            $('#matricula2').val(data.matricula2);
            $('#tipo_documento').val(data.tipo_documento);
            $('#num_doc_id').val(data.num_doc_id);
            $('#apellido_paterno').val(data.apellido_paterno);
            $('#apellido_materno').val(data.apellido_materno);
            $('#nombres').val(data.nombres);
            $('#genero').val(data.genero);
            $('#generotext').val(data.genero?'MASCULINO': 'FEMEINO');
            $('#fecha_nacimiento').val(data.fecha_nacimiento);
            $('#division').val(data.division);
            $('#area_tribu_coe').val(data.area_tribu_coe);
            $('#servicio_tribu_coe').val(data.servicio_tribu_coe);
            $('#unidad_organizativa').val(data.unidad_organizativa);
            $('#funcion').val(data.funcion);
            $('#correo_electronico').val(data.correo_electronico);
            $('#codigo_siga_superior').val(data.codigo_siga_superior);
            $('#matricula_superior').val(data.matricula_superior);
            $('#nombre_completo_superior').val(data.nombre_completo_superior);
            $('#correo_jefe').val(data.correo_jefe);
            
            $('#nueva_atencion').modal('toggle');
        }
    }

</script>