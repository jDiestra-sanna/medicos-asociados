<input hidden id="datos_idparent" type="text" value=""/>
<input hidden id="datos_codigo_atencion" type="text" value=""/>
<div class="col-12">
    <div class="row">
        <div class="col-2">
            <label>Tipo Servicio</label>
        </div>
        <div class="col-4">
            <select id="obs_tipo_servicio" class="form-control">
                <option value="ATE">ATENCIÓN</option>
                <option value="PED">PEDIDO</option>
                <option value="LAB">LABORATORIO</option>
                <option value="AMB">AMBULANCIA</option>
            </select>
        </div>
        <div class="col-2">
            <label>Codigo Servicio</label>
        </div>
        <div class="col-3">
            <input id="obs_codigo_servicio" class="form-control uppercase" type="text" value="" >
        </div>
        <div class="col-1">
            <button id="obs_btnBuscaServicio" class="btn btn-primary offset-0" type="button"><i class="fas fa-search"></i></button>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label>Tipo de Seguimiento</label>
        </div>
        <div class="col-4">
            <select id="obs_tipo_seguimiento" class="form-control">
            </select>
        </div>
        <div class="col-2">
            <label>Registro</label>
        </div>
        <div class="col-4">
            <select id="obs_tiposregistro" class="form-control">
            </select>
        </div>
    </div>
</div>
<div class="col-12">
    <div class="row">
        <div class="col-2">
            <label>Descripción</label>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <textarea id="obs_descripcion" class="form-control" cols="15" rows="5"></textarea>
        </div>
    </div>
</div>

<div class="card-footer">
    <a class="btn btn-danger" data-dismiss="modal"><i class="fas fa-arrow-alt-circle-left"></i> Cerrar</a>
</div>

<script>
    var datadetalle = null;
    $(document).ready(function(){        
        cargartiposseguimiento();
        $('#obs_tipo_seguimiento').on('change', function (data) {
            cargartiposeguimientoregistro($(this).val());
        });
        $('#obs_btnBuscaServicio').on('click', function(event) {
            event.preventDefault();
        });

        jQuery('#obs_btnGuardar').on('click', function (data) {
            if ( !validardatos() ) { return false; }
            $('#modal_observacion').modal('hide');
            Swal.fire({
                title: '¿Estás seguro de la acción?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Si',
                denyButtonText: 'No',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    if( grabarobservaciones() ){
                        Swal.fire({
                            icon: 'success',
                            title: 'Se registró la observación correctamente',
                            showConfirmButton: false,
                            timer: 2000
                        }).then(()=>{
                            $('#modal_observacion').modal('show');
                        });
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Hubieron errores en la creación de la observación',
                            showConfirmButton: false,
                            timer: 2000
                        }).then(()=>{
                            $('#modal_observacion').modal('show');
                        });
                    }
                } else if (result.isDenied) {
                    //$('#modal_observacion').modal('show');
                }
            });
        });
        $('#obs_tipo_seguimiento').trigger('change');
    });

   
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
        //var tipo_servicio = $('#obs_tipo_seguimiento').val();
        if ( $('#obs_tipo_seguimiento_valor').val() ){
            tipo_servicio = $('#obs_tipo_seguimiento_valor').val();
            $('#obs_tipo_seguimiento').val($('#obs_tipo_seguimiento_valor').val());
            $('#obs_tipo_seguimiento_valor').val('');
        }
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
    function validardatos(){
        var errores = [];

        if($('#obs_descripcion').val() == '') errores.push('Ingrese DESCRIPCIÓN');
        if(errores.length>0)
        {
            $('#modal_observacion').modal('hide');
            Swal.fire({
                icon: 'warning',
                title: errores.join('\n'),
                showConfirmButton: false,
                timer: 1500
            }).then((value) => {
                $('#modal_observacion').modal('show');
            });
            return false;
        }
        else return true;
    }
</script>