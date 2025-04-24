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
                <input id="pac_ape_paterno" name="pac_ape_paterno" class="form-control uppercase" type="text" value="" required>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label>Apellido materno</label>
            </div>
            <div class="col-9">
                <input id="pac_ape_materno" name="pac_ape_materno" class="form-control uppercase" type="text" value="" required>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label>Nombres</label>
            </div>
            <div class="col-9">
                <input id="pac_nombres" name="pac_nombres" class="form-control uppercase" type="text" value="" required>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-lg-6">
                    <label>Tipo Documento</label>
                    <div class="input-group">
                        <select id="pac_tipo_documento" class="form-control" name="pac_tipo_documento" required>
                            <option value="2">DNI</option>
                            <option value="3">CARNE EXTR.</option>
                            <option value="5">PASAPORTE</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label>Nro Documento</label>
                    <input id="pac_nro_documento" name="pac_nro_documento" class="form-control" type="number" onkeyup="limitarcaracteres()" value="" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label>Email</label>
            </div>
            <div class="col-9">
                <input id="pac_email" name="pac_email" class="form-control uppercase" type="text" value="" required>
            </div>
        </div>
    </div>
    <div class="col-5">
        <div class="form-group">
            <div class="row">
                <div class="col-lg-6">
                    <label>Fecha Nacimiento</label>
                    <div class="input-group">
                        <input id="pac_fecha_nacimiento" name="pac_fecha_nacimiento" class="form-control" type="date" value="" required>    
                    </div>
                </div>
                <div class="col-lg-6">
                    <label>Edad</label>
                    <input id="pac_edad" name="pac_edad" class="form-control" type="number" value="" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label>Género</label>
            </div>
            <div class="col-9">
                <select id="pac_sexo" class="form-control" name="pac_sexo" required>
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
                <input id="pac_movil" name="pac_movil" class="form-control" type="number" value="" onkeyup="fnLimitText( this, 15);">
            </div>
        </div>
    </div>
</div>
<form action="" id="form_direcciones">
    <div class="row">
        <h4>Dirección</h4>
    </div>
    <div class="row">
        <div class="col-7">
            <div class="row">
                <div class="col-3">
                    <label>Ubigeo</label>
                </div>
                <div class="col-9">
                    <input id="pac_ubigeo" name="pac_ubigeo" class="form-control uppercase" type="text" value="">
                    <input type="text" class="form-control" id="pac_ubigeoid" disabled="" hidden>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label>Dirección</label>
                </div>
                <div class="col-9">
                    <input id="pac_direccion" name="pac_direccion" class="form-control uppercase" type="text" value="">
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label>Referencia</label>
                </div>
                <div class="col-9">
                    <input id="pac_referencia" name="pac_referencia" class="form-control uppercase" type="text" value="">
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="row">
                <div class="col-3">
                    <label>Telef. casa</label>
                </div>
                <div class="col-9">
                    <input id="pac_tlfcasa" name="pac_tlfcasa" class="form-control" type="number" value="" onkeyup="fnLimitText( this, 10);">
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label>Tlf. trabajo</label>
                </div>
                <div class="col-6">
                    <input id="pac_tlftrabajo" name="pac_tlftrabajo" class="form-control" type="number" value="" onkeyup="fnLimitText( this, 10);">
                </div>
                <div class="col-3">
                    <input id="pac_tlftrabajoanexo" name="pac_tlftrabajoanexo" class="form-control" type="number" value="" onkeyup="fnLimitText( this, 5);">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <input id="pac_btnAddDireccion" name="pac_btnAddDireccion" class="btn btn-primary" type="button" value="Agregar dirección" onclick="adddireccion();">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="table-responsive mt-4">
            <table class="table table-hover table-bordered" id="per_direcciones">
                <thead class="thead-dark">
                    <tr>
                        <td>Cod.Ubigeo</td>
                        <td>Ubigeo</td>
                        <td>Dirección</td>
                        <td>Referencia</td>
                        <td>Telef casa</td>
                        <td>Telef trabajo</td>
                        <td>Telef Anexo</td>
                        <td>Acción</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>


<div class="card-footer">
    <button id="pac_btnPersona" name="pac_btnPersona" class="btn btn-primary col-lg-2" type="button" ><i class="fas fa-save"></i> Registrar paciente</button>
    <a href="/Beneficios/Listar" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-arrow-alt-circle-left"></i> Cerrar</a>
</div>

