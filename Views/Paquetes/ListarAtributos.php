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
                                <li class="offset-5"><h6 class="title text-white text-center"> LISTA DE ATRIBUTOS</h6></li>
                            </ol>
                        </nav>
                        <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label for="atrib_nombre">Nombre</label>
                                        <input class="form-control" type="text" id="atrib_nombre" name="atrib_nombre" placeholder="Nombre del atributo">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="atrib_estado">Estado</label>
                                        <select id="atrib_estado" class="form-control" name="atrib_estado">
                                            <option value="1">Sólo activos</option>
                                            <option value="0">Sólo inactivos</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <div class="card-footer">
                            <div class="col-lg-6 mb-2">
                                <button class="btn btn-primary" type="submit" id="atrib_btnBuscar"><i class="fas fa-search"></i> Buscar</button>
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#nuevo_atrib"><i class="fas fa-plus-circle"></i> Nuevo atributo</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive mt-4">
                        <table class="table table-hover table-bordered" id="atrib_table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Activo</th>
                                    <!-- <th>Tarifa</th> -->
                                    <th>Expresion</th>
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
<div id="nuevo_atrib" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Nuevo Atributo</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="atrib_new_nombre">Nombre</label>
                        <input id="atrib_new_nombre" class="form-control" type="text" name="atrib_new_nombre" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="atrib_new_descripcion">Descripción</label>
                        <input id="atrib_new_descripcion" class="form-control" type="text" name="atrib_new_descripcion" placeholder="Descripción">
                    </div>
                    <div class="form-group">
                        <label for="atrib_new_formula_key">Fórmula Variable</label>
                        <!-- <input class="form-control" type="text" id="atrib_new_formula_key" name="atrib_new_formula_key" placeholder="Edad"> -->
                        <select id="atrib_new_formula_key" class="form-control" name="atrib_new_formula_key">
                            <option value="edad">Edad</option>
                            <option value="sexo">Género</option>
                            <option value="tipodocumento">Tipo documento</option>
                            <option value="relacion">Relación</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="atrib_new_formula_condition">Fórmula Condición</label>
                        <!-- <input class="form-control" type="text" id="atrib_new_formula_condition" name="atrib_new_formula_condition" placeholder="=="> -->
                        <select id="atrib_new_formula_condition" class="form-control" name="atrib_new_formula_condition">
                            <option value="<">Menor que</option>
                            <option value=">">Mayor que</option>
                            <option value="<=">Menor o igual que</option>
                            <option value=">=">Mayor o igual que</option>
                            <option value="==">Igual que</option>
                            <option value="!=">Diferente que</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="atrib_new_formula_value">Fórmula Valor</label>
                        <input class="form-control" type="text" id="atrib_new_formula_value" name="atrib_new_formula_value" placeholder="18">
                    </div>
                    <div class="form-group" style="display:none;">
                        <label for="atrib_new_tarifa">Tarifa</label>
                        <input id="atrib_new_tarifa" class="form-control" type="number" step="0.01" name="atrib_new_tarifa" placeholder="###.##" oninput="fnInputDecimal(this,0)" value="0">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit" id="atrib_new_registrar"><i class="fas fa-save"></i> Registrar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php pie() ?>

<script>
    $(document).ready(function() {
        $('#atrib_btnBuscar').on('click', function(event) {
            event.preventDefault();
            listarAtributos();
        })

        $('#atrib_new_registrar').on('click', function(event) {
            event.preventDefault();

            let nombre = $('#atrib_new_nombre').val();
            let descripcion = $('#atrib_new_descripcion').val();
            let tarifa = $('#atrib_new_tarifa').val();
            let key = $('#atrib_new_formula_key').val();
            let condition = $('#atrib_new_formula_condition').val();
            let value = $('#atrib_new_formula_value').val();

            if(nombre.length==0){
                Swal.fire({ icon: 'error', title: 'Debe ingresar el Nombre', showConfirmButton: false })
                return
            }
            if(key.length==0){
                Swal.fire({ icon: 'error', title: 'Debe ingresar la Fórmula Variable', showConfirmButton: false })
                return
            }
            if(condition.length==0){
                Swal.fire({ icon: 'error', title: 'Debe ingresar la Fórmula Condición', showConfirmButton: false })
                return
            }
            if(value.length==0){
                Swal.fire({ icon: 'error', title: 'Debe ingresar la Fórmula Valor', showConfirmButton: false })
                return
            }

            let urldata = '<?php echo base_url() ?>Paquetes/CrearAtributo'
            let data = { "atrib_nombre" : nombre, "atrib_descripcion" : descripcion, "atrib_tarifa" : tarifa, "atrib_formula_key" : key, "atrib_formula_value" : value, "atrib_formula_condition" : condition }

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
                            title: 'Se ha creado el atributo exitosamente',
                            showConfirmButton: false,
                            timer: 3000
                        }).then((value) => {
                            $('#nuevo_atrib').hide()
                            $('.modal-backdrop').remove();
                            // listarAtributos()
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

        listarAtributos()

        jQuery('#atrib_table tbody').on('click', 'button', function () {
            var data = jQuery('#atrib_table').DataTable().row(jQuery(this).parents('tr')).data();
            if(jQuery(this)[0].id == 'atrib_table_remove'){
                eliminarAtributo(data.id)
            }
        })
    } );

    function listarAtributos() {            
        let estado = $('#atrib_estado').val();
        let nombre = $('#atrib_nombre').val();
        
        urldata = '<?php echo base_url() ?>Paquetes/BuscarAtributos?atrib_estado='+estado+'&atrib_nombre='+nombre;

        process(true);
        
        let tablaH = jQuery('#atrib_table');
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
                // { "data": "tarifa" },
                {
                    "data": null,
                    "render": function ( data, type, row, meta ) {
                        return data.formula_key + data.formula_condition + data.formula_value;
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
                            return '<button id="atrib_table_remove" class="btn btn-danger" type="button"><i class="fas fa-trash-alt"></button>';
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
    function eliminarAtributo(id){
        let urldata = '<?php echo base_url() ?>Paquetes/DeleteAtributo'
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
                        title: 'Se ha eliminado el atributo exitosamente',
                        showConfirmButton: false,
                        timer: 3000
                    }).then((value) => {
                        listarAtributos()
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