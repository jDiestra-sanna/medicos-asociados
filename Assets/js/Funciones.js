const base = window.location.origin 
? window.location.origin + '/'+ '/sanna-web/'
: window.location.protocol + '/' + window.location.host+ '/sanna-web/';
const urls = base + "Compras/ingresar";	
window.addEventListener("load", function () {

    $("#procesarCompra").click(function () {
        var fila = $("#tablaCompras tr").length;
        if (fila < 2) {
            Swal.fire({
                icon: 'warning',
                title: 'No hay productos en la venta',
                showConfirmButton: false,
                timer: 2500
            })
        } else {
            const total = {
                totalP: $("#total").val()
            }

            $.ajax({
                url: base + "Compras/registrar",
                type: 'POST',
                data: total,
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Compra Generado',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    ListarCompras();
                }
            })
        }
    });
    $("#procesarVenta").click(function () {
        var fila = $("#tablaCompras tr").length;
        var cliente = $("#nombre_cliente").val();
        if (fila < 2) {
            Swal.fire({
                icon: 'warning',
                title: 'No hay productos en la venta',
                showConfirmButton: false,
                timer: 2500
            })
        } else {
            const total = {
                cliente: $("#id_cliente").val(),
                totalP: $("#total").val()
            }
            $.ajax({
                url: base + "Ventas/registrar",
                type: 'POST',
                data: total,
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Venta Generado',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    ListarCompras();
                }
            })
        }
    });
    $("#AnularCompra").click(function () {
        Swal.fire({
            title: 'Esta seguro que desea anular?',
            icon: 'warning',
            showCancelButton: true,
            // confirmButtonColor: '#3085d6',
            // cancelButtonColor: '#d33',
            confirmButtonText: 'si!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: base + "Compras/anular",
                    type: 'POST',
                    success: function (response) {
                        ListarCompras();
                        if (response != "error") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Anulado',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }
                });
            }
        });
    });
    $(document).on("click", ".eliminar", function () {
        var id = $(this).data("id");
        $.ajax({
            url: base + "Ventas/eliminar",
            type: 'POST',
            data: {
                id
            },
            success: function (response) {
                ListarCompras();
                if (response != "error") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Eliminado',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        })
    });
    $(".elim").submit(function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Esta seguro de eliminar?',
            icon: 'warning',
            showCancelButton: true,
            // confirmButtonColor: '#3085d6',
            // cancelButtonColor: '#d33',
            confirmButtonText: 'Si!',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        });
    });
    $(".confirmar").submit(function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Esta seguro de confirmar?',
            icon: 'warning',
            showCancelButton: true,
            // confirmButtonColor: '#3085d6',
            // cancelButtonColor: '#d33',
            confirmButtonText: 'Si!',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        });
    });
    $("#cambiar").click(function () {
        let claves = {
            actual: $("#actual").val(),
            nueva: $("#nueva").val()
        }
        $.ajax({
            url: base + "Usuarios/cambiar",
            type: "POST",
            data: {
                claves
            },
            success: function (response) {
                console.log(response);
                if (response == 1) {
                        $("#errorPass").html(`<div class="alert alert-primary" role="alert">
                                <strong>Contraseña Modificada con exito</strong>
                            </div>`);
                } else {
                    $("#errorPass").html(`<div class="alert alert-danger" role="alert">
                                <strong>Contraseña incorecta</strong>
                            </div>`);
                }
            }
        });
    });
})

function BuscarCodigo(e) {
    if (e.which == 13) {
        const codigo = document.getElementById("buscar_codigo").value;
        const url = document.getElementById("url").value;
        const urls = url + "Compras/buscar";
        $.ajax({
            url: urls,
            type: 'POST',
            data: {
                codigo
            },
            success: function (response) {
                if (response != 0) {
                    $("#error").addClass('d-none');
                    var info = JSON.parse(response);
                    document.getElementById("id").value = info.id;
                    document.getElementById("nombre").value = info.nombre;
                    document.getElementById("precio").value = info.precio;
                    $("#stockD").val(info.cantidad);
                    document.getElementById("cantidad").value = 1;
                    document.getElementById("nombreP").innerHTML = info.nombre;
                    document.getElementById("precioP").innerHTML = info.precio;
                    document.getElementById("cantidad").focus();
                } else {
                    $("#error").removeClass('d-none');
                }
            }
        });
    }
}

