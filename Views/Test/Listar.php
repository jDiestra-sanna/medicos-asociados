<?php encabezado() ?>
<!-- <?php var_dump($_GET['tiposdocumento']); ?> -->
<!-- <?php var_dump($_GET['msg']); ?> -->
<!-- <?php var_dump($data); ?> -->

<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-12 m-auto">

                    <form method="post" action="" autocomplete="off">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-primary">
                                <li class="offset-5"><h6 class="title text-white text-center"> TEST</h6></li>
                            </ol>
                        </nav>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="id_tipo_documento">Tipo Documento</label>
                                    <select id="id_tipo_documento" class="form-control" name="id_tipo_documento">
                                        <?php foreach ($_GET['tiposdocumento']->data as $cl) { ?>
                                            <option value="<?php echo $cl->id_doc_id; ?>"><?php echo $cl->descripcion_doc_id; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <label for="nro_documento">Nro documento</label>
                                    <input id="nro_documento" class="form-control" type="text" name="nro_documento" value="">
                                </div>
                                <div class="col-lg-5">
                                    <label for="id_empresa">Nombre paciente</label>
                                    <input id="nombre_apellido" class="form-control" type="text" name="nombre_apellido" value="" >
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit" id="btnBuscar"><i class="fas fa-search"></i> Buscar</button>

                            <?php if (isset($_GET['msg'])) {
                                if(!empty($_GET['msg'])){
                                    ?>
                                    <div class="alert alert-warning" role="alert">
                                    <?php
                                        $alert = json_decode($_GET['msg']);                                        
                                        foreach($alert as $valor){
                                        ?>
                                        <strong><?php echo $valor; ?></strong><br/>
                                    <?php 
                                        }
                                    ?>
                                    </div>
                                    <?php
                                }
                            } ?>
                        </div>
                    </form>
                    
                    <!-- <div class="row">
                        <div class="table-responsive mt-4">
                            <table class="table table-hover table-bordered" id="Table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>password</th>
                                        <th>created_at</th>
                                        <th>updated_at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div> -->

                    <div class="row">
                        <div class="table-responsive mt-4">
                            <table class="table table-hover table-bordered" id="Table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>cod_aso</th>
                                        <th>cod_ate</th>
                                        <th>nom_gru</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <button class="btn btn-primary" type="submit" id="btnLlamadas"><i class="fas fa-search"></i> Buscar Llamadas</button>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>


<?php pie() ?>

<script>
$('#btnLlamadas').on('click', function(event) {
    event.preventDefault();
    let nro_documento = $('#nro_documento').val();    
    let urldata = '<?php echo base_url() ?>Test/llamadas?nro_documento='+nro_documento;

    let rowTotal = 0;
    $('#Table').DataTable().clear();
    $('#Table').DataTable().destroy();
    $('#Table').DataTable( {
        processing: true,
        serverSide: true,
        language: global_tablelanguage,
        searching: false,
        pagingType: "simple",
        lengthMenu: [10, 20, 50, "All"],
        ajax: {
            url : urldata,
        },
        columns: [
            { "data": "cod_aso" },
            { "data": "cod_ate" },
            { "data": "nom_gru" }
        ]
    });
});





$('#btnBuscar').on('click', function(event) {
    event.preventDefault();
    let nro_documento = $('#nro_documento').val();    
    let urldata = '<?php echo base_url() ?>Test/buscar?nro_documento='+nro_documento;

    let rowTotal = 0;
    $('#Table').DataTable().clear();
    $('#Table').DataTable().destroy();
    $('#Table').DataTable( {
        processing: true,
        serverSide: true,
        pagingType: "simple",
        lengthMenu: [10, 20, 50, "All"],
        ajax: {
            url : urldata + '&rowtotal='+rowTotal,
            // BeforeSend: {
            //     'Authorization': "Basic " + btoa(username + ":" + password)
            // },
            dataFilter: function(data){
                debugger;
                var json = jQuery.parseJSON( data );
                //json.recordsTotal = json.total;
                //json.count = json.current_page;
                //json.recordsFiltered = json.data.per_page;
                //json.data = json.data;
                return JSON.stringify( json ); // return JSON string
            }
        },
        // "ajax": function(data, callback, settings) {
        //     debugger;
        //     //parameterCallback(data);
        //     return $.ajax({
        //         url: urldata,
        //         data: data,
        //         dataType: "jsonp",
        //         success: function(json) {
        //             callback(dataSource(json));
        //         }
        //     });
        // },
        columns: [
                    { "data": "name" },
                    { "data": "email" },
                    { "data": "password" },
                    { "data": "created_at" },
                    { "data": "updated_at" }
                ],
        "drawCallback": function( settings ) {
            $('.paginate_button.next:not(.disabled)', this.api().table().container())
                .on('click', function(){
                    debugger;
                });
            $('.paginate_button.previous:not(.disabled)', this.api().table().container())
                .on('click', function(){
                    debugger;
                });
        //     debugger;
        //     var api = this.api();
        //     api.rows( {page:'current'} ).data().page.info().recordsTotal = 99;
        //     // Output the data for the visible rows to the browser's console
        //     console.log( api.rows( {page:'current'} ).data() );
        },
        // "order": "initialOrder",
        // "createdRow": fnCreatedRowCallback,
        "preDrawCallback": function(data){
            rowTotal = this.api().rows( {page:'current'} ).data().page.info().recordsDisplay;
        },
        // "drawCallback": drawCallback
    });

    /*
    $.ajax({
        url: urldata,
        async: false,
        type: 'GET',
        success: function (response) {
            let tablaH = $('#Table');
            tablaH.DataTable().clear();
            tablaH.DataTable().destroy();
            tablaH.DataTable( {
                recordsTotal : JSON.parse(response).data.data.total,
                data: JSON.parse(response).data.data,
                columns: [
                    { "data": "name" },
                    { "data": "email" },
                    { "data": "password" },
                    { "data": "created_at" },
                    { "data": "updated_at" }
                ],
                "dataSrc": function ( json ) {
                    debugger;
                    json.data.recorsTotal = json.data.total;
                    return json.data;
                },
                "drawCallback": function( settings ) {
                    debugger;
                    var api = this.api();
                    api.rows( {page:'current'} ).data().page.info().recordsTotal = 99;
                    // Output the data for the visible rows to the browser's console
                    console.log( api.rows( {page:'current'} ).data() );
                }
            });
        }
    })
    */
});


</script>