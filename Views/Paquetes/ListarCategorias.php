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
                                <li class="offset-5"><h6 class="title text-white text-center"> LISTA DE CATEGORIAS</h6></li>
                            </ol>
                        </nav>
                        <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label for="categoria_nombre">Nombre</label>
                                        <input class="form-control" type="text" id="categoria_nombre" name="categoria_nombre" placeholder="Nombre de la categoría">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="categoria_estado">Estado</label>
                                        <select id="categoria_estado" class="form-control" name="categoria_estado">
                                            <option value="1">Sólo activos</option>
                                            <option value="0">Sólo inactivos</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <div class="card-footer">
                            <div class="col-lg-6 mb-2">
                                <button class="btn btn-primary" type="submit" id="categoria_btnBuscar"><i class="fas fa-search"></i> Buscar</button>
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#nuevo_categoria"><i class="fas fa-plus-circle"></i> Nueva categoría</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive mt-4">
                        <table class="table table-hover table-bordered" id="categoria_table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Activo</th>
                                    <th class="text-center">Imagen</th>
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
        $('#categoria_btnBuscar').on('click', function(event) {
            event.preventDefault();
            listarCategorias();
        })

        $('#categoria_new_registrar').on('click', function(event) {
            event.preventDefault();

            let nombre = $('#categoria_new_nombre').val();
            let descripcion = $('#categoria_new_descripcion').val();
            let url_imagen = $('#categoria_new_url_imagen').val();

            let urldata = '<?php echo base_url() ?>Paquetes/CrearCategoria'
            let data = { "categoria_nombre" : nombre, "categoria_descripcion" : descripcion, "categoria_url_imagen" : url_imagen }

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
                            title: 'Se ha creado la categoría exitosamente',
                            showConfirmButton: false,
                            timer: 3000
                        }).then((value) => {
                            $('#nuevo_categoria').hide()
                            $('.modal-backdrop').remove();
                            // listarCategorias()
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

        listarCategorias()

        jQuery('#categoria_table tbody').on('click', 'button', function () {
            var data = jQuery('#categoria_table').DataTable().row(jQuery(this).parents('tr')).data();
            if(jQuery(this)[0].id == 'categoria_table_remove'){
                eliminarCategoria(data.id)
            }
        })
    } );
    
    function listarCategorias() {            
        let estado = $('#categoria_estado').val();
        let nombre = $('#categoria_nombre').val();
        
        urldata = '<?php echo base_url() ?>Paquetes/BuscarCategoria?categoria_activo='+estado+'&categoria_nombre='+nombre;

        process(true);
        
        let tablaH = jQuery('#categoria_table');
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
                {
                    "data": null,
                    "render": function ( data, type, row, meta ) {
                        return '<img height="200px" src="'+data.url_imagen+'" border="0" alt="lb-interesa" class="img_ad">'
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
                            return '<button id="categoria_table_remove" class="btn btn-danger" type="button"><i class="fas fa-trash-alt"></button>';
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
        process(false)
    }

    function eliminarCategoria(id){
        let urldata = '<?php echo base_url() ?>Paquetes/DeleteCategoria'
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
                        title: 'Se ha eliminado la Categoría exitosamente',
                        showConfirmButton: false,
                        timer: 3000
                    }).then((value) => {
                        listarCategorias()
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