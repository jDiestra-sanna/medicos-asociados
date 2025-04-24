<?php encabezado() ?>
<!-- <?php var_dump(json_encode($data)); ?> -->

<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <form method="post" action="/Paquetes/Listar" autocomplete="off">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-primary">
                                <li class="offset-5"><h6 class="title text-white text-center"> LISTA DE SOLICITUDES</h6></li>
                            </ol>
                        </nav>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-2">
                                    <label for="soli_apellidos">Apellidos</label>
                                    <input class="form-control" type="text" id="soli_apellidos" name="soli_apellidos" placeholder="">
                                </div>
                                <div class="col-lg-2">
                                    <label for="soli_nombres">Nombres</label>
                                    <input class="form-control" type="text" id="soli_nombres" name="soli_nombres" placeholder="">
                                </div>
                                <div class="col-lg-1">
                                    <label for="soli_nro_solicitud">Nro Solicitud</label>
                                    <input class="form-control" type="text" id="soli_nro_solicitud" name="soli_nro_solicitud" placeholder="Nro Solicitud">
                                </div>
                                <div class="col-lg-2">
                                    <label for="soli_nro_estado">Estado</label>
                                    <select id="soli_nro_estado" class="form-control" name="soli_nro_estado">
                                        <option value="-1">Todos</option>
                                        <option value="1">Pendientes</option>
                                        <option value="2">Vigentes</option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <label for="soli_tipodoc">TipDocumento</label>
                                    <select id="soli_tipodoc" class="form-control" name="soli_tipodoc">
                                        <option value="-1">Todos</option>
                                        <option value="dni">DNI</option>
                                        <option value="carnet">CARNET EXTRANJERIA</option>
                                        <option value="pasaporte">PASAPORTE</option>
                                    </select>
                                </div>
                                <div class="col-lg-1">
                                    <label for="soli_nrodocumento">NroDocumento</label>
                                    <input class="form-control" type="text" id="soli_nrodocumento" name="soli_nrodocumento" placeholder="10101010">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <label for="soli_fecha_inicio">Fecha Inicio</label>
                                    <input class="form-control" type="date" id="soli_fecha_inicio" name="soli_fecha_inicio" placeholder="">
                                </div>
                                <div class="col-lg-2">
                                    <label for="soli_fecha_fin">Fecha fin</label>
                                    <input class="form-control" type="date" id="soli_fecha_fin" name="soli_fecha_fin" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="col-lg-6 mb-2">
                                <button class="btn btn-primary" type="submit" id="soli_btnBuscar"><i class="fas fa-search"></i> Buscar</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive mt-4">
                        <ul class="nav nav-tabs tab" id="soli_beneficiarios">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#soli_tab_beneficiarios">Beneficiarios</a>
                            </li>
                            <li class="nav-item">
                                <a id="tabsolicitudes" class="nav-link" href="#soli_tab_solicitudes">Solicitudes</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="soli_tab_beneficiarios" role="tabpanel" aria-labelledby="datos-tab">
                                <div class="modal-body">
                                    <div class="row">
                                        <button class="btn btn-primary col-lg-2" type="button" id="med_exportar" onclick="downloadExcel()" ><i class="fas fa-file-excel"></i> Exportar</button>                            
                                    </div>
                                    <table class="table table-hover table-bordered" id="soli_table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Id Beneficiario</th>
                                                <th>NroSolicitud</th>
                                                <th>Fec.Registro</th>
                                                <th>Paquete</th>
                                                <th>Cat. Paquete</th>
                                                <th>Tipo Doc</th>
                                                <th>N° Doc</th>
                                                <th>Paciente</th>
                                                <th>Correo</th>
                                                <th>Teléfono</th>
                                                <th>Estado</th>
                                                <th>Creación</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="soli_tab_solicitudes" role="tabpanel" aria-labelledby="datos-tab">
                                <div class="modal-body">
                                    <div class="row">
                                        <button class="btn btn-primary col-lg-2" type="button" id="med_exportar" onclick="downloadExcelSolicitud()" ><i class="fas fa-file-excel"></i> Exportar</button>                            
                                    </div>
                                    <table class="table table-hover table-bordered" id="soli_soli_table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Id Solicitud</th>
                                                <th>NroSolicitud</th>
                                                <th>Fec.Trans</th>
                                                <th>Tipo Doc</th>
                                                <th>N° Doc</th>
                                                <th>Nombres Apellidos</th>
                                                <th>Tipo Comprobante</th>
                                                <th>Total</th>
                                                <th>Forma Pago</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div id="modal_atenciones" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Atenciones</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="paquete_new_nombre">Nombre</label>
                        <input id="paquete_new_nombre" class="form-control" type="text" name="paquete_new_nombre" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="paquete_new_descripcion">Descripción</label>
                        <input id="paquete_new_descripcion" class="form-control" type="text" name="paquete_new_descripcion" placeholder="Descripción">
                    </div>
                    <div class="form-group">
                        <label for="paquete_new_categoria">Categoría</label>
                        <select id="paquete_new_categoria" class="form-control" name="paquete_new_categoria">
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="paquete_new_precio_regular" >Precio regular</label>
                        </div>
                        <div class="col">
                            <label for="paquete_new_precio_rebajado" >Precio rebajado</label>
                        </div>                        
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <input id="paquete_new_precio_regular" class="form-control" type="number" step="0.01" name="paquete_new_precio_regular" placeholder="###.##" oninput="fnInputDecimal(this,0)">
                        </div>
                        <div class="col">
                            <input id="paquete_new_precio_rebajado" class="form-control" type="number" step="0.01" name="paquete_new_precio_rebajado" placeholder="###.##" oninput="fnInputDecimal(this,0)">
                        </div>                        
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit" id="paquete_new_registrar"><i class="fas fa-save"></i> Registrar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modal_pagos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Pagos</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col">
                            <label for="pago_nombre">Nombres y Apellidos</label>
                        </div>
                        <div class="col">
                            <label for="pago_razonsocial">Razón Social</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <input id="pago_nombre" class="form-control" type="text" name="pago_nombre" placeholder="Nombres y Apellidos">
                        </div>
                        <div class="col">
                            <input id="pago_razonsocial" class="form-control" type="text" name="pago_razonsocial" placeholder="Razón Social">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="pago_direccion">Dirección</label>
                        </div>
                        <div class="col">
                            <label for="pago_estado">Estado</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <input id="pago_direccion" class="form-control" type="text" name="pago_direccion" placeholder="Dirección">
                        </div>
                        <div class="col">
                            <input id="pago_estado" class="form-control" type="text" name="pago_estado" placeholder="Estado">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-hover table-bordered" id="soli_pagos">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Fech Transacción</th>
                                        <th>Hora Transacción</th>
                                        <th>Pagante</th>
                                        <th>Tip Comprobante</th>
                                        <th>Tipo Documento</th>
                                        <th>Nro Documento</th>
                                        <th>Total</th>
                                        <th>Info Transacción</th>
                                        <!-- <th>Comprobante</th> -->
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php pie() ?>

