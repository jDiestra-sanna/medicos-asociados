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
                                <li class="offset-5"><h6 class="title text-white text-center"> LISTA DE FORMAS DE PAGO</h6></li>
                            </ol>
                        </nav>
                        <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label for="formapago_nombre">Nombre</label>
                                        <input class="form-control" type="text" id="formapago_nombre" name="formapago_nombre" placeholder="Nombre de la forma de pago">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="formapago_estado">Estado</label>
                                        <select id="formapago_estado" class="form-control" name="formapago_estado">
                                            <option value="1">Sólo activos</option>
                                            <option value="0">Sólo inactivos</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <div class="card-footer">
                            <div class="col-lg-6 mb-2">
                                <button class="btn btn-primary" type="submit" id="formapago_btnBuscar"><i class="fas fa-search"></i> Buscar</button>
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#nuevo_formapago"><i class="fas fa-plus-circle"></i> Nueva forma pago</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive mt-4">
                        <table class="table table-hover table-bordered" id="formaspago_table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Activo</th>
                                    <th>Descuento</th>
                                    <th>Cuotas</th>
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
<div id="nuevo_formapago" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Nueva Forma Pago</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="formapago_new_nombre">Nombre</label>
                        <!-- <input id="formapago_new_nombre" class="form-control" type="text" name="formapago_new_nombre" placeholder="Nombre"> -->
                        <select id="formapago_new_nombre" class="form-control" name="formapago_new_nombre">
                            <option value="Anual" data-value="1">Anual</option>
                            <option value="Semestral" data-value="2">Semestral</option>
                            <option value="Cuatrimestral" data-value="3">Cuatrimestral</option>
                            <option value="Trimestral" data-value="4">Trimestral</option>
                            <option value="Bimestral" data-value="6">Bimestral</option>
                            <option value="Mensual" data-value="12">Mensual</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formapago_new_descripcion">Descripción</label>
                        <input id="formapago_new_descripcion" class="form-control" type="text" name="formapago_new_descripcion" placeholder="Descripción">
                    </div>
                    <div class="form-group">
                        <label for="formapago_new_descuento">Descuento</label>
                        <input class="form-control" type="number" id="formapago_new_descuento" name="formapago_new_descuento" placeholder="En porcentaje">
                    </div>
                    <div class="form-group">
                        <label for="formapago_new_cuotas">Cuotas</label>
                        <!-- <input class="form-control" type="number" min="1" max="12" oninput="fnInputNumber(this, 1, 12)" id="formapago_new_cuotas" name="formapago_new_cuotas" placeholder="12"> -->
                        <select id="formapago_new_cuotas" class="form-control" name="formapago_new_cuotas" disabled>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="6">6</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit" id="formapago_new_registrar"><i class="fas fa-save"></i> Registrar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php pie() ?>

<script>
    $(document).ready(function() {
        $('#formapago_btnBuscar').on('click', function(event) {
            event.preventDefault();
            listarFormasPago();
        })

        $('#formapago_new_registrar').on('click', function(event) {
            event.preventDefault();

            let nombre = $('#formapago_new_nombre').val();
            let descripcion = $('#formapago_new_descripcion').val();
            let descuento = $('#formapago_new_descuento').val();
            let cuotas = $('#formapago_new_cuotas').val();

            let urldata = '<?php echo base_url() ?>Paquetes/CrearFormaPago'
            let data = { "formapago_nombre" : nombre, "formapago_descripcion" : descripcion, "formapago_descuento" : descuento, "formapago_cuotas" : cuotas }

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
                            title: 'Se ha creado la forma de pago exitosamente',
                            showConfirmButton: false,
                            timer: 3000
                        }).then((value) => {
                            $('#nuevo_formapago').hide()
                            $('.modal-backdrop').remove();
                            // listarFormasPago()
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

        listarFormasPago()
        jQuery('#formaspago_table tbody').on('click', 'button', function () {
            var data = jQuery('#formaspago_table').DataTable().row(jQuery(this).parents('tr')).data();
            if(jQuery(this)[0].id == 'formapago_table_remove'){
                eliminarFormaPago(data.id)
            }
        })

        $('#formapago_new_nombre').on('change', function(event) {
            $('#formapago_new_cuotas').val($(this).find(':selected').attr('data-value'))
        })        

    } );
    
    function listarFormasPago() {            
        let estado = $('#formapago_estado').val();
        let nombre = $('#formapago_nombre').val();
        
        urldata = '<?php echo base_url() ?>Paquetes/BuscarFormasPago?formapago_estado='+estado+'&formapago_nombre='+nombre;
        
        let tablaH = jQuery('#formaspago_table');
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
                { "data": "descuento" },
                { "data": "cuotas" },
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
                            return '<button id="formapago_table_remove" class="btn btn-danger" type="button"><i class="fas fa-trash-alt"></button>';
                        }else{
                            return ''
                        }
                    }
                }
            ],
        });
    }

    function eliminarFormaPago(id){
        let urldata = '<?php echo base_url() ?>Paquetes/DeleteFormaPago'
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
                        title: 'Se ha eliminado la forma de pago exitosamente',
                        showConfirmButton: false,
                        timer: 3000
                    }).then((value) => {
                        listarFormasPago()
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