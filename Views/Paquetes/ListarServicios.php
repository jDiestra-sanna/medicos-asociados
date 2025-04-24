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
                                <li class="offset-5"><h6 class="title text-white text-center"> LISTA DE SERVICIOS</h6></li>
                            </ol>
                        </nav>
                        <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label for="servicio_nombre">Nombre</label>
                                        <input class="form-control" type="text" id="servicio_nombre" name="servicio_nombre" placeholder="Nombre del servicio">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="servicio_estado">Estado</label>
                                        <select id="servicio_estado" class="form-control" name="servicio_estado">
                                            <option value="1">Sólo activos</option>
                                            <option value="0">Sólo inactivos</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <div class="card-footer">
                            <div class="col-lg-6 mb-2">
                                <button class="btn btn-primary" type="submit" id="servicio_btnBuscar"><i class="fas fa-search"></i> Buscar</button>
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#nuevo_servicio"><i class="fas fa-plus-circle"></i> Nuevo servicio</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive mt-4">
                        <table class="table table-hover table-bordered" id="servicio_table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Activo</th>
                                    <th>Precio Regular</th>
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
<div id="nuevo_servicio" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Nuevo Servicio</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="servicio_new_nombre">Nombre</label>
                        <input id="servicio_new_nombre" class="form-control" type="text" name="servicio_new_nombre" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="servicio_new_descripcion">Descripción</label>
                        <input id="servicio_new_descripcion" class="form-control" type="text" name="servicio_new_descripcion" placeholder="Descripción">
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="servicio_new_precio_regular" >Precio regular</label>
                        </div>
                        <div class="col">
                            <label for="servicio_new_precio_rebajado" >Precio rebajado</label>
                        </div>                        
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <input id="servicio_new_precio_regular" class="form-control" type="number" step="0.01" name="servicio_new_precio_regular" placeholder="###.##" oninput="fnInputDecimal(this,0)">
                        </div>
                        <div class="col">
                            <input id="servicio_new_precio_rebajado" class="form-control" type="text" step="0.01" name="servicio_new_precio_rebajado" placeholder="###.##" oninput="fnInputDecimal(this,0)">
                        </div>                        
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit" id="servicio_new_registrar"><i class="fas fa-save"></i> Registrar</button>
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
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Asignación de Atributos a Servicio</h5>
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
<?php pie() ?>

<script>
    $(document).ready(function() {
        $('#servicio_btnBuscar').on('click', function(event) {
            event.preventDefault();
            listarServicios();
        })

        /*
        function listarServicios() {            
            let estado = $('#servicio_estado').val();
            let nombre = $('#servicio_nombre').val();
            let info = $('#servicio_table').DataTable().page.info();

            let urldata = '<?php echo base_url() ?>Paquetes/BuscarServicios?servicio_estado='+estado+'&servicio_nombre='+nombre+'&records='+info.recordsTotal+'&page='+info.page;
            
            process(true);
            jQuery.ajax({
                url: urldata,
                async: true,
                type: 'GET',
                success: function (response) {
                    response = JSON.parse(response);

                    let tablaH = jQuery('#servicio_table');
                    tablaH.DataTable().clear();
                    tablaH.DataTable().destroy();
                    tablaH.DataTable( {
                        data: response.data.data,
                        language: global_tablelanguage,
                        select: {
                            style: 'single'
                        },
                        sorting: false,
                        columns: [
                            { "data": "nombre" },
                            { "data": "descripcion" },
                            { "data": "activo" },
                            { "data": "precio_regular" },
                            { "data": "created_at" },
                            {
                                "data": null,
                                "render": function ( data, type, row, meta ) {
                                    return '<button id="servicio_table_remove" class="btn btn-danger" type="button"><i class="fas fa-trash-alt"></button>';
                                }
                            }
                        ]
                    });
                },
                error: function(err){
                    console.log(err);
                }
            }).then(()=>{
                process(false);
            })
        }
        */

        $('#servicio_new_registrar').on('click', function(event) {
            event.preventDefault();

            let nombre = $('#servicio_new_nombre').val();
            let descripcion = $('#servicio_new_descripcion').val();
            let precio_regular = $('#servicio_new_precio_regular').val();
            let precio_rebajado = $('#servicio_new_precio_rebajado').val();

            if(nombre.length==0){
                Swal.fire({ icon: 'error', title: 'Debe ingresar el Nombre', showConfirmButton: false })
                return
            }
            let urldata = '<?php echo base_url() ?>Paquetes/CrearServicio'
            let data = { "servicio_nombre" : nombre, "servicio_descripcion" : descripcion, "servicio_precio_regular" : precio_regular, "servicio_precio_rebajado" : precio_rebajado }

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
                            title: 'Se ha creado el servicio exitosamente',
                            showConfirmButton: false,
                            timer: 3000
                        }).then((value) => {
                            $('#nuevo_servicio').hide()
                            $('.modal-backdrop').remove();
                            // listarServicios()
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

        listarServicios()
        
        $('#btn_atributo_asignar').on('click', function(event) {
            event.preventDefault();

            let atributos = []
            $('input[type=checkbox]:checked').each(function (data) {
                if( ! $(this).attr('id').startsWith('atributo_') ) return
                atributos.push( { 'id_atributo' : parseInt($(this).attr('id').replace('atributo_', '')) } )
            })
            
            let urldata = '<?php echo base_url() ?>Paquetes/AsignarAtributo'
            let data = { "id_entidad": id_entidad, "tipo" : 2, "atributos" : atributos }

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
                            title: 'Se han asignado los atributos al servicio exitosamente',
                            showConfirmButton: false,
                            timer: 3000
                        }).then((value) => {
                            listarAtributos()
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

        jQuery('#servicio_table tbody').on('click', 'button', function () {
            var data = jQuery('#servicio_table').DataTable().row(jQuery(this).parents('tr')).data();
            if(jQuery(this)[0].id == 'servicios_table_remove'){
                eliminarServicio(data.id)
            }
        })
    } );
    
    function listarServicios() {            
        let estado = $('#servicio_estado').val();
        let nombre = $('#servicio_nombre').val();
        
        urldata = '<?php echo base_url() ?>Paquetes/BuscarServicios?servicio_estado='+estado+'&servicio_nombre='+nombre;

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
                        return fnConvertDate(data.created_at);
                    }
                },
                {
                    "data": null,
                    "render": function ( data, type, row, meta ) {
                        if(data.activo != 0){
                            return '<button id="servicios_table_remove" class="btn btn-danger" type="button"><i class="fas fa-trash-alt"></i></button>&nbsp;'+
                        '<button id="paquetes_table_atributo" onclick="gestion_atributos('+(row.id).toString()+')" class="btn btn-warning" type="button"><i class="fas fa-table"></i></button>';
                        }
                        else{
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
        
        urldata = '<?php echo base_url() ?>Paquetes/BuscarAtributosAsignados?tipo=2&id='+id_entidad;

        process(true);
        
        let tablaH = jQuery('#atributo_table');
        tablaH.DataTable().clear();
        tablaH.DataTable().destroy();
        tablaH.DataTable( {
            retrieve: true,
            processing: true,
            serverSide: true,
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
                },                {
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

    function eliminarServicio(id){
        let urldata = '<?php echo base_url() ?>Paquetes/DeleteServicio'
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
                        title: 'Se ha eliminado el servicio exitosamente',
                        showConfirmButton: false,
                        timer: 3000
                    }).then((value) => {
                        listarServicios()
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