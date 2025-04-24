<?php encabezado() ?>

<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <form method="post" action="/Paquetes/ListarMensajes" autocomplete="off">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-primary">
                                <li class="offset-5"><h6 class="title text-white text-center"> LISTA DE MENSAJES RECIBIDOS</h6></li>
                            </ol>
                        </nav>
                        <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="mensaje_estado">Estado</label>
                                        <select id="mensaje_estado" class="form-control" name="mensaje_estado">
                                            <option value="1">Sólo activos</option>
                                            <option value="0">Sólo inactivos</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <div class="card-footer">
                            <div class="col-lg-6 mb-2">
                                <button class="btn btn-primary" type="submit" id="mensaje_btnBuscar"><i class="fas fa-search"></i> Buscar</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive mt-4">
                        <table class="table table-hover table-bordered" id="mensaje_table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Fecha</th>
                                    <th>Nombre</th>
                                    <th>Teléfono</th>
                                    <th>Correo</th>
                                    <th>Mensaje</th>
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
    </section>
</div>
<div id="nuevo_categoria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Nueva categoría</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="categoria_new_nombre">Nombre</label>
                        <input id="categoria_new_nombre" class="form-control" type="text" name="categoria_new_nombre" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="categoria_new_descripcion">Descripción</label>
                        <input id="categoria_new_descripcion" class="form-control" type="text" name="categoria_new_descripcion" placeholder="Descripción">
                    </div>
                    <div class="form-group">
                        <label for="categoria_new_url_imagen">URL Imagen</label>
                        <input class="form-control" type="text" id="categoria_new_url_imagen" name="categoria_new_url_imagen" placeholder="https://google.com/imagen">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit" id="categoria_new_registrar"><i class="fas fa-save"></i> Registrar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php pie() ?>

<script>
    $(document).ready(function() {
        $('#mensaje_btnBuscar').on('click', function(event) {
            event.preventDefault();
            listarMensajes();
        })
        listarMensajes()
    } );

    function listarMensajes() {            
        let estado = $('#mensaje_estado').val();
        
        urldata = '<?php echo base_url() ?>Paquetes/BuscarMensajes?mensaje_estado='+estado;

        process(true);
        
        let tablaH = jQuery('#mensaje_table');
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
                {
                    "data": null,
                    "render": function ( data, type, row, meta ) {
                        return fnConvertDate(data.created_at) + ' ' + fnConvertTime(data.created_at);
                    }
                },
                { "data": "nombre" },
                { "data": "phone" },
                { "data": "email" },
                { "data": "message" },
                {
                    "data": null,
                    "render": function ( data, type, row, meta ) {
                        return data.estado==1?'ACTIVO':'INACTIVO';
                    }
                },
                {
                    "data": null,
                    "render": function ( data, type, row, meta ) {
                        if(data.estado==1){
                            return '<button class="btn btn-danger" type="button" onclick="eliminarMensaje('+(row.id).toString()+')" ><i class="fas fa-trash-alt"></button>';
                        }else return ''
                    }
                }
            ],
            "preDrawCallback": function(data){
                process(false);
            },
        });
        process(false)
    }

    function eliminarMensaje(id) {            
        let urldata = '<?php echo base_url() ?>Paquetes/BorrarMensaje'
        let data = { "mensaje_id": id }

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
                        title: 'Se ha eliminado el mensaje exitosamente',
                        showConfirmButton: false,
                        timer: 3000
                    }).then((value) => {
                        listarMensajes()
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
    }
</script>