function IngresarCantidad(e) {
    const stockD = $("#stockD").val();
    const cantidad = document.getElementById("cantidad").value;
    if (e.which == 13) {
        if (stockD == "") {
            $('#frmCompras').trigger("reset");
            $("#buscar_codigo").focus();
            document.getElementById("nombreP").innerHTML = "";
            document.getElementById("precioP").innerHTML = "";
            Swal.fire({
                icon: 'warning',
                title: 'Ingrese la cantidad',
                showConfirmButton: false,
                timer: 1500
            })
        } else {
            $.ajax({
                url: urls,
                type: 'POST',
                async: true,
                data: $("#frmCompras").serialize(),
                success: function (response) {
                    $('#frmCompras').trigger("reset");
                    $("#buscar_codigo").focus();
                    $("#nombreP").html("");
                    $("#precioP").html("");
                    if (response == 1) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Se actualizo la cantidad del producto',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        ListarCompras();
                    } else {
                        ListarCompras();
                    }
                }
            });
        }
    }
}

function BuscarCliente(e) {
    const ruc = $("#ruc_cliente").val();
    if (e.which == 13) {
        $.ajax({
            url: base + "Clientes/buscar",
            type: "POST",
            data: {
                ruc
            },
            success: function (response) {
                var info = JSON.parse(response);
                $("#id_cliente").val(info.id);
                $("#nom_cli").html(info.nombre);
                $("#dir_cli").html(info.direccion);
                $("#tel_cli").html(info.telefono);
            }
        });
    }
}

function ListarCompras() {
    $.ajax({
        url: base + "Compras/compras",
        type: 'POST',
        success: function (response) {
            $("#ListaCompras").html(response);
            const tl = $("#totalPagar").val();
            $("#total").val(tl);
            $("#tVenta").html(tl);
            $("#totalV").html(tl);
        }
    });
}
// chart Barra

function reportes() {
    $.ajax({
        url: base + "Admin/reportes",
        type: 'POST',
        success: function (response) {
            var data = JSON.parse(response);
            var nombre = [];
            var cantidad = [];
            for (var i = 0; i < data.length; i++) {
                nombre.push(data[i]['nombre']);
                cantidad.push(data[i]['cantidad']);
            }
            // Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#292b2c';

            // Bar Chart Example
            var ctx = document.getElementById("myBarChart");
            var myLineChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: nombre,
                    datasets: [{
                        label: "Stock",
                        data: cantidad,
                        backgroundColor: [
                            'Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange', 'crimson', 'teal', 'fuchsia', 'lime'
                        ],
                    }],
                },
                options: {
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'month'
                            },
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                maxTicksLimit: 6
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                min: 0,
                                max: 20,
                                maxTicksLimit: 5
                            },
                            gridLines: {
                                display: true
                            }
                        }],
                    },
                    legend: {
                        display: false
                    }
                }
            });
        }
    })
}
// chart torta
function reportesTorta() {
    $.ajax({
        url: base + "Admin/reportesTorta",
        type: 'POST',
        success: function (response) {
            var data = JSON.parse(response);
            var producto = [];
            var total = [];
            for (var i = 0; i < data.length; i++) {
                producto.push(data[i]['producto']);
                total.push(data[i]['total']);
            }
            // Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#292b2c';

            // Pie Chart Example
            var ctx = document.getElementById("myPieChart");
            var myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: producto,
                    datasets: [{
                        data: total,
                        backgroundColor: [
                            'Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange', 'crimson', 'teal', 'fuchsia', 'lime'
                        ]
                    }],
                },
            });
        }
    })
}

