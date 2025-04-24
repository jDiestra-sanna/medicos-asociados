<?php encabezado() ?>
<!-- <?php var_dump($_GET["listBeneficios"]->data[0]); ?> -->
<!-- <?php var_dump(json_encode($_GET['msg'])); ?> -->
<!-- <?php var_dump($_GET['data']); ?> -->
<!-- <?php var_dump(json_encode($data)); ?> -->

<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-12 m-auto">

                    <form method="post" action="/Productos/empleadoCargar" autocomplete="off" class="confirmar">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-primary">
                                <li class="breadcrumb-item"><a href="/Productos/detalle?id=<?php echo $_GET["id_prodcap_cabecera"]; ?>">DETALLE PRODUCTO</a></li>
                                <li class="offset-4"><h6 class="title text-white text-center"> LISTA DE EMPLEADOS</h6></li>
                            </ol>
                        </nav>
                        <div class="modal-body">
                            <input type="hidden" name="id_prodcap_detalle" value="<?php echo $_GET['id']; ?>">
                            <input type="hidden" name="id_prodcap_cabecera" value="<?php echo $_GET['id_prodcap_cabecera']; ?>">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="nombre">Producto</label>
                                    <input id="nombre" class="form-control" disabled readonly type="text" name="nombre" value="<?php echo $_GET['producto']; ?>">
                                </div>
                                <div class="col-lg-6">
                                    <label for="nombre">Empresa</label>
                                    <input id="nombre" class="form-control" disabled readonly type="text" name="nombre" value="<?php echo $_GET['empresa']; ?>">
                                </div>                                                
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#nueva_carga"><i class="fas fa-sync-alt"></i> Nueva carga</button>
                            <a href="/Productos/detalle?id=<?php echo $_GET["id_prodcap_cabecera"]; ?>" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>

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

                    <div class="row">
                        <div class="table-responsive mt-4">
                            <table class="table table-hover table-bordered" id="Table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th hidden></th>
                                        <th hidden></th>
                                        <th>Tipo Documento</th>
                                        <th>Nro Documento</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Género</th>
                                        <th>Fecha Nacimiento</th>
                                        <th>Correo</th>
                                        <th>Teléfono</th>
                                        <th>Ubigeo</th>
                                        <th>Dirección</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if($data && $data->success && count($data->data)>0) 
                                        { 
                                            foreach ($data->data as $cl) { ?>
                                            <tr>
                                                <td hidden><?php echo $cl->id?$cl->id:0; ?></td>
                                                <td hidden><?php echo $cl->id_tipo_documento; ?></td>
                                                <td><?php echo $cl->tipo_documento; ?></td>
                                                <td><?php echo $cl->nro_documento; ?></td>
                                                <td><?php echo $cl->nombre; ?></td>
                                                <td><?php echo $cl->apellido; ?></td>
                                                <td><?php echo $cl->genero; ?></td>
                                                <td><?php echo $cl->fecha_nacimiento; ?></td>
                                                <td><?php echo $cl->correo; ?></td>
                                                <td><?php echo $cl->telefono; ?></td>
                                                <td><?php echo $cl->ubigeo; ?></td>
                                                <td><?php echo $cl->direccion; ?></td>
                                                <td>
                                                    <div class="form-group form-check-inline">    
                                                        <?php if($cl->estado=="Activo"){
                                                        ?>
                                                        <form action="<?php echo base_url() ?>Productos/empleadoEliminar?id=<?php echo $cl->id; ?>&id_detalle=<?php echo $_GET['id']; ?>&id_prodcap_cabecera=<?php echo $_GET["id_prodcap_cabecera"]; ?>" method="post" class="d-inline elim">
                                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                        </form>
                                                        <?php
                                                        } 
                                                        else{
                                                            ?>
                                                            <a href="#" class="btn btn-primary disabled"><i class="fas fa-trash-alt"></i></a>
                                                            <?php
                                                        }?>
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php 
                                            } 
                                        } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div id="nueva_carga" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="my-modal-title"><i class="fas fa-user-plus"></i> Nuevo Carga Empleados</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/Productos/empleadoCargar" autocomplete="off">
                <div class="modal-body">
                    <input type="hidden" id="json_data" name="json_data" value=""></input>
                    <input type="hidden" name="id_prodcap_detalle" value="<?php echo $_GET['id']; ?>">
                    <input type="hidden" name="id_prodcap_cabecera" value="<?php echo $_GET['id_prodcap_cabecera']; ?>">
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="nombre">Producto</label>
                            <input id="producto" class="form-control" disabled readonly type="text" name="producto" value="<?php echo $_GET['producto']; ?>">
                        </div>
                        <div class="col-lg-6">
                            <label for="nombre">Empresa</label>
                            <input id="empresa" class="form-control" disabled readonly type="text" name="empresa" value="<?php echo $_GET['empresa']; ?>">
                        </div>                                                
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="nro_veces">Archivo de carga de empleados</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="fileEmpleados" accept=".xls, .xlsx">
                                <label class="custom-file-label" for="fileEmpleados">Subir archivo</label>
                            </div>
                        </div>

                        <div class="col-lg-4"><br/>
                            <a href="/Assets/documents/empleados_empresa.xlsx" class="btn btn-warning"><i class="fas fa-file-download"></i> Descargar Plantilla</a>
                        </div>
                        
                    </div><br/>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="TablaCarga">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Nro</th>
                                            <th>Cod. Tipo Documento</th>
                                            <th>Tipo Documento</th>
                                            <th>Nro Documento</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Género</th>
                                            <th>Fecha Nacimiento</th>
                                            <th>Correo</th>
                                            <th>Teléfono</th>
                                            <th>Ubigeo</th>
                                            <th>Dirección</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>                        
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary confirmar" type="submit"><i class="fas fa-save"></i> Cargar datos</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php pie() ?>

