<input hidden id="obs_idparent" type="text" value=""/>
<div class="col-12">
    <div class="row">
        <div class="col-1">
            <label>Tipo Doc</label>
        </div>
        <div class="col-3">
            <input id="hist_documento" class="form-control uppercase" type="text" value="" >
        </div>
        <div class="col-1">
            <button id="hist_btnBuscarDni" class="btn btn-primary offset-0" type="button"><i class="fas fa-search"></i></button>
        </div>
        <div class="col-1">
            <label>Nombres</label>
        </div>
        <div class="col-4">
            <input id="hist_nombres" class="form-control uppercase" type="text" value="" >
        </div>
        <div class="col-1">
            <button id="hist_btnBuscarNombres" class="btn btn-primary offset-0" type="button"><i class="fas fa-search"></i></button>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-1">
            <label>Ape. Materno</label>
        </div>
        <div class="col-5">
            <input id="hist_apematerno" class="form-control uppercase" type="text" value="" >
        </div>
        <div class="col-1">
            <label>Nombres</label>
        </div>
        <div class="col-4">
            <input id="hist_nombre" class="form-control uppercase" type="text" value="" >
        </div>
    </div> -->
</div>
<div class="row">
    <h4>Atenciones</h4>
</div>
<div class="row">
    <div class="table-responsive mt-4">
        <table class="table table-hover table-bordered" id="hist_Table" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>Nro Atencion</th>
                    <th>Paciente</th>
                    <th>Fecha Atención</th>
                    <th>Unidad Negocio</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<div class="card-footer">
    <a class="btn btn-danger" data-dismiss="modal"><i class="fas fa-arrow-alt-circle-left"></i> Cerrar</a>
</div>

<script>
    var datadetalle = null;
    $(document).ready(function(){  
        $('#hist_btnBuscarDni').on('click', function(event) {
            event.preventDefault();
            buscarhistorial(1);
        });
        $('#hist_btnBuscarNombres').on('click', function(event) {
            event.preventDefault();
            buscarhistorial(2);
        });
        buscarhistorial(1);
    });

    function buscarhistorial(tipo){
        if (!validardatos(tipo) ) { return false; }
        
        let nro_documento = $('#hist_documento').val();
        let nombres = $('#hist_nombres').val();
        let urldata =  '';
        if(tipo == 1)
            urldata = '<?php echo base_url() ?>Seguimiento/buscarhistorial?nro_documento='+nro_documento+'&tipo=1';
        else
            urldata = '<?php echo base_url() ?>Seguimiento/buscarhistorial?nombres='+nombres+'&tipo=2';
        process(true);
        let tablaH = jQuery('#hist_Table');
        tablaH.DataTable().clear();
        tablaH.DataTable().destroy();
        jQuery.ajax({
            url: urldata,
            async: true,
            type: 'GET',
            success: function (response) {
                response = JSON.parse(response);
                tablaH.DataTable( {
                    lengthMenu: [5, 10],
                    data: response.data,
                    columns: [
                        { "data": "nro_atencion" },
                        { "data": "paciente" },
                        { "data": "fecha_atencion" },
                        { "data": "unidad_negocio" }
                    ]
                });
            }
        }).then(()=>{
            process(false);
        })
    }
    function cargartiposseguimiento(){
        let urldata = '<?php echo base_url() ?>Seguimiento/getTiposSeguimiento';
        jQuery.ajax({
            url: urldata,
            async: false,
            type: 'GET',
            success: function (response) {
                var data = JSON.parse(response);
                $.each(data.data, function(index, value) {
                    $('#obs_tipo_seguimiento').append( $('<option />').val(value.id_tip_serv).text(value.descripcion_tipo_serv) );
                });
            },
            error: function(err){
                console.log(err);
            }
        });
    }
    function cargartiposeguimientoregistro(tipo_servicio){
        let urldata = '<?php echo base_url() ?>Seguimiento/getTiposSeguimientoRegistro?tipo_servicio='+tipo_servicio;
        $('#obs_tiposregistro').find('option').remove();
        jQuery.ajax({
            url: urldata,
            async: false,
            type: 'GET',
            success: function (response) {
                var data = JSON.parse(response);
                $.each(data.data, function(index, value) {
                    $('#obs_tiposregistro').append( $('<option />').val(value.cod_snc).text(value.registro_tipo_seg) );
                });
            },
            error: function(err){
                console.log(err);
            }
        });
    }
    function grabarobservaciones(){
        let retorno = false;
        let tipo_servicio = $('#obs_tipo_servicio').val();
        let tipo_seguimiento = $('#obs_tipo_seguimiento').val();
        let tipo_registro = $('#obs_tiposregistro').val();
        let codigo = $('#obs_codigo_servicio').val();
        let observacion = $('#obs_descripcion').val();

        let urldata = '<?php echo base_url() ?>Seguimiento/grabarObservaciones';
        var data = {
            'cod_snc' : tipo_registro,
            'codigo': codigo,
            'tipo_servicio': tipo_servicio, 
            'tipo_seguimiento': tipo_seguimiento,
            'observacion': observacion,
        }
        process(true);
        jQuery.ajax({
            url: urldata,
            async: false,
            type: 'POST',
            data: { 'dataobservacion' : data },
            success: function (response) {
                response = JSON.parse(response);
                retorno = response.success;
                if(response.success){
                    buscarservicios();
                }
            }
        }).then(()=>{
            process(false);
        })
        return retorno;
    }
    function validardatos(tipo){
        var errores = [];

        if(tipo == 1){
            if( $('#hist_documento').val() == '' ) errores.push('Ingrese NRO DE DOCUMENTO');
        }
        if(tipo == 2){
            if( $('#hist_apepaterno').val() == '' ) errores.push('Ingrese APELLIDO PATERNO');
        }

        if(errores.length>0)
        {
            $('#modal_historico').modal('hide');
            Swal.fire({
                icon: 'warning',
                title: errores.join('\n'),
                showConfirmButton: false,
                timer: 1500
            }).then((value) => {
                $('#modal_historico').modal('show');
            });
            return false;
        }
        else return true;
    }
</script>