<script>
    var indextabledireccion;
    $(document).ready(function(){

        $('#pac_fecha_nacimiento').attr('max', fnCurrentDate());
        configurarUbigeo();

        $('#pac_fecha_nacimiento').on('change', function (data) {
            $('#pac_edad').val( fnCalculaEdad($(this).val()) );
        });
        $('#per_direcciones').DataTable({
            language: global_tablelanguage,
            select: true,
            searching: false,
            sorting: false,
            bInfo : false,
            paginate: true,
            lengthMenu: [5],
        });

        jQuery('#per_direcciones').on('click', 'button', function (data) {
            var data = jQuery('#per_direcciones').DataTable().row(jQuery(this).parents('tr')).data();
            if(jQuery(this)[0].id == 'per_direccionedit')
                seteditdireccion(data, $(this).parents('tr').index());
            if(jQuery(this)[0].id == 'per_direcciondelete')
                jQuery('#per_direcciones').DataTable().row( $(this).parents('tr') ).remove().draw();
            
        });

        jQuery('#pac_btnPersona').on('click', function (data) {
            if ( !validardatospersona() ) { return false;}

            var apepaterno = $('#pac_ape_paterno').val();
            var apematerno = $('#pac_ape_materno').val();
            var nombres = $('#pac_nombres').val();
            var fechanacimiento = $('#pac_fecha_nacimiento').val();
            var tipodocumento = $('#pac_tipo_documento').val();
            var nrodocumento = $('#pac_nro_documento').val();
            var sexo = $('#pac_sexo').val();
            var correo = $('#pac_email').val();
            var cel_pac = $('#pac_movil').val();
            var direcciones = [];
            
            Array.prototype.forEach.call(jQuery('#per_direcciones').DataTable().data(), function(el) {
                direcciones.push({
                    'ubigeo' : el[0],
                    'des_dir' : el[2],
                    'ref_dir' : el[3],
                    'tlf_casa' : el[4],
                    'tlf_oficina' : el[5],
                    'tlf_oficina_anx' : el[6]
                });
            });
            var data = {
                'nom_com' : (apepaterno + ' ' + apematerno + ' ' +nombres).toUpperCase(),
                'sex_pac': sexo,
                'fnac_pac': fechanacimiento,
                'appat_pac': apepaterno.toUpperCase(),
                'apmat_pac': apematerno.toUpperCase(),
                'correo_pac': correo, 
                'id_doc_id': tipodocumento,
                'num_doc_id': nrodocumento,
                'cel_pac': cel_pac,
                'direcciones' : direcciones,
                'nom_pac' : nombres.toUpperCase(),
            }
            // let urldata = '<?php echo base_url() ?>Persona/insertPersona?nom_com='+nombres+'&sex_pac='+sexo+'&fnac_pac='+fechanacimiento+'&appat_pac='+apepaterno+'&apmat_pac='+apematerno+'&correo_pac='+correo+'&id_doc_id='+tipodocumento+'&num_doc_id='+nrodocumento+'&cel_pac='+cel_pac;
            let urldata = '<?php echo base_url() ?>Paciente/insertPersona';

            jQuery.ajax({
                url: urldata,
                async: true,
                data: { 'datapersona' : data },
                type: 'POST',
                success: function (response) {
                    var data = JSON.parse(response);
                    if(data.success)
                    {
                        $('#nuevo_paciente').modal('hide');
                        var datapacientejson = JSON.stringify(data.data);
                        $('#nuevo_paciente_json').val(datapacientejson);
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
        });
    });
    function configurarUbigeo(){
        let urldata = '<?php echo base_url() ?>Ubigeo/getUbigeos?search={term}';
        let ubigeos = [];
        const autoCompleteConfig = [{
            name: 'Seleccione un ubigeo',
            debounceMS: 250,
            minLength: 2,
            maxResults: -1,
            inputSource: document.getElementById('pac_ubigeo'),
            targetID: document.getElementById('pac_ubigeoid'),
            fetchURL: urldata,
            fetchMap: {
                id: "id",
                name: "text"
            }
        }];
        autocompleteBS(autoCompleteConfig);
        function resultHandlerBS(inputName, selectedData) {
            console.log(inputName);
            console.log(selectedData);
            document.getElementById('pac_ubigeo').value=selectedData.id;
        }
    }

    function adddireccion(){
        if ( !validardireccion() ) { return false; }
        let boton = $('#pac_btnAddDireccion').val();
        var tabla = $('#per_direcciones');
        if(boton == 'Grabar cambio'){
            tabla.DataTable().cell({row: indextabledireccion, column: 0}).data($('#pac_ubigeoid').val());
            tabla.DataTable().cell({row: indextabledireccion, column: 1}).data($('#pac_ubigeo').val());
            tabla.DataTable().cell({row: indextabledireccion, column: 2}).data($('#pac_direccion').val().toUpperCase());
            tabla.DataTable().cell({row: indextabledireccion, column: 3}).data($('#pac_referencia').val().toUpperCase());
            tabla.DataTable().cell({row: indextabledireccion, column: 4}).data($('#pac_tlfcasa').val());
            tabla.DataTable().cell({row: indextabledireccion, column: 5}).data($('#pac_tlftrabajo').val());
            tabla.DataTable().cell({row: indextabledireccion, column: 6}).data($('#pac_tlftrabajoanexo').val());
            $('#pac_btnAddDireccion').val('Agregar dirección');
        }
        else{
            tabla.DataTable().row.add( [
                $('#pac_ubigeoid').val(),
                $('#pac_ubigeo').val(),
                $('#pac_direccion').val().toUpperCase(),
                $('#pac_referencia').val().toUpperCase(),
                $('#pac_tlfcasa').val(),
                $('#pac_tlftrabajo').val(),
                $('#pac_tlftrabajoanexo').val(),
                '<button id="per_direccionedit" class="btn btn-primary" type="button"><i class="fas fa-edit"></i></button>'
                +'<button id="per_direcciondelete" class="btn btn-danger" type="button"><i class="fas fa-trash"></i></button>'
            ] ).draw( false );
        }
        $('#form_direcciones')[0].reset();
    }
    function seteditdireccion(data, index){
        indextabledireccion = index;
        $('#pac_ubigeoid').val(data[0]);
        $('#pac_ubigeo').val(data[1]);
        $('#pac_direccion').val(data[2]);
        $('#pac_referencia').val(data[3]);
        $('#pac_tlfcasa').val(data[4]);
        $('#pac_tlftrabajo').val(data[5]);
        $('#pac_tlftrabajoanexo').val(data[6]);

        $('#pac_btnAddDireccion').val('Grabar cambio');
    }

    function validardireccion(){
        var errores = [];
        if($('#pac_ubigeoid').val() == '') errores.push('Ingrese un UBIGEO valido');
        if($('#pac_direccion').val() == '') errores.push('Ingrese una DIRECCIÓN');
        if($('#pac_referencia').val() == '') errores.push('Ingrese una REFERENCIA');
        if(errores.length>0)
        {
            $('#nuevo_paciente').modal('hide');
            Swal.fire({
                icon: 'warning',
                title: errores.join('\n'),
                showConfirmButton: false,
                timer: 1500
            }).then((value) => {
                $('#nuevo_paciente').modal('show');
            });
            //window.alert(errores.join('\n'));
            return false;
        }
        else return true;
    }
    function validardatospersona(){
        var errores = [];
        if($('#pac_ape_paterno').val() == '') errores.push('Ingrese APELLIDO PATERNO');
        if($('#pac_ape_materno').val() == '') errores.push('Ingrese APELLIDO MATERNO');
        if($('#pac_nombres').val() == '') errores.push('Ingrese NOMBRES');
        if($('#pac_fecha_nacimiento').val() == '') {errores.push('Ingrese FECHA DE NACIMIENTO');}
        else{
            if(fnIsNewerThanToday( document.getElementById('pac_fecha_nacimiento') )){
                errores.push('Fecha nacimiento debe ser menor que fecha actual');
            }
        }
        if($('#pac_tipo_documento').val() == '') { errores.push('Ingrese TIPO DOCUMENTO'); }
        else{
            if( $('#pac_tipo_documento').val() == 2 && $('#pac_nro_documento').val().length != 8 ){ errores.push('Verifique el nro de dígitos del documento');}
            else if($('#pac_tipo_documento').val() == 3 && $('#pac_nro_documento').val().length != 9){ errores.push('Verifique el nro de dígitos del documento');}
            else if( $('#pac_nro_documento').val().length > 15 ){ errores.push('Verifique el nro de dígitos del documento'); }
            
        }
        if($('#pac_nro_documento').val() == '') errores.push('Ingrese NRO DOCUMENTO');
        if($('#pac_sexo').val() == '') errores.push('Ingrese GÉNERO');
        if( $('#per_direcciones').DataTable().rows().count() == 0 ) errores.push('Ingrese al menos una DIRECCION');
        if(errores.length>0)
        {
            $('#nuevo_paciente').modal('hide');
            Swal.fire({
                icon: 'warning',
                title: errores.join('\n'),
                showConfirmButton: false,
                timer: 1500
            }).then((value) => {
                $('#nuevo_paciente').modal('show');
            });
            
            //window.alert(errores.join('\n'));
            return false;
        }
        else return true;
    }

    function limitarcaracteres(){
        var tipodoc = $('#pac_tipo_documento').val();
        fnLimitText( document.getElementById('pac_nro_documento'), tipodoc=='2'?8:15 );
    }

</script>