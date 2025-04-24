<?php encabezado() ?>
<!-- <?php var_dump($_GET['tiposdocumento']); ?> -->
<!-- <?php var_dump($_GET['msg']); ?> -->
<!-- <?php var_dump(json_encode($data['beneficios'])); ?> -->

<?php
//$meses = array( 1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 =>  'Abril', 5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto', 9 => 'Setiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre');
$anos = array(); $ano = intval(date('Y'));
while($ano <= intval(date('Y')) + 5){
    $anos[] = $ano;
    $ano ++;
}
?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-12 m-auto">

                    <!-- <form method="post" action="/Graficas/Listar" autocomplete="off"> -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-primary">
                                <li class="offset-5"><h6 class="title text-white text-center"> GRÁFICAS</h6></li>
                            </ol>
                        </nav>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="producto">Productos</label>
                                    <select id="producto" class="form-control" name="producto">
                                        <?php foreach ($data['productos']->data as $key => $cl) { ?>
                                            <option value="<?php echo $cl->id; ?>"><?php echo $cl->nombre; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label for="beneficio">Beneficios</label>
                                    <select id="beneficio" class="form-control" name="beneficio">
                                    </select>
                                </div>
                                <div class="col-lg-1">
                                    <label for="ano">Año</label>
                                    <select id="ano" class="form-control" name="ano">
                                        <?php foreach ($anos as $cl) { ?>
                                            <option value="<?php echo $cl; ?>"><?php echo $cl; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="button" onclick="buscar(0);"><i class="fas fa-search"></i> Buscar</button>

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
                    <!-- </form> -->
                    <div class="row">
                        <div class="col-lg-12">
                        <table class="table table-hover table-bordered text-center" id="Tabla">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Total atenciones</th>
                                    <th>Venta total</th>
                                    <th>Costo operativo</th>
                                    <th>% Costo Operativo</th>
                                    <th>Rentabilidad</th>
                                    <th>% Rentabilidad</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <canvas class="grafica" id="atencionesmes"></canvas>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-lg-12">
                            <canvas class="grafica" id="atencionesdias"></canvas>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-lg-6">
                            <canvas class="grafica" id="atencionesgenero"></canvas>
                        </div>
                        <div class="col-lg-6">
                            <canvas class="grafica" id="atencionesedades"></canvas>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>

<script>
    var labelMes = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    var labelDia = ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'];
    var labelGenero = ['Hombre', 'Mujer'];
    var labelEdad = ['<0 – 12> niño', '<13 – 17> adolescente', '<18-29> joven', '<30-59> adulto', '60> adulto mayor',];
    var data = [];
    var beneficios = [];
    //var data = [12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3, 8];
    var charts=[];
    $(document).ready(function() {
        var horientacion = 'x';
        var graficas = document.getElementsByClassName("grafica");
        Array.prototype.forEach.call(graficas, function(el) {
            el.height = 200; el.getContext('2d');
            switch(el.id) {
            case "atencionesmes":
                tipo = 'bar';Legenda = 'Atenciones vs mes ';labels = labelMes; backcolor= [ 'rgba(93, 89, 239)' ]; backbordercolor= [ 'rgba(128,128,128)' ];
                break;
            case "atencionesdias":
                tipo = 'line';Legenda = 'Atenciones vs días ';labels = labelDia; backcolor= [ 'rgba(93, 89, 239)' ]; backbordercolor= [ 'rgba(128,128,128)' ];
                break;
            case "atencionesgenero":
                tipo = 'doughnut';Legenda = 'Atenciones por género ';labels = labelGenero; backcolor= [ 'rgba(93, 89, 239)', 'rgb(254, 173, 137)' ]; backbordercolor= [ 'rgba(128,128,128)','rgba(128,128,128)' ];
                break;
            case "atencionesedades": 
                tipo = 'bar';Legenda = 'Atenciones por edad';labels = labelEdad;backcolor= [ 'rgb(247, 186, 0)' ]; backbordercolor= [ 'rgba(128,128,128)' ];
                horientacion = 'y';
                break;
            default:
                // code block
            }
            charts.push(new Chart(el, {
                type: tipo,
                data: {
                    labels: labels,
                    datasets: [{
                        label: Legenda,
                        data: data,
                        backgroundColor: backcolor,
                        borderColor: backbordercolor,
                        borderWidth: 1
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    indexAxis: horientacion,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    'onClick' : function (evt, item) {
                        if(item.length>0)
                            updateData(item);
                        else{
                            Swal.fire({
                                icon: 'success',
                                title: 'Debe seleccionar un mes',
                                showConfirmButton: false,
                                timer: 1500
                            }); 
                        }
                    }
                }
            }));
        });
        cargarbeneficios($('#producto').val());

        $('#Tabla').DataTable({
            "paging":   false,
            "ordering": false,
            "info":     false,
            "bFilter": false,
            "bPaginate": false,
            language: {
                "decimal": "",
                "emptyTable": "No hay datos",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
            }
        });
    });

    $('#producto').on('change', function (e) {
        cargarbeneficios(this.value);
    });
    function cargarbeneficios(idProducto){
        let urldata = '<?php echo base_url() ?>Graficas/BeneficiosProProducto?producto='+idProducto;
        $.ajax({
            url: urldata,
            async: false,
            type: 'GET',
            success: function (response) {
                data = JSON.parse(response);
                $('#beneficio').empty();
                $.each(data.data, function (i, item) {
                    $('#beneficio').append($('<option>', { 
                        value: item.id,
                        text : item.nombre 
                    }));
                });
            }
        })
    }

    function buscar(mes){
        if( $('#producto').val() == '' || $('#producto').val() == '' || $('#producto').val() == '0' ) { 
            Swal.fire({
                icon: 'warning',
                title: 'Debe seleccionar un producto',
                showConfirmButton: false,
                timer: 1500
            });
            alert('Debe seleccionar un producto'); return;
        }
        if( $('#beneficio').val() == '' || $('#beneficio').val() == null || $('#beneficio').val() == '0' ) { 
            Swal.fire({
                icon: 'warning',
                title: 'Debe seleccionar un beneficio',
                showConfirmButton: false,
                timer: 1500
            }); 
            return;
        }
        let urldata = '<?php echo base_url() ?>Graficas/buscar?producto='+$('#producto').val()+'&ano='+$('#ano').val()+'&beneficio='+$('#beneficio').val()+'&mes='+mes;

        Array.prototype.forEach.call(charts, function(el) {
            if(el.id != 0){
                el.data.datasets[0].data = [];
                el.update();
            }
        });
        document.getElementById("process").style.display = "block";
        $.ajax({
            url: urldata,
            async: true,
            type: 'GET',
            success: function (response) {
                datos = JSON.parse(response);
                Array.prototype.forEach.call(charts, function(el) {
                    if(el.id == 0 && mes == 0){
                        el.data.datasets[0].data = datos.datay;
                        el.update();
                    }
                });

                let tabla = $('#Tabla');
                tabla.DataTable().clear();
                tabla.DataTable().destroy();
                tabla.DataTable( {
                    "paging":   false,
                    "ordering": false,
                    "info":     false,
                    "bFilter": false,
                    "bPaginate": false,
                    data: datos.data,
                    columns: [
                        {
                            "data": null,
                            "render": function ( data, type, row, meta ) {
                                if(mes>0)
                                    return datos.datay[mes-1];
                                else
                                    return datos.datay[0]+datos.datay[1]+datos.datay[2]+datos.datay[3]+datos.datay[4]+datos.datay[5]+datos.datay[6]+datos.datay[7]+datos.datay[8]+datos.datay[9]+datos.datay[10]+datos.datay[11];
                            }
                        },
                        { "data": "total_venta" },
                        { "data": "total_gasto" },
                        {
                            "data": null,
                            "render": function ( data, type, row, meta ) {
                                return (data.total_gasto / data.total_venta * 100).toFixed(2);
                            }
                        },
                        { "data": "total_rentabilidad" },
                        {
                            "data": null,
                            "render": function ( data, type, row, meta ) {
                                return (data.total_rentabilidad / data.total_venta * 100).toFixed(2);
                            }
                        }
                    ]
                });
            },
            complete: function(){
                document.getElementById("process").style.display = "none";
            }
        })
    }

    function updateData(item){

        buscar((item[0].index+1));

        let urldata = '<?php echo base_url() ?>Graficas/buscardata?producto='+$('#producto').val()+'&ano='+$('#ano').val()+'&beneficio='+$('#beneficio').val()+'&mes='+(item[0].index+1);
        document.getElementById("process").style.display = "block";
        $.ajax({
            url: urldata,
            async: true,
            type: 'GET',
            success: function (response) {
                data = JSON.parse(response);
                Array.prototype.forEach.call(charts, function(el) {
                    switch(el.id) {
                    case 1:
                        el.data.datasets[0].data = data.data.dias;
                        el.update();
                        break;
                    case 2:
                        el.data.datasets[0].data = data.data.genero;
                        el.update();
                        break;
                    case 3:
                        el.data.datasets[0].data = data.data.edades;
                        el.update();
                        break;
                    default:
                        // code block
                    }


                    // if(el.id > 0 ){
                    //     el.data.datasets[0].data = data;
                    //     el.update();
                    // }
                });
            },
            complete: function(){
                document.getElementById("process").style.display = "none";
            }
        })
    }

</script>