<script src="/Assets/js/xlsx.full.min.js"></script>

<script>
    let tipos_documento = [{"id":1, "nombre":"DOC.TRIB.NO.DOM.SIN.RUC"},
        {"id":9, "nombre":"SIN DOC DE IDENTIDAD"},
        {"id":7, "nombre":"PART. DE NAC."},
        {"id":4, "nombre":"RUC"},
        {"id":2, "nombre":"DNI"},
        {"id":5, "nombre":"PASAPORTE"},
        {"id":6, "nombre":"CED. DIPLOMATICA DE IDENTIDAD"},
        {"id":8, "nombre":"COD. NACIDO VIVO (CNV)"},
        {"id":3, "nombre":"CARNE EXTR."}
    ]

    var selectedFile;
    document.getElementById("fileEmpleados").addEventListener("change", function(event) {
        selectedFile = event.target.files[0];
        if (selectedFile) {
          var fileReader = new FileReader();
          fileReader.onload = function(event) {
            var data = event.target.result;

            var workbook = XLSX.read(data, {
              type: "binary"
            });
            workbook.SheetNames.forEach(sheet => {
              let rowObject = XLSX.utils.sheet_to_row_object_array(
                workbook.Sheets[sheet]
              );
              let jsonObject = JSON.stringify(rowObject);
              cargarTabla(jsonObject);
              console.log(jsonObject);
            });
          };
          fileReader.readAsBinaryString(selectedFile);
          event.target.value = '';
        }
    });

    // document.getElementById("nuevacarga").addEventListener("click", function(event) {
    //     $('#Table').DataTable().clear().draw();
    // });

    function cargarTabla(json){
        let contadoritems = 1;
        let data = JSON.parse(json);
        data.forEach(item => item['tipodocumento'] = tipos_documento.find(x => x.id === item.id_tipo_documento).nombre);
        data.forEach(item => item['id'] = contadoritems++);
        let tabla = $('#TablaCarga');
        tabla.DataTable().clear();
        tabla.DataTable().destroy();
        tabla.DataTable( {
            data: data,
            columns: [
                { "data": "id" },
                { "data": "id_tipo_documento" },
                { "data": "tipodocumento" },
                { "data": "numero_documento" },
                { "data": "nombres" },
                { "data": "apellidos" },
                { "data": "genero" },
                { "data": "fecha_nacimiento" },
                { "data": "correo" },
                { "data": "telefono" },
                { "data": "ubigeo" },
                { "data": "direccion" },
                {
                    "data": null,
                    "render": function ( data, type, row, meta ) {
                    return '<button class="btn btn-danger" type="button" onclick="remove('+(row.id).toString()+')"><i class="far fa-times-circle"></i></button>'; }
                }
            ]
        });
        $('#json_data').val(JSON.stringify(data));
    }

    function remove(id){
        $("#TablaCarga tr").each(function(){
            var currentRow=$(this);
            var colid =currentRow.find("td:eq(0)").text();
            if(colid == id){
                currentRow.remove();
            }
        });
        let datatmp = JSON.parse($('#json_data').val());
        datatmp = datatmp.filter(item => item.id !== id);
        $('#json_data').val(JSON.stringify(datatmp));
    }

    function showRow(id) {
        let myTab = document.getElementById('Table');
        for (i = 1; i < myTab.rows.length; i++) {
            if(id == myTab.rows.item(i).cells.item(0).innerText){
                $('#id').val(id);
                $('#id_empresa').val(myTab.rows.item(i).cells.item(11).innerHTML);
                $('#fecha_inicio').val(myTab.rows.item(i).cells.item(1).innerHTML);
                $('#fecha_fin').val(myTab.rows.item(i).cells.item(2).innerHTML);
                $('#tiempo_permanencia').val(myTab.rows.item(i).cells.item(3).innerHTML);
                if( myTab.rows.item(i).cells.item(4).innerHTML=='SI' )
                    $('#tiene_contrato1').prop('checked', true);
                else
                    $('#tiene_contrato2').prop('checked', true);
                $('#limite_credito').val(myTab.rows.item(i).cells.item(5).innerHTML);
                $('#tarifa_total').val(myTab.rows.item(i).cells.item(6).innerHTML);
                $('#edad_desde').val(myTab.rows.item(i).cells.item(8).innerHTML);
                $('#edad_hasta').val(myTab.rows.item(i).cells.item(9).innerHTML);
                
                $('#atenciones_para1').prop('checked', false);
                $('#atenciones_para2').prop('checked', false);
                if( myTab.rows.item(i).cells.item(7).innerHTML.includes('Lima') )
                    $('#atenciones_para1').prop('checked', true);
                if( myTab.rows.item(i).cells.item(7).innerHTML.includes('Provincia') )
                    $('#atenciones_para2').prop('checked', true);

                // var objCells = myTab.rows.item(i).cells;
                // for (var j = 0; j < objCells.length; j++) {
                //     console.log(objCells.item(j).innerHTML);
                // }
            }
        }
    };
</script>