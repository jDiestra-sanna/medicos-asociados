<input id="ate_cod_hia" name="ate_cod_hia" class="form-control" type="text" hidden>
<input id="ate_usuario" name="ate_usuario" class="form-control" type="text" value="<?php echo $_SESSION['usuario']; ?>" hidden>
<div class="row">
    <h4>Paciente</h4>
</div>
<div class="row">
    <div class="col-7">
        <div class="row">
            <div class="col-3">
                <label>Apellido paterno</label>
            </div>
            <div class="col-9">
                <input id="ate_ape_paterno" name="ate_ape_paterno" class="form-control uppercase" type="text" value="" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label>Apellido materno</label>
            </div>
            <div class="col-9">
                <input id="ate_ape_materno" name="ate_ape_materno" class="form-control uppercase" type="text" value="" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label>Nombres</label>
            </div>
            <div class="col-9">
                <input id="ate_nombres" name="ate_nombres" class="form-control uppercase" type="text" value="" disabled>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-lg-6">
                    <label>Tipo Documento</label>
                    <div class="input-group">
                        <select id="ate_tipo_documento" class="form-control" name="ate_tipo_documento" disabled>
                            <option value="2">DNI</option>
                            <option value="3">CARNE EXTR.</option>
                            <option value="5">PASAPORTE</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label>Nro Documento</label>
                    <input id="ate_nro_documento" name="ate_nro_documento" class="form-control" type="number" value="" disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label>Email</label>
            </div>
            <div class="col-9">
                <input id="ate_email" name="ate_email" class="form-control uppercase" type="text" value="" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label>Fecha Nacimiento</label>
                <div class="input-group">
                    <input id="ate_fecha_nacimiento" name="ate_fecha_nacimiento" class="form-control" type="date" value="" disabled>    
                </div>
            </div>
            <div class="col-lg-6">
                <label>Edad</label>
                <input id="ate_edad" name="ate_edad" class="form-control" type="number" value="" readonly>
            </div>
        </div>
    </div>
    <div class="col-5">
        <div class="row">
            <div class="col-3">
                <label>Género</label>
            </div>
            <div class="col-9">
                <select id="ate_sexo" class="form-control" name="ate_sexo" disabled>
                    <option value="1">MASCULINO</option>
                    <option value="0">FEMENINO</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label>Tlf. Móvil</label>
            </div>
            <div class="col-9">
                <input id="ate_movil" name="ate_movil" class="form-control" type="number" value="" disabled>
            </div>
        </div>
        <div class="row" id="matricula">
            <div class="col-3">
                <label>Matrícula</label>
            </div>
            <div class="col-9">
                <input id="ate_matricula" name="ate_matricula" class="form-control uppercase" type="text" value="" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label>Tipo ingreso</label>
            </div>
            <div class="col-9">
                <select id="ate_tipoingreso" class="form-control" name="ate_tipoingreso">
                    <option value="CASO CONFIRMADO">CASO CONFIRMADO</option>
                    <option value="CASO SOSPECHOSO">CASO SOSPECHOSO</option>
                    <option value="CASO PROBABLE">CASO PROBABLE</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label>Fecha Inicio</label>
                </div>
            <div class="col-9">
                <input id="ate_fecha_inicio" name="ate_fecha_inicio" class="form-control" type="date" value="" >
            </div>
        </div>
    </div>
</div>
<form action="" id="form_direcciones">
    <div class="row">
        <h4>Dirección</h4>
    </div>
    <div class="row">
        <div class="table-responsive mt-4">
            <table class="table table-hover table-bordered" id="ate_direcciones" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <!-- <td>Cod.Dir</td>
                        <td>Cod Dis</td> -->
                        <td>Distrito</td>
                        <td>Provincia</td>
                        <td>Departamento</td>
                        <td>Dirección</td>
                        <td>Referencia</td>
                        <td>Telef casa</td>
                        <td>Telef trabajo</td>
                        <td>Telef Anexo</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>


<div class="card-footer">
    <button id="ate_btnAtencion" name="ate_btnAtencion" class="btn btn-primary col-lg-2" type="button" ><i class="fas fa-save"></i> Crear atención</button>
    <a class="btn btn-danger" data-dismiss="modal"><i class="fas fa-arrow-alt-circle-left"></i> Cerrar</a>
</div>

<style>
    tbody tr.odd.selected{
        background-color: #acbad4;
    }
    tbody tr.even.selected{
        background-color: #acbad4;
    }
</style>