<script>
    let id_beneficiario = 0
    let id_solicitud = 0

    $(document).ready(function() {
        $('#soli_fecha_inicio').val( fnCurrentDate() );
        $('#soli_fecha_fin').val( fnCurrentDate() );

        let paggerTotal = 0;let paggerPage = 0;
        let urldata = ''
        $('#soli_btnBuscar').on('click', function(event) {
            event.preventDefault();
            listarBeneficiarios()
            listarSolicitudes()
        })

        function listarBeneficiarios() {
            let apellidos = $('#soli_apellidos').val();
            let nombres = $('#soli_nombres').val();
            let nrosolicitud = $('#soli_nro_solicitud').val();
            let estado = $('#soli_nro_estado').val();
            let fechaini = $('#soli_fecha_inicio').val();
            let fechafin = $('#soli_fecha_fin').val();
            let nrodocumento = $('#soli_nrodocumento').val();
            let tipodoc = $('#soli_tipodoc').val();            
            
            urldata = '<?php echo base_url() ?>Paquetes/BuscarBeneficiarios?soli_apellidos='+apellidos+'&soli_nombres='+nombres+'&soli_nrosolicitud='+nrosolicitud+'&soli_estado='+estado+'&soli_fechaini='+fechaini+'&soli_fechafin='+fechafin+'&soli_tipodoc='+tipodoc+'&soli_nrodocumento='+nrodocumento;

            process(true);
            
            let tablaH = jQuery('#soli_table');
            tablaH.DataTable().clear();
            tablaH.DataTable().destroy();
            tablaH.DataTable( {
                retrieve: true,
                bFilter: false,
                processing: true,
                serverSide: true,
                bFilter: false,
                language: global_tablelanguage,
                select: {
                    style: 'single'
                },
                lengthMenu: [10, 20, 50, "All"],
                ajax: {
                    url: urldata,
                    type: 'GET',
                    dataType: 'json',
                    data: function(data) {
                        var page = (data.start / data.length) + 1;
                        data.page = page-1;
                        data.per_page = data.length;
                        data.draw = page-1;
                    },
                    dataFilter: function(data){
                        var json = jQuery.parseJSON( data );
                        return JSON.stringify( json.data ); // return JSON string
                    }
                }, 
                columns: [
                    { "data": "id" },
                    { "data": "nro_solicitud" },
                    {
                        "data": null,
                        "render": function ( data, type, row, meta ) {
                            return fnConvertDate(data.bene_creacion);
                        }
                    },
                    { "data": "paquete_nombre" },
                    { "data": "cat_nombre" },                    
                    { "data": "tipodoc" },
                    { "data": "nrodocumento" },
                    {
                        "data": null,
                        "render": function ( data, type, row, meta ) {
                            return (data.nombres + ' ' + data.apellidos);
                        }
                    },
                    { "data": "email" },
                    { "data": "telefono" },
                    {
                        "data": null,
                        "render": function ( data, type, row, meta ) {
                            return (data.solicitud_estado==1?'Pendiente':(data.solicitud_estado==2?'Vigente':''));
                        }
                    },
                    { "data": "bene_creacion" },
                    {
                        "data": null,
                        "render": function ( data, type, row, meta ) {
                            return '<div class="text-center"><button id="beneficiario_atenciones" onclick="ver_atenciones('+(row.id).toString()+')" class="btn btn-warning" type="button" title="Ver Atenciones"><i class="fas fa-ambulance"></i></button></div>';
                        }
                    }
                ],
                "preDrawCallback": function(data){
                    $('#soli_table').width('100%')
                    process(false);
                },
            });
            // tablaH.DataTable().page(2).draw('page');           
            process(false)
        }
        function listarSolicitudes() {            
            let apellidos = $('#soli_apellidos').val();
            let nombres = $('#soli_nombres').val();
            let nrosolicitud = $('#soli_nro_solicitud').val();
            let estado = $('#soli_nro_estado').val();
            let fechaini = $('#soli_fecha_inicio').val();
            let fechafin = $('#soli_fecha_fin').val();
            let nrodocumento = $('#soli_nrodocumento').val();
            let tipodoc = $('#soli_tipodoc').val();            
            
            urldata = '<?php echo base_url() ?>Paquetes/BuscarSolicitud?soli_apellidos='+apellidos+'&soli_nombres='+nombres+'&soli_nrosolicitud='+nrosolicitud+'&soli_estado='+estado+'&soli_fechaini='+fechaini+'&soli_fechafin='+fechafin+'&soli_tipodoc='+tipodoc+'&soli_nrodocumento='+nrodocumento;

            process(true);
            
            let tablaH = jQuery('#soli_soli_table');
            tablaH.DataTable().clear();
            tablaH.DataTable().destroy();
            tablaH.DataTable( {
                retrieve: true,
                bFilter: false,
                processing: true,
                serverSide: true,
                bFilter: false,
                language: global_tablelanguage,
                select: {
                    style: 'single'
                },
                lengthMenu: [10, 20, 50, "All"],
                ajax: {
                    url: urldata,
                    type: 'GET',
                    dataType: 'json',
                    data: function(data) {
                        var page = (data.start / data.length) + 1;
                        data.page = page-1;
                        data.per_page = data.length;
                        data.draw = page-1;
                    },
                    dataFilter: function(data){
                        var json = jQuery.parseJSON( data );
                        return JSON.stringify( json.data ); // return JSON string
                    }
                },
                columns: [
                    { "data": "id" },
                    { "data": "nro_solicitud" },
                    {
                        "data": null,
                        "render": function ( data, type, row, meta ) {
                            return fnConvertDate(data.updated_at) + ' ' + fnConvertTime(data.updated_at);
                        }
                    },                
                    { "data": "tipodoc" },
                    { "data": "nrodocumento" },
                    {
                        "data": null,
                        "render": function ( data, type, row, meta ) {
                            return (data.tipo_comprobante=='2'?data.nombres + ' ' + data.apellidos:data.razon_social);
                        }
                    },
                    {
                        "data": null,
                        "render": function ( data, type, row, meta ) {
                            return (data.tipo_comprobante=='2'?'BOLETA':'FACTURA');
                        }
                    },
                    { "data": "total" },
                    { "data": "formapago" },
                    {
                        "data": null,
                        "render": function ( data, type, row, meta ) {
                            return (data.solicitud_estado==1?'Pendiente':(data.solicitud_estado==2?'Vigente':''));
                        }
                    },
                    {
                        "data": null,
                        "render": function ( data, type, row, meta ) {
                            return '<div class="text-center"><button id="solicitud_pagos" class="btn btn-success" type="button" title="Ver Pagos"><i class="fas fa-money-bill"></i></button></div>';
                        }
                    }
                ],
                "preDrawCallback": function(data){
                    $('#soli_soli_table').width('100%')
                    process(false);
                },
            });
            // tablaH.DataTable().page(2).draw('page');           
            process(false)
        }

        $('#paquete_new_registrar').on('click', function(event) {
            event.preventDefault();

            let nombre = $('#paquete_new_nombre').val();
            let descripcion = $('#paquete_new_descripcion').val();
            let precio_regular = $('#paquete_new_precio_regular').val();
            let precio_rebajado = $('#paquete_new_precio_rebajado').val();
            let categoria = $('#paquete_new_categoria').val()

            let urldata = '<?php echo base_url() ?>Paquetes/Crear'
            let data = { "paquete_nombre" : nombre, "paquete_descripcion" : descripcion, "paquete_precio_regular" : precio_regular, "paquete_precio_rebajado" : precio_rebajado, "id_categoria": categoria }

            process(true);
            jQuery.ajax({
                url: urldata,
                async: false,
                type: 'POST',
                data: data,
                success: function (response) {
                    response = JSON.parse(response)
                    if(response.success){
                        Swal.fire({
                            icon: 'success',
                            title: 'Se ha creado el paquete exitosamente',
                            showConfirmButton: false,
                            timer: 3000
                        }).then((value) => {
                            $('#nuevo_paquete').hide()
                            $('.modal-backdrop').remove();
                            listarPaquetes()
                        })
                    }                    
                },
                error: function(err){
                    console.log(err);
                    Swal.fire({
                        icon: 'error',
                        title: 'Hubieron errores en la operación',
                        showConfirmButton: false
                    })
                }
            }).then(()=>{
                process(false);
            })
        });

        listarBeneficiarios()
        listarSolicitudes()

        $("#soli_beneficiarios a").click(function(e){
            e.preventDefault();
            $('#soli_beneficiarios').removeClass("active").removeClass("show");
            $('#soli_beneficiarios').removeClass("active").removeClass("show");
            $(this).tab("show");
        });

        jQuery('#soli_soli_table tbody').on('click', 'button', function () {
            var data = jQuery('#soli_soli_table').DataTable().row(jQuery(this).parents('tr')).data();
            if(jQuery(this)[0].id == 'solicitud_pagos'){
                let estados_solicitud = ['Pendiente', 'Activa', 'Inactiva']
                $('#pago_nombre').val(data.nombres+' '+data.apellidos)
                $('#pago_razonsocial').val(data.razon_social)
                $('#pago_direccion').val(data.direccion)
                $('#pago_estado').val(estados_solicitud[data.solicitud_estado-1])

                let tabla = $('#soli_pagos');
                tabla.DataTable().clear();
                tabla.DataTable().destroy();
                tabla.DataTable( {
                    data: data.pagos,
                    select: {
                        style: 'single'
                    },
                    columns: [
                        {
                        "data": null,
                        "render": function ( data, type, row, meta ) {
                            return fnConvertDate(data.created_at);
                            }
                        },
                        {
                        "data": null,
                        "render": function ( data, type, row, meta ) {
                            return fnConvertTime(data.created_at);
                            }
                        },
                        {
                        "data": null,
                        "render": function ( data, type, row, meta ) {
                            return (data.tipo_comprobante=='2'?data.nombres + ' ' + data.apellidos:data.razon_social);
                            }
                        },
                        { "data": "tipo_comprobante" },
                        { "data": "tipodoc" },
                        { "data": "nrodocumento" },
                        { "data": "total" },
                        {
                        "data": null,
                        "render": function ( data, type, row, meta ) {
                            // return data.infotransaccion.substring(0,30);
                            return data.infotransaccion.split('|').join('<br/>')
                            // return data.infotransaccion;
                            }
                        },
                        // { "data": "url_comprobante" },
                        {
                        "data": null,
                        "render": function ( data, type, row, meta ) {
                            return (data.estado=='1'?'PENDIENTE':'PAGADO');
                            }
                        }                        
                    ],
                    "preDrawCallback": function(data){
                        // $('#soli_pagos').width('100%')
                    }
                });
                $('#modal_pagos').modal('show')
            }
            return false;
        });

    } );

    function downloadExcel(){
        let apellidos = $('#soli_apellidos').val();
        let nombres = $('#soli_nombres').val();
        let nrosolicitud = $('#soli_nro_solicitud').val();
        let estado = $('#soli_nro_estado').val();
        let fechaini = $('#soli_fecha_inicio').val();
        let fechafin = $('#soli_fecha_fin').val();
        let nrodocumento = $('#soli_nrodocumento').val();
        let tipodoc = $('#soli_tipodoc').val();
            
        let urldata = '<?php echo base_url() ?>Paquetes/BuscarBeneficiariosExporta?soli_apellidos='+apellidos+'&soli_nombres='+nombres+'&soli_nrosolicitud='+nrosolicitud+'&soli_estado='+estado+'&soli_fechaini='+fechaini+'&soli_fechafin='+fechafin+'&soli_tipodoc='+tipodoc+'&soli_nrodocumento='+nrodocumento;
        
        $.ajax({
            url: urldata,
            async: false,
            type: 'GET',
            beforeSend: function(){
                process(true)
            },
            success: function (response) {
                validatesession(response)
                datos = JSONsanna.parse(response);
                JSONToCSVConvertor(datos.data, 'Reporte de Beneficiarios', true)
            },
            complete: function(){
                process(false)
            }
        })
    }
    function downloadExcelSolicitud(){
        let apellidos = $('#soli_apellidos').val();
        let nombres = $('#soli_nombres').val();
        let nrosolicitud = $('#soli_nro_solicitud').val();
        let estado = $('#soli_nro_estado').val();
        let fechaini = $('#soli_fecha_inicio').val();
        let fechafin = $('#soli_fecha_fin').val();
        let nrodocumento = $('#soli_nrodocumento').val();
        let tipodoc = $('#soli_tipodoc').val();
            
        let urldata = '<?php echo base_url() ?>Paquetes/BuscarSolicitudExporta?soli_apellidos='+apellidos+'&soli_nombres='+nombres+'&soli_nrosolicitud='+nrosolicitud+'&soli_estado='+estado+'&soli_fechaini='+fechaini+'&soli_fechafin='+fechafin+'&soli_tipodoc='+tipodoc+'&soli_nrodocumento='+nrodocumento;
        
        $.ajax({
            url: urldata,
            async: false,
            type: 'GET',
            beforeSend: function(){
                process(true)
            },
            success: function (response) {
                validatesession(response)
                datos = JSONsanna.parse(response);
                JSONToCSVConvertor(datos.data, 'Reporte de Solicitudes', true)
            },
            complete: function(){
                process(false)
            }
        })
    }

    function ver_atenciones(idBeneficiario){
        id_beneficiario = idBeneficiario
        $('#modal_atenciones').modal('show')
    }

</script>