function fnCalculaEdad(input){
    // convert user input value into date object
    var birthDate = new Date(input);
    
    // get difference from current date;
    var difference=Date.now() - birthDate.getTime(); 
         
    var  ageDate = new Date(difference); 
    var calculatedAge=   Math.abs(ageDate.getUTCFullYear() - 1970);
    return calculatedAge;
}
function fnCurrentDate(){
    var today = new Date();
    var dd = today.getDate();

    var mm = today.getMonth()+1; 
    var yyyy = today.getFullYear();
    if(dd<10) 
    {
        dd='0'+dd;
    } 

    if(mm<10) 
    {
        mm='0'+mm;
    }
    return yyyy+'-'+mm+'-'+dd;
}
function process(esperar){
    jQuery("body").append('<div id="process" class="overlay"><div class="overlay-content"><img src="'+base+'Assets/img/waiting.gif" alt="Waiting" ></div></div>')
    document.getElementById("process").style.display = esperar?"block":"none";
}
function fnExportExcel(idTable)
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var j=0;
    tab = document.getElementById(idTable); // id of table

    for(j = 0 ; j < 1 ; j++) 
    {
        tab_text += tab.rows[j].innerHTML+"</tr>";
    }
    var data = $('#'+idTable).DataTable().data();
    var rows = $('#'+idTable).DataTable().rows();
    //var columns = Object.keys(data[0]).length;
    var columns = $('#'+idTable).DataTable().settings().init().columns.length;
    for(j = 0 ; j < rows.count() ; j++) 
    {
        tab_text += "<tr>";
        for(indexdata = 0 ; indexdata <= columns-1 ; indexdata++) 
        {
            if( $('#'+idTable).DataTable().settings().init().columns[indexdata].data != null ){
                tab_text += "<td>"+ data[j][$('#'+idTable).DataTable().settings().init().columns[indexdata].data] +"</td>";
            }
            else{
                tab_text += "<td></td>";
            }
        }
        tab_text += "</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Report_"+idTable+fnCurrentDate()+".xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
function fnLimitText(limitField, limitNum)
 {
    if (limitField.value.length > limitNum)
    {
        limitField.value = limitField.value.substring(0, limitNum);
    }
}
function fnIsNewerThanToday(inputfield){
    var date = inputfield.value;
    var varDate = new Date(date); //dd-mm-YYYY
    var today = new Date();
    if(varDate >= today) {
        return true;
    }
}
function fnIsNewerThan(inputfield, inputcompare){
    var date = inputfield.value.replaceAll('-','/');
    var datecompare = inputcompare.value.replaceAll('-','/');
    var varDate = new Date(date); //dd-mm-YYYY
    var today = new Date(datecompare);
    if(varDate >= today) {
        return true;
    }
}
function fnDateDiff(inputfield, inputcompare){
    var datestart = new Date(inputfield);
    var dateend = new Date(inputcompare);    
    var diff = new Date(dateend - datestart);
    var days = diff/1000/60/60/24;
    return days;
}
function findtextdata(inputfield, method, minwords=-1, limit){
    var val = $(inputfield).val().toUpperCase();
    if(val.length >= minwords || minwords==-1){
        $.ajax({
            url: base+method+'?search='+val+'&limit='+limit,
            type: 'POST',
            dataType: 'json', //we use json
            data: {keyword: val},
            success: function(d){
                if( d!=undefined && d.length > 0 ){
                    var htmlitem = '<div class="autocompleteBS-items" data-parent="'+inputfield.id+'" data-current="-1" data-results="1" id="autocompleteBS-list" onclick="findtextdataselect(this);">';
                    $.each(d, function(index, value) {
                        htmlitem += '<div>'+value.paciente+'<input id="autoBS-0" value="'+value.paciente+'" data-id="'+value.cod_hia+'" data-resultid="0" hidden=""></div>';
                    });
                    htmlitem += '</div>';
                    $("#"+inputfield.id+"_result").css('display', 'block');
                    $("#"+inputfield.id+"_result").html(htmlitem);
                }
                else{
                    $("#"+inputfield.id+"_result").html('No hay resultados en la consulta');
                    $("#"+inputfield.id+"_result").css('display', 'block');
                    setTimeout(function(){
                        $("#"+inputfield.id+"_result").css('display', 'none');
                    },2000)
                }
            },
            error: function(d){
                $("#"+inputfield.id+"_result").css('display', 'none');
                $("#"+inputfield.id+"_result").html('');
            }
        });
    }
}
function findtextdataselect(item){
    var text = $("#"+item.id+" input").val();
    var id = $("#"+item.id+" input").data('id');
    var parent = $("#"+item.id).data('parent');
    $("#"+parent).val(text);
    $("#"+parent+"_result").css('display', 'none');
    $("#"+parent+"_result").html('');
    $("#"+parent+"_id").val(id);
    $("#"+parent+"_id").trigger('change');
}
function fnConvertDate(inputdate){
    var today = new Date(inputdate);
    var dd = today.getDate();

    var mm = today.getMonth()+1; 
    var yyyy = today.getFullYear();
    if(dd<10) 
    {
        dd='0'+dd;
    } 

    if(mm<10) 
    {
        mm='0'+mm;
    }
    return yyyy+'-'+mm+'-'+dd;
}
function fnConvertTime(inputdate){
    var today = new Date(inputdate);
    return (
    [
        today.getHours().toString().padStart(2, '0'),
        today.getMinutes().toString().padStart(2, '0'),
        today.getSeconds().toString().padStart(2, '0'),
    ].join(':')
    );
}
function fnInputNumber(inputfield, minvalue, maxvalue){
    if(isNaN(inputfield.value)) { inputfield.value = ''; return; }
    const val = parseInt(inputfield.value);
    if(minvalue!= undefined && val < minvalue){
        inputfield.value = minvalue;
    }
    if(maxvalue!= undefined && val > maxvalue){
        inputfield.value = maxvalue;
    }
}
function fnInputDecimal(inputfield, minvalue, maxvalue){
    if(isNaN(inputfield.value)) { inputfield.value = ''; return; }
    const val = parseFloat(inputfield.value);
    if(minvalue!= undefined && val < minvalue){
        inputfield.value = minvalue;
    }
    if(maxvalue!= undefined && val > maxvalue){
        inputfield.value = maxvalue;
    }
}

function validatesession(response){
    if(response.startsWith('ERROR_REDIRECT:') ){
        Swal.fire({
            icon: 'error',
            title: 'Su tiempo de actividad ha caducado... por favor vuelva a autenticarse',
            showConfirmButton: false,
            timer: 2000
        }).then(() => {
            window.location.reload()
          })
    }
}

function JSONToCSVConvertor(JSONData, ReportTitle, ShowLabel) {
    //If JSONData is not an object then JSON.parse will parse the JSON string in an Object
    var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;
    
    var CSV = '';    
    //Set Report title in first row or line
    
    CSV += ReportTitle + '\r\n\n';

    //This condition will generate the Label/Header
    if (ShowLabel) {
        var row = "";
        
        //This loop will extract the label from 1st index of on array
        for (var index in arrData[0]) {
            
            //Now convert each value to string and comma-seprated
            row += index + ',';
        }

        row = row.slice(0, -1);
        
        //append Label row with line break
        CSV += row + '\r\n';
    }
    
    //1st loop is to extract each row
    for (var i = 0; i < arrData.length; i++) {
        var row = "";
        
        //2nd loop will extract each column and convert it in string comma-seprated
        for (var index in arrData[i]) {
            row += '"' + arrData[i][index] + '",';
        }

        row.slice(0, row.length - 1);
        
        //add a line break after each row
        CSV += row + '\r\n';
    }

    if (CSV == '') {        
        alert("Invalid data");
        return;
    }   
    
    //Generate a file name
    var fileName = "";
    //this will remove the blank-spaces from the title and replace it with an underscore
    fileName += ReportTitle.replace(/ /g,"_");   
    
    //Initialize file format you want csv or xls
    var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);
    
    // Now the little tricky part.
    // you can use either>> window.open(uri);
    // but this will not work in some browsers
    // or you will not get the correct file extension    
    
    //this trick will generate a temp <a /> tag
    var link = document.createElement("a");    
    link.href = uri;
    
    //set the visibility hidden so it will not effect on your web-layout
    link.style = "visibility:hidden";
    link.download = fileName + ".csv";
    
    //this part will append the anchor tag and remove it after automatic click
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

function showSwalMessage(type="error", array_message=[]){
    Swal.fire({
        icon: type,
        title: array_message,
        showConfirmButton: false
    })
}

class JSONsanna {
    static parse(objString) {
        try {
            if(objString == "null"){
                throw "error";   
            }
            var json = JSON.parse(objString);
            return JSON.parse(objString);
          } catch (e) {
            return JSON.parse('{"success":true,"message":"","data":[] }')
          }
      /*
      if(objString!=null || objString!="null"){
        return JSON.parse(objString)
      }
      else{
        return JSON.parse('{}')
      }
      */
    }
  };