<script>
    var indextabledireccion;
    $(document).ready(function(){
        jQuery('#ate_direcciones').on('click', 'button', function (data) {
            var data = jQuery('#ate_direcciones').DataTable().row(jQuery(this).parents('tr')).data();
            if(jQuery(this)[0].id == 'per_direccionedit')
                seteditdireccion(data, $(this).parents('tr').index());
            if(jQuery(this)[0].id == 'per_direcciondelete')
                jQuery('#ate_direcciones').DataTable().row( $(this).parents('tr') ).remove().draw();
            
        });

        jQuery('#ate_btnAtencion').on('click', function (data) {
            if ( !validardatospersona() ) { return false; }
            if ( !validardireccion() ) { return false; }

            $('#nuevo_atencion').modal('hide');
            Swal.fire({
                title: '¿Estás seguro de la acción?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Si',
                denyButtonText: 'No',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    grabarAtencion();
                } else if (result.isDenied) {
                    $('#nuevo_atencion').modal('show');
                }
            });
        });
    });

    function grabarAtencion(){
        var direccion = jQuery('#ate_direcciones').DataTable().data();
        var cod_hia = $('#ate_cod_hia').val();
        var apepaterno = $('#ate_ape_paterno').val();
        var apematerno = $('#ate_ape_materno').val();
        var nombres = $('#ate_nombres').val();
        var user = $('#ate_usuario').val();
        var fecha_atencion = $('#ate_fecha_inicio').val();
        var cod_dir = direccion[0].cod_dir
        var cod_dis = direccion[0].cod_dis;
        var tipo_ingreso = $('#ate_tipoingreso').val();
        var matricula = $('#ate_matricula').val();

        var data = {
            'user' : user,
            'cod_tit': cod_hia,
            'apepat': apepaterno,
            'apemat': apematerno,
            'nombre': nombres, 
            'fec_ate': fecha_atencion,
            'cod_dir': cod_dir,
            'cod_dis': cod_dis,
            'tipo_ingreso': tipo_ingreso,
            'id_matricula': matricula
        }
        let urldata = '<?php echo base_url() ?>Atencion/insertAtencion';
        jQuery.ajax({
            url: urldata,
            async: false,
            data: { 'dataatencion' : data },
            type: 'POST',
            success: function (response) {
                var data = JSON.parse(response);
                if(data.success)
                {
                    $('#nuevo_codigo_atencion').val(data.data.cod_atencion);
                    $('#nuevo_atencion').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Atención generada con el código: ' + data.data.cod_atencion,
                        showConfirmButton: true,
                        //timer: 2000
                    }).then((value) => {
                        window.location.href = '<?php echo base_url() ?>Seguimiento/Seguimiento'; 
                    });
                }
                else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Hubieron errores en la creación de la atención',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    $('#nuevo_atencion').modal('hide');
                }
            },
            error: function(err){
                Swal.fire({
                    icon: 'error',
                    title: 'Hubieron errores en la creación del paciente',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        })
    }

    function validardireccion(){
        var countdirecciones = jQuery('#ate_direcciones').DataTable().rows('.selected').data().count();
        if(countdirecciones == 0)
        {
            $('#nuevo_atencion').modal('hide');
            Swal.fire({
                icon: 'warning',
                title: 'Debe seleccionar una dirección',
                showConfirmButton: false,
                timer: 1500
            }).then((value) => {
                $('#nuevo_atencion').modal('show');
            });
            return false;
        }
        else return true;
    }
    function validardatospersona(){
        var errores = [];

        if($('#ate_fecha_inicio').val() == '') errores.push('Ingrese FECHA INICIO');
        if($('#ate_ape_paterno').val() == '') errores.push('Ingrese APELLIDO PATERNO');
        if($('#ate_ape_materno').val() == '') errores.push('Ingrese APELLIDO MATERNO');
        if($('#ate_nombres').val() == '') errores.push('Ingrese NOMBRES');
        if($('#ate_fecha_nacimiento').val() == '') errores.push('Ingrese FECHA DE NACIMIENTO');
        if($('#ate_tipo_documento').val() == '') { errores.push('Ingrese TIPO DOCUMENTO'); }
        else{
            if( $('#ate_tipo_documento').val() == 2 && $('#ate_nro_documento').val().length != 8 ){ errores.push('Verifique el nro de dígitos del documento');}
            else if($('#ate_tipo_documento').val() == 3 && $('#ate_nro_documento').val().length != 9){ errores.push('Verifique el nro de dígitos del documento');}
            else if( $('#ate_nro_documento').val().length > 15 ){ errores.push('Verifique el nro de dígitos del documento'); }
            
        }
        if($('#ate_nro_documento').val() == '') errores.push('Ingrese NRO DOCUMENTO');
        if($('#ate_sexo').val() == '') errores.push('Ingrese GÉNERO');
        if( $('#ate_direcciones').DataTable().rows().count() == 0 ) errores.push('Ingrese al menos una DIRECCION');
        if(errores.length>0)
        {
            $('#nuevo_atencion').modal('hide');
            Swal.fire({
                icon: 'warning',
                title: errores.join('\n'),
                showConfirmButton: false,
                timer: 1500
            }).then((value) => {
                $('#nuevo_atencion').modal('show');
            });
            //window.alert(errores.join('\n'));
            return false;
        }
        else return true;
    }

</script>