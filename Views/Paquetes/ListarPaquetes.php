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
                                <li class="offset-5"><h6 class="title text-white text-center"> LISTA DE PAQUETES</h6></li>
                            </ol>
                        </nav>
                        <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label for="paquete_nombre">Nombre</label>
                                        <input class="form-control" type="text" id="paquete_nombre" name="paquete_nombre" placeholder="Nombre del paquete">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="paquete_estado">Estado</label>
                                        <select id="paquete_estado" class="form-control" name="paquete_estado">
                                            <option value="1">Sólo activos</option>
                                            <option value="0">Sólo inactivos</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <div class="card-footer">
                            <div class="col-lg-6 mb-2">
                                <button class="btn btn-primary" type="submit" id="paquete_btnBuscar"><i class="fas fa-search"></i> Buscar</button>
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#nuevo_paquete"><i class="fas fa-plus-circle"></i> Nuevo paquete</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive mt-4">
                        <table class="table table-hover table-bordered" id="paquetes_table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Activo</th>
                                    <th>Precio Regular</th>
                                    <th>Categoría</th>
                                    <th>Creación</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div id="nuevo_paquete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Nuevo Paquete</h5>
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

<div id="paquete_atributo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Asignación de Atributos a Paquete</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div>
                <div class="modal-body">
                <div class="table-responsive mt-4">
                        <table class="table table-hover table-bordered" id="atributo_table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Tarifa</th>
                                    <th>Fórmula</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit" id="btn_atributo_asignar"><i class="fas fa-save"></i> Guardar cambios</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="paquete_servicio" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Asignación de Servicios del Paquete</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div>
                <div class="modal-body">
                <div class="table-responsive mt-4">
                        <table class="table table-hover table-bordered" id="servicio_table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Cantidad</th>
                                    <!-- <th></th> -->
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit" id="btn_servicio_asignar"><i class="fas fa-save"></i> Guardar cambios</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php pie() ?>

