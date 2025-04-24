<input hidden id="obs_idparent" type="text" value=""/>
<input hidden id="obs_tipo_seguimiento_valor" type="text" value=""/>
<div class="col-12">
    <div class="row">
        <div class="col-2">
            <label>Paciente</label>
        </div>
        <div class="col-10">
            <input id="des_paciente" class="form-control uppercase" type="text" value="" disabled>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label>Id Seg Covid</label>
        </div>
        <div class="col-4">
            <input id="des_idsegcovid" class="form-control uppercase" type="text" value="" disabled>
        </div>
        <div class="col-2">
            <label>Ate referenciada</label>
        </div>
        <div class="col-4">
            <input id="des_atereferenciada" class="form-control uppercase" type="text" value="" disabled>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label>F.Atención</label>
        </div>
        <div class="col-4">
            <input id="des_fatencion" class="form-control uppercase" type="text" value="" disabled>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label>Clasificación</label>
        </div>
        <div class="col-10">
            <input id="des_clasificacion" class="form-control uppercase" type="text" value="" disabled>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label>DM anterior</label>
        </div>
        <div class="col-4">
            <input id="des_dmanterior" class="form-control uppercase" type="text" value="" disabled>
        </div>
        <div class="col-2">
            <label>al</label>
        </div>
        <div class="col-4">
            <input id="des_dmanterioral" class="form-control uppercase" type="text" value="" disabled>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label>Nro Orden DM</label>
        </div>
        <div class="col-2">
            <input id="des_orden" class="form-control uppercase" type="text" value="" disabled>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label>Fecha inicio</label>
        </div>
        <div class="col-4">
            <input id="des_finicio" class="form-control uppercase" type="date" value="" >
        </div>
        <div class="col-2">
            <label>Fecha Fin</label>
        </div>
        <div class="col-4">
            <input id="des_ffin" class="form-control uppercase" type="date" value="" >
        </div>
    </div>


<div class="card-footer">
    <div class="row">
        <div class="col-5">
            <label>Paciente cuenta con DM vigente</label>
        </div>
        <div class="col-7">
            <button id="des_btnGuardar" class="btn btn-primary" type="button" ><i class="fas fa-save"></i> Emitir descanso médico</button>
            <a class="btn btn-danger" data-dismiss="modal"><i class="fas fa-arrow-alt-circle-left"></i> Cerrar</a>
        </div>
    </div>
    
</div>

<script>
    $(document).ready(function(){
        var codigo = $('#des_idsegcovid').val();
        let urldata = '<?php echo base_url() ?>Seguimiento/getDescansoMedico?id_seg_covid='+codigo;
        jQuery.ajax({
            url: urldata,
            async: true,
            type: 'GET',
            success: function (response) {
                response = JSON.parse(response);
                $('#des_orden').val(1);
                if(response.data.length > 0){
                    $('#des_dmanterior').val(response.data[0].fecha_inicio_dm);
                    $('#des_dmanterioral').val(response.data[0].fecha_fin_dm);
                    $('#des_orden').val(response.data[0].dm_secuencia+1);
                }
                // $('#des_dmanterior').val(response.data[0].fecha_inicio_dm);
                // $('#des_dmanterioral').val(response.data[0].fecha_fin_dm);
                // $('#des_orden').val(response.data[0].dm_secuencia+1);
            }
        });

        $('#des_btnGuardar').on('click', function(event) {
            event.preventDefault();
            if ( !validardatosdescanso() ) { return false; }
            Swal.fire({
                title: '¿Va emitir el descanso médico por ' + fnDateDiff($('#des_finicio').val().replaceAll('-','/'), $('#des_ffin').val().replaceAll('-','/') ) + 1 + ' día(s), desde el '+ $('#des_finicio').val() + ' al ' + $('#des_ffin').val(),
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Si',
                denyButtonText: 'No',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    if( grabardescanso() ){
                        Swal.fire({
                            icon: 'success',
                            title: 'Se registro el descanso médico',
                            showConfirmButton: false,
                            timer: 2000
                        }).then(()=>{
                            $('#modal_descanso').modal('hide');
                        });
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Hubieron errores en la creación del descanso médico',
                            showConfirmButton: false,
                            timer: 2000
                        }).then(()=>{
                            //$('#modal_descanso').modal('show');
                        });
                    }
                } else if (result.isDenied) {
                    //$('#modal_descanso').modal('show');
                }
            });
        });  
    });

    function validardatosdescanso(){
        var errores = [];
        if($('#des_finicio').val() == '') errores.push('Ingrese Fecha Inicio');
        if($('#des_ffin').val() == '') errores.push('Ingrese Fecha Fin');
        if( fnIsNewerThan( document.getElementById('des_finicio'), document.getElementById('des_ffin') ) ){
            errores.push('Fecha Inicio debe ser mayor que Fecha Fin');
        }
        if(errores.length>0)
        {;
            Swal.fire({
                icon: 'warning',
                title: errores.join('\n'),
                showConfirmButton: false,
                timer: 1500
            }).then((value) => {
                
            });
            return false;
        }
        else return true;
    }
    function grabardescanso(){
        // $('#des_descansogenerado').val('1');
        // return true;
        let retorno = false;
        let tipo_servicio = $('#obs_tipo_servicio').val();
        let tipo_seguimiento = $('#obs_tipo_seguimiento').val();
        let tipo_registro = $('#obs_tiposregistro').val();
        let codigo = $('#obs_codigo_servicio').val();
        let observacion = $('#obs_descripcion').val();

        let urldata = '<?php echo base_url() ?>Seguimiento/saveDescansoMedico';
        var data = {
            'id_seg_covid' : $('#des_idsegcovid').val(),
            'secuencia': $('#des_orden').val(),
            'fechaini': $('#des_finicio').val(),
            'fechafin': $('#des_ffin').val()
        }
        
        process(true);
        jQuery.ajax({
            url: urldata,
            async: false,
            type: 'POST',
            data: { 'datadescanso' : data },
            success: function (response) {
                response = JSON.parse(response);
                retorno = response.success;
                $('#des_descansogenerado').val('0');
                if(response.success){
                    //Aqui viene la generacion del PDF
                    $('#des_descansogenerado').val('1');
                    //$('#modal_descanso').modal('hide');
                }
            }
        }).then(()=>{
            process(false);
        })
        return retorno;
    }
</script>