<script>
    let id_entidad = 0
    $(document).ready(function() {
        let paggerTotal = 0;let paggerPage = 0;
        let urldata = ''
        $('#paquete_btnBuscar').on('click', function(event) {
            event.preventDefault();
            listarPaquetes();
        })

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
                            // listarPaquetes()
                            window.location.reload()
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

        listarPaquetes()

        listarCategorias()

        $('#btn_atributo_asignar').on('click', function(event) {
            event.preventDefault();

            let atributos = []
            $('input[type=checkbox]:checked').each(function (data) {
                if( ! $(this).attr('id').startsWith('atributo_') ) return
                atributos.push( { 'id_atributo' : parseInt($(this).attr('id').replace('atributo_', '')) } )
            })
            
            let urldata = '<?php echo base_url() ?>Paquetes/AsignarAtributo'
            let data = { "id_entidad": id_entidad,"tipo" : 1, "atributos" : atributos }

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
                            title: 'Se han asignado los atributos al paquete exitosamente',
                            showConfirmButton: false,
                            timer: 3000
                        }).then((value) => {
                            listarAtributos()
                        })
                    }else{
                        showSwalMessage('error', ['Hubieron errores en la operación'])
                        // Swal.fire({
                        //     icon: 'error',
                        //     title: 'Hubieron errores en la operación',
                        //     showConfirmButton: false
                        // })
                    }
                },
                error: function(err){
                    showSwalMessage('error', ['Hubieron errores en la operación'])
                }
            }).then(()=>{
                process(false);
            })
        });
        $('#btn_servicio_asignar').on('click', function(event) {
            event.preventDefault();

            let servicios = []
            $('#servicio_table input[type=number]').each(function (data) {
                if( ! $(this).attr('id').startsWith('servicio_') ) return
                if( $(this).val() != '' &&  parseInt($(this).val()) > 0 ){
                    servicios.push( { 'id_servicio' : parseInt($(this).attr('id').replace('servicio_', '')), 'cantidad' : parseInt($(this).val()) } )
                }
            })
            
            let urldata = '<?php echo base_url() ?>Paquetes/AsignarServicio'
            let data = { "id_paquete": id_entidad, "servicios" : servicios }

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
                            title: 'Se han asignado los servicios al paquete exitosamente',
                            showConfirmButton: false,
                            timer: 3000
                        }).then((value) => {
                            listarServicios()
                        })
                    }else{
                        showSwalMessage('error', ['Hubieron errores en la operación'])
                    }
                },
                error: function(err){
                    showSwalMessage('error', ['Hubieron errores en la operación'])
                }
            }).then(()=>{
                process(false);
            })
        });

        jQuery('#paquetes_table tbody').on('click', 'button', function () {
            var data = jQuery('#paquetes_table').DataTable().row(jQuery(this).parents('tr')).data();
            if(jQuery(this)[0].id == 'paquetes_table_remove'){
                eliminarPaquete(data.id)
            }
        })
        
    } );

    function listarPaquetes() {            
        let estado = $('#paquete_estado').val();
        let nombre = $('#paquete_nombre').val();
        
        urldata = '<?php echo base_url() ?>Paquetes/Buscar?paquete_estado='+estado+'&paquete_nombre='+nombre;

        process(true);
        
        let tablaH = jQuery('#paquetes_table');
        tablaH.DataTable().clear();
        tablaH.DataTable().destroy();
        tablaH.DataTable( {
            retrieve: true,
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
                { "data": "nombre" },
                { "data": "descripcion" },
                { "data": "activo" },
                { "data": "precio_regular" },
                {
                    "data": null,
                    "render": function ( data, type, row, meta ) {
                        return (data.categoria?data.categoria.descripcion:'');
                    }
                },
                {
                    "data": null,
                    "render": function ( data, type, row, meta ) {
                        return fnConvertDate(data.created_at);
                    }
                },
                {
                    "data": null,
                    "render": function ( data, type, row, meta ) {
                        if(data.activo != 0){
                            return '<button id="paquetes_table_remove" class="btn btn-danger" type="button" title="Eliminar"><i class="fas fa-trash-alt"></i></button>&nbsp;'+
                            '<button id="paquetes_table_atributo" onclick="gestion_atributos('+(row.id).toString()+')" class="btn btn-warning" type="button" title="Ver Atributos"><i class="fas fa-table"></i></button>&nbsp;<button id="paquetes_table_servicio" onclick="gestion_servicios('+(row.id).toString()+')" class="btn btn-warning" type="button" title="Ver Servicios"><i class="fa fa-rocket"></i></button>';
                        }else{
                            return ''
                        }
                    }
                }
            ],
            "preDrawCallback": function(data){
                process(false);
            },
        });
        // tablaH.DataTable().page(2).draw('page');           
        process(false)
    }
    function gestion_atributos(idPaquete){
        id_entidad = idPaquete
        $('#paquete_atributo').modal('show')
        listarAtributos()
    }
    function listarAtributos() {
        
        urldata = '<?php echo base_url() ?>Paquetes/BuscarAtributosAsignados?tipo=1&id='+id_entidad;

        process(true);
        
        let tablaH = jQuery('#atributo_table');
        tablaH.DataTable().clear();
        tablaH.DataTable().destroy();
        tablaH.DataTable( {
            retrieve: true,
            processing: true,
            serverSide: true,
            bFilter: false,
            language: global_tablelanguage,
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
                { "data": "nombre" },
                { "data": "descripcion" },
                { "data": "tarifa" },
                {
                    "data": null,
                    "render": function ( data, type, row, meta ) {
                        return data.formula_key + data.formula_condition + data.formula_value;
                    }
                },
                {
                    "data": null,
                    "render": function ( data, type, row, meta ) {
                        let selected = (row.detalle_id!=0?'checked':'')
                        return '<input id="atributo_'+ row.id +'" type="checkbox" '+selected+' class="form-control">';
                    }
                }
            ],
            "preDrawCallback": function(data){
                process(false);
            },
        });
        process(false)
    }
    function listarCategorias() {
        
        urldata = '<?php echo base_url() ?>Paquetes/BuscarCategoria?categoria_activo=1';

        $.ajax({
            url: urldata,
            async: false,
            type: 'GET',
            success: function (response) {
                var data = JSON.parse(response).data;
                $.each(data.data, function(index, value) {
                    $('#paquete_new_categoria').append( $('<option />').val(value.id).text(value.descripcion+' ('+value.nombre+')') );
                });
            },
            error: function (err) {
                window.alert('ERROR HTML: ' + err.getMessage());
            },
            finally: function(){
            }
        });

    }

    function gestion_servicios(idPaquete){
        id_entidad = idPaquete
        $('#paquete_servicio').modal('show')
        listarServicios()
    }
    function listarServicios() {
        
        urldata = '<?php echo base_url() ?>Paquetes/BuscarServiciosAsignados?id='+id_entidad;

        process(true);
        
        let tablaH = jQuery('#servicio_table');
        tablaH.DataTable().clear();
        tablaH.DataTable().destroy();
        tablaH.DataTable( {
            retrieve: true,
            processing: true,
            serverSide: true,
            bFilter: false,
            language: global_tablelanguage,
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
                { "data": "nombre" },
                { "data": "descripcion" },
                {
                    "data": null,
                    "render": function ( data, type, row, meta ) {
                        return '<input id="servicio_'+ row.id +'" type="number" class="form-control" oninput="fnInputNumber(this, 1)" min="1" value="'+ row.cantidad +'" >';
                    }
                },
                // {
                //     "data": null,
                //     "render": function ( data, type, row, meta ) {
                //         let selected = (row.detalle_id!=0?'checked':'')
                //         return '<input id="atributo_'+ row.id +'" type="checkbox" '+selected+' class="form-control">';
                //     }
                // }
            ],
            "preDrawCallback": function(data){
                process(false);
            },
        });
        process(false)
    }

    function eliminarPaquete(id){
        let urldata = '<?php echo base_url() ?>Paquetes/DeletePaquete'
        let data = { "id" : id }

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
                        title: 'Se ha eliminado el paquete exitosamente',
                        showConfirmButton: false,
                        timer: 3000
                    }).then((value) => {
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
    